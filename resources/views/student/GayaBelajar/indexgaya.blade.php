@extends('layouts.student')
@section('innerTitle',$pageTitle)
@section('breadcrumb')
@include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.student.kuesioner')=>'Gaya Belajar'
        ]])
@endsection
@section('content')
{{-- <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
        <div>
          <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
            <img src="{{ asset('img/visual.jpg') }}" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
          </div>
        </div>
  
        <div class="md:pt-8">
          <p class="text-center font-bold text-indigo-500 md:text-left">Tipe Visual</p>
  
          <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">Visual</h1>
  
          <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
            Gaya belajar visual menyerap informasi terkait dengan visual, warna, gambar, peta, diagram dan belajar dari apa yang dilihat oleh mata. Artinya bukti-bukti konkret harus diperlihatkan terlebih dahulu agar mereka paham, gaya belajar seperti ini mengandalkan penglihatan atau melihat dulu buktinya untuk kemudian mempercayainya.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
        <div class="md:pt-8">
            <p class="text-center font-bold text-indigo-500 md:text-left">Tipe Auditori</p>
    
            <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">Auditori</h1>
    
            <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                Gaya belajar auditori adalah gaya belajar dengan cara mendengar, yang memberikan penekanan pada segala jenis bunyi dan kata, baik yang diciptakan maupun yang diingat. Gaya pembelajar auditori adalah dimana seseorang lebih cepat menyerap informasi melalui apa yang ia dengarkan. Penjelasan tertulis akan lebih mudah ditangkap oleh para pembelajar auditori ini.</p>
          </div>

        <div>
          <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
            <img src="{{ asset('img/audio.jpg') }}" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
        <div>
          <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
            <img src="{{ asset('img/kinestetik.jpg') }}" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
          </div>
        </div>
  
        <div class="md:pt-8">
          <p class="text-center font-bold text-indigo-500 md:text-left">Tipe Kinestetik</p>
  
          <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">Kinestetik</h1>
  
          <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
            Gaya belajar kinestetik dapat belajar paling baik dengan berinteraksi atau mengalami hal-hal di sekitarnya. Gaya pembelajar kinestetik cenderung mampu memahami sesuatu dengan adanya keterlibatan langsung, daripada mendengarkan ceramah atau membaca dari sebuah buku. Gaya belajar kinestetik suka melakukan hal-hal dan menggunakan tubuh mereka untuk mengingat fakta, seperti "memanggil" (dialing) nomor telepon pada telepon genggam mereka. Gaya belajar kinestetik, berarti belajar dengan menyentuh dan melakukan.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
    <a href="{{ route('student.student.instruksi') }}" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Test Sekarang</a>
  </div> --}}
<style>
  a {
  color: inherit;
}

.cards-wrapper {
  display: grid;
  justify-content: center;
  align-items: center;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 4rem;
  padding: 4rem;
  margin: 0 auto;
  width: max-content;
}

.card {
  
  --bg-filter-opacity: 0.5;
  background-image: linear-gradient(rgba(0,0,0,var(--bg-filter-opacity)),rgba(0,0,0,var(--bg-filter-opacity))), var(--bg-img);
  height: 20em;
  width: 15em;
  font-size: 1.5em;
  color: white;
  border-radius: 1em;
  padding: 1em;
  /*margin: 2em;*/
  display: flex;
  align-items: flex-end;
  background-size: cover;
  background-position: center;
  box-shadow: 0 0 5em -1em black;
  transition: all, var(--transition-time);
  position: relative;
  overflow: hidden;
  border: 10px solid #ccc;
  text-decoration: none;
}

.card:hover {
  transform: rotate(0);
}

.card h1 {
  margin: 0;
  font-size: 1.5em;
  line-height: 1.2em;
}

.card p {
  font-size: 0.75em;
  font-family: 'Open Sans';
  margin-top: 0.5em;
  line-height: 2em;
}

.card .tags {
  display: flex;
}

.card .tags .tag {
  font-size: 0.75em;
  background: rgba(255,255,255,0.5);
  border-radius: 0.3rem;
  padding: 0 0.5em;
  margin-right: 0.5em;
  line-height: 1.5em;
  transition: all, var(--transition-time);
}

.card:hover .tags .tag {
  background: var(--color);
  color: white;
}

