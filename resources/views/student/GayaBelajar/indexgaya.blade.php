@extends('layouts.student')
@section('innerTitle',$pageTitle)
{{-- @section('breadcrumb')
@include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.student.kuesioner')=>'Gaya Belajar'
        ]])
@endsection --}}
@section('content')
<style>
  * The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
  <div class="swiffy-slider slider-item-show2 slider-nav-sm slider-nav-page slider-item-snapstart slider-item-nogap slider-nav-round slider-nav-dark slider-indicators-sm slider-indicators-outside slider-indicators-round slider-indicators-dark slider-nav-animation slider-nav-animation-slideup slider-item-first-visible slider-nav-autoplay" data-slider-nav-autoplay-interval="5000">
    <div class="slider-container">
        <div class="p-3 p-xl-5 text-light slide-visible" style="background-image: url('https://i.pinimg.com/originals/84/52/4b/84524b346a541a33e4ecca7a02133f38.jpg')">
        </div>
        <div class="p-3 p-xl-5 text-light slide-visible align-items-center justify-center" style="background-color: #2f3e46;">
            <h3 class="text-uppercase h5">Ayo kenali tipe gaya belajar kamu</h3>
            <p>
                Terdapat 3 tipe gaya belajar yang terdiri dari visual, audio, dan kinestetik. Tiga tipe gaya belajar tersebut dapat diimplementasikan dalam diri setiap orang dimana setiap memiliki gaya belajarnya sendiri. Ayo lakukan test gaya belajar untuk mengetahui manakah tipe gaya belajar kamu.
            </p>
            <a href="{{ route('student.student.instruksi') }}" class="btn btn-outline-light">Lakukan Test</a>
        </div>
        <div class="p-3 p-xl-5 text-light" style="background-image: url('https://i.pinimg.com/originals/ac/73/2d/ac732db89aa945fc43b4d0fc2646b604.gif')">
        </div>
        <div class="p-3 p-xl-5 text-light" style="background-color: #354f52;">
            <h3 class="text-uppercase h5">TIPE GAYA BELAJAR VISUAL</h3>
            <p>
              Gaya belajar visual menyerap informasi terkait dengan visual, warna, gambar, peta, diagram dan belajar dari apa yang dilihat oleh mata. Artinya bukti-bukti konkret harus diperlihatkan terlebih dahulu agar mereka paham, gaya belajar seperti ini mengandalkan penglihatan atau melihat dulu buktinya untuk kemudian mempercayainya.
            </p>
            <a href="{{ route('student.student.instruksi') }}" class="btn btn-outline-light">Lakukan Test</a>
        </div>
        <div class="p-3 p-xl-5 text-light" style="background-image: url('https://www.reactiongifs.com/r/sbs.gif')">
        </div>
        <div class="p-3 p-xl-5 text-light" style="background-color: #52796f;">
            <h3 class="text-uppercase h5">TIPE GAYA BELAJAR AUDIO</h3>
            <p>
              Gaya belajar auditori adalah gaya belajar dengan cara mendengar, yang memberikan penekanan pada segala jenis bunyi dan kata, baik yang diciptakan maupun yang diingat. Gaya pembelajar auditori adalah dimana seseorang lebih cepat menyerap informasi melalui apa yang ia dengarkan.
            </p>
            <a href="{{ route('student.student.instruksi') }}" class="btn btn-outline-light">Lakukan Test</a>
        </div>
        <div class="p-3 p-xl-5 text-light" style="background-image: url('https://i.pinimg.com/originals/f9/e7/a0/f9e7a02065d880479c13d61b5d60f4f2.gif')">
        </div>
        <div class="p-3 p-xl-5 text-light" style="background-color: #52796f;">
            <h3 class="text-uppercase h5">TIPE GAYA BELAJAR KINESTETIK</h3>
            <p>
              Gaya belajar kinestetik dapat belajar paling baik dengan berinteraksi atau mengalami hal-hal di sekitarnya. Gaya pembelajar kinestetik cenderung mampu memahami sesuatu dengan adanya keterlibatan langsung, daripada mendengarkan ceramah atau membaca dari sebuah buku.
            </p>
            <a href="{{ route('student.student.instruksi') }}" class="btn btn-outline-light">Lakukan Test</a>
        </div>
    </div>

    <button type="button" class="slider-nav" aria-label="Go left"></button>
    <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>

    <div class="slider-indicators d-md-none">
        <button class="active" aria-label="Go to slide"></button>
        <button aria-label="Go to slide"></button>
        <button aria-label="Go to slide"></button>
        <button aria-label="Go to slide"></button>
        <button aria-label="Go to slide"></button>
        <button aria-label="Go to slide"></button>
    </div>
</div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

<script>
  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
@endsection
