@extends('admin.layouts.app')

@section('title', 'Tambah Dokumen')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Dokumen Transparansi</h3>
    <p class="text-muted mb-3">Masukkan data dokumen untuk transparansi desa.</p>

    <form id="formTambah" 
          action="{{ route('admin.transparansi.dokumen.store') }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Dokumen</label>
            <input type="text" id="judul" name="judul"
                class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul') }}" required>

            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis --}}
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Dokumen</label>
            <select id="jenis" name="jenis"
                class="form-select @error('jenis') is-invalid @enderror" required>

                <option value="">-- pilih jenis --</option>
                <option value="POKOK" {{ old('jenis') == 'POKOK' ? 'selected' : '' }}>POKOK</option>
                <option value="PERUBAHAN" {{ old('jenis') == 'PERUBAHAN' ? 'selected' : '' }}>PERUBAHAN</option>

            </select>

            {{-- JENIS DI MASUKAN DATA  --}}

            @error('jenis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tahun --}}
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" id="tahun" name="tahun"
                class="form-control @error('tahun') is-invalid @enderror"
                value="{{ old('tahun') }}" placeholder="YYYY">

            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Dokumen</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal') }}">

            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" id="file" name="file"
                class="form-control @error('file') is-invalid @enderror"
                accept=".pdf,.jpg,.jpeg,.png,.webp">

            <small class="text-muted d-block">
                Format file: PDF, JPG, PNG, WEBP • Max 2MB
            </small>

            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan Dokumen</button>
        <a href="{{ route('admin.transparansi.dokumen.index') }}" class="btn btn-secondary">Batal</a>

    </form>
</div>
@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Sweetalert jika success --}}
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
// ───────────────────────────────────────────────
// KONFIRMASI SIMPAN
// ───────────────────────────────────────────────
document.getElementById('btnSimpan').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Dokumen?',
        text: "Pastikan semua data sudah sesuai.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('formTambah').submit();
        }
    });
});
</script>
@endpush
