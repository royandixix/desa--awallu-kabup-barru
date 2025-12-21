<style>
    /* 🌿 Animasi scroll masuk */
    [data-animate] {
        opacity: 0;
        transform: translateY(40px) scale(0.98);
        transition: all 1s ease-out;
    }

    [data-animate].visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* ✨ Efek tombol berkilau */
    .btn-glow {
        position: relative;
        overflow: hidden;
    }

    .btn-glow::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: 0.6s;
    }

    .btn-glow:hover::after {
        left: 100%;
    }
</style>


<div class="bg-white">
    <div
        class="max-w-7xl mx-auto min-h-screen flex flex-col lg:flex-row items-center justify-between
              px-6 sm:px-16 pt-40 sm:pt-24 pb-16 sm:pb-24 gap-8 sm:gap-16">

        <!-- Sidebar -->
        <div class="hidden lg:block w-2 h-48 bg-gradient-to-b from-green-700 to-green-400 rounded" data-animate>
        </div>

        <!-- Konten Teks -->
        <div class="flex-1 w-full lg:max-w-2xl flex flex-col" data-animate>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 sm:mb-8">
                Selamat Datang di Website Resmi<br>
                <span class="text-green-600">Desa Lawallu Kabupaten Barru</span>
            </h1>

            <!-- Gambar mobile -->
            <div class="relative shadow-3xl p-2 sm:p-4 flex flex-col items-center justify-center mb-6 lg:hidden"
                data-animate>
                <img src="<?php echo e(asset('img/user/lawalu.jpeg')); ?>" alt="Desa Lawallu"
                    class="w-full h-auto shadow-xl object-cover" />
            </div>

            <p class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-8 sm:mb-10" data-animate>
                Portal informasi dan pelayanan publik <strong>Desa Lawallu</strong>. Website ini hadir sebagai media
                transparansi, komunikasi, dan layanan administrasi bagi masyarakat. Mari bersama membangun desa yang
                <span class="text-green-700">maju, mandiri, dan sejahtera.</span>
            </p>

            <div class="flex flex-wrap gap-4 sm:gap-6 mb-8 sm:mb-12" data-animate>
                <a href="#"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 sm:px-8 py-3 sm:py-4 text-base sm:text-lg shadow-md transition btn-glow">
                    Layanan Desa
                </a>
                <a href="#"
                    class="bg-white hover:bg-gray-100 text-gray-800 px-6 sm:px-8 py-3 sm:py-4 text-base sm:text-lg shadow-md transition">
                    Informasi Lengkap
                </a>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 text-gray-600 font-mono text-base sm:text-lg" data-animate>
                <span>Desa Lawallu, Kecamatan Barru, Kabupaten Barru</span>
            </div>
        </div>

        <!-- Gambar desktop -->
        <div class="flex-1 w-full lg:max-w-md hidden lg:flex justify-center items-center" data-animate>
            <div class="relative shadow-3xl p-2 sm:p-4 flex flex-col items-center justify-center">
                <img src="<?php echo e(asset('img/user/lawalu.jpeg')); ?>" alt="Desa Lawallu"
                    class="w-full h-auto object-cover shadow-2xl transition-transform duration-500" />
            </div>
        </div>
    </div>

    <!-- ⚙️ Script Animasi Scroll -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const elements = document.querySelectorAll('[data-animate]');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });

            elements.forEach(el => observer.observe(el));
        });
    </script>
</div>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/partials/header2.blade.php ENDPATH**/ ?>