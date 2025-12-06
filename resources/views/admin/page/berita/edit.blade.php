@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Edit Berita</h3>
    <p class="text-muted mb-3">Perbarui informasi berita desa.</p>

    <form id="formEditBerita"
      action="{{ route('admin.berita.update', $berita) }}"
      method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label class="form-label">Judul Berita</label>
            <input type="text" name="judul"
                   class="form-control @error('judul') is-invalid @enderror"
                   value="{{ old('judul', $berita->judul) }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input list="kategoriList" name="kategori"
                   class="form-control @error('kategori') is-invalid @enderror"
                   value="{{ old('kategori', $berita->kategori) }}"
                   placeholder="Ketik atau pilih kategori" required>

            <datalist id="kategoriList">
                @foreach($kategoriList as $kategori)
                    @if ($kategori)
                        <option value="{{ $kategori }}"></option>
                    @endif
                @endforeach
            </datalist>

            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Penulis --}}
        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="author"
                   class="form-control @error('author') is-invalid @enderror"
                   value="{{ old('author', $berita->author) }}">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Gambar --}}
        <div class="mb-3">
            <label class="form-label">Gambar Berita</label>
            <input type="file" name="image"
                   class="form-control @error('image') is-invalid @enderror"
                   accept="image/*">

            <small class="text-muted">Format: jpg, jpeg, png • Max 10MB</small>

            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="mt-2">
                <img id="previewImage"
                     src="{{ $berita->image ? asset('storage/'.$berita->image) : '' }}"
                     class="img-thumbnail"
                     style="width:150px; height:100px; object-fit:cover; {{ $berita->image ? '' : 'display:none;' }}">
            </div>
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="konten" rows="6"
                      class="form-control @error('konten') is-invalid @enderror"
                      required>{{ old('konten', $berita->konten) }}</textarea>
            @error('konten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>

    </form>

</div>
@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('btnSimpan').addEventListener('click', function() {
    Swal.fire({
        title: 'Simpan perubahan?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEditBerita').submit();
        }
    });
});

// Preview gambar
const inputImage = document.getElementById('image');
const preview = document.getElementById('previewImage');

inputImage.addEventListener('change', () => {
    const file = inputImage.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
