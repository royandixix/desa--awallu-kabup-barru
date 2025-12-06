@extends('admin.layouts.app')

@section('title', 'Upload Foto Karang Taruna')

@section('content')
<div class="container py-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-upload me-2" style="color: #ffd700;"></i>
                        Upload Foto Karang Taruna
                    </h2>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Form Upload --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fas fa-image me-2"></i>Form Upload</h5>
                </div>
                <div class="card-body p-4">

                    <form id="formUpload" action="{{ route('admin.struktur.karang_taruna.store') }}" 
                          method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-bold">
                                Pilih Foto <span class="text-danger">*</span>
                            </label>
                            <input type="file" 
                                   name="gambar" 
                                   id="gambar" 
                                   class="form-control @error('gambar') is-invalid @enderror" 
                                   accept=".jpg,.jpeg,.png,.webp"
                                   required>
                            
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-info-circle me-1"></i>
                                Format: JPG, PNG, WEBP (Max 2MB)
                            </small>

                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload me-1"></i> Upload Foto
                            </button>
                            <a href="{{ route('admin.struktur.karang_taruna.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- Preview Card --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Preview Foto</h5>
                </div>
                <div class="card-body p-4 text-center">
                    
                    <div id="previewContainer" style="display: none;">
                        <img id="previewImage" 
                             src="" 
                             alt="Preview" 
                             class="img-fluid rounded shadow-sm"
                             style="max-height: 400px; object-fit: contain;">
                        
                        <div class="mt-3">
                            <p class="mb-1 text-muted small">
                                <strong>Nama File:</strong> <span id="fileName">-</span>
                            </p>
                            <p class="mb-0 text-muted small">
                                <strong>Ukuran:</strong> <span id="fileSize">-</span>
                            </p>
                        </div>
                    </div>

                    <div id="placeholderPreview">
                        <div class="d-flex flex-column align-items-center justify-content-center" 
                             style="min-height: 300px;">
                            <i class="fas fa-image text-muted mb-3" style="font-size: 80px; opacity: 0.3;"></i>
                            <p class="text-muted mb-0">Belum ada foto yang dipilih</p>
                            <small class="text-muted">Pilih foto untuk melihat preview</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Alert Success --}}
@if(session('success'))
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
document.addEventListener('DOMContentLoaded', function() {

    const gambarInput = document.getElementById('gambar');
    const previewImage = document.getElementById('previewImage');
    const previewContainer = document.getElementById('previewContainer');
    const placeholderPreview = document.getElementById('placeholderPreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const formUpload = document.getElementById('formUpload');

    // Preview gambar saat file dipilih
    gambarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (!file) {
            previewContainer.style.display = 'none';
            placeholderPreview.style.display = 'block';
            return;
        }

        // Validasi tipe file
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!validTypes.includes(file.type)) {
            Swal.fire({
                icon: 'error',
                title: 'Format Tidak Valid!',
                text: 'Hanya file JPG, PNG, dan WEBP yang diperbolehkan.',
            });
            gambarInput.value = '';
            return;
        }

        // Validasi ukuran file (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            Swal.fire({
                icon: 'error',
                title: 'Ukuran Terlalu Besar!',
                text: 'Maksimal ukuran file adalah 2MB.',
            });
            gambarInput.value = '';
            return;
        }

        // Tampilkan preview
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            fileName.textContent = file.name;
            fileSize.textContent = (file.size / 1024).toFixed(2) + ' KB';
            
            previewContainer.style.display = 'block';
            placeholderPreview.style.display = 'none';
        }
        reader.readAsDataURL(file);
    });

    // Konfirmasi sebelum submit
    formUpload.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const file = gambarInput.files[0];
        if (!file) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian!',
                text: 'Silakan pilih foto terlebih dahulu.',
            });
            return;
        }

        Swal.fire({
            title: 'Upload Foto?',
            text: 'Foto akan disimpan ke database.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="fas fa-upload me-1"></i> Ya, Upload!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan loading
                Swal.fire({
                    title: 'Uploading...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                formUpload.submit();
            }
        });
    });

});
</script>
@endpush