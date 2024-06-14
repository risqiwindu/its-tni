<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('pageTitle',isset($pageTitle)? $pageTitle:__lang('default.admin')) - {{ setting('general_site_name') }}</title>

    @if(!empty(setting('image_icon')))
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(setting('image_icon')) }}">
    @endif


    @if ($zoom && false)

    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.5/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.5/css/react-select.css" />
    @endif

<!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/summernote/summernote-bs4.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.css') }}" />

    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/chocolat/dist/css/chocolat.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/admin.css') }}">



    <link rel="stylesheet" href="{{ asset('client/vendor/scrolltabs/jquery.scrolling-tabs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/vendor/jquery-fullsizable-2.1.0/css/jquery-fullsizable.css') }}">
    <link rel="stylesheet" href="{{ asset('client/vendor/jquery-fullsizable-2.1.0/css/jquery-fullsizable-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('client/vendor/slickquiz/css/slickQuiz.css') }}">
    <link rel="stylesheet" href="{{ asset('client/vendor/slickquiz/css/custom.css') }}">

    <link href="{{ asset('client/vendor/videojs/video-js.css') }}" rel="stylesheet">
    <script src="{{ asset('client/vendor/videojs/video.js') }}"></script>
    <style type="text/css">

        .nav-tabs .nav-item  a{
            background-color: #fafdfb;
            border-bottom-color: #CCCCCC;
        }
        .nav-pills .nav-item{
            background-color: #fafdfb;
        }
        .video-js {
            font-size: 1rem;
        }
        .scrtabs-tabs-fixed-container {
            height: 46px;
        }
        .scrtabs-tab-scroll-arrow,.scrtabs-tab-scroll-arrow:hover{
            height: 46px;
            padding-left: 4px;
            padding-top: 9px;
            background-color: #097969;
            color: #fff;
        }

        .scrtabs-tab-scroll-arrow:hover{
            background-color: #00bb00;

        }

        .gallery .gallery-item {
            float: none;
            display: inline-block;
            width: auto;
            height: auto;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-radius: 3px;
            margin-right: auto;
            margin-bottom: auto;
            cursor: pointer;
            transition: all 0.5s;
            position: relative;
        }

        .modal.modal-fullscreen .modal-dialog {
        width: 100vw;
        height: 100vh;
        margin: 0;
        padding: 0;
        max-width: none;
        }

        .modal.modal-fullscreen .modal-content {
        height: auto;
        height: 100vh;
        border-radius: 0;
        border: none;
        }

        .modal.modal-fullscreen .modal-body {
        overflow-y: auto;
        }


    </style>


    <script src="{{ asset('client/themes/admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('client/vendor/jquery-ui-1.11.4/jquery-ui.min.js') }}"></script>
    <link href="{{ asset('client/vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('client/vendor/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('client/app/lib.js') }}"></script>

    <script src="{{  asset('client/vendor/scrolltabs/jquery.scrolling-tabs.min.js') }}"></script>
    <script src="{{  asset('client/vendor/jquery-fullsizable-2.1.0/js/jquery-fullsizable.js') }}"></script>
    <script src="{{  asset('client/vendor/slickquiz/js/slickQuiz.js') }}"></script>

    <script src="{{ asset('client/themes/admin/assets/modules/izitoast/js/iziToast.min.js') }}" type="text/javascript"></script>

    <style>
        .navbar-bg {
            height: 70px;
        }
        @media (max-width: 1024px) {
            .desktop-header{
                display: none;
            }

        }
        @media (min-width: 1024px) {
            .mobile-header{
                display: none;
            }
        }
    </style>
    @php  if(defined('ENABLE_CHAT')): @endphp
    {!!  setting('general_chat_code') !!}
    @php  endif;  @endphp

    {!! setting('general_header_scripts') !!}



