@extends('user.layouts.app')
@section('title', 'Berita Desa Lawallu')

@section('header_berita')
    @include('user.partials.navbar')
    @include('user.partials.header_berita')
@endsection

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- GRID BERITA -->
        <section class="mb-20" data-aos="fade-up" data-aos-delay="200">
            @php
                $berita = [
                    [
                        'image' => 'img/user/berita/1749805291.webp',
                        'kategori' => 'Kegiatan Desa',
                        'judul' => 'Gotong Royong Bersama Masyarakat',
                        'author' => 'Administrator',
                        'tanggal' => '2025-06-13 09:01:31',
                    ],
                    [
                        'image' => 'img/user/berita/1750163922.webp',
                        'kategori' => 'Acara Desa',
                        'judul' => 'Pelatihan Kewirausahaan untuk Pemuda',
                        'author' => 'Administrator',
                        'tanggal' => '2025-06-17 12:38:42',
                    ],
                    // ... berita lainnya
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($berita as $item)
                    @php
                        $slug = \Illuminate\Support\Str::slug($item['judul']);
                    @endphp

                    <div class="bg-white overflow-hidden border border-gray-200 hover:border-teal-500 transition-all duration-500 group cursor-pointer">
                        <!-- GAMBAR -->
                        <div class="relative overflow-hidden h-72">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['judul'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                            <!-- OVERLAY -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex flex-col justify-end p-6 opacity-90 group-hover:opacity-100 transition-all duration-500">
                                <span class="inline-block mb-2 px-3 py-1 bg-teal-500/80 text-white text-[11px] uppercase tracking-widest group-hover:bg-teal-600 transition-all">
                                    {{ $item['kategori'] }}
                                </span>

                                <!-- JUDUL -->
                                <a href="{{ route('user.berita.detail', ['slug' => $slug]) }}"
                                    class="text-white text-2xl font-semibold leading-snug line-clamp-2 transition-colors duration-300 group-hover:text-teal-400">
                                    {{ $item['judul'] }}
                                </a>
                            </div>
                        </div>

                        <!-- KONTEN -->
                        <div class="p-6">
                            <a href="{{ route('user.berita.detail', ['slug' => $slug]) }}"
                               class="flex items-center justify-between text-gray-700 border-t border-gray-200 pt-5 group-hover:text-teal-600 transition-colors duration-300">

                                <div class="flex items-center gap-4">
                                    <i class="bi bi-person-circle text-teal-600 text-3xl group-hover:text-teal-500 transition-colors duration-300"></i>
                                    <div>
                                        <p class="font-semibold text-lg text-gray-900 group-hover:text-teal-600 transition-colors duration-300">
                                            {{ $item['author'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 group-hover:text-teal-500 transition-colors duration-300">
                                            Admin Desa
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 text-gray-600 group-hover:text-teal-600 transition-colors duration-300">
                                    <i class="bi bi-calendar3 text-teal-600 text-xl group-hover:text-teal-500 transition-colors duration-300"></i>
                                    <span class="text-base font-medium">
                                        {{ \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                            </a> 
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-center mt-10 space-x-2">
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <a href="#" class="px-4 py-2 bg-teal-600 border border-teal-600 text-white font-semibold">1</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">2</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </section>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>
@endsection
