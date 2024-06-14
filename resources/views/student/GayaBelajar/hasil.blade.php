@extends('layouts.student')
@section('innerTitle','Hasil Tipe Gaya Belajar Kamu')
@section('breadcrumb')
@include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>'Dashboard',
            route('student.student.kuesioner')=>'Gaya Belajar'
        ]])
@endsection
@section('content')
<style>
:root {
  --contentHeight: 30vh;
  --sectionWidth: 1000px;
}

section {
  max-width: var(--sectionWidth);
  margin: 40px auto;
  width: 97%;
  color: black;
}

summary {
  display: block;
  cursor: pointer;
  padding: 10px;
  font-size: 22px;
  transition: .3s;
  border-bottom: 2px solid;
  user-select: none;
}

details > div {
  display: flex;
  flex-wrap: wrap;
  overflow: auto;
  height: 100%;
  user-select: none;
  padding: 0 20px;
  font-family: "Karla", sans-serif;
  line-height: 1.5;
}

details > div > img {
  align-self: flex-start;
  max-width: 100%;
  margin-top: 20px;
}

details > div > p {
  flex: 1;
  text-align: center;
  align-content: center;
  font-weight: bold;
}

details[open] > summary {
   color: green;
}

@media (min-width: 768px) {
  details[open] > div > p {
    opacity: 0;
    animation-name: showContent;
    animation-duration: 0.6s;
    animation-delay: 0.2s;
    animation-fill-mode: forwards;
    margin: 0;
    padding-left: 20px;
  }

  details[open] > div {
    animation-name: slideDown;
    animation-duration: 0.3s;
    animation-fill-mode: forwards;
  }

  details[open] > div > img {
    opacity: 0;
    height: 100%;
    margin: 0;
    animation-name: showImage;
    animation-duration: 0.3s;
    animation-delay: 0.15s;
    animation-fill-mode: forwards;
  }
}

@keyframes slideDown {
  from {
    opacity: 0;
    height: 0;
    padding: 0;
  }

  to {
    opacity: 1;
    height: var(--contentHeight);
    padding: 20px;
  }
}

@keyframes showImage {
  from {
    opacity: 0;
    clip-path: inset(50% 0 50% 0);
    transform: scale(0.4);
  }

  to {
    opacity: 1;
    clip-path: inset(0 0 0 0);
  }
}

