document.addEventListener("DOMContentLoaded", function() {
  const video = document.getElementById("video");
  const stopButton = document.getElementById("stop-button");
  const loader = document.getElementById("loader");
  let stream = null; 
  let labeledDescriptors = null; // Added to track labeled descriptors

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
    .then((descriptors) => {
      labeledDescriptors = descriptors;
      startWebcam(labeledDescriptors);
    })
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
      .then((streamObj) => {
        stream = streamObj; // Simpan referensi stream
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
            const { expressions, landmarks } = detection;
            const maxEmotion = Object.keys(expressions).reduce((a, b) =>
              (a !== 'neutral' && expressions[a] > expressions[b]) ? a : b
            );
            const result = faceMatcher.findBestMatch(detection.descriptor);
            let displayName = result.toString();
            if (result.label === "sandi") {
              displayName = "sandi";
            }
            const text = `${displayName}, 39 th, ${maxEmotion}`;
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
            checkMouthState(landmarks);
            checkDrowsiness(landmarks);
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
      if (emotionData.hasOwnProperty(key) && key !== "neutral") {
        emotionData[key] += expressions[key];
      }
    });
    emotionData.total += 1; // Increment the total count of expressions processed
  }

  function checkMouthState(landmarks) {
    const mouth = landmarks.getMouth();
    const mouthWidth = distance(mouth[0], mouth[6]); // Distance between the corners of the mouth
    const mouthHeight = distance(mouth[3], mouth[9]); // Distance between the top and bottom of the mouth

    // Adjust the threshold as needed
    const mouthRatio = mouthWidth / mouthHeight;
    if (mouthRatio < 1.5) { // Lower ratio indicates a more closed mouth
      showNotificationAndPlayVideo();
    }
  }

  function checkDrowsiness(landmarks) {
    const eyeLeft = landmarks.getLeftEye();
    const eyeRight = landmarks.getRightEye();
    const EAR_LEFT = calculateEAR(eyeLeft);
    const EAR_RIGHT = calculateEAR(eyeRight);
    
    const EAR_THRESHOLD_ATAS = 0.25; // Ambang batas EAR untuk mendeteksi mata tertutup
    const EAR_THRESHOLD_BAWAH = 0.20;

    if (EAR_LEFT > EAR_THRESHOLD_BAWAH && EAR_RIGHT > EAR_THRESHOLD_BAWAH && EAR_LEFT < EAR_THRESHOLD_ATAS && EAR_RIGHT < EAR_THRESHOLD_ATAS) {
      showNotificationAndPlayVideo();
    }
  }

  function calculateEAR(eye) {
    const A = distance(eye[1], eye[5]);
    const B = distance(eye[2], eye[4]);
    const C = distance(eye[0], eye[3]);
    return (A + B) / (2.0 * C);
  }

  function showNotificationAndPlayVideo() {
    if (stream) {
      const tracks = stream.getTracks();
      tracks.forEach(track => track.stop()); // Hentikan semua track dari stream
    }

    Swal.fire({
      title: 'User Mengantuk',
      text: 'Video akan ditampilkan',
      icon: 'info',
      confirmButtonText: 'OK'
    }).then(() => {

      // Tampilkan video
      const videoContainer = document.createElement('div');
      videoContainer.style.position = 'fixed';
      videoContainer.style.top = '0';
      videoContainer.style.left = '0';
      videoContainer.style.width = '100%';
      videoContainer.style.height = '100%';
      videoContainer.style.display = 'flex';
      videoContainer.style.justifyContent = 'center';
      videoContainer.style.alignItems = 'center';
      videoContainer.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
      videoContainer.style.zIndex = '1000';
      videoContainer.id = 'video-container'; // Tambahkan ID untuk referensi

      const iframe = document.createElement('iframe');
      iframe.src = 'https://www.youtube.com/embed/5DhAts7WcPk?si=nYWX8JpkYhaR8dg8'; // Ganti dengan URL video embed yang benar
      iframe.width = '560';
      iframe.height = '315';
      iframe.style.border = 'none';
      iframe.style.zIndex = '9999999'; // Hapus border
      iframe.id = 'video-iframe'; // Tambahkan ID untuk referensi

      const closeButton = document.createElement('button');
      closeButton.innerText = 'Close';
      closeButton.style.position = 'absolute';
      closeButton.style.top = '10px';
      closeButton.style.right = '10px';
      closeButton.style.padding = '10px';
      closeButton.style.backgroundColor = '#f44336';
      closeButton.style.color = '#fff';
      closeButton.style.border = 'none';
      closeButton.style.borderRadius = '5px';
      closeButton.style.cursor = 'pointer';

      closeButton.addEventListener('click', function() {
        // Hapus video dan tombol close
        videoContainer.remove();
        // Hidupkan kembali kamera
        startWebcam(); // Memanggil fungsi untuk memulai kembali webcam
      });

      videoContainer.appendChild(iframe);
      videoContainer.appendChild(closeButton);
      document.body.appendChild(videoContainer);

      // Pantau ketika video selesai
      const iframeElement = document.getElementById('video-iframe');
      iframeElement.addEventListener('load', function() {
        // YouTube API dapat digunakan untuk mendeteksi kapan video selesai
        const player = new YT.Player(iframeElement, {
          events: {
            'onStateChange': function(event) {
              if (event.data === YT.PlayerState.ENDED) {
                // Video selesai, hidupkan kembali kamera
               if (!stream) {
                startWebcam(); // Memanggil fungsi untuk memulai kembali webcam jika stream sudah dihentikan
              } // Memanggil fungsi untuk memulai kembali webcam
                // Hapus video dan tombol close setelah video selesai
                videoContainer.remove();
              }
            }
          }
        });
      });
    });
  }

  function distance(p1, p2) {
    return Math.sqrt(Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2));
  }
});
