<div id="struktur-organisasi" class="max-w-7xl mx-auto px-6 py-12">

    <!-- Judul -->
    <div class="mb-12">
        <h2 class="text-4xl text-teal-600 font-bold mb-2">SOTK</h2>
        <p class="text-gray-700 text-lg">
            Struktur Organisasi dan Tata Kerja Desa Lawallu
        </p>
    </div>

    @php
        // FILTER: hanya anggota + BATASI 8 DATA
        $anggotaFiltered = $anggota
            ->where('kategori', 'pemerintahan_desa')
            ->take(8)
            ->values();
    @endphp

    <!-- Grid Anggota (MAX 8) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @foreach ($anggotaFiltered as $index => $d)
            <div onclick="openModal({{ $index }})"
                class="bg-white rounded-lg shadow-md overflow-hidden transition hover:shadow-xl cursor-pointer">

                <img src="{{ $d->foto ? asset('storage/'.$d->foto) : asset('img/default-user.png') }}"
                    alt="{{ $d->nama }}"
                    class="w-full h-80 object-cover">

                <div class="bg-teal-500 text-white p-4 text-center">
                    <h3 class="font-bold text-lg">{{ $d->nama }}</h3>
                    <p class="text-sm">{{ $d->jabatan }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('user.struktur.pemerintahan_desa') }}"
        class="mt-3 px-4 py-2 bg-white text-teal-600 font-semibold rounded-full hover:bg-gray-100 transition inline-block">
        Lihat Selengkapnya
    </a>
</div>

<!-- MODAL -->
<div id="modal"
    class="hidden fixed inset-0 z-50 items-center justify-center p-4 opacity-0 transition-opacity duration-300">

    <div class="fixed inset-0 bg-black/70" onclick="closeModal()"></div>

    <div id="modalContent"
        class="relative bg-white rounded-xl max-w-2xl w-full shadow-2xl transform transition-all duration-300 scale-90 opacity-0">

        <button onclick="closeModal()"
            class="absolute top-3 right-3 bg-red-600 text-white rounded-full w-10 h-10 hover:bg-red-700 text-xl z-10">
            ×
        </button>

        <img id="modalImg" class="w-full h-96 object-cover rounded-t-xl">

        <div class="p-6 text-center">
            <h3 id="modalNama" class="text-2xl font-bold text-gray-800 mb-2"></h3>
            <p id="modalJabatan" class="text-gray-600"></p>
        </div>

        <div class="flex justify-between p-4 border-t">
            <button onclick="showPrev()"
                class="bg-teal-600 text-white px-4 py-2 rounded-lg">‹ Prev</button>

            <span id="counter" class="font-semibold text-gray-600"></span>

            <button onclick="showNext()"
                class="bg-teal-600 text-white px-4 py-2 rounded-lg">Next ›</button>
        </div>
    </div>
</div>

<script>
    // DATA SUDAH DIFILTER & DIBATASI 8
    const data = @json($anggotaFiltered);

    let currentIndex = 0;

    const modal = document.getElementById('modal');
    const modalContent = document.getElementById('modalContent');
    const modalImg = document.getElementById('modalImg');
    const modalNama = document.getElementById('modalNama');
    const modalJabatan = document.getElementById('modalJabatan');
    const counter = document.getElementById('counter');

    function renderModal() {
        const item = data[currentIndex];
        modalImg.src = item.foto ? '/storage/' + item.foto : '/img/default-user.png';
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
        }, 10);

        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('opacity-100');
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
</script>
