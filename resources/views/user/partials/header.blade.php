<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desa Lawallu</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    @keyframes zoom { 0%, 100% { transform: scale(1.05); } 50% { transform: scale(1.08); } }
    @keyframes fall { 
      0% { top: -10%; opacity: 0; transform: rotate(0deg); }
      20% { opacity: 1; }
      100% { top: 110%; transform: rotate(360deg); opacity: 0; }
    }
    @keyframes sway { 0% { transform: translateX(0); } 100% { transform: translateX(40px); } }
    
    .animate-zoom { animation: zoom 18s ease-in-out infinite; }
    .leaf {
      position: absolute;
      width: 20px;
      height: 20px;
      
      background-size: contain;
      opacity: 0.7;
      animation: fall 10s linear infinite, sway 2.5s ease-in-out infinite alternate;
    }
    .leaf:nth-child(1) { left: 10%; animation-delay: 0s; }
    .leaf:nth-child(2) { left: 30%; animation-delay: 2s; }
    .leaf:nth-child(3) { left: 50%; animation-delay: 4s; }
    .leaf:nth-child(4) { left: 70%; animation-delay: 6s; }
    .leaf:nth-child(5) { left: 90%; animation-delay: 8s; }
    
    .glow { text-shadow: 0 0 15px rgba(163, 230, 53, 0.5), 0 0 25px rgba(132, 204, 22, 0.3); }
    
    @media (max-width: 640px) {
      .leaf { width: 15px; height: 15px; }
    }
  </style>
</head>
<body class="overflow-x-hidden">

<!-- 🌿 HERO SECTION -->
<section class="relative min-h-[60vh] sm:min-h-[75vh] lg:min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-950 via-teal-900 to-lime-900 text-white overflow-hidden">

  <!-- Background -->
  <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1200')] bg-cover bg-center opacity-20 animate-zoom"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/85 via-emerald-900/75 to-lime-900/85"></div>

  <!-- Daun Jatuh (dikurangi) -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
  </div>

  <!-- Content -->
  <div class="relative text-center px-5 sm:px-8 lg:px-16 z-10 max-w-4xl py-8 sm:py-12">
    
    <h1 data-aos="fade-down" data-aos-delay="100" 
        class="text-3xl sm:text-5xl lg:text-6xl font-bold mb-2 sm:mb-3 text-lime-50 drop-shadow-2xl">
      Selamat Datang di
    </h1>

    <h2 data-aos="fade-down" data-aos-delay="200" 
        class="text-2xl sm:text-4xl lg:text-5xl font-light text-lime-200 mb-3 sm:mb-5 glow">
      Website Resmi Desa Lawallu
    </h2>

    <p data-aos="fade-up" data-aos-delay="300" 
       class="text-base sm:text-lg lg:text-xl text-lime-100/90 mb-2 sm:mb-3 leading-relaxed">
      Desa Lawallu <span class="font-bold text-lime-300">"MANTAP dan ASYIK"</span>
    </p>

    <p data-aos="fade-up" data-aos-delay="400" 
       class="text-xs sm:text-sm text-lime-100/80 mb-3 sm:mb-4 px-4">
      (Prima Pelayanannya, Transparan, Akuntabel, Profesional, dan Anti Kesyirikan)
    </p>

    <p data-aos="fade-up" data-aos-delay="500" 
       class="text-sm sm:text-base italic text-lime-200">
      Motto: <span class="text-lime-300 font-semibold">"Utamakan Sholat Dan Pelayanan Prima"</span>
    </p>

  </div>

  <!-- Gradasi Bawah -->
  <div class="absolute bottom-0 inset-x-0 h-24 bg-gradient-to-t from-emerald-950/90 to-transparent"></div>

</section>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-out-cubic',
    offset: 50
  });
</script>

</body>
</html>