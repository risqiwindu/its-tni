@extends('layouts.student')
@section('pageTitle','Pilihan Kelas')
@section('innerTitle','Pilihan Kelas')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>'Dashboard',
            'Kelas'
        ]])
@endsection

@section('content')

<div class="row">
    @foreach ($course as $row)
    <div class="col-12 col-md-4 col-lg-4">
        <article class="article article-style-c">
            <div class="article-header">
                <a href="#"></a>
                @if(!empty($row->picture))
                            <div class="article-image" data-background="{{ resizeImage($row->picture,671,480,basePath()) }}">
                            </div>
                        @else
                            <div class="article-image" data-background="{{ asset('img/course.png') }}" >
                            </div>
                        @endif
                </a>
            </div>
            <div class="article-details">
                <div class="article-title">
                   {{ $row->name }}
                </div>
                <div class="article-details">Ini adalah kumpulan kelas untuk materi {{ $row->nama_materi }}</div>

                <div class="article-footer">

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('courses', ['filter' => $row->nama_materi, 'slug' => safeUrl($row->nama_materi)]) }}" class="btn btn-primary btn-block">Lihat</a>
                        </div>
                    </div>
                    

                </div>
            </div>

        </article>
    </div>
    @endforeach
</div>
@endsection
