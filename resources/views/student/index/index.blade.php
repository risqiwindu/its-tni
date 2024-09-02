@extends('layouts.student')
@section('innerTitle',$pageTitle)
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            url('/')=>'Beranda',
            '#'=>'Dashboard'
        ]])
@endsection
@section('content')

    <div class="row">
        <div class="col-md-{{ (setting('menu_show_certificates')==1 || setting('menu_show_tests')==1) ? '5':'10' }}">


            @if($homeworkPresent)

                <div class="card card-danger">
                 <div class="card-header">
                     <div ><h4><i class="fa fa-edit"></i> Assignment</h4></div>

                </div>
                <div class="card-body">
                    {{ __lang('pending-homework') }}
                </div>
                    <div class="card-footer">
                        <a href="{{ route('student.assignment.index') }}" class="btn btn-success   float-right"><i class="fa fa-edit"></i> {{ __lang('view-homework') }}</a>
                    </div>
                </div>

            @endif


            <div class="card card-primary">
                <div class="card-header">
                    <h4><i class="fa fa-book"></i> {{ setting('label_sessions_courses','Kelas Saya') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('student.student.mysessions') }}" class="btn btn-primary">{{ __lang('view-all') }}</a>

                    </div>
                </div>
            </div>




                {{-- @if(setting('menu_show_discussions')==1)
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="d-inline"><i class="fa fa-comments"></i> {{ __lang('discussions') }}</h4>
                    </div>
                    <div class="card-body">
                          <ul class="nav nav-pills" id="myTab3" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">{{ __lang('student-forum') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">{{ __lang('instructor-chats') }}</a>
                                                </li>
                                              </ul>
                                              <div class="tab-content" id="myTabContent2">
                                                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">

                                                    <div class="card-title">{{ __lang('latest-topics') }} </div>

                                                    <ul class="list-unstyled list-unstyled-border">
                                                        @foreach($forumTopics as $row)
                                                            @php
                                                                $user = \App\User::find($row->user_id);
                                                            @endphp
                                                            <li class="media">
                                                                @if($user)
                                                                    <img data-toggle="tooltip" data-placement="top" data-original-title="{{  $user->name  }}" class="mr-3 rounded-circle" width="50" src="{{ profilePictureUrl($user->picture) }}" alt="avatar">
                                                                @endif
                                                                <div class="media-body">
                                                                    <a  class="badge badge-pill badge-success mb-1 float-right" href="{{ route('student.forum.topic',['id'=>$row->forum_topic_id]) }}">{{ __lang('view') }}</a>

                                                                    <h6 class="media-title"><a href="{{ route('student.forum.topic',['id'=>$row->id]) }}">{{ $row->title }}</a></h6>
                                                                    <div class="text-small text-muted">  {{ $row->name}}  <div class="bullet"></div> <span class="text-primary">{{ \Illuminate\Support\Carbon::parse($row->forum_created_on)->diffForHumans() }}</span></div>
                                                                </div>
                                                            </li>
                                                        @endforeach


                                                    </ul>

                                                    <a href="{{ route('student.forum.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-right"></i> {{ __lang('view-all') }}</a>
                                                </div>
                                                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">


                                                    <ul class="list-unstyled list-unstyled-border">
                                                        @foreach($discussions['paginator'] as $row)

                                                            <li class="media">

                                                                <div class="media-body">
                                                                    <a  class="badge badge-pill badge-success mb-1 float-right" href="{{ route('student.student.viewdiscussion',['id'=>$row->id]) }}">{{ __lang('view') }}</a>

                                                                    <h6 class="media-title"><a href="{{ route('student.student.viewdiscussion',['id'=>$row->id]) }}">{{ $row->subject }}</a></h6>
                                                                    <div class="text-small text-muted">
                                                                    @if(\App\Course::find($row->course_id))
                                                                     {{ \App\Course::find($row->course_id)->name}}  <div class="bullet"></div>
                                                                    @endif
                                                                     {{ \App\Discussion::find($row->id)->discussionReplies()->count() }} {{ __lang('replies') }}   <div class="bullet"></div>
                                                                        <span class="text-primary">{{ \Illuminate\Support\Carbon::parse($row->created_at)->diffForHumans() }}</span>

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach


                                                    </ul>

                                                    <a href="{{ route('student.student.discussion') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-right"></i> {{ __lang('view-all') }}</a>

                                                </div>

                                              </div>



                    </div>
                </div>

                @endif --}}



        </div>
        @if(setting('menu_show_certificates')==1 || setting('menu_show_tests')==1 )
        <div class="col-md-5">
            
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><i class="fa fa-thumbs-up"></i> Gaya Belajar</h4>
                        <div class="card-header-action">
                            <a class="btn btn-primary" href="{{ route('student.student.kuesioner') }}">Lihat</a>
                        </div>
                    </div>
                    <div class="card-body">
                        Ayo coba tipe belajar seperti apakah yang menggambarkan diri kamu!
                    </div>
                </div>

        </div>
        @endif
        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item active">{{ __lang('my-account') }}</li>
                <li class="list-group-item"><a href="{{ route('student.student.mysessions') }}"><i class="fas fa-chalkboard-teacher"></i> {{ setting('label_my_sessions','Kelas Saya') }}</a></li>
                {{-- @if(setting('menu_show_discussions')==1)
                <li class="list-group-item"><a href="{{ route('student.forum.index') }}"><i class="fas fa-comments"></i> {{ __lang('student-forum') }}</a> </li>
                <li class="list-group-item"><a href="{{ route('student.student.discussion') }}"><i class="fas fa-comment"></i> {{ __lang('instructor-chat') }}</a> </li>
                @endif --}}
                <li class="list-group-item"><a href="{{ route('student.student.camera') }}"><i class="fas fa-camera"></i> Camera</a> </li>
            </ul>


        </div>
    </div>
    @if(session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
    @endif
@endsection
