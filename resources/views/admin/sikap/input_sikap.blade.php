@extends('layouts.admin')
@section('innerTitle','Input nilai sikap')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            route('admin.sikap.index')=>'Sikap', 
            '#'=>'Input nilai sikap'
        ]])
@endsection

@section('content')
<div class="container">
    <h4>Form Penilaian Sikap: {{ $student->name }}</h4>

    <div class="alert alert-info">
        <strong>Keterangan Skala Nilai:</strong>
        <ul class="mb-0">
            <li>Tidak Baik - <strong>Poin 1</strong></li>
            <li>Kurang Baik - <strong>Poin 2</strong></li>
            <li>Cukup - <strong>Poin 3</strong></li>
            <li>Baik - <strong>Poin 4</strong></li>
            <li>Baik Sekali - <strong>Poin 5</strong></li>
        </ul>
    </div>
    

    <form action="{{ route('admin.sikap.simpan_sikap') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        @foreach (['nilai_kreatif', 'nilai_kerjasama', 'nilai_tanggung_jawab', 'nilai_keaktifan', 'nilai_toleran'] as $aspek)
            <div class="form-group">
                <label>{{ ucfirst(str_replace('_', ' ', $aspek)) }}</label>
                <select name="{{ $aspek }}" class="form-control" required>
                    <option value="" disabled {{ empty($nilai) ? 'selected' : '' }}>Pilih Dulu</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ (isset($nilai) && $nilai->$aspek == $i) ? 'selected' : '' }}>
                            @switch($i)
                                @case(1) Tidak Baik @break
                                @case(2) Kurang Baik @break
                                @case(3) Cukup @break
                                @case(4) Baik @break
                                @case(5) Baik Sekali @break
                            @endswitch
                            - ({{ $i }})
                        </option>
                    @endfor
                </select>
            </div>
        @endforeach

        <button class="btn btn-{{ isset($nilai) ? 'warning' : 'success' }}" type="submit">
            {{ isset($nilai) ? 'Update' : 'Simpan' }}
        </button>
    </form>
</div>
@endsection

@section('footer')

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