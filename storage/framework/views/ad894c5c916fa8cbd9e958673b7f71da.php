<!-- HERO / HEADER PENGADUAN -->
<section class="relative min-h-[60vh] flex flex-col justify-center items-center text-white overflow-hidden font-sans bg-gradient-to-r from-teal-900 via-emerald-800 to-emerald-700">

  <!-- Background -->
  <div class="absolute inset-0 bg-[url('/img/bg-desa.jpg')] bg-cover bg-center opacity-25"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-teal-900/60 via-emerald-800/50 to-emerald-700/70 backdrop-blur-sm"></div>

  <!-- Konten Utama -->
  <div class="relative z-10 text-center px-6 sm:px-10 max-w-3xl" data-aos="fade-up" data-aos-duration="1200">
    <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-4 bg-clip-text text-transparent bg-gradient-to-r">
        Form Pengaduan Desa
    </h1>
    <p class="text-lime-100/90 text-base md:text-lg leading-relaxed mb-6">
        Sampaikan aduan, saran, atau laporan Anda demi kemajuan Desa Lawallu.
    </p>

    <!-- Tombol CTA -->
    <a href="#form-pengaduan"
       class="inline-block mt-2 px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300"
       data-aos="zoom-in" data-aos-delay="200">
      Isi Formulir
    </a>
  </div>

  <!-- Breadcrumb -->
  <div class="relative mt-6 z-10 w-full" data-aos="fade-in" data-aos-delay="400">
    <div class="container mx-auto px-4 text-sm flex flex-wrap gap-2 items-center text-lime-100/80">
      <a href="<?php echo e(url('/')); ?>" class="hover:text-lime-300 transition font-medium">Home</a>
      <span class="text-lime-300">/</span>
      <span class="font-light text-lime-200">Pengaduan</span>
    </div>
  </div>

</section>


<style>
.glow-text {
  text-shadow: 0 0 10px rgba(163, 230, 53, 0.6),
               0 0 20px rgba(132, 204, 22, 0.4);
}
</style>


<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true,
    easing: 'ease-out-cubic',
    duration: 1000
  });

  // Smooth Scroll ketika klik tombol CTA
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
</script>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/partials/header_pengaduan.blade.php ENDPATH**/ ?>