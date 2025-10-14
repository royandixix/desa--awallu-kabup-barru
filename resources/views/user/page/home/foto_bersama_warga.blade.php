<div class="min-h-screen bg-white flex flex-col items-center relative">

  <!-- Teks mobile di luar gambar -->
  <div class="sm:hidden w-full max-w-7xl px-4 mt-2 flex flex-col items-center text-center space-y-2 opacity-0 translate-y-6 transition-all duration-1000" id="mobile-text">
    <h1 class="text-2xl font-bold text-gray-800">Bersama Warga Batupute</h1>
    <p class="text-gray-600 text-base">Kenangan indah bersama komunitas</p>
  </div>

  <!-- Banner -->
  <div id="animated-banner" class="w-full max-w-7xl mt-8 px-4 relative group overflow-hidden rounded-3xl shadow-xl opacity-0 translate-y-8 transition-all duration-1000">

    <!-- Gambar -->
    <img src="{{ asset('img/user/batuputebersama.webp') }}" 
         alt="Bersama Warga Batupute" 
         class="w-full object-cover h-80 sm:h-96 md:h-[500px] transition-transform duration-700 ease-in-out group-hover:scale-105 group-hover:brightness-110 rounded-3xl">

    <!-- Gradient overlay desktop -->
    <div class="absolute inset-0 hidden sm:block bg-gradient-to-b from-black/40 via-black/20 to-transparent rounded-3xl backdrop-blur-sm transition-all duration-700 group-hover:backdrop-blur-0 group-hover:opacity-80"></div>

    <!-- Text overlay device ≥ sm -->
    <div class="absolute inset-0 hidden sm:flex flex-col justify-end p-6 text-white space-y-2">
      <h1 class="text-3xl sm:text-5xl font-bold drop-shadow-lg opacity-0 translate-y-4 transition-all duration-700">
        Bersama Warga Batupute
      </h1>
      <p class="text-lg sm:text-xl drop-shadow-md opacity-0 translate-y-4 transition-all duration-900">
        Kenangan indah bersama komunitas
      </p>
    </div>

  </div>
  

</div>

<style>
  .fade-in-up {
    opacity: 1 !important;
    transform: translateY(0) !important;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const banner = document.getElementById('animated-banner');
    const texts = banner.querySelectorAll('h1, p');
    const mobileText = document.getElementById('mobile-text');

    // Animasi device ≥ sm
    const observerDesktop = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting && window.innerWidth >= 640){
          entry.target.classList.add('fade-in-up');

          texts.forEach((el, idx) => {
            setTimeout(() => {
              el.classList.remove('opacity-0', 'translate-y-4');
              el.classList.add('opacity-100', 'translate-y-0');
            }, idx * 150);
          });

          observerDesktop.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    // Animasi mobile (<640px)
    const observerMobile = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting && window.innerWidth < 640){
          mobileText.classList.add('fade-in-up');
          observerMobile.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    observerDesktop.observe(banner);
    observerMobile.observe(mobileText);
  });
</script>

