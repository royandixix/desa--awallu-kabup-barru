<div class="mx-auto max-w-7xl px-6 lg:px-8">

  <!-- === JUDUL === -->
  <div class="text-center mb-12">
    <h2 class="text-3xl text-gray-800 sm:text-4xl ">Struktur Organisasi</h2>
    <div class="mx-auto mt-3 mb-6 h-1 w-24 bg-green-600 rounded-full"></div>
    <p class="text-gray-600 text-lg">
      Berikut ini adalah struktur organisasi dan tata kerja Desa Lawallu
    </p>
  </div>

  @php
    $struktur = [
      ['nama' => 'Jaharuddin', 'jabatan' => 'Kepala Desa', 'foto' => '1749783443.webp'],
      ['nama' => 'Sitti Rabiah, S.Sos', 'jabatan' => 'Sekretaris Desa', 'foto' => '1749787016.webp'],
      ['nama' => 'Marlina Yasin', 'jabatan' => 'Kaur Umum & Tata Usaha', 'foto' => '1750648564.webp'],
      ['nama' => 'Ega Enriani, S.A.P', 'jabatan' => 'Kaur Keuangan & Plt. Kaur Perencanaan', 'foto' => '1750648597.webp'],
      ['nama' => 'Ebit Kurniawa', 'jabatan' => 'Kasi Kesejahteraan', 'foto' => '1750663025.webp'],
      ['nama' => 'Andi Ramlah', 'jabatan' => 'Kasi Pelayanan', 'foto' => '1750728717.webp'],
      ['nama' => 'Nama Baru 1', 'jabatan' => 'Kasi Pemerintahan', 'foto' => '1748499789.webp'],
      ['nama' => 'Nama Baru 2', 'jabatan' => 'Kaur Pembangunan', 'foto' => '1750663349.webp'],
    ];
  @endphp

  <!-- === KONTROL SLIDER === -->
  <div class="flex justify-center items-center gap-4 mb-6">
    <button id="pauseBtn" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full transition-all duration-300 shadow-md hover:shadow-lg flex items-center gap-2">
      <span id="pauseIcon">⏸</span>
      <span id="pauseText">Pause</span>
    </button>
    <div class="flex gap-2">
      @for ($i = 0; $i < count($struktur); $i++)
        <button class="indicator w-3 h-3 rounded-full bg-gray-300 transition-all duration-300 hover:bg-green-400" data-index="{{ $i }}"></button>
      @endfor
    </div>
  </div>

  <!-- === SLIDER === -->
  <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 to-blue-50 p-6">
    <div id="slider" class="flex gap-6 animate-marquee">
      @foreach ($struktur as $index => $item)
        <div class="min-w-[250px] sm:min-w-[280px] md:min-w-[300px] bg-white rounded-2xl shadow-lg overflow-hidden
                    group transform transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:scale-105 cursor-pointer border-2 border-transparent hover:border-green-500"
             data-index="{{ $index }}"
             data-nama="{{ $item['nama'] }}"
             data-jabatan="{{ $item['jabatan'] }}"
             data-foto="{{ asset('img/user/foto_organisasi/' . $item['foto']) }}">
          <div class="relative w-full h-72 overflow-hidden bg-gradient-to-br from-green-100 to-blue-100">
            <img src="{{ asset('img/user/foto_organisasi/' . $item['foto']) }}"
                 alt="{{ $item['nama'] }}"
                 class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="absolute bottom-2 right-2 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              Klik untuk detail
            </div>
          </div>
          <div class="p-5 text-center">
            <h3 class="text-lg  text-gray-800 group-hover:text-green-600 transition-colors duration-300">{{ $item['nama'] }}</h3>
            <p class="text-gray-600 text-sm mt-1">{{ $item['jabatan'] }}</p>
          </div>
        </div>
      @endforeach

      <!-- Duplikasi untuk loop halus -->
      @foreach ($struktur as $index => $item)
        <div class="min-w-[250px] sm:min-w-[280px] md:min-w-[300px] bg-white rounded-2xl shadow-lg overflow-hidden
                    group transform transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:scale-105 cursor-pointer border-2 border-transparent hover:border-green-500"
             data-index="{{ $index }}"
             data-nama="{{ $item['nama'] }}"
             data-jabatan="{{ $item['jabatan'] }}"
             data-foto="{{ asset('img/user/foto_organisasi/' . $item['foto']) }}">
          <div class="relative w-full h-72 overflow-hidden bg-gradient-to-br from-green-100 to-blue-100">
            <img src="{{ asset('img/user/foto_organisasi/' . $item['foto']) }}"
                 alt="{{ $item['nama'] }}"
                 class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="absolute bottom-2 right-2 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              Klik untuk detail
            </div>
          </div>
          <div class="p-5 text-center">
            <h3 class="text-lg  text-gray-800 group-hover:text-green-600 transition-colors duration-300">{{ $item['nama'] }}</h3>
            <p class="text-gray-600 text-sm mt-1">{{ $item['jabatan'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<!-- === MODAL === -->
<div id="modal" class="fixed inset-0 hidden items-center justify-center z-50">
  <div class="fixed inset-0 bg-black/80 backdrop-blur-md"></div>
  <div class="relative bg-white rounded-2xl max-w-4xl w-full mx-4 overflow-hidden animate-scale-up shadow-2xl">
    <!-- Tombol tutup -->
    <button id="modal-close" class="absolute top-4 right-4 bg-red-600 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-red-700 z-20 text-2xl  shadow-lg transition-all duration-300 hover:scale-110">×</button>

    <!-- Gambar besar -->
    <div class="relative bg-gradient-to-br from-green-50 to-blue-50">
      <img id="modal-img" src="" alt="" class="w-full h-[500px] object-cover transition-all duration-500"/>
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
      
      <button id="modal-prev" class="absolute top-1/2 left-4 -translate-y-1/2 bg-green-700 text-white w-12 h-12 rounded-full hover:bg-green-800 z-20 text-2xl  shadow-lg transition-all duration-300 hover:scale-110 flex items-center justify-center">‹</button>
      <button id="modal-next" class="absolute top-1/2 right-4 -translate-y-1/2 bg-green-700 text-white w-12 h-12 rounded-full hover:bg-green-800 z-20 text-2xl  shadow-lg transition-all duration-300 hover:scale-110 flex items-center justify-center">›</button>
      
      <!-- Counter -->
      <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/70 text-white px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm">
        <span id="modal-counter">1 / 8</span>
      </div>
    </div>

    <!-- Nama & jabatan -->
    <div class="p-6 text-center bg-gradient-to-br from-white to-green-50">
      <h3 id="modal-nama" class="text-3xl  text-gray-800 mb-2"></h3>
      <p id="modal-jabatan" class="text-gray-600 text-lg"></p>
    </div>
  </div>
</div>

<style>
  @keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  .animate-marquee {
    display: flex;
    animation: marquee 30s linear infinite;
    will-change: transform;
  }
  .animate-marquee.paused {
    animation-play-state: paused;
  }
  @keyframes scaleUp {
    0% { transform: scale(0.8); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
  }
  .animate-scale-up {
    animation: scaleUp 0.3s ease-out;
  }
  body.modal-open {
    overflow: hidden;
  }
  .indicator.active {
    background-color: #16a34a;
    width: 2rem;
  }
</style>

<script>
  const slides = Array.from(document.querySelectorAll('#slider > div'));
  const slider = document.getElementById('slider');
  const modal = document.getElementById('modal');
  const modalImg = document.getElementById('modal-img');
  const modalNama = document.getElementById('modal-nama');
  const modalJabatan = document.getElementById('modal-jabatan');
  const modalCounter = document.getElementById('modal-counter');
  const modalClose = document.getElementById('modal-close');
  const modalPrev = document.getElementById('modal-prev');
  const modalNext = document.getElementById('modal-next');
  const pauseBtn = document.getElementById('pauseBtn');
  const pauseIcon = document.getElementById('pauseIcon');
  const pauseText = document.getElementById('pauseText');
  const indicators = document.querySelectorAll('.indicator');

  let slideCount = slides.length / 2;
  let currentIndex = 0;
  let isPaused = false;

  // Toggle pause/play
  pauseBtn.addEventListener('click', () => {
    isPaused = !isPaused;
    if (isPaused) {
      slider.classList.add('paused');
      pauseIcon.textContent = '▶';
      pauseText.textContent = 'Play';
    } else {
      slider.classList.remove('paused');
      pauseIcon.textContent = '⏸';
      pauseText.textContent = 'Pause';
    }
  });

  // Update indicators
  function updateIndicators(index) {
    indicators.forEach((ind, i) => {
      if (i === index % slideCount) {
        ind.classList.add('active');
      } else {
        ind.classList.remove('active');
      }
    });
  }

  // Click indicator to jump
  indicators.forEach((indicator, i) => {
    indicator.addEventListener('click', () => {
      currentIndex = i;
      openModal(currentIndex);
    });
  });

  function openModal(idx) {
    const slide = slides[idx % slideCount];
    modalImg.src = slide.dataset.foto;
    modalNama.textContent = slide.dataset.nama;
    modalJabatan.textContent = slide.dataset.jabatan;
    modalCounter.textContent = `${(idx % slideCount) + 1} / ${slideCount}`;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('modal-open');
    currentIndex = idx;
    updateIndicators(idx);
  }

  function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('modal-open');
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + slideCount) % slideCount;
    openModal(currentIndex);
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % slideCount;
    openModal(currentIndex);
  }

  slides.forEach((slide, i) => {
    slide.addEventListener('click', () => openModal(i));
  });

  modalClose.addEventListener('click', closeModal);
  modalPrev.addEventListener('click', showPrev);
  modalNext.addEventListener('click', showNext);
  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  // Keyboard navigation
  document.addEventListener('keydown', (e) => {
    if (!modal.classList.contains('hidden')) {
      if (e.key === 'ArrowLeft') showPrev();
      if (e.key === 'ArrowRight') showNext();
      if (e.key === 'Escape') closeModal();
    }
  });

  // Initialize first indicator
  updateIndicators(0);
</script>