@extends('user.layouts.app')

@section('title', 'Laporan Kegiatan')

@section('header_transparansi')
    @include('user.partials.navbar')
    @include('user.partials.header_transparansi')
@endsection

@section('content')
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold text-green-700">Laporan Kegiatan</h1>
            <p class="mt-4 text-gray-700">
                Informasi mengenai laporan kegiatan yang telah dilaksanakan oleh Desa Lawallu, termasuk dokumentasi kegiatan dan hasil yang dicapai.
            </p>
        </div>
    </section>
@endsection
