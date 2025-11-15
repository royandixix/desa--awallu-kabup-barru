<div class="max-w-7xl mx-auto px-6 py-12">

  <!-- Judul -->
  <div class="mb-12">
    <h2 class="text-4xl text-teal-600 font-bold mb-2">SOTK</h2>
    <p class="text-gray-700 text-lg">Struktur Organisasi dan Tata Kerja Desa Lawallu</p>
  </div>

  <!-- Grid Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- ITEM TEMPLATE (SEMUA SUDAH PER INDEX) -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(0)">
      <img src="{{ asset('img/user/foto_organisasi/1749783443.webp') }}" 
           alt="Kepala Desa" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">JAHARUDDIN</h3>
        <p class="text-sm">Kepala Desa</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(1)">
      <img src="{{ asset('img/user/foto_organisasi/1749787016.webp') }}" 
           alt="Sekretaris Desa" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">SITTI RABIAH, S.SOS</h3>
        <p class="text-sm">Sekretaris Desa</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(2)">
      <img src="{{ asset('img/user/foto_organisasi/1750648564.webp') }}" 
           alt="Kaur Umum" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">MARLINA YASIN</h3>
        <p class="text-sm">Kaur Umum & Tata Usaha</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(3)">
      <img src="{{ asset('img/user/foto_organisasi/1750648597.webp') }}" 
           alt="Kaur Keuangan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">EGA ENRIANI, S.A.P</h3>
        <p class="text-sm">Kaur Keuangan & Plt. Kaur Perencanaan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(4)">
      <img src="{{ asset('img/user/foto_organisasi/1750663025.webp') }}" 
           alt="Kasi Kesejahteraan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">EBIT KURNIAWA</h3>
        <p class="text-sm">Kasi Kesejahteraan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(5)">
      <img src="{{ asset('img/user/foto_organisasi/1750728717.webp') }}" 
           alt="Kasi Pelayanan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">ANDI RAMLAH</h3>
        <p class="text-sm">Kasi Pelayanan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(6)">
      <img src="{{ asset('img/user/foto_organisasi/1748499789.webp') }}" 
           alt="Kasi Pemerintahan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">NAMA BARU 1</h3>
        <p class="text-sm">Kasi Pemerintahan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(7)">
      <img src="{{ asset('img/user/foto_organisasi/1750663349.webp') }}" 
           alt="Kaur Pembangunan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">NAMA BARU 2</h3>
        <p class="text-sm">Kaur Pembangunan</p>
      </div>
    </div>

  </div>

</div>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 z-50 items-center justify-center p-4 opacity-0 transition-opacity duration-300">
  <div class="fixed inset-0 bg-black/70" onclick="closeModal()"></div>

  <div id="modalContent"
       class="relative bg-white rounded-xl max-w-2xl w-full shadow-2xl transform transition-all duration-300 scale-90 opacity-0">

    <button onclick="closeModal()" 
            class="absolute top-3 right-3 bg-red-600 text-white rounded-full w-10 h-10 hover:bg-red-700 text-xl z-10">×</button>

    <img id="modalImg" src="" class="w-full h-96 object-cover rounded-t-xl"/>

    <div class="p-6 text-center">
      <h3 id="modalNama" class="text-2xl font-bold text-gray-800 mb-2"></h3>
      <p id="modalJabatan" class="text-gray-600"></p>
    </div>

    <div class="flex justify-between p-4 border-t">
      <button onclick="showPrev()" class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-700">‹ Prev</button>
      <span id="counter" class="text-gray-600 self-center font-semibold"></span>
      <button onclick="showNext()" class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-700">Next ›</button>
    </div>

  </div>
</div>

<script>
  const data = [
    { nama: 'JAHARUDDIN', jabatan: 'Kepala Desa', foto: '{{ asset("img/user/foto_organisasi/1749783443.webp") }}' },
    { nama: 'SITTI RABIAH, S.SOS', jabatan: 'Sekretaris Desa', foto: '{{ asset("img/user/foto_organisasi/1749787016.webp") }}' },
    { nama: 'MARLINA YASIN', jabatan: 'Kaur Umum & Tata Usaha', foto: '{{ asset("img/user/foto_organisasi/1750648564.webp") }}' },
    { nama: 'EGA ENRIANI, S.A.P', jabatan: 'Kaur Keuangan', foto: '{{ asset("img/user/foto_organisasi/1750648597.webp") }}' },
    { nama: 'EBIT KURNIAWA', jabatan: 'Kasi Kesejahteraan', foto: '{{ asset("img/user/foto_organisasi/1750663025.webp") }}' },
    { nama: 'ANDI RAMLAH', jabatan: 'Kasi Pelayanan', foto: '{{ asset("img/user/foto_organisasi/1750728717.webp") }}' },
    { nama: 'NAMA BARU 1', jabatan: 'Kasi Pemerintahan', foto: '{{ asset("img/user/foto_organisasi/1748499789.webp") }}' },
    { nama: 'NAMA BARU 2', jabatan: 'Kaur Pembangunan', foto: '{{ asset("img/user/foto_organisasi/1750663349.webp") }}' },
  ];

  const modal = document.getElementById('modal');
  const modalContent = document.getElementById('modalContent');
  const modalImg = document.getElementById('modalImg');
  const modalNama = document.getElementById('modalNama');
  const modalJabatan = document.getElementById('modalJabatan');
  const counter = document.getElementById('counter');

  let currentIndex = 0;

  function renderModal() {
    const item = data[currentIndex];
    modalImg.src = item.foto;
    modalNama.textContent = item.nama;
    modalJabatan.textContent = item.jabatan;
    counter.textContent = `${currentIndex + 1} / ${data.length}`;
  }

  function openModal(idx) {
    currentIndex = idx;
    renderModal();

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(() => {
      modal.classList.add('opacity-100');
      modalContent.classList.remove('scale-90', 'opacity-0');
      modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);

    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('opacity-100');
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-90', 'opacity-0');

    setTimeout(() => {
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }, 250);

    document.body.style.overflow = '';
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + data.length) % data.length;
    renderModal();
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % data.length;
    renderModal();
  }

  document.addEventListener('keydown', (e) => {
    if (!modal.classList.contains('hidden')) {
      if (e.key === 'ArrowLeft') showPrev();
      if (e.key === 'ArrowRight') showNext();
      if (e.key === 'Escape') closeModal();
    }
  });
</script>
