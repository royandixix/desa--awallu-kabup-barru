@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data PUS</h1>

    <form action="{{ route('admin_posyandu.pus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" name="no_hp">
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" name="umur">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin_posyandu.pus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
