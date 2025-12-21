@extends('admin.layouts.app')

@section('title', 'Edit Gambar LPM')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold">Edit Gambar LPM</h3>
        <p class="text-muted">Perbarui gambar LPM jika diperlukan.</p>
    </div>

    {{-- Form Edit --}}
    <form id="formEditLPM" action="{{ route('admin.struktur.lpm.update', $lpm->id) }}" method="POST" enctype="multipart/form-data"
          class="card shadow-sm p-4 rounded-3 border-0">
        @csrf
        @method('PUT')

        {{-- Gambar Saat Ini --}}
        <div class="mb-3">
            <label class="form-label fw-semibold d-block">Gambar Saat Ini</label>
            @if($lpm->gambar)
                <img src="{{ asset('uploads/lpm/' . $lpm->gambar) }}" class="img-fluid rounded mb-2" style="max-height: 200px;">
            @else
                <p class="text-muted">Tidak ada gambar.</p>
            @endif
        </div>

        {{-- Ganti Gambar --}}
        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Ganti Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
            <small class="text-muted d-block">Abaikan jika tidak ingin mengganti gambar. Format: JPG/PNG/WEBP • Max: 10MB</small>
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Preview Gambar Baru --}}
        <div class="mb-3 text-center">
            <img id="previewImage" src="#" alt="Preview" class="img-fluid rounded shadow-sm d-none" style="max-width: 250px;">
        </div>

        {{-- Tombol --}}
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUpdateLPM" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update Gambar
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

{{-- Preview Gambar Baru --}}
<script>
document.getElementById('gambar').addEventListener('change', function(event) {
    let reader = new FileReader();
    reader.onload = function() {
        let preview = document.getElementById('previewImage');
        preview.src = reader.result;
        preview.classList.remove('d-none');
    };
    reader.readAsDataURL(event.target.files[0]);
});
</script>

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

{{-- Konfirmasi Update --}}
<script>
document.getElementById('btnUpdateLPM').addEventListener('click', function() {
    Swal.fire({
        title: 'Update Gambar?',
        text: "Pastikan gambar sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEditLPM').submit();
        }
    });
});
</script>
@endpush
