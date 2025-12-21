@extends('admin.layouts.app')

@section('title', 'Edit Dokumen')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Edit Dokumen Transparansi</h3>
    <p class="text-muted mb-3">Perbarui data dokumen transparansi desa.</p>

    <form id="formEdit" action="{{ route('admin.transparansi.dokumen.update', $dokumen->id) }}" method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Dokumen</label>
            <input type="text" id="judul" name="judul"
                class="form-control @error('judul') is-invalid @enderror" 
                value="{{ old('judul', $dokumen->judul) }}" required>

            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis --}}
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Dokumen</label>
            <select id="jenis" name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                <option value="">-- pilih jenis --</option>
                <option value="POKOK" {{ old('jenis', $dokumen->jenis) == 'POKOK' ? 'selected' : '' }}>POKOK</option>
                <option value="PERUBAHAN" {{ old('jenis', $dokumen->jenis) == 'PERUBAHAN' ? 'selected' : '' }}>PERUBAHAN</option>
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
                value="{{ old('tahun', $dokumen->tahun) }}" placeholder="YYYY">

            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Dokumen</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal', optional($dokumen->tanggal)->format('Y-m-d')) }}">

            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label class="form-label">File Dokumen (Opsional)</label>

            @if ($dokumen->file)
                <p class="mb-2">
                    <strong>File saat ini:</strong><br>
                    @php $ext = strtolower(pathinfo($dokumen->file, PATHINFO_EXTENSION)); @endphp
                    @if ($ext === 'pdf')
                        <a href="{{ asset('uploads/dokumen/' . $dokumen->file) }}" target="_blank"
                            class="btn btn-sm btn-outline-primary">Lihat PDF</a>
                    @elseif(in_array($ext, ['jpg','jpeg','png','webp']))
                        <a href="{{ asset('uploads/dokumen/' . $dokumen->file) }}" target="_blank"
                            class="btn btn-sm btn-outline-success">Lihat Gambar</a>
                    @else
                        <span class="text-muted">Tidak dapat pratinjau</span>
                    @endif
                </p>
            @endif

            <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror"
                accept=".pdf,.jpg,.jpeg,.png,.webp">

            <small class="text-muted d-block">Jika tidak diganti, biarkan kosong. Maks: 20MB</small>

            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <button type="button" id="btnUpdate" class="btn btn-primary">Update Dokumen</button>
        <a href="{{ route('admin.transparansi.dokumen.index') }}" class="btn btn-secondary">Kembali</a>

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
        text: '{{ session('success') }}',
    });
</script>
@endif

<script>
// KONFIRMASI UPDATE
document.getElementById('btnUpdate').addEventListener('click', function() {
    Swal.fire({
        title: 'Update Dokumen?',
        text: "Data akan diperbarui sesuai perubahan.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('formEdit').submit();
        }
    });
});
</script>
@endpush
