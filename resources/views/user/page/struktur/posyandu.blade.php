@extends('user.layouts.app')

@section('title', 'Struktur POSYANDU')

{{-- Header khusus Posyandu --}}
@section('header_struktur')
    @include('user.partials.header_struktur', ['halaman' => 'posyandu'])
@endsection

@section('content')
<!-- Tambahkan ID agar tombol scroll bisa target -->
<section id="posyandu-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktur POSYANDU Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah gambar-gambar Posyandu yang tersedia.
        </p>

        <!-- GAMBAR POSYANDU BESAR UTUH -->
        @php
            $firstPosyandu = $posyandus->first();
            $firstPath = $firstPosyandu ? public_path('uploads/posyandu/'.$firstPosyandu->gambar) : null;
        @endphp

        @if($firstPosyandu && $firstPosyandu->gambar && file_exists($firstPath))
            <img 
                src="{{ asset('uploads/posyandu/'.$firstPosyandu->gambar) }}" 
                alt="Foto POSYANDU"
                class="w-full h-auto mb-14 rounded shadow"
            />
        @else
            <p class="text-center text-gray-500 mb-14">Belum ada foto Posyandu.</p>
        @endif

        <!-- GRID GAMBAR POSYANDU LAINNYA (opsional) -->
        @if($posyandus->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posyandus as $item)
                    {{-- Lewati foto pertama yang sudah ditampilkan besar --}}
                    @if($loop->first) @continue @endif

                    @php
                        $path = public_path('uploads/posyandu/'.$item->gambar);
                    @endphp

                    <div class="bg-white rounded shadow p-3 hover:shadow-lg transition">
                        @if($item->gambar && file_exists($path))
                            <a href="{{ asset('uploads/posyandu/'.$item->gambar) }}" target="_blank">
                                <img src="{{ asset('uploads/posyandu/'.$item->gambar) }}" alt="Foto Posyandu"
                                     class="w-full h-64 object-cover rounded mb-2">
                            </a>
                        @else
                            <div class="h-64 flex items-center justify-center bg-gray-100 text-gray-400 rounded">
                                Tidak ada foto
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-center mt-10">
                {{ $posyandus->links('vendor.pagination.tailwind') }}
            </div>
        @endif

    </div>
</section>
@endsection
