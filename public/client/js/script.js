document.addEventListener("DOMContentLoaded", function() {
  const video = document.getElementById("video");
  const stopButton = document.getElementById("stop-button");
  const loader = document.getElementById("loader");

  console.log("Loading models...");
  Promise.all([
    faceapi.nets.ssdMobilenetv1
      .loadFromUri("/its-tni/public/client/models")
      .then(() => console.log("Loaded ssdMobilenetv1")),
    faceapi.nets.faceRecognitionNet
      .loadFromUri("/its-tni/public/client/models")
      .then(() => console.log("Loaded faceRecognitionNet")),
    faceapi.nets.faceExpressionNet
      .loadFromUri("/its-tni/public/client/models")
      .then(() => console.log("Loaded faceExpressionNet")),
    faceapi.nets.ageGenderNet
      .loadFromUri("/its-tni/public/client/models")
      .then(() => console.log("Loaded ageGenderNet")),
    faceapi.nets.faceLandmark68Net
      .loadFromUri("/its-tni/public/client/models")
      .then(() => console.log("Loaded faceLandmark68Net")),
  ])
    .then(getLabeledFaceDescriptions)
    .then((labeledDescriptors) => startWebcam(labeledDescriptors))
    .catch((e) => {
      console.error("Failed to load models:", e);
      loader.innerText = "Failed to load models";
    });

  async function getLabeledFaceDescriptions() {
    const labels = ["bobi kurniawan", "sandi"];
    console.log("Getting labeled face descriptions...");
    return Promise.all(
      labels.map(async (label) => {
        const descriptions = [];
        for (let i = 1; i <= 2; i++) {
          const img = await faceapi.fetchImage(
            `/its-tni/public/client/labels/${label}/${i}.jpg`
          );
          const detections = await faceapi
            .detectSingleFace(img)
            .withFaceLandmarks()
            .withFaceExpressions()
            .withAgeAndGender()
            .withFaceDescriptor();
          if (detections) {
            descriptions.push(detections.descriptor);
          }
        }
        return new faceapi.LabeledFaceDescriptors(label, descriptions);
      })
    );
  }

  let emotionData = {
    neutral: 0,
    happy: 0,
    sad: 0,
    angry: 0,
    fearful: 0,
    disgusted: 0,
    surprised: 0,
    count: 0,
  };

  function startWebcam(labeledDescriptors) {
    console.log("Starting webcam...");
    navigator.mediaDevices
      .getUserMedia({ video: true, audio: false })
      .then((stream) => {
        video.srcObject = stream;
        video.onloadedmetadata = () => {
          console.log("Webcam started");
          video.play();
          initializeDetection(labeledDescriptors);
        };
      })
      .catch((error) => {
        console.error("Error accessing the webcam", error);
        loader.innerText = "Error accessing the webcam";
      });
  }

  function initializeDetection(labeledDescriptors) {
    const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors);
    const canvas = faceapi.createCanvasFromMedia(video);
    document.getElementById("test").appendChild(canvas);
    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);

    function processVideoFrame() {
      faceapi
        .detectAllFaces(video)
        .withFaceLandmarks()
        .withFaceExpressions()
        .withAgeAndGender()
        .withFaceDescriptors()
        .then((detections) => {
          const resizedDetections = faceapi.resizeResults(
            detections,
            displaySize
          );
          canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
          faceapi.draw.drawDetections(canvas, resizedDetections);

          resizedDetections.forEach((detection) => {
            const { age, expressions } = detection;
            const maxEmotion = Object.keys(expressions).reduce((a, b) =>
              expressions[a] > expressions[b] ? a : b
            );
            const result = faceMatcher.findBestMatch(detection.descriptor);
            let displayName = result.toString(); // Default to the matched label
            if (result.label === "bobi kurniawan") {
              displayName = "bobi kurniawan"; // Customize display name if the label is 'fadil'
            }
            const text = `${displayName}, 24 th, ${maxEmotion}`;
            const anchor = {
              x: detection.detection.box.bottomLeft.x,
              y: detection.detection.box.bottomLeft.y + 6,
            };
            const boxHeight = detection.detection.box.height;
            new faceapi.draw.DrawTextField(
              [text],
              anchor,
              boxHeight * 0.5
            ).draw(canvas);
            updateEmotionData(expressions);
          });

          if (detections.length > 0) {
            loader.style.display = "none";
          }
          requestAnimationFrame(processVideoFrame);
        })
        .catch((error) => {
          console.error("Error processing video frame:", error);
          requestAnimationFrame(processVideoFrame);
        });
    }

    requestAnimationFrame(processVideoFrame);
  }

  function updateEmotionData(expressions) {
    Object.keys(expressions).forEach((key) => {
      if (emotionData.hasOwnProperty(key)) {
        // Check if the key exists in emotionData
        emotionData[key] += expressions[key];
      }
    });
    emotionData.count++; // Increment the count of processed faces
  }

  stopButton.addEventListener("click", () => {
    video.pause();
    video.srcObject.getTracks().forEach((track) => track.stop());
    document.getElementById("test").style.display = "none";
    document.getElementById("results-page").style.display = "block";
    analyzeEmotions();
  });

  function analyzeEmotions() {
    if (emotionData.count > 0) {
      const percentages = Object.keys(emotionData).reduce((acc, cur) => {
        if (cur !== "count") {
          acc[cur] =
            ((emotionData[cur] / emotionData.count) * 100).toFixed(2) + "%";
        }
        return acc;
      }, {});
      displayResults(percentages);
    } else {
      console.log("No emotions detected.");
    }
  }

  function displayResults(percentages) {
    const tbody = document
      .getElementById("results-table")
      .getElementsByTagName("tbody")[0];
    tbody.innerHTML = "";
    Object.entries(percentages).forEach(([emotion, percentage]) => {
      const row = tbody.insertRow();
      const cellEmotion = row.insertCell(0);
      const cellPercentage = row.insertCell(1);
      cellEmotion.textContent = emotion;
      cellPercentage.textContent = percentage;
    });
  }
});