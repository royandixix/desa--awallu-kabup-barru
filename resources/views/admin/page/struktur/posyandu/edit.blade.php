@extends('admin.layouts.app')

@section('title', 'Edit Posyandu')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold">Edit Foto Posyandu</h3>
        <p class="text-muted">Perbarui foto Posyandu sesuai kebutuhan.</p>
    </div>

    {{-- Form Edit --}}
    <form id="formEditPosyandu" action="{{ route('admin.struktur.posyandu.update', $posyandu->id) }}" method="POST" enctype="multipart/form-data"
        class="card shadow-sm p-4 rounded-3 border-0">
        @csrf
        @method('PUT')

        {{-- Foto Saat Ini --}}
        <div class="mb-3">
            <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
            @if($posyandu->foto)
                <img src="{{ asset('storage/'.$posyandu->foto) }}" alt="Foto Posyandu" class="img-fluid rounded mb-2" style="max-height: 250px; object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada foto.</p>
            @endif
        </div>

        {{-- Upload Foto Baru --}}
        <div class="mb-3">
            <label for="foto" class="form-label fw-semibold">Ganti Foto (Opsional)</label>
            <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
            <small class="text-muted d-block">
                Abaikan jika tidak ingin mengganti foto. Format: JPG/PNG/WEBP • Max: 10MB
            </small>
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUpdatePosyandu" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update Foto
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

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    timer: 1500,
    showConfirmButton: false
});
</script>
@endif

<script>
// Konfirmasi Update
document.getElementById('btnUpdatePosyandu').addEventListener('click', function() {
    Swal.fire({
        title: 'Update Foto?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEditPosyandu').submit();
        }
    });
});
</script>
@endpush
