@extends('layouts.admin')
@section('page-title','Dataset')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>'Dataset'
        ]])
@endsection


@section('content')
<form enctype="multipart/form-data" action="{{ route('admin.student.simpan_dataset') }}" method="post">
    @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div >
                    <label for="nama" class="control-label">Nama</label>
                    </div>
                <div >
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-lg btn-block btn-primary">Simpan</button>
</form>
@endsection

