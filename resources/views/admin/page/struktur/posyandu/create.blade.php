@extends('admin.layouts.app')

@section('title', 'Upload Posyandu')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold">Upload Gambar Posyandu</h3>
        <p class="text-muted">Tambahkan foto Posyandu baru.</p>
    </div>

    {{-- Form Upload --}}
    <form id="formUploadPosyandu" action="{{ route('admin.struktur.posyandu.store') }}" method="POST" enctype="multipart/form-data"
        class="card shadow-sm p-4 rounded-3 border-0">
        @csrf

        {{-- File Foto --}}
        <div class="mb-3">
            <label for="foto" class="form-label fw-semibold">Pilih Foto</label>
            <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" required
                   accept=".jpg,.jpeg,.png,.webp">
            <small class="text-muted d-block">
                Format: JPG/PNG/WEBP • Max: 10MB
            </small>
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUploadPosyandu" class="btn btn-primary">
                <i class="fas fa-upload me-1"></i> Upload Foto
            </button>
            <a href="{{ route('admin.struktur.posyandu.index') }}" class="btn btn-secondary">
                <i class="fas fa-times me-1"></i> Batal
            </a>
        </div>
    </form>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Sweetalert Success --}}
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    timer: 1500,
    showConfirmButton: false
});
</script>
@endif

<script>
// Konfirmasi Upload
document.getElementById('btnUploadPosyandu').addEventListener('click', function() {
    Swal.fire({
        title: 'Upload Foto?',
        text: "Pastikan file yang dipilih sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Upload!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formUploadPosyandu').submit();
        }
    });
});
</script>
@endpush
