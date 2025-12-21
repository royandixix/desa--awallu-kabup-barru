@extends('admin.layouts.app')

@section('title', $umkm->nama_usaha)

@section('content')
<div class="container max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <h1 class="text-3xl font-bold mb-6">{{ $umkm->nama_usaha }}</h1>

    <div class="bg-white rounded-lg shadow-md p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Foto Usaha --}}
        <div>
            @if($umkm->foto)
                <img src="{{ asset('uploads/' . $umkm->foto) }}" alt="{{ $umkm->nama_usaha }}" class="w-full h-80 object-cover rounded shadow-md">
            @else
                <div class="w-full h-80 flex items-center justify-center bg-gray-100 text-gray-400 rounded shadow-md">
                    Tidak ada gambar
                </div>
            @endif
        </div>

        {{-- Info UMKM --}}
        <div class="space-y-3">
            <p><span class="font-semibold">Nama Pengusaha:</span> {{ $umkm->nama_pengusaha ?? 'Ibu Marwah' }}</p>
            <p><span class="font-semibold">Jenis Usaha:</span> {{ $umkm->jenis_usaha ?? 'Jagung Rebus' }}</p>
            <p><span class="font-semibold">Deskripsi Usaha:</span> {{ $umkm->deskripsi ?? 'Menyediakan Jagung bahan berkualitas dan harga terjangkau.' }}</p>
            <p><span class="font-semibold">Alamat:</span> {{ $umkm->alamat ?? 'Dusun Oring Desa Lawallu, Kecamatan Barru' }}</p>
            <p><span class="font-semibold">Kontak:</span> {{ $umkm->kontak ?? '082291328385 (WhatsApp)' }}</p>
            <p><span class="font-semibold">Kode UMKM:</span> {{ $umkm->kode_umkm ?? 'UMKM-003 OR1NG' }}</p>
        </div>

    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-6">
        <a href="{{ route('admin.umkm.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Kembali</a>
    </div>
</div>
@endsection
