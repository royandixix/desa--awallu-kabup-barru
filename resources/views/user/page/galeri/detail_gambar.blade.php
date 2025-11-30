@extends('user.layouts.app')

@section('title', 'Detail Gambar - Kegiatan Gotong Royong')

{{-- Header khusus halaman detail gambar --}}
@section('header_detail_gambar')
    @include('user.partials.navbar')
    @include('user.partials.header_detail_gambar')
@endsection

{{-- Konten Detail Gambar --}}
@section('content')

    {{-- Hero Gambar --}}
    <section class="bg-gray-50 pt-16">
        <div class="container mx-auto px-6 md:px-10 lg:px-16">
            <div class="w-full overflow-hidden ">
                <img src="{{ asset('uploads/galeri/' . $galeri->file) }}" alt="{{ $galeri->title }}"
                    class="w-full h-[680px] md:h-[720px] lg:h-[800px] object-cover object-center">

            </div>
            <div class="text-center mt-6">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-700">Kegiatan Gotong Royong</h1>
                <p class="mt-2 text-gray-600 text-lg md:text-xl">
                    Kebersamaan masyarakat Desa Batupute dalam menjaga lingkungan dan mempererat silaturahmi.
                </p>
            </div>
        </div>
    </section>


    {{-- Konten & Sidebar --}}
    <section class="bg-gray-50">
        <div
            class="container mx-auto px-6 md:px-10 lg:px-16 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12 text-gray-800 leading-relaxed">

            <!-- Kolom Kiri -->
            <div class="lg:col-span-2 space-y-8">
                <h2 class="text-3xl font-bold text-green-700 mb-4">Detail Kegiatan</h2>
                <p>
                    Dokumentasi kegiatan <strong>Gotong Royong</strong> yang dilaksanakan di
                    <strong>RT 01 Dusun Batupute</strong> bersama <strong>Pemerintah Desa Batupute</strong>,
                    para Ketua RT dan masyarakat Desa Batupute pada hari
                    <strong>Jumat, 13 Juni 2025</strong>.
                </p>
                <p>
                    Kegiatan ini merupakan bentuk nyata dari semangat kebersamaan dan kepedulian masyarakat
                    terhadap kebersihan lingkungan. Gotong royong juga menjadi wadah mempererat hubungan antarwarga
                    dan pemerintah desa dalam menciptakan lingkungan yang bersih, sehat, dan harmonis.
                </p>
                <p>
                    Diharapkan kegiatan seperti ini terus dilestarikan agar nilai-nilai sosial dan rasa kebersamaan
                    tetap hidup di tengah masyarakat Desa Batupute.
                </p>
            </div>

            <!-- Sidebar Kanan -->
            <aside class="space-y-6 text-sm text-gray-700">
                <h3 class="text-xl font-bold text-green-700 mb-2">Informasi Gambar</h3>
                <ul class="space-y-1">
                    <li><strong>Lokasi:</strong> Batupute</li>
                    <li><strong>Kategori:</strong> Kegiatan Gotong Royong</li>
                    <li><strong>Makna:</strong> Menumbuhkan persatuan dan kesatuan masyarakat</li>
                    <li><strong>Tanggal:</strong> 2025-06-13 01:23:50</li>
                </ul>


            </aside>

        </div>
    </section>

@endsection
