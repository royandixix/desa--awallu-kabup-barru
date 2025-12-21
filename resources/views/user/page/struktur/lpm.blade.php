@extends('user.layouts.app')

@section('title', 'Struktur LPM')

{{-- Header khusus LPM --}}
@section('header_struktur')
    @include('user.partials.header_struktur', ['halaman' => 'lpm'])
@endsection

@section('content')
<section id="lpm-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktur LPM Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah struktur organisasi LPM (Lembaga Pemberdayaan Masyarakat) Desa Lawallu.
        </p>

        <!-- FOTO BESAR FULL-WIDTH -->
        @forelse($lpms ?? [] as $item)
            <div class="mb-14">
                <img 
                    src="{{ asset($item->gambar ?? 'uploads/lpm/default.png') }}" 
                    alt="Struktur LPM"
                    class="w-full h-auto rounded-none shadow-lg"
                />
            </div>
        @empty
            <p class="text-center text-gray-500">Belum ada foto LPM.</p>
        @endforelse

    </div>
</section>
@endsection
