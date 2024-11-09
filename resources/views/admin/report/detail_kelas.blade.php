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

@section('content')
<canvas id="categoryChart" width="400" height="100"></canvas>
<div style="margin-top: 20px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
    <strong>Keterangan :</strong>
    <p>Berikut adalah rincian jumlah siswa yang mengambil kelas berdasarkan gaya belajar yang tersedia meliputi {{ $summaryText }}</p>
</div>
<div class="mb-3">
<a href="{{ route('admin.report.pilih_laporan') }}" data-toggle="tooltip" data-placement="top" data-original-title="laporan_keseluruhan" title="Laporan Keseluruhan" type="button" class="btn btn-primary btn-equal"  >Lihat Laporan Keseluruhan <i class="fa fa-eye"></i></a>
</div>
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
    const ctx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels), // Using the sorted labels
            datasets: [{
                label: 'Jumlah Siswa',
                data: @json($values), // Using the sorted values
                fill: false,
                borderColor: '#36A2EB',
                backgroundColor: '#36A2EB',
                borderWidth: 2,
                pointRadius: 5,
                tension: 0.1 // Smoothing for line chart
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: {
                            weight: 'bold' // Bold y-axis labels
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            weight: 'bold' // Bold x-axis labels
                        }
                    }
                }
            }
        }
    });
</script>

<!-- Tambahkan SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Cek jika ada session 'alert' -->
@if (session('alert'))
<script>
    Swal.fire({
        title: 'Data Tidak Ditemukan!',
        text: '{{ session('alert') }}',
        icon: 'warning',
        confirmButtonText: 'OK'
    });
</script>
@endif

@endsection