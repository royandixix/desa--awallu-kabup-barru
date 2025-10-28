<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Desa Batupute - Media Informasi')</title>

  {{-- ✅ Fonts & Icons --}}
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&family=Figtree:wght@300;400;600;700;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  {{-- ✅ Tailwind, Bootstrap, Alpine --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer></script>

  {{-- ✅ Vendor CSS --}}
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  {{-- ✅ Custom CSS --}}
  <link href="/assets/css/main.css" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png" />

  {{-- ✅ Laravel Vite --}}
  @viteReactRefresh
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- ✅ Global Styles --}}
  <style>
    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      max-width: 100%;
      overflow-x: hidden;
      font-family: 'Poppins', 'Inter', 'Figtree', sans-serif;
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

    /* 🌿 Tombol Scroll Ke Atas */
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

<body class="bg-light text-dark antialiased">

  {{-- 🔷 Header & Navbar --}}
  @includeIf('user.partials.navbar')
  @includeIf('user.partials.header')

  {{-- 🔶 Main Content --}}
  <main class="overflow-x-hidden">
    @yield('content')
    @yield('sambutan')
    @yield('visimisi')
    @yield('foto_bersama_warga')
    @yield('administrasipenduduk')
    @yield('menelusuri_keindahan')
    @yield('layanan_kami')
    @yield('struktur_organisasi')
    @yield('kontak_saran')
  </main>

  {{-- 🔷 Footer --}}
  @includeIf('user.partials.footer')

  {{-- 🌿 Tombol Scroll ke Atas --}}
  <button id="scrollTopBtn" title="Kembali ke atas">
    <i class="bi bi-arrow-up-short"></i>
  </button>

  <div id="preloader"></div>

  {{-- ✅ Vendor JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/js/main.js"></script>

  {{-- ✅ Heroicons --}}
  <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>

  {{-- ✅ Animasi Scroll & Tombol Ke Atas --}}
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const elements = document.querySelectorAll('[data-animate]');
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) entry.target.classList.add('visible');
        });
      }, { threshold: 0.2 });
      elements.forEach(el => observer.observe(el));
    });

    // Tombol Scroll Ke Atas
    const scrollTopBtn = document.getElementById("scrollTopBtn");
    window.addEventListener("scroll", () => {
      scrollTopBtn.classList.toggle("show", window.scrollY > 200);
    });
    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  </script>

</body>
</html>
