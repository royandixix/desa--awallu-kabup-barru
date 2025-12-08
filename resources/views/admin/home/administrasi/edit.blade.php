@extends('admin.layouts.app')

@section('title', 'Edit Administrasi Penduduk')

@section('content')
<div class="container-fluid px-4 py-4">
    <h2 class="mb-4">Edit Data Administrasi Penduduk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.home.administrasi.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ $item->kategori == $category ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $item->jumlah }}" min="0" required>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.home.administrasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
