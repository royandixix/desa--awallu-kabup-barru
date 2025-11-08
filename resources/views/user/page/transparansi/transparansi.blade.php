@extends('user.layouts.app')

@section('title', 'Transparansi Desa Lawallu')

@section('header_transparansi')
    @include('user.partials.header_transparansi', ['halaman' => $halaman ?? 'default'])
@endsection

@section('content')
    @if($halaman === 'anggaran')
        @include('user.page.transparansi.anggaran')
    @elseif($halaman === 'bumdes')
        @include('user.page.transparansi.bumdes')
    @elseif($halaman === 'dokumen')
        @include('user.page.transparansi.dokumen')
    @elseif($halaman === 'laporan')
        @include('user.page.transparansi.laporan')
    @else
        {{-- default semua --}}
        @include('user.page.transparansi.anggaran')
        @include('user.page.transparansi.bumdes')
        @include('user.page.transparansi.dokumen')
        @include('user.page.transparansi.laporan')
    @endif
@endsection
  