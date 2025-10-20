<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Layanan Kami - Desa Batupute</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    /* === ANIMASI MASUK (fade, slide & zoom smooth) === */
    @keyframes smoothFadeUp {
      0% {
        opacity: 0;
        transform: translateY(60px) scale(0.9);
        filter: blur(4px);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
      }
    }

    .reveal {
      opacity: 0;
      transform: translateY(60px) scale(0.9);
      filter: blur(4px);
      transition: all 1s cubic-bezier(0.25, 0.1, 0.25, 1);
    }

    .reveal.active {
      animation: smoothFadeUp 1s ease forwards;
    }

    /* Delay animasi agar muncul bertahap */
    .reveal:nth-child(1) { animation-delay: 0.1s; }
    .reveal:nth-child(2) { animation-delay: 0.2s; }
    .reveal:nth-child(3) { animation-delay: 0.3s; }
    .reveal:nth-child(4) { animation-delay: 0.4s; }
    .reveal:nth-child(5) { animation-delay: 0.5s; }
    .reveal:nth-child(6) { animation-delay: 0.6s; }

    /* === CARD STYLING === */
    .card {
      transition: all 0.5s ease;
      position: relative;
      overflow: hidden;
      cursor: pointer;
      will-change: transform, box-shadow;
    }

    .card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border-color: #16a34a;
    }

    /* === ICON ANIMATION === */
    .card-icon {
      transition: transform 0.4s ease, color 0.3s ease;
      color: #111111; /* Hitam */
    }

    .card:hover .card-icon {
      transform: scale(1.15) rotate(8deg);
      color: #16a34a; /* Hijau saat hover */
    }

    /* === TEXT HOVER === */
    .card h3, .card p, .card a {
      transition: color 0.3s ease;
    }

    .card:hover h3 {
      color: #15803d;
    }

    .card:active {
      transform: scale(0.98);
    }

    /* Global smooth scroll */
    html {
      scroll-behavior: smooth;
    }

    /* Scroll reveal trigger area */
    body {
      background-color: #f9fafb;
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800 selection:bg-green-200 selection:text-green-900">

  <main class="max-w-7xl mx-auto px-6 py-20">

    <!-- Heading -->
    <div class="text-center mb-16 reveal">
      <h2 class="text-4xl mb-3 text-green-700 tracking-tight ">Layanan Kami</h2>
      <p class="text-lg text-gray-600">
        Layanan utama yang tersedia di <span class="text-green-600 font-medium">Desa Batupute</span>
      </p>

      <!-- Garis dekoratif -->
      <div class="mt-4 mx-auto w-24 h-1 bg-green-600 rounded-full"></div>
    </div>

    <!-- GRID LAYANAN -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

      <!-- Card 1 -->
      <div class="reveal card bg-white rounded-2xl shadow-md p-8 border border-gray-200 text-left">
        <div class="flex items-center mb-5">
          <i data-lucide="building" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Bagian Pemerintahan</h3>
        </div>
        <p class="text-gray-700 leading-relaxed mb-5">
          KTP, KK, KIA, akta kelahiran, akta kematian, surat pindah dan pertanahan.
        </p>
        <a href="#" class="font-medium text-green-700 hover:underline">Read more →</a>
      </div>

      <!-- Card 2 -->
      <div class="reveal card bg-white rounded-2xl shadow-md p-8 border border-gray-200 text-left">
        <div class="flex items-center mb-5">
          <i data-lucide="users" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Bagian Pelayanan</h3>
        </div>
        <p class="text-gray-700 leading-relaxed mb-5">
          SKTM, <span class="text-green-600 font-medium">Pengantar Nikah</span>, Izin Keramaian, Pengantar BBM, Sket Lain-lain.
        </p>
        <a href="#" class="font-medium text-green-700 hover:underline">Read more →</a>
      </div>

      <!-- Card 3 -->
      <div class="reveal card bg-white rounded-2xl shadow-md p-8 border border-gray-200 text-left">
        <div class="flex items-center mb-5">
          <i data-lucide="heart-handshake" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Bagian Kesra</h3>
        </div>
        <p class="text-gray-700 leading-relaxed mb-5">
          Pengelolaan kegiatan sosial, keagamaan, dan kemasyarakatan di desa.
        </p>
        <a href="#" class="font-medium text-green-700 hover:underline">Read more →</a>
      </div>

      <!-- Card 4 -->
      <div class="reveal card bg-white rounded-2xl shadow-md p-8 border border-gray-200 text-left">
        <div class="flex items-center mb-5">
          <i data-lucide="hand-heart" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Informasi & <span class="text-green-700">Bantuan Sosial</span></h3>
        </div>
        <p class="text-gray-700 leading-relaxed mb-5">
          Informasi dan pengajuan bantuan seperti <span class="text-green-600 font-medium">BLT</span> dan <span class="text-green-600 font-medium">PKH</span>.
        </p>
        <a href="#" class="font-medium text-green-700 hover:underline">Read more →</a>
      </div>

      <!-- Card 5 -->
      <div class="reveal card bg-white rounded-2xl shadow-md p-8 border border-gray-200 text-left">
        <div class="flex items-center mb-5">
          <i data-lucide="stethoscope" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Pelayanan Kesehatan & Posyandu</h3>
        </div>
        <p class="text-gray-700 leading-relaxed mb-5">
          Layanan pemeriksaan kesehatan gratis dan jadwal kegiatan posyandu rutin.
        </p>
        <a href="#" class="font-medium text-green-700 hover:underline">Read more →</a>
      </div>

      <!-- Card 6 -->
      <div class="reveal card bg-white rounded-2xl shadow-md p-8 border border-gray-200 text-left">
        <div class="flex items-center mb-5">
          <i data-lucide="megaphone" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Layanan Aspirasi & <span class="text-green-700">Pengaduan</span></h3>
        </div>
        <p class="text-gray-700 leading-relaxed mb-5">
          Sampaikan aspirasi, saran, atau keluhan Anda secara mudah kepada pemerintah desa.
        </p>
        <a href="#" class="font-medium text-green-700 hover:underline">Read more →</a>
      </div>

    </div>
  </main>

  <script>
    // Efek reveal saat scroll
    const reveals = document.querySelectorAll('.reveal');

    function revealOnScroll() {
      const windowHeight = window.innerHeight;
      reveals.forEach(el => {
        const top = el.getBoundingClientRect().top;
        if (top < windowHeight - 100) {
          el.classList.add('active');
        }
      });
    }

    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', () => {
      lucide.createIcons(); // render icons
      revealOnScroll();
    });
  </script>

</body>
</html>
