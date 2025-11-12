<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mantis Bootstrap Admin')</title>

    <!-- [Favicon] -->
    <link rel="icon" href="{{ asset('Mantis-Bootstrap/dist/assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- [Google Fonts] -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
          id="main-font-link">

    <!-- [Icons] -->
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/material.css') }}">

    <!-- [CSS Files] -->
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/css/style-preset.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/css/landing.css') }}">
</head>

<body class="landing-page">

<!-- [ Loader ] -->
<div class="loader-bg-">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

<!-- [ Header / Navbar ] -->
<header id="home">
    <nav class="navbar navbar-expand-md navbar-dark top-nav-collapse default">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('Mantis-Bootstrap/dist/assets/images/logo-white.svg') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item pe-1">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" target="_blank"
                           href="https://codedthemes.com/item/mantis-bootstrap-admin-dashboard/">
                            Purchase Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- [ Hero Section / Header Content ] -->
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-9 col-xl-6">
                <h1 class="mt-sm-3 text-white mb-4 f-w-600 wow fadeInUp" data-wow-delay="0.2s">
                    Carefully Crafted for your
                    <span class="text-primary">Laravel Admin Project</span>
                </h1>
                <h5 class="mb-4 text-white opacity-75 wow fadeInUp" data-wow-delay="0.4s">
                    Mantis Bootstrap is a clean, fast, and customizable admin template integrated with Laravel.
                </h5>
                <div class="my-5 wow fadeInUp" data-wow-delay="0.6s">
                    <a href="#" class="btn btn-outline-primary me-2">Explore Components</a>
                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">
                        <i class="ti ti-eye me-1"></i> Live Preview
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- [ MAIN CONTENT - Blade Section ] -->
<main class="py-4">
    @yield('content')
</main>


<!-- [ Scripts ] -->
<script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('Mantis-Bootstrap/dist/assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('Mantis-Bootstrap/dist/assets/js/pcoded.js') }}"></script>
<script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/feather.min.js') }}"></script>

<script>
    // Navbar Scroll Behavior
    let ost = 0;
    document.addEventListener('scroll', function () {
        let cOst = document.documentElement.scrollTop;
        const navbar = document.querySelector(".navbar");
        const customizer = document.querySelector(".pc-landing-custmizer");

        if (cOst === 0) {
            navbar.classList.add("top-nav-collapse");
        } else if (cOst > ost) {
            navbar.classList.add("top-nav-collapse");
            navbar.classList.remove("default");
        } else {
            navbar.classList.add("default");
            navbar.classList.remove("top-nav-collapse");
        }

        if (customizer) {
            if (cOst > 500) customizer.classList.add("active");
            else customizer.classList.remove("active");
        }

        ost = cOst;
    });
</script>

</body>
</html>
