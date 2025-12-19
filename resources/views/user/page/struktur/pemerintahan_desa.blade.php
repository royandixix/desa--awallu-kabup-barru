@extends('user.layouts.app')

@section('title', 'Struktur Pemerintahan Desa')

{{-- Header khusus Pemerintahan Desa --}}
@section('header_struktur')
    @include('user.partials.header_struktur', ['halaman' => 'pemerintahan_desa'])
@endsection

@section('content')
<section id="pemerintahan-desa-section" class="bg-gray-50 py-16 text-[18px]" x-data="{ tahun: '2025' }">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">  Berikut adalah struktural pemerintahan desah</h2>
        <p class="text-gray-500 mb-10 text-center">
          
        </p>

        <!-- GAMBAR STRUKTUR -->
        @if ($bagan && $bagan->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($bagan->foto))
            <img src="{{ asset('storage/' . $bagan->foto) }}" alt="Struktur Pemerintahan Desa"
                class="w-full h-auto mb-14 rounded shadow" />
        @else
            <p class="text-center text-gray-500 mb-14">Belum ada gambar struktur diupload.</p>
        @endif

        <!-- GRID PERANGKAT DESA -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

            @forelse($anggota as $index => $p)
                <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition">

                    @if($p->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($p->foto))
                        <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}"
                            class="w-full h-80 object-cover" />
                    @else
                        <div class="w-full h-80 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Tidak ada foto</span>
                        </div>
                    @endif

                    <div class="bg-teal-500 text-white p-4 text-center">
                        <h3 class="font-bold text-lg">{{ $p->nama }}</h3>
                        <p class="text-sm">{{ $p->jabatan }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center col-span-4 text-gray-500">
                    Belum ada data perangkat desa.
                </p>
            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="flex justify-center mt-10 space-x-2">
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">&laquo;</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">1</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">2</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">3</a>
            <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">&raquo;</a>
        </div>

    </div>
</section>
@endsection