@keyframes showContent {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>

<section>
  @if ( $tampil == 'Audio Visual')
  <div class="row">
    <div class="col">
      <details open>
        <summary>Audio {{ $audio }}%</summary>
        <div>
          <img src="{{ asset('img/Auditory.png') }}" />
          <p>{{ $deskripsiAudio }}</p>
        </div>
      </details>
    </div>
    <div class="col">
      <details open>
        <summary>Visual {{ $visual }}%</summary>
        <div>
          <img src="{{ asset('img/Visual.png') }}" />
          <p>{{ $deskripsiVisual }}</p>  
        </div>
      </details>
    </div>
</div>
<div class="row">
  <details>
    <summary>Kinestetik {{ $kinestetik }}%</summary>
    <div>
      <img src="{{ asset('img/Kinestethic.png') }}" />
      <p>
        {{ $deskripsiKinestetik }}
      </p>
    </div>
  </details>
</div>
  @elseif ( $tampil == 'Audio Kinestetik')
  <div class="row">
    <div class="col">
      <details open>
        <summary>Audio {{ $audio }}%</summary>
        <div>
          <img src="{{ asset('img/Auditory.png') }}" />
          <p>{{ $deskripsiAudio }}</p></div>
      </details>
    </div>
    <div class="col">
      <details open>
        <summary>Kinestetik {{ $kinestetik }}%</summary>
        <div>
          <img src="{{ asset('img/Kinestethic.png') }}" />
          <p>
            {{ $deskripsiKinestetik }}
          </p>
        </div>
      </details>
    </div>
  </div>
  <div class="row">
    <details>
      <summary>Visual {{ $visual }}%</summary>
      <div>
        <img src="{{ asset('img/Visual.png') }}" />
        <p>
          {{ $deskripsiVisual }}
        </p>
      </div>
    </details>
  </div>
  @elseif ($tampil == 'Visual Audio')
  <details open>
    <summary>Visual {{ $visual }}%</summary>
    <div>
      <img src="{{ asset('img/Visual.png') }}" />
      <p>
        {{ $deskripsiVisual }}
      </p>
    </div>
  </details>
  <details open>
    <summary>Audio {{ $audio }}%</summary>
    <div>
      <img src="{{ asset('img/Auditory.png') }}" />
      <p>{{ $deskripsiAudio }}</p></div>
  </details>
  <details>
    <summary>Kinestetik {{ $kinestetik }}%</summary>
    <div>
      <img src="{{ asset('img/Kinestethic.png') }}" />
      <p>
        {{ $deskripsiKinestetik }}
      </p>
    </div>
  </details>
  @elseif ($tampil == 'Visual Kinestetik')
  <details open>
    <summary>Visual {{ $visual }}%</summary>
    <div>
      <img src="{{ asset('img/Visual.png') }}" />
      <p>
        {{ $deskripsiVisual }}
      </p>
    </div>
  </details>
  <details open>
    <summary>Kinestetik {{ $kinestetik }}%</summary>
    <div>
      <img src="{{ asset('img/Kinestethic.png') }}" />
      <p>
        {{ $deskripsiKinestetik }}
      </p>
    </div>
  </details>
  <details>
    <summary>Audio {{ $audio }}%</summary>
    <div>
      <img src="{{ asset('img/Auditory.png') }}" />
      <p>{{ $deskripsiAudio }}</p></div>
  </details>
  @elseif ($tampil == 'Kinestetik Audio')
  <details open>
    <summary>Kinestetik {{ $kinestetik }}%</summary>
    <div>
      <img src="{{ asset('img/Kinestethic.png') }}" />
      <p>
        {{ $deskripsiKinestetik }}
      </p>
    </div>
  </details>
  <details open>
    <summary>Audio {{ $audio }}%</summary>
    <div>
      <img src="{{ asset('img/Auditory.png') }}" />
      <p>{{ $deskripsiAudio }}</p></div>
  </details>
  <details>
    <summary>Visual {{ $visual }}%</summary>
    <div>
      <img src="{{ asset('img/Visual.png') }}" />
      <p>
        {{ $deskripsiVisual }}
      </p>
    </div>
  </details>
  @elseif ($tampil == 'Kinestetik Visual')
  <details open>
    <summary>Kinestetik {{ $kinestetik }}%</summary>
    <div>
      <img src="{{ asset('img/Kinestethic.png') }}" />
      <p>
        {{ $deskripsiKinestetik }}
      </p>
    </div>
  </details>
  <details open>
    <summary>Visual {{ $visual }}%</summary>
    <div>
      <img src="{{ asset('img/Visual.png') }}" />
      <p>
        {{ $deskripsiVisual }}
      </p>
    </div>
  </details>
  <details>
    <summary>Audio {{ $audio }}%</summary>
    <div>
      <img src="{{ asset('img/Auditory.png') }}" />
      <p>{{ $deskripsiAudio }}</p></div>
  </details>
  @elseif ($tampil == 'Audio, Visual, dan Kinestetik')
  <details open>
    <summary>Audio {{ $audio }}%</summary>
    <div>
      <img src="{{ asset('img/Auditory.png') }}" />
      <p>{{ $deskripsiAudio }}</p>
    </div>
  </details>
  <details open>
    <summary>Visual {{ $visual }}%</summary>
    <div>
      <img src="{{ asset('img/Visual.png') }}" />
      <p>{{ $deskripsiVisual }}</p>  
    </div>
  </details>
  <details>
    <summary>Kinestetik {{ $kinestetik }}%</summary>
    <div>
      <img src="{{ asset('img/Kinestethic.png') }}" />
      <p>
        {{ $deskripsiKinestetik }}
      </p>
    </div>
  </details>
  @endif
</section>
@endsection