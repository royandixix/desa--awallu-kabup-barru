@extends('user.layouts.app')
@section('title', 'Detail Berita Desa Lawallu')

@section('header_berita')
    @include('user.partials.navbar')
    @include('user.partials.header_berita')
@endsection

@section('content')
    <div x-data="{ openModal: false, modalImage: '' }" class="container mx-auto px-6 py-16 max-w-6xl grid grid-cols-1 lg:grid-cols-3 gap-10">

        <!-- MAIN CONTENT -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Judul Berita -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug tracking-tight">
                {{ ucwords(str_replace('-', ' ', $slug)) }}
            </h1>

            <!-- Info Penulis & Tanggal -->
            <div class="flex flex-wrap items-center text-gray-500 text-sm md:text-base gap-3">
                <div class="flex items-center gap-1">
                    <i class="bi bi-person-circle text-teal-600 text-lg"></i>
                    <span>Dipublikasikan oleh <strong class="text-teal-600">Administrator</strong></span>
                </div>
                <span class="text-gray-400">•</span>
                <div class="flex items-center gap-1">
                    <i class="bi bi-calendar3 text-teal-600 text-lg"></i>
                    <span>{{ now()->translatedFormat('d F Y') }}</span>
                </div>
            </div>

            <!-- Gambar Utama -->
            <div class="overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:scale-105 cursor-pointer"
                @click="modalImage='{{ asset('img/user/berita/1749805291.webp') }}'; openModal=true">
                <img src="{{ asset('img/user/berita/1749805291.webp') }}" alt="Gambar Berita"
                    class="w-full h-96 object-cover">
            </div>

            <!-- Isi Berita -->
            <article class="prose prose-teal max-w-none text-gray-700 leading-relaxed space-y-6">
                <p>
                    Ini adalah halaman detail berita untuk
                    <strong>{{ ucwords(str_replace('-', ' ', $slug)) }}</strong>. Tambahkan isi berita lengkap, kegiatan,
                    dan dokumentasi agar masyarakat mudah memahami informasi.
                </p>
                <p>
                    Sertakan tanggal, lokasi, foto, dan dokumen terkait agar informasi lebih komprehensif.
                </p>
                <p>
                    Desain halaman ini responsive, nyaman dibaca, dan mendukung tipografi modern.
                </p>
            </article>

            <!-- Tombol Kembali -->
            <div class="mt-8">
                <a href="{{ route('user.berita') }}"
                    class="inline-flex items-center px-5 py-2 bg-teal-600 text-white shadow-md hover:bg-teal-500 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <i class="bi bi-arrow-left me-2 text-lg"></i>
                    Kembali ke daftar berita
                </a>
            </div>
        </div>

        <!-- Sidebar Berita Terkait -->
        <aside class="space-y-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 border-b border-gray-200 pb-2">Berita Terkait</h2>

            @for ($i = 1; $i <= 3; $i++)
                <div class="flex items-center gap-3 p-2  hover:bg-teal-50 transition-all duration-300 cursor-pointer"
                    @click="modalImage='{{ asset('img/user/berita/1749805291.webp') }}'; openModal=true">

                    <!-- Thumbnail -->
                    <div class="flex-shrink-0 w-16 h-16 overflow-hidden  shadow-sm">
                        <img src="{{ asset('img/user/berita/1749805291.webp') }}" alt="Thumbnail"
                            class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300">
                    </div>

                    <!-- Judul & Tanggal -->
                    <div class="flex-1">
                        <h3
                            class="text-gray-900 font-semibold hover:text-teal-600 transition-colors duration-300 line-clamp-2">
                            {{ ucwords(str_replace('-', ' ', $slug)) }} #{{ $i }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-1">{{ now()->translatedFormat('d M Y') }}</p>
                    </div>
                </div>
            @endfor
        </aside>


        <!-- MODAL GAMBAR -->
        <div x-show="openModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 backdrop-blur-sm"
            @keydown.escape.window="openModal=false" @click.self="openModal=false" style="display: none;">

            <div x-transition:enter="transform transition duration-300" x-transition:enter-start="scale-75 opacity-0"
                x-transition:enter-end="scale-100 opacity-100" x-transition:leave="transform transition duration-200"
                x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-75 opacity-0"
                class="relative max-w-lg w-full mx-4 rounded-md shadow-2xl overflow-hidden bg-white">

                <img :src="modalImage" alt="Preview" class="w-full h-auto object-cover">

                <!-- Tombol Close -->
                <button @click="openModal=false"
                    class="absolute top-2 right-2 text-white text-3xl font-bold hover:text-teal-400 transition-all shadow-lg p-2 rounded-full bg-black bg-opacity-60 z-50">
                    &times;
                </button>
            </div>
        </div>

    </div>
@endsection
