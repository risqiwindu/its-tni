@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>'Laporan'
        ]])
@endsection

@section('search-form')
    <form class="form-inline mr-auto" method="get" action="{{ adminUrl(array('controller'=>'report','action'=>'index')) }}">
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
<canvas id="Chart" width="400" height="100"></canvas>
<div class="table-responsive_">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Kategori Materi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($course as $row)
                <tr>
                    <td>{{ $row->name }} - {{ $row->kategori }}</td> <!-- Add space or hyphen -->
                    <td><a href="{{ route('admin.report.laporan', ['course_id' => $row->id, 'department' => $kelas]) }}" class="btn btn-primary">Lihat</a></td> <!-- Add href link if needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

@section('footer')
<script>
    const ctx = document.getElementById('Chart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Tipe grafik: bar
        data: {
            labels: ['Audio', 'Visual', 'Kinestetik'], // Label sumbu X
            datasets: [{
                label: 'Nilai', // Label dataset
                data: [75, 90, 60], // Data nilai untuk Audio, Visual, Kinestetik
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', // Warna untuk Audio
                    'rgba(54, 162, 235, 0.2)', // Warna untuk Visual
                    'rgba(75, 192, 192, 0.2)'  // Warna untuk Kinestetik
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Warna batas untuk Audio
                    'rgba(54, 162, 235, 1)', // Warna batas untuk Visual
                    'rgba(75, 192, 192, 1)'  // Warna batas untuk Kinestetik
                ],
                borderWidth: 1 // Lebar batas
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Memulai sumbu Y dari nol
                }
            }
        }
    });
</script>
@endsection