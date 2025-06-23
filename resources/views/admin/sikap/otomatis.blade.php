@extends('layouts.admin')
@section('innerTitle','Penilaian Sikap')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard', 
            '#'=>'Sikap'
        ]])
@endsection

@section('search-form')
    <form class="form-inline mr-auto" method="get" action="@route('admin.sikap.index')">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input value="{{ request()->input('search') }}" name="search" class="form-control" type="search" placeholder="{{ __lang('search') }}" aria-label="{{ __lang('search') }}" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@section('content')
<a href="{{ route('admin.sikap.mass_input_sikap') }}" class="btn btn-success mb-3">+ Input Penilaian Sikap</a>
@if ($admin_role == 1)
<form id="resetAllForm" method="POST" action="{{ route('admin.sikap.reset_all') }}" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger mb-3" onclick="confirmResetAll()">Reset Semua</button>
</form>
@endif
{{-- <a href="{{ route('admin.sikap.print') }}" target="_blank" class="btn btn-outline-secondary mb-3">
    <i class="fas fa-print"></i> Cetak PDF
</a> --}}
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th rowspan="3">No</th>
                <th rowspan="3">Nama Siswa</th>
                <th rowspan="3">NIP / NRP</th>
                <th rowspan="3">Nilai Sikap</th>
                <th rowspan="3" colspan="4" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->nip }}</td>
                @php
                    $nilai = $nilai_sikap->firstWhere('student_id', $row->id);
                @endphp
            
                @if ($nilai)
                    <td class="text-center">{{ rtrim(rtrim(number_format($nilai->nilai_akhir, 2, ',', '.'), '0'), ',') }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoModal-{{ $row->id }}">
                            Detail
                        </button>
                    </td>
                    @if ($admin_role == 1)
                    <td>
                        <a href="{{ route('admin.sikap.input_sikap', $row->id) }}" class="btn btn-sm btn-primary">
                            {{ $nilai ? 'Edit' : '+ Tambah Nilai' }}
                        </a>
                    </td>
                    <td>
                        <form id="resetForm-{{ $row->id }}" method="POST" action="{{ route('admin.sikap.reset_one', $row->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmResetOne({{ $row->id }})">Reset</button>
                        </form>
                    </td>
                    @else
                    <td colspan="2">
                        <a href="{{ route('admin.sikap.input_sikap', $row->id) }}" class="btn btn-sm btn-primary">
                            {{ $nilai ? 'Edit' : '+ Tambah Nilai' }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.sikap.print_one', $row->id) }}" target="_blank" class="btn btn-sm btn-secondary">
                            <i class="fas fa-print"></i> Cetak PDF
                        </a>                        
                    </td>
                    @endif                    
                @else
                    <td colspan="5" class="text-center">Nilai belum ada / belum diisi</td>
                @endif
            </tr>
            @endforeach
            </tbody>
        
    </table>
</div>


@endsection

@section('footer')

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Modal Detail -->
@foreach ($student as $row)
@php
    $nilai = $nilai_sikap->firstWhere('student_id', $row->id);
@endphp
@if ($nilai)
<div class="modal fade" id="infoModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail penilaian sikap : {{ $row->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Keterangan Skala Nilai:</strong>
                    <ul class="mb-0">
                        <li><strong>1</strong> - Tidak Baik</li>
                        <li><strong>2</strong> - Kurang Baik</li>
                        <li><strong>3</strong> - Cukup</li>
                        <li><strong>4</strong> - Baik</li>
                        <li><strong>5</strong> - Baik Sekali</li>
                    </ul>
                </div>
                <ul>
                    <li>Kreatif : {{ $nilai->nilai_kreatif }}</li>
                    <li>Kerjasama : {{ $nilai->nilai_kerjasama }}</li>
                    <li>Tanggung Jawab : {{ $nilai->nilai_tanggung_jawab }}</li>
                    <li>Keaktifan : {{ $nilai->nilai_keaktifan }}</li>
                    <li>Toleran : {{ $nilai->nilai_toleran }}</li>
                    <li><strong>Nilai Akhir :</strong> {{ rtrim(rtrim(number_format($nilai->nilai_akhir, 2, ',', '.'), '0'), ',') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

<!-- ✅ Fungsi selalu tersedia -->
<script>
    function confirmResetAll() {
        Swal.fire({
            title: 'Yakin reset semua nilai?',
            text: "Tindakan ini tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, reset semua!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('resetAllForm').submit();
            }
        });
    }

    function confirmResetOne(studentId) {
        Swal.fire({
            title: 'Yakin reset nilai siswa ini?',
            text: "Nilai akan dihapus permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, reset'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('resetForm-' + studentId).submit();
            }
        });
    }

    @if (session('alert'))
        Swal.fire({
            title: 'Data Tidak Ditemukan!',
            text: '{{ session('alert') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif

    @if (session('success'))
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection
