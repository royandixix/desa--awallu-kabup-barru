@extends('user.layouts.app')

@section('title', 'Struktur Desa Lawallu')

@section('header_struktur')
    @include('user.partials.header_struktur', ['halaman' => $halaman])
@endsection

@section('content')
    @if($halaman === 'pemerintahan_desa')
        @include('user.page.struktur.pemerintahan_desa')
    @elseif($halaman === 'bpd')
        @include('user.page.struktur.bpd')
    @elseif($halaman === 'pkk')
        @include('user.page.struktur.pkk')
    @elseif($halaman === 'lpm')
        @include('user.page.struktur.lpm')
    @elseif($halaman === 'karang_taruna')
        @include('user.page.struktur.karang_taruna')
    @elseif($halaman === 'posyandu')
        @include('user.page.struktur.posyandu')
    @else
        @include('user.page.struktur.pemerintahan_desa')
        @include('user.page.struktur.bpd')
        @include('user.page.struktur.pkk')
        @include('user.page.struktur.lpm')
        @include('user.page.struktur.karang_taruna')
        @include('user.page.struktur.posyandu')
    @endif
@endsection
