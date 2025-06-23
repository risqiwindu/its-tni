@extends('layouts.admin')
@section('innerTitle','Laporan Keseluruhan Sistem')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            route('admin.report.detail_kelas')=>'Laporan',
            route('admin.report.pilih_laporan')=>'Pilih Laporan',
            '#'=>'Laporan Keseluruhan Sistem'
        ]])
@endsection

@section('search-form')
<form class="form-inline mr-auto" method="get" action="{{ route('admin.report.rekap') }}">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input value="{{ request()->get('filter') }}"   name="filter" class="form-control" type="search" placeholder="{{ __lang('search') }}" aria-label="{{ __lang('search') }}" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection
@section('content')

<div class="row">
    <div class="col-md-6">
        <canvas id="emotionChart"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="scoreChart"></canvas>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>NIP / NRP</th>
            <th>Gaya Belajar</th>
            <th>Ekspresi Tertinggi(%)</th>
            <th>Nilai Ujian</th>
            <th>Nilai Sikap</th>
            <th colspan="2" class="text-center">Nilai Akhir</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($filteredHasil as $row)
            @if ( $row->highest_percentage > 0)
            <tr>
                <td>{{ $row->student_name }}</td>
                <td>{{ $row->nrp }}</td>
                <td>{{ $row->gaya_belajar }}</td>
                <td>{{ $row->highest_emotion }} ({{ $row->highest_percentage }}%) - {{ $row->category_name }}</td>
                <td>{{ $row->score }}</td>
                @php
                    $nilai = $nilai_sikap->firstWhere('student_id', $row->id);
                @endphp
                @if ($nilai)
                    <td class="text-center">{{ rtrim(rtrim(number_format($nilai->nilai_akhir, 2, ',', '.'), '0'), ',') }}</td>
                @else
                    <td>Nilai belum ada / belum diisi</td>
                @endif
                <td>Nilai Akhir</td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoModal-{{ $row->id }}">
                        Detail
                    </button>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart for Emotions
    var ctx1 = document.getElementById('emotionChart').getContext('2d');
var emotionChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: {!! json_encode(array_keys($categoryEmotions)) !!},
        datasets: [{
            label: 'Ekspresi Tertinggi',
            data: {!! json_encode(array_column($categoryEmotions, 'percentage')) !!},
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                min: 0,
                ticks: {
                    stepSize: 25,
                    callback: function(value) {
                        return value + '%'; // Menambahkan simbol % pada sumbu y
                    }
                },
                title: {
                    display: true,
                    text: 'PERSENTASE',
                    font: {
                        weight: 'bold'  // Menebalkan teks pada sumbu Y
                    }
                }
            },
            x: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'GAYA BELAJAR',
                    font: {
                            weight: 'bold'  // Menebalkan teks pada sumbu Y
                        }
                }
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        var emotionLabel = {!! json_encode(array_column($categoryEmotions, 'emotion')) !!}[tooltipItem.dataIndex];
                        return emotionLabel + ': ' + tooltipItem.raw + '%';
                    }
                }
            }
        }
    }
});


    // Chart for Scores
    var ctx2 = document.getElementById('scoreChart').getContext('2d');
    var scoreChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($categoryScores)) !!},
            datasets: [{
                label: 'Nilai Tertinggi',
                data: {!! json_encode(array_values($categoryScores)) !!},
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    min: 0,
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20
                    },
                    title: {
                        display: true,
                        text: 'NILAI',
                        font: {
                            weight: 'bold'  // Menebalkan teks pada sumbu Y
                        }
                    }
                },
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'GAYA BELAJAR',
                        font: {
                            weight: 'bold'  // Menebalkan teks pada sumbu Y
                        }
                    }
                }
            }
        }
    });
</script>
@endsection