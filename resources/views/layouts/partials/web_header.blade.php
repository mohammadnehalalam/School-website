  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="{{ asset($content->logo)}}" alt=""
                style="width: 72px;">{{ $content->name }}</h2>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-4 py-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
            <a href="{{route('roadmap')}}" class="nav-item nav-link">Roadmap</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu shadow-sm m-0">
                <a href="{{ route ('feature')}}" class="dropdown-item">Feature</a>
                    <a href="faq" class="dropdown-item">FAQs</a>
                    {{-- <a href="404" class="dropdown-item">404 Page</a> --}}
                </div>
            </div>
            <a href="contact" class="nav-item nav-link">Contact</a>
        </div>
        <div class="h-100 d-lg-inline-flex align-items-center d-none">
            <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $content->facebook }}" target="_blank"><i
                    class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $content->twitter }}"target="_blank"><i
                    class="fab fa-twitter"></i></a>
            <a class="btn btn-square rounded-circle bg-light text-primary me-0" href="{{ $content->linkedin }}"target="_blank"><i
                    class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
