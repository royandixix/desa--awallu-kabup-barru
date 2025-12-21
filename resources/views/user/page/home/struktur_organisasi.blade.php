<div id="struktur-organisasi" class="max-w-7xl mx-auto px-6 py-12">

    <!-- Judul -->
    <div class="mb-12">
        <h2 class="text-4xl text-teal-600 font-bold mb-2">SOTK</h2>
        <p class="text-gray-700 text-lg">
            Struktur Organisasi dan Tata Kerja Desa Lawallu
        </p>
    </div>

    @php
        $anggotaFiltered = $anggota
            ->where('kategori', 'pemerintahan_desa')
            ->take(8)
            ->values();
    @endphp

    <!-- Grid Anggota (MAX 8) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @foreach ($anggotaFiltered as $index => $d)
            <div
                class="anggota-card bg-white rounded-lg shadow-md overflow-hidden transition hover:shadow-xl cursor-pointer"
                data-index="{{ $index }}"
                data-nama="{{ $d->nama }}"
                data-jabatan="{{ $d->jabatan }}"
                data-foto="{{ $d->foto ? asset($d->foto) : asset('img/default-user.png') }}"
            >
                <img src="{{ $d->foto ? asset($d->foto) : asset('img/default-user.png') }}"
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

    <div id="moda
