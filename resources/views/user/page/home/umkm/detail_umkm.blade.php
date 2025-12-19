@extends('user.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

  <div class="bg-white shadow-lg rounded-xl overflow-hidden">
    <img src="{{ asset('images/' . $umkm->foto) }}" alt="{{ $umkm->nama_usaha }}" class="w-full h-96 object-cover">

    <div class="p-8">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $umkm->nama_usaha }}</h2>
      <p class="text-lg text-gray-700 mb-6">{{ $umkm->deskripsi }}</p>

      <div class="space-y-3 text-gray-800">
        <p><span class="font-semibold">Nama Pengusaha:</span> {{ $umkm->nama_pengusaha }}</p>
        <p><span class="font-semibold">Jenis Usaha:</span> {{ $umkm->jenis_usaha }}</p>
        <p><span class="font-semibold">Alamat:</span> {{ $umkm->alamat }}</p>
        <p><span class="font-semibold">Kontak:</span> {{ $umkm->kontak }}</p>
        <p><span class="font-semibold">Kode UMKM:</span> {{ $umkm->kode_umkm }}</p>
      </div>

      <div class="mt-6">
        <a href="{{ route('umkm.index') }}" class="px-6 py-3 rounded-full bg-green-600 hover:bg-green-700 text-white font-semibold shadow-lg transition duration-300">
          Kembali ke Daftar UMKM
        </a>
      </div>
    </div>
  </div>

</div>
@endsection
