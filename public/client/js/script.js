const video = document.getElementById("video");

Promise.all([
  faceapi.nets.ssdMobilenetv1.loadFromUri("/app/public/client/models"),
  faceapi.nets.faceRecognitionNet.loadFromUri("/app/public/client/models"),
  faceapi.nets.faceExpressionNet.loadFromUri("/app/public/client/models"),
  faceapi.nets.ageGenderNet.loadFromUri("/app/public/client/models"),
  faceapi.nets.faceLandmark68Net.loadFromUri("/app/public/client/models"),
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
        const img = await faceapi.fetchImage(`/app/public/client/labels/${label}/${i}.jpg`);
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

  setInterval(async () => {
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
      const box = resizedDetections[i].detection.box;
      const age = resizedDetections[i].age;
      const drawBox = new faceapi.draw.DrawBox(box, {
        label: result + ' Umur : ' + Math.round(age),
      });
      drawBox.draw(canvas);
      faceapi.draw.drawFaceExpressions(canvas, resizedDetections);
    });
  }, 100);
});