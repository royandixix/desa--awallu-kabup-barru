@extends('admin_posyandu.layouts.app')

@section('title', 'Tambah Bayi (0-12 Bulan)')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4">Tambah Data Bayi</h3>

            <form action="{{ route('admin_posyandu.bayi_0_sampai_12_bulan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Bayi</label>
                    <input type="text" name="nama_bayi" class="form-control @error('nama_bayi') is-invalid @enderror"
                           value="{{ old('nama_bayi') }}" required>
                    @error('nama_bayi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                           value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select>
    @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>


                <div class="mb-3">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror"
                           value="{{ old('nama_ibu') }}">
                    @error('nama_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('admin_posyandu.bayi_0_sampai_12_bulan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection
