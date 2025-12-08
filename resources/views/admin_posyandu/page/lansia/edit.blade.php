@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container mt-4">

    <h4>Edit Data Lansia</h4>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('admin_posyandu.lansia.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                </div>

                <div class="mb-3">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control" value="{{ $data->umur }}">
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control">{{ $data->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $data->no_hp }}">
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin_posyandu.lansia.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
