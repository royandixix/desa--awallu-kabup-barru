<!-- 🌿 HERO SECTION BERSAMA WARGA Lawallu -->
<div class="min-h-screen bg-white flex flex-col items-center justify-start relative overflow-hidden">

  <!-- 📱 TEKS MOBILE -->
  <div id="mobile-text"
       class="sm:hidden w-full max-w-7xl px-4 mt-4 flex flex-col items-center text-center space-y-2 opacity-0 translate-y-6 transition-all duration-1000">
    <h1 class="text-2xl font-bold text-gray-900">Bersama Warga Lawallu</h1>
    <p class="text-gray-600 text-base">Mengabadikan kebersamaan dan momen berharga komunitas kita</p>
  </div>

  <!-- 🖼️ BANNER UTAMA -->
  @if(isset($hero) && $hero)
  <div id="animated-banner"
       class="w-full max-w-7xl mt-8 px-4 relative group overflow-hidden shadow-2xl opacity-0 translate-y-8 transition-all duration-1000">

    <!-- Gambar -->
    <img src="{{ Storage::url($hero->file_path) }}"
         alt="{{ $hero->judul }}"
         class="w-full h-80 sm:h-96 md:h-[500px] object-cover transition-transform duration-700 ease-in-out group-hover:scale-105 group-hover:brightness-110">

    <!-- Gradient Overlay (Desktop) -->
    <div class="absolute inset-0 hidden sm:block bg-gradient-to-t from-black/60 via-black/20 to-transparent transition-all duration-700 group-hover:opacity-90"></div>

    <!-- Teks Overlay (Desktop) -->
    <div class="absolute inset-0 hidden sm:flex flex-col justify-end p-8 text-white space-y-3">
      <h1 class="text-3xl sm:text-5xl font-bold tracking-tight drop-shadow-lg opacity-0 translate-y-4 transition-all duration-700">
        {{ $hero->judul }}
      </h1>
      <p class="text-lg sm:text-xl drop-shadow-md opacity-0 translate-y-4 transition-all duration-900">
        {{ $hero->deskripsi }}
      </p>
    </div>
  </div>
  @endif

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

  <!-- 🌿 GALERI FOTO BERSAMA WARGA -->
  @if(isset($galeri) && $galeri->count())
  <div class="w-full max-w-7xl mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
    @foreach($galeri as $foto)
      <div class="relative group overflow-hidden bg-white border border-gray-200 hover:shadow-2xl transition-all duration-500">
        <img src="{{ Storage::url($foto->file_path) }}" alt="{{ $foto->judul }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center text-white text-lg font-semibold">
          {{ $foto->judul }}
        </div>
      </div>
    @endforeach
  </div>
  @endif

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
    const bannerTexts = banner ? banner.querySelectorAll('h1, p') : [];
    const mobileText = document.getElementById('mobile-text');
    const desc = document.getElementById('description');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const target = entry.target;
          target.classList.add('fade-in-up');

          if (target === banner && window.innerWidth >= 640 && bannerTexts.length) {
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

    if(banner) observer.observe(banner);
    observer.observe(mobileText);
    observer.observe(desc);
  });
</script>
