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
    /* ===== Animasi Scroll Masuk ===== */
    @keyframes smoothFadeUp {
      0% {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
        filter: blur(6px);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
      }
    }

    .reveal {
      opacity: 0;
      transform: translateY(50px);
      transition: all 1s ease;
    }

    .reveal.active {
      animation: smoothFadeUp 1s cubic-bezier(0.25, 1, 0.5, 1) forwards;
    }

    .reveal:nth-child(1) { animation-delay: 0.1s; }
    .reveal:nth-child(2) { animation-delay: 0.2s; }
    .reveal:nth-child(3) { animation-delay: 0.3s; }
    .reveal:nth-child(4) { animation-delay: 0.4s; }
    .reveal:nth-child(5) { animation-delay: 0.5s; }
    .reveal:nth-child(6) { animation-delay: 0.6s; }

    /* ===== Styling Section ===== */
    /* ===== Styling Section ===== */
    body {
      background-color: #ffffff;
      font-family: 'Inter', sans-serif;
      color: #1f2937;
      scroll-behavior: smooth;
    }

    /* ===== Card Styling Premium ===== */
    .card {
      position: relative;
      overflow: hidden;
      border-radius: 0.75rem;
     
      backdrop-filter: blur(12px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
      padding: 2rem;
      transition: all 0.5s ease;
      border: 1px solid rgba(255, 255, 255, 0.4);
      cursor: pointer;
    }

    .card::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(145deg, rgba(34,197,94,0.08), rgba(255,255,255,0));
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .card:hover::before {
      opacity: 1;
    }

    .card:hover {
      transform: translateY(-6px) scale(1.015);
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
    }

    /* ===== Icon ===== */
    .card-icon {
      color: #111;
      transition: transform 0.4s ease, color 0.4s ease;
    }

    .card:hover .card-icon {
      color: #16a34a;
      transform: scale(1.15) rotate(6deg);
    }

    /* ===== Text ===== */
    .card h3 {
      color: #1f2937;
      transition: color 0.3s ease;
    }

    .card:hover h3 {
      color: #15803d;
    }

    .card p {
      color: #4b5563;
      line-height: 1.7;
    }

    /* ===== Link ===== */
    .card a {
      color: #16a34a;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .card a:hover {
      color: #15803d;
      text-decoration: underline;
    }

    /* ===== Subtle Active Effect ===== */
    .card:active {
      transform: scale(0.98);
    }
  </style>
</head>

<body class="selection:bg-green-200 selection:text-green-900">

  <main class="max-w-7xl mx-auto px-6 py-24">

    <!-- Heading -->
    <div class="text-center mb-20 reveal">
      <h2 class="text-4xl md:text-5xl  text-gray-800 mb-4 tracking-tight">
        Layanan Kami
      </h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Layanan utama yang tersedia di <span class="text-green-600 font-medium">Desa Batupute</span>,
        dirancang untuk mempermudah masyarakat dalam mengurus administrasi dan layanan publik.
      </p>
      <div class="mt-5 mx-auto w-28 h-1 bg-green-600 rounded-full"></div>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

      <div class="reveal card">
        <div class="flex items-center mb-5">
          <i data-lucide="building" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Bagian Pemerintahan</h3>
        </div>
        <p>KTP, KK, KIA, akta kelahiran, akta kematian, surat pindah dan pertanahan.</p>
        <a href="#" class="block mt-5">Read more →</a>
      </div>

      <div class="reveal card">
        <div class="flex items-center mb-5">
          <i data-lucide="users" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Bagian Pelayanan</h3>
        </div>
        <p>SKTM, <span class="text-green-600 font-medium">Pengantar Nikah</span>, Izin Keramaian, Pengantar BBM, dan Sket Lain-lain.</p>
        <a href="#" class="block mt-5">Read more →</a>
      </div>

      <div class="reveal card">
        <div class="flex items-center mb-5">
          <i data-lucide="heart-handshake" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Bagian Kesra</h3>
        </div>
        <p>Pengelolaan kegiatan sosial, keagamaan, dan kemasyarakatan di desa.</p>
        <a href="#" class="block mt-5">Read more →</a>
      </div>

      <div class="reveal card">
        <div class="flex items-center mb-5">
          <i data-lucide="hand-heart" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Informasi & Bantuan Sosial</h3>
        </div>
        <p>Informasi dan pengajuan bantuan seperti <span class="text-green-600 font-medium">BLT</span> dan <span class="text-green-600 font-medium">PKH</span>.</p>
        <a href="#" class="block mt-5">Read more →</a>
      </div>

      <div class="reveal card">
        <div class="flex items-center mb-5">
          <i data-lucide="stethoscope" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Pelayanan Kesehatan & Posyandu</h3>
        </div>
        <p>Layanan pemeriksaan kesehatan gratis dan jadwal kegiatan posyandu rutin.</p>
        <a href="#" class="block mt-5">Read more →</a>
      </div>

      <div class="reveal card">
        <div class="flex items-center mb-5">
          <i data-lucide="megaphone" class="card-icon w-10 h-10 mr-3"></i>
          <h3 class="text-2xl font-semibold">Layanan Aspirasi & Pengaduan</h3>
        </div>
        <p>Sampaikan aspirasi, saran, atau keluhan Anda secara mudah kepada pemerintah desa.</p>
        <a href="#" class="block mt-5">Read more →</a>
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
        if (top < windowHeight - 100) el.classList.add('active');
      });
    }
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', () => {
      lucide.createIcons();
      revealOnScroll();
    });
  </script>
</body>
</html>
