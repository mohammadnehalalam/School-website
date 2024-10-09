@extends('layouts.website', ['pageName' => 'about'])
@section('title', 'About')
@section('web-content')
 <!-- Header Start -->
 <div class="container-fluid hero-header bg-light  ">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item"><a href="feature.html">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{ asset('/') }}website/img/school.png"
                    alt="">
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

  <!-- About Start -->
   <!-- About Start -->
   <div class="container-xxl ">
    <div class="container" style="padding-top: 4px;">
        <div class="row g-5 align-items-center">
            @foreach ($about as $item)

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" style="width:250px; margin-left: 50px;" src="{{ asset($item->image) }}" alt="">
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">

                    <h1 class="display-6">About Us</h1>
                    <p>
                        {!! $item->description !!}

                    </p>
                    @endforeach


                    <a class="btn btn-outline-success " href="feature" style="margin-top: 40px;">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<!-- About End -->
@endsection
