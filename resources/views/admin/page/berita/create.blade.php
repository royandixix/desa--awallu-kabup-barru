@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Berita Baru</h3>
    <p class="text-muted mb-3">Masukkan informasi berita desa terbaru.</p>

    <form id="formTambahBerita" action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input list="kategoriList" id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}" placeholder="Ketik atau pilih kategori" required>
            <datalist id="kategoriList">
                @foreach($kategoriList as $kategori)
                    @if($kategori)
                        <option value="{{ $kategori }}"></option>
                    @endif
                @endforeach
            </datalist>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Author --}}
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Gambar --}}
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Berita</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            <small class="text-muted d-block">Format: jpg, jpeg, png • Max 10MB</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                <img id="previewImage" src="#" alt="Preview Gambar" class="img-thumbnail" style="display:none; width:150px; height:100px; object-fit:cover;">
            </div>
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label for="konten" class="form-label">Konten Berita</label>
            <textarea id="konten" name="konten" class="form-control @error('konten') is-invalid @enderror" rows="6" required>{{ old('konten') }}</textarea>
            @error('konten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan Berita</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Sweetalert Success --}}
@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
});
</script>
@endif

<script>
// ──────────────── KONFIRMASI SIMPAN ────────────────
document.getElementById('btnSimpan').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Berita?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambahBerita').submit();
        }
    });
});

// ──────────────── PREVIEW GAMBAR ────────────────
const imageInput = document.getElementById('image');
const previewImage = document.getElementById('previewImage');

imageInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        previewImage.style.display = "block";
        reader.onload = function(e) {
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(file);
    } else {
        previewImage.style.display = "none";
    }
});
</script>
@endpush
