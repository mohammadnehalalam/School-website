@extends('layouts.website', ['pageName' => 'gallery'])
@section('title', 'Gallery')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('website/assets/css/vendor/jquery.fancybox.min.css') }}">
@endpush
@section('web-content')
<section id="navigation-path" class="navigation-path">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-cap">
                    <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Photos</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="gallery" class="our-gallery section-padding">
    <div class="container">
        <div class="row">
            <h2 class="fs-2 fw-bold text-center text-uppercase"><span class="section-border-black">Our 
                    Gallery</span></h2>
                    <div id="demo"></div>
        </div>
        <div class="row gy-lg-4">
            @foreach ($gallery as $item)
            <div class="col-lg-3">
                <a href="{{ asset('uploads/gallery/' . $item->image) }}" data-fancybox="gallery" data-caption="{{ $item->name }}" title="{{ $item->name }}"
                    class="image-link">
                    <img src="{{ asset('uploads/gallery/' . $item->image) }}" alt="" class="img-fluid">
                </a>

            </div>
            @endforeach           
        </div>
    </div>
</section>
@endsection

@push('web-js')
<script src="{{asset('website/assets/js/vendor/jquery.fancybox.min.js')}}"></script>
@endpush