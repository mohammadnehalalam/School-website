@extends('layouts.website', ['pageName' => 'news'])
@section('title', 'News & Offers')

@section('web-content')
<section id="product-background" class="product-background d-flex" style="background-image: url('{{ asset('/website/assets/image/section-background/'.$backimage->bgimage_other) }}')">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '';">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home </a></li>
                      <span>&nbsp;/&nbsp;</span>
                      <li class="breadcrumb-item active" aria-current="page">News & Offers</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section id="news-event" class="news-event">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 ps-md-5 pe-md-5 section-padding">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="fs-2 fw-bold text-center text-uppercase text-white"><span
                                class="section-border">News & Offers</span></h2>
                    </div>
                </div>
                <div class="row gy-2 gy-md-0">
                    @foreach ($news as $item)
                        @php
                            $monthNum = date('m', strtotime($item->created_at));
                            $dateObj = DateTime::createFromFormat('!m', $monthNum);
                            $monthName = $dateObj->format('F');
                        @endphp
                        <div class="col-md-3 col-12">
                            <div class="full-box" style="background-color:#fff">
                                <div class="image-card" style="height:240px;overflow:hidden">
                                    <div class="post-date-box"> {{ date('d', strtotime($item->created_at)) }}
                                        <span>{{ $monthName }},
                                            {{ date('y', strtotime($item->created_at)) }}</span></div>
                                    <img src="{{ asset($item->image) }}" alt="" class="img-fluid">
                                </div>
                                <div class="text-box">
                                    <h4 style="height:57px;overflow:hidden;"><a href="{{ route('newsDetail', $item->id) }}">{{ $item->title }}</a></h4>
                                    <p>{{ Str::words($item->description, 15, '') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection