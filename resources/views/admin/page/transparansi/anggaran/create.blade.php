@extends('admin.layouts.app')

@section('title', 'Tambah Anggaran')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Data Anggaran</h3>
    <p class="text-muted mb-3">Masukkan data anggaran desa baru beserta dokumennya.</p>

    <form id="formTambah" action="{{ route('admin.transparansi.anggaran.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Anggaran</label>
            <input type="text" id="judul" name="judul"
                   class="form-control @error('judul') is-invalid @enderror"
                   value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis --}}
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select id="jenis" name="jenis" 
                    class="form-select @error('jenis') is-invalid @enderror" required>
                <option value="POKOK" {{ old('jenis') == 'POKOK' ? 'selected' : '' }}>POKOK</option>
                <option value="PERUBAHAN" {{ old('jenis') == 'PERUBAHAN' ? 'selected' : '' }}>PERUBAHAN</option>
            </select>
            @error('jenis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tahun --}}
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" id="tahun" name="tahun"
                   class="form-control @error('tahun') is-invalid @enderror"
                   value="{{ old('tahun') }}" placeholder="YYYY">
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                   class="form-control @error('tanggal') is-invalid @enderror"
                   value="{{ old('tanggal') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pemasukan --}}
        <div class="mb-3">
            <label for="pemasukan" class="form-label">Pemasukan</label>
            <input type="text" id="pemasukan" name="pemasukan"
                   class="form-control rupiah @error('pemasukan') is-invalid @enderror"
                   value="{{ old('pemasukan') }}" placeholder="Masukkan angka pemasukan">
            @error('pemasukan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pengeluaran --}}
        <div class="mb-3">
            <label for="pengeluaran" class="form-label">Pengeluaran</label>
            <input type="text" id="pengeluaran" name="pengeluaran"
                   class="form-control rupiah @error('pengeluaran') is-invalid @enderror"
                   value="{{ old('pengeluaran') }}" placeholder="Masukkan angka pengeluaran">
            @error('pengeluaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label for="file" class="form-label">Upload Dokumen</label>
            <input type="file" id="file" name="file"
                   class="form-control @error('file') is-invalid @enderror"
                   accept=".pdf,.doc,.docx,.xlsx,.png,.jpg,.jpeg">

            <small class="text-muted d-block">Format: pdf, doc, docx, xlsx, png, jpg • Max: 10MB</small>

            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan Anggaran</button>
        <a href="{{ route('admin.transparansi.anggaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection


{{-- ============================================================= --}}
{{-- 💡 SCRIPT WAJIB DIMASUKKAN KE @push('scripts') BUKAN @section --}}
{{-- ============================================================= --}}
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
// ───────────────────────────────────────────────
// KONFIRMASI SIMPAN
// ───────────────────────────────────────────────
document.getElementById('btnSimpan').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Data?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambah').submit();
        }
    });
});


// ───────────────────────────────────────────────
// FORMAT RUPIAH KETIKA MENGETIK
// ───────────────────────────────────────────────
document.querySelectorAll('.rupiah').forEach(input => {
    input.addEventListener('input', function () {
        let angka = this.value.replace(/\D/g, "");
        this.value = new Intl.NumberFormat('id-ID').format(angka);
    });
});


// ───────────────────────────────────────────────
// FORMAT RUPIAH KETIKA HALAMAN DIMUAT (old value)
// ───────────────────────────────────────────────
document.querySelectorAll('.rupiah').forEach(input => {
    let angka = input.value.replace(/\D/g, "");
    if (angka) {
        input.value = new Intl.NumberFormat('id-ID').format(angka);
    }
});


// ───────────────────────────────────────────────
// HAPUS TITIK SEBELUM SUBMIT (kirim angka murni)
// ───────────────────────────────────────────────
document.getElementById('formTambah').addEventListener('submit', function () {
    document.querySelectorAll('.rupiah').forEach(input => {
        input.value = input.value.replace(/\./g, "");
    });
});
</script>
@endpush
