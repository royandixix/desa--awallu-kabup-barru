@extends('user.layouts.app')
@section('title', $laporan->judul)

@section('header_transparansi')
    @include('user.partials.navbar')
    @include('user.partials.header_transparansi', ['halaman' => 'laporan'])
@endsection

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto bg-gray-50 rounded-lg overflow-hidden shadow-sm">
            
            <!-- Header -->
            <div class="p-6 border-b bg-white">
                <h1 class="text-3xl font-bold text-gray-800">{{ $laporan->judul }}</h1>
                <p class="text-gray-500 mt-2">Tanggal: {{ \Carbon\Carbon::parse($laporan->tanggal)->format('Y-m-d') }}</p>
                @if($laporan->anggaran)
                    <p class="text-gray-500 mt-1">Anggaran: Rp. {{ number_format($laporan->anggaran, 0, ',', '.') }}</p>
                @endif
                <p class="text-gray-500 mt-1">Lokasi: {{ $laporan->lokasi }}</p>
            </div>

            <!-- Foto / Gambar -->
            @if($laporan->foto)
                <div class="h-96 bg-gray-100">
                    <img src="{{ asset('storage/' . $laporan->foto) }}" 
                         alt="{{ $laporan->judul }}"
                         class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Deskripsi / Konten -->
            <div class="p-6 bg-white">
                @if($laporan->deskripsi)
                    <p class="text-gray-700 whitespace-pre-line">{{ $laporan->deskripsi }}</p>
                @else
                    <p class="text-gray-500">Tidak ada deskripsi untuk laporan ini.</p>
                @endif
            </div>

            <!-- File / Actions -->
            @if($laporan->file_path)
                <div class="p-6 border-t flex gap-3 bg-white">
                    <!-- Lihat Berkas (PDF terbuka di browser) -->
                    <a href="{{ asset('storage/' . $laporan->file_path) }}" 
                       target="_blank"
                       class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 transition-colors duration-200">
                        <!-- Heroicon Document -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 11h10M7 15h7m-4 4h4a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Lihat Berkas
                    </a>

                    <!-- Download -->
                    <a href="{{ asset('storage/' . $laporan->file_path) }}" 
                       download
                       class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-teal-600 text-white font-semibold rounded hover:bg-teal-700 transition-colors duration-200">
                        <!-- Heroicon Download -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                        </svg>
                        Download Berkas
                    </a>
                </div>
            @endif

            <!-- Back Button -->
            <div class="p-6 border-t bg-white">
                <a href="{{ route('user.laporan.index') }}"
                   class="inline-block px-4 py-2 bg-gray-200 text-gray-800 font-semibold rounded hover:bg-gray-300 transition-colors duration-200">
                    ← Kembali ke Laporan
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
