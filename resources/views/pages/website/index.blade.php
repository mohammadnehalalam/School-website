@extends('layouts.website', ['pageName' => 'home'])
@section('title', 'Home')

@push('web-css')
<style>
    .carousel-inner {
        position: relative;
        width: 100%;
        height:450px;
        overflow: hidden;
    }
    @media(min-width:1500px) {
        .carousel-inner {
            height: 570px;
        }
    }
    @media(min-width:1650px) {
        .carousel-inner {
            height: 620px;
        }
    }
    @media(min-width:1800px) {
        .carousel-inner {
            height: 650px;
        }
    }

</style>
@endpush

@section('web-content')
@include('layouts.partials.web_slider')

    <!-- About Start -->
    <div class="container-xxl ">
        <div class="container" style="padding-top: 4px;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeInUp clearfix" data-wow-delay="0.5s">
                    <div class="h-100 wow fadeInUp" data-wow-delay="0.1s" style="float:left">
                        <img class="img-fluid" style="width:250px; margin-left: 50px;margin-right: 50px;" src="{{ asset($content->about_image) }}" alt="">
                    </div>
                    <div class="h-100">
                        <h1 class="display-6">About Us</h1>
                        <div>
                            {!! $content->s_description !!}
                        </div>
                        <a class="btn btn-outline-success " href="feature" style="margin-top: 40px;">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl bg-light ">
        <div class="container py-5">
            <div class="row g-5">
                @foreach ($fact as $item)
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <img class="img-fluid mb-4" src="{{ asset($item->image)}}" alt="" style="width: 150px; height: 150px;">
                    <h1 class="display-4" data-toggle="counter-up">{{ $item->teachers }}</h1>
                    <p class="fs-5 text-primary mb-0">{{ $item->students }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
   
    <!-- Facts End -->


    <!-- Features Start -->
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
                            <div>
                                {!! $item->description !!}
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>

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
            </div>
        </div>
    </div>

    <!-- Service End -->

   <!-- Roadmap Start -->
    <div class="container-xxl ">
        <div class="container"style="margin-top:-105px">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Roadmap</h1>
                <p class="text-primary fs-5 mb-3">We Translate Your Dream Into Reality</p>
            </div>
            <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($roadmap as $item)
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>{{ $item->date }}</h5>
                    <span>{{ $item->title }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Roadmap End -->
 <!-- FAQs Start -->
   <div class="container-xxl ">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">FAQs</h1>
                <p class="text-primary fs-5 ">Frequently Asked Questions</p>
            </div>
            <div class="row justify-content-center">
                @foreach ($faqs as $key => $item)
                <div class="col-lg-10">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">

                            <h2 class="accordion-header" id="headingOne">

                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $key+1 }}" aria-expanded="false" aria-controls="collapse{{ $key+1 }}">
                                    {{ $item->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $key+1 }}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $item->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
   </div>

    <!-- FAQs end -->
@endsection

@push('web-js')

@endpush
