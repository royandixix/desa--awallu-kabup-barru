@extends('admin_posyandu.layouts.app')

@section('title', 'Tambah Ibu Menyusui')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4">Tambah Data Ibu Menyusui</h3>

            <form id="formTambah" action="{{ route('admin_posyandu.ibu-menyusui.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" required>
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Umur</label>
                    <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror"
                        value="{{ old('umur') }}">
                    @error('umur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="2"
                        class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Dusun</label>
                    <input type="text" name="dusun" class="form-control @error('dusun') is-invalid @enderror"
                        value="{{ old('dusun') }}">
                    @error('dusun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('admin_posyandu.ibu-menyusui.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection
