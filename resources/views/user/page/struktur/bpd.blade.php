@extends('user.layouts.app')

@section('title', 'Struktural BPD')

{{-- Header khusus BPD --}}
@section('header_struktur')
    @include('user.partials.header_struktur', ['halaman' => 'bpd'])
@endsection

@section('content')
<!-- Tambahkan ID agar tombol scroll bisa target -->
<section id="bpd-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktural BPD Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah foto anggota BPD Desa.
        </p>

        <!-- GAMBAR BPD BESAR UTUH -->
        @php
            $firstBpd = $bpds->first();
        @endphp

        @if($firstBpd && $firstBpd->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($firstBpd->foto))
            <img 
                src="{{ asset('storage/' . $firstBpd->foto) }}" 
                alt="Foto BPD"
                class="w-full h-auto mb-14 rounded-none"
            />
        @else
            <p class="text-center text-gray-500 mb-14">Belum ada foto anggota BPD.</p>
        @endif

        <!-- PAGINATION DINAMIS -->
        <div class="flex justify-center mt-10">
            {{ $bpds->links() }} <!-- Laravel 12 otomatis menggunakan Tailwind -->
        </div>

    </div>
</section>
@endsection
