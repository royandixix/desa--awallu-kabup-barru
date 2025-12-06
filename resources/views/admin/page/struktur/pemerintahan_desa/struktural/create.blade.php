@extends('admin.layouts.app')

@section('title', 'Upload Bagan Pemerintahan Desa')

@section('content')
<div class="container py-4">

    <h3 class="mb-2">Upload Bagan Pemerintahan Desa</h3>
    <p class="text-muted mb-4">Unggah gambar bagan struktur terbaru.</p>

    <form action="{{ route('admin.struktur.pemerintahan_desa.struktural.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf

        {{-- Input Foto --}}
        <div class="mb-3">
            <label class="form-label">Pilih Gambar Bagan (Max 4MB)</label>
            <input type="file" 
                   name="foto" 
                   id="fotoInput"
                   class="form-control @error('foto') is-invalid @enderror" 
                   accept=".jpg,.jpeg,.png,.webp" required>

            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Preview Foto --}}
            <img id="previewFoto" class="rounded mt-2 shadow-sm" style="width: 200px; display:none;">
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Upload Bagan</button>
        <a href="{{ route('admin.struktur.pemerintahan_desa.struktural.index') }}" class="btn btn-secondary">Batal</a>
    </form>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Preview gambar sebelum upload
    const fotoInput = document.getElementById('fotoInput');
    const preview = document.getElementById('previewFoto');

    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) {
            preview.style.display = 'none';
            return;
        }
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    });

    // SweetAlert success
    @if (session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 1600,
            showConfirmButton: false
        });
    @endif
</script>
@endpush
