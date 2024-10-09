@extends('layouts.website', ['pageName'=>'service'])
@section('title', 'Service Detail')
@section('web-content')
    <section id="navigation-path" class="navigation-path">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-cap">
                        <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('service') }}">Service</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $service->name }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="service-detail" class="service-detail section-padding">
        <div class="container">                
            <div class="row">
                <div class="col-lg-8">
                    <img class="w-75" src="{{ asset($service->image) }}" alt="">
                    <div class="service-detail mt-lg-4">
                        <h3>{{ $service->name }}</h3>
                        <div class="description">
                            <p>{!! $service->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-panel">
                        <div class="title text-white rounded-top py-2 px-4">
                            <i class="fas fa-briefcase"></i>
                            Our Service
                        </div>
                        <aside>
                            <div class="post-category-widget">
                                <ul>
                                    @foreach ($serviceList as $item)
                                    <li><a href="{{ route('service-detail', $item->id) }}">{{ $item->name }}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="follow-us mt-3">
                        <div class="title text-white rounded-top py-2 px-4">
                            <i class="fas fa-briefcase"></i>
                            Follow Us
                        </div>
                        <aside>
                            <div class="post-category-widget">
                                <div class="social-icon">
                                    <a href="{{ asset($content->facebook) }}" target="_blank"><i class="fab fa-facebook-f facebook"></i></a>
                                    <a href="{{ asset($content->twitter) }}" target="_blank"><i class="fab fa-twitter twitter"></i></a>
                                    <a href="{{ asset($content->linkedin) }}" target="_blank"><i class="fab fa-linkedin-in linkedin"></i></a>
                                    <a href="{{ asset($content->instagram) }}" target="_blank"><i class="fab fa-instagram instagram"></i></a>
                                    <a href="{{ asset($content->youtube) }}" target="_blank"><i class="fab fa-youtube youtube"></i></a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection