{{-- resources/views/admin/page/struktur/bpd/create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Tambah Gambar BPD')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-plus-circle me-2" style="color: #ffd700;"></i>
                        Tambah Gambar BPD
                    </h2>
                    <p class="text-white-50 mb-1 small">Unggah foto struktural BPD baru</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Input --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.struktur.bpd.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Input Foto --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                </div>

                {{-- Preview Gambar --}}
                <div class="mt-3 mb-4 text-center">
                    <img id="previewImage" src="#" alt="Preview" class="img-fluid rounded shadow-sm d-none"
                         style="max-width: 250px;">
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.struktur.bpd.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-dark">
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
    // Preview gambar otomatis
    document.querySelector('input[name="foto"]').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let preview = document.getElementById('previewImage');
            preview.src = reader.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endpush
