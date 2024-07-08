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

{{-- <style>
:root {
  --contentHeight: 30vh;
  --sectionWidth: 1000px;
}

section {
  max-width: var(--sectionWidth);
  margin: 40px auto;
  width: 97%;
  color: white;
  position: relative;
  z-index: 1;
}

.summary-container {
  background-color: rgba(0, 0, 0, 0.5); /* Apply transparency */
  padding: 20px;
  border-radius: 10px; /* Optional: add rounded corners */
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
  position: relative;
}

details > div > img {
  align-self: flex-start;
  max-width: 100%;
  margin-top: 20px;
  z-index: 5; /* Ensure it is below the overlay */
}

details > div > p {
  flex: 1;
  text-align: center;
  align-content: center;
  font-weight: bold;
  z-index: 5; /* Ensure it is below the overlay */
}

details[open] > summary {
  color: white;
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

.middle-button-container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1000; /* Ensure this is higher than any other z-index in the section */
}


</style>

<section>
  <div class="summary-container">
  @if ( $tampil == 'Audio Visual')
  <div class="row">
    <div class="col">
      <details open>
        <summary>1. Audio {{ $audio }}%</summary>
        <div>
          <img src="{{ asset('img/Auditory.png') }}" />
          <p>{{ $deskripsiAudio }}</p>
        </div>
      </details>
    </div>
    <div class="col">
      <details open>
        <summary>2. Visual {{ $visual }}%</summary>
        <div>
          <img src="{{ asset('img/Visual.png') }}" />
          <p>{{ $deskripsiVisual }}</p>  
        </div>
      </details>
    </div>
</div>
<div class="row">
  <details>
    <summary>3. Kinestetik {{ $kinestetik }}%</summary>
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
        <summary>1. Audio {{ $audio }}%</summary>
        <div>
          <img src="{{ asset('img/Auditory.png') }}" />
          <p>{{ $deskripsiAudio }}</p></div>
      </details>
    </div>
    <div class="col">
      <details open>
        <summary>2. Kinestetik {{ $kinestetik }}%</summary>
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
    <details open>
      <summary>3. Visual {{ $visual }}%</summary>
      <div>
        <img src="{{ asset('img/Visual.png') }}" />
        <p>
          {{ $deskripsiVisual }}
        </p>
      </div>
    </details>
  </div>
  @elseif ($tampil == 'Visual Audio')
  <div class="row">
    <div class="col">
      <details open>
        <summary>1. Visual {{ $visual }}%</summary>
        <div>
          <img src="{{ asset('img/Visual.png') }}" />
          <p>
            {{ $deskripsiVisual }}
          </p>
        </div>
      </details>
      <details open>
        <summary>2. Audio {{ $audio }}%</summary>
        <div>
          <img src="{{ asset('img/Auditory.png') }}" />
          <p>{{ $deskripsiAudio }}</p></div>
      </details>
    </div>
  </div>
  <div class="row">
    <details>
      <summary>3. Kinestetik {{ $kinestetik }}%</summary>
      <div>
        <img src="{{ asset('img/Kinestethic.png') }}" />
        <p>
          {{ $deskripsiKinestetik }}
        </p>
      </div>
    </details>
  </div>
  @elseif ($tampil == 'Visual Kinestetik')
  <div class="row">
    <div class="col">
      <details open>
        <summary>1. Visual {{ $visual }}%</summary>
        <div>
          <img src="{{ asset('img/Visual.png') }}" />
          <p>
            {{ $deskripsiVisual }}
          </p>
        </div>
      </details>
      <details open>
        <summary>2. Kinestetik {{ $kinestetik }}%</summary>
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
      <summary>3. Audio {{ $audio }}%</summary>
      <div>
        <img src="{{ asset('img/Auditory.png') }}" />
        <p>{{ $deskripsiAudio }}</p></div>
    </details>
  </div>
  @elseif ($tampil == 'Kinestetik Audio')
  <div class="row">
    <div class="col">
      <details open>
        <summary>1. Kinestetik {{ $kinestetik }}%</summary>
        <div>
          <img src="{{ asset('img/Kinestethic.png') }}" />
          <p>
            {{ $deskripsiKinestetik }}
          </p>
        </div>
      </details>
      <details open>
        <summary>2. Audio {{ $audio }}%</summary>
        <div>
          <img src="{{ asset('img/Auditory.png') }}" />
          <p>{{ $deskripsiAudio }}</p></div>
        </div>
      </details>
    </div>
  </div>
  <div class="row">
    <details>
      <summary>3. Visual {{ $visual }}%</summary>
      <div>
        <img src="{{ asset('img/Visual.png') }}" />
        <p>
          {{ $deskripsiVisual }}
        </p>
      </div>
    </details>
  </div>
  @elseif ($tampil == 'Kinestetik Visual')
  <div class="row">
    <div class="col">
      <details open>
        <summary>1. Kinestetik {{ $kinestetik }}%</summary>
        <div>
          <img src="{{ asset('img/Kinestethic.png') }}" />
          <p>
            {{ $deskripsiKinestetik }}
          </p>
        </div>
      </details>
      <details open>
        <summary>2. Visual {{ $visual }}%</summary>
        <div>
          <img src="{{ asset('img/Visual.png') }}" />
          <p>
            {{ $deskripsiVisual }}
          </p>
        </div>
      </details>
    </div>
  </div>
  <div class="row">
    <details>
      <summary>3. Audio {{ $audio }}%</summary>
      <div>
        <img src="{{ asset('img/Auditory.png') }}" />
        <p>{{ $deskripsiAudio }}</p></div>
    </details>
  </div>
  @elseif ($tampil == 'Audio, Visual, dan Kinestetik')
  <details open>
    <summary>1. Audio {{ $audio }}%</summary>
    <div>
      <img src="{{ asset('img/Auditory.png') }}" />
      <p>{{ $deskripsiAudio }}</p>
    </div>
  </details>
  <details open>
    <summary>2. Visual {{ $visual }}%</summary>
    <div>
      <img src="{{ asset('img/Visual.png') }}" />
      <p>{{ $deskripsiVisual }}</p>  
    </div>
  </details>
  <details>
    <summary>3. Kinestetik {{ $kinestetik }}%</summary>
    <div>
      <img src="{{ asset('img/Kinestethic.png') }}" />
      <p>
        {{ $deskripsiKinestetik }}
      </p>
    </div>
  </details>
  @endif
</div>
  <!-- Centered button -->
  <div class="middle-button-container">
    <a href="{{ route('groupcourse') }}" class="middle-button">
      <button class="btn btn-primary btn-lg">Pilih Kelas</button>
    </a>
  </div>
</section> --}}
    <style>
        

        .row {
            display: flex;
            flex-direction: column; /* Change to column for small screens */
            justify-content: center;
            align-items: center;
            height: 50vh; /* Full viewport height */
            position: relative;
        }

        .column {
            flex: 1;
            margin: 10px;
            width: 100%; /* Full width for small screens */
            height: 300px; /* Adjust height as needed */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            text-align: center;
            overflow: hidden; /* Ensure overlay doesn't spill over */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay color with transparency */
            opacity: 1; /* Initially hidden */
           /* Smooth transition for opacity */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .column:hover .overlay {
            opacity: 1; /* Show overlay on hover */
        }

        .content {
            position: relative;
            z-index: 1;
            color: white;
        }

        .content h1 {
            margin: 0;
        }

        .center-button {
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 2; /* Ensure the button is above other elements */
        }

        .center-button:hover {
            background-color: #0056b3;
        }

        @media (min-width: 769px) {
            .row {
                flex-direction: row; /* Revert to row for larger screens */
            }

            .column {
                width: auto; /* Reset width to auto for larger screens */
            }
        }

    </style>
    <div class="container">
        <div class="row">
          @if ( $tampil == 'Audio Visual')
               <div class="column" style="background-image: url('{{ asset('img/Auditory.png') }}');">
                <div class="overlay">
                    <div class="content">
                      <h1>1. Audio {{ $audio }}%</h1>
                        <p>{{ $deskripsiAudio }}</p>
                    </div>
                </div>
            </div>
            <div class="column" style="background-image: url('{{ asset('img/Visual.png') }}');">
                <div class="overlay">
                    <div class="content">
                      <h1>2. Visual {{ $visual }}%</h1>
                      <p>{{ $deskripsiVisual }}</p>
                    </div>
                </div>
            </div>
            <div class="column" style="background-image: url('{{ asset('img/Kinestethic.png') }}');">
                <div class="overlay">
                    <div class="content">
                      <h1>3. Kinestetik {{ $kinestetik }}%</h1>
                      <p>{{ $deskripsiKinestetik }}</p>
                    </div>
                </div>
            </div>
          @elseif ($tampil == 'Audio Kinestetik')
          <div class="column" style="background-image: url('{{ asset('img/Auditory.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>1. Audio {{ $audio }}%</h1>
                    <p>{{ $deskripsiAudio }}</p>
                </div>
            </div>
        </div>
          <div class="column" style="background-image: url('{{ asset('img/Kinestethic.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>2. Kinestetik {{ $kinestetik }}%</h1>
                  <p>{{ $deskripsiKinestetik }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Visual.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>3. Visual {{ $visual }}%</h1>
                  <p>{{ $deskripsiVisual }}</p>
                </div>
            </div>
        </div>
          @elseif ($tampil == 'Visual Audio')
          <div class="column" style="background-image: url('{{ asset('img/Visual.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>1. Visual {{ $visual }}%</h1>
                    <p>{{ $deskripsiVisual }}</p>
                </div>
            </div>
        </div>
            <div class="column" style="background-image: url('{{ asset('img/Auditory.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>2. Audio {{ $audio }}%</h1>
                  <p>{{ $deskripsiAudio }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Kinestethic.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>3. Kinestetik {{ $kinestetik }}%</h1>
                  <p>{{ $deskripsiKinestetik }}</p>
                </div>
            </div>
        </div>
          @elseif ($tampil == 'Visual Kinestetik')
            <div class="column" style="background-image: url('{{ asset('img/Visual.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>1. Visual {{ $visual }}%</h1>
                    <p>{{ $deskripsiVisual }}</p>
                </div>
            </div>
        </div>
          <div class="column" style="background-image: url('{{ asset('img/Kinestethic.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>2. Kinestetik {{ $kinestetik }}%</h1>
                  <p>{{ $deskripsiKinestetik }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Auditory.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>3. Audio {{ $audio }}%</h1>
                  <p>{{ $deskripsiAudio }}</p>
                </div>
            </div>
        </div>
          @elseif ($tampil == 'Kinestetik Audio')
            <div class="column" style="background-image: url('{{ asset('img/Kinestethic.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>1. Kinestetik {{ $kinestetik }}%</h1>
                    <p>{{ $deskripsiKinestetik }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Auditory.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>2. Audio {{ $audio }}%</h1>
                  <p>{{ $deskripsiAudio }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Visual.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>3. Visual {{ $visual }}%</h1>
                  <p>{{ $deskripsiVisual }}</p>
                </div>
            </div>
        </div>
          @elseif ($tampil == 'Kinestetik Visual')
            <div class="column" style="background-image: url('{{ asset('img/Kinestethic.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>1. Kinestetik {{ $kinestetik }}%</h1>
                    <p>{{ $deskripsiKinestetik }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Visual.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>2. Visual {{ $visual }}%</h1>
                  <p>{{ $deskripsiVisual }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Auditory.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>3. Audio {{ $audio }}%</h1>
                  <p>{{ $deskripsiAudio }}</p>
                </div>
            </div>
        </div>
          @elseif ($tampil == 'Audio, Visual, dan Kinestetik')
          <div class="column" style="background-image: url('{{ asset('img/Auditory.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>2. Audio {{ $audio }}%</h1>
                  <p>{{ $deskripsiAudio }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Visual.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>2. Visual {{ $visual }}%</h1>
                  <p>{{ $deskripsiVisual }}</p>
                </div>
            </div>
        </div>
        <div class="column" style="background-image: url('{{ asset('img/Kinestethic.png') }}');">
            <div class="overlay">
                <div class="content">
                  <h1>3. Kinestetik {{ $kinestetik }}%</h1>
                  <p>{{ $deskripsiKinestetik }}</p>
                </div>
            </div>
        </div>
        </div>
        @endif
        <a href="{{ route('groupcourse') }}" class="middle-button">
          <button class="center-button">Pilih Kelas</button>
        </a>
    </div>

@endsection