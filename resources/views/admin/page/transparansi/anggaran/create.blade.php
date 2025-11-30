@extends('admin.layouts.app')

@section('title', 'Tambah Anggaran')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Tambah Data Anggaran</h3>
    <p class="text-muted mb-3">Masukkan data anggaran desa baru beserta dokumennya.</p>

    <form id="formTambah" action="{{ route('admin.transparansi.anggaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Anggaran</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                   id="judul" name="judul" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis --}}
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
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
            <input type="number" class="form-control @error('tahun') is-invalid @enderror" 
                   id="tahun" name="tahun" value="{{ old('tahun') }}" placeholder="YYYY">
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                   id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pemasukan --}}
        <div class="mb-3">
            <label for="pemasukan" class="form-label">Pemasukan</label>
            <input type="number" class="form-control @error('pemasukan') is-invalid @enderror"
                   id="pemasukan" name="pemasukan" value="{{ old('pemasukan') }}" placeholder="Masukkan angka pemasukan">
            @error('pemasukan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pengeluaran --}}
        <div class="mb-3">
            <label for="pengeluaran" class="form-label">Pengeluaran</label>
            <input type="number" class="form-control @error('pengeluaran') is-invalid @enderror"
                   id="pengeluaran" name="pengeluaran" value="{{ old('pengeluaran') }}" placeholder="Masukkan angka pengeluaran">
            @error('pengeluaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label for="file" class="form-label">Upload Dokumen</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" 
                   id="file" name="file" accept=".pdf,.doc,.docx,.xlsx,.png,.jpg,.jpeg">

            <small class="text-muted">Format: pdf, doc, docx, xlsx, png, jpg | Max: 10MB</small>

            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan Anggaran</button>
        <a href="{{ route('admin.transparansi.anggaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection


@section('script')
{{-- SWEET ALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- SWEET ALERT SUCCESS --}}
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
    // KONFIRMASI SIMPAN
    document.getElementById('btnSimpan').addEventListener('click', function(){
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
        })
    });
</script>
@endsection
