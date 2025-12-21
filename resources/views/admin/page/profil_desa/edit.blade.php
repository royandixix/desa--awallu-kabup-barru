@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Profil Desa</h3>

    <form id="formEdit" 
          action="{{ route('admin.profil_desa.update', $item->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">

            {{-- JUDUL --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control"
                       value="{{ old('judul', $item->judul) }}" required>
            </div>

            {{-- DESKRIPSI SINGKAT --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Deskripsi Singkat</label>
                <textarea name="deskripsi_singkat" class="form-control"
                          rows="3">{{ old('deskripsi_singkat', $item->deskripsi_singkat) }}</textarea>
            </div>

            {{-- SEJARAH --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Sejarah</label>
                <textarea name="sejarah" class="form-control"
                          rows="5">{{ old('sejarah', $item->sejarah) }}</textarea>
            </div>

            {{-- WILAYAH ADMINISTRATIF --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Wilayah Administratif</label>
                <textarea name="wilayah_administratif" class="form-control"
                          rows="5">{{ old('wilayah_administratif', $item->wilayah_administratif) }}</textarea>
            </div>

            {{-- INFORMASI LAIN --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Desa</label>
                <input type="text" name="nama_desa" class="form-control"
                       value="{{ old('nama_desa', $item->nama_desa) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control"
                       value="{{ old('kecamatan', $item->kecamatan) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Kabupaten</label>
                <input type="text" name="kabupaten" class="form-control"
                       value="{{ old('kabupaten', $item->kabupaten) }}">
            </div>

            {{-- BATAS WILAYAH --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Batas Utara</label>
                <input type="text" name="batas_utara" class="form-control"
                       value="{{ old('batas_utara', $item->batas_utara) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Batas Selatan</label>
                <input type="text" name="batas_selatan" class="form-control"
                       value="{{ old('batas_selatan', $item->batas_selatan) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Batas Timur</label>
                <input type="text" name="batas_timur" class="form-control"
                       value="{{ old('batas_timur', $item->batas_timur) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Batas Barat</label>
                <input type="text" name="batas_barat" class="form-control"
                       value="{{ old('batas_barat', $item->batas_barat) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Jarak Dari Kabupaten</label>
                <input type="text" name="jarak_kabupaten" class="form-control"
                       value="{{ old('jarak_kabupaten', $item->jarak_kabupaten) }}">
            </div>

            {{-- GOOGLE MAPS --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Link Google Maps (otomatis dikonversi)</label>
                <input type="text" name="koordinat" id="koordinat" class="form-control"
                       value="{{ old('koordinat', $item->koordinat) }}">
            </div>

            <div class="col-md-12 mb-3" id="preview-maps">
                @if($item->koordinat)
                    <iframe src="{{ $item->koordinat }}" width="100%" height="250" style="border:0;" loading="lazy"></iframe>
                @endif
            </div>

            {{-- GAMBAR --}}
            <div class="col-md-12 mb-3">
                <label class="form-label">Gambar Header (upload baru = hapus lama)</label>
                <input type="file" id="gambar_header" name="gambar_header[]" class="form-control" multiple>
            </div>

            {{-- PREVIEW GAMBAR BARU --}}
            <div class="col-md-12" id="preview"></div>

            {{-- GAMBAR LAMA --}}
            @if ($item->gambar_header)
                <div class="col-12 mb-3">
                    <label class="form-label d-block">Gambar Lama:</label>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach (json_decode($item->gambar_header) as $img)
                            <img src="{{ asset('uploads/profil_desa/' . $img) }}"
                                 style="width: 200px; height: auto; border-radius: 8px;">
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

        <button type="button" id="btnSimpan" class="btn btn-primary mt-3">Simpan Perubahan</button>
        <a href="{{ route('admin.profil_desa.index') }}" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

{{-- SWEET ALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    showConfirmButton: true
});
</script>
@endif

<script>
    // KONFIRMASI SIMPAN
    document.getElementById('btnSimpan').addEventListener('click', function(){
        Swal.fire({
            title: 'Yakin Simpan Perubahan?',
            text: "Pastikan data sudah benar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formEdit').submit();
            }
        })
    });

    // PREVIEW GAMBAR BARU
    document.getElementById('gambar_header').addEventListener('change', function(event) {
        const preview = document.getElementById('preview');
        preview.innerHTML = '';

        Array.from(event.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '150px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.style.marginRight = '5px';
                img.style.marginBottom = '5px';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    // KONVERSI GOOGLE MAPS
    function convertToEmbed(url) {
        if (!url) return '';
        if (url.includes("google.com/maps/embed")) return url;
        if (url.includes("maps.app.goo.gl")) return url.replace("maps.app.goo.gl", "www.google.com/maps");

        const regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
        const match = url.match(regex);
        if (match) {
            return `https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d0!2d${match[2]}!3d${match[1]}`;
        }
        return url;
    }

    const koordinatInput = document.getElementById('koordinat');
    const previewMaps = document.getElementById('preview-maps');

    koordinatInput.addEventListener('input', function() {
        let url = this.value.trim();
        if (url.length > 3) {
            let embedUrl = convertToEmbed(url);
            previewMaps.innerHTML = `<iframe src="${embedUrl}" width="100%" height="250" style="border:0;" loading="lazy"></iframe>`;
        } else {
            previewMaps.innerHTML = '';
        }
    });
</script>
@endsection
