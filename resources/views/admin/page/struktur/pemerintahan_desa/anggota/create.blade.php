@extends('admin.layouts.app')

@section('title', 'Tambah Anggota Pemerintahan Desa')

@section('content')
<div class="container py-4">

    <h3 class="mb-2">Tambah Anggota Pemerintahan Desa</h3>
    <p class="text-muted mb-4">Masukkan data anggota pemerintahan desa dengan lengkap.</p>

    <form id="formTambahAnggota"
          action="{{ route('admin.struktur.pemerintahan_desa.anggota.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        {{-- Nama --}}
        <div class="mb-3">
            <label class="form-label">Nama Anggota</label>
            <input type="text" name="nama"
                   class="form-control @error('nama') is-invalid @enderror"
                   value="{{ old('nama') }}" required>

            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jabatan --}}
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan"
                   class="form-control @error('jabatan') is-invalid @enderror"
                   value="{{ old('jabatan') }}" required>

            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label class="form-label">Foto Anggota (Max 2MB)</label>
            <input type="file" name="foto"
                   class="form-control @error('foto') is-invalid @enderror"
                   id="fotoInput"
                   accept=".jpg,.jpeg,.png,.webp">

            <small class="text-muted d-block">
                Format: JPG, JPEG, PNG, WEBP • Max 2MB
            </small>

            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Preview Foto --}}
            <img id="previewFoto"
                 class="rounded mt-2 shadow-sm"
                 style="width: 120px; display:none;">
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan Anggota</button>
        <a href="{{ route('admin.struktur.pemerintahan_desa.anggota.index') }}"
           class="btn btn-secondary">Batal</a>

    </form>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
});
</script>
@endif

<script>
document.getElementById('fotoInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        const img = document.getElementById('previewFoto');
        img.src = event.target.result;
        img.style.display = 'block';
    }
    reader.readAsDataURL(file);
});

// SWEETALERT SIMPAN
document.getElementById('btnSimpan').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Data Anggota?',
        text: "Pastikan semua informasi sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('formTambahAnggota').submit();
        }
    });
});
</script>
@endpush
