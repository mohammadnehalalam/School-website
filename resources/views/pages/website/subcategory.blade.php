@extends('layouts.website', ['pageName' => 'product'])
@section('title', 'Subcategory')
@section('web-content')
<section id="product-background" class="product-background d-flex" style="background-image: url('{{ asset('/website/assets/image/section-background/'.$backimage->bgimage_other) }}')">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '';">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home </a></li>
                      <span>&nbsp;/&nbsp;</span>
                      <li class="breadcrumb-item active" aria-current="page"> {{ $category->name }}</li>
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
          <h2 class="fs-2 fw-bold text-center text-uppercase text-white"><span class="section-border">{{ $category->name }}</span></h2>
        </div>
      </div>
      <div class="row gy-3">
        @foreach($subcategory as $item)
        <div class="col-md-3 col-12 text-center">
          <div class="filter-box">
              <a href="{{ route('product.subcate', $item->id) }}" class="filter-anchor">
              </a>
              <div class="img-box">
                <img src="{{ asset('uploads/subcategory/'. $item->image) }}" alt="{{ $item->name }}" class="img-fluid">
              </div>
              <h5 class="product-title mt-2">{{ Str::limit($item->name, 25, '') }}</h5>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endsection