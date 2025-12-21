@extends('admin.layouts.app')

@section('title', 'Edit Posyandu')

@section('content')
<div class="container py-4">

    <div class="mb-4">
        <h3 class="fw-bold">Edit Foto Posyandu</h3>
        <p class="text-muted">Perbarui foto Posyandu sesuai kebutuhan.</p>
    </div>

    <form id="formEditPosyandu" action="{{ route('admin.struktur.posyandu.update', $posyandu->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm rounded-3">
        @csrf
        @method('PUT')

        <!-- Foto Lama -->
        <div class="mb-3">
            <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
            @php
                $oldPath = public_path('uploads/posyandu/'.$posyandu->gambar);
            @endphp
            @if($posyandu->gambar && file_exists($oldPath))
                <img id="oldImage" src="{{ asset('uploads/posyandu/'.$posyandu->gambar) }}" alt="Foto Posyandu" class="img-fluid rounded mb-2" style="max-height: 250px;">
            @else
                <p class="text-muted">Tidak ada foto.</p>
            @endif
        </div>

        <!-- Ganti Foto -->
        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Ganti Foto (Opsional)</label>
            <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Preview Gambar Baru -->
        <div class="mb-3 d-none" id="previewContainer">
            <label class="form-label fw-semibold">Preview Gambar Baru</label>
            <div>
                <img id="previewImage" src="#" alt="Preview Gambar" class="img-fluid rounded" style="max-height: 250px;">
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUpdatePosyandu" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update Foto</button>
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

    // Preview Gambar Baru
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

    // Konfirmasi Update
    document.getElementById('btnUpdatePosyandu').addEventListener('click', function() {
        Swal.fire({
            title: 'Update Foto?',
            text: "Pastikan semua data sudah benar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Update!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('formEditPosyandu').submit();
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
