<!-- 🌿 HERO SECTION - Desa Lawallu (Tanpa Card) -->
<section class="relative min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-emerald-950 via-teal-900 to-lime-900 text-white overflow-hidden font-sans">

  <!-- 🌄 Background dekoratif -->
  <div class="absolute inset-0 bg-[url('/img/bg-desa.jpg')] bg-cover bg-center opacity-25 scale-105 blur-[1px] animate-zoom-slow"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/85 via-emerald-900/70 to-lime-900/80 backdrop-blur-sm"></div>

  <!-- 🍃 Animasi Daun Jatuh -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>a
    <div class="leaf"></div>
    <div class="leaf"></div>
  </div>

  <!-- 🌟 Teks Utama (tanpa card) -->
  <div class="relative text-center px-6 sm:px-10 lg:px-20 z-10">
    <h1 data-aos="fade-down" data-aos-delay="150"
      class="text-4xl sm:text-5xl lg:text-6xl font-semibold leading-snug mb-3 text-lime-50 drop-shadow-xl">
      Selamat Datang di
    </h1>

    <h2 data-aos="fade-down" data-aos-delay="250"
      class="text-3xl sm:text-4xl lg:text-5xl font-light text-lime-200 mb-5 tracking-wide glow-text">
      Website Resmi Desa Lawallu
    </h2>

    <p data-aos="fade-up" data-aos-delay="350"
      class="max-w-2xl mx-auto text-base sm:text-lg lg:text-xl text-lime-100/90 mb-4 leading-relaxed">
      Desa Lawallu <span class="font-semibold text-lime-300">"MANTAP dan ASYIK"</span>
    </p>

    <p data-aos="fade-up" data-aos-delay="450"
      class="text-sm sm:text-base text-lime-100/80 mb-6">
      (Prima Pelayanannya, Transparan, Akuntabel, Profesional, dan Anti Kesyirikan)
    </p>

    <p data-aos="fade-up" data-aos-delay="550"
      class="text-sm sm:text-base italic text-lime-200">
      Motto: <span class="text-lime-300">"Utamakan Sholat Dan Pelayanan Prima"</span>
    </p>
  </div>

  <!-- 🌫️ Gradasi bawah -->
  <div class="absolute bottom-0 left-0 right-0 h-28 bg-gradient-to-t from-emerald-950/90 to-transparent"></div>
</section>

<!-- ✨ STYLE ANIMASI -->
<style>
  @keyframes zoom-slow {
    0%, 100% { transform: scale(1.05); }
    50% { transform: scale(1.1); }
  }
  .animate-zoom-slow {
    animation: zoom-slow 20s ease-in-out infinite;
  }

  @keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in {
    animation: fade-in 2s ease-out forwards;
  }

  .leaf {
    position: absolute;
    width: 25px;
    height: 25px;
    background-image: url('https://cdn-icons-png.flaticon.com/512/765/765573.png');
    background-size: contain;
    background-repeat: no-repeat;
    opacity: 0.8;
    animation: fall 12s linear infinite, sway 3s ease-in-out infinite alternate;
  }

  .leaf:nth-child(1) { left: 10%; animation-delay: 0s; }
  .leaf:nth-child(2) { left: 25%; animation-delay: 2s; }
  .leaf:nth-child(3) { left: 45%; animation-delay: 4s; }
  .leaf:nth-child(4) { left: 60%; animation-delay: 6s; }
  .leaf:nth-child(5) { left: 75%; animation-delay: 8s; }
  .leaf:nth-child(6) { left: 90%; animation-delay: 10s; }

  @keyframes fall {
    0% { top: -10%; opacity: 0; transform: rotate(0deg); }
    20% { opacity: 1; }
    100% { top: 110%; transform: rotate(360deg); opacity: 0; }
  }

  @keyframes sway {
    0% { transform: translateX(0px) rotate(0deg); }
    100% { transform: translateX(50px) rotate(15deg); }
  }

  .glow-text {
    text-shadow: 0 0 10px rgba(163, 230, 53, 0.6), 0 0 20px rgba(132, 204, 22, 0.4);
  }
</style>

<!-- 🪄 AOS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1200,
    once: true,
    easing: 'ease-out-cubic'
  });
</script>
