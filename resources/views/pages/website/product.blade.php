@extends('layouts.website', ['pageName' => 'product'])
@section('title', 'Product-all')
@section('web-content')

<section id="product-background" class="product-background d-flex" style="background-image: url('{{ asset('/website/assets/image/section-background/'.$backimage->bgimage_other) }}')">
  <div class="container align-self-center">
      <div class="row">
          <div class="col-lg-8 offset-lg-2 col-12">
              <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '';">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <span>&nbsp;/&nbsp;</span>
                    <li class="breadcrumb-item active" aria-current="page">All Product</li>
                  </ol>
                </nav>
          </div>
      </div>
  </div>
</section>

<section id="category-menu" class="category-menu section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-12">
          <h2 class="fs-2 fw-bold text-center text-uppercase text-white"><span class="section-border">Our Products</span></h2>
        </div>
      </div>
      <div class="row gy-3">
        @foreach($product as $item)
        <div class="col-md-3 col-12 text-center">
          <div class="filter-box">
            <a href="{{ route('productDetail', $item->id) }}" class="filter-anchor">
            </a>
            <div class="img-box">
              <img src="{{ asset( @$item->image_thumb?$item->image_thumb:$item->image ) }}" alt="{{ $item->name }}" class="img-fluid"/>
            </div>
            <h5 class="product-title mt-2">{{ $item->name }}</h5>
            <div class="pt-2 d-flex" style="padding-right: 5px; padding-left:5px;">
              <a class="btn btn-sm btn-danger" style="width:58%;border-radius:unset;z-index:2" href="{{ $messenger->link }}">Order Now</a>
              <a class="btn btn-sm btn-primary ms-auto" style="border-radius:unset;z-index:2" href="{{ route('productDetail', $item->id) }}">View Details</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endsection
  