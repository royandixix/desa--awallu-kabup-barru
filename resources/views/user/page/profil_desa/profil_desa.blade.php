@extends('user.layouts.app')

@section('title', 'Profil Desa Lawallu')

{{-- Header khusus Profil Desa --}}
@section('header_profil_desa')
    @include('user.partials.navbar')
    @include('user.partials.header_profil_desa')
@endsection

{{-- Konten utama --}}
@section('content')
    @include('user.page.profil_desa.gambar')
    @include('user.page.profil_desa.penjelasan_')
    
@endsection
