{{-- FILE 1: resources/views/user/struktur.blade.php --}}
@extends('user.layouts.app')

@section('title', 'struktur Anggaran')

@section('header_struktur')
    @include('user.partials.navbar')
    @include('user.partials.header_struktur')
@endsection

<div class="max-w-7xl mx-auto px-6 sm:px-12 py-20 flex flex-col lg:flex-row items-center gap-12">

    {{-- Bagian Penjelasan --}}
    <div class="lg:w-1/2 flex flex-col justify-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
            Struktur <span class="text-green-600">Pemerintahan Desa Lawallu</span>
        </h1>

        <p class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-6">
            Pemerintah <span class="text-green-700 font-semibold">Desa Lawallu</span> merupakan lembaga yang bertugas mengatur dan mengurus kepentingan masyarakat di tingkat desa.
            Dengan semangat <span class="text-green-600 font-semibold">gotong royong</span> dan prinsip <span class="text-green-600 font-semibold">struktur</span>,
            pemerintahan desa berkomitmen memberikan pelayanan terbaik kepada seluruh warga masyarakat.
        </p>

        <p class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-8">
            Struktur organisasi berikut menampilkan susunan kepala desa, sekretaris desa, kepala urusan, dan kepala dusun yang bekerja sama untuk menciptakan desa yang
            <span class="text-green-700 font-semibold">maju, mandiri, dan sejahtera.</span>
        </p>

        <div class="flex flex-wrap gap-4">
            <a href="#struktur-organisasi"
               class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md font-semibold transition-all duration-300">
               Lihat Struktur Lengkap
            </a>
            <a href="#kontak-saran"
               class="border border-green-700 text-green-700 hover:bg-green-700 hover:text-white px-6 py-3 rounded-md font-semibold transition-all duration-300">
               Hubungi Kami
            </a>
        </div>
    </div>

    {{-- Bagian Gambar Struktur --}}
    <div class="lg:w-1/2 flex justify-center">
        <img src="{{ asset('img/user/struktur-pemerintahan.png') }}" 
             alt="Struktur Pemerintahan Desa Lawallu"
             class="w-full max-w-md rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-500">
    </div>

</div>

{{-- Tambahkan Bagian Diagram Struktur (Opsional) --}}
<div id="struktur-organisasi" class="max-w-5xl mx-auto px-6 sm:px-12 py-12">
    <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-10">
        Susunan Organisasi Pemerintah Desa
    </h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 text-center">
        <div class="p-6 border rounded-lg shadow-sm">
            <h3 class="text-green-700 font-semibold text-xl mb-2">Kepala Desa</h3>
            <p class="text-gray-700">H. Mappasoro</p>
        </div>
        <div class="p-6 border rounded-lg shadow-sm">
            <h3 class="text-green-700 font-semibold text-xl mb-2">Sekretaris Desa</h3>
            <p class="text-gray-700">Andi Nurul Hidayah</p>
        </div>
        <div class="p-6 border rounded-lg shadow-sm">
            <h3 class="text-green-700 font-semibold text-xl mb-2">Kaur Keuangan</h3>
            <p class="text-gray-700">Muh. Ardiansyah</p>
        </div>
        <div class="p-6 border rounded-lg shadow-sm">
            <h3 class="text-green-700 font-semibold text-xl mb-2">Kaur Umum</h3>
            <p class="text-gray-700">Fitriani</p>
        </div>
        <div class="p-6 border rounded-lg shadow-sm">
            <h3 class="text-green-700 font-semibold text-xl mb-2">Kasi Pemerintahan</h3>
            <p class="text-gray-700">Basri</p>
        </div>
        <div class="p-6 border rounded-lg shadow-sm">
            <h3 class="text-green-700 font-semibold text-xl mb-2">Kepala Dusun I</h3>
            <p class="text-gray-700">Rudiansyah</p>
        </div>
    </div>
</div>
