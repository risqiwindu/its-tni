@extends('layouts.student')
@section('pageTitle','Kelas')
@section('innerTitle','Kelas')
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
                <div class="article-title" style="font-weight: bold">
                   {{ $row->name }}
                </div>
                <div class="article-details">Ini adalah kumpulan materi untuk kelas <span style="font-weight: bold">{{ $row->name }} {{ $row->nama_kategori }}</span></div>

                <div class="article-footer">

                    <div class="row">
                        <div class="col-md-12">
                            @if ($student_course->contains('course_id', $row->id))
                                {{-- <a class="btn btn-success btn-block" href="{{ route('student.course.intro',['id'=>$row->id]) }}"> --}}
                                    <a class="btn btn-success btn-block" href="{{  route('student.'.'course'.'-details',['id'=>$row->id,'slug'=>safeUrl($row->name)]) }}">
                                    <i class="fa fa-info-circle"></i> Masuk Kelas
                                </a>
                            @else
                                <a class="btn btn-primary btn-block" href="{{ route('course', ['course' => $row->id, 'slug' => safeUrl($row->name)]) }}">
                                    <i class="fa fa-info-circle"></i> {{ __lang('details') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    

                </div>
            </div>

        </article>
    </div>
    @endforeach
</div>
@endsection
