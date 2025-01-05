@extends('custumer.master')

@section('Contact')
<section class="banner" style="background-color: #fff8e5; background-image:url({{ asset('assets/img/banner.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <br><h2>Rooms</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <div class="banner-img-1">
                        <img src="{{asset('assets/img/cat-1.jpg')}}" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <img src="{{asset('assets/img/cat-0.jpg')}}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset('assets/img/hero-shaps-1.png')}}" alt="hero-shaps" class="img-2">
    <img src="{{asset('assets/img/hero-shaps-1.png')}}" alt="hero-shaps" class="img-4">
</section>
<div class="container d-flex flex-column justify-content-center align-items-center text-center mt-5 mb-5" style="height: 70vh;">
    <div class="success-message">
        <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
        <h2 class="mb-3">Booking Confirmed!</h2>
        <p class="mb-4">Thank you for your booking. Your reservation has been successfully confirmed.</p>
        <a href="{{ route('home') }}" class="button">Home</a>
    </div>
</div>
@endsection
