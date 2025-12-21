<!-- Hero Section Detail Gambar -->
<section class="relative min-h-[60vh] flex flex-col justify-center items-center text-white overflow-hidden font-sans bg-gradient-to-r from-teal-900 via-emerald-800 to-emerald-700">

  <!-- Background -->
  <div class="absolute inset-0 bg-[url('/img/bg-desa.jpg')] bg-cover bg-center opacity-25"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-teal-900/60 via-emerald-800/50 to-emerald-700/70 backdrop-blur-sm"></div>

  <!-- Konten Utama -->
  <div class="relative z-10 text-center px-6 sm:px-10 max-w-3xl" data-aos="fade-up" data-aos-duration="1200">
    <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-4 bg-clip-text text-transparent bg-gradient-to-r from-lime-300 via-lime-400 to-lime-500">
        Detail Gambar
    </h1>
    <p class="text-lime-100/90 text-base md:text-lg leading-relaxed mb-6">
        Lihat detail foto dan dokumentasi kegiatan yang ada di Desa Lawallu.
    </p>

    <!-- Tombol CTA -->
    <a href="<?php echo e(route('user.galeri')); ?>"
       class="inline-block mt-2 px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300"
       data-aos="zoom-in" data-aos-delay="200">
      ← Kembali ke Galeri
    </a>
  </div>

  <!-- Breadcrumb -->
  <div class="relative mt-6 z-10 w-full" data-aos="fade-in" data-aos-delay="400">
    <div class="container mx-auto px-4 text-sm flex flex-wrap gap-2 items-center text-lime-100/80">
      <a href="<?php echo e(url('/')); ?>" class="hover:text-lime-300 transition font-medium">Home</a>
      <span class="text-lime-300">/</span>
      <a href="<?php echo e(route('user.galeri')); ?>" class="hover:text-lime-300 transition font-medium">Galeri Desa</a>
      <span class="text-lime-300">/</span>
      <span class="font-light text-lime-200">Detail Gambar</span>
    </div>
  </div>

</section>


<style>
.glow-text {
  text-shadow: 0 0 10px rgba(163, 230, 53, 0.6),
               0 0 20px rgba(132, 204, 22, 0.4);
}
.blur-overlay {
  backdrop-filter: blur(3px);
  background-color: rgba(6, 78, 59, 0.45);
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
</script>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/partials/header_detail_gambar.blade.php ENDPATH**/ ?>