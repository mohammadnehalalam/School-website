@extends('layouts.website', ['pageName' => 'product'])
@section('title', 'Product Detail')
@push('web-css')
<style>
    p {
        font-size: 15px;
    }
    p.title {
        font-size: 16px;
        color: #212529;
        font-weight: 500;
    }
    p.title strong {
        color: #bf3838;
    } 
</style>
@endpush
@section('web-content')

<section id="product-background" class="product-background d-flex" style="background-image: url('{{ asset('/website/assets/image/section-background/'.$backimage->bgimage_other) }}')">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '';">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <span>&nbsp;/&nbsp;</span>
                        @isset($category)
                        <li class="breadcrumb-item"><a href="{{ route('subcategory', $category->id) }}">{{ $category->name }}</a></li>  
                        <span>&nbsp;/&nbsp;</span>
                        @endisset
                        @isset($subcategory)
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('product.subcate', $subcategory->id) }}">{{ $subcategory->name }}</a></li>
                        <span>&nbsp;/&nbsp;</span>
                        @endisset
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </div>
</section>

<section id="product-detail" class="product-detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 clearfix">
                <div class="img-box">
                    <img src="{{ asset($product->image)}}" alt="{{$product->name}}" class="img-fluid">
                </div>
                <div class="detail-product">
                    <h2 class="mt-md-3 py-4" style="color: #ff0000">{{ $product->name}}</h2>
                    <p class="title"><strong>Product code:</strong> {{ @$product->code?$product->code:'Unavailable'}} </p>
                    <p class="title"><strong>Product price:</strong> {{ @$product->price?$product->price:'Unavailable'}} </p>
                    <p class="title"><strong>Category:</strong> {{ @$category->name?$category->name:'Unavailable'}} </p>
                    <p class="title"><strong>Sub Category:</strong> {{ @$subcategory->name?$subcategory->name:'Unavailable'}} </p>
                    <div class="mb-0"><strong style="font-size:16px;color: #bf3838;">Description:</strong></div>
                    <div style="color: #000; text-align: justify; font-size: 15px">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</section>
