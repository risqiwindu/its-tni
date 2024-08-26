document.addEventListener("DOMContentLoaded", function() {
    const video = document.getElementById("video-frame");
    const loader = document.getElementById("loader");
    let stream = null;
    let eyeClosureStart = null;
    let eyeClosureTimeout = null;
    let isCurrentlySleepy = false;
    let canvas = null;
    console.log("Loading models...");
  
    function loadModels() {
      return Promise.all([
        faceapi.nets.ssdMobilenetv1.loadFromUri("/its-tni/public/client/models"),
        faceapi.nets.faceRecognitionNet.loadFromUri("/its-tni/public/client/models"),
        faceapi.nets.faceExpressionNet.loadFromUri("/its-tni/public/client/models"),
        faceapi.nets.ageGenderNet.loadFromUri("/its-tni/public/client/models"),
        faceapi.nets.faceLandmark68Net.loadFromUri("/its-tni/public/client/models")
      ]).then(() => {
        console.log("Models loaded");
      }).catch((e) => {
        console.error("Failed to load models:", e);
        loader.innerText = "Failed to load models";
        throw e; // Rethrow error to be handled later
      });
    }
    
    function getLabeledFaceDescriptions() {
    //   const nama = document.getElementById('name').value;
      const labels = ["sandi", "bobi kurniawan", "armandino", "anisa", "fariz", "fuad", "zaidan", "airin", "anisa nur", "luiz", "zazeli", "ferdiansah", "sabila"];
      // const labels = [nama];
      console.log("Getting labeled face descriptions...");
      return Promise.all(labels.map(async (label) => {
        const descriptions = [];
        for (let i = 1; i <= 2; i++) {
          const img = await faceapi.fetchImage(`/its-tni/public/client/labels/${label}/${i}.jpg`);
          const detections = await faceapi.detectSingleFace(img)
            .withFaceLandmarks()
            .withFaceExpressions()
            .withAgeAndGender()
            .withFaceDescriptor();
          if (detections) {
            descriptions.push(detections.descriptor);
          }
        }
        return new faceapi.LabeledFaceDescriptors(label, descriptions);
      }));
    }
    
    let emotionData = {
      neutral: 0,
      happy: 0,
      sad: 0,
      angry: 0,
      fearful: 0,
      disgusted: 0,
      surprised: 0,
      yawning: 0,
      sleepy: 0,
      count: 0,
    };
  
    function startWebcam(labeledDescriptors) {
      console.log("Starting webcam...");
      navigator.mediaDevices.getUserMedia({ video: true, audio: false })
        .then((streamObj) => {
          stream = streamObj; // Save stream reference
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
      if (canvas) {
            canvas.remove();
        }
      canvas = faceapi.createCanvasFromMedia(video);
      document.getElementById("test").appendChild(canvas);
      const displaySize = { width: video.width, height: video.height };
      faceapi.matchDimensions(canvas, displaySize);
    
      function processVideoFrame() {
        faceapi.detectAllFaces(video)
          .withFaceLandmarks()
          .withFaceExpressions()
          .withAgeAndGender()
          .withFaceDescriptors()
          .then((detections) => {
            const resizedDetections = faceapi.resizeResults(detections, displaySize);
            canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
            faceapi.draw.drawDetections(canvas, resizedDetections);
            
            resizedDetections.forEach((detection) => {
              const { expressions, landmarks } = detection;
              const yawning = isYawning(landmarks.getMouth());
              const sleepy = isSleepy(landmarks.getLeftEye(), landmarks.getRightEye());
    
              if (yawning) {
                emotionData.yawning++;
                showNotificationAndPlayVideo();
              }
    
              if (sleepy) {
                if (eyeClosureStart === null) {
                  eyeClosureStart = Date.now();
                  console.log(eyeClosureStart);
                } else {
                  const elapsedTime = (Date.now() - eyeClosureStart) / 1000;
                  if (elapsedTime >= 5) {
                    if (!isCurrentlySleepy) {
                      emotionData.sleepy++;
                      isCurrentlySleepy = true;
                      showNotificationAndPlayVideo();
                      console.log(eyeClosureStart);
                    }
                  }
                }
              } else {
                eyeClosureStart = null;
                clearTimeout(eyeClosureTimeout);
                eyeClosureTimeout = null;
                isCurrentlySleepy = false;
              }
    
              updateEmotionData(expressions);
    
              const age = detection.age;
              const maxEmotion = Object.keys(expressions).reduce((a, b) =>
                expressions[a] > expressions[b] ? a : b
              );
              const result = faceMatcher.findBestMatch(detection.descriptor);
              const displayName = result.toString();
              const text = `${displayName}, ${age.toFixed(0)} years old, ${maxEmotion}, ${yawning ? "Yawning" : ""}, ${
                sleepy ? "Sleepy" : ""
              }`;
    
              const box = detection.detection.box;
              const anchor = { x: box.x, y: box.bottomRight.y };
              new faceapi.draw.DrawTextField([text], anchor).draw(canvas);
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
    
    function isYawning(mouth) {
      const horizontalDistance = faceapi.euclideanDistance(
        [mouth[0].x, mouth[0].y],
        [mouth[6].x, mouth[6].y]
      );
      const verticalDistance = faceapi.euclideanDistance(
        [mouth[13].x, mouth[13].y],
        [mouth[19].x, mouth[19].y]
      );
      return verticalDistance / horizontalDistance > 0.5;
    }
  
    function isSleepy(leftEye, rightEye) {
      const avgVerticalDistance = (faceapi.euclideanDistance(
        [leftEye[1].x, leftEye[1].y],
        [leftEye[5].x, leftEye[5].y]
      ) + faceapi.euclideanDistance(
        [rightEye[1].x, rightEye[1].y],
        [rightEye[5].x, rightEye[5].y]
      )) / 2;
      const avgHorizontalDistance = (faceapi.euclideanDistance(
        [leftEye[0].x, leftEye[0].y],
        [leftEye[3].x, leftEye[3].y]
      ) + faceapi.euclideanDistance(
        [rightEye[0].x, rightEye[0].y],
        [rightEye[3].x, rightEye[3].y]
      )) / 2;
      return avgVerticalDistance / avgHorizontalDistance < 0.25;
    }
  
    function updateEmotionData(expressions) {
      Object.keys(expressions).forEach((key) => {
        if (emotionData.hasOwnProperty(key)) {
          emotionData[key] += expressions[key];
        }
      });
      emotionData.count++;
    }
  
    // stopButton.addEventListener("click", () => {
    //   video.pause();
    //   video.srcObject.getTracks().forEach((track) => track.stop());
    //   analyzeEmotions();
    // });
  
//     function analyzeEmotions() {
//       if (emotionData.count > 0) {
//         const percentages = Object.keys(emotionData).reduce((acc, cur) => {
//           if (cur !== "count") {
//             acc[cur] =
//               ((emotionData[cur] / emotionData.count) * 100).toFixed(2) + "%";
//           }
//               return acc;
//           }, {});
  
//           const emotionEntries = Object.entries(percentages);
//           // Hitung waktu yang telah berlalu
//           const endTime = Date.now();
//           const elapsedTimeInMinutes = Math.floor((endTime - startTime) / 60000);
//           const lamaWaktu = document.getElementById("lamaWaktu");
//           // Set combined data to hidden input in form
//           const emotionInput = document.getElementById("emotionData");
//           if (emotionInput && lamaWaktu) {
//               emotionInput.value = JSON.stringify(emotionEntries);
//               lamaWaktu.value = elapsedTimeInMinutes;
//               // Submit the form
//               document.getElementById("emotionForm").submit();
//           } else {
//               console.error("Element with ID 'emotionData' not found.");
//           }
//       } else {
//           console.log("No emotions detected.");
//       }
//   }
  
    function resetDetection() {
      eyeClosureStart = null;
      clearTimeout(eyeClosureTimeout);
      eyeClosureTimeout = null;
      isCurrentlySleepy = false;
    }
  
  
    function showNotificationAndPlayVideo() {
      if (stream) {
        stream.getTracks().forEach(track => track.stop());
        video.style.display =  "none";
      }
  
      Swal.fire({
        title: 'User Mengantuk',
        text: 'Video akan ditampilkan',
        icon: 'info',
        confirmButtonText: 'OK'
      }).then(() => {
        resetDetection();
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
        videoContainer.id = 'video-container';
  
        const iframe = document.createElement('iframe');
        iframe.src = 'https://flappybird.io/';
        iframe.scrolling = 'no';
        iframe.width = '560';
        iframe.height = '600';
        iframe.style.border = 'none';
        iframe.id = 'video-iframe';
  
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
          videoContainer.remove();
          loader.style.display = "flex";
          video.style.display =  "block";
          loadModels()
            .then(getLabeledFaceDescriptions)
            .then(startWebcam)
            .catch((e) => {
              console.error("Failed to reload models:", e);
              loader.innerText = "Failed to reload models";
            });
        });
  
        videoContainer.appendChild(iframe);
        videoContainer.appendChild(closeButton);
        document.body.appendChild(videoContainer);
  
        const iframeElement = document.getElementById('video-iframe');
        iframeElement.addEventListener('load', function() {
          setTimeout(function() {
            if (videoContainer.parentNode) { // Check if the container is still visible
                videoContainer.remove();
                loader.style.display = "flex";
                video.style.display = "block";
                loadModels()
                    .then(getLabeledFaceDescriptions)
                    .then(startWebcam)
                    .catch((e) => {
                        console.error("Failed to reload models:", e);
                        loader.innerText = "Failed to reload models";
                    });
            }
        }, 60000);
        });
      });
    }
  
    loadModels()
      .then(getLabeledFaceDescriptions)
      .then(startWebcam)
      .catch((e) => {
        console.error("Failed to initialize:", e);
      });
  });
  