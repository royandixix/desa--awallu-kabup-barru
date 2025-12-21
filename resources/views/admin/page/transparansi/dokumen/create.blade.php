@extends('admin.layouts.app')

@section('title', isset($dokumen) ? 'Edit Dokumen' : 'Tambah Dokumen')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold">{{ isset($dokumen) ? 'Edit Dokumen Transparansi' : 'Tambah Dokumen Transparansi' }}</h3>
        <p class="text-muted">
            {{ isset($dokumen) ? 'Perbarui data dokumen desa. Bisa mengganti file jika diperlukan.' : 'Masukkan data dokumen desa.' }}
        </p>
    </div>

    {{-- Form --}}
    <form id="formDokumen" 
          action="{{ isset($dokumen) ? route('admin.transparansi.dokumen.update', $dokumen->id) : route('admin.transparansi.dokumen.store') }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @if(isset($dokumen))
            @method('PUT')
        @endif

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Dokumen</label>
            <input type="text" id="judul" name="judul"
                class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul', $dokumen->judul ?? '') }}" required>

            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis --}}
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Dokumen</label>
            <select id="jenis" name="jenis"
                class="form-select @error('jenis') is-invalid @enderror" required>
                <option value="">-- pilih jenis --</option>
                <option value="POKOK" {{ old('jenis', $dokumen->jenis ?? '') == 'POKOK' ? 'selected' : '' }}>POKOK</option>
                <option value="PERUBAHAN" {{ old('jenis', $dokumen->jenis ?? '') == 'PERUBAHAN' ? 'selected' : '' }}>PERUBAHAN</option>
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
                value="{{ old('tahun', $dokumen->tahun ?? '') }}" placeholder="YYYY">

            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Dokumen</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal', $dokumen->tanggal ?? '') }}">

            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File Lama (hanya untuk edit) --}}
        @if(isset($dokumen))
        <div class="mb-3">
            <label class="form-label d-block">File Saat Ini</label>
            @if($dokumen->file)
                @php
                    $ext = strtolower(pathinfo($dokumen->file, PATHINFO_EXTENSION));
                    $label = $ext == 'pdf' ? 'Lihat PDF' : 'Lihat File';
                @endphp
                <a href="{{ asset('uploads/dokumen/' . $dokumen->file) }}" target="_blank" class="btn btn-outline-primary btn-sm">{{ $label }}</a>
            @else
                <p class="text-muted">Tidak ada file.</p>
            @endif
        </div>
        @endif

        {{-- Upload File --}}
        <div class="mb-3">
            <label for="file" class="form-label">{{ isset($dokumen) ? 'Ganti File (Opsional)' : 'Upload File' }}</label>
            <input type="file" id="file" name="file"
                class="form-control @error('file') is-invalid @enderror"
                accept=".pdf,.jpg,.jpeg,.png,.webp" {{ isset($dokumen) ? '' : 'required' }}>
            <small class="text-muted d-block">
                Format: PDF, JPG, PNG, WEBP • Max 20MB
                {{ isset($dokumen) ? '• Abaikan jika tidak ingin mengganti file.' : '' }}
            </small>

            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnSubmit" class="btn btn-primary">
                {{ isset($dokumen) ? 'Update Dokumen' : 'Simpan Dokumen' }}
            </button>
            <a href="{{ route('admin.transparansi.dokumen.index') }}" class="btn btn-secondary">Batal</a>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Sweetalert jika success --}}
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
document.getElementById('btnSubmit').addEventListener('click', function () {
    Swal.fire({
        title: '{{ isset($dokumen) ? "Update Dokumen?" : "Simpan Dokumen?" }}',
        text: "Pastikan semua data sudah sesuai.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '{{ isset($dokumen) ? "Ya, Update!" : "Ya, Simpan!" }}',
        cancelButtonText: 'Batal'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('formDokumen').submit();
        }
    });
});
</script>
@endpush
