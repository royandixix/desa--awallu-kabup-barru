@extends('user.layouts.app')

@section('title', 'Galeri Desa Lawallu')

{{-- Header khusus untuk halaman galeri --}}
@section('header_galeri')
    @include('user.partials.header_galeri') {{-- Hanya header galeri, jangan include navbar lagi --}}
@endsection

{{-- Konten Galeri --}}
@section('content')
    @include('user.page.galeri.gambar')
@endsection
