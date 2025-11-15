@extends('user.layouts.app')
@section('title', 'Struktur PKK')

@section('header_struktural')
    @include('user.partials.navbar')
    @include('user.partials.header_struktur')
@endsection

@section('content')
<div class="bg-gray-50 py-16 text-[18px]" x-data="{ tahun: '2025' }">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center">Struktur PKK Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah struktur organisasi Tim Penggerak PKK Desa Lawallu.
        </p>

        <!-- GAMBAR STRUKTUR -->
        <img src="{{ asset('img/user/struktural/SOTK%20PKK.drawio.png') }}"
             alt="Struktur PKK Desa"
             class="w-full h-auto mb-14" />

        <!-- PAGINATION (opsional, sama seperti BPD) -->
        <div class="flex justify-center mt-10 space-x-2">
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">&laquo;</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">1</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">2</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">3</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">&raquo;</a>
        </div>

    </div>
</div>
@endsection
