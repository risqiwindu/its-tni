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
                        <a href="{{ route('student.course.intro',['id'=>$row->id]) }}">
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
                    {{-- <div class="article-category"><a href="{{ route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)]) }}">{{ courseType($row->type) }}
                        </a> <div class="bullet"></div>
                        <a href="{{ route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)]) }}">{{ $course->lessons()->count() }} {{ __lang('classes') }}</a>
                    </div> --}}
                    <div class="article-title">
                        @if ($test->contains('course_id', $row->id))
                            <h2><a href="{{ route('student.course.intro',['id'=>$row->id])}}">{{ $row->name }}</a></h2>
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
                                    {{-- <div class="text-job">{{ $admin->user->role->name }}</div> --}}
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
                                {{-- @foreach ($test as $coba)
                                @if ($row->id == $coba->course_id)
                                <a class="btn btn-success btn-block" href="{{ route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)]) }}"><i class="fa fa-info-circle"></i> Masuk Kelas</a>
                                @else
                                <a class="btn btn-primary btn-block" href="{{ route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)]) }}"><i class="fa fa-info-circle"></i> {{ __lang('details') }}</a>
                                @endif
                                @endforeach --}}
                                @if ($test->contains('course_id', $row->id))
                                    <a class="btn btn-success btn-block" href="{{ route('student.course.intro',['id'=>$row->id]) }}">
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

    {{-- <div class="col-md-3">

        @if($subCategories || $parent)
            <ul class="list-group mb-5">
                <li class="list-group-item active">{{ __lang('sub-categories') }}</li>
                @if($parent)
                    <li class="list-group-item">
                        <a href="{{ route('courses') }}?group={{ $parent->id }}" ><strong>{{ __lang('parent') }}: {{ $parent->name }}</strong></a>
                    </li>
                @endif

                @if($subCategories)
                    @foreach($subCategories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('courses') }}?group={{ $category->id }}" >{{ $category->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endif

        <ul class="list-group">
            <li class="list-group-item active">{{ __lang('categories') }}</li>
            <li class="list-group-item"><a href="{{ route('courses') }}">{{ __lang('all-courses') }}</a></li>
            <li class="list-group-item @if(request()->get('group') == 1) active @endif"><a href="{{ route('courses') }}?group=1">Visual</a></li>
            @foreach($categories as $category)
                <li class="list-group-item @if(request()->get('group') == $category->id) active @endif"><a href="{{ route('courses') }}?group={{ $category->id }}">{{ $category->name }}</a></li>
            @endforeach

        </ul> --}}

        {{-- <div class="card mt-3  " data-toggle="card-collapse" data-open="false">
            <div class="card-header card-collapse-trigger">
                {{  __lang('Filter')  }}
            </div>
            <div class="card-body">
                <form id="filterform" class="form" role="form"  method="get" action="{{  route('courses') }}">
                    <div class="form-group input-group margin-none">
                        <div class="margin-none">
                            <input type="hidden" name="group" value="{{  $group  }}"/>

                            <div class="form-group">
                                <label  for="filter">{{  __lang('search')  }}</label>
                                {{  formElement($text)  }}
                            </div>
                            <div  class="form-group">
                                <label  for="group">{{  __lang('sort')  }}</label>
                                {{  formElement($sortSelect)  }}
                            </div>

                            <div >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> {{  __lang('filter')  }}</button>
                                <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-secondary">{{  __lang('clear')  }}</button>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div> --}}


    </div>

</div>
@endsection
