@extends('admin.layouts.app')

@section('title', 'Edit Gambar BPD')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4"
                     style="background: linear-gradient(135deg, #ff9966 0%, #ff5e62 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-edit me-2" style="color:#ffd700;"></i>
                        Edit Gambar BPD
                    </h2>
                    <p class="text-white-50 mb-1 small">
                        Perbarui foto struktural BPD
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

            <form action="{{ route('admin.struktur.bpd.update', $bpd->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Foto Lama --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Saat Ini</label>
                    <div class="text-center mt-2">
                        @if($bpd->foto && file_exists(public_path($bpd->foto)))
                            <img src="{{ asset($bpd->foto) }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="max-width: 300px;">
                        @else
                            <p class="text-muted">Foto tidak ditemukan</p>
                        @endif
                    </div>
                </div>

                {{-- Upload Baru --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Ganti Foto (Opsional)
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control @error('foto') is-invalid @enderror"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Format: JPG, JPEG, PNG, WEBP • Max 4MB
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Preview Foto Baru --}}
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
                        <i class="fas fa-save"></i> Perbarui Foto
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
