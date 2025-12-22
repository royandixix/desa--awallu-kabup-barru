
<div class="relative w-full min-h-screen bg-white flex flex-col items-center justify-center px-6 lg:px-16 py-20 overflow-hidden">

  <!-- Grid Utama -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center max-w-7xl w-full relative z-10">

    <!-- Kolom Teks Sambutan -->
    <div class="order-1 space-y-6 fade-left">
      <h1 class="text-5xl lg:text-6xl  text-gray-900 leading-tight mb-4">
        <span id="typing-title"></span><span class="cursor">|</span>
      </h1>

      <p class="text-lg text-gray-700 leading-relaxed">
        Assalamu'alaikum Warahmatullahi Wabarakatuh<br>
        Selamat datang di Website Resmi Desa Lawallu. Website ini kami hadirkan sebagai sarana informasi dan komunikasi antara pemerintah desa dan masyarakat. 
        Harapan kami, website ini dapat menjadi media transparansi, pelayanan publik, dan promosi potensi desa. 
        Kami mengajak seluruh warga untuk bersama-sama membangun Desa Lawallu agar semakin maju, mandiri, dan sejahtera.
      </p>

      <!-- Gambar Kepala Desa (muncul di tengah teks versi mobile) -->
      <div class="block lg:hidden mt-8">
        <div class="overflow-hidden shadow-2xl border border-gray-200 relative">
          <img src="<?php echo e(asset('img/user/WhatsApp Image 2025-12-22 at 13.29.46.jpeg')); ?>" 
               alt="Foto Kepala Desa"
               class="w-full h-[450px] object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

          <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
            <h3 class="text-xl font-bold">Bapak Kepala Desa Lawallu</h3>
            <p class="text-gray-300 text-sm">Bersama Ibu Ketua PKK</p>
          </div>
        </div>
      </div>

      <p class="text-lg text-gray-800 leading-relaxed font-medium">
        Berikut ini adalah beberapa fitur yang ada di website kami:
      </p>

      <ul class="list-disc list-inside space-y-1">
        <li><span class="text-green-600 ">Galeri:</span> Menampilkan foto-foto kegiatan</li>
        <li><span class="text-green-600 ">Transparansi:</span> Menampilkan laporan keuangan</li>
        <li><span class="text-green-600 ">Berita:</span> Menampilkan berita terbaru</li>
        <li><span class="text-green-600 ">Pengaduan:</span> Fitur untuk menyampaikan saran dan laporan</li>
      </ul>

      
    </div>

    <!-- Gambar Kepala Desa (khusus untuk desktop) -->
    <div class="hidden lg:block order-2">
      <div class="overflow-hidden shadow-2xl border border-gray-200 relative">
        <img src="<?php echo e(asset('img/user/WhatsApp Image 2025-12-22 at 13.29.46.jpeg')); ?>" 
             alt="Foto Kepala Desa"
             class="w-full h-[550px] object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
          <h3 class="text-2xl font-bold">Bapak Kepala Desa Lawallu</h3>
          <p class="text-gray-300 text-sm">Bersama Ibu Ketua PKK</p>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Animasi Scroll & Typing -->
<style>
@keyframes fadeLeft {
  0% {opacity: 0; transform: translateX(-60px);}
  100% {opacity: 1; transform: translateX(0);}
}
.fade-left {opacity: 0; transition: all 1s ease-out;}
.show.fade-left {animation: fadeLeft 1s ease-out forwards;}

.cursor {
  display: inline-block;
  width: 1ch;
  animation: blink 0.7s step-end infinite;
  color: #16a34a;
}
@keyframes blink {
  0%,50%,100% {opacity: 1;}
  25%,75% {opacity: 0;}
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  // Scroll fade animation
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        observer.unobserve(entry.target);
      } 
    });
  }, { threshold: 0.2 });

  document.querySelectorAll('.fade-left').forEach(el => observer.observe(el));

  // Typing animation
  const title = "Sambutan Kepala Desa";
  const el = document.getElementById("typing-title");
  let i = 0, forward = true, speed = 80;

  function loop() {
    el.textContent = title.slice(0, i);
    if (forward) {
      i++;
      if (i > title.length) {
        forward = false;
        setTimeout(loop, 1000);
      } else setTimeout(loop, speed);
    } else {
      i--;
      if (i < 0) {
        forward = true;
        setTimeout(loop, 700);
      } else setTimeout(loop, speed);
    }
  }
  loop();
});
</script>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/home/sambutan.blade.php ENDPATH**/ ?>