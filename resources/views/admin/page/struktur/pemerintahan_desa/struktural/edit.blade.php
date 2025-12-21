@extends('admin.layouts.app')

@section('title', 'Edit Bagan Pemerintahan Desa')

@section('content')
<div class="container py-4">

    <h3 class="mb-2">Edit Bagan Pemerintahan Desa</h3>
    <p class="text-muted mb-4">Ubah gambar bagan pemerintahan desa.</p>

    <form action="{{ route('admin.struktur.pemerintahan_desa.struktural.update', $bagan->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Upload Gambar Baru --}}
        <div class="mb-3">
            <label class="form-label">Upload Gambar Baru (Max 4MB)</label>
            <input type="file" 
                   name="foto"
                   id="fotoInput"
                   class="form-control @error('foto') is-invalid @enderror"
                   accept=".jpg,.jpeg,.png,.webp">

            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Preview gambar baru / saat ini --}}
            <div class="mt-3">
                <p class="fw-bold mb-1">Preview Foto</p>
                <img id="previewFoto" class="rounded mt-2 shadow-sm"
                     style="width: 200px;"
                     src="{{ $bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? asset('uploads/struktur/' . $bagan->foto) : '' }}"
                     {{ $bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? '' : 'style=display:none;' }}>
            </div>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Update Bagan</button>
        <a href="{{ route('admin.struktur.pemerintahan_desa.struktural.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const fotoInput = document.getElementById('fotoInput');
    const preview = document.getElementById('previewFoto');

    // Preview gambar baru sebelum update
    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) {
            // Jika tidak ada file baru, tampilkan gambar lama atau sembunyikan
            preview.style.display = "{{ $bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? 'block' : 'none' }}";
            preview.src = "{{ $bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? asset('uploads/struktur/' . $bagan->foto) : '' }}";
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
