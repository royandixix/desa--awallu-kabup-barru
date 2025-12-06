@extends('user.layouts.app')
@section('title', $berita->judul)

@section('header_berita')
    @include('user.partials.navbar')
    @include('user.partials.header_berita')
@endsection

@section('content')
<div class="container mx-auto px-6 py-16 max-w-6xl grid grid-cols-1 lg:grid-cols-3 gap-10">

    <!-- MAIN CONTENT -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Judul Berita -->
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug tracking-tight">
            {{ $berita->judul }}
        </h1>

        <!-- Info Penulis & Tanggal -->
        <div class="flex flex-wrap items-center text-gray-500 text-sm md:text-base gap-3">
            <div class="flex items-center gap-1">
                <i class="bi bi-person-circle text-teal-600 text-lg"></i>
                <span>Dipublikasikan oleh <strong class="text-teal-600">{{ $berita->author ?? 'Administrator' }}</strong></span>
            </div>
            <span class="text-gray-400">•</span>
            <div class="flex items-center gap-1">
                <i class="bi bi-calendar3 text-teal-600 text-lg"></i>
                <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
            </div>
        </div>

        <!-- Gambar Utama -->
        @if($berita->image_url)
        <div class="overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:scale-105 cursor-pointer">
            <img src="{{ $berita->image_url }}" alt="Gambar Berita" class="w-full h-96 object-cover">
        </div>
        @endif

        <!-- Isi Berita -->
        <article class="prose prose-teal max-w-none text-gray-700 leading-relaxed space-y-6">
            {!! nl2br(e($berita->konten)) !!}
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

        @foreach ($relatedBerita as $item)
            <div class="flex items-center gap-3 p-2 hover:bg-teal-50 transition-all duration-300 cursor-pointer">
                <div class="flex-shrink-0 w-16 h-16 overflow-hidden shadow-sm">
                    <img src="{{ $item->image_url }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300">
                </div>
                <div class="flex-1">
                    <h3 class="text-gray-900 font-semibold hover:text-teal-600 transition-colors duration-300 line-clamp-2">
                        <a href="{{ route('user.berita.detail', $item->slug) }}">{{ $item->judul }}</a>
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">{{ $item->created_at->translatedFormat('d M Y') }}</p>
                </div>
            </div>
        @endforeach
    </aside>
</div>
@endsection
