@extends('user.layouts.app')

@section('title', 'Struktur PKK')

{{-- Header khusus PKK --}}
@section('header_struktur')
    @include('user.partials.header_struktur', ['halaman' => 'pkk'])
@endsection

@section('content')
<section id="pkk-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktur PKK Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah struktur organisasi Tim Penggerak PKK Desa Lawallu.
        </p>

        <!-- FOTO BESAR FULL-WIDTH -->
        @forelse(\App\Models\Pkk::orderBy('id', 'DESC')->get() as $pkk)
            <div class="mb-14">
                <img 
                    src="{{ asset('pkk/' . $pkk->gambar) }}" 
                    alt="Struktur PKK Desa"
                    class="w-full h-auto rounded-none shadow-lg"
                />
            </div>
        @empty
            <p class="text-center text-gray-500">Belum ada gambar PKK.</p>
        @endforelse

    </div>
</section>
@endsection
