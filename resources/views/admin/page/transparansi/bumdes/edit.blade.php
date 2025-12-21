@extends('admin.layouts.app')

@section('title', 'Edit Dokumen BUMDes & KOPDes')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold">Edit Dokumen BUMDes & KOPDes</h3>
        <p class="text-muted">Perbarui data dokumen transparansi beserta file-nya jika diperlukan.</p>
    </div>

    {{-- Form Edit --}}
    <form id="formEditBumdes" action="{{ route('admin.transparansi.bumdes.update', $bumde->id) }}" method="POST"
        enctype="multipart/form-data" class="card shadow-sm p-4 rounded-3 border-0">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label fw-semibold">Judul Dokumen</label>
            <input type="text" id="judul" name="judul"
                class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul', $bumde->judul) }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="kategori" class="form-label fw-semibold">Kategori</label>
            <select id="kategori" name="kategori"
                class="form-select @error('kategori') is-invalid @enderror" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="BUMDes" @if(($bumde->kategori ?? old('kategori')) == 'BUMDes') selected @endif>BUMDes</option>
                <option value="KOPDes" @if(($bumde->kategori ?? old('kategori')) == 'KOPDes') selected @endif>KOPDes</option>
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal', $bumde->tanggal) }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File Lama --}}
        <div class="mb-3">
            <label class="form-label fw-semibold d-block">File Saat Ini</label>
            @if ($bumde->file)
                @php
                    $ext = strtolower(pathinfo($bumde->file, PATHINFO_EXTENSION));
                    $fileLabel = match($ext) {
                        'pdf' => 'Lihat PDF',
                        'jpg','jpeg','png','webp' => 'Lihat Gambar',
                        'xls','xlsx' => 'Lihat Excel',
                        default => 'Lihat File',
                    };
                    $fileUrl = ($ext == 'xls' || $ext == 'xlsx')
                        ? 'https://view.officeapps.live.com/op/embed.aspx?src='.urlencode(asset('uploads/bumdes/' . $bumde->file))
                        : asset('uploads/bumdes/' . $bumde->file);
                @endphp
                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-outline-primary btn-sm">{{ $fileLabel }}</a>
            @else
                <p class="text-muted">Tidak ada file.</p>
            @endif
        </div>

        {{-- Upload File Baru --}}
        <div class="mb-3">
            <label for="file" class="form-label fw-semibold">Ganti File Dokumen (Opsional)</label>
            <input type="file" id="file" name="file"
                class="form-control @error('file') is-invalid @enderror"
                accept=".pdf,.jpg,.jpeg,.png,.webp,.xls,.xlsx">
            <small class="text-muted d-block">
                Abaikan jika tidak ingin mengganti file. Format: PDF/Gambar/Excel • Max: 10MB
            </small>
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUpdateBumdes" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update Dokumen
            </button>
            <a href="{{ route('admin.transparansi.bumdes.index') }}" class="btn btn-secondary">
                <i class="fas fa-times me-1"></i> Batal
            </a>
        </div>
    </form>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    timer: 1500,
    showConfirmButton: false
});
</script>
@endif

<script>
// Konfirmasi Update
document.getElementById('btnUpdateBumdes').addEventListener('click', function() {
    Swal.fire({
        title: 'Update Dokumen?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEditBumdes').submit();
        }
    });
});
</script>
@endpush
