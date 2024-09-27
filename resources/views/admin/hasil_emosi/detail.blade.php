@extends('layouts.admin')
@section('page-title', '')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard') => 'Dashboard',
            '#' => __lang('students')
        ]
    ])
@endsection

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .modal-fullscreen .modal-dialog {
    max-width: 100%;
    margin: 0;
    height: 100%;
}

.modal-fullscreen .modal-content {
    height: 100%;
    border: none;
    border-radius: 0;
}

.modal-fullscreen .modal-body {
    height: calc(100% - 56px - 58px); /* 56px for header and 58px for footer */
    overflow-y: auto;
}

.modal-fullscreen .modal-header, 
.modal-fullscreen .modal-footer {
    border: none;
}

</style>

@section('content')
<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h2>Siswa : {{ $nama }}</h2>
            </div>
            <div class="card-body">
        
        
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-pills" role="tablist">
                        <li class="nav-item"><a  class="nav-link active" href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Evaluasi</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"  href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Kesimpulan</a>
                        </li>
        
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane table-responsive active in" id="tab_content1" aria-labelledby="home-tab">
                            <table id="emotionTable" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Materi</th>
                                        <th rowspan="2">Tanggal Akses</th>
                                        <th rowspan="2">Lama Akses</th>
                                        <th colspan="2" class="text-center">Kesimpulan</th>
                                        <th colspan="2" rowspan="2" class="text-center">Detail</th>
                                    </tr>
                                    <tr>
                                        {{-- <th class="text-center">Rata Rata Emosi</th> --}}
                                        <th class="text-center">Dominasi Ekspresi (Persen)</th>
                                        <th class="text-center">Mengantuk (Persen)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    
                                    @foreach ($emosi as $studentData)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}</td>
                                        <td class="text-center">{{ $studentData['lecture_title'] }}</td>
                                        <td class="text-center">{{ $studentData['tanggal'] }}</td>
                                        <td class="text-center">{{ $studentData['lama'] }}</td>
                                        {{-- <td>{{ $studentData['average'] }}</td> --}}
                                        <td class="text-center">{{ $studentData['highestEmotion'] }}</td>
                                        <td class="text-center">{{ $studentData['combinedSleepyYawnPercentage'] }}</td>
                                        {{-- <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalChart{{ $studentData['lecture_id'] }}">Lihat Grafik</button>
                                        </td> --}}
                                        <td class="text-center">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalDetails{{ $studentData['lecture_id'] }}">Lihat Detail Ekspresi</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        
                        <div role="tabpanel" class="tab-pane table-responsive" id="tab_content2" aria-labelledby="profile-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Kesimpulan</th>
                                        <th rowspan="2" class="text-center">Detail</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Rata Rata Ekpresi (Persen)</th>
                                        <th class="text-center">Dominasi Ekspresi (Persen)</th>
                                        <th class="text-center">Mengantuk (Persen)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @foreach ($akhir_emosi['emotion_averages'] as $emotion => $average)
                                                @if($average > 0)
                                                <li>{{ ucfirst($emotion) }}: {{ number_format($average, 2) }}%</li>
                                                @endif
                                            @endforeach
                                    </td>
                                        <td class="text-center">{{ ucfirst($akhir_emosi['highest_emotion']) }} ({{ number_format($akhir_emosi['highest_percentage'], 2) }}%)</td>
                                        <td class="text-center">{{ number_format($akhir_emosi['sleepy_percentage'], 2) }}%</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#akhir_emosi">Lihat Grafik</button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
        
                    </div>
                </div>
        
            </div>
        </div>
    </div><!--end .col-lg-12 -->
</div>
@endsection

