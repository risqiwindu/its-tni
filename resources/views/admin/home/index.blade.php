@extends('layouts.admin')
@section('innerTitle','Dashboard')
@section('pageTitle','Dashboard')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard'
        ]])
@endsection

@section('content')
<div class="row">
        @if ($AdminRole == 1)
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            @can('access','view_students')
            <a href="{{ route('admin.student.index') }}">
                @endcan
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{__lang('students')}}</h4>
                    </div>
                    <div class="card-body">
                        {{$totalStudents}}
                    </div>
                </div>
            </div>
                @can('access','view_students')
            </a>
            @endcan
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            @can('access-group','course')
            <a href="{{ route('admin.student.sessions') }}?type=c">
                @endcan
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalCourses }}
                    </div>
                </div>
            </div>
                @can('access-group','course')
            </a>
            @endcan
        </div>
    
        {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            @can('access','view_classes')
            <a href="{{ route('admin.lesson.index') }}">
                @endcan
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-desktop"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Materi</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalClasses }}
                    </div>
                </div>
            </div>
                @can('access','view_classes')
            </a>
            @endcan
        </div> --}}
        @endif
    </div>
    <div class="row">

    @can('access','view_students')
    <div class="row">

        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __lang('latest-users') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row pb-2">
                        @foreach($latestUsers as $user)
                        <div class="col-4 col-sm-3 col-lg-2 mb-4 mb-md-0">
                            <div class="avatar-item mb-0  viewbutton @if($user->student) int_curpoin @endif"  @if($user->student)   data-id="{{ $user->student->id }}" data-toggle="modal" data-target="#simpleModal" title="@lang('default.view')"   @endif >
                                <img  alt="image" src="{{ profilePictureUrl($user->picture) }}" class="img-fluid" data-toggle="tooltip" title="{{  $user->name }} {{ $user->last_name }}">
                                <div class="avatar-badge" title="{{ __lang($user->role->name) }}" data-toggle="tooltip">
                                    @if($user->role_id==1)
                                    <i class="fas fa-wrench"></i>
                                    @else
                                        <i class="fas fa-graduation-cap"></i>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

@endsection
@section('footer')
    <!-- Page Specific JS File -->
    <script src="{{ asset('client/themes/admin/assets/js/page/index-0.js_') }}"></script>

    <script type="text/javascript">
        "use strict";

        var statistics_chart = document.getElementById("myChart").getContext('2d');

        var myChart = new Chart(statistics_chart, {
            type: 'line',
            data: {
                labels: {!! clean($monthList) !!},
                datasets: [{
                    label: '{{ __lang('sales') }}',
                    data: {!! clean($monthSaleData) !!},
                    borderWidth: 5,
                    borderColor: '#6777ef',
                    backgroundColor: 'transparent',
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6777ef',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            stepSize: 1000
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#fbfbfb',
                            lineWidth: 2
                        }
                    }]
                },
            }
        });

        $('#visitorMap').vectorMap(
            {
                map: 'world_en',
                backgroundColor: '#ffffff',
                borderColor: '#f2f2f2',
                borderOpacity: .8,
                borderWidth: 1,
                hoverColor: '#000',
                hoverOpacity: .8,
                color: '#ddd',
                normalizeFunction: 'linear',
                selectedRegions: false,
                showTooltip: true,
                pins: {
                    id: '<div class="jqvmap-circle"></div>',
                    my: '<div class="jqvmap-circle"></div>',
                    th: '<div class="jqvmap-circle"></div>',
                    sy: '<div class="jqvmap-circle"></div>',
                    eg: '<div class="jqvmap-circle"></div>',
                    ae: '<div class="jqvmap-circle"></div>',
                    nz: '<div class="jqvmap-circle"></div>',
                    tl: '<div class="jqvmap-circle"></div>',
                    ng: '<div class="jqvmap-circle"></div>',
                    si: '<div class="jqvmap-circle"></div>',
                    pa: '<div class="jqvmap-circle"></div>',
                    au: '<div class="jqvmap-circle"></div>',
                    ca: '<div class="jqvmap-circle"></div>',
                    tr: '<div class="jqvmap-circle"></div>',
                },
            });
    </script>
    <div class="modal fade" id="simpleModal"  tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __lang('student-details') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('{{ adminUrl(array('controller'=>'student','action'=>'view'))}}'+'/'+id);
            });
        });
    </script>
@endsection