.card .date {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 0.75em;
  padding: 1em;
  line-height: 1em;
  opacity: .8;
}

.card:before, .card:after {
  content: '';
  transform: scale(0);
  transform-origin: top left;
  border-radius: 50%;
  position: absolute;
  left: -50%;
  top: -50%;
  z-index: -5;
  transition: all, var(--transition-time);
  transition-timing-function: ease-in-out;
}

.card:before {
  background: #ddd;
  width: 250%;
  height: 250%;
}

.card:after {
  background: white;
  width: 200%;
  height: 200%;
}

.card:hover {
  color: var(--color);
}

.card:hover:before, .card:hover:after {
  transform: scale(1);
}

.card-grid-space .num {
  font-size: 3em;
  margin-bottom: 1.2rem;
  margin-left: 1rem;
}

.info {
  font-size: 1.2em;
  display: flex;
  padding: 1em 3em;
  height: 3em;
}

.info img {
  height: 3em;
  margin-right: 0.5em;
}

.info h1 {
  font-size: 1em;
  font-weight: normal;
}

/* MEDIA QUERIES */
@media screen and (max-width: 1285px) {
  .cards-wrapper {
    grid-template-columns: 1fr 1fr;
  }
}

@media screen and (max-width: 900px) {
  .cards-wrapper {
    grid-template-columns: 1fr;
  }
  .info {
    justify-content: center;
  }
  .card-grid-space .num {
    /margin-left: 0;
    /text-align: center;
  }
}

@media screen and (max-width: 500px) {
  .cards-wrapper {
    padding: 4rem 2rem;
  }
  .card {
    max-width: calc(100vw - 4rem);
  }
}

@media screen and (max-width: 450px) {
  .info {
    display: block;
    text-align: center;
  }
  .info h1 {
    margin: 0;
  }
}
</style>
  <section class="cards-wrapper">
    <div class="card-grid-space">
      <div class="num">01</div>
      <div class="card" href="https://codetheweb.blog/2017/10/06/html-syntax/" style="--bg-img: url(https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/html-syntax/cover.jpg)">
        <div>
          <h1>Visual</h1>
          <p>Gaya belajar visual menyerap informasi terkait dengan visual, warna, gambar, peta, diagram dan belajar dari apa yang dilihat oleh mata. Artinya bukti-bukti konkret harus diperlihatkan terlebih dahulu agar mereka paham, gaya belajar seperti ini mengandalkan penglihatan atau melihat dulu buktinya untuk kemudian mempercayainya.</p>
        </div>
      </div>
    </div>
    <div class="card-grid-space">
      <div class="num">02</div>
      <div class="card" href="https://codetheweb.blog/2017/10/09/basic-types-of-html-tags/" style="--bg-img: url('https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/basic-types-of-html-tags/cover.jpg')">
        <div>
          <h1>Audio</h1>
          <p>Gaya belajar auditori adalah gaya belajar dengan cara mendengar, yang memberikan penekanan pada segala jenis bunyi dan kata, baik yang diciptakan maupun yang diingat. Gaya pembelajar auditori adalah dimana seseorang lebih cepat menyerap informasi melalui apa yang ia dengarkan.</p>
        </div>
      </div>
    </div>
    <div class="card-grid-space">
      <div class="num">03</div>
      <div class="card" href="https://codetheweb.blog/2017/10/14/links-images-about-file-paths/" style="--bg-img: url('https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/links-images-about-file-paths/cover.jpg')">
        <div>
          <h1>Kinestetik</h1>
          <p>Gaya belajar kinestetik dapat belajar paling baik dengan berinteraksi atau mengalami hal-hal di sekitarnya. Gaya pembelajar kinestetik cenderung mampu memahami sesuatu dengan adanya keterlibatan langsung, daripada mendengarkan ceramah atau membaca dari sebuah buku.</p>
        </div>
      </div>
    </div>
    <!-- https://images.unsplash.com/photo-1520839090488-4a6c211e2f94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=38951b8650067840307cba514b554ba5&auto=format&fit=crop&w=1350&q=80 -->
  </section>
  <section class="info">
    <h1>Ikuti Test &mdash; <button class="btn btn-primary"><a href="{{ route('student.student.instruksi') }}" class="slide-link">Mulai Sekarang!</a></button></h1>
  </section>
@endsection
