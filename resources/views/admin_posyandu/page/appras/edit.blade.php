@extends('admin_posyandu.layouts.app')

@section('title', 'Edit Data APPRAS')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-3 py-md-4">

        {{-- Banner --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);">
                        <h2 class="text-white fw-bold mb-1">
                            <i class="fas fa-child me-2" style="color: #ffd700;"></i>
                            Edit Data APPRAS
                        </h2>
                        <p class="text-white-50 mb-1 small">Perbarui informasi anak dan orang tua</p>
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
            <div class="card-body">
                <form action="{{ route('appras.update', $appras->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Anak</label>
                        <input type="text" name="nama_anak" class="form-control @error('nama_anak') is-invalid @enderror"
                            value="{{ old('nama_anak', $appras->nama_anak) }}" required>
                        @error('nama_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Umur</label>
                        <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror"
                            value="{{ old('umur', $appras->umur) }}" required>
                        @error('umur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" class="form-control @error('nama_ortu') is-invalid @enderror"
                            value="{{ old('nama_ortu', $appras->nama_ortu) }}" required>
                        @error('nama_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            value="{{ old('alamat', $appras->alamat) }}" required>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- ALERT SUCCESS --}}
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 1600,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush
