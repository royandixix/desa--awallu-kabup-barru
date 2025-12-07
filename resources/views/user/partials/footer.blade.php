<footer id="kontak" data-animate
    class="bg-gradient-to-br from-green-700 via-green-800 to-green-900 text-white py-14 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 items-start">

        <!-- Kolom 1: Desa Lawallu -->
        <div class="flex flex-col text-left">
            <h3 class="text-xl font-semibold mb-5 border-b border-yellow-400 inline-block pb-1">Desa Lawallu</h3>
            <div class="flex items-center gap-4 mb-3">
                <img src="{{ asset('img/user/logo/barru.webp') }}" alt="Logo Barru"
                    class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 object-contain rounded-full shadow-lg ring-4 ring-green-600/40">
                <p class="text-base sm:text-lg font-medium text-green-200">Kabupaten Barru</p>
            </div>
            <p class="text-gray-200 text-base sm:text-lg leading-relaxed mb-4">
                <span class="font-semibold text-white">Desa Lawallu</span> adalah desa yang terletak di Kecamatan Barru,
                Kabupaten Barru, Sulawesi Selatan.
            </p>
            <!-- Media Sosial -->
            <div class="flex items-center gap-4 mt-auto">
                <a href="#"
                    class="bg-green-600 hover:bg-yellow-400 text-white hover:text-green-900 p-2 rounded-full transition duration-300">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="bg-green-600 hover:bg-yellow-400 text-white hover:text-green-900 p-2 rounded-full transition duration-300">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#"
                    class="bg-green-600 hover:bg-yellow-400 text-white hover:text-green-900 p-2 rounded-full transition duration-300">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
        </div>

        <!-- Kolom 2: Akses Cepat -->
        <div class="flex flex-col text-left">
            <h3 class="text-xl font-semibold mb-5 border-b border-yellow-400 inline-block pb-1">Akses Cepat</h3>
            <ul class="space-y-2 text-gray-100 text-base">
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Profil Desa</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Galeri</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Transparansi</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Berita</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Struktur</a></li>
            </ul>
        </div>

        <!-- Kolom 3: Layanan Kami -->
        <div class="flex flex-col text-left">
            <h3 class="text-xl font-semibold mb-5 border-b border-yellow-400 inline-block pb-1">Layanan Kami</h3>
            <ul class="space-y-2 text-gray-100 text-base">
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Bagian Pemerintahan</a>
                </li>
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Bagian Pelayanan</a>
                </li>
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Layanan Kesra</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition-all duration-300">Pelayanan Kesehatan &
                        Posyandu</a></li>
            </ul>
        </div>

        <!-- Kolom 4: Alamat -->
        <div class="flex flex-col text-left">
            <h3 class="text-xl font-semibold mb-5 border-b border-yellow-400 inline-block pb-1">Alamat</h3>
            <p class="text-gray-100 text-base leading-relaxed mb-2">
                Desa Lawallu<br>
                Kecamatan Soppeng Riaja<br>
                Kabupaten Barru<br>
                Sulawesi Selatan, ID 90752
            </p>
            <div class="space-y-1 text-base mt-auto">
                <p><span class="font-semibold">Hotline:</span> +62 853-4215-7609</p>
                <p><span class="font-semibold">Email:</span> desaLawallu123@gmail.com</p>
            </div>
        </div>

    </div>

    <!-- Garis bawah -->
    <div
        class="border-t border-green-600 mt-12 pt-5 flex flex-col sm:flex-row items-center justify-between text-sm text-gray-300 gap-3">
        <p>© 2025 KKN TEMATIK UNIVERSITAS DIPA MAKASSAR — All Rights Reserved</p>
        <p>Kunjungan Hari Ini: <span class="font-semibold text-white">17</span></p>
    </div>
</footer>

<script src="https://kit.fontawesome.com/a2b5d6b2cd.js" crossorigin="anonymous"></script>

<!-- Animasi scroll global (pakai data-animate) -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const elements = document.querySelectorAll('[data-animate]');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.2
        });

        elements.forEach(el => observer.observe(el));
    });
</script>

<style>
    [data-animate] {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.9s ease-out;
    }

    [data-animate].visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>
