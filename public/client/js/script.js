// const video = document.getElementById("video");

// Promise.all([
//   faceapi.nets.ssdMobilenetv1.loadFromUri("/its-tni/public/client/models"),
//   faceapi.nets.faceRecognitionNet.loadFromUri("/its-tni/public/client/models"),
//   faceapi.nets.faceExpressionNet.loadFromUri("/its-tni/public/client/models"),
//   faceapi.nets.ageGenderNet.loadFromUri("/its-tni/public/client/models"),
//   faceapi.nets.faceLandmark68Net.loadFromUri("/its-tni/public/client/models"),
// ]).then(startWebcam);

// function startWebcam() {
//   navigator.mediaDevices
//     .getUserMedia({
//       video: true,
//       audio: false,
//     })
//     .then((stream) => {
//       video.srcObject = stream;
//     })
//     .catch((error) => {
//       console.error(error);
//     });
// }

// function getLabeledFaceDescriptions() {
//   const labels = ["sandi"];
//   return Promise.all(
//     labels.map(async (label) => {
//       const descriptions = [];
//       for (let i = 1; i <= 2; i++) {
//         const img = await faceapi.fetchImage(`/its-tni/public/client/labels/${label}/${i}.jpg`);
//         const detections = await faceapi
//           .detectSingleFace(img)
//           .withFaceLandmarks()
//           .withFaceExpressions()
//           .withAgeAndGender()
//           .withFaceDescriptor();
//         descriptions.push(detections.descriptor);
//       }
//       return new faceapi.LabeledFaceDescriptors(label, descriptions);
//     })
//   );
// }

// video.addEventListener("play", async () => {
//   const labeledFaceDescriptors = await getLabeledFaceDescriptions();
//   const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);

//   const test = document.getElementById('test');
//   const canvas = faceapi.createCanvasFromMedia(video);
//   canvas.style.position = 'absolute';
//   test.append(canvas);

//   const displaySize = { width: video.width, height: video.height };
//   faceapi.matchDimensions(canvas, displaySize);

//   setInterval(async () => {
//     const detections = await faceapi
//       .detectAllFaces(video)
//       .withFaceLandmarks()
//       .withFaceExpressions()
//       .withAgeAndGender()
//       .withFaceDescriptors();

//     const resizedDetections = faceapi.resizeResults(detections, displaySize);

//     canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

//     const results = resizedDetections.map((d) => {
//       return faceMatcher.findBestMatch(d.descriptor);
//     });
//     results.forEach((result, i) => {
//       const box = resizedDetections[i].detection.box;
//       const age = resizedDetections[i].age;
//       const drawBox = new faceapi.draw.DrawBox(box, {
//         label: result + ' Umur : ' + Math.round(age),
//       });
//       drawBox.draw(canvas);
//       faceapi.draw.drawFaceExpressions(canvas, resizedDetections);
//     });
//   }, 100);
// });

const video = document.getElementById("video");
const stopButton = document.getElementById("stop-button");

Promise.all([
  faceapi.nets.ssdMobilenetv1.loadFromUri("/its-tni/public/client/models"),
  faceapi.nets.faceRecognitionNet.loadFromUri("/its-tni/public/client/models"),
  faceapi.nets.faceExpressionNet.loadFromUri("/its-tni/public/client/models"),
  faceapi.nets.ageGenderNet.loadFromUri("/its-tni/public/client/models"),
  faceapi.nets.faceLandmark68Net.loadFromUri("/its-tni/public/client/models"),
]).then(startWebcam);

function startWebcam() {
  navigator.mediaDevices
    .getUserMedia({
      video: true,
      audio: false,
    })
    .then((stream) => {
      video.srcObject = stream;
    })
    .catch((error) => {
      console.error(error);
    });
}

