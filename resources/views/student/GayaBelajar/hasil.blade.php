@extends('layouts.student')
@section('innerTitle','Hasil Tipe Gaya Belajar Kamu')
@section('breadcrumb')
@include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.student.kuesioner')=>'Gaya Belajar'
        ]])
@endsection
@section('content')
{{-- <style>
    @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@700&display=swap");

:root {
  /* Colors */
  --brand-color: hsl(229, 100%, 50%);
  --black: hsl(0, 0%, 0%);
  --white: hsl(0, 0%, 100%);
  /* Fonts */
  --font-title: "Montserrat", sans-serif;
  --font-text: "Lato", sans-serif;
}

/* RESET */

/* Box sizing rules */
*,
*::before,
*::after {
  box-sizing: border-box;
}

/* Remove default margin */
.row,
h2,
p {
  margin: 0;
}

/* GLOBAL STYLES */
.row {
  display: grid;
  place-items: center;
  height: 100vh;
}

h2 {
  font-size: 2.25rem;
  font-family: var(--font-title);
  color: var(--white);
  line-height: 1.1;
}

p {
  font-family: var(--font-text);
  font-size: 0.7rem;
  line-height: 1.5;
  color: var(--white);
}

.flow > * + * {
  margin-top: var(--flow-space, 1em);
}

/* CARD COMPONENT */

.card {
  display: grid;
  place-items: center;
  width: 80vw;
  max-width: 21.875rem;
  height: 28.125rem;
  overflow: hidden;
  border-radius: 0.625rem;
  box-shadow: 0.25rem 0.25rem 0.5rem rgba(0, 0, 0, 0.25);
}

.card > * {
  grid-column: 1 / 2;
  grid-row: 1 / 2;
}

.card__background {
  object-fit: cover;
  max-width: 100%;
  height: 100%;
}

.card__content {
  --flow-space: 0.9375rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-self: flex-end;
  height: 85%;
  padding: 12% 1.25rem 1.875rem;
  background: linear-gradient(
    180deg,
    hsla(0, 0%, 0%, 0) 0%,
    hsla(0, 0%, 0%, 0.3) 10%,
    hsl(0, 0%, 0%) 100%
  );
}

.card__content--container {
  --flow-space: 1.25rem;
}

.card__title {
  position: relative;
  width: fit-content;
  width: -moz-fit-content; /* Prefijo necesario para Firefox  */
}

.card__title::after {
  content: "";
  position: absolute;
  height: 0.3125rem;
  width: calc(100% + 1.25rem);
  bottom: calc((1.25rem - 0.5rem) * -1);
  left: -1.25rem;
  background-color: var(--brand-color);
}

@media (any-hover: hover) and (any-pointer: fine) {
  .card__content {
    transform: translateY(62%);
    transition: transform 500ms ease-out;
    transition-delay: 500ms;
  }

  .card__title::after {
    opacity: 0;
    transform: scaleX(0);
    transition: opacity 1000ms ease-in, transform 500ms ease-out;
    transition-delay: 500ms;
    transform-origin: right;
  }

  .card__background {
    transition: transform 500ms ease-in;
  }

  .card__content--container > :not(.card__title),
  .card__button {
    opacity: 0;
    transition: transform 500ms ease-out, opacity 500ms ease-out;
  }

  .card:hover,
  .card:focus-within {
    transform: scale(1.05);
    transition: transform 500ms ease-in;
  }

  .card:hover .card__content,
  .card:focus-within .card__content {
    transform: translateY(0);
    transition: transform 500ms ease-in;
  }

  .card:focus-within .card__content {
    transition-duration: 0ms;
  }

  .card:hover .card__background,
  .card:focus-within .card__background {
    transform: scale(1.3);
  }

  .card:hover .card__content--container > :not(.card__title),
  .card:hover .card__button,
  .card:focus-within .card__content--container > :not(.card__title),
  .card:focus-within .card__button {
    opacity: 1;
    transition: opacity 500ms ease-in;
    transition-delay: 1000ms;
  }

  .card:hover .card__title::after,
  .card:focus-within .card__title::after {
    opacity: 1;
    transform: scaleX(1);
    transform-origin: left;
    transition: opacity 500ms ease-in, transform 500ms ease-in;
    transition-delay: 500ms;
  }
}


</style>
<div class="row">
  <div class="col-3">
    <article class="card" id="card">
      @if ( $tampil == 'Audio')
      <img
      class="card__background"
      src="{{ asset('img/Auditory.png') }}"
      alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
      width="1920"
      height="2193"
    />
      @elseif ( $tampil == 'Visual')
      <img
      class="card__background"
      src="{{ asset('img/Visual.png') }}"
      alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
      width="1920"
      height="2193"
    />
    @elseif ( $tampil == 'Kinestetik')
    <img
    class="card__background"
    src="{{ asset('img/Kinestethic.png') }}"
    alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
    width="1920"
    height="2193"
  />
    @else
    <img
          class="card__background"
          src="https://i.imgur.com/QYWAcXk.jpeg"
          alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
          width="1920"
          height="2193"
        />
      @endif
        <div class="card__content | flow">
          <div class="card__content--container | flow">
            <h2 class="card__title">{{ $tampil }} {{ $a }}%</h2>
            <p class="card__description">
                {{ $deskripsi }}
            </p>
          </div>
        </div>
      </article>
  </div>
  <div class="col-9">
    <h1>Test</h1>
  </div>
</div>
<script>
    window.onload = function() {
  document.getElementById("card").focus();
}
</script> --}}

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
  <details open>
    <summary>Audio {{ $audio }}%</summary>
    <div>
      <img src="{{ asset('img/Auditory.png') }}" />
      <p>{{ $deskripsiAudio }}</p>
    </div>
  </details>
  <details>
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
  @elseif ( $tampil == 'Audio Kinestetik')
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
  <details>
    <summary>Visual {{ $visual }}%</summary>
    <div>
      <img src="{{ asset('img/Visual.png') }}" />
      <p>
        {{ $deskripsiVisual }}
      </p>
    </div>
  </details>
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
  <details>
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
  <details>
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
  <details>
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
  <details>
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
  <details>
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