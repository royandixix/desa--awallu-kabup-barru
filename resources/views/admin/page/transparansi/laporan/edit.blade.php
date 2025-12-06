@extends('admin.layouts.app')

@section('title', 'Edit Laporan')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Edit Laporan</h3>
    <p class="text-muted mb-3">Ubah data laporan desa.</p>

    <form id="formEdit" action="{{ route('admin.transparansi.laporan.update', $laporan->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Laporan</label>
            <input type="text" id="judul" name="judul"
                   class="form-control @error('judul') is-invalid @enderror"
                   value="{{ old('judul', $laporan->judul) }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi"
                      class="form-control @error('deskripsi') is-invalid @enderror"
                      rows="3">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                   class="form-control @error('tanggal') is-invalid @enderror"
                   value="{{ old('tanggal', $laporan->tanggal ? $laporan->tanggal->format('Y-m-d') : '') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label for="file" class="form-label">Upload Dokumen</label>
            <input type="file" id="file" name="file"
                   class="form-control @error('file') is-invalid @enderror"
                   accept=".pdf,.png,.jpg,.jpeg">

            @if ($laporan->file)
                <small class="text-info d-block mb-1">
                    File saat ini: <a href="{{ asset('storage/' . $laporan->file) }}" target="_blank">Lihat</a>
                </small>
            @endif

            <small class="text-muted d-block">Format: pdf, png, jpg • Max: 10MB</small>

            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnUpdate" class="btn btn-primary">Update Laporan</button>
        <a href="{{ route('admin.transparansi.laporan.index') }}" class="btn btn-secondary">Batal</a>
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
// Konfirmasi Update
document.getElementById('btnUpdate').addEventListener('click', function () {
    Swal.fire({
        title: 'Update Data?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEdit').submit();
        }
    });
});
</script>
@endpush
