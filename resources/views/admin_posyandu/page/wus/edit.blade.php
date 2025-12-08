@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h1>Edit WUS</h1>

    <form action="{{ route('admin_posyandu.wus.update', $wus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama', $wus->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $wus->alamat) }}" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" name="umur" value="{{ old('umur', $wus->umur) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin_posyandu.wus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
