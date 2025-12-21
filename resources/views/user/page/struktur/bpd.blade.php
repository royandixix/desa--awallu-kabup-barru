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

        @if($firstBpd && $firstBpd->foto && file_exists(public_path($firstBpd->foto)))
            <img 
                src="{{ asset($firstBpd->foto) }}" 
                alt="Foto BPD"
                class="w-full h-auto mb-14 rounded-none shadow"
            />
        @else
            <p class="text-center text-gray-500 mb-14">Belum ada foto anggota BPD.</p>
        @endif

        <!-- GRID ANGGOTA BPD -->
        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            @forelse($bpds as $bpd)
                <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition">

                    @if($bpd->foto && file_exists(public_path($bpd->foto)))
                        <img src="{{ asset($bpd->foto) }}" 
                             alt="{{ $bpd->nama ?? 'BPD' }}"
                             class="w-full h-80 object-cover" />
                    @else
                        <div class="w-full h-80 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Tidak ada foto</span>
                        </div>
                    @endif

                    <div class="bg-teal-500 text-white p-4 text-center">
                        <h3 class="font-bold text-lg">{{ $bpd->nama ?? '-' }}</h3>
                        <p class="text-sm">{{ $bpd->jabatan ?? '-' }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center col-span-4 text-gray-500">
                    Belum ada data anggota BPD.
                </p>
            @endforelse
        </div> --}}

        <!-- PAGINATION DINAMIS -->
        <div class="flex justify-center mt-10">
            {{ $bpds->links() }} <!-- Laravel 12 otomatis menggunakan Tailwind -->
        </div>

    </div>
</section>
@endsection
