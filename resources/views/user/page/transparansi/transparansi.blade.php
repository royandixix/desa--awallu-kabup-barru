@extends('user.layouts.app')

@section('title', 'Transparansi Desa Lawallu')

@section('header_transparansi')
    @include('user.partials.header_transparansi', ['halaman' => $halaman ?? 'default'])
@endsection

@section('content')
    @if($halaman === 'anggaran')
        {{-- Kirim $anggarans ke included blade --}}
        @include('user.page.transparansi.anggaran', ['anggarans' => $anggarans])
    @elseif($halaman === 'bumdes')
        @include('user.page.transparansi.bumdes')
    @elseif($halaman === 'dokumen')
        @include('user.page.transparansi.dokumen')
    @elseif($halaman === 'laporan')
        @include('user.page.transparansi.laporan')
    @else
        {{-- Default semua, pastikan $anggarans dikirim --}}
        @include('user.page.transparansi.anggaran', ['anggarans' => $anggarans])
        @include('user.page.transparansi.bumdes')
        @include('user.page.transparansi.dokumen')
        @include('user.page.transparansi.laporan')
    @endif
@endsection
