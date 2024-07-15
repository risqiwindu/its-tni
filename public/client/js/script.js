const video = document.getElementById("video");
let canvas;
let isVideoPlaying = false;
let lastNotificationTime = 0;
let isLoading = true;

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
      video.play();
      isVideoPlaying = true;

      video.style.display = "block";
      isLoading = false;
    })
    .catch((error) => {
      console.error(error);
    });
}

function getLabeledFaceDescriptions(label) {
  return Promise.all(
    Array.from({ length: 2 }, (_, i) => {
      const imgPath = `/its-tni/public/client/labels/${label}/${i}.jpg`;
      return faceapi.fetchImage(imgPath).then(async (img) => {
        const detection = await faceapi
          .detectSingleFace(img)
          .withFaceLandmarks()
          .withFaceExpressions()
          .withAgeAndGender()
          .withFaceDescriptor();
        return detection.descriptor;
      });
    })
  ).then((descriptors) => {
    return new faceapi.LabeledFaceDescriptors(label, descriptors);
  });
}

function showNotification(message, videoId) {
  const notification = document.createElement("div");
  notification.className = "notification";
  
  const iframe = document.createElement("iframe");
  iframe.width = "560";
  iframe.height = "315";
  iframe.src = `https://www.youtube.com/embed/${videoId}`;
  iframe.frameBorder = "0";
  iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
  iframe.allowFullscreen = true;

  notification.appendChild(iframe);
  document.body.appendChild(notification);

  // Mengatur posisi notifikasi di tengah layar
  const windowHeight = window.innerHeight;
  const notificationHeight = notification.offsetHeight;
  notification.style.top = `${(windowHeight - notificationHeight) / 2}px`;

  setTimeout(() => {
    notification.remove();
  }, 2 * 60 * 1000);
}

const loadingOverlay = document.createElement("div");
loadingOverlay.className = "loading-overlay";
loadingOverlay.innerText = "Loading..."; // Pesan loading bisa disesuaikan

document.body.appendChild(loadingOverlay);

video.addEventListener("play", async () => {
  if (isLoading) {
    // Tampilkan elemen loading saat proses inisialisasi
    loadingOverlay.style.display = "flex";
  }
  
  const label = "sandi"; // Ganti dengan label yang diinginkan

  try {
    const labeledFaceDescriptors = await getLabeledFaceDescriptions(label);
    const faceMatcher = new faceapi.FaceMatcher([labeledFaceDescriptors]);

    if (canvas) {
      canvas.remove();
    }

    const test = document.getElementById('test');
    canvas = faceapi.createCanvasFromMedia(video);
    canvas.style.position = 'absolute';
    test.append(canvas);

    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);

    const interval = setInterval(async () => {
      const detections = await faceapi
        .detectAllFaces(video)
        .withFaceLandmarks()
        .withFaceExpressions()
        .withAgeAndGender()
        .withFaceDescriptors();

      const resizedDetections = faceapi.resizeResults(
        detections,
        displaySize
      );

      canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

      resizedDetections.forEach((detection) => {
        const bestMatch = faceMatcher.findBestMatch(detection.descriptor);
        if (bestMatch.label === label) {
          const box = detection.detection.box;
          const age = Math.round(detection.age);
          const labelInfo = `${bestMatch.toString()} - Age: ${age}`;

          const drawBox = new faceapi.draw.DrawBox(box, {
            label: labelInfo,
          });
          drawBox.draw(canvas);

          faceapi.draw.drawFaceExpressions(canvas, detection);

          const highestEmotion = Object.keys(detection.expressions).reduce(
            (a, b) =>
              detection.expressions[a] > detection.expressions[b] ? a : b
          );

          if (highestEmotion === "happy" && isVideoPlaying) {
            const currentTime = Date.now();
            if (currentTime - lastNotificationTime > 2 * 60 * 1000) { // Check if 2 minutes have passed since last notification
              showNotification("User is feeling happy! Watch this fun video:", "3df8CooYnSs?si=hwzDF0uP4uvvf1GX&amp;controls=0");
              lastNotificationTime = currentTime;

              // Stop the video
              const stream = video.srcObject;
              const tracks = stream.getTracks();
              tracks.forEach(track => track.stop());
              video.srcObject = null;
              isVideoPlaying = false;

              // Clear the canvas
              canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

              // Restart the video after 2 minutes
              setTimeout(() => {
                startWebcam();
              }, 2 * 60 * 1000); // 2 minutes in milliseconds
            }
          }
        }
      });
      loadingOverlay.style.display = "none";
      isLoading = false;
    }, 1000);
  } catch (error) {
    console.error("Error in face detection:", error);
    loadingOverlay.style.display = "none"; // Sembunyikan elemen loading jika terjadi kesalahan
    isLoading = false;
  }
});