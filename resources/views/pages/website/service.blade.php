@extends('layouts.website', ['pageName' => 'service'])
@section('title', 'Service')
@section('web-content')
  <!-- Header Start -->
  <div class="container-fluid hero-header  py-5 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 mb-3 animated slideInDown">Services</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="feature.html">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{ asset('/') }}website/img/49.png"
                    alt="">
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

    <!-- Service Start -->
    <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Services</h1>
                <p class="text-primary fs-5 mb-5">our services</p>
            </div>
            <div class="row g-4">
                @foreach ($service as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item bg-white p-5">
                            <img class="img-fluid mb-4" src="{{ asset($item->image) }}" alt="">
                            <h5 class="mb-3">{{ $item->name }}</h5>
                           <div>
                                {!! $item->description !!}
                           </div>
                            <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                @endforeach
    <!-- Service End -->
@endsection
