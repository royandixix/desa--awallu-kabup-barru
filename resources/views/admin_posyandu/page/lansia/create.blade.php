@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container mt-4">

    <h4>Tambah Data Lansia</h4>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('admin_posyandu.lansia.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin_posyandu.lansia.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
