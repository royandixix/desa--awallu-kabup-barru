<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Batupute - Media Informasi')</title>

    <!-- Fonts & Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Tailwind & Bootstrap -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/main.css" rel="stylesheet">

    <!-- Vite (Laravel Mix) -->
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Global Styles (Font Poppins + Inter + Ukuran Ramah Masyarakat) -->
    <style>
        html {
            font-size: 16px; /* font default ramah untuk masyarakat */
        }

        body,
        h1, h2, h3, h4, h5, h6,
        p, a, button, input, textarea, li, span, div {
            font-family: 'Poppins', 'Inter', sans-serif;
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
        }

        a {
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #10b981;
        }

        /* Animasi masuk smooth saat scroll */
        [data-animate] {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.9s ease-out;
        }

        [data-animate].visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-light text-dark">

    {{-- HEADER / NAVBAR --}}
    @includeIf('user.partials.header')

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
        @yield('sambutan')
        @yield('visimisi')
        @yield('foto_bersama_warga')
        @yield('administrasipenduduk')
        

    </main>

    {{-- FOOTER --}}
    @includeIf('user.partials.footer')

    {{-- SCROLL TOP & PRELOADER --}}
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <div id="preloader"></div>

    {{-- JAVASCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- Animasi Scroll -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const elements = document.querySelectorAll('[data-animate]');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.2
            });

            elements.forEach(el => observer.observe(el));
        });
    </script>

</body>

</html>
