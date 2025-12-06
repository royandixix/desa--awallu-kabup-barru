@extends('user.layouts.app')

@section('title', 'Struktural Karang Taruna')

{{-- Header khusus Karang Taruna --}}
@section('header_struktur')
    @include('user.partials.header_struktur', ['halaman' => 'karang_taruna'])
@endsection

@section('content')
<!-- Tambahkan ID agar tombol scroll bisa target -->
<section id="karang-taruna-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktural Karang Taruna Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah struktur organisasi Karang Taruna Desa Lawallu.
        </p>

        <!-- FOTO BESAR FULL-WIDTH -->
        @forelse($karangTarunas ?? [] as $item)
            <div class="mb-14">
                <img 
                    src="{{ asset('karang_taruna/' . ($item->gambar ?? 'default.png')) }}" 
                    alt="Foto Karang Taruna"
                    class="w-full h-auto rounded-none shadow-lg"
                />
            </div>
        @empty
            <p class="text-center text-gray-500">Belum ada foto Karang Taruna.</p>
        @endforelse

    </div>
</section>
@endsection
