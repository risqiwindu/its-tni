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

        @php  foreach($paginator as $row):  @endphp
            @php  if($row->type=='c'): @endphp
            @php  $type='course';  @endphp
            @php  else: @endphp
            @php  $type='session';  @endphp
            @php  endif;  @endphp
            @php
                $course = \App\Course::find($row->id);
            @endphp

        <div class="col-12 col-md-4 col-lg-4">
            <article class="article article-style-c">
                <div class="article-header">
                    @if ($test->contains('course_id', $row->id))
                        <a href="{{  route('student.'.'course'.'-details',['id'=>$row->id,'slug'=>safeUrl($row->name)]) }}">
                    @else
                        <a href="{{ route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)]) }}">
                    @endif
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
                        @if ($test->contains('course_id', $row->id))
                            <h2><a href="{{  route('student.'.'course'.'-details',['id'=>$row->id,'slug'=>safeUrl($row->name)]) }}">{{ $row->name }}</a></h2>
                        @else
                            <h2><a href="{{ route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)]) }}">{{ $row->name }}</a></h2>
                        @endif
                    </div>
                    <div class="article-details">{{ limitLength($course->short_description,300) }}</div>

                    <div class="row pl-2">
                        @foreach($course->admins()->limit(4)->get() as $admin)

                            <div class="article-user col-md-6">
                                <img alt="image" src="{{ profilePictureUrl($admin->user->picture) }}">
                                <div class="article-user-details">
                                    <div class="user-detail-name">
                                        <a href="#" data-toggle="modal" data-target="#adminModal-{{ $admin->id }}">{{ limitLength(adminName($admin->id),20) }}</a>
                                    </div>
                                    <div class="text-job">Dosen</div>
                                </div>
                            </div>

                        @section('footer')
                            @parent
                            <div class="modal fade" tabindex="-1" role="dialog" id="adminModal-{{ $admin->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $admin->user->name }} {{ $admin->user->last_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <figure class="avatar mr-2 avatar-xl text-center">
                                                        <img src="{{ profilePictureUrl($admin->user->picture) }}"  >
                                                    </figure>
                                                </div>
                                                <div class="col-md-p"><p>{!! clean($admin->about) !!}</p></div>
                                            </div>

                                        </div>
                                        <div class="modal-footer bg-whitesmoke br">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __lang('close') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endsection
                        @endforeach
                    </div>



                    <div class="article-footer">

                        <div class="row">
                            <div class="col-md-12">
                                @if ($test->contains('course_id', $row->id))
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
        @php  endforeach;  @endphp

        </div>
        @php
            // add at the end of the file after the table
                echo paginationControl(
                // the paginator object
                    $paginator,
                    // the scrolling style
                    'sliding',
                    // the partial to use to render the control
                    null,
                    // the route to link to when a user clicks a control link
                    route('courses')
                );

        @endphp

        <br/>
        <br/>


    </div>
    </div>
</div>
@endsection
