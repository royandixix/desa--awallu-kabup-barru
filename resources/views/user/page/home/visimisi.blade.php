<!-- 🌿 Section -->
<div class="overflow-hidden bg-white py-24 sm:py-32" data-animate>
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 items-center lg:items-start">

      <!-- 🌿 Kiri: Vektor + teks ajakan -->
      <div class="flex flex-col justify-center items-center lg:justify-start mt-10 lg:mt-0 px-4 lg:px-0 vektor-container text-center" data-animate>
        <div class="relative animate-float">
          <img src="{{ asset('img/user/vektor/undraw_fill-the-blank_n29z.png') }}"
               alt="Ilustrasi Visi Misi"
               class="w-full max-w-3xl lg:max-w-4xl object-contain vektor-goyang-berputar" />
        </div>

        <!-- ✨ Teks Ajakan -->
        <div class="mt-6 animate-hint">
          <p class="text-lg md:text-xl font-medium text-gray-700 leading-relaxed">
            <span class="text-green-600 font-semibold">Yuk jelajahi lebih dalam!</span><br />
            Klik tombol <span class="text-green-600 font-semibold">Visi</span> & <span class="text-green-600 font-semibold">Misi</span> di samping untuk melihat detailnya 
          </p>
        </div>
      </div>

      <!-- 🧭 Kanan: Visi & Misi -->
      <div class="relative max-w-xl lg:max-w-lg mt-10 lg:mt-0" data-animate>
        <h2 class="text-base font-semibold text-green-600">Visi & Misi</h2>
        <p class="mt-2 text-4xl lg:text-5xl font-semibold tracking-tight text-gray-900 animate-title">
          Visi dan Misi Kepala Desa Batupute
        </p>
        <p class="mt-4 text-lg text-gray-700 animate-fade">
          Berikut ini adalah visi dan misi yang menjadi pedoman pembangunan dan pelayanan Desa Batupute.
        </p>

        <div class="mt-10 space-y-4 relative">
          <!-- 🔹 VISI -->
          <button 
            class="w-full px-5 py-4 bg-gray-100 rounded-xl font-semibold text-gray-900 hover:bg-green-50 transition-all duration-300 shadow-sm modal-trigger flex justify-between items-center"
            data-modal="visiModal">
            Visi
            <span class="text-green-600 text-2xl">+</span>
          </button>

          <!-- 🔹 MISI -->
          <button 
            class="w-full px-5 py-4 bg-gray-100 rounded-xl font-semibold text-gray-900 hover:bg-green-50 transition-all duration-300 shadow-sm modal-trigger flex justify-between items-center"
            data-modal="misiModal">
            Misi
            <span class="text-green-600 text-2xl">+</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 🌫️ Modal VISI -->
<div id="visiModal" class="modal fixed inset-0 hidden items-center justify-center z-50">
  <div class="modal-overlay absolute inset-0 bg-black/30 backdrop-blur-md opacity-0 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]"></div>
  <div class="modal-content relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full mx-4 p-6 transform opacity-0 scale-90 translate-y-6 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-2xl font-semibold text-green-700">Visi Desa Batupute</h3>
      <button class="text-gray-500 hover:text-red-500 text-2xl close-modal">&times;</button>
    </div>
    <p class="text-lg leading-relaxed text-gray-700">
      “Terwujudnya Desa Batupute sebagai desa mandiri yang istiqamah menjalankan amar ma’ruf nahi munkar menuju keridhaan Allah Subhanahu Wa Ta’ala.”
    </p>
  </div>
</div>

