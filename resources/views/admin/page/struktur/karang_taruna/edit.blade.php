@extends('admin.layouts.app')

@section('title', 'Edit Foto Karang Taruna')

@section('content')
<div class="container py-4">

    <h3 class="mb-2">Edit Foto Karang Taruna</h3>
    <p class="text-muted mb-4">Ubah gambar struktur Karang Taruna.</p>

    <form action="{{ route('admin.struktur.karang_taruna.update', $karangTaruna->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Upload Gambar Baru --}}
        <div class="mb-3">
            <label class="form-label">Upload Gambar Baru (Max 2MB)</label>
            <input type="file"
                   name="gambar"
                   id="gambarInput"
                   class="form-control @error('gambar') is-invalid @enderror"
                   accept=".jpg,.jpeg,.png,.webp">

            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Preview gambar --}}
            <div class="mt-3">
                <p class="fw-bold mb-1">Preview Foto</p>
                @if($karangTaruna->gambar)
                    <img id="previewGambar" 
                         class="rounded mt-2 shadow-sm"
                         style="width: 200px; display: block;"
                         src="{{ asset('karang_taruna/' . $karangTaruna->gambar) }}"
                         alt="Preview"
                         onerror="this.style.display='none'">
                @else
                    <img id="previewGambar" 
                         class="rounded mt-2 shadow-sm"
                         style="width: 200px; display: none;"
                         src=""
                         alt="Preview">
                @endif
            </div>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Update Foto</button>
        <a href="{{ route('admin.struktur.karang_taruna.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
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