@extends('layouts.website', ['pageName' => 'about'])
@section('title', 'About')
@section('web-content')
 <!-- Header Start -->

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Feature</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="feature.html">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Feature</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{ asset('/') }}website/img/49.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-xxl ">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Why Us!</h1>
                <p class="text-primary fs-5 mb-5">Our speciality</p>
            </div>
            <div class="row g-5">
                @foreach ($feature as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="{{ asset($item->image) }}" alt="">
                        <div class="ps-4">
                            <h5 >{{ $item->title }}</h5>
                            <span>
                                {!! $item->description !!}
                            </span>
                        </div>
                    </div>
                </div>

              @endforeach

    @endsection
    <!-- Features End -->
