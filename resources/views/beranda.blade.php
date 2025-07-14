@extends('layout')
@section('content')
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('foto/home.jpg') }}" alt="Image"
                        style="height: 700px; display: block; filter: brightness(80%);">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start" style="padding-top: 50px !important">
                                <div class="col-lg-8">
                                    <p
                                        class="d-inline-block border border-white rounded text-white fw-semi-bold py-1 px-3 animated slideInDown">
                                        Selamat datang di</p>
                                    <h1 class="display-5 mb-4 animated slideInDown text-white">Laravel Surat
                                    </h1>
                                    <p>Klik tombol di bawah ini untuk memulai
                                    </p>
                                    <a href="{{ url('daftar') }}"
                                        class="btn btn-primary py-3 px-5 animated slideInDown">Mulai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp my-auto" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="{{ asset('foto/home.jpg') }}">
                </div>
                <div class="col-lg-6 wow fadeInUp my-auto" data-wow-delay="0.3s">
                    <h1 class="display-5">Tentang Kami</h1>
                    <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book. It has survived not only five
                        centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                        more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
