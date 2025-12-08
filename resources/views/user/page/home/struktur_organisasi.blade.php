<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOTK Desa Lawallu</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<div class="max-w-7xl mx-auto px-6 py-12">

  <!-- Judul -->
  <div class="mb-12">
    <h2 class="text-4xl text-teal-600 font-bold mb-2">SOTK</h2>
    <p class="text-gray-700 text-lg">Struktur Organisasi dan Tata Kerja Desa Lawallu</p>
  </div>

  <!-- Grid Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(0)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_4e9e98f.jpg" 
           alt="Kepala Desa" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">JAHARUDDIN</h3>
        <p class="text-sm">Kepala Desa</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(1)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_be29e843.jpg" 
           alt="Sekretaris Desa" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">SITTI RABIAH, S.SOS</h3>
        <p class="text-sm">Sekretaris Desa</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(2)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_36256782.jpg" 
           alt="Kaur Umum" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">MARLINA YASIN</h3>
        <p class="text-sm">Kaur Umum & Tata Usaha</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(3)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.19_d3e2af6e.jpg" 
           alt="Kaur Keuangan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">EGA ENRIANI, S.A.P</h3>
        <p class="text-sm">Kaur Keuangan & Plt. Kaur Perencanaan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(4)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.39_4c05057a.jpg" 
           alt="Kasi Kesejahteraan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">WAHID SUMARTO, A.Md.Pi</h3>
        <p class="text-sm">Kasi Kesejahteraan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(5)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.19_d3e2af6e.jpg" 
           alt="Kasi Pelayanan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">ROSMINI</h3>
        <p class="text-sm">Staf Kasi Pelayanan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(6)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 21.53.22_d89c6938.jpg" 
           alt="Kasi Pemerintahan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">NIRMA'A DEWI</h3>
        <p class="text-sm">Staf Kasi Pemerintahan 1</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(7)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_062bec81.jpg" 
           alt="Kaur Pembangunan" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">JUAIRIAH</h3>
        <p class="text-sm">Kadus Lawallu</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(8)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_fd8d613f.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">HASRI, S. M</h3>
        <p class="text-sm">Kasi Pelayanan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(9)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_fb427478.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">HASNAWATI</h3>
        <p class="text-sm">Kadus Oring</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(10)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_fb2d465c.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">INDARAYANI</h3>
        <p class="text-sm">Kaur Keuangan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(11)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.19_1d4454a1.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">FITRIANI, S.E</h3>
        <p class="text-sm">Staf Kasi Kesejahteraan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(12)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.18_4baf5986.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">FITRIA WAHYUDDIN, S.Pd</h3>
        <p class="text-sm">Staf Kaur Keuangan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(13)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.18_742a3f19.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">ASWAN, S. Pd. I</h3>
        <p class="text-sm">Kaur Perencanaan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(14)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.17_ca1f646d.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">NUR HIJRAH</h3>
        <p class="text-sm">Staf Kaur Perencanaan</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(15)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 21.53.22_88f3c60a.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">ZAINAL</h3>
        <p class="text-sm">Staf Kasi Pemerintahan 2</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
      onclick="openModal(16)">
      <img src="img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_062bec81.jpg" 
           alt="Staff" class="w-full h-80 object-cover"/>
      <div class="bg-teal-500 text-white p-4 text-center">
        <h3 class="font-bold text-lg">NASMA A.Md. Pi</h3>
        <p class="text-sm">Kaur Pemerintahan</p>
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
    { nama: 'JAHARUDDIN', jabatan: 'Kepala Desa', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_4e9e98f.jpg' },
    { nama: 'SITTI RABIAH, S.SOS', jabatan: 'Sekretaris Desa', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_be29e843.jpg' },
    { nama: 'MARLINA YASIN', jabatan: 'Kaur Umum & Tata Usaha', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_36256782.jpg' },
    { nama: 'EGA ENRIANI, S.A.P', jabatan: 'Kaur Keuangan & Plt. Kaur Perencanaan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.19_d3e2af6e.jpg' },
    { nama: 'WAHID SUMARTO, A.Md.Pi', jabatan: 'Kasi Kesejahteraan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.39_4c05057a.jpg' },
    { nama: 'ROSMINI', jabatan: 'Staf Kasi Pelayanan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.19_d3e2af6e.jpg' },
    { nama: "NIRMA'A DEWI", jabatan: 'Staf Kasi Pemerintahan 1', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 21.53.22_d89c6938.jpg' },
    { nama: 'JUAIRIAH', jabatan: 'Kadus Lawallu', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_062bec81.jpg' },
    { nama: 'HASRI, S. M', jabatan: 'Kasi Pelayanan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_fd8d613f.jpg' },
    { nama: 'HASNAWATI', jabatan: 'Kadus Oring', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_fb427478.jpg' },
    { nama: 'INDARAYANI', jabatan: 'Kaur Keuangan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.37_fb2d465c.jpg' },
    { nama: 'FITRIANI, S.E', jabatan: 'Staf Kasi Kesejahteraan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.19_1d4454a1.jpg' },
    { nama: 'FITRIA WAHYUDDIN, S.Pd', jabatan: 'Staf Kaur Keuangan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.18_4baf5986.jpg' },
    { nama: 'ASWAN, S. Pd. I', jabatan: 'Kaur Perencanaan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.18_742a3f19.jpg' },
    { nama: 'NUR HIJRAH', jabatan: 'Staf Kaur Perencanaan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 10.33.17_ca1f646d.jpg' },
    { nama: 'ZAINAL', jabatan: 'Staf Kasi Pemerintahan 2', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 21.53.22_88f3c60a.jpg' },
    { nama: 'NASMA A.Md. Pi', jabatan: 'Kaur Pemerintahan', foto: 'img/DESA_LAWALLU/FOTO PERANGKAT DESA/WhatsApp Image 2025-10-27 at 11.44.38_062bec81.jpg' },
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

</body>
</html>