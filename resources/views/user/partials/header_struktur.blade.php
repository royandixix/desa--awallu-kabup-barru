{{-- resources/views/user/partials/header_struktur.blade.php --}}

{{-- 🌿 Navbar --}}
@include('user.partials.navbar')

<!-- 🌅 Hero Section: Struktur Desa -->
<section
    class="relative min-h-[60vh] flex flex-col justify-center items-center text-white overflow-hidden font-sans 
           bg-gradient-to-r from-teal-900 via-emerald-800 to-emerald-700">

    {{-- Background Image & Overlay --}}
    <div class="absolute inset-0 bg-[url('/img/bg-struktur.jpg')] bg-cover bg-center opacity-25"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-teal-900/60 via-emerald-800/50 to-emerald-700/70 backdrop-blur-sm"></div>

    {{-- Hero Content --}}
    <div class="relative z-10 text-center px-6 sm:px-10 max-w-3xl" data-aos="fade-up" data-aos-duration="1200">
        {{-- Judul --}}
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-4">
            @switch($halaman)
                @case('pemerintahan_desa') Struktur Kepergurusan Pemerintah Desa @break
                @case('bpd') Badan Permusyawaratan Desa (BPD) @break
                @case('pkk') PKK Desa @break
                @case('lpm') LPM Desa @break
                @case('karang_taruna') Karang Taruna @break
                @case('posyandu') Posyandu Desa @break
                @default Struktur Desa Lawallu
            @endswitch
        </h1>

        {{-- Deskripsi --}}
        <p class="text-emerald-100/80 text-base md:text-lg leading-relaxed mb-6">
            @switch($halaman)
                @case('pemerintahan_desa') Menampilkan susunan Pemerintah Desa beserta jabatan dan tugas masing-masing. @break
                @case('bpd') Badan Permusyawaratan Desa (BPD) yang berfungsi sebagai lembaga perwakilan masyarakat. @break
                @case('pkk') Tim PKK Desa Lawallu yang mengelola kegiatan pemberdayaan keluarga. @break
                @case('lpm') Lembaga Pemberdayaan Masyarakat (LPM) yang memfasilitasi program pembangunan desa. @break
                @case('karang_taruna') Organisasi Karang Taruna untuk kegiatan sosial dan kepemudaan di desa. @break
                @case('posyandu') Posyandu Desa sebagai pusat pelayanan kesehatan ibu dan anak. @break
                @default Menyajikan data struktur organisasi desa secara lengkap dan transparan.
            @endswitch
        </p>

        {{-- Tombol scroll dinamis --}}
        <div class="flex justify-center gap-3 mt-4">
            @if($halaman == 'pemerintahan_desa')
                <a href="#pemerintahan-desa-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            @elseif($halaman == 'bpd')
                <a href="#bpd-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            @elseif($halaman == 'pkk')
                <a href="#pkk-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            @elseif($halaman == 'lpm')
                <a href="#lpm-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            @elseif($halaman == 'karang_taruna')
                <a href="#karang-taruna-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            @elseif($halaman == 'posyandu')
                <a href="#posyandu-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            @endif
        </div>
    </div>

    {{-- Breadcrumb --}}
    <div class="relative mt-6 z-10 w-full" data-aos="fade-in" data-aos-delay="400">
        <div class="container mx-auto px-4 text-sm flex flex-wrap gap-2 items-center text-emerald-100/80">
            <a href="{{ url('/') }}" class="hover:text-emerald-300 transition font-medium">Home</a>
            <span class="text-emerald-300">/</span>
            <span class="font-light text-emerald-200">Struktur Desa</span>
        </div>
    </div>
</section>

<!-- 🎨 Styles & Smooth Scroll Script -->
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<script>
    // Smooth scroll untuk semua tombol dengan class btn-scroll
    document.querySelectorAll('.btn-scroll').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            if(target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
</script>
