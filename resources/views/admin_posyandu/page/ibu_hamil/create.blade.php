@extends('admin_posyandu.layouts.app')

@section('title', 'Tambah Ibu Hamil')

@section('content')
<div class="container mt-4">
    <h1>Tambah Ibu Hamil</h1>
    <a href="{{ route('admin_posyandu.ibu-hamil.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin_posyandu.ibu-hamil.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Umur Kehamilan (minggu)</label>
                    <input type="number" name="umur_kehamilan" class="form-control" value="{{ old('umur_kehamilan') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Suami</label>
                    <input type="text" name="nama_suami" class="form-control" value="{{ old('nama_suami') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
