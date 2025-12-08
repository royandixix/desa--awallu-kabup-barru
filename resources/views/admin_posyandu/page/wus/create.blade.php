@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data WUS</h1>

    <form action="{{ route('admin_posyandu.wus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" name="umur" value="{{ old('umur') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin_posyandu.wus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
