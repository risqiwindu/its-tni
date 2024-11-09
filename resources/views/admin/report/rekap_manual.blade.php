@extends('layouts.admin')
@section('innerTitle','Laporan Keseluruhan Sistem')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            route('admin.report.detail_kelas')=>'Laporan',
            route('admin.report.pilih_laporan')=>'Pilih Laporan',
            '#'=>'Laporan Keseluruhan Manual'
        ]])
@endsection

@section('search-form')
<form class="form-inline mr-auto" method="get" action="{{ route('admin.report.rekap_manual') }}">
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

<div style="width: 100%; max-width: 600px; margin: auto;">
    <canvas id="averageScoreChart"></canvas>
</div>
<div style="margin-top: 20px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
    <strong>Keterangan :</strong>
    <p>Nilai rata-rata yang dihasilkan oleh siswa tanpa menggunakan sistem adalah {{ $averageScore }},</p>
    <p>dengan nilai tertinggi yang dihasilkan adalah {{ $maxScore }}.</p>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>NIP / NRP</th>
            <th>Nilai Ujian</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($manual as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->score }}</td>
            </tr>
           @endforeach
        </tbody>
    </table>
    
</div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   const ctx = document.getElementById('averageScoreChart').getContext('2d');

// Data rata-rata nilai dari Laravel ke JavaScript
const averageScore = @json($averageScore);

// Membuat grafik bar
const averageScoreChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Rata-rata Nilai'],  // Satu label untuk rata-rata nilai
        datasets: [{
            label: 'Rata-Rata Nilai Siswa',
            data: [averageScore],  // Data rata-rata nilai
            backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Warna latar belakang bar
            borderColor: 'rgba(75, 192, 192, 1)',  // Warna border bar
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,  // Mulai sumbu Y dari 0
                title: {
                    display: true,
                    text: 'Nilai',
                    font: {
                            weight: 'bold'  // Menebalkan teks pada sumbu Y
                        }  // Judul sumbu Y
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Belajar Manual / Reading',
                    font: {
                            weight: 'bold'  // Menebalkan teks pada sumbu Y
                        }  // Judul sumbu X
                }
            }
        }
    }
});
</script>
@endsection