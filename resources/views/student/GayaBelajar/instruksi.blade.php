@extends('layouts.student')
@section('innerTitle',$pageTitle)
@section('content')
<div class="container text-white py-3 py-lg-5">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5 col-xl-5 py-xl-4 text-dark align-middle">
                        <h2>Instruksi Pengerjaan Tes Gaya Belajar</h2>
                        <p class="lead">
                            Tes Gaya Belajar digunakan untuk mencari tipe belajar yang cocok untuk Anda apakah termasuk kedalam tipe Visual, Audio, atau Kinestetik.
                        </p>
                    </div>
                    <div class="col"></div>
                    <div class="col-12 col-lg-6 py-xl-6" style="background-color: #52796f">
                        <div class="swiffy-slider h-80 slider-item-reveal slider-indicators-outside slider-indicators-round slider-nav-outside-expand slider-nav-visible slider-nav-animation slider-nav-animation-scale slider-item-first-visible slider-nav-autohide slider-nav-arrow slider-nav-dark" data-slider-nav-animation-threshold="0.4">
                            <ul class="slider-container text-dark py-4" tabindex="-1" style="outline: none;" id="swiffyBenefits">
                                <li class="slide-visible">
                                    <div class="card border-0 h-100 shadow text-light"  style="background-color: #52796f">
                                        <img src="{{ asset('img/2.jpg') }}" class="card-img-top mt-2" style="height: 15rem;" alt="Feature rich">
                                        <div class="card-body p-2 p-lg-3">
                                            <p class="card-text">Tes ini terdiri dari 42 pernyataan, maka bacalah setiap pernyataan tersebut dengan baik dan teliti.</p>
                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="">
                                    <div class="card border-0 h-100 shadow text-light" style="background-color: #52796f">
                                        <img src="{{ asset('img/3.jpg') }}" class="card-img-top mt-2" style="height: 15rem;" alt="Modern CSS">
                                        <div class="card-body p-2 p-lg-3">
                                            <p class="card-text">Pilihlah pernyataan yang sesuai dengan diri Anda</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="">
                                    <div class="card border-0 h-100 shadow text-light" style="background-color: #52796f">
                                        <img src="{{ asset('img/4.jpg') }}" class="card-img-top mt-2" style="height: 15rem;" alt="Setup using markup">
                                        <div class="card-body p-2 p-lg-3">
                                            <p class="card-text">Apabila pernyataan tersebut sesuai dengan diri Anda pilih salah satu dari tiga pernyataan yang sesuai</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="">
                                    <div class="card border-0 h-100 shadow text-light" style="background-color: #52796f">
                                        <img src="{{ asset('img/5.jpg') }}" class="card-img-top mt-2" style="height: 15rem;" alt="Lightweight and fast javascript">
                                        <div class="card-body p-2 p-lg-3">
                                            <p class="card-text">Dalam pengisian tes ini tidak ada pilihan jawaban yang salah, maka jawablah sesuai dengan diri Anda saja</p>
                                        </div>
                                        <a href="{{ route('student.student.test') }}" class="btn btn-outline-light">Mulai Sekarang</a>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="slider-nav" aria-label="Go to previous"></button>
                            <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
                            <ul class="slider-indicators">
                                <li class="active"></li>
                                <li class=""></li>
                                <li></li>
                                <li class=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
@endsection

