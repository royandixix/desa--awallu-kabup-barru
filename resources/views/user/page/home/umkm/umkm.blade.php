<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Header -->
    <div class="text-center mb-12 opacity-0 translate-y-6" id="header-section">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Beli Dari Desa</h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto px-4">
            Layanan yang disediakan untuk promosi produk UMKM Desa sehingga mampu meningkatkan perekonomian masyarakat
            Desa.
        </p>
    </div>

    <!-- Grid Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        @foreach ($umkms as $index => $umkm)
            <a href="{{ route('user.umkm.detail', ['id' => $umkm->id]) }}"
                class="pilar-card overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 opacity-0 translate-y-8 group cursor-pointer block"
                style="animation-delay: {{ $index * 100 }}ms">
                <div class="relative">
                    <img src="{{ $umkm->foto ? asset('storage/' . $umkm->foto) : asset('images/default.png') }}"
                        alt="{{ $umkm->nama_usaha }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="p-6 bg-transparent">
                        <h3 class="text-2xl font-bold mb-2 text-gray-900 truncate">{{ $umkm->nama_usaha }}</h3>
                        @if (isset($umkm->harga))
                            <p class="text-gray-700 font-semibold mb-4">
                                Rp{{ number_format($umkm->harga, 0, ',', '.') }}
                            </p>
                        @endif
                        <span
                            class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 font-medium">
                            UMKM Desa
                        </span>
                    </div>
                </div>
            </a>
        @endforeach

        @if ($umkms->isEmpty())
            <p class="col-span-1 sm:col-span-2 md:col-span-3 text-center text-gray-500 mt-8">
                Belum ada UMKM tersedia
            </p>
        @endif
    </div>

    <!-- Lihat Selengkapnya -->
    <div class="text-center mt-6">
        <a href="{{ route('user.umkm.umkm_selengkap_nyh') }}"
           class="inline-block px-6 py-3 rounded-full bg-green-600 hover:bg-green-700 text-white font-semibold shadow-lg transition duration-300">
           Lihat Selengkapnya
        </a>
    </div>
</div>

<!-- 🌈 STYLE -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .pilar-card {
        opacity: 0;
        transform: translateY(20px);
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
</style>

<!-- ⚙️ SCRIPT ANIMASI -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const header = document.getElementById('header-section');
        if (header) observer.observe(header);

        const pilarCards = document.querySelectorAll('.pilar-card');
        pilarCards.forEach((card, index) => setTimeout(() => observer.observe(card), index * 100));
    });
</script>
