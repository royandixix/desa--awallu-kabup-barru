@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Data Balita</h2>

    <form action="{{ route('admin_posyandu.balita.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Balita</label>
            <input type="text" name="nama_balita" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Umur</label>
            <input type="text" name="umur" class="form-control" placeholder="Contoh: 1-2" required>
        </div>

        <div class="mb-3">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin_posyandu.balita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
