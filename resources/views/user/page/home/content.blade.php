@extends('user.layouts.app')

@section('title', 'desa lawallu')

@section('content')
    <div class="bg-white">
        <section class="">

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

                {{-- HEADER SECTION --}}
                <div class="mb-16 text-left max-w-3xl mx-auto">
                    <h1 class="text-5xl md:text-6xl  text-gray-900 mb-6 leading-tight">
                        Desa Lawallu, Barru
                    </h1>
                    <p class="text-gray-600 text-lg md:text-xl leading-relaxed mb-8">
                        Desa Lawallu terletak di Kecamatan Soppeng Riaja, Kabupaten Barru, Sulawesi Selatan.
                        Dikenal dengan semangat gotong royong, budaya kekeluargaan, dan keindahan alamnya,
                        Desa Lawallu terus berupaya membangun kesejahteraan bersama melalui pelayanan publik yang transparan
                        dan
                        partisipatif.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#struktur-organisasi"
                            class="inline-block border-2 border-gray-900 text-gray-900 px-8 py-3  hover:bg-gray-900 hover:text-white transition-all duration-300">
                            Lihat Struktur Organisasi
                        </a>
                        <a href="#kontak-saran"
                            class="inline-block bg-green-600 text-white px-8 py-3  hover:bg-green-700 transition-all duration-300">
                            Hubungi Kami
                        </a>
                    </div>


                </div>


                {{-- GALLERY GRID --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $galleries = [
                            [
                                'title' => 'Galeri',
                                'description' =>
                                    'Aktivitas warga desa dalam berbagai kegiatan sosial dan budaya yang memperkuat solidaritas dan kebersamaan.',
                                'icon' => 'K',
                                'image' => asset('img/user/galeri/1749784567.webp'),
                            ],
                            [
                                'title' => 'Transparansi',
                                'description' =>
                                    'Semangat kebersamaan warga Desa Lawallu dalam menjaga kebersihan lingkungan dan memperkuat hubungan sosial.',
                                'icon' => 'G',
                                'image' => asset('img/user/transparansi/Screenshot 2025-12-09 at 5.22.42 AM.png'),
                            ],
                            [
                                'title' => 'Berita',
                                'description' =>
                                    'Proses pembangunan sarana dan prasarana umum yang mendukung pertumbuhan ekonomi dan kesejahteraan warga desa.',
                                'icon' => 'P',
                                'image' => asset('img/user/berita/nWSaOHU1k0p8uuegwfRshZuveN6a6dnLOeb2CeuF.webp'),
                            ],
                            [
                                'title' => 'Struktur Organisasi',
                                'description' =>
                                    'Pusat pelayanan dan kegiatan administrasi Pemerintah Desa Lawallu yang siap melayani masyarakat dengan baik.',
                                'icon' => '+',
                                'image' => asset('img/user/struktural/struktural_pemerintahan_desa.png'),
                                'extra' =>
                                    'Struktur organisasi ini menampilkan hierarki dan pembagian tugas dari setiap bagian di Pemerintah Desa Lawallu, agar pelayanan kepada masyarakat lebih terstruktur dan efisien.',
                            ],
                        ];

                    @endphp

                    @foreach ($galleries as $gallery)
                        @if ($gallery['title'] === 'Struktur Organisasi')
                            {{-- Layout dua kolom: Card Struktur Organisasi + Duplikat Header Galeri --}}
                            <div class="col-span-1 lg:col-span-3 flex flex-col lg:flex-row gap-8 items-start">

                                {{-- Card Gambar Struktur Organisasi --}}
                                <div
                                    class="lg:w-1/2 group relative bg-white border border-gray-200 overflow-hidden hover:shadow-2xl transition-all duration-500">
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $gallery['image'] }}" alt="{{ $gallery['title'] }}"
                                            class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                                        </div>

                                        {{-- Icon --}}
                                        <div
                                            class="absolute top-6 left-6 w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-green-600  text-2xl">{{ $gallery['icon'] }}</span>
                                        </div>
                                    </div>

                                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                        <h3 class="text-3xl  mb-3">{{ $gallery['title'] }}</h3>
                                        <p class="text-gray-200 text-base mb-5 line-clamp-3">
                                            {{ $gallery['description'] }}
                                        </p>
                                        <div class="flex gap-2">
                                            <span
                                                class="text-xs bg-cyan-500 text-white px-3 py-1 rounded-full font-medium">Dokumentasi</span>
                                            <span
                                                class="text-xs bg-green-600 text-white px-3 py-1 rounded-full font-medium">Featured</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Penjelasan tentang Desa Lawallu Barru di samping --}}
                                <div class="lg:w-1/2 flex flex-col justify-center max-w-3xl mx-auto px-4">
                                    <h1 class="text-4xl md:text-5xl lg:text-6xl leading-tight mb-6 ">
                                        Tentang <span class="text-green-600">Desa Lawallu</span>
                                    </h1>

                                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6">
                                        <strong class="text-green-700">Desa Lawallu</strong> terletak di Kecamatan Soppeng
                                        Riaja, Kabupaten Barru, Sulawesi Selatan.
                                        Dikenal dengan masyarakatnya yang <span class="text-green-600 ">gotong
                                            royong</span>,
                                        lingkungan yang <span class="text-green-500 ">asri dan harmonis</span>,
                                        serta semangat tinggi dalam membangun kesejahteraan bersama.
                                        Pemerintah Desa Lawallu berkomitmen memberikan <span
                                            class="text-green-700 ">pelayanan
                                            publik yang transparan</span>,
                                        partisipatif, dan berorientasi pada kemajuan desa yang <span
                                            class="text-green-600 ">mandiri dan sejahtera.</span>
                                    </p>


                                </div>




                            </div>
                        @else
                            {{-- Layout default untuk card lain --}}
                            <div
                                class="group relative bg-white border border-gray-200 overflow-hidden hover:shadow-2xl transition-all duration-500">
                                <div class="relative overflow-hidden">
                                    <img src="{{ $gallery['image'] }}" alt="{{ $gallery['title'] }}"
                                        class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                                    </div>
                                    <div
                                        class="absolute top-6 left-6 w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-lg">
                                        <span class="text-green-600  text-2xl">{{ $gallery['icon'] }}</span>
                                    </div>
                                </div>

                                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                    <h3 class="text-3xl  mb-3">{{ $gallery['title'] }}</h3>
                                    <p class="text-gray-200 text-base mb-5 line-clamp-3">
                                        {{ $gallery['description'] }}
                                    </p>
                                    <div class="flex gap-2">
                                        <span
                                            class="text-xs bg-cyan-500 text-white px-3 py-1 rounded-full font-medium">Dokumentasi</span>
                                        <span
                                            class="text-xs bg-green-600 text-white px-3 py-1 rounded-full font-medium">Featured</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            {{-- CUSTOM STYLES --}}
            <style>
                .line-clamp-3 {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
            </style>
        </section>
        @include('user.page.home.sambutan')
        @include('user.page.home.visimisi')
        @include('user.page.home.foto_bersama_warga')
        @include('user.page.home.administrasipenduduk')
        @include('user.page.home.menelusuri_keindahan')
        @include('user.page.home.layanan_kami.layanan_kami')
        @include('user.page.home.struktur_organisasi')
        {{-- @include('user.page.home.contac') --}}
        @include('user.page.home.kontak_saran')
    </div>
@endsection
