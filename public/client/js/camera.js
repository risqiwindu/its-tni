document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('check-camera-btn').addEventListener('click', function() {
        navigator.mediaDevices.enumerateDevices()
            .then(function(devices) {
                let cameraAvailable = false;
                devices.forEach(function(device) {
                    if (device.kind === 'videoinput') {
                        cameraAvailable = true;
                    }
                });

                // Kirim data ke backend
                fetch("{{ route('check.camera') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ cameraAvailable: cameraAvailable })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.status === 'success') {
                        document.getElementById('camera-status').innerText = cameraAvailable ? 'Camera is available' : 'No camera found';
                    } else {
                        document.getElementById('camera-status').innerText = 'Error in backend processing';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('camera-status').innerText = 'Error: ' + error.message;
                });
            })
            .catch(function(err) {
                document.getElementById('camera-status').innerText = 'Error: ' + err.name + ': ' + err.message;
            });
    });
});