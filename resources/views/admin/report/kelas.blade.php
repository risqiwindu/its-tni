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
<div class="table-responsive_">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil as $row)
                        <tr>
                            <td>{{ $row->department }}</td>
                            <td><a href="{{ route('admin.report.detail_kelas', ['department' => $row->department]) }}" class="btn btn-primary">Lihat</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

@endsection
