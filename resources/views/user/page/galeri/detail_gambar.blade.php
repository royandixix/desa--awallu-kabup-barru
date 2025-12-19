@extends('user.layouts.app')

@section('title', 'Detail Gambar - ' . $galeri->judul)

{{-- Header khusus halaman detail gambar --}}
@section('header_detail_gambar')
    @include('user.partials.navbar')
    @include('user.partials.header_detail_gambar')
@endsection

@section('content')

    {{-- Hero Gambar --}}
    <section class="bg-gray-50 pt-16">
        <div class="container mx-auto px-6 md:px-10 lg:px-16">
            <div class="w-full overflow-hidden">
                <img src="{{ asset('uploads/galeri/' . $galeri->file) }}" alt="{{ $galeri->judul }}"
                    class="w-full h-[680px] md:h-[720px] lg:h-[800px] object-cover object-center">
            </div>
            <div class="text-center mt-6">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-700">{{ $galeri->judul }}</h1>
                <p class="mt-2 text-gray-600 text-lg md:text-xl">{{ $galeri->desc ?? '-' }}</p>
            </div>
        </div>
    </section>

    {{-- Konten & Sidebar --}}
    <section class="bg-gray-50">
        <div class="container mx-auto px-6 md:px-10 lg:px-16 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12 text-gray-800 leading-relaxed">

            <!-- Kolom Kiri -->
            <div class="lg:col-span-2 space-y-8">
                <h2 class="text-3xl font-bold text-green-700 mb-4">Detail Kegiatan</h2>
                <p>{{ $galeri->desc ?? 'Tidak ada deskripsi.' }}</p>
                <p>Lokasi: {{ $galeri->lokasi ?? '-' }}</p>
            
            </div>

            <!-- Sidebar Kanan -->
            <aside class="space-y-6 text-sm text-gray-700">
                <h3 class="text-xl font-bold text-green-700 mb-2">Informasi Gambar</h3>
                <ul class="space-y-1">
                    <li><strong>Lokasi:</strong> {{ $galeri->lokasi ?? '-' }}</li>
                    <li><strong>Kategori:</strong> {{ $galeri->kategori ?? '-' }}</li>
                    <li><strong>Tanggal:</strong> {{ $galeri->tanggal?->format('Y-m-d H:i:s') ?? '-' }}</li>
                </ul>
            </aside>

        </div>
    </section>

@endsection