</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1" id="content">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar" style="background-color: #097969">

                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                    <a href="#" class="navbar-brand mobile-header">{{ limitLength($lecture->title,12) }}</a>
                    <a href="#" class="navbar-brand desktop-header">{{ $lecture->title }}</a>
                </form>

            <ul class="navbar-nav navbar-right">
                <li ><a href="{{ route('student.course-details',['id'=>$course->id,'slug'=>safeUrl($course->name)]) }}"  class="nav-link   nav-link-lg "  ><i class="fas fa-home"></i></a>

                </li>

            </ul>

        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ url('/') }}">
                        {{ limitLength(setting('general_site_name'),20) }}
                    </a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ url('/') }}">

                        {{ substr(setting('general_site_name'),0,2) }}

                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">{{ limitLength($course->name,55) }}</li>
                    <li><a href="{{ route(MODULE.'.course.intro',['id'=>$course->id]) }}" class="nav-link"><i class="fas fa-info-circle"></i><span>@lang('default.introduction')</span></a></li>

                    @foreach($course->lessons()->orderBy('pivot_sort_order')->get() as $lesson)
                        <li class="dropdown"  >
                            <a  @if($lecture->lesson_id==$lesson->id)
                                id="currentmenu"
                                @endif   data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $lesson->name }}"  href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span> {{ limitLength($lesson->name,20) }}</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route(MODULE.'.course.class',['lesson'=>$lesson->id,'course'=>$course->id]) }}" class="nav-link">{{ __lang('intro') }}</a>
                                </li>
                                @foreach($lesson->lectures()->orderBy('sort_order')->get() as $classLecture)
                                <li data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $classLecture->title }}" ><a class="nav-link @if($lecture->id==$classLecture->id) selected-item @endif" href="{{ route(MODULE.'.course.lecture',['lecture'=>$classLecture->id,'course'=>$course->id]) }}">{{ limitLength($classLecture->title,20) }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach




                </ul>


                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

                        <a   href="{{ route('student.course-details',['id'=>$course->id,'slug'=>safeUrl($course->name)]) }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-sign-out-alt"></i> @lang('default.exit')
                        </a>
                    </div>



            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">


                <div class="section-body" id="layout_content">


                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <div class="alert alert-{{ $msg }} alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {!! clean(Session::get('alert-' . $msg)) !!}
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {!! clean(Session::get('flash_message')) !!}
                            </div>
                        </div>
                    @endif

                    @if(isset($flash_message))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {!! clean($flash_message) !!}
                            </div>
                        </div>
                    @endif


                      <ul class="nav nav-pills mt-5" id="myTab3" role="tablist">
                                            <li class="nav-item">
                                              <a class="nav-link active top-nav" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-desktop"></i> {{  __lang('lecture')  }}</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link top-nav" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-download"></i> {{  __lang('resources')  }}</a>
                                            </li>
                                            @if($course->enable_discussion==1)
                                            <li class="nav-item">
                                              <a class="nav-link top-nav" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-comments"></i> {{  __lang('discuss')  }}</a>
                                            </li>
                                            @endif

                                          <li class="nav-item">
                                              <a class="nav-link top-nav" id="class-tab3" data-toggle="tab" href="#class3" role="tab" aria-controls="class" aria-selected="false"><i class="fa fa-table"></i> {{  __lang('class-index')  }}</a>
                                          </li>
                                          <li class="nav-item" id="test">
                                            <video id="video" width="400" height="100" autoplay style="position: absolute;">
                                          </li>
                                          </ul>
                                          <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active  mt-3" id="home3" role="tabpanel" aria-labelledby="home-tab3">









                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs scroll-tab button-tab2" role="tablist">
                                                    @php  $count = 1;  @endphp
                                                    @foreach($pages as $page)
                                                    <li class="nav-item"><a  class="nav-link @if($count==1) active @endif"  id="tablink{{  $page->id  }}" href="#pagetab{{  $page->id  }}" role="tab" data-toggle="tab"><i class="fa fa-@php  switch($page->type){

                                                                case 'v':
                                                                    echo 'file-video';
                                                                    break;
                                                                case 'l':
                                                                    echo 'file-video';
                                                                    break;
                                                                case 't':
                                                                    echo 'book-open';
                                                                    break;
                                                                case 'c':
                                                                    echo 'code';
                                                                    break;
                                                                case 'i':
                                                                    echo 'image';
                                                                    break;
                                                                case 'q':
                                                                    echo 'question-circle';
                                                                    break;
                                                                case 'z':
                                                                    echo 'video';
                                                                    break;
                                                            }  @endphp"></i> @if(!empty($page->audio_code)) <i class="fa fa-microphone"></i> @endif {{  $page->title }}</a></li>

                                                    @php  $count++;  @endphp
                                                    @endforeach

                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content gallery">
                                                    @php  $count = 1;   @endphp
                                                    @php  foreach($pages as $page): @endphp
                                                    <div  class="tab-pane  fade show  @php  if($count==1): @endphp active @php  endif;  @endphp" id="pagetab{{  $page->id  }}">
                                                          <div class="card">
                                                            <div class="card-body">


                                                        <div @php  if($page->type=='v'):  @endphp class="videobox" style="text-align: center"  @php  endif;  @endphp>

                                                            @php  if(!empty($page->audio_code)): @endphp
                                                            <h4><i class="fa fa-microphone"></i></h4>
                                                            <div style="margin-bottom: 40px">{!! $page->audio_code !!}</div>
                                                            @php  endif;  @endphp
                                                            @php  if($page->type=='l'): @endphp


                                                                @php  $video = \App\Video::find(intval($page->content));  @endphp
                                                                @php  if($video ): @endphp

                                                                    @if(saas())
                                                                            <div class="embed-responsive embed-responsive-16by9">

                                                                                <video id="video" poster="{{ videoImageSaas($video) }}"  class="embed-responsive-item video-js vjs-default-skin" width="640" height="360"  controls>
                                                                                </video>
                                                                            </div>
                                                                            @php  if (!empty($video->description)):  @endphp
                                                                            <div class="panel panel-default" style="margin-top: 10px">
                                                                                <div class="panel-body">
                                                                                    {!! $video->description !!}
                                                                                </div>
                                                                            </div>
                                                                            @php  endif;  @endphp

                                                                            <script src="https://unpkg.com/video.js/dist/video.min.js"></script>
                                                                            <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.min.js"></script>
                                                                            <script src="https://unpkg.com/videojs-contrib-quality-levels/dist/videojs-contrib-quality-levels.min.js"></script>
                                                                            <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.min.js"></script>
                                                                            <script>
                                                                                var options = {
                                                                                    html5:{
                                                                                        hls:{
                                                                                            enableLowInitialPlaylist:true
                                                                                        }
                                                                                    },
                                                                                    flash:{
                                                                                        hls:{
                                                                                            enableLowInitialPlaylist:true
                                                                                        }
                                                                                    },
                                                                                    inactivityTimeout:3000,
                                                                                    controls:true,
                                                                                    autoplay:false,
                                                                                    preload:"auto",
                                                                                };

                                                                                var player = videojs('video', options);

                                                                                player.src({
                                                                                    src: "{{ $videoUrl }}",
                                                                                    type: "application/x-mpegURL",
                                                                                    withCredentials: @if(isset($isMobile) && $isMobile==true) false @else true @endif
                                                                                });

                                                                                var qLevels = [];

                                                                                player.qualityLevels().on('addqualitylevel', function(event) {
                                                                                    var quality = event.qualityLevel;
                                                                                    console.log(quality);

                                                                                    if (quality.height != undefined && $.inArray(quality.height, qLevels) === -1)
                                                                                    {
                                                                                        quality.enabled = true;

                                                                                        qLevels.push(quality.height);

                                                                                        if (!$('.quality_ul').length)
                                                                                        {
                                                                                            var h = '<div class="quality_setting vjs-menu-button vjs-menu-button-popup vjs-control vjs-button">' +
                                                                                                '<button class="vjs-menu-button vjs-menu-button-popup vjs-button" type="button" aria-live="polite" aria-disabled="false" title="Quality" aria-haspopup="true" aria-expanded="false">' +
                                                                                                '<span aria-hidden="true" class="vjs-icon-cog"></span>' +
                                                                                                '<span class="vjs-control-text">Quality</span></button>' +
                                                                                                '<div class="vjs-menu"><ul class="quality_ul vjs-menu-content" role="menu"></ul></div></div>';

                                                                                            $(".vjs-fullscreen-control").before(h);
                                                                                        } else {
                                                                                            $('.quality_ul').empty();
                                                                                        }

                                                                                        qLevels.sort();
                                                                                        qLevels.reverse();

                                                                                        var j = 0;

                                                                                        $.each(qLevels, function(i, val) {
                                                                                            $(".quality_ul").append('<li class="vjs-menu-item" tabindex="' + i + '" role="menuitemcheckbox" aria-live="polite" aria-disabled="false" aria-checked="false" bitrate="' + val +
                                                                                                '"><span class="vjs-menu-item-text">' + val + 'p</span></li>');

                                                                                            j = i;
                                                                                        });

                                                                                        $(".quality_ul").append('<li class="vjs-menu-item vjs-selected" tabindex="' + (j + 1) + '" role="menuitemcheckbox" aria-live="polite" aria-disabled="false" aria-checked="true" bitrate="auto">' +
                                                                                            '<span class="vjs-menu-item-text">Auto</span></li>');
                                                                                    }
                                                                                });

                                                                                $("body").on("click", ".quality_ul li", function() {
                                                                                    $(".quality_ul li").removeClass("vjs-selected");
                                                                                    $(".quality_ul li").prop("aria-checked", "false");

                                                                                    $(this).addClass("vjs-selected");
                                                                                    $(this).prop("aria-checked", "true");

                                                                                    var val = $(this).attr("bitrate");

                                                                                    var qualityLevels = player.qualityLevels();

                                                                                    for (var i = 0; i < qualityLevels.length; i++)
                                                                                    {
                                                                                        qualityLevels[i].enabled = (val == "auto" || (val != "auto" && qualityLevels[i].height == val));
                                                                                    }
                                                                                });
                                                                            </script>

                                                                    @else
                                                                        @php
                                                                            $file = 'uservideo/'.$video->id.'/'.$video->file_name;

                                                                        @endphp


                                                                        <div class="embed-responsive embed-responsive-16by9">

                                                                                <video id="video{{ $video->id  }}" poster="{{ url('/') }}/uservideo/{{ $video->id  }}/{{ videoImage($video->file_name)  }}"  class="embed-responsive-item video-js vjs-default-skin" width="640" height="360"  controls>
                                                                                </video>

                                                                        </div>

                                                                                @php  if (!empty($video->description)):  @endphp
                                                                                <div class="panel panel-default" style="margin-top: 10px">
                                                                                    <div class="panel-body">
                                                                                        {!! $video->description !!}
                                                                                    </div>
                                                                                </div>
                                                                                @php  endif;  @endphp
                                                                                <script>
                                                                                    var player = videojs('video{{ $video->id  }}');
                                                                                    @if($video->location=='r')

                                                                                        <?php
                                                                                                $url = '';
                                                                                                $type = 'video/mp4';
                                                                                                try{
                                                                                                    $url = \Illuminate\Support\Facades\Storage::cloud()->temporaryUrl($file,now()->addHours(12));
                                                                                                    $type = $video->mime_type;
                                                                                                }
                                                                                                catch(\Exception $exception){
                                                                                                    \Illuminate\Support\Facades\Log::error($exception->getMessage());

                                                                                                }
                                                                                        ?>
                                                                                    player.src({
                                                                                        src: "{!! $url !!}",
                                                                                        type: "{{ $type }}"
                                                                                    });

                                                                                    @else
                                                                                    player.src({
                                                                                        src: "{{ route("{$module}.course.serve",['id'=>$video->id]) }}",
                                                                                        type: "{{ mime_content_type($file) }}"
                                                                                    });
                                                                                    @endif

                                                                                </script>



                                                                    @endif

                                                                @php  else:  @endphp
                                                                    <strong>{{  __lang('video-deleted')  }}</strong>
                                                                @php  endif; @endphp



                                                            @php  elseif($page->type=='c'): @endphp
                                                            {!!  nl2br(htmlentities($page->content))  !!}
                                                            @php  elseif($page->type=='i'):  @endphp
                                                            <div style="text-align: center"><a data-img-url="{{ $page->content }}" class="fullsizable" href="#"><img class="gallery-item" data-image="{{ asset($page->content) }}" data-title="{{ $page->title }}" style="max-width: 100%" src="{{ resizeImage($page->content, 640, 360,url('/')) }}" /></a>
                                                                <div><small>{{  __lang('click-to-enlarge')  }}</small></div>
                                                            </div>
                                                            @php  elseif($page->type=='q'):  @endphp
                                                            <div class="quizbox " id="quiz{{ $page->id }}">
                                                                <h1 class="quizName"><!-- where the quiz name goes --></h1>

                                                                <div class="quizArea">
                                                                    <div class="quizHeader">
                                                                        <!-- where the quiz main copy goes -->

                                                                        <a class="button startQuiz" href="#">{{  __lang('get-started')  }}</a>
                                                                    </div>

                                                                    <!-- where the quiz gets built -->
                                                                </div>

                                                                <div class="quizResults">
                                                                    <h3 class="quizScore">{{  __lang('you-scored')  }}: <span><!-- where the quiz score goes --></span></h3>

                                                                    <h3 class="quizLevel"><strong>{{  __lang('ranking')  }}:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

                                                                    <div class="quizResultsCopy">
                                                                        <!-- where the quiz result copy goes -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(function(){
                                                                    $('#quiz{{ $page->id }}').slickQuiz({!! $page->content  !!});
                                                                })
                                                            </script>
                                                            @php  elseif($page->type=='z'):  @endphp
                                                            @php
                                                                $zoomData = @unserialize($page->content);
                                                            @endphp
                                                            @php  if($zoomData && is_array($zoomData)): @endphp


                                                            <div class="alert alert-success" role="alert">
                                                                <strong>{{  __lang('meeting-id')  }}</strong>: {{ trim($zoomData['meeting_id']) }}
                                                                <br/>
                                                                <strong>{{  __lang('password')  }}</strong>: {{ trim($zoomData['password']) }}
                                                                <br/>
                                                                {{ nl2br($zoomData['instructions']) }}</div>



                                                            <div style="text-align: center">
                                                                <a href="#" onclick="startMeeting('{{ trim($zoomData['meeting_id']) }}','{{ trim($zoomData['password']) }}','{{ generateSignatureZoom(setting('zoom_key'), setting('zoom_secret'), trim($zoomData['meeting_id']), 0) }}')" class="btn btn-primary btn-lg"><i class="fa fa-video"></i> @lang('default.join-meeting')</a>

                                                            </div>





                                                            @php  endif;  @endphp

                                                            @php  else:  @endphp
                                                            {!! $page->content !!}
                                                            @php  endif;  @endphp

                                                        </div>
                                                        <div style="margin-top: 5px">


                                                            <form class="ajaxform" action="{{  route(MODULE.'.course.bookmark')  }}?{{ http_build_query(request()->query()) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{  $page->id  }}"/>
                                                                <input type="hidden" name="course_id" value="{{  $course->id  }}"/>
                                                                <button  style="margin-bottom: 5px"  type="submit" class="btn btn-sm btn-success float-right"><i class="fa fa-bookmark"></i> {{  __lang('bookmark')  }}</button>
                                                            </form>
                                                        </div>
                                                        <form action="{{  route(MODULE.'.course.loglecture')  }}?{{ http_build_query(request()->query()) }}" method="post">
                                                            @csrf
                                                            <div class="mt-5" style=" clear: both;" >
                                                                @php  if($count==1): @endphp
                                                                @php  if($previous):  @endphp
                                                                <a  style="margin-bottom: 20px"  class="btn btn-primary btn-lg" href="{{  route(MODULE.'.course.lecture'.$append,['lecture'=>$previous->id,'course'=>$sessionId])  }}"><i class="fa fa-chevron-left"></i> {{  __lang('previous-lecture')  }}</a>

                                                                @php  elseif($previousLesson):  @endphp
                                                                <a  style="margin-bottom: 20px"  class="btn btn-primary btn-lg" href="{{  route(MODULE.'.course.class'.$append,['lesson'=>$previousLesson->id,'course'=>$sessionId])  }}"><i class="fa fa-chevron-left"></i> {{  __lang('previous-class')  }}</a>

                                                                @php  else:  @endphp
                                                                <a  style="margin-bottom: 20px"  class="btn btn-primary btn-lg" href="{{  route(MODULE.'.course.class'.$append,['lesson'=>$lecture->lesson_id,'course'=>$sessionId])  }}"><i class="fa fa-chevron-left"></i> {{  __lang('class-details')  }}</a>

                                                                @php  endif;  @endphp
                                                                @php  endif;  @endphp


                                                                @php  $previousPage = $pageTable->getPreviousPage($page->id);   @endphp
                                                                @php  if($previousPage):  @endphp
                                                                <button style="margin-bottom: 20px" data-page="{{  $previousPage->id  }}" class="btn btn-primary btn-lg prevButton prevbtn"><i class="fa fa-chevron-left"></i> {{  __lang('previous')  }}</button>
                                                                @php  endif;  @endphp



                                                                @php  $nextPage = $pageTable->getNextPage($page->id); @endphp
                                                                @php  if($nextPage):  @endphp


                                                                <button type="button" data-page="{{  $nextPage->id  }}" class="btn btn-primary btn-lg prevButton float-right nextbtn">{{  __lang('next')  }} <i class="fa fa-chevron-right"></i></button>

                                                                @php  else:  @endphp

                                                                <input type="hidden" name="course_id" value="{{  $sessionId  }}"/>
                                                                <input type="hidden" name="lecture_id" value="{{  $lecture->id  }}"/>
                                                                <button class="btn btn-primary btn-lg float-right" type="submit"><i class="fa fa-check-circle"></i> {{  __lang('complete-lecture')  }}</button>
                                                                <p style="text-align: right; clear: both">
                                                                    <small>{{  __lang('complete-lecture-note')  }}</small>
                                                                </p>

                                                                @php  endif;  @endphp
                                                            </div>
                                                        </form>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    @php  $count++; endforeach;  @endphp
                                                </div>


                                            </div>
                                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
<div class="card">
    @if($downloads->count() > 0)
 <div class="card-header">

         <a href="{{  route(MODULE.'.course.alllecturefiles'.$append,array('id'=>$lecture->id,'course'=>$sessionId)) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="{{  __lang('download-all-files')  }}"><i class="fa fa-download"></i> {{  __lang('download-all')  }}</a>


</div>
    @endif
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>{{  __lang('File')  }}</th>
                <th ></th>
            </tr>
            </thead>
            <tbody>
            @php  foreach($downloads as $download):  @endphp
            <td>{{  basename($download->path) }}</td>

            <td class="text-right">
                @php  if ($fileTable->getTotalForDownload($lecture->id)> 0):  @endphp
                <a href="{{  route(MODULE.'.course.lecturefile'.$append,array('id'=>$download->id,'course'=>$sessionId)) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="{{  __lang('download-file')  }}"><i class="fa fa-download"></i> {{  __lang('download')  }}</a>

                @php  else: @endphp
                <strong>{{ __lang('no-files') }}</strong>
                @php  endif;  @endphp
            </td>
            </tr>

            @php  endforeach;  @endphp

            </tbody>
        </table>
    </div>

</div>
</div>


                                            </div>
                                              @if($course->enable_discussion==1)
                                              <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">

                                                  <ul class="nav nav-tabs" role="tablist">
                                                      <li class="nav-item"><a class="nav-link active"  href="#home1" aria-controls="home1" role="tab" data-toggle="tab">{{  __lang('instructor-chat')  }}</a></li>
                                                      <li  class="nav-item"><a  class="nav-link"  href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">{{  __lang('student-forum')  }}</a></li>
                                                  </ul>


                                                  <!-- Tab panes -->
                                                  <div class="tab-content">
                                                      <div role="tabpanel" class="tab-pane active" id="home1">



                                                          @php  if(!empty($course->enable_discussion)): @endphp
                                                          <div class="card">
                                                           <div class="card-header">
                                                               {{  __lang('ask-a-question-lecture')  }}
                                                          </div>
                                                          <div class="card-body">
                                                              <form class="form" method="post" action="{{  route('student.student.adddiscussion') }}?{{ http_build_query(request()->query()) }}">


                                                                  <div class="modal-body">

                                                                      @csrf
                                                                      <div class="form-group">
                                                                          <div> <label>{{  __lang('recipients')  }}</label></div>
                                                                          @php
                                                                              $form->get('admin_id[]')->setAttribute('style','width:100%')
                                                                          @endphp
                                                                          {{  formElement($form->get('admin_id[]')) }}
                                                                      </div>

                                                                      <input type="hidden" name="course_id" value="{{  $sessionId  }}"/>
                                                                      <input type="hidden" name="lecture_id" value="{{  $lecture->id  }}"/>
                                                                      <div class="form-group">
                                                                          {{  formLabel($form->get('subject')) }}
                                                                          {{  formElement($form->get('subject')) }}   <p class="help-block">{{  formElementErrors($form->get('subject')) }}</p>

                                                                      </div>




                                                                      <div class="form-group">
                                                                          {{  formLabel($form->get('question')) }}
                                                                          {{  formElement($form->get('question')) }}   <p class="help-block">{{  formElementErrors($form->get('question')) }}</p>

                                                                      </div>

                                                                      <button type="submit" class="btn btn-primary">Submit</button>

                                                                  </div>

                                                              </form>
                                                              <div class="row">
                                                                  <div class="col-md-12" style="margin-top: 20px">
                                                                      <h4>{{  __lang('your-questions')  }}</h4>
                                                                      <div class="table-responsive">
                                                                          <table class="table table-hover">
                                                                              <thead>
                                                                              <tr>
                                                                                  <th>{{  __lang('subject')  }}</th>
                                                                                  <th>{{  __lang('created-on')  }}</th>
                                                                                  <th>{{  __lang('recipients')  }}</th>
                                                                                  <th>{{  __lang('replied')  }}</th>
                                                                                  <th class="text-right1" style="width:90px"></th>
                                                                              </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                              @php  foreach($discussions as $row):  @endphp
                                                                              <tr>
                                                                                  <td>{{  $row->subject }}
                                                                                  </td>

                                                                                  <td>{{  showDate('d/M/Y',$row->created_at) }}</td>
                                                                                  <td>

                                                                                      @php  if($row->admin==1): @endphp
                                                                                      Administrators,
                                                                                      @php  endif;  @endphp

                                                                                      @php  foreach($accountTable->getDiscussionAccounts($row->id) as $row2):  @endphp
                                                                                      {{  $row2->name.' '.$row2->last_name }},
                                                                                      @php  endforeach;  @endphp



                                                                                  </td>

                                                                                  <td>{{  boolToString($row->replied)  }}</td>

                                                                                  <td class="text-right">
                                                                                      <a href="{{  route('student.student.viewdiscussion',array('id'=>$row->id)) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i> {{  __lang('view')  }}</a>

                                                                                  </td>
                                                                              </tr>
                                                                              @php  endforeach;  @endphp

                                                                              </tbody>
                                                                          </table>
                                                                      </div>

                                                                  </div>

                                                              </div>
                                                          </div>
                                                          </div>

                                                          @php  else: @endphp
                                                          {{  __lang('instruct-chat-unavailable')  }}
                                                          @php  endif;  @endphp


                                                      </div>
                                                      <div role="tabpanel" class="tab-pane" id="profile1">
                                                          @php  if(!empty($course->enable_forum)): @endphp
                                                          {!! $forumTopics  !!}
                                                          @php  else: @endphp
                                                          {{  __lang('student-forum-unavailable')  }}
                                                          @php  endif;  @endphp
                                                      </div>
                                                  </div>




                                              </div>
                                              @endif
                                              <div class="tab-pane fade" id="class3" role="tabpanel" aria-labelledby="class-tab3">

                                                  @php  $count=1; foreach($lectures as $row):  @endphp

                                                  <div class="card@php  if($lecture->id==$row->id): @endphp card-primary @php  else:  @endphp panel-default@php  endif;  @endphp">
                                                      <div class="card-header">
                                                          {{  $count.'. '.$row->title  }}
                                                      </div>
                                                      <div class="card-body">
                                                          <table class="table table-striped">
                                                              <thead>
                                                              <tr>
                                                                  <th>{{  __lang('content')  }}</th>
                                                                  <th>{{  __lang('type')  }}</th>
                                                              </tr>
                                                              </thead>
                                                              <tbody>
                                                              @php  foreach($lecturePageTable->getPaginatedRecords(false,$row->id) as $page):  @endphp
                                                              <tr>
                                                                  <td>{{  $page->title  }}</td>
                                                                  <td>@php
                                                                          switch($page->type){
                                                                              case 't':
                                                                                  echo __lang('text');
                                                                                  break;
                                                                              case 'v':
                                                                                  echo  __lang('video');
                                                                                  break;
                                                                              case 'c':
                                                                                  echo  __lang('html-code');
                                                                                  break;
                                                                                case 'l':
                                                                                    echo  __lang('video');
                                                                                    break;
                                                                                case 'i':
                                                                                    echo __lang('image');
                                                                                    break;
                                                                                case 'q':
                                                                                    echo __lang('quiz');
                                                                                    break;
                                                                                case 'z':
                                                                                    echo __lang('zoom-meeting');
                                                                                    break;
                                                                          }  @endphp</td>
                                                              </tr>
                                                              @php  endforeach;  @endphp
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                      @php  if($lecture->id!=$row->id): @endphp
                                                      <div class="panel-footer" style="min-height: 65px">

                                                          <a class="btn btn-primary btn-lg float-right" href="{{  route(MODULE.'.course.lecture'.$append,['course'=>$sessionId,'lecture'=>$row->id])  }}">{{  __lang('start-lecture')  }} <i class="fa fa-chevron-right"></i></a>
                                                      </div>
                                                      @php  endif;  @endphp
                                                  </div>
                                                  @php  $count++;  @endphp
                                                  @php  endforeach;  @endphp
                                              </div>
                                          </div>
                </div>
            </section>

        </div>

    </div>
