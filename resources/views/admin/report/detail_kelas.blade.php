@extends('layouts.admin')
@section('innerTitle','Laporan')
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
<canvas id="categoryChart" width="400" height="100"></canvas>
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
                    <td><a href="{{ route('admin.report.laporan', ['course_id' => $row->id]) }}" class="btn btn-primary">Lihat</a></td> <!-- Add href link if needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mendapatkan kategori dan nilai rata-rata dari PHP
    var categories = @json(array_keys($data)); // Kategori (termasuk 'manual')
    var scores = @json(array_values($data));   // Rata-rata nilai (termasuk nilai manual)

    var ctx = document.getElementById('categoryChart').getContext('2d');
    
    // Mendefinisikan array warna
    var colors = [
        'rgba(255, 99, 132, 0.6)', // Warna untuk audio
        'rgba(54, 162, 235, 0.6)', // Warna untuk visual
        'rgba(255, 206, 86, 0.6)', // Warna untuk kinestetik
        'rgba(75, 192, 192, 0.6)', // Warna untuk manual
        'rgba(153, 102, 255, 0.6)', // Warna tambahan
        'rgba(255, 159, 64, 0.6)'  // Warna tambahan
    ];

    var categoryChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categories, // Label untuk setiap kategori (termasuk manual)
            datasets: [{
                label: 'Rata-rata Nilai',
                data: scores, // Data nilai rata-rata (termasuk manual)
                backgroundColor: colors.slice(0, categories.length), // Menggunakan warna untuk setiap kategori
                borderColor: colors.slice(0, categories.length).map(color => color.replace('0.6', '1')), // Border lebih pekat
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });
</script>




@endsection