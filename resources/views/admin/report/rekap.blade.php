@extends('layouts.admin')
@section('innerTitle','Laporan Keseluruhan Sistem')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            route('admin.report.detail_kelas')=>'Laporan',
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
            <th>Nilai Tugas</th>
            <th>Nilai Ujian</th>
            <th>Nilai Sikap</th>
            <th>Nilai Akhir</th>
            <th>Indeks</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($filteredHasil as $row)
                @if ($row->highest_percentage > 0)
                @php
                    $huruf = '';
                    $angka = 0;
                    $kategori = '';

                    $nilai_tugas = $data->firstWhere('student_id', $row->id);
                    $nilai_ujian_obj = $data_ujian->firstWhere('student_id', $row->id);
                    $nilai_sikap_siswa = $nilai_sikap->firstWhere('student_id', $row->id);
        
                    $rata_tugas = $nilai_tugas->rata_rata ?? 0;
                    $rata_ujian = $nilai_ujian_obj->rata_rata ?? 0;
                    $sikap = $nilai_sikap_siswa->nilai_akhir ?? 0;
        
                    $nilai_akhir_tugas = $nilai_tugas->bobot_15_persen ?? 0;
                    $nilai_akhir_ujian = $nilai_ujian_obj->bobot_80_persen ?? 0;
                    $nilai_akhir_sikap = $sikap * 0.05;
        
                    $total_akhir = $nilai_akhir_tugas + $nilai_akhir_ujian + $nilai_akhir_sikap;
                    if ($total_akhir >= 90 && $total_akhir <= 100) {
        $huruf = 'A';
        $angka = 4.0;
        $kategori = 'Istimewa';
    } elseif ($total_akhir >= 85) {
        $huruf = 'A-';
        $angka = 3.7;
        $kategori = 'Cukup Istimewa';
    } elseif ($total_akhir >= 80) {
        $huruf = 'B+';
        $angka = 3.4;
        $kategori = 'Sangat Baik';
    } elseif ($total_akhir >= 75) {
        $huruf = 'B';
        $angka = 3.0;
        $kategori = 'Baik';
    } elseif ($total_akhir >= 70) {
        $huruf = 'B-';
        $angka = 2.7;
        $kategori = 'Cukup Baik';
    } elseif ($total_akhir >= 65) {
        $huruf = 'C+';
        $angka = 2.4;
        $kategori = 'Sangat Cukup';
    } elseif ($total_akhir >= 60) {
        $huruf = 'C';
        $angka = 2.0;
        $kategori = 'Cukup';
    } elseif ($total_akhir >= 55) {
        $huruf = 'D';
        $angka = 1.0;
        $kategori = 'Kurang';
    } else {
        $huruf = 'E';
        $angka = 0.0;
        $kategori = 'Gagal';
    }
                @endphp
                <tr>
                    <td>{{ $row->student_name }}</td>
                    <td>{{ $row->nrp }}</td>
                    <td>{{ $row->gaya_belajar }}</td>
                    <td>{{ $row->highest_emotion }} ({{ $row->highest_percentage }}%) - {{ $row->category_name }}</td>
        
                    <td class="text-center">{{ number_format($rata_tugas, 2, ',', '.') }}</td>
                    <td class="text-center">{{ number_format($rata_ujian, 2, ',', '.') }}</td>
                    <td class="text-center">
                        {{ $nilai_sikap_siswa ? number_format($sikap, 2, ',', '.') : 'Belum diisi' }}
                    </td>
                    <td class="text-center">{{ number_format($total_akhir, 2, ',', '.') }}</td>
                    <td><strong>{{ $huruf }} - {{ $kategori }}</strong></td>
                    <td>
                        <a href="{{ route('admin.report.detail_nilai_akhir', $row->id) }}" class="btn btn-info btn-sm">
                            Detail
                        </a>
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