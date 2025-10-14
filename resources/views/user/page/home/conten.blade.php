@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="bg-gradient-to-br from-green-600 to-green-700 min-h-screen flex flex-col justify-center py-14 sm:py-16 md:py-20 overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center">

        {{-- Hero Section Atas --}}
        <div class="mb-16 sm:mb-20 md:mb-24 fade-up">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-white font-semibold text-lg sm:text-xl uppercase tracking-wide mb-4">
                    Informasi Publik Kabupaten Barru
                </h2>

                <h1 class="text-white text-3xl sm:text-5xl md:text-6xl  tracking-tight drop-shadow-xl mb-6">
                    Mewujudkan Pemerintahan yang Terbuka, Responsif, dan Melayani
                </h1>

                <p class="text-white text-base sm:text-lg md:text-xl drop-shadow-sm leading-relaxed max-w-4xl mx-auto">
                    Melalui komitmen terhadap transparansi dan akuntabilitas, Pemerintah Kabupaten Barru 
                    menghadirkan berbagai informasi publik secara terbuka untuk seluruh masyarakat. 
                    Akses galeri kegiatan, laporan pembangunan, struktur organisasi, serta berita terbaru 
                    dengan mudah dan cepat.
                </p>
            </div>
        </div>

        

        {{-- Wrapper Gambar dan Card --}}
        <div class="flex flex-col lg:flex-row items-start justify-between gap-12 sm:gap-16 lg:gap-24">

            {{-- Bagian Gambar di Kiri --}}
            <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start fade-left">
                <div class="relative w-full sm:w-[500px] md:w-[560px] rounded-3xl overflow-hidden shadow-2xl">
                    <img 
                        src="{{ asset('img/user/kantor-bupati-barru_169.jpeg') }}" 
                        alt="Kantor Bupati Barru"
                        class="w-full h-auto object-cover hover:scale-105 transition-transform duration-700 ease-out"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>

                <div class="mt-6 sm:mt-8 text-white max-w-md text-center lg:text-left">
                    <h3 class="text-2xl font-bold mb-3">Kabupaten Barru</h3>
                    <p class="text-base leading-relaxed text-gray-100">
                        Kabupaten Barru terletak di Provinsi Sulawesi Selatan dan dikenal dengan pesona alam 
                        pesisirnya, masyarakat yang ramah, serta semangat pembangunan yang berkelanjutan. 
                        Pemerintah Kabupaten Barru berkomitmen untuk terus meningkatkan transparansi, 
                        partisipasi publik, dan pelayanan yang profesional.
                    </p>
                </div>
            </div>

            {{-- Bagian Card di Kanan --}}
            @php
                $fitur = [
                    [
                        'judul' => 'Galeri',
                        'warna' => 'bg-teal-600',
                        'ikon' => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>',
                    ],
                    [
                        'judul' => 'Transparansi',
                        'warna' => 'bg-teal-600',
                        'ikon' => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',
                    ],
                    [
                        'judul' => 'Berita',
                        'warna' => 'bg-teal-600',
                        'ikon' => '<rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>',
                    ],
                    [
                        'judul' => 'Struktur Organisasi',
                        'warna' => 'bg-teal-600',
                        'ikon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                    ],
                ];
            @endphp

            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end fade-right">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-8 w-full max-w-[580px]">
                    @foreach ($fitur as $f)
                        <div class="group bg-teal-600 rounded-2xl shadow-lg p-8 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl flex flex-col items-center justify-center min-h-[200px]">
                            
                            <div class="flex items-center justify-center mb-4">
                                <svg class="h-20 w-20 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    {!! $f['ikon'] !!}
                                </svg>
                            </div>

                            <h3 class="text-white text-2xl font-bold">
                                {{ $f['judul'] }}
                            </h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Hero Section --}}
        <div class="mt-24 sm:mt-32 md:mt-40 lg:mt-52 pb-16 sm:pb-20 md:pb-24 fade-up">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center gap-8 sm:gap-12">
                <div class="flex-1 text-left">
                    <h2 class="text-white font-semibold text-lg sm:text-xl uppercase tracking-wide">
                        Informasi Publik Kabupaten Barru
                    </h2>

                    <h1 class="mt-4 text-white text-3xl sm:text-5xl md:text-6xl  tracking-tight drop-shadow-xl">
                        Mewujudkan Pemerintahan yang Terbuka, Responsif, dan Melayani
                    </h1>

                    <p class="mt-5 sm:mt-7 text-white text-base sm:text-lg md:text-xl drop-shadow-sm leading-relaxed">
                        Melalui komitmen terhadap transparansi dan akuntabilitas, Pemerintah Kabupaten Barru 
                        menghadirkan berbagai informasi publik secara terbuka untuk seluruh masyarakat. 
                        Akses galeri kegiatan, laporan pembangunan, struktur organisasi, serta berita terbaru 
                        dengan mudah dan cepat.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Style + Scroll Animation --}}
    <style>
        @keyframes fadeUp {0%{opacity:0;transform:translateY(40px);}100%{opacity:1;transform:translateY(0);}}
        @keyframes fadeLeft {0%{opacity:0;transform:translateX(-60px);}100%{opacity:1;transform:translateX(0);}}
        @keyframes fadeRight {0%{opacity:0;transform:translateX(60px);}100%{opacity:1;transform:translateX(0);}}
        .fade-up,.fade-left,.fade-right{opacity:0;transition:all 1s ease-out;}
        .show.fade-up{animation:fadeUp 1.1s ease-out forwards;}
        .show.fade-left{animation:fadeLeft 1.1s ease-out forwards;}
        .show.fade-right{animation:fadeRight 1.1s ease-out forwards;}
    </style>

    <script>
        document.addEventListener("DOMContentLoaded",()=>{
            const observer=new IntersectionObserver(entries=>{
                entries.forEach(entry=>{
                    if(entry.isIntersecting){
                        entry.target.classList.add("show");
                        observer.unobserve(entry.target);
                    }
                });
            },{threshold:0.2});
            document.querySelectorAll('.fade-up,.fade-left,.fade-right').forEach(el=>observer.observe(el));
        });
    </script>
</section>
@endsection

@section('sambutan')
    @include('user.page.home.sambutan')
@endsection

@section('visimisi')
    @include('user.page.home.visimisi')
@endsection

@section('administrasipenduduk')
    @include('user.page.home.administrasipenduduk')
@endsection

@section('foto_bersama_warga')
    @include('user.page.home.foto_bersama_warga')
@endsection