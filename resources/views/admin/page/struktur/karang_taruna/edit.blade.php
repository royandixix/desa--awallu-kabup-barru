@extends('admin.layouts.app')

@section('title', 'Edit Foto Karang Taruna')

@section('content')
<div class="container py-4">

    {{-- Judul --}}
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="mb-1">Edit Foto Karang Taruna</h3>
            <p class="text-muted">Ubah gambar struktur Karang Taruna.</p>
        </div>
    </div>

    {{-- Form Edit --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.struktur.karang_taruna.update', $karangTaruna->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Upload Gambar Baru --}}
                        <div class="mb-3">
                            <label for="gambarInput" class="form-label fw-bold">Upload Gambar Baru (Max 2MB)</label>
                            <input type="file"
                                   name="gambar"
                                   id="gambarInput"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   accept=".jpg,.jpeg,.png,.webp">

                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Preview Gambar --}}
                            <div class="mt-3">
                                <p class="fw-bold mb-1">Preview Foto</p>
                                @if($karangTaruna->gambar)
                                    <img id="previewGambar"
                                         class="rounded mt-2 shadow-sm"
                                         style="width: 200px; display: block; object-fit: cover;"
                                         src="{{ asset('karang_taruna/' . $karangTaruna->gambar) }}"
                                         alt="Preview"
                                         onerror="this.style.display='none'">
                                @else
                                    <img id="previewGambar"
                                         class="rounded mt-2 shadow-sm"
                                         style="width: 200px; display: none; object-fit: cover;"
                                         src=""
                                         alt="Preview">
                                @endif
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Foto
                            </button>
                            <a href="{{ route('admin.struktur.karang_taruna.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const gambarInput = document.getElementById('gambarInput');
    const preview = document.getElementById('previewGambar');
    const originalSrc = preview.src;

    // Preview gambar baru sebelum upload
    gambarInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) {
            preview.src = originalSrc;
            preview.style.display = originalSrc ? 'block' : 'none';
            return;
        }

        // Validasi tipe file
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!validTypes.includes(file.type)) {
            Swal.fire({
                icon: 'error',
                title: 'Format Tidak Valid!',
                text: 'Hanya JPG, PNG, WEBP yang diperbolehkan.',
            });
            this.value = '';
            return;
        }

        // Validasi ukuran file (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            Swal.fire({
                icon: 'error',
                title: 'Ukuran Terlalu Besar!',
                text: 'Maksimal ukuran file adalah 2MB.',
            });
            this.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    });

    // SweetAlert success
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 1600,
            showConfirmButton: false
        });
    @endif
});
</script>
@endpush
