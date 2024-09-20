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
                <li class="nav-item"><a class="nav-link"  href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Evaluasi</a>
                </li>
                <li class="nav-item"><a class="nav-link"  href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Kesimpulan</a>
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
                    @php
                        $no = 0;
                    @endphp
                    <table class="table table-striped text-center">
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
                                <th class="text-center">Dominasi Eskpresi (Persen)</th>
                                <th class="text-center">Mengantuk (Persen)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emosi as $studentData)
                            <tr>
                                <td>{{ $no = $no + 1 }}</td>
                                <td>{{ $studentData['lecture_title'] }}</td>
                                <td>{{ $studentData['tanggal'] }}</td>
                                <td>{{ $studentData['lama'] }}</td>
                                {{-- <td>{{ $studentData['average'] }}</td> --}}
                                <td>{{ $studentData['highestEmotion'] }}</td>
                                <td>{{ $studentData['combinedSleepyYawnPercentage'] }}</td>
                                {{-- <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalChart{{ $studentData['lecture_id'] }}">Lihat Grafik</button>
                                </td> --}}
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDetails{{ $studentData['lecture_id'] }}">Lihat Detail Ekspresi</button>
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
                                <th class="text-center">Rata Rata Ekspresi</th>
                                <th class="text-center">Dominasi Ekpresi (Persen)</th>
                                <th class="text-center">Mengantuk (Persen)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @foreach ($akhir_emosi['emotion_averages'] as $emotion => $average)
                                    <li>{{ ucfirst($emotion) }}: {{ number_format($average, 2) }}%</li>
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
            const ctx = document.getElementById('emosiChart').getContext('2d');
            // Ambil data dari Blade
        const emotionsData = @json($coba);
        const labels = [];
        const datasets = [];

        // Siapkan dataset untuk setiap emosi
        for (const [emotion, values] of Object.entries(emotionsData)) {
            const data = [];
            const combinedLabels = [];
            values.forEach(entry => {
                const combinedLabel = `${entry.date} - ${entry.materi}`; // Gabungkan tanggal dan materi
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

        new Chart(ctx, {
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
                            text: 'Tanggal Materi'
                        },
                        ticks: {
                        autoSkip: false, // Menampilkan semua label
                        maxRotation: 45, // Rotasi label jika terlalu panjang
                        minRotation: 45, // Rotasi minimum
                    }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Persentase (%)'
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
    });
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
