<!-- 🌿 HERO SECTION BERSAMA WARGA Lawallu -->
<div class="min-h-screen bg-white flex flex-col items-center justify-start relative overflow-hidden">

  <!-- 📱 TEKS MOBILE -->
  <div id="mobile-text"
       class="sm:hidden w-full max-w-7xl px-4 mt-4 flex flex-col items-center text-center space-y-2 opacity-0 translate-y-6 transition-all duration-1000">
    <h1 class="text-2xl font-bold text-gray-900">Bersama Warga Lawallu</h1>
    <p class="text-gray-600 text-base">Mengabadikan kebersamaan dan momen berharga komunitas kita</p>
  </div>

  <!-- 🖼️ BANNER UTAMA -->
  <div id="animated-banner"
       class="w-full max-w-7xl mt-8 px-4 relative group overflow-hidden rounded-3xl shadow-2xl opacity-0 translate-y-8 transition-all duration-1000">

    <!-- Gambar -->
    <img src="{{ asset('img/DESA_LAWALLU/FOTO_BERSAMA/WhatsApp Image 2025-10-28 at 09.36.24_79c828f2.jpg') }}"
         alt="Bersama Warga Lawallu"
         class="w-full h-80 sm:h-96 md:h-[500px] object-cover rounded-3xl transition-transform duration-700 ease-in-out group-hover:scale-105 group-hover:brightness-110">

    <!-- Gradient Overlay (Desktop) -->
    <div class="absolute inset-0 hidden sm:block bg-gradient-to-t from-black/60 via-black/20 to-transparent rounded-3xl transition-all duration-700 group-hover:opacity-90"></div>

    <!-- Teks Overlay (Desktop) -->
    <div class="absolute inset-0 hidden sm:flex flex-col justify-end p-8 text-white space-y-3">
      <h1 class="text-3xl sm:text-5xl font-bold tracking-tight drop-shadow-lg opacity-0 translate-y-4 transition-all duration-700">
        Bersama Warga Lawallu
      </h1>
      <p class="text-lg sm:text-xl drop-shadow-md opacity-0 translate-y-4 transition-all duration-900">
        Mengabadikan kebersamaan dan momen berharga komunitas kita
      </p>
    </div>
  </div>

  <!-- ✨ TEKS PENJELASAN DIBAWAH BANNER -->
  <div class="max-w-4xl px-6 mt-6 sm:mt-10 text-center opacity-0 translate-y-4 transition-all duration-1000" id="description">
    <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 leading-relaxed">
      Ilustrasi ini menampilkan warga Desa Lawallu dalam kegiatan sehari-hari dengan suasana hangat dan ramah,
      menggambarkan komunitas yang bersatu dan penuh semangat.
    </h2>
    <p class="mt-3 sm:mt-4 text-gray-600 text-base sm:text-lg">
      Mari kenang momen-momen indah bersama tetangga dan keluarga, membangun rasa kebersamaan yang kuat.
    </p>
  </div>

</div>

<!-- 🌈 STYLE -->
<style>
  .fade-in-up {
    opacity: 1 !important;
    transform: translateY(0) !important;
  }
</style>

<!-- ⚙️ SCRIPT ANIMASI -->
  
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const banner = document.getElementById('animated-banner');
    const bannerTexts = banner.querySelectorAll('h1, p');
    const mobileText = document.getElementById('mobile-text');
    const desc = document.getElementById('description');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const target = entry.target;
          target.classList.add('fade-in-up');

          // Animasi teks di banner desktop
          if (target === banner && window.innerWidth >= 640) {
            bannerTexts.forEach((el, i) => {
              setTimeout(() => {
                el.classList.remove('opacity-0', 'translate-y-4');
                el.classList.add('opacity-100', 'translate-y-0');
              }, i * 200);
            });
          }

          observer.unobserve(target);
        }
      });
    }, { threshold: 0.2 });

    observer.observe(banner);
    observer.observe(mobileText);
    observer.observe(desc);
  });
</script>
