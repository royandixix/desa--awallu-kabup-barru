@extends('admin.layouts.app')

@section('title', 'Tambah Gambar LPM')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Gambar LPM</h3>
        <p class="text-muted">Unggah gambar LPM baru untuk ditampilkan di sistem.</p>
    </div>

    {{-- Form Upload --}}
    <form id="formTambahLPM" action="{{ route('admin.struktur.lpm.store') }}" method="POST" enctype="multipart/form-data"
          class="card shadow-sm p-4 rounded-3 border-0">
        @csrf

        {{-- Upload Gambar --}}
        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Pilih Gambar</label>
            <input type="file" id="gambar" name="gambar"
                   class="form-control @error('gambar') is-invalid @enderror"
                   accept=".jpg,.jpeg,.png,.webp" required>
            <small class="text-muted d-block">Format: JPG/PNG/WEBP • Max: 10MB</small>
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnSimpanLPM" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan Gambar
            </button>
            <a href="{{ route('admin.struktur.lpm.index') }}" class="btn btn-secondary">
                <i class="fas fa-times me-1"></i> Batal
            </a>
        </div>

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
    timer: 1500,
    showConfirmButton: false
});
</script>
@endif

<script>
// Konfirmasi Simpan
document.getElementById('btnSimpanLPM').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Gambar?',
        text: "Pastikan gambar sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambahLPM').submit();
        }
    });
});
</script>
@endpush
