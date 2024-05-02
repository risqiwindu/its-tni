@extends('layouts.student')
@section('innerTitle',$pageTitle)
@section('breadcrumb')
@include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.student.kuesioner')=>'Gaya Belajar',
            route('student.student.instruksi')=>'Instruksi'
        ]])
@endsection
@section('content')
<style>
html {
  box-sizing: border-box;
}

*,
*::before,
*::after {
  box-sizing: inherit;
  padding: 0;
  margin: 0;
}

.row {
  font-size: 16px;
  line-height: 1.5;
  font-family: Roboto, sans-serif;
}

.slider {
  position: relative;
  width: 960px;
  height: 300px;
  margin: 50px auto;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12),
    0 3px 1px -2px rgba(0, 0, 0, 0.2);
  overflow: hidden;
}

.slider-controls {
  position: absolute;
  bottom: 0px;
  left: 50%;
  width: 200px;
  text-align: center;
  transform: translatex(-50%);
  z-index: 1000;

  list-style: none;
  text-align: center;
}

.slider input[type="radio"] {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  width: 0;
  height: 0;
}

.slider-controls label {
  display: inline-block;
  border: none;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  cursor: pointer;
  background-color: #212121;
  transition: background-color 0.2s linear;
}

#btn-1:checked ~ .slider-controls label[for="btn-1"] {
  background-color: #3B71CA;
}

#btn-2:checked ~ .slider-controls label[for="btn-2"] {
  background-color: #3B71CA;
}

#btn-3:checked ~ .slider-controls label[for="btn-3"] {
  background-color: #3B71CA;
}

#btn-4:checked ~ .slider-controls label[for="btn-4"] {
  background-color: #3B71CA;
}

/* SLIDES */

.slides {
  list-style: none;
  padding: 0;
  margin: 0;
  height: 100%;
}

.slide {
  position: absolute;
  top: 0;
  left: 0;

  display: flex;
  justify-content: space-between;
  padding: 20px;
  width: 100%;
  height: 100%;

  opacity: 0;
  transform: translatex(-100%);
  transition: transform 250ms linear;
}

.slide-content {
  width: 400px;
  margin: auto;
}

.slide-title {
  margin-bottom: 20px;
  font-size: 36px;
}

.slide-text {
  margin-bottom: 20px;
}



.slide-image img {
  max-width: 100%;
}

/* Slide animations */
#btn-1:checked ~ .slides .slide:nth-child(1) {
  transform: translatex(0);
  opacity: 1;
}

#btn-2:checked ~ .slides .slide:nth-child(2) {
  transform: translatex(0);
  opacity: 1;
}

#btn-3:checked ~ .slides .slide:nth-child(3) {
  transform: translatex(0);
  opacity: 1;
}

#btn-4:checked ~ .slides .slide:nth-child(4) {
  transform: translatex(0);
  opacity: 1;
}

#btn-1:not(:checked) ~ .slides .slide:nth-child(1) {
  animation-name: swap-out;
  animation-duration: 300ms;
  animation-timing-function: linear;
}

#btn-2:not(:checked) ~ .slides .slide:nth-child(2) {
  animation-name: swap-out;
  animation-duration: 300ms;
  animation-timing-function: linear;
}

#btn-3:not(:checked) ~ .slides .slide:nth-child(3) {
  animation-name: swap-out;
  animation-duration: 300ms;
  animation-timing-function: linear;
}

#btn-4:not(:checked) ~ .slides .slide:nth-child(4) {
  animation-name: swap-out;
  animation-duration: 300ms;
  animation-timing-function: linear;
}

@keyframes swap-out {
  0% {
    transform: translatex(0);
    opacity: 1;
  }

  50% {
    transform: translatex(50%);
    opacity: 0;
  }

  100% {
    transform: translatex(100%);
  }
}

</style>
<div class="row">
  <div class="slider">
    <input type="radio" name="toggle" id="btn-1" checked>
    <input type="radio" name="toggle" id="btn-2">
    <input type="radio" name="toggle" id="btn-3">
    <input type="radio" name="toggle" id="btn-4">
  
    <div class="slider-controls">
      <label for="btn-1"></label>
      <label for="btn-2"></label>
      <label for="btn-3"></label>
      <label for="btn-4"></label>
    </div>
  
    <ul class="slides">
      <li class="slide">
        <div class="slide-content">
          <h2 class="slide-title">Instruksi.1</h2>
          <p class="slide-text">Terdapat beberapa pernyataan dan kamu diminta untuk memilih salah satu dari tiga pilihan jawaban yang paling sesuai dengan keadaan kamu saat ini.</p>
        </div>
        <p class="slide-image">
          <img src="{{ asset('img/2.jpg') }}" alt="stuff" width="320" height="240">
        </p>
      </li>
      <li class="slide">
        <div class="slide-content">
          <h2 class="slide-title">Instruksi.2</h2>
          <p class="slide-text">Temukan posisi senyaman mungkin dan pastikan tidak ada kegiatan lain yang sedang kamu lakukan saat menjawab tes.</p>
        </div>
        <p class="slide-image">
          <img src="{{ asset('img/4.jpg') }}" alt="stuff" width="320" height="240">
        </p>
      </li>
      <li class="slide">
        <div class="slide-content">
          <h2 class="slide-title">Instruksi.3</h2>
          <p class="slide-text">Jawablah setiap pertanyaan dengan jujur. Setiap soal dalam tes ini hanya bisa satu kali, jadi kerjakanlah dengan teliti.</p>
        </div>
        <p class="slide-image">
          <img src="{{ asset('img/5.jpg') }}" alt="stuff" width="320" height="240">
        </p>
      </li>
      <li class="slide">
        <div class="slide-content">
          <h2 class="slide-title">Instruksi.4</h2>
          <p class="slide-text">Jika sudah paham klik tombol Mulai Sekarang.</p>
          <a href="{{ route('student.student.test') }}" class="btn btn-primary">Mulai Sekarang!</a>
        </div>
        <p class="slide-image">
          <img src="{{ asset('img/3.jpg') }}" alt="stuff" width="320" height="240">
        </p>
      </li>
    </ul>
  </div>
</div>

@endsection