</div>

<!-- General JS Scripts -->

<script src="{{ asset('client/themes/admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/js/stisla.js') }}"></script>
<script defer src="{{ asset('client/js/face-api.min.js') }}"></script>
<script defer src="{{ asset('client/js/script.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('client/themes/admin/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/chart.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>



<!-- Template JS File -->
<script src="{{ asset('client/themes/admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/js/custom.js') }}"></script>

<div class="modal fade" id="generalModal" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generalModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"  id="genmodalinfo">
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="generalLargeModal" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generalLargeModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"  id="genLargemodalinfo">
            </div>

        </div>
    </div>
</div>

<!-- END SIMPLE MODAL MARKUP -->
<script>
    function openModal(title,url){
        $('#genmodalinfo').html(' <img  src="{{ asset('img/ajax-loader.gif')  }}');
        $('#generalModalLabel').text(title);
        $('#genmodalinfo').load(url);
        $('#generalModal').modal();
    }
    function openLargeModal(title,url){
        $('#genLargemodalinfo').html(' <img  src="{{ asset('img/ajax-loader.gif')  }}');
        $('#generalLargeModalLabel').text(title);
        $('#genLargemodalinfo').load(url);
        $('#generalLargeModal').modal();
    }
    function openPopup(url){
        window.open(url, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
        return false;
    }
</script>
<script>
    function initTab(){
        $('.scroll-tab').scrollingTabs({enableSwiping: true, bootstrapVersion: 4,  cssClassLeftArrow: 'fa fa-chevron-left',
            cssClassRightArrow: 'fa fa-chevron-right' });
    }

    $(document).on('shown.bs.tab', 'a.top-nav', function (e) {
        console.log('clicked');
        $('.scrtabs-tab-scroll-arrow').trigger('click');
    })

    $('#myTab1').scrollingTabs();

    initTab();

    $('.prevButton').click(function(e){
        e.preventDefault();
        console.log('clicked btn');
        var page = $(this).attr('data-page');
        console.log('Page is: '+page);
        $('#tablink'+page).tab('show');
        $('.scroll-tab').scrollingTabs('scrollToActiveTab');
        scrollTo('#tab_content11');
    });

    //attach event handlers

    $(document).on('click','.chocolat-right',function(){
        console.log('clicked');
        $('#myTabContent2 div.tab-content > div.active .nextbtn:first').trigger('click');
    });

    $(document).on('click','.chocolat-left',function(){
        console.log('clicked');
        $('#myTabContent2 div.tab-content > div.active .prevbtn:first').trigger('click');
    });

    document.addEventListener("next_image", function(e) {
        console.log(e.detail);
        $('#myTabContent2 div.tab-content > div.active .nextbtn:first').trigger('click');
    });

    document.addEventListener("prev_image", function(e) {
        console.log(e.detail);
        $('#myTabContent2 div.tab-content > div.active .prevbtn:first').trigger('click');
    });

    //handing next scrolling
    $('a.fsnext').click(function(e){
        console.log('next clicked');
    });

    $('a.fsprev').click(function(){
        console.log('prev clicked');
    });

    $(function() {
    //    $('a.fullsizable').fullsizable();
    });

    @php  if(isset($_GET['page'])):  @endphp
    $(function(){
        $('#tablink'+{{  $_GET['page']  }}).tab('show');
        $('.scroll-tab').scrollingTabs('scrollToActiveTab');
    });
    @php  endif;  @endphp


    // Find all YouTube videos
    var $allVideos = $("div.videobox iframe");

    // The element that is fluid width
    $fluidEl = $("div.tab-pane");

    // Figure out and save aspect ratio for each video
    $allVideos.each(function() {

        $(this).data('aspectRatio', this.height / this.width)
            // and remove the hard coded width/height
            .removeAttr('height')
            .removeAttr('width');

    });

    // When the window is resized
    $(window).resize(function() {

        var newWidth = $fluidEl.width() - 100;

        // Resize all videos according to their own aspect ratio
        $allVideos.each(function() {

            var $el = $(this);
            $el
                .width(newWidth)
                .height(newWidth * $el.data('aspectRatio'));

        });

// Kick off one resize to fix all videos on page load
    }).resize();


    $('body').click(function(){
        $(window).resize();
    });

    jQuery('.video-js').bind('contextmenu',function() { return false; });

    $(function (){
        $('#currentmenu').trigger('click');
    })
</script>

@if ($zoom)


<!-- Modal -->
<div class="modal fade modal-fullscreen" id="zoomModal" tabindex="-1" role="dialog" aria-labelledby="zoomModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="zoomModalLabel">@lang('default.zoom-meeting')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="zmmtg-root"></div>
    <div id="aria-notify-area"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('default.close')</button>

      </div>
    </div>
  </div>
</div>



<!-- import ZoomMtg dependencies -->

    <script src="https://source.zoom.us/2.9.5/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/2.9.5/lib/vendor/lodash.min.js"></script>

    <!-- CDN for client view -->
    <script src="https://source.zoom.us/zoom-meeting-2.9.5.min.js"></script>

    <script src="{{  asset('client/app/zoom.js') }}"></script>

    <script>
        <?php
            $langList = [
              'en'=>'en-US',
              'de'=>'de-DE',
                'es'=>'es-ES',
                'fr'=>'fr-FR',
                'jp'=>'jp-JP',
                'pt'=>'pt-PT',
                'ru'=>'ru-RU',
                'zh'=>'zh-CN',
                'ko'=>'ko-KO',
                'it'=>'it-IT',
                'vi'=>'vi-VN'
            ];
            //get current lang
            $lang = setting('config_language');
                if(empty($lang)){
                    $lang = 'en';
                }

        ?>

        function startMeeting(meetingId,password,signature){

            $('#zoomModal').modal();

            ZoomMtg.init({
				leaveUrl: '{{ selfUrl() }}',
				isSupportAV: true,
				success: function() {
                    @if(isset($langList[$lang]))
                    ZoomMtg.i18n.load("{{ $langList[$lang] }}");
                    ZoomMtg.reRender({lang: "{{ $langList[$lang] }}"});
                    @endif

					ZoomMtg.join({
                            signature: signature,
                            meetingNumber: meetingId,
                            userName: '{{ addslashes(Auth()->user()->name) }} {{ addslashes(Auth()->user()->last_name) }}',
                            sdkKey: '{{ setting('zoom_key') }}',
                            userEmail: '{{  addslashes(Auth()->user()->email) }}',
                            passWord: password,
                            success: (success) => {
                                console.log(success)
                            },
                            error: (error) => {
                                console.log(error);
                                if(error.result){
                                    iziToast.error({
                                        title: '@lang('default.error')',
                                        message: error.result
                                    });
                                }
                               // alert(error.result);
                            }
                        })
				}
			});



        }
        $("body").css({
            "min-width": "400px",
            "overflow": "auto",
            "font-size": "14px",

        });
        $("html").css({
            "min-width": "400px",
            "overflow": "auto",
            "font-size": "14px",
        });
    </script>


@endif

<style>
    body {
    font-size: 14px;
    font-weight: 400;
    font-family: 'Nunito', 'Segoe UI', arial;
    color: #6c757d;
    overflow: auto;
}

</style>
</body>
</html>