<!-- 🌫️ Modal MISI -->
<div id="misiModal" class="modal fixed inset-0 hidden items-center justify-center z-50">
  <div class="modal-overlay absolute inset-0 bg-black/30 backdrop-blur-md opacity-0 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]"></div>
  <div class="modal-content relative bg-white rounded-3xl shadow-2xl max-w-3xl w-full mx-4 p-6 transform opacity-0 scale-90 translate-y-6 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-2xl font-semibold text-green-700">Misi Desa Batupute</h3>
      <button class="text-gray-500 hover:text-red-500 text-2xl close-modal">&times;</button>
    </div>
    <ul class="list-decimal pl-5 space-y-3 text-lg leading-relaxed text-gray-700">
      <li>Mewujudkan penduduk Desa Batupute menjadi insan yang bertaqwa kepada Allah Subhanahu Wa Ta’ala, patuh dan taat terhadap peraturan yang berlaku.</li>
      <li>Mewujudkan sumber daya manusia yang mandiri dan optimalisasi sumber daya alam desa.</li>
      <li>Mewujudkan pelayanan prima melalui pemerintahan yang bersih, transparan, akuntabel, dan profesional.</li>
      <li>Mewujudkan perekonomian desa yang mandiri dan memberdayakan masyarakat untuk mengentaskan kemiskinan.</li>
      <li>Mewujudkan layanan kesehatan masyarakat dan lingkungan yang baik.</li>
    </ul>
  </div>
</div>

<!-- ⚙️ Script -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const triggers = document.querySelectorAll(".modal-trigger");
  const modals = document.querySelectorAll(".modal");
  const body = document.body;

  const openModal = (modal) => {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    body.classList.add("overflow-hidden");

    const overlay = modal.querySelector(".modal-overlay");
    const content = modal.querySelector(".modal-content");

    setTimeout(() => {
      overlay.classList.add("opacity-100");
      content.classList.remove("opacity-0", "scale-90", "translate-y-6");
      content.classList.add("opacity-100", "scale-100", "translate-y-0");
    }, 20);
  };

  const closeModal = (modal) => {
    const overlay = modal.querySelector(".modal-overlay");
    const content = modal.querySelector(".modal-content");

    overlay.classList.remove("opacity-100");
    overlay.classList.add("opacity-0");
    content.classList.remove("opacity-100", "scale-100", "translate-y-0");
    content.classList.add("opacity-0", "scale-90", "translate-y-6");

    setTimeout(() => {
      modal.classList.remove("flex");
      modal.classList.add("hidden");
      body.classList.remove("overflow-hidden");
    }, 600);
  };

  // Buka & tutup modal
  triggers.forEach(btn => {
    btn.addEventListener("click", () => openModal(document.getElementById(btn.dataset.modal)));
  });
  modals.forEach(modal => {
    modal.querySelector(".close-modal").addEventListener("click", () => closeModal(modal));
    modal.addEventListener("click", e => { if (e.target.classList.contains("modal-overlay")) closeModal(modal); });
  });

  // ✨ Animasi scroll masuk
  const elements = document.querySelectorAll('[data-animate]');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('visible'); });
  }, { threshold: 0.2 });
  elements.forEach(el => observer.observe(el));
});
</script>

<!-- 💅 Style Animasi -->
<style>
  [data-animate] {
    opacity: 0;
    transform: translateY(40px) scale(0.98);
    transition: all 1s ease-out;
  }
  [data-animate].visible {
    opacity: 1;
    transform: translateY(0) scale(1);
  }

  /* 🌿 Animasi vektor */
  .vektor-goyang-berputar {
    animation: goyangBerputar 7s ease-in-out infinite alternate;
  }
  @keyframes goyangBerputar {
    0% { transform: rotate(0deg) translateY(0); }
    50% { transform: rotate(2deg) translateY(-6px); }
    100% { transform: rotate(-2deg) translateY(6px); }
  }

  .animate-float { animation: floatUpDown 6s ease-in-out infinite; }
  @keyframes floatUpDown {
    0%,100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }

  .animate-title { animation: slideUp 1.2s ease-out both; }
  .animate-fade { animation: fadeIn 1.8s ease-out both; }
  @keyframes slideUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
  }

  /* 🌈 Animasi teks ajakan */
  .animate-hint {
    animation: hintGlow 2.5s ease-in-out infinite alternate;
  }
  @keyframes hintGlow {
    0% { opacity: 0.6; transform: translateY(10px); text-shadow: 0 0 0 rgba(34,197,94,0); }
    100% { opacity: 1; transform: translateY(0); text-shadow: 0 0 10px rgba(34,197,94,0.25); }
  }

  /* ✨ Modal Overlay */
  .modal-overlay::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.05), transparent 70%);
    animation: shimmer 6s infinite linear;
  }
  @keyframes shimmer {
    0% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
  }

  .modal-content { box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
</style>
