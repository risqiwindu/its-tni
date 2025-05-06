document.addEventListener("DOMContentLoaded", function() {
  const video = document.getElementById("video-frame");
  const stopButton = document.getElementById("stop-button");
  const lanjut = document.getElementById("lanjut");
  const loader = document.getElementById("loader");
  let stream = null;
  let eyeClosureStart = null;
  let eyeClosureTimeout = null;
  let isCurrentlySleepy = false;
  let canvas = null;
  let tampilanAudio = 'https://www.youtube.com/embed/5GesG4nWRO8?si=GtkHE-Gm9kc1tqXQ';
  let tampilanVisual = 'https://www.youtube.com/embed/JH6QhW_ar1o?si=7no5YhxP8_LinDqD';
  let tampilanKinestetik = 'https://www.youtube.com/embed/dPpRyEb-3tc';
  let tampil;
  let startTime;
  var videoId = 'video' + coba;
  var player = videojs(videoId);
  var isVideoPlaying = false; // Variabel untuk melacak status pemutaran
  let sleepCount = 0;

  // ... kode Anda yang lain ...
  
  player.on('play', () => {
      isVideoPlaying = true;
      stopButton.disabled = true;
  });
  

  player.on('ended', () => {
    isVideoPlaying = false;
    stopButton.disabled = false;
    stopWebcam();
  });
  
  // Pada awal eksekusi atau saat tombol play ditekan untuk pertama kali:
  if (!isVideoPlaying) {
      stopButton.disabled = true;
  }

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

    // var container = document.getElementById('data-container');
    // var labels = JSON.parse(container.getAttribute('data-label'));

    const nama = document.getElementById('name').value;
    const labels = [nama];

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
    if (!startTime) {
      startTime = Date.now(); // Catat waktu awal hanya jika belum ada
    }

    navigator.mediaDevices.getUserMedia({
      video: {
        width: { ideal: 320 },  // Resolusi ideal untuk lebar (bisa diubah sesuai kebutuhan)
        height: { ideal: 240 }, // Resolusi ideal untuk tinggi
      },
      audio: false
    })
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
  
    let frameCounter = 0;
    let frameSkip = 10; // Deteksi setiap 10 frame

     // Tambahan untuk deteksi user tidak ada
     let lastDetectionTime = Date.now();
     let userAbsentNotified = false;
    
    function processVideoFrame() {
      frameCounter++;
      
      // Cek apakah ini frame yang perlu dideteksi
      if (frameCounter % frameSkip === 0) {
        faceapi.detectAllFaces(video)
          .withFaceLandmarks()
          .withFaceExpressions()
          .withAgeAndGender()
          .withFaceDescriptors()
          .then((detections) => {
            const resizedDetections = faceapi.resizeResults(detections, displaySize);
            const ctx = canvas.getContext("2d");
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    faceapi.draw.drawDetections(canvas, resizedDetections);

                  //   if (detections.length > 0) {
                  //     lastDetectionTime = Date.now(); // Reset waktu saat wajah terdeteksi
                  //     userAbsentNotified = false; // Reset notifikasi
                  //     loader.style.display = "none";
                  //   } else {
                  //     const elapsed = (Date.now() - lastDetectionTime) / 1000;
                  //     if (elapsed >= 10 && !userAbsentNotified) {
                  //         userAbsentNotified = true;
                  //         notificationUser();
                  //     }
                  // }

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
                    eyeClosureStart = Date.now(); // Start tracking when eyes are closed
                } else {
                    const elapsedTime = (Date.now() - eyeClosureStart) / 1000; // Time in seconds
                    
                    // Check if 15 seconds have elapsed
                    if (elapsedTime >= 15) { 
                        sleepCount++; // Increment sleep count
                        console.log(sleepCount); // Log the count
                        
                        // Reset the eye closure start time for the next 15 seconds
                        eyeClosureStart = Date.now(); 
                    }
            
                    // Check if sleepCount reaches the threshold of 3
                    if (sleepCount >= 1) {
                        if (!isCurrentlySleepy) {
                            emotionData.sleepy++; // Increment the sleepy emotion data
                            isCurrentlySleepy = true; // Mark as currently sleepy
                            console.log('user mengantuk!'); // Log the sleepy state
                            showNotificationAndPlayVideo(); // Uncomment to trigger notification
                            lastDetectionTime = Date.now(); 
                            userAbsentNotified = false;     
                            sleepCount = 0;
                        }
                    }
                }
            } else {
                eyeClosureStart = null;
                clearTimeout(eyeClosureTimeout);
                eyeClosureTimeout = null;
                lastSleepyTime = null;
                isCurrentlySleepy = false;
              }
    
              updateEmotionData(expressions);
    
              const age = detection.age;
              const maxEmotion = Object.keys(expressions).reduce((a, b) =>
                expressions[a] > expressions[b] ? a : b
              );
              const result = faceMatcher.findBestMatch(detection.descriptor);
              const displayName = result.toString();
              let status = "";

              if (sleepy) {
                status = "Sleepy";
              } else if (yawning) {
                status = "Yawning";
                } else {
              status = maxEmotion;
              }

              const text = `${displayName}, ${age.toFixed(0)} years old, ${status}`;

              // const text = `${displayName}, ${age.toFixed(0)} years old, ${maxEmotion}, ${yawning ? "Yawning" : ""}, ${
              //   sleepy ? "Sleepy" : ""
              // }`;
    
              const box = detection.detection.box;
              const anchor = { x: box.x, y: box.bottomRight.y };
              new faceapi.draw.DrawTextField([text], anchor).draw(canvas);
            });
    
            if (detections.length > 0) {
              loader.style.display = "none";
            }
          })
          .catch((error) => {
            console.error("Error processing video frame:", error);
          });
      }
    
      requestAnimationFrame(processVideoFrame);
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

  stopButton.addEventListener("click", () => {
    video.pause();
    video.srcObject.getTracks().forEach((track) => track.stop());
    analyzeEmotions();
  });

//   function analyzeEmotions() {
//     if (emotionData.count > 0) {
//       const percentages = Object.keys(emotionData).reduce((acc, cur) => {
//         if (cur !== "count") {
//           acc[cur] =
//             ((emotionData[cur] / emotionData.count) * 100).toFixed(2) + "%";
//         }
//             return acc;
//         }, {});

//         const emotionEntries = Object.entries(percentages);
//         // Hitung waktu yang telah berlalu
//         const akses = new Date();
//         const endTime = Date.now();
//         const elapsedTimeInMinutes = Math.floor((endTime - startTime) / 60000);
//         const lamaWaktu = document.getElementById("lamaWaktu");
//         //waktu akses
//         const day = String(akses.getDate()).padStart(2, '0');
//         const month = String(akses.getMonth() + 1).padStart(2, '0'); // bulan dimulai dari 0
//         const year = akses.getFullYear();
//         const hours = String(akses.getHours()).padStart(2, '0');
//         const minutes = String(akses.getMinutes()).padStart(2, '0');
//         const seconds = String(akses.getSeconds()).padStart(2, '0');

//         const formattedDate = `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
//         const waktuAkses = document.getElementById("waktuAkses");
//         // Set combined data to hidden input in form
//         const emotionInput = document.getElementById("emotionData");
//         if (emotionInput && lamaWaktu) {
//             emotionInput.value = JSON.stringify(emotionEntries);
//             lamaWaktu.value = elapsedTimeInMinutes;
//             waktuAkses.value = formattedDate;
//             // Submit the form
//             // document.getElementById("emotionForm").submit();
//             // hideElement("layout_content");
//             // showElement(results-page);
//             displayResults(percentages);
//         } else {
//             console.error("Element with ID 'emotionData' not found.");
//         }
//     } else {
//         console.log("No emotions detected.");
//     }
// }

