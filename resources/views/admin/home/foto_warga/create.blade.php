@extends('admin.layouts.app')

@section('title', 'Tambah Foto Warga')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Foto Warga</h3>

    <form id="formTambahFoto" action="{{ route('admin.home.foto_warga.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror" required accept="image/*">
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                <img id="previewImage" src="#" alt="Preview Foto" style="display:none; width:150px; height:100px; object-fit:cover;" class="img-thumbnail">
            </div>
        </div>

        <button type="button" id="btnSimpan" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.home.foto_warga.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('btnSimpan').addEventListener('click', function() {
    Swal.fire({
        title: 'Simpan foto?',
        text: "Pastikan file yang dipilih sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambahFoto').submit();
        }
    });
});

// Preview gambar
const fileInput = document.getElementById('file');
const preview = document.getElementById('previewImage');

fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
});
</script>
@endpush
