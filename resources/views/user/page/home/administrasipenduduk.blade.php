<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrasi Penduduk - Desa Lawallu</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      scroll-behavior: smooth;
      background-color: white; /* latar belakang putih polos */
    }

    /* Card styling tanpa transparansi */
    .stat-card {
      background: white;
      border: 1px solid #e5e7eb; /* abu muda */
      box-shadow: 0 10px 20px -8px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
    }
    .stat-card:hover {
      transform: translateY(-8px) scale(1.03);
      box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.1);
    }

    /* Floating effect */
    .floating {
      animation: floating 4s ease-in-out infinite;
    }
    @keyframes floating {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    /* Icon animation */
    .icon-hover {
      transition: transform 0.4s ease, color 0.4s ease;
    }
    .stat-card:hover .icon-hover {
      transform: rotate(12deg) scale(1.2);
    }

    .counter {
      font-variant-numeric: tabular-nums;
      display: inline-block;
      min-width: 70px;
      background: linear-gradient(135deg, #0ea5e9, #22c55e);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Gradient text */
    .gradient-title {
      background: linear-gradient(90deg, #2563eb, #16a34a);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>

<body class="pt-20">

  <section class="w-full py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 lg:px-10 flex flex-col items-center text-center">

      <!-- Judul -->
      <h1 data-aos="fade-up" class="text-5xl sm:text-6xl tracking-tight gradient-title mb-4">
        Administrasi Penduduk
      </h1>

      <p data-aos="fade-up" data-aos-delay="200" class="text-gray-700 mb-14 max-w-2xl text-lg">
        Data administrasi penduduk Desa Lawallu yang selalu diperbarui untuk transparansi dan kemajuan desa.
      </p>

      <!-- Konten -->
      <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-20">

        <!-- Ilustrasi -->
        <div data-aos="zoom-in" class="w-full lg:w-1/2 flex justify-center items-center">
          <img 
            src="{{ asset('img/user/vektor/undraw_mobile-payments_uate.png') }}" 
            alt="Ilustrasi Statistik Penduduk" 
            class="w-full max-w-md rounded-3xl shadow-2xl floating"
          >
        </div>

        <!-- Statistik -->
        <div class="w-full lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-8 text-left">

          <!-- Card 1 -->
          <div data-aos="fade-up" class="stat-card flex items-center space-x-4 p-6 rounded-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <div>
              <p class="text-4xl font-extrabold counter" data-target="3394">0</p>
              <p class="text-gray-700 font-medium">Jumlah Penduduk</p>
            </div>
          </div>

          <!-- Card 2 -->
          <div data-aos="fade-up" data-aos-delay="100" class="stat-card flex items-center space-x-4 p-6 rounded-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            <div>
              <p class="text-4xl font-extrabold counter" data-target="1676">0</p>
              <p class="text-gray-700 font-medium">Laki-laki</p>
            </div>
          </div>

          <!-- Card 3 -->
          <div data-aos="fade-up" data-aos-delay="200" class="stat-card flex items-center space-x-4 p-6 rounded-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-pink-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            <div>
              <p class="text-4xl font-extrabold counter" data-target="1718">0</p>
              <p class="text-gray-700 font-medium">Perempuan</p>
            </div>
          </div>

          <!-- Card 4 -->
          <div data-aos="fade-up" data-aos-delay="300" class="stat-card flex items-center space-x-4 p-6 rounded-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 0v12" />
            </svg>
            <div>
              <p class="text-4xl font-extrabold counter" data-target="995">0</p>
              <p class="text-gray-700 font-medium">Kepala Keluarga</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Link -->
      <div data-aos="fade-up" data-aos-delay="600" class="mt-14">
        <a href="#" class="text-blue-700 font-semibold hover:underline hover:text-blue-800 transition">Lihat Selengkapnya →</a>
      </div>
    </div>
  </section>

  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 900, once: true, easing: 'ease-out-cubic' });

    // Counter animation
    function animateCounter(el) {
      const target = +el.getAttribute('data-target');
      const duration = 1800;
      const startTime = performance.now();

      function easeOutQuad(t) { return t * (2 - t); }

      function update(currentTime) {
        const progress = Math.min((currentTime - startTime) / duration, 1);
        const eased = easeOutQuad(progress);
        el.textContent = Math.floor(eased * target).toLocaleString('id-ID');
        if (progress < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
    }

    const counters = document.querySelectorAll('.counter');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
  </script>
</body>
</html>