function getLabeledFaceDescriptions() {
  const labels = ["sandi"];
  return Promise.all(
    labels.map(async (label) => {
      const descriptions = [];
      for (let i = 1; i <= 2; i++) {
        const img = await faceapi.fetchImage(`/its-tni/public/client/labels/${label}/${i}.jpg`);
        const detections = await faceapi
          .detectSingleFace(img)
          .withFaceLandmarks()
          .withFaceExpressions()
          .withAgeAndGender()
          .withFaceDescriptor();
        descriptions.push(detections.descriptor);
      }
      return new faceapi.LabeledFaceDescriptors(label, descriptions);
    })
  );
}

video.addEventListener("play", async () => {
  const labeledFaceDescriptors = await getLabeledFaceDescriptions();
  const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);

  const test = document.getElementById('test');
  const canvas = faceapi.createCanvasFromMedia(video);
  canvas.style.position = 'absolute';
  test.append(canvas);

  const displaySize = { width: video.width, height: video.height };
  faceapi.matchDimensions(canvas, displaySize);

  const emotionData = {
    neutral: 0,
    happy: 0,
    sad: 0,
    angry: 0,
    fearful: 0,
    disgusted: 0,
    surprised: 0,
    count: 0,
  };

  const emotionArray = [];
  let isStopped = false;

  const intervalId = setInterval(async () => {
    if (isStopped) return;

    const detections = await faceapi
      .detectAllFaces(video)
      .withFaceLandmarks()
      .withFaceExpressions()
      .withAgeAndGender()
      .withFaceDescriptors();

    const resizedDetections = faceapi.resizeResults(detections, displaySize);

    canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

    const results = resizedDetections.map((d) => {
      return faceMatcher.findBestMatch(d.descriptor);
    });

    results.forEach((result, i) => {
      if (result.label === "sandi") {
        const box = resizedDetections[i].detection.box;
        const age = resizedDetections[i].age;
        const drawBox = new faceapi.draw.DrawBox(box, {
          label: result + ' Umur : ' + Math.round(age),
        });
        drawBox.draw(canvas);
        faceapi.draw.drawFaceExpressions(canvas, resizedDetections);

        // Collect emotion data
        const expressions = resizedDetections[i].expressions;
        for (const [emotion, value] of Object.entries(expressions)) {
          emotionData[emotion] += value;
        }
        emotionData.count += 1;
      }
    });
  }, 100);

  stopButton.addEventListener("click", () => {
    isStopped = true;
    clearInterval(intervalId);
    stopWebcam();
    analyzeEmotions(emotionData, emotionArray);
  });
});

function stopWebcam() {
  const stream = video.srcObject;
  const tracks = stream.getTracks();
  tracks.forEach((track) => track.stop());
  video.srcObject = null;
}

function analyzeEmotions(data, emotionArray) {
  const averageEmotions = {};
  for (const [emotion, value] of Object.entries(data)) {
    if (emotion !== "count") {
      averageEmotions[emotion] = value / data.count;
    }
  }
  console.log("Average emotions in the session:", averageEmotions);

  // Calculate the percentage
  const totalEmotions = Object.values(averageEmotions).reduce((a, b) => a + b, 0);
  const emotionPercentages = {};
  for (const [emotion, value] of Object.entries(averageEmotions)) {
    emotionPercentages[emotion] = ((value / totalEmotions) * 100).toFixed(2);
  }

  // Store the results in the array and log it
  emotionArray.push(emotionPercentages);
  console.log("Emotion percentages:", emotionPercentages);

  // Display the results
  displayResults(emotionPercentages);
}

function displayResults(emotionPercentages) {
  // Hide the detection page and show the results page
  document.getElementById('test').style.display = 'none';
  document.getElementById('results-page').style.display = 'block';

  const tbody = document.getElementById('results-table').getElementsByTagName('tbody')[0];
  for (const [emotion, percentage] of Object.entries(emotionPercentages)) {
    const row = tbody.insertRow();
    const cellEmotion = row.insertCell(0);
    const cellPercentage = row.insertCell(1);
    cellEmotion.textContent = emotion;
    cellPercentage.textContent = `${percentage}%`;
  }
}









