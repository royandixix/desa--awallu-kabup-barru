<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Semua UMKM Desa</h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto px-4">
            Jelajahi semua produk UMKM yang tersedia di desa kami. Pilih produk favoritmu dan dukung ekonomi lokal!
        </p>
    </div>

    <!-- Grid Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-16">
        @foreach ($umkms as $index => $umkm)
            <a href="{{ route('user.umkm.detail', ['id' => $umkm->id]) }}"
                class="pilar-card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 opacity-0 translate-y-8 group cursor-pointer border border-gray-100 block"
                style="animation-delay: {{ $index * 50 }}ms">
                <div class="relative">
                    <img src="{{ asset('images/' . $umkm->foto) }}" alt="{{ $umkm->nama_usaha }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="p-6 bg-gray-50">
                        <h3 class="text-2xl font-bold mb-2 text-gray-900">{{ $umkm->nama_usaha }}</h3>
                        <p class="text-gray-700 font-semibold mb-4">
                            Rp{{ number_format($umkm->harga ?? 0, 0, ',', '.') }}
                        </p>
                        <span
                            class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full font-medium">UMKM
                            Desa</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $umkms->links() }}
    </div>
</div>
