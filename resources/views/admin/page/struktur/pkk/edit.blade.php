@extends('admin.layouts.app')

@section('title', 'Edit Gambar PKK')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-edit me-2" style="color: #ffd700;"></i>
                        Edit Gambar PKK
                    </h2>
                    <p class="text-white-50 mb-1 small">Perbarui gambar struktur PKK</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Edit --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.struktur.pkk.update', $pkk->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Gambar Lama --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Sebelumnya</label>
                    <div class="text-center mb-3">
                        <img src="{{ asset('pkk/' . $pkk->gambar) }}" 
                             class="img-fluid rounded shadow-sm"
                             style="max-width: 250px;">
                    </div>
                </div>

                {{-- Input Gambar Baru --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Ganti Gambar (opsional)</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>

                {{-- Preview Gambar Baru --}}
                <div class="mt-3 mb-4 text-center">
                    <img id="previewImage" src="#" alt="Preview" 
                         class="img-fluid rounded shadow-sm d-none"
                         style="max-width: 250px;">
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.struktur.pkk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-save"></i> Perbarui Gambar
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // Preview gambar baru
    document.querySelector('input[name="gambar"]').addEventListener('change', function(event) {
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
