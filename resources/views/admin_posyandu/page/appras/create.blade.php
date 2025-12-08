@extends('admin_posyandu.layouts.app')

@section('title', 'Tambah Data APPRAS')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #20c997 0%, #138d75 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-child me-2" style="color: #ffd700;"></i>
                        Tambah Data APPRAS
                    </h2>
                    <p class="text-white-50 mb-1 small">Masukkan data anak dan orang tua baru</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Tambah --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <form id="formTambahAPPRAS" action="{{ route('appras.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Anak</label>
                    <input type="text" name="nama_anak" class="form-control @error('nama_anak') is-invalid @enderror" 
                           value="{{ old('nama_anak') }}" required>
                    @error('nama_anak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Umur (Tahun)</label>
                    <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror" 
                           value="{{ old('umur') }}" required>
                    @error('umur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Orang Tua</label>
                    <input type="text" name="nama_ortu" class="form-control @error('nama_ortu') is-invalid @enderror" 
                           value="{{ old('nama_ortu') }}" required>
                    @error('nama_ortu') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                              rows="2" required>{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="button" id="btnSimpanAPPRAS" class="btn btn-success me-2">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('appras.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- ALERT SUCCESS --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        timer: 1600,
        showConfirmButton: false
    });
</script>
@endif

{{-- KONFIRMASI SIMPAN --}}
<script>
document.getElementById('btnSimpanAPPRAS').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Data?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if(result.isConfirmed) {
            document.getElementById('formTambahAPPRAS').submit();
        }
    });
});
</script>
@endpush
