@extends('layouts.admin')
@section('page-title','Dataset')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>'Dataset'
        ]])
@endsection

@section('search-form')
<form class="form-inline mr-auto" method="get" action="{{ route('admin.student.dataset') }}">
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

<style>
    /* Style grid layout folder */
    .folder-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .folder-item {
        text-align: center;
        transition: transform 0.3s;
    }

    .folder-link {
        text-decoration: none;
        color: inherit;
    }

    .folder-icon {
        color: #ffc107; /* Warna kuning seperti ikon folder Windows */
        margin-bottom: 10px;
    }

    .folder-name {
        font-size: 16px;
        font-weight: bold;
    }

    .folder-item:hover {
        transform: scale(1.05);
    }
</style>
@section('content')
<!-- FontAwesome (gunakan versi terbaru jika perlu) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<h1>Daftar Folder Dataset</h1>
<div class="folder-actions">
    <a href="{{ route('admin.student.tambah_dataset') }}" class="btn btn-primary">Tambah Folder</a> <!-- Tombol Add Folder -->
</div>
    <div class="folder-grid">
        @foreach($folders as $folder)
            <div class="folder-item">
                <a href="{{ route('admin.student.show', $folder) }}" class="folder-link">
                    <div class="folder-icon">
                        <i class="fas fa-folder fa-5x"></i> <!-- Ikon folder FontAwesome -->
                    </div>
                    <div class="folder-name">
                        {{ $folder }}
                    </div>
                    <form action="{{ route('admin.student.hapus_dataset', $folder) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this folder?')">
                            Delete
                        </button>
                    </form>
                </a>
            </div>
        @endforeach
    </div>
@endsection

