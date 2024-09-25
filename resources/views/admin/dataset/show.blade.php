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
    /* Grid layout with horizontal flow */
    .image-grid-horizontal {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: minmax(150px, 1fr);
        gap: 20px;
        overflow-x: auto;
        padding: 10px;
        white-space: nowrap;
    }

    .image-item {
        position: relative;
        text-align: center;
        transition: transform 0.3s;
        white-space: normal; /* Agar teks tetap terlihat normal */
    }

    .image-link {
        text-decoration: none;
    }

    .image-thumb {
        width: 100%;
        height: auto;
        border-radius: 5px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .image-name {
        margin-top: 10px;
        font-size: 14px;
        font-weight: bold;
    }

    .image-item:hover .image-thumb {
        transform: scale(1.05);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .delete-button {
        margin-top: 10px;
        background-color: #ff5e5e;
        border: none;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 12px;
    }

    .delete-button:hover {
        background-color: #ff2e2e;
    }
</style>
@section('content')
<!-- Bootstrap CSS -->


<h1>Isi Folder: {{ $folder }}</h1>

    <!-- Form untuk upload gambar ke dalam folder -->
    <form action="{{ route('admin.student.upload', $folder) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit" class="btn btn-primary">Upload Gambar</button>
    </form>

    <div class="image-grid-horizontal">
        @foreach($images as $image)
            <div class="image-item">
                <a href="{{ asset('client/lables/' . $folder . '/' . $image) }}" target="_blank" class="image-link">
                    <img src="{{ asset('client/labels/' . $folder . '/' . $image) }}" alt="{{ $image }}" class="image-thumb">
                </a>
                <div class="image-name">{{ $image }}</div>
                <form action="{{ route('admin.student.destroy', [$folder, $image]) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete('{{ $image }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection