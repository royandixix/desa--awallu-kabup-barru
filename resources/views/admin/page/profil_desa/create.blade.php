@extends('admin.layouts.app')

@section('content')

<div class="container py-4">

    <h3 class="mb-4">Tambah Profil Desa</h3>

    <form action="{{ route('admin.profil_desa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
            <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" rows="3">{{ old('deskripsi_singkat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar_header" class="form-label">Gambar Header</label>
            <input type="file" class="form-control" id="gambar_header" name="gambar_header">
        </div>

        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            <textarea class="form-control" id="sejarah" name="sejarah" rows="5">{{ old('sejarah') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="wilayah_administratif" class="form-label">Wilayah Administratif</label>
            <textarea class="form-control" id="wilayah_administratif" name="wilayah_administratif" rows="3">{{ old('wilayah_administratif') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="nama_desa" class="form-label">Nama Desa</label>
            <input type="text" class="form-control" id="nama_desa" name="nama_desa" value="{{ old('nama_desa') }}">
        </div>

        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
        </div>

        <div class="mb-3">
            <label for="kabupaten" class="form-label">Kabupaten</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ old('kabupaten') }}">
        </div>

        <div class="mb-3">
            <label for="batas_utara" class="form-label">Batas Utara</label>
            <input type="text" class="form-control" id="batas_utara" name="batas_utara" value="{{ old('batas_utara') }}">
        </div>

        <div class="mb-3">
            <label for="batas_selatan" class="form-label">Batas Selatan</label>
            <input type="text" class="form-control" id="batas_selatan" name="batas_selatan" value="{{ old('batas_selatan') }}">
        </div>

        <div class="mb-3">
            <label for="batas_timur" class="form-label">Batas Timur</label>
            <input type="text" class="form-control" id="batas_timur" name="batas_timur" value="{{ old('batas_timur') }}">
        </div>

        <div class="mb-3">
            <label for="batas_barat" class="form-label">Batas Barat</label>
            <input type="text" class="form-control" id="batas_barat" name="batas_barat" value="{{ old('batas_barat') }}">
        </div>

        <div class="mb-3">
            <label for="koordinat" class="form-label">Koordinat</label>
            <input type="text" class="form-control" id="koordinat" name="koordinat" value="{{ old('koordinat') }}">
        </div>

        <div class="mb-3">
            <label for="jarak_kabupaten" class="form-label">Jarak ke Kabupaten</label>
            <input type="text" class="form-control" id="jarak_kabupaten" name="jarak_kabupaten" value="{{ old('jarak_kabupaten') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Profil Desa</button>
        <a href="{{ route('admin.profil_desa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
