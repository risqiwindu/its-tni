@extends('layouts.admin')
@section('innerTitle','Pilih Jenis Laporan')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            route('admin.report.detail_kelas')=>'Laporan',
            '#'=>'Pilih Jenis Laporan'
        ]])
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
       <a href="{{ route('admin.report.rekap_manual') }}" class="btn btn-primary">Manual</a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('admin.report.rekap') }}" class="btn btn-primary">Sistem</a>
    </div>
</div>
    
</div>
@endsection