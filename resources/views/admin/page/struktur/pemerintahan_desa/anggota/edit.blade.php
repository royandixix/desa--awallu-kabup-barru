@extends('admin.layouts.app')

@section('title', 'Edit Anggota Pemerintahan Desa')

@section('content')
<div class="container py-4">

    <h3 class="mb-1">Edit Anggota Pemerintahan Desa</h3>
    <p class="text-muted mb-4">Perbarui data anggota pemerintahan desa.</p>

    <form id="formEditAnggota" action="{{ route('admin.struktur.pemerintahan_desa.anggota.update', $item->id) }}"
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-3">
            <label class="form-label">Nama Anggota</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                   value="{{ old('nama', $item->nama) }}" required>

            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jabatan --}}
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                   value="{{ old('jabatan', $item->jabatan) }}" required>

            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label class="form-label">Foto Anggota (Max 2MB)</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="fotoInput"
                   accept=".jpg,.jpeg,.png,.webp">

            <small class="text-muted d-block">
                Format: JPG, JPEG, PNG, WEBP • Max 2MB
            </small>

            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Preview Foto --}}
            <div class="mt-3">
                <p class="fw-bold mb-1">Preview Foto</p>
                <img id="previewFoto" class="rounded shadow-sm"
                     style="width: 120px;"
                     src="{{ $item->foto ? asset('storage/' . $item->foto) : '' }}"
                     {{ $item->foto ? '' : 'style=display:none;' }}>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="mt-3">
            <button type="button" id="btnUpdate" class="btn btn-primary">Update Data</button>
            <a href="{{ route('admin.struktur.pemerintahan_desa.anggota.index') }}" class="btn btn-secondary">Batal</a>
        </div>

    </form>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const fotoInput = document.getElementById('fotoInput');
    const preview = document.getElementById('previewFoto');

    // Preview foto baru sebelum update
    fotoInput.addEventListener('change', function() {
        const file = this.files[0];
        if (!file) {
            // Tampilkan foto lama jika ada
            preview.style.display = "{{ $item->foto ? 'block' : 'none' }}";
            preview.src = "{{ $item->foto ? asset('storage/' . $item->foto) : '' }}";
            return;
        }
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    });

    // Konfirmasi update
    document.getElementById('btnUpdate').addEventListener('click', function() {
        Swal.fire({
            title: 'Update Data?',
            text: "Perubahan akan disimpan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Update!',
            cancelButtonText: 'Batal'
        }).then(result => {
            if (result.isConfirmed) {
                document.getElementById('formEditAnggota').submit();
            }
        });
    });

    // SweetAlert success
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
    @endif
</script>
@endpush
