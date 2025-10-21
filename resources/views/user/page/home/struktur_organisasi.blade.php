<div class="mx-auto max-w-7xl px-6 lg:px-8">

  <!-- === JUDUL === -->
  <div class="text-center mb-12">
    <h2 class="text-3xl text-gray-800 sm:text-4xl">Struktur Organisasi</h2>
    <div class="mx-auto mt-3 mb-6 h-1 w-24 bg-green-600 rounded-full"></div>
    <p class="text-gray-600 text-lg">
      Berikut ini adalah struktur organisasi dan tata kerja Desa Batupute
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

  <!-- === SLIDER === -->
  <div class="relative overflow-hidden">
    <div id="slider" class="flex gap-6 transition-transform duration-700 ease-in-out">
      @foreach ($struktur as $index => $item)
        <div class="min-w-[250px] sm:min-w-[280px] md:min-w-[300px] bg-white rounded-lg shadow-md overflow-hidden
                    group transform transition duration-500 hover:-translate-y-2 hover:shadow-xl cursor-pointer"
             data-index="{{ $index }}"
             data-nama="{{ $item['nama'] }}"
             data-jabatan="{{ $item['jabatan'] }}"
             data-foto="{{ asset('img/user/foto_organisasi/' . $item['foto']) }}">
          <div class="relative w-full h-72 overflow-hidden">
            <img src="{{ asset('img/user/foto_organisasi/' . $item['foto']) }}"
                 alt="{{ $item['nama'] }}"
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
          </div>
        </div>
      @endforeach
    </div>

    <!-- Tombol Slider -->
    <button id="prev" class="absolute left-0 top-1/2 -translate-y-1/2 bg-green-700 text-white p-3 rounded-full hover:bg-green-800 shadow-lg z-10">‹</button>
    <button id="next" class="absolute right-0 top-1/2 -translate-y-1/2 bg-green-700 text-white p-3 rounded-full hover:bg-green-800 shadow-lg z-10">›</button>
  </div>
</div>

<!-- === MODAL === -->
<div id="modal" class="fixed inset-0 hidden items-center justify-center z-50">
  <div class="fixed inset-0 bg-black/70 backdrop-blur-sm"></div>
  <div class="relative bg-white rounded-lg max-w-3xl w-full overflow-hidden animate-scale-up">
    <!-- Tombol tutup -->
    <button id="modal-close" class="absolute top-2 right-2 bg-red-600 text-white rounded-full px-3 py-1 hover:bg-red-700 z-20">×</button>

    <!-- Gambar besar -->
    <div class="relative">
      <img id="modal-img" src="" alt="" class="w-full h-[500px] object-cover transition-transform duration-500"/>
      <button id="modal-prev" class="absolute top-1/2 left-2 -translate-y-1/2 bg-green-700 text-white p-3 rounded-full hover:bg-green-800 z-20">‹</button>
      <button id="modal-next" class="absolute top-1/2 right-2 -translate-y-1/2 bg-green-700 text-white p-3 rounded-full hover:bg-green-800 z-20">›</button>
    </div>

    <!-- Nama & jabatan -->
    <div class="p-4 text-center">
      <h3 id="modal-nama" class="text-2xl font-bold"></h3>
      <p id="modal-jabatan" class="text-gray-600 text-lg"></p>
    </div>
  </div>
</div>

<style>
  @keyframes scaleUp {
    0% { transform: scale(0.8); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
  }
  .animate-scale-up {
    animation: scaleUp 0.3s ease-out;
    will-change: transform, opacity;
  }
  body.modal-open {
    overflow: hidden;
  }
</style>

<script>
  const slider = document.getElementById('slider');
  const slides = Array.from(slider.children);
  const slideCount = slides.length;
  let index = 0;

  const nextBtn = document.getElementById('next');
  const prevBtn = document.getElementById('prev');

  function updateSlider() {
    const slideWidth = slides[0].getBoundingClientRect().width + 24; // 24 = gap-6
    slider.style.transform = `translateX(-${index * slideWidth}px)`;
  }

  nextBtn.addEventListener('click', () => {
    index = (index + 1) % slideCount;
    updateSlider();
  });

  prevBtn.addEventListener('click', () => {
    index = (index - 1 + slideCount) % slideCount;
    updateSlider();
  });

  let autoSlide = setInterval(() => {
    index = (index + 1) % slideCount;
    updateSlider();
  }, 3000);

  slider.parentElement.addEventListener('mouseenter', () => clearInterval(autoSlide));
  slider.parentElement.addEventListener('mouseleave', () => autoSlide = setInterval(() => {
    index = (index + 1) % slideCount;
    updateSlider();
  }, 3000));

  // ===== MODAL =====
  const modal = document.getElementById('modal');
  const modalImg = document.getElementById('modal-img');
  const modalNama = document.getElementById('modal-nama');
  const modalJabatan = document.getElementById('modal-jabatan');
  const modalClose = document.getElementById('modal-close');
  const modalPrev = document.getElementById('modal-prev');
  const modalNext = document.getElementById('modal-next');

  let currentIndex = 0;

  function openModal(idx) {
    const slide = slides[idx];
    modalImg.src = slide.dataset.foto;
    modalNama.textContent = slide.dataset.nama;
    modalJabatan.textContent = slide.dataset.jabatan;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('modal-open');
    currentIndex = idx;
  }

  function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('modal-open');
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + slideCount) % slideCount;
    const slide = slides[currentIndex];
    modalImg.src = slide.dataset.foto;
    modalNama.textContent = slide.dataset.nama;
    modalJabatan.textContent = slide.dataset.jabatan;
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % slideCount;
    const slide = slides[currentIndex];
    modalImg.src = slide.dataset.foto;
    modalNama.textContent = slide.dataset.nama;
    modalJabatan.textContent = slide.dataset.jabatan;
  }

  slides.forEach(slide => {
    slide.addEventListener('click', () => openModal(parseInt(slide.dataset.index)));
  });

  modalClose.addEventListener('click', closeModal);
  modalPrev.addEventListener('click', showPrev);
  modalNext.addEventListener('click', showNext);
  modal.addEventListener('click', (e) => {
    if(e.target === modal) closeModal();
  });
</script>
