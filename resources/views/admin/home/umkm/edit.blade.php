@extends('admin.layouts.app')

@section('title','Edit UMKM')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Edit UMKM</h3>

    <form id="formEditUMKM" action="{{ route('admin.home.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Pengusaha --}}
        <div class="mb-3">
            <label for="nama_pengusaha">Nama Pengusaha</label>
            <input type="text" id="nama_pengusaha" name="nama_pengusaha" class="form-control @error('nama_pengusaha') is-invalid @enderror" value="{{ old('nama_pengusaha', $umkm->nama_pengusaha) }}" required>
            @error('nama_pengusaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Nama Usaha --}}
        <div class="mb-3">
            <label for="nama_usaha">Nama Usaha</label>
            <input type="text" id="nama_usaha" name="nama_usaha" class="form-control @error('nama_usaha') is-invalid @enderror" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
            @error('nama_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Jenis Usaha --}}
        <div class="mb-3">
            <label for="jenis_usaha">Jenis Usaha</label>
            <input type="text" id="jenis_usaha" name="jenis_usaha" class="form-control @error('jenis_usaha') is-invalid @enderror" value="{{ old('jenis_usaha', $umkm->jenis_usaha) }}" required>
            @error('jenis_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2">{{ old('alamat', $umkm->alamat) }}</textarea>
            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Kontak --}}
        <div class="mb-3">
            <label for="kontak">Kontak</label>
            <input type="text" id="kontak" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak', $umkm->kontak) }}">
            @error('kontak')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Harga --}}
        <div class="mb-3">
            <label for="harga">Harga</label>
            <input type="text" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $umkm->harga) }}" placeholder="Rp 0">
            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Foto UMKM --}}
        <div class="mb-3">
            <label for="foto_umkm">Foto UMKM</label>
            <input type="file" id="foto_umkm" name="foto_umkm" class="form-control @error('foto_umkm') is-invalid @enderror" accept="image/*">
            <div class="mt-2">
                <img id="previewUMKM" src="{{ $umkm->foto_umkm ? asset('images/'.$umkm->foto_umkm) : '#' }}" style="{{ $umkm->foto_umkm ? '' : 'display:none;' }}; width:150px; height:100px; object-fit:cover;" class="img-thumbnail">
            </div>
        </div>

        {{-- Foto Pengusaha --}}
        <div class="mb-3">
            <label for="foto_pengusaha">Foto Pengusaha</label>
            <input type="file" id="foto_pengusaha" name="foto_pengusaha" class="form-control @error('foto_pengusaha') is-invalid @enderror" accept="image/*">
            <div class="mt-2">
                <img id="previewPengusaha" src="{{ $umkm->foto_pengusaha ? asset('images/'.$umkm->foto_pengusaha) : '#' }}" style="{{ $umkm->foto_pengusaha ? '' : 'display:none;' }}; width:150px; height:100px; object-fit:cover;" class="img-thumbnail">
            </div>
        </div>

        {{-- Kode UMKM --}}
        <div class="mb-3">
            <label for="kode_umkm">Kode UMKM</label>
            <input type="text" id="kode_umkm" name="kode_umkm" class="form-control @error('kode_umkm') is-invalid @enderror" value="{{ old('kode_umkm', $umkm->kode_umkm) }}">
            @error('kode_umkm')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Produk Dinamis --}}
        <div id="produkContainer" class="mb-3">
            <h5>Produk UMKM</h5>
            @if(old('produk', $umkm->produk))
                @foreach(old('produk', $umkm->produk) as $produk)
                <div class="produk-item mb-3 border p-3 rounded bg-light">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold">Produk</span>
                        <button type="button" class="btn btn-danger btn-sm remove-produk">Hapus</button>
                    </div>
                    <label>Nama Produk</label>
                    <input type="text" name="produk[nama][]" class="form-control mb-1" value="{{ $produk['nama'] ?? '' }}">
                    <label>Harga</label>
                    <input type="text" name="produk[harga][]" class="form-control mb-1" value="{{ $produk['harga'] ?? '' }}">
                    <label>Deskripsi</label>
                    <textarea name="produk[deskripsi][]" class="form-control mb-1">{{ $produk['deskripsi'] ?? '' }}</textarea>
                    <label>Foto Produk</label>
                    <input type="file" name="produk[foto][]" class="form-control">
                </div>
                @endforeach
            @else
            <div class="produk-item mb-3 border p-3 rounded bg-light">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold">Produk</span>
                    <button type="button" class="btn btn-danger btn-sm remove-produk">Hapus</button>
                </div>
                <label>Nama Produk</label>
                <input type="text" name="produk[nama][]" class="form-control mb-1">
                <label>Harga</label>
                <input type="text" name="produk[harga][]" class="form-control mb-1">
                <label>Deskripsi</label>
                <textarea name="produk[deskripsi][]" class="form-control mb-1"></textarea>
                <label>Foto Produk</label>
                <input type="file" name="produk[foto][]" class="form-control">
            </div>
            @endif
        </div>
        <button type="button" id="tambahProduk" class="btn btn-primary btn-sm mb-3">Tambah Produk</button>

        {{-- Tombol Simpan & Batal --}}
        <div class="d-flex gap-2">
            <button type="button" id="btnSimpan" class="btn btn-success flex-grow-1">Simpan UMKM</button>
            <a href="{{ route('admin.home.umkm.index') }}" class="btn btn-secondary flex-grow-1">Batal</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Konfirmasi simpan
document.getElementById('btnSimpan').addEventListener('click', function(){
    Swal.fire({
        title: 'Simpan UMKM?',
        text: 'Pastikan semua data sudah benar.',
        icon: 'warning',
        showCancelButton:true,
        confirmButtonText:'Ya, Simpan!',
        cancelButtonText:'Batal'
    }).then(result => {
        if(result.isConfirmed){
            document.getElementById('formEditUMKM').submit();
        }
    });
});

// Preview gambar UMKM
const fotoUMKM = document.getElementById('foto_umkm');
const previewUMKM = document.getElementById('previewUMKM');
fotoUMKM.addEventListener('change', function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => {
            previewUMKM.src = e.target.result;
            previewUMKM.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        previewUMKM.src='#';
        previewUMKM.style.display='none';
    }
});

// Preview gambar Pengusaha
const fotoPengusaha = document.getElementById('foto_pengusaha');
const previewPengusaha = document.getElementById('previewPengusaha');
fotoPengusaha.addEventListener('change', function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => {
            previewPengusaha.src = e.target.result;
            previewPengusaha.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        previewPengusaha.src='#';
        previewPengusaha.style.display='none';
    }
});

// Tambah produk dinamis
document.getElementById('tambahProduk').addEventListener('click', function(){
    const container = document.getElementById('produkContainer');
    const item = container.querySelector('.produk-item');
    const clone = item.cloneNode(true);
    clone.querySelectorAll('input, textarea').forEach(i => i.value='');
    container.appendChild(clone);

    // event remove
    clone.querySelector('.remove-produk').addEventListener('click', function(){
        clone.remove();
    });
});

// remove produk
document.getElementById('produkContainer').addEventListener('click', function(e){
    if(e.target && e.target.classList.contains('remove-produk')){
        e.target.closest('.produk-item').remove();
    }
});

// Format harga Rupiah
document.querySelectorAll('input[name="harga"], input[name="produk[harga][]"]').forEach(input=>{
    input.addEventListener('input',function(){
        let value = this.value.replace(/\D/g,'');
        if(value) this.value = 'Rp '+parseInt(value).toLocaleString('id-ID');
        else this.value='';
    });
});
</script>
@endpush
