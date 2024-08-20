@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>__lang('students')
        ]])
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
                                <th>ID Mahasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th colspan="2" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emosi as $studentData)
                            <tr>
                                <td>{{ $studentData['student_id'] }}</td>
                                <td>{{ $studentData['name'] }}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalChart{{ $studentData['student_id'] }}">Lihat Grafik</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDetails{{ $studentData['student_id'] }}">Lihat Detail Emosi</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>
@endsection

@section('footer')
    @foreach ($emosi as $studentData)
        <div class="modal fade" id="modalChart{{ $studentData['student_id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalChartLabel{{ $studentData['student_id'] }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalChartLabel{{ $studentData['student_id'] }}">Grafik Emosi Mahasiswa ID: {{ $studentData['student_id'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <canvas id="emosiChart{{ $studentData['student_id'] }}" width="800" height="400"></canvas>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal for Emotion Details -->
         <div class="modal fade" id="modalDetails{{ $studentData['student_id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalDetailsLabel{{ $studentData['student_id'] }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailsLabel{{ $studentData['student_id'] }}">Detail Emosi Mahasiswa ID: {{ $studentData['student_id'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            @foreach ($studentData['data'] as $data)
                                <li>
                                    <strong>{{ $data['course_name'] }} - {{ $data['lecture_title'] }}</strong>
                                    <ul>
                                        @foreach (explode('; ', $data['emotion']) as $emotion)
                                            @if (!empty($emotion))
                                                <li>{{ $emotion }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
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
                const emosiData = @json($studentData['data']);

                const labels = emosiData.map(item => `${item.course_name} - ${item.lecture_title}`);
                const emotionSets = {};

                emosiData.forEach(item => {
                    const emotions = item.emotion.split('; ').filter(Boolean);
                    emotions.forEach(emotion => {
                        const [label, value] = emotion.split(': ');
                        if (!emotionSets[label]) {
                            emotionSets[label] = [];
                        }
                        emotionSets[label].push(parseFloat(value));
                    });
                });

                const datasets = Object.keys(emotionSets).map(emotion => ({
                    label: emotion,
                    data: emotionSets[emotion],
                    borderColor: `hsl(${Math.random() * 360}, 70%, 50%)`,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }));

                const ctx = document.getElementById('emosiChart{{ $studentData['student_id'] }}').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                beginAtZero: true,
                                stacked: true
                            },
                            y: {
                                beginAtZero: true,
                                stacked: true
                            }
                        }
                    }
                });
            });
        </script>
    @endforeach

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('{{ adminUrl(array('controller'=>'student','action'=>'view'))}}'+'/'+id);
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
