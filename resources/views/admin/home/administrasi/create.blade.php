@extends('admin.layouts.app')

@section('title', 'Tambah Administrasi Penduduk')

@section('content')
<div class="container-fluid px-4 py-4">
    <h2 class="mb-4">Tambah Data Administrasi Penduduk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.home.administrasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="0" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.home.administrasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
