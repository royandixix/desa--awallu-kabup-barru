@extends('admin.layouts.app')

@section('title', 'Tambah Dokumen BUMDes & KOPDes')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Tambah Dokumen BUMDes & KOPDes</h3>
    <p class="text-muted mb-3">Masukkan data dokumen transparansi baru beserta file-nya.</p>

    <form id="formTambahBumdes" action="{{ route('admin.transparansi.bumdes.store') }}" 
          method="POST" enctype="multipart/form-data">
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

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select id="kategori" name="kategori"
                    class="form-select @error('kategori') is-invalid @enderror" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="BUMDes" {{ old('kategori')=='BUMDes' ? 'selected' : '' }}>BUMDes</option>
                <option value="KOPDes" {{ old('kategori')=='KOPDes' ? 'selected' : '' }}>KOPDes</option>
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                   class="form-control @error('tanggal') is-invalid @enderror"
                   value="{{ old('tanggal') }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label for="file" class="form-label">Upload File Dokumen</label>
            <input type="file" id="file" name="file"
                   class="form-control @error('file') is-invalid @enderror"
                   accept=".pdf,.jpg,.jpeg,.png,.webp,.xls,.xlsx" required>
            <small class="text-muted d-block">
                Format: PDF/Gambar (jpg, jpeg, png, webp) atau Excel (xls, xlsx) • Max: 10MB
            </small>
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpanBumdes" class="btn btn-primary">Simpan Dokumen</button>
        <a href="{{ route('admin.transparansi.bumdes.index') }}" class="btn btn-secondary">Batal</a>
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
document.getElementById('btnSimpanBumdes').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Dokumen?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambahBumdes').submit();
        }
    });
});
</script>
@endpush
