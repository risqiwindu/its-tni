@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>$customCrumbs])
@endsection

@section('content')
<div class="mb-3">
    <div style="text-align: center"><h2>{{ $percentage }}%</h2></div>
    <div class="progress">
        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $percentage }}" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}"></div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h2>{{ $row->course_name }}</h2>
    </div>
    <div class="card-body">


        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-pills" role="tablist">
                <li class="nav-item"><a  class="nav-link active" href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">{{ __lang('classes-attended') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link"  href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{{ __lang('test-results') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link"  href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Emosi Belajar</a>
                </li>
                <li class="nav-item"><a class="nav-link"  href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Hasil Akhir Emosi Belajar</a>
                </li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane   active in" id="tab_content1" aria-labelledby="home-tab">
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th>{{ __lang('class') }}</th>
                            <th>{{ __lang('date') }}</th>
                            <th>{{ __lang('action') }}</th>
                        </tr>
                        </thead>
                        @php foreach($attended as $row):  @endphp
                            <tr>
                                <td>{{ htmlentities( $row->name) }}</td>
                                <td>{{ htmlentities( showDate('d/M/Y',$row->attendance_date)) }}</td>
                                <td><button title="Delete" onclick="openPopup('{{ adminUrl(array('controller'=>'student','action'=>'deleteattendance','id'=>$row->id)) }}')" href=""  class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="{{__lang('delete')}}"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        @php endforeach;  @endphp
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane  " id="tab_content2" aria-labelledby="profile-tab">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ __lang('test') }}</th>
                            <th>{{ __lang('result') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @php foreach($testResults as $value):  @endphp
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->score }}% (@if($value->score >= $value->passmark)
                                            <span style="color: green">{{ __lang('Passed') }}</span>
                                        @else
                                            <span style="color: red">{{ __lang('Failed') }}</span>
                                        @endif)</td>
                                    <td> <a onclick="openModal('{{ $value->name }} {{ $value->last_name }}','{{ adminUrl(array('controller'=>'test','action'=>'testresult','id'=>$value->id)) }}')"  href="javascript:;" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="{{ __lang('view-result') }}"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @php endforeach;  @endphp
                        </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane table-responsive" id="tab_content3" aria-labelledby="profile-tab">
                    <table class="table table-striped">
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

                <div role="tabpanel" class="tab-pane table-responsive" id="tab_content4" aria-labelledby="profile-tab">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center">Kesimpulan</th>
                                <th rowspan="2" class="text-center">Detail</th>
                            </tr>
                            <tr>
                                <th class="text-center">Rata Rata Emosi</th>
                                <th class="text-center">Dominasi Emosi (Persentase)</th>
                                <th class="text-center">Persentase Mengantuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @foreach ($akhir_emosi['emotion_averages'] as $emotion => $average)
                                    <li>{{ ucfirst($emotion) }}: {{ number_format($average, 2) }}%</li>
                                    @endforeach
                            </td>
                                <td>{{ ucfirst($akhir_emosi['highest_emotion']) }} ({{ number_format($akhir_emosi['highest_percentage'], 2) }}%)</td>
                                <td>{{ number_format($akhir_emosi['sleepy_percentage'], 2) }}%</td>
                                <td>
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

    <div class="modal fade" id="akhir_emosi" tabindex="-1" role="dialog" aria-labelledby="akhir_emosi" aria-hidden="true">
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

    <script>
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
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
