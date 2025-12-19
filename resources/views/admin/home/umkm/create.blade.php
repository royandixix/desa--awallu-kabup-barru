@extends('admin.layouts.app')

@section('title', 'Tambah UMKM')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah UMKM Baru</h3>
    <p class="text-muted mb-3">Masukkan informasi UMKM desa.</p>

    <form id="formTambahUMKM" action="{{ route('admin.home.umkm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Pengusaha --}}
        <div class="mb-3">
            <label for="nama_pengusaha" class="form-label">Nama Pengusaha</label>
            <input type="text" id="nama_pengusaha" name="nama_pengusaha"
                class="form-control @error('nama_pengusaha') is-invalid @enderror"
                value="{{ old('nama_pengusaha') }}" placeholder="Budi Santoso" required>
            @error('nama_pengusaha')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama Usaha --}}
        <div class="mb-3">
            <label for="nama_usaha" class="form-label">Nama Usaha</label>
            <input type="text" id="nama_usaha" name="nama_usaha"
                class="form-control @error('nama_usaha') is-invalid @enderror"
                value="{{ old('nama_usaha') }}" placeholder="Keripik Singkong Mak Budi" required>
            @error('nama_usaha')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis Usaha --}}
        <div class="mb-3">
            <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
            <input type="text" id="jenis_usaha" name="jenis_usaha"
                class="form-control @error('jenis_usaha') is-invalid @enderror"
                value="{{ old('jenis_usaha') }}" placeholder="Kuliner / Makanan Ringan" required>
            @error('jenis_usaha')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi UMKM</label>
            <textarea id="deskripsi" name="deskripsi"
                class="form-control @error('deskripsi') is-invalid @enderror"
                rows="4" placeholder="Usaha pembuatan keripik singkong renyah dengan bahan alami">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea id="alamat" name="alamat"
                class="form-control @error('alamat') is-invalid @enderror"
                rows="2" placeholder="Jl. Raya Desa No.12, Kecamatan X, Kabupaten Y">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kontak --}}
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" id="kontak" name="kontak"
                class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak') }}" placeholder="081234567890 / email@example.com">
            @error('kontak')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Harga --}}
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" id="harga" name="harga"
                class="form-control @error('harga') is-invalid @enderror"
                value="{{ old('harga') }}" placeholder="Rp 0">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Foto UMKM --}}
        <div class="mb-3">
            <label for="foto_umkm" class="form-label">Foto UMKM</label>
            <input type="file" id="foto_umkm" name="foto_umkm" class="form-control" accept="image/*">
            <div class="mt-2">
                <img id="preview_umkm" class="img-thumbnail" style="display:none; width:150px; height:100px; object-fit:cover;">
            </div>
        </div>

        {{-- Foto Pengusaha --}}
        <div class="mb-3">
            <label for="foto_pengusaha" class="form-label">Foto Pengusaha</label>
            <input type="file" id="foto_pengusaha" name="foto_pengusaha" class="form-control" accept="image/*">
            <div class="mt-2">
                <img id="preview_pengusaha" class="img-thumbnail" style="display:none; width:150px; height:100px; object-fit:cover;">
            </div>
        </div>

        {{-- Kode UMKM --}}
        <div class="mb-3">
            <label for="kode_umkm" class="form-label">Kode UMKM</label>
            <input type="text" id="kode_umkm" name="kode_umkm"
                class="form-control @error('kode_umkm') is-invalid @enderror"
                value="{{ old('kode_umkm') }}" placeholder="UMKM001">
            @error('kode_umkm')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan UMKM</button>
        <a href="{{ route('admin.home.umkm.index') }}" class="btn btn-secondary">Batal</a>

    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
});
</script>
@endif

<script>
// Konfirmasi Simpan
document.getElementById('btnSimpan').addEventListener('click', function() {
    Swal.fire({
        title: 'Simpan UMKM?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if(result.isConfirmed){
            document.getElementById('formTambahUMKM').submit();
        }
    });
});

// Format Rupiah
const hargaInput = document.getElementById('harga');
hargaInput.addEventListener('input', function() {
    let value = this.value.replace(/\D/g,'');
    if(value){
        this.value = 'Rp ' + parseInt(value).toLocaleString('id-ID');
    } else {
        this.value = '';
    }
});

// Preview Foto UMKM
const fotoUMKM = document.getElementById('foto_umkm');
const previewUMKM = document.getElementById('preview_umkm');
fotoUMKM.addEventListener('change', function() {
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => {
            previewUMKM.src = e.target.result;
            previewUMKM.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        previewUMKM.style.display = 'none';
    }
});

// Preview Foto Pengusaha
const fotoPengusaha = document.getElementById('foto_pengusaha');
const previewPengusaha = document.getElementById('preview_pengusaha');
fotoPengusaha.addEventListener('change', function() {
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => {
            previewPengusaha.src = e.target.result;
            previewPengusaha.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        previewPengusaha.style.display = 'none';
    }
});
</script>
@endpush
