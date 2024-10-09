@extends('layouts.website', ['pageName' => 'token'])
@section('title', 'token')
@section('web-content')
<!-- Token Sale Start -->
<div class="container-xxl bg-light ">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Golden jubilee</h1>
            <p class="text-primary fs-5 mb-5">Golden jubilee Countdown</p>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">0</h1>
                    <span class="text-primary fs-5">Days</span>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">0</h1>
                    <span class="text-primary fs-5">Hours</span>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">0</h1>
                    <span class="text-primary fs-5">Minutes</span>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">0</h1>
                    <span class="text-primary fs-5">Seconds</span>
                </div>
            </div>
            <div class="col-12 text-center py-4">
                <a class="btn btn-outline-secondary py-3 px-4" href="index.html">Click here</a>
            </div>
            <div class="col-12 text-center">
                <img class="img-fluid m-1" src="{{ asset('/') }}website/img/payment-1.png" alt="" style="width: 50px;">
                <img class="img-fluid m-1" src="{{ asset('/') }}website/img/payment-2.png" alt="" style="width: 50px;">
                <img class="img-fluid m-1" src="{{ asset('/') }}website/img/payment-3.png" alt="" style="width: 50px;">
                <img class="img-fluid m-1" src="{{ asset('/') }}website/img/payment-4.png" alt="" style="width: 50px;">
            </div>
        </div>
    </div>
</div>
<!-- Token Sale Start --><!-- Token Sale Start -->
