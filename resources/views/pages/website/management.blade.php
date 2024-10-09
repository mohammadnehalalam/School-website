@extends('layouts.website', ['pageName' => 'management'])
@section('title', 'Management')
@section('web-content')
<section id="navigation-path" class="navigation-path">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-cap">
                    <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Management</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shock-section managment-list section-padding" id="management-list">
    <div class="container">
        <!-- Intro -->
        <div class="basic-intro mb-1 text-center">
            <h2 class="title black text-center">
                <span class="text-1 text-style-7">Our </span>
                <span class="text-2 text-style-8">Management</span>
            </h2>
        </div>
        <div class="row g-4">
            @foreach ($management as $item)
                <div class="col-12 col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                    <div class="card boxed parent">
                        <!-- Image -->
                        <div class="image-wrapper shadow rounded {{ $item == $management[1]? 'floating-item': 'hover-up-down'  }}">
                            <img src="{{asset($item->image)}}" alt="{{ $item->name }}" class="image fit-cover">
                        </div>
                        <!-- Box -->
                        <div class="card-body box shadow rounded bg-color white">
                            <span class="label-vertical-icons">
                                <a href="{{ $item->facebook }}" target="_blank"
                                    class="link primary-50 primary-hover"><i class="icon fab fa-facebook-f"></i></a>
                                <a href="{{ $item->twitter }}" target="_blank"
                                    class="link primary-50 primary-hover"><i class="icon fab fa-twitter"></i></a>
                                <a href="{{ $item->instagram }}" target="_blank"
                                    class="link primary-50 primary-hover"><i class="icon fab fa-instagram"></i></a>
                            </span>
                            <h3 class="title text-style-11 black">{{$item->name}}</h3>
                            <p class="description">{{$item->designation}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>
@endsection