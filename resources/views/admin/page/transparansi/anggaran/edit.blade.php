@extends('admin.layouts.app')

@section('title', 'Edit Anggaran')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Edit Data Anggaran</h3>
    <p class="text-muted mb-3">Perbarui informasi anggaran desa.</p>

    <form action="{{ route('admin.transparansi.anggaran.update', $anggaran->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label class="form-label">Judul Anggaran</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                   name="judul" value="{{ old('judul', $anggaran->judul) }}" required>
            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Jenis --}}
        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <select class="form-select @error('jenis') is-invalid @enderror" 
                    name="jenis" required>
                <option value="POKOK" {{ $anggaran->jenis == 'POKOK' ? 'selected' : '' }}>POKOK</option>
                <option value="PERUBAHAN" {{ $anggaran->jenis == 'PERUBAHAN' ? 'selected' : '' }}>PERUBAHAN</option>
            </select>
            @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Tahun --}}
        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" class="form-control @error('tahun') is-invalid @enderror" 
                   name="tahun" value="{{ old('tahun', $anggaran->tahun) }}" placeholder="YYYY">
            @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                   name="tanggal" value="{{ old('tanggal', $anggaran->tanggal) }}">
            @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Pemasukan --}}
        <div class="mb-3">
            <label class="form-label">Pemasukan</label>
            <input type="text" 
                   class="form-control rupiah @error('pemasukan') is-invalid @enderror"
                   name="pemasukan"
                   value="{{ old('pemasukan', number_format($anggaran->pemasukan ?? 0, 0, ',', '.')) }}">
            @error('pemasukan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Pengeluaran --}}
        <div class="mb-3">
            <label class="form-label">Pengeluaran</label>
            <input type="text" 
                   class="form-control rupiah @error('pengeluaran') is-invalid @enderror"
                   name="pengeluaran"
                   value="{{ old('pengeluaran', number_format($anggaran->pengeluaran ?? 0, 0, ',', '.')) }}">
            @error('pengeluaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label class="form-label">Upload Dokumen (Opsional)</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" 
                   name="file" accept=".pdf,.doc,.docx,.xlsx,.png,.jpg,.jpeg">

            <small class="text-muted">Format: pdf, doc, docx, xlsx, png, jpg | Max 10MB</small>
            @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if($anggaran->file)
                <p class="mt-2">
                    <strong>File saat ini:</strong> 
                    <a href="{{ asset('storage/'.$anggaran->file) }}" target="_blank">Lihat Dokumen</a>
                </p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Anggaran</button>
        <a href="{{ route('admin.transparansi.anggaran.index') }}" class="btn btn-secondary">Batal</a>

    </form>
</div>

@push('scripts')
<script>
    // Format Rupiah otomatis
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('rupiah')) {
            let angka = e.target.value.replace(/\./g, '');
            e.target.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    });

    // Hapus titik sebelum submit
    document.querySelector('form').addEventListener('submit', function() {
        document.querySelectorAll('.rupiah').forEach(function(input) {
            input.value = input.value.replace(/\./g, '');
        });
    });
</script>
@endpush

@endsection
