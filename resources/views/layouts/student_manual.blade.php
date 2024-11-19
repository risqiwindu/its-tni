<!DOCTYPE html>
<html {!!  langMeta() !!}>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle',isset($pageTitle)? $pageTitle:__('default.my-account')) - {{ setting('general_site_name') }}</title>

    @if(!empty(setting('image_icon')))
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(setting('image_icon')) }}">
    @endif

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('client/themes/admin/assets/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/admin.css') }}">
    <link href="{{ asset('client/vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://www.youtube.com/iframe_api"></script>
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    
    @if(!empty(setting('dashboard_color')))
        @include('partials.dashboard-css',['color'=>setting('dashboard_color')])
    @endif
    {!! setting('general_header_scripts') !!}
    @yield('header')
</head>

<body class="layout-3" style="background-image: url('{{ asset('img/bg2.png') }}'); background-size: 100% 100%;">
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar" style="margin-top: 15px">
            <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-hide">{{ limitLength(setting('general_site_name'),17) }}</a>
            {{-- <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a> --}}
            <div class="nav-collapse">
                <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <ul class="navbar-nav">
                    @if(setting('menu_show_tests')==1)
                    <li class="nav-item">
                        <a href="{{ route('student.test.index',['test' => 'manual']) }}" class="nav-link"><span>Ujian</span></a>
                    </li>
                    @endif
                    
                </ul>
            </div>
          

            <ul class="navbar-nav ml-auto navbar-right">
                @if(getCart()->hasItems())
                <li  ><a href="{{ route('cart') }}"   class="nav-link nav-link-lg  beep"><i class="fa fa-cart-plus"></i> {{ getCart()->getTotalItems() }}</a></li>
                @endif
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        @if(!empty(Auth::user()->picture) && file_exists(Auth::user()->picture))
                            <img alt="image" src="{{ resizeImage(Auth::user()->picture,50,50,url('/')) }}" class="rounded-circle mr-1">
                        @else
                            <img alt="image" src="{{ asset('client/themes/admin/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                        @endif
                        <div class="d-sm-none d-lg-inline-block">@lang('default.hi'), {{ limitLength(Auth()->user()->name,30) }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">@lang('default.account')</div>
                        <a href="@route('student.student.profile', ['test'=>'manual'])" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> @lang('default.profile')
                        </a>
                        <a href="@route('student.student.password', ['test' => 'manual'])" class="dropdown-item has-icon" hidden>
                            <i class="fas fa-unlock"></i> @lang('default.change-password')
                        </a>
                        {{-- <a href="@route('student.student.billing')" class="dropdown-item has-icon">
                            <i class="fas fa-home"></i> @lang('default.billing-address')
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> @lang('default.logout')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @section('title-crumb')
                <div class="section-header">
                    @hasSection('innerTitle')
                        <h1>@yield('innerTitle')</h1>
                    @endif
                    <div class="section-header-breadcrumb">
                        @yield('breadcrumb')
                    </div>
                </div>
                @show
                <div class="section-body">
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
                    @yield('content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                {{ __lang('copyright') }} &copy; {{ date('Y') }}  {{ setting('general_site_name') }}
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</div>
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

<!-- General JS Scripts -->
<script src="{{ asset('client/themes/admin/assets/modules/jquery.min.js') }}"></script>

<script src="{{ asset('client/themes/admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/tooltip.js') }}"></script>

<script src="{{ asset('client/themes/admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('client/themes/admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('client/themes/admin/assets/js/custom.js') }}"></script>
<script src="{{ asset('client/vendor/select2/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

<script src="{{ asset('client/app/lib.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Cek jika ada session 'alert' -->
{{-- @if (session('alert'))
<script>
    Swal.fire({
        title: 'Data Tidak Ditemukan!',
        text: '{{ session('alert') }}',
        icon: 'warning',
        confirmButtonText: 'OK'
    });
</script>
@endif --}}

{!! setting('general_foot_scripts') !!}
@yield('footer')
</body>
</html>
