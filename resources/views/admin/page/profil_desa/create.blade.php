@extends('admin.layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Profil Desa</h3>

    <form action="{{ route('admin.profil_desa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Judul -->
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
        </div>

        <!-- Deskripsi Singkat -->
        <div class="mb-3">
            <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
            <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" rows="3">{{ old('deskripsi_singkat') }}</textarea>
        </div>

        <!-- Gambar Header -->
        <div class="mb-3">
            <label for="gambar_header" class="form-label">Gambar Header (Bisa lebih dari 1)</label>
            <input type="file" class="form-control" id="gambar_header" name="gambar_header[]" multiple accept="image/*">
            <div id="preview" class="d-flex flex-wrap gap-2 mt-2"></div>
        </div>

        <!-- Sejarah -->
        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            <textarea class="form-control" id="sejarah" name="sejarah" rows="5">{{ old('sejarah') }}</textarea>
        </div>

        <!-- Wilayah Administratif -->
        <div class="mb-3">
            <label for="wilayah_administratif" class="form-label">Wilayah Administratif</label>
            <textarea class="form-control" id="wilayah_administratif" name="wilayah_administratif" rows="3">{{ old('wilayah_administratif') }}</textarea>
        </div>

        <!-- Nama Desa -->
        <div class="mb-3">
            <label for="nama_desa" class="form-label">Nama Desa</label>
            <input type="text" class="form-control" id="nama_desa" name="nama_desa" value="{{ old('nama_desa') }}">
        </div>

        <!-- Kecamatan -->
        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
        </div>

        <!-- Kabupaten -->
        <div class="mb-3">
            <label for="kabupaten" class="form-label">Kabupaten</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ old('kabupaten') }}">
        </div>

        <!-- Batas Wilayah -->
        <div class="mb-3">
            <label for="batas_utara" class="form-label">Batas Utara</label>
            <input type="text" class="form-control" id="batas_utara" name="batas_utara" value="{{ old('batas_utara') }}">
        </div>
        <div class="mb-3">
            <label for="batas_selatan" class="form-label">Batas Selatan</label>
            <input type="text" class="form-control" id="batas_selatan" name="batas_selatan" value="{{ old('batas_selatan') }}">
        </div>
        <div class="mb-3">
            <label for="batas_timur" class="form-label">Batas Timur</label>
            <input type="text" class="form-control" id="batas_timur" name="batas_timur" value="{{ old('batas_timur') }}">
        </div>
        <div class="mb-3">
            <label for="batas_barat" class="form-label">Batas Barat</label>
            <input type="text" class="form-control" id="batas_barat" name="batas_barat" value="{{ old('batas_barat') }}">
        </div>

        <!-- Koordinat -->
        <div class="mb-3">
            <label for="koordinat" class="form-label">Google Maps (Boleh link biasa)</label>
            <input type="text" class="form-control" id="koordinat" name="koordinat" placeholder="Tempel link Google Maps di sini" value="{{ old('koordinat') }}">
            <div class="mt-2" id="preview-maps"></div>
        </div>

        <!-- Jarak ke Kabupaten -->
        <div class="mb-3">
            <label for="jarak_kabupaten" class="form-label">Jarak ke Kabupaten</label>
            <input type="text" class="form-control" id="jarak_kabupaten" name="jarak_kabupaten" value="{{ old('jarak_kabupaten') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Profil Desa</button>
        <a href="{{ route('admin.profil_desa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
    // ===============================
    // PREVIEW GAMBAR SEBELUM UPLOAD
    // ===============================
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

    // ===============================
    // KONVERSI LINK GOOGLE MAPS → EMBED
    // ===============================
    function convertToEmbed(url) {
        if (!url) return '';
        if (url.includes("google.com/maps/embed")) return url;
        if (url.includes("maps.app.goo.gl")) return url.replace("maps.app.goo.gl", "www.google.com/maps");

        const regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
        const match = url.match(regex);
        if (match) {
            const lat = match[1];
            const lng = match[2];
            return `https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d0!2d${lng}!3d${lat}!2m3!1f0!2f0!3f0`;
        }
        return url;
    }

    // ===============================
    // PREVIEW PETA GOOGLE MAPS
    // ===============================
    const koordinatInput = document.getElementById('koordinat');
    const previewMaps = document.getElementById('preview-maps');

    koordinatInput.addEventListener('input', function() {
        let url = this.value.trim();
        if (url.length > 0) {
            let embedUrl = convertToEmbed(url);
            previewMaps.innerHTML = `<iframe src="${embedUrl}" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>`;
        } else {
            previewMaps.innerHTML = '';
        }
    });
</script>
@endsection
