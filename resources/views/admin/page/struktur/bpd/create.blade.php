@extends('admin.layouts.app')

@section('title', 'Tambah Gambar BPD')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4"
                     style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-plus-circle me-2" style="color:#ffd700;"></i>
                        Tambah Gambar BPD
                    </h2>
                    <p class="text-white-50 mb-1 small">
                        Unggah foto struktural BPD baru
                    </p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.struktur.bpd.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                {{-- Upload Foto --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Upload Foto BPD
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control @error('foto') is-invalid @enderror"
                           accept=".jpg,.jpeg,.png,.webp"
                           required>

                    <small class="text-muted">
                        Format: JPG, JPEG, PNG, WEBP • Max 4MB
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Preview --}}
                <div class="text-center mt-3 mb-4">
                    <img id="previewImage"
                         class="img-fluid rounded shadow d-none"
                         style="max-width: 300px;">
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.struktur.bpd.index') }}"
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-dark">
                        <i class="fas fa-save"></i> Simpan Gambar
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.querySelector('input[name="foto"]').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        const img = document.getElementById('previewImage');
        img.src = event.target.result;
        img.classList.remove('d-none');
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
