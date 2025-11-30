@extends('admin.layouts.app')

@section('title', 'Edit Gambar Galeri')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    <div class="row mb-3">
        <div class="col-12">
            <h2 class="fw-bold">Edit Gambar Galeri</h2>
            <p class="text-muted">Perbarui gambar atau metadata galeri desa.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 p-md-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- SWEETALERT SUKSES SETELAH REDIRECT --}}
                    @if (session('success'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil Diperbarui!',
                                    text: '{{ session('success') }}',
                                    showConfirmButton: false,
                                    timer: 1800
                                });
                            });
                        </script>
                    @endif

                    {{-- FORM EDIT --}}
                    <form id="form-edit" action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Gambar Lama --}}
                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini</label>
                            <img src="{{ asset('uploads/galeri/' . $galeri->file) }}" 
                                 class="img-fluid rounded" style="max-height: 250px;">
                        </div>

                        {{-- Input Ganti Gambar --}}
                        <div class="mb-3">
                            <label class="form-label">Ganti Gambar (opsional)</label>
                            <input type="file" name="file" class="form-control">
                            <small class="text-muted">Format: jpeg, png, jpg, gif | Max: 2MB</small>
                        </div>

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">Judul Gambar</label>
                            <input type="text" name="title" class="form-control" 
                                   value="{{ old('title', $galeri->title) }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="desc" class="form-control" rows="3">{{ old('desc', $galeri->desc) }}</textarea>
                        </div>

                        {{-- Lokasi --}}
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" value="{{ $galeri->lokasi }}">
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" value="{{ $galeri->kategori }}">
                        </div>

                        {{-- Tanggal --}}
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="datetime-local" name="tanggal" class="form-control"
                                   value="{{ $galeri->tanggal ? $galeri->tanggal->format('Y-m-d\TH:i') : '' }}">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Perbarui
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

{{-- SWEETALERT KONFIRMASI UPDATE --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("form-edit").addEventListener("submit", function(e){
        e.preventDefault();

        Swal.fire({
            title: "Yakin Perbarui?",
            text: "Data galeri akan diperbarui.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Perbarui!"
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });
    });
</script>

@endsection
