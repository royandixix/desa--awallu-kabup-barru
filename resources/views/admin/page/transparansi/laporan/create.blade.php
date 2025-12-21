@extends('admin.layouts.app')

@section('title', 'Tambah Laporan Kegiatan')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Tambah Laporan Kegiatan</h3>
    <p class="text-muted mb-3">Masukkan data laporan baru beserta foto atau berkas PDF jika diperlukan.</p>

    <form id="formTambahLaporan" action="{{ route('admin.transparansi.laporan.store') }}" method="POST"
        enctype="multipart/form-data" class="card shadow-sm p-4 rounded-3 border-0">
        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label fw-semibold">Judul Laporan</label>
            <input type="text" id="judul" name="judul"
                class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label fw-semibold">Deskripsi Laporan</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
            <small class="text-muted d-block">Tuliskan keterangan lengkap terkait laporan kegiatan.</small>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Lokasi --}}
        <div class="mb-3">
            <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi"
                class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" required>
            @error('lokasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Anggaran --}}
        <div class="mb-3">
            <label for="anggaran" class="form-label fw-semibold">Anggaran (Opsional)</label>
            <input type="text" id="anggaran" name="anggaran"
                class="form-control @error('anggaran') is-invalid @enderror" value="{{ old('anggaran') }}">
            <small class="text-muted d-block">Masukkan jumlah, otomatis format Rupiah.</small>
            @error('anggaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label for="foto" class="form-label fw-semibold">Upload Foto (Opsional)</label>
            <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
            <small class="text-muted d-block">Abaikan jika tidak ingin menambahkan foto.</small>
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File PDF/DOC --}}
        <div class="mb-3">
            <label for="file_path" class="form-label fw-semibold">Upload Berkas PDF/DOC (Opsional)</label>
            <input type="file" id="file_path" name="file_path" class="form-control @error('file_path') is-invalid @enderror" accept=".pdf,.doc,.docx">
            <small class="text-muted d-block">Abaikan jika tidak ingin menambahkan berkas.</small>
            @error('file_path')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnSimpanLaporan" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan Laporan
            </button>
            <a href="{{ route('admin.transparansi.laporan.index') }}" class="btn btn-secondary">
                <i class="fas fa-times me-1"></i> Batal
            </a>
        </div>
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
    timer: 1500,
    showConfirmButton: false
});
</script>
@endif

<script>
// Konfirmasi Simpan
document.getElementById('btnSimpanLaporan').addEventListener('click', function() {
    Swal.fire({
        title: 'Simpan Laporan?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambahLaporan').submit();
        }
    });
});

// Format Rupiah realtime
const anggaranInput = document.getElementById('anggaran');
anggaranInput.addEventListener('input', function(e) {
    let value = this.value.replace(/\D/g,''); // hapus non-digit
    if(value) {
        value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(value);
    }
    this.value = value;
});
</script>
@endpush
