@extends('layouts.website', ['pageName' => 'roadmap'])
@section('title', 'roadmap')
@section('web-content')
  <!-- Header Start -->
  <div class="container-fluid hero-header bg-light py-5 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 mb-3 animated slideInDown">Roadmap</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item"><a href="feature">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roadmap</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{ asset('/') }}website/img/images.jpeg"
                    alt="">
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Roadmap Start -->
<div class="container-xxl ">
    <div class="container"style="margin-top:-105px">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Roadmap</h1>
            <p class="text-primary fs-5 mb-3">We Translate Your Dream Into Reality</p>
        </div>
        <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>january,2023</h5>
                <span>make pass rate 90%</span>
            </div>




            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>March 2025</h5>
                <span>improve pass rate at 100%</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>May 2026</h5>
                <span>increase GPA percantage at 70%</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>July 2030</h5>
                <span>will become smart school</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>September 2035</h5>
                <span>will Become the best institution in South Asia</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>November 2045</h5>
                <span>Will build University</span>
            </div>
        </div>
    </div>
</div>
<!-- Roadmap End -->
@endsection
