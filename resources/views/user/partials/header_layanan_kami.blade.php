{{-- Navbar --}}
@include('user.partials.navbar')

<!-- Hero Section Layanan Kami -->
<section class="relative min-h-[60vh] flex flex-col justify-center items-center text-white overflow-hidden font-sans bg-gradient-to-r from-teal-900 via-emerald-800 to-emerald-700">
    
    <!-- Background -->
    <div class="absolute inset-0 bg-[url('/img/bg-layanan.jpg')] bg-cover bg-center opacity-25"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-teal-900/60 via-emerald-800/50 to-emerald-700/70 backdrop-blur-sm"></div>

    <!-- Konten -->
    <div class="relative z-10 text-center px-6 sm:px-10 max-w-3xl" data-aos="fade-up" data-aos-duration="1200">

        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-4 
            bg-clip-text text-transparent bg-gradient-to-r from-lime-300 via-lime-400 to-lime-500">

            @switch($halaman)
                @case('pemerintahan')
                    Bagian Pemerintahan
                    @break

                @case('pelayanan')
                    Bagian Pelayanan
                    @break

                @case('kesra')
                    Bagian Kesra
                    @break

                @case('bansos')
                    Informasi & Bantuan Sosial
                    @break

                @case('kesehatan')
                    Pelayanan Kesehatan & Posyandu
                    @break

                @case('aspirasi')
                    Layanan Aspirasi & Pengaduan
                    @break

                @default
                    Layanan Desa Batupute
            @endswitch
        </h1>

        <p class="text-lime-100/90 text-base md:text-lg leading-relaxed mb-6">
            @switch($halaman)
                @case('pemerintahan')
                    KTP, KK, Akta Kelahiran, Akta Kematian, Surat Pindah, dan Pertanahan.
                    @break

                @case('pelayanan')
                    SKTM, Pengantar Nikah, Izin Keramaian, Pengantar BBM, dan administrasi lainnya.
                    @break

                @case('kesra')
                    Pengelolaan kegiatan sosial, keagamaan, dan kemasyarakatan di desa.
                    @break

                @case('bansos')
                    Pengajuan bantuan seperti BLT, PKH, dan informasi bantuan sosial lainnya.
                    @break

                @case('kesehatan')
                    Layanan pemeriksaan kesehatan dan jadwal posyandu rutin.
                    @break

                @case('aspirasi')
                    Sampaikan aspirasi, saran, atau keluhan Anda kepada pemerintah desa.
                    @break

                @default
                    Layanan yang tersedia di Desa Batupute.
            @endswitch
        </p>

        <a href="#konten" 
           class="inline-block mt-2 px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300"
           data-aos="zoom-in" data-aos-delay="200">
            Lihat Detail
        </a>

    </div>

    <!-- Breadcrumb -->
    <div class="relative mt-6 z-10 w-full">
        <div class="container mx-auto px-4 text-sm flex flex-wrap gap-2 items-center text-lime-100/80">
            <a href="{{ url('/') }}" class="hover:text-lime-300 transition font-medium">Home</a>
            <span class="text-lime-300">/</span>
            <span class="font-light text-lime-200">Layanan Desa</span>
        </div>
    </div>
</section>
