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
</style>

@section('content')
<div>
    <div>
        <div class="card">
            <div class="card-body">
                <!-- Tabel Data Emosi -->
                <div class="table-responsive">
                    <table id="emotionTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">ID Mahasiswa</th>
                                <th rowspan="2">Nama Mahasiswa</th>
                                <th rowspan="2">Materi</th>
                                <th rowspan="2">Lama Siswa Mengakses Materi</th>
                                <th colspan="3" class="text-center">Kesimpulan</th>
                                <th colspan="2" rowspan="2" class="text-center">Detail</th>
                            </tr>
                            <tr>
                                <th class="text-center">Rata Rata Emosi</th>
                                <th class="text-center">Dominasi Emosi (Persentase)</th>
                                <th class="text-center">Persentase Mengantuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emosi as $studentData)
                            <tr>
                                <td>{{ $studentData['student_id'] }}</td>
                                <td>{{ $studentData['name'] }}</td>
                                <td>{{ $studentData['lecture_title'] }}</td>
                                <td>{{ $studentData['lama'] }}</td>
                                <td>{{ $studentData['average'] }}</td>
                                <td>{{ $studentData['highestEmotion'] }}</td>
                                <td>{{ $studentData['combinedSleepyYawnPercentage'] }}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalChart{{ $studentData['lecture_id'] }}">Lihat Grafik</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDetails{{ $studentData['lecture_id'] }}">Lihat Detail Emosi</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--end .card-body -->
        </div><!--end .card -->
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
