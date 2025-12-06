@extends('admin.layouts.app')
@section('title', 'Detail Pengaduan')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Detail Pengaduan</h1>

    <div class="mb-4">
        <strong>Nama:</strong> {{ $pengaduan->nama }}
    </div>
    <div class="mb-4">
        <strong>No HP:</strong> {{ $pengaduan->no_hp }}
    </div>
    <div class="mb-4">
        <strong>Kategori:</strong> {{ $pengaduan->kategori }}
    </div>
    <div class="mb-4">
        <strong>Pesan:</strong> {{ $pengaduan->pesan }}
    </div>
    <div class="mb-4">
        <strong>Foto:</strong>
        @if($pengaduan->foto)
            <img src="{{ asset($pengaduan->foto) }}" alt="foto" class="w-64 h-64 object-cover rounded mt-2">
        @else
            Tidak ada foto
        @endif
    </div>
    <div class="mb-4">
        <strong>Status:</strong> {{ ucfirst($pengaduan->status) }}
    </div>

    <a href="{{ route('admin.pengaduan.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Kembali</a>
</div>
@endsection
