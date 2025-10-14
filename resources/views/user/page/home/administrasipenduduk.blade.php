<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrasi Penduduk - Desa Batupute</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

  <!-- Heroicons CDN -->
  <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
     
      color: #111827;
      overflow-x: hidden;
    }

    h1 {
      font-family: 'Poppins', sans-serif;
    }

    /* Animasi Fade + Slide */
    .fade-slide-up {
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.8s ease-out;
    }
    .fade-slide-up.show {
      opacity: 1;
      transform: translateY(0);
    }

    .stat-card {
      transition: all 0.3s ease;
    }
    .stat-card:hover {
      transform: translateY(-6px) scale(1.05);
      
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .icon-hover:hover {
      transform: scale(1.3);
      transition: transform 0.3s;
    }
  </style>
</head>
<body class="pt-20 bg-white">

  <section class="w-full py-20">
    <div class="max-w-6xl mx-auto px-6 lg:px-10 flex flex-col items-center text-center">

      <!-- Judul -->
      <h1 class="fade-slide-up text-5xl sm:text-6xl tracking-wide" style="transition-delay: 0s;">Administrasi Penduduk</h1>
      <p class="fade-slide-up text-gray-700 mb-12 max-w-2xl text-lg" style="transition-delay: 0.2s;">
        Berikut ini adalah data administrasi penduduk Desa Batupute yang terdata
      </p>

      <!-- Konten -->
      <div class="fade-slide-up flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-20" style="transition-delay: 0.4s;">

        <!-- Ilustrasi -->
        <div class="w-full lg:w-1/2 flex justify-center items-center fade-slide-up">
          <img 
            src="{{ asset('img/user/vektor/undraw_mobile-payments_uate.png') }}" 
            alt="Ilustrasi Statistik Penduduk" 
            class="w-full max-w-md rounded-2xl shadow-xl transform transition duration-700 hover:scale-105"
            style="transition-delay: 0.2s;"
          >
        </div>

        <!-- Statistik -->
        <div class="w-full lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-8 text-left">

          <!-- Jumlah Penduduk -->
          <div class="stat-card flex items-center space-x-4 p-6 bg-white rounded-2xl shadow hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <div>
              <p class="text-3xl sm:text-4xl font-extrabold text-gray-900">3394</p>
              <p class="text-gray-700 font-medium">Jumlah Penduduk</p>
            </div>
          </div>

          <!-- Laki-laki -->
          <div class="stat-card flex items-center space-x-4 p-6 bg-white rounded-2xl shadow hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            <div>
              <p class="text-3xl sm:text-4xl font-extrabold text-gray-900">1676</p>
              <p class="text-gray-700 font-medium">Laki-laki</p>
            </div>
          </div>

          <!-- Perempuan -->
          <div class="stat-card flex items-center space-x-4 p-6 bg-white rounded-2xl shadow hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-pink-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            <div>
              <p class="text-3xl sm:text-4xl font-extrabold text-gray-900">1718</p>
              <p class="text-gray-700 font-medium">Perempuan</p>
            </div>
          </div>

          <!-- Kepala Keluarga -->
          <div class="stat-card flex items-center space-x-4 p-6 bg-white rounded-2xl shadow hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 0v12" />
            </svg>
            <div>
              <p class="text-3xl sm:text-4xl font-extrabold text-gray-900">995</p>
              <p class="text-gray-700 font-medium">Kepala Keluarga</p>
            </div>
          </div>

          <!-- Penduduk Sementara -->
          <div class="stat-card flex items-center space-x-4 p-6 bg-white rounded-2xl shadow hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-purple-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
              <p class="text-3xl sm:text-4xl font-extrabold text-gray-900">56</p>
              <p class="text-gray-700 font-medium">Penduduk Sementara</p>
            </div>
          </div>

          <!-- Mutasi Penduduk -->
          <div class="stat-card flex items-center space-x-4 p-6 bg-white rounded-2xl shadow hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500 icon-hover" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v6h6M20 20v-6h-6M4 14l16-4" />
            </svg>
            <div>
              <p class="text-3xl sm:text-4xl font-extrabold text-gray-900">67</p>
              <p class="text-gray-700 font-medium">Mutasi Penduduk</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Link -->
      <div class="mt-12">
        <a href="#" class="text-blue-700 font-semibold hover:underline transition">Lihat Selengkapnya →</a>
      </div>
    </div>
  </section>

  <!-- Animasi Scroll Fade + Slide -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) entry.target.classList.add('show');
        });
      }, { threshold: 0.1 });

      document.querySelectorAll('.fade-slide-up').forEach(el => observer.observe(el));
    });
  </script>
</body>
</html>