@section('footer')
    @foreach ($emosi as $studentData)
        <!-- Modal for Emotion Chart -->
        <div class="modal fade" id="modalChart{{ $studentData['lecture_id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalChartLabel{{ $studentData['student_id'] }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalChartLabel{{ $studentData['lecture_id'] }}">Grafik Emosi Mahasiswa ID: {{ $studentData['student_id'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <canvas id="emosiChart{{ $studentData['lecture_id'] }}" width="800" height="400"></canvas>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Emotion Details -->
        <div class="modal fade" id="modalDetails{{ $studentData['lecture_id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalDetailsLabel{{ $studentData['student_id'] }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailsLabel{{ $studentData['lecture_id'] }}">Detail Emosi Mahasiswa ID: {{ $studentData['student_id'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>
                                <strong>{{ $studentData['course_name'] }} - {{ $studentData['lecture_title'] }}</strong>
                                <ul>
                                    @foreach (explode('; ', $studentData['emotion']) as $emotion)
                                        @if (!empty($emotion))
                                            <li>{{ $emotion }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const emotionData{{ $studentData['lecture_id'] }} = @json($studentData['emotion_encode']);

                if (!Array.isArray(emotionData{{ $studentData['lecture_id'] }})) {
                    console.error('Emotion data is not an array:', emotionData{{ $studentData['lecture_id'] }});
                    return;
                }

                const labels{{ $studentData['lecture_id'] }} = emotionData{{ $studentData['lecture_id'] }}.map(item => item[0]);
                const percentages{{ $studentData['lecture_id'] }} = emotionData{{ $studentData['lecture_id'] }}.map(item => parseFloat(item[1]));

                const ctx{{ $studentData['lecture_id'] }} = document.getElementById('emosiChart{{ $studentData['lecture_id'] }}').getContext('2d');
                new Chart(ctx{{ $studentData['lecture_id'] }}, {
                    type: 'line',
                    data: {
                        labels: labels{{ $studentData['lecture_id'] }},
                        datasets: [{
                            label: 'Emotion Percentage',
                            data: percentages{{ $studentData['lecture_id'] }},
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: false
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endforeach

    <div class="modal fade modal-fullscreen" id="akhir_emosi" tabindex="-1" role="dialog" aria-labelledby="akhir_emosi" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="akhir_emosi">Grafik Akhir Deteksi Emosi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="emosiChart" width="800" height="400"></canvas>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil data dari variabel akhir_emosi
            const emotionAverages = @json($akhir_emosi['emotion_averages']);
            const highestEmotion = @json($akhir_emosi['highest_emotion']);
            const highestPercentage = @json($akhir_emosi['highest_percentage']);
            const sleepyPercentage = @json($akhir_emosi['sleepy_percentage']);
    
            // Ambil label emosi dan persentase dari data akhir
            const labels = Object.keys(emotionAverages); // Nama emosi (neutral, happy, sad, etc.)
            const percentages = Object.values(emotionAverages); // Persentase rata-rata dari setiap emosi
    
            // Dapatkan konteks untuk canvas Chart.js
            const ctx = document.getElementById('emosiChart').getContext('2d');
    
            // Buat grafik menggunakan Chart.js
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels, // Labels adalah nama emosi
                    datasets: [{
                        label: 'Emotion Average Percentage',
                        data: percentages, // Persentase rata-rata emosi
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang
                        borderColor: 'rgba(75, 192, 192, 1)', // Warna border
                        borderWidth: 2, // Ketebalan border
                        fill: false // Tidak mengisi area di bawah garis
                    }]
                },
                options: {
                scales: {
                    y: {
                        beginAtZero: true, // Mulai dari 0
                        ticks: {
                            callback: function(value) {
                                return value.toFixed(2) + '%'; // Tampilkan 2 angka di belakang koma dan simbol persen
                            }
                        }
                    }
                },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Average Emotion and Sleepy Detection'
                        }
                    }
                }
            });
    
            // Menampilkan detail emosi tertinggi dan persentase mengantuk
            document.getElementById('highestEmotion').innerText = 'Highest Emotion: ' + highestEmotion + ' (' + highestPercentage.toFixed(2) + '%)';
            document.getElementById('sleepyPercentage').innerText = 'Sleepy Percentage: ' + sleepyPercentage.toFixed(2) + '%';
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let emosiChart; // Definisikan variabel untuk chart di luar event listener modal
        
            // Fungsi untuk membuat grafik
            function createChart() {
                const ctx = document.getElementById('emosiChart').getContext('2d');
                const emotionsData = @json($coba);
                const labels = [];
                const datasets = [];
        
                // Siapkan dataset untuk setiap emosi
                for (const [emotion, values] of Object.entries(emotionsData)) {
                    const data = [];
                    const combinedLabels = [];
                    values.forEach(entry => {
                        const combinedLabel = `${entry.materi}`; // Gabungkan tanggal dan materi
                        combinedLabels.push(combinedLabel);
                        data.push(entry.value);
                    });
        
                    // Tambahkan label hanya sekali
                    if (labels.length === 0) {
                        labels.push(...combinedLabels);
                    }
        
                    datasets.push({
                        label: emotion.charAt(0).toUpperCase() + emotion.slice(1),
                        data: data,
                        borderColor: getRandomColor(),
                        backgroundColor: getRandomColor(0.2),
                        fill: false,
                        tension: 0.1 // Untuk garis yang lurus
                    });
                }
        
                function getRandomColor(alpha = 1) {
                    const r = Math.floor(Math.random() * 255);
                    const g = Math.floor(Math.random() * 255);
                    const b = Math.floor(Math.random() * 255);
                    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
                }
    
                if (emosiChart) {
                    emosiChart.destroy(); // Hancurkan chart lama jika sudah ada
                }
        
                emosiChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels, // Label untuk sumbu X
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category',
                                labels: labels,
                                title: {
                                    display: true,
                                    text: 'Tanggal dan Materi' // Label untuk sumbu X
                                },
                                ticks: {
                                    autoSkip: false, // Menampilkan semua label
                                    maxRotation: 45, // Rotasi label jika terlalu panjang
                                    minRotation: 45 // Rotasi minimum
                                }
                            },
                            y: {
                        beginAtZero: true,
                        title: {
                            display: true,  // Pastikan title diaktifkan
                            text: 'Tingkat Emosi dalam Persentase (%)',  // Label untuk sumbu Y
                            font: {        // Atur font jika diperlukan
                                size: 14,
                                weight: 'bold',
                                family: 'Arial'
                            }
                        },
                        ticks: {
                            stepSize: 10, // Mengatur skala y dalam kelipatan 10
                            callback: function(value) {
                                return value + '%';  // Menambahkan '%' di setiap nilai sumbu Y
                            }
                        }
                    }
                },
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });
            }
    
            // Tambahkan event listener saat modal ditampilkan
            $('#akhir_emosi').on('shown.bs.modal', function () {
                createChart(); // Buat grafik setelah modal dibuka
            });
        });
    </script>
    
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
