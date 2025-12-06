@extends('admin.layouts.app')

@section('title', 'Tambah Laporan')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Laporan</h3>
    <p class="text-muted mb-3">Masukkan data laporan desa baru beserta dokumennya.</p>

    <form id="formTambah" action="{{ route('admin.transparansi.laporan.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Laporan</label>
            <input type="text" id="judul" name="judul"
                   class="form-control @error('judul') is-invalid @enderror"
                   value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi"
                      class="form-control @error('deskripsi') is-invalid @enderror"
                      rows="3">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                   class="form-control @error('tanggal') is-invalid @enderror"
                   value="{{ old('tanggal') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label for="file" class="form-label">Upload Dokumen</label>
            <input type="file" id="file" name="file"
                   class="form-control @error('file') is-invalid @enderror"
                   accept=".pdf,.png,.jpg,.jpeg">

            <small class="text-muted d-block">Format: pdf, png, jpg • Max: 10MB</small>

            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan Laporan</button>
        <a href="{{ route('admin.transparansi.laporan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Sweetalert Success --}}
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
// Konfirmasi Simpan
document.getElementById('btnSimpan').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Data?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambah').submit();
        }
    });
});
</script>
@endpush
