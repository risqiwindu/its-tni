@extends('layouts.admin')
@section('page-title','Dataset')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>'Dataset'
        ]])
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
<h1>Daftar Folder</h1>

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
                </a>
            </div>
        @endforeach
    </div>
@endsection

