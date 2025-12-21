@extends('admin.layouts.app')

@section('title', 'Upload Posyandu')

@section('content')
<div class="container py-4">

    <div class="mb-4">
        <h3 class="fw-bold">Upload Gambar Posyandu</h3>
        <p class="text-muted">Tambahkan foto Posyandu baru.</p>
    </div>

    <form id="formUploadPosyandu" action="{{ route('admin.struktur.posyandu.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm rounded-3">
        @csrf

        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Pilih Foto</label>
            <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" required accept=".jpg,.jpeg,.png,.webp">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Preview Gambar -->
        <div class="mb-3 d-none" id="previewContainer">
            <label class="form-label fw-semibold">Preview Gambar</label>
            <div>
                <img id="previewImage" src="#" alt="Preview Gambar" class="img-fluid rounded" style="max-height: 250px;">
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUploadPosyandu" class="btn btn-primary"><i class="fas fa-upload me-1"></i> Upload Foto</button>
            <a href="{{ route('admin.struktur.posyandu.index') }}" class="btn btn-secondary"><i class="fas fa-times me-1"></i> Batal</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputGambar = document.getElementById('gambar');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    // Live preview gambar
    inputGambar.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('d-none');
            previewImage.src = '#';
        }
    });

    // Konfirmasi sebelum upload
    document.getElementById('btnUploadPosyandu').addEventListener('click', function() {
        if (!inputGambar.files.length) {
            Swal.fire({
                icon: 'warning',
                title: 'Pilih foto terlebih dahulu!',
                timer: 1500,
                showConfirmButton: false
            });
            return;
        }

        Swal.fire({
            title: 'Upload Foto?',
            text: "Pastikan file yang dipilih sudah benar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Upload!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('formUploadPosyandu').submit();
        });
    });
});
</script>

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
@endpush
