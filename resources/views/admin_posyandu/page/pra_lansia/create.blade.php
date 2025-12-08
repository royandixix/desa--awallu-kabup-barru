@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Pra Lansia</h1>

    <form action="{{ route('admin_posyandu.pra_lansia.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Umur</label>
            <input type="number" name="umur" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin_posyandu.pra_lansia.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