function analyzeEmotions() {
  if (emotionData.count > 0) {
      // Ambil semua emosi kecuali "count"
      const emotionKeys = Object.keys(emotionData).filter(key => key !== "count");

      // Hitung total nilai asli emosi
      const totalRaw = emotionKeys.reduce((sum, key) => sum + emotionData[key], 0);

      // Hitung persentase ter-normalisasi agar total 100%
      let rawPercentages = emotionKeys.map(key => ({
          emotion: key,
          value: (emotionData[key] / totalRaw) * 100
      }));

      // Bulatkan ke 2 desimal (sementara)
      let rounded = rawPercentages.map(e => ({
          emotion: e.emotion,
          value: parseFloat(e.value.toFixed(2))
      }));

      // Koreksi selisih agar total = 100%
      let totalRounded = rounded.reduce((sum, e) => sum + e.value, 0);
      let difference = parseFloat((100 - totalRounded).toFixed(2));

      // Tambahkan selisih ke nilai tertinggi (untuk menghindari angka negatif)
      if (difference !== 0) {
          let maxEmotion = rounded.reduce((max, e) => e.value > max.value ? e : max, rounded[0]);
          maxEmotion.value = parseFloat((maxEmotion.value + difference).toFixed(2));
      }

      // Format ke bentuk object untuk display
      const percentages = {};
      rounded.forEach(e => {
          percentages[e.emotion] = e.value.toFixed(2) + "%";
      });

      const emotionEntries = Object.entries(percentages);

      // Hitung waktu akses
      const akses = new Date();
      const endTime = Date.now();
      const elapsedTimeInMinutes = Math.floor((endTime - startTime) / 60000);

      const day = String(akses.getDate()).padStart(2, '0');
      const month = String(akses.getMonth() + 1).padStart(2, '0');
      const year = akses.getFullYear();
      const hours = String(akses.getHours()).padStart(2, '0');
      const minutes = String(akses.getMinutes()).padStart(2, '0');
      const seconds = String(akses.getSeconds()).padStart(2, '0');
      const formattedDate = `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;

      // Simpan ke input tersembunyi
      const emotionInput = document.getElementById("emotionData");
      const lamaWaktu = document.getElementById("lamaWaktu");
      const waktuAkses = document.getElementById("waktuAkses");

      if (emotionInput && lamaWaktu && waktuAkses) {
          emotionInput.value = JSON.stringify(emotionEntries);
          lamaWaktu.value = elapsedTimeInMinutes;
          waktuAkses.value = formattedDate;

          displayResults(percentages);
      } else {
          console.error("Elemen input tersembunyi tidak ditemukan.");
      }
  } else {
      console.log("Tidak ada emosi terdeteksi.");
  }
}


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

    // Check if the video is in full-screen mode
    if (document.fullscreenElement) {
      document.exitFullscreen();
    }
    if (player) {
        player.pause(); // Pause the video
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

      if(kategori == 1){
        tampil = tampilanVisual;
      }else if(kategori == 2){
        tampil = tampilanAudio;
      }else if(kategori == 3){
        tampil = tampilanKinestetik;
      }

      const iframe = document.createElement('iframe');
      iframe.src = tampil;
      iframe.width = '560';
      iframe.height = '315';
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
          .then(function() {
            return player.play();  // Menggunakan return agar bisa menangani potential promise dari play()
          })
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
                .then(function() {
                  player.muted(false);
                  return player.play();  // Menggunakan return agar bisa menangani potential promise dari play()
                })
                .catch((e) => {
                    console.error("Failed to reload models:", e);
                    loader.innerText = "Failed to reload models";
                });
        }
      }, 60000);
      });
    });
  }

  function notificationUser()
  {
    if (stream) {
      stream.getTracks().forEach(track => track.stop());
      video.style.display =  "none";
    }

    // Check if the video is in full-screen mode
    if (document.fullscreenElement) {
      document.exitFullscreen();
    }
    if (player) {
        player.pause(); // Pause the video
    }

    Swal.fire({
      title: 'User Tidak Ada',
      text: 'Pastikan anda berada didalam frame kamera',
      icon: 'info',
      confirmButtonText: 'OK'
    }).then(() => {
      resetDetection();
      loader.style.display = "flex";
      video.style.display = "block";
      loadModels()
          .then(getLabeledFaceDescriptions)
          .then(startWebcam)
          .then(function() {
            return player.play();  // Menggunakan return agar bisa menangani potential promise dari play()
          })
          .catch((e) => {
            console.error("Failed to reload models:", e);
            loader.innerText = "Failed to reload models";
          });
    });

  }

  function stopWebcam() {
    if (stream) {
      stream.getTracks().forEach(track => track.stop());
      video.srcObject = null; 
      video.style.display = "none"; // Hide the video element
      canvas.remove();
      resetDetection();
      analyzeEmotions();
      if (document.fullscreenElement) {
        document.exitFullscreen();
      }
    }
  }

  function displayResults(percentages) {
    document.getElementById('results-page').style.display = 'block';
    document.getElementById('layout_content').style.display = 'none';
    const tbody = document.getElementById("results-table").getElementsByTagName("tbody")[0];
    tbody.innerHTML = "";
    

    let highestEmotion = '';
    let highestPercentage = 0;
    let combinedSleepyYawnPercentage = 0;
    let totalPercentage = 0;
    let emotionCount = 0;
    let validEmotionCount = 0; // Count of emotions excluding yawning and sleepy
    let validTotalPercentage = 0; // Total percentage for valid emotions

    // Populate the results table with emotion data
    Object.entries(percentages).forEach(([emotion, percentage]) => {
        const row = tbody.insertRow();
        const cellEmotion = row.insertCell(0);
        const cellPercentage = row.insertCell(1);
        cellEmotion.textContent = emotion;
        cellPercentage.textContent = percentage;

        let percValue = parseFloat(percentage);
        
        // Update highest emotion
        if (percValue > highestPercentage) {
            highestPercentage = percValue;
            highestEmotion = emotion;
        }

        // Calculate combined percentage for 'yawning' and 'sleepy'
        if (emotion === 'yawning' || emotion === 'sleepy') {
            combinedSleepyYawnPercentage += percValue;
        }else{
          validTotalPercentage += percValue;
          validEmotionCount++;
        }

        // Add to total percentage
        totalPercentage += percValue;
        emotionCount++;
    });
    let averageEmotionPercentage = validEmotionCount > 0 ? validTotalPercentage / validEmotionCount : 0;

    document.getElementById("label").innerText = `
      Hasil Deteksi Ekspresi :
      Eskpresi Tertinggi (Persentase)          : ${highestEmotion} (${highestPercentage.toFixed(2)}%)
      Persentase Mengantuk                  : ${combinedSleepyYawnPercentage.toFixed(2)}%
    `;

    // Rata-rata Persentase Eskpresi Terdeteksi : ${averageEmotionPercentage.toFixed(2)}%
}

lanjut.addEventListener("click", () => {
    document.getElementById("emotionForm").submit();
});

  loadModels()
    .then(getLabeledFaceDescriptions)
    .then(startWebcam)
    .catch((e) => {
      console.error("Failed to initialize:", e);
    });
});
