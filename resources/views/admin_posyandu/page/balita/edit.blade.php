@extends('admin_posyandu.layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Data Balita</h2>

    <form action="{{ route('admin_posyandu.balita.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Balita</label>
            <input type="text" name="nama_balita" value="{{ $item->nama_balita }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $item->tanggal_lahir }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $item->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ $item->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Umur</label>
            <input type="text" name="umur" value="{{ $item->umur }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" value="{{ $item->nama_ibu }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $item->alamat }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin_posyandu.balita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
