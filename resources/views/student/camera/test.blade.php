@extends('layouts.student')

@section('innerTitle', 'Test Camera')

@section('breadcrumb')
@endsection

@section('content')
    <style>
        #test canvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            /* Higher than the video's z-index */
        }

.loader {
  display: inline-block;
  width: 30px;
  height: 30px;
  position: fixed;
  border: 4px solid #Fff;
  top: 50%;
  animation: loader 2s infinite ease;
}

.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 2s infinite ease-in;
}

@keyframes loader {
  0% {
    transform: rotate(0deg);
  }
  
  25% {
    transform: rotate(180deg);
  }
  
  50% {
    transform: rotate(180deg);
  }
  
  75% {
    transform: rotate(360deg);
  }
  
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loader-inner {
  0% {
    height: 0%;
  }
  
  25% {
    height: 0%;
  }
  
  50% {
    height: 100%;
  }
  
  75% {
    height: 100%;
  }
  
  100% {
    height: 0%;
  }
}
    </style>
    <script>
      var coba;
    </script>
    <div id="loader"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); color: white; display: flex; justify-content: center; align-items: center; font-size: 2rem;">
        <span class="loader"><span class="loader-inner"></span></span></div>
    <div class="row" id="test" style="position: absolute; margin-left: -50px; left: 30%;">
        <video id="video-frame" width="400" height="250" autoplay style="position: absolute;"></video>
    </div>

    <script defer src="{{ asset('client/js/face-api.min.js') }}"></script>
    <script defer src="{{ asset('client/js/testCamera.js') }}"></script>
@endsection