<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset($content['logo']) }}" type="image/x-icon">


    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('/') }}website/img/school.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/') }}website/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}website/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/') }}website/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/') }}website/css/style.css" rel="stylesheet">

    @stack('web-css')
	<!-- PAGE TITLE HERE -->
    <title>@yield('title')-MUBC </title>
</head>

<body>
    {{-- <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End --> --}}

    {{-- Web Header --}}
    @include('layouts.partials.web_header')
    {{-- End Web Header --}}
    @yield('web-content')
    {{-- Scroll to Top --}}
    <div class="side-widget to-right invert-color mix-blend-difference show">
      <div class="item align-v-bottom">
          <a href="#" class="link hover-up">
              <span class="widget float-icon">
                  <i class="fa-solid fa-arrow-up-long icon"></i>
              </span>
          </a>
      </div>
    </div>
    {{-- End Scroll to Top --}}


    {{-- Footer --}}
    @include('layouts.partials.web_footer')
    {{-- End Footer --}}


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}website/lib/wow/wow.min.js"></script>
    <script src="{{ asset('/') }}website/lib/easing/easing.min.js"></script>
    <script src="{{ asset('/') }}website/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('/') }}website/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}website/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/') }}website/js/main.js"></script>

    @stack('web-js')
</body>
</html>
