@extends('layouts.admin')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>'Kelas'
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
                <div class="article-details">{{ $row->short_description }}</div>

                <div class="article-footer">

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.student.hasil_emosi', ['course_id' => $row->id]) }}" class="btn btn-primary btn-block">Lihat</a>
                        </div>
                    </div>
                    

                </div>
            </div>

        </article>
    </div>
    @endforeach
</div>

@endsection
