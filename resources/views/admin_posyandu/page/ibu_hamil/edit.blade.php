@extends('admin_posyandu.layouts.app')

@section('title', 'Edit Ibu Hamil')

@section('content')
<div class="container mt-4">
    <h1>Edit Ibu Hamil</h1>
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
            <!-- Form Update -->
            <form action="{{ route('admin_posyandu.ibu-hamil.update', $ibu_hamil) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" 
                           value="{{ old('nama_ibu', $ibu_hamil->nama_ibu) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Umur Kehamilan (minggu)</label>
                    <input type="number" name="umur_kehamilan" class="form-control" 
                           value="{{ old('umur_kehamilan', $ibu_hamil->umur_kehamilan) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Suami</label>
                    <input type="text" name="nama_suami" class="form-control" 
                           value="{{ old('nama_suami', $ibu_hamil->nama_suami) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $ibu_hamil->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" 
                           value="{{ old('no_hp', $ibu_hamil->no_hp) }}">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
