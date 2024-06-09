{{-- @extends('layouts.student')
@section('innerTitle','Test Camera')
@section('breadcrumb')
@endsection
@section('content')
<div class="row" id="test" style="position: absolute;
margin-left: -50px;
left: 30%;">
    <video id="video" width="400" height="250" autoplay style="position: absolute;">
</div>
    <script defer src="{{ asset('client/js/face-api.min.js') }}"></script>
    <script defer src="{{ asset('client/js/script.js') }}"></script>
@endsection --}}


@extends('layouts.student')
@section('innerTitle','Test Camera')
@section('breadcrumb')
@endsection
@section('content')
<div class="row" id="test">
    <h1><button>Test</button></h1>
    <video id="video" width="400" height="250" autoplay style="position: absolute;">
        <button id="stopButton">Dapatkan Kesimpulan Emosi</button>
</div>
    <script defer src="{{ asset('client/js/face-api.min.js') }}"></script>
    <script defer src="{{ asset('client/js/script.js') }}"></script>
@endsection