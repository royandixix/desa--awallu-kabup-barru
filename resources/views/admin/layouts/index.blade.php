<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Mantis Admin</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('Mantis-Bootstrap/dist/assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/fonts/material.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('Mantis-Bootstrap/dist/assets/css/style-preset.css') }}">
    

    <!-- Page specific CSS -->
    @stack('styles')
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">

    <!-- Loader -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Header -->
    @include('admin.partials.header')

    <!-- Main Content -->

    @yield('content')
  





    <!-- Footer -->
    @include('admin.partials.footer')

    <!-- JS -->
    <script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Mantis-Bootstrap/dist/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('Mantis-Bootstrap/dist/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('Mantis-Bootstrap/dist/assets/js/plugins/feather.min.js') }}"></script>

    <script>
        // Layout Customizer Toggle
        layout_change('light');
        layout_sidebar_change('light');
        change_box_container('false');
        layout_caption_change('true');
        layout_rtl_change('false');
        preset_change('preset-1');
    </script>

    <!-- Page Specific JS -->
    @stack('scripts')

</body>

</html>
