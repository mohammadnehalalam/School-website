@extends('layouts.website', ['pageName' => 'news'])
@section('title', 'News Detail')
@section('web-content')

<section id="product-background" class="product-background d-flex" style="background-image: url('{{ asset('/website/assets/image/section-background/'.$backimage->bgimage_other) }}')">
	<div class="container align-self-center">
			<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
							<nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '';">
								<ol class="breadcrumb justify-content-center">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home </a></li>
									<span>&nbsp;/&nbsp;</span>
									<li class="breadcrumb-item"><a href="{{ route('news') }}">News </a></li>
									<span>&nbsp;/&nbsp;</span>
									<li class="breadcrumb-item active" aria-current="page"> {{ $news->title }}</li>
								</ol>
							</nav>
					</div>
			</div>
	</div>
</section>

<section id="news-details" class="news-details section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="fs-2 fw-bold text-center text-uppercase text-white"><span class="section-border">News & Events</span></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="details-box clearfix" style="text-align: justify">
					<div class="img-box float-start w-50 pe-md-4">
						<img src="{{ asset($news->image) }}" alt="" class="img-fluid">
					</div>
					<div class="date float-end">{{ date('Y-m-d', strtotime($news->created_at)) }}</div>
					<h4>{{ $news->title }}</h4>
					<p style="text-align: justify">{{ $news->description }}</p>
				</div>
			</div>
			<div class="col-md-6 col-12">
			</div>
		</div>
	</div>
</section>

@endsection