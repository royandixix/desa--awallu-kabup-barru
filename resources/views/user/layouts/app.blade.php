<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Lawallu - Media Informasi')</title>

    {{-- 🪶 Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- 🎨 Tailwind & Bootstrap --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- ⚙️ Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer></script>

    {{-- ✨ AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- 🧩 Vendor CSS --}}
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    {{-- 🎨 Custom CSS --}}
    <link href="/assets/css/main.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png" />

    {{-- ⚡ Laravel Vite --}}
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- 💅 Global Styles --}}
    <style>
        /* ... CSS Anda yang ada di sini ... */
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif !important;
            scroll-behavior: smooth;
        }

        [data-animate] {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.9s ease-out;
        }

        [data-animate].visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Tombol Scroll Ke Atas */
        #scrollTopBtn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #16a34a, #065f46);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            opacity: 0;
            visibility: hidden;
            transform: translateY(30px);
            transition: all 0.4s ease-in-out;
            z-index: 9999;
        }

        #scrollTopBtn:hover {
            transform: translateY(0) scale(1.1);
            background: linear-gradient(135deg, #15803d, #064e3b);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
        }

        #scrollTopBtn.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-light text-dark antialiased" x-data="{ openModal: false, modalImage: '' }">

    {{-- Navbar --}}
    @includeIf('user.partials.navbar')

    {{-- Header Dinamis --}}
    @if (View::hasSection('header_pengaduan'))
        @yield('header_pengaduan')
    @elseif (View::hasSection('header_profil_desa'))
        @yield('header_profil_desa')
    @elseif (View::hasSection('header_galeri'))
        @yield('header_galeri')
    @elseif (View::hasSection('header_detail_gambar'))
        @yield('header_detail_gambar')
    @elseif (View::hasSection('header_transparansi'))
        @yield('header_transparansi')
    @elseif (View::hasSection('header_berita'))
        @yield('header_berita')
    @else
        @includeIf('user.partials.header')
    @endif

    {{-- Main Content --}}
    <main class="overflow-x-hidden">
        @yield('content')
    </main>

    {{-- Footer --}}
    @includeIf('user.partials.footer')

    {{-- Tombol Scroll Ke Atas --}}
    <button id="scrollTopBtn" title="Kembali ke atas">
        <i class="bi bi-arrow-up-short"></i>
    </button>

    {{-- Preloader --}}
    <div id="preloader"></div>

    {{-- Vendor JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>

    {{-- Heroicons --}}
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>
    
    {{-- 🎯 SCRIPT PERBAIKAN NAVBAR (PENTING) --}}
    <script src="{{ asset('js/navbar.js') }}"></script> 

    {{-- Animasi Scroll + ScrollTop Button --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Animasi scroll muncul
            const elements = document.querySelectorAll('[data-animate]');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('visible');
                });
            }, { threshold: 0.2 });
            elements.forEach(el => observer.observe(el));

            // Tombol scroll ke atas
            const scrollTopBtn = document.getElementById("scrollTopBtn");
            window.addEventListener("scroll", () => {
                scrollTopBtn.classList.toggle("show", window.scrollY > 200);
            });
            scrollTopBtn.addEventListener("click", () => {
                window.scrollTo({ top: 0, behavior: "smooth" });
            });

            // Inisialisasi AOS
            AOS.init({ duration: 1000, once: true });
        });
    </script>

</body>
</html>