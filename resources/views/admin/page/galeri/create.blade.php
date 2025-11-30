@extends('admin.layouts.app')

@section('title', 'Tambah Gambar Galeri')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    <div class="row mb-3">
        <div class="col-12">
            <h2 class="fw-bold">Tambah Gambar Galeri</h2>
            <p class="text-muted">Unggah satu gambar untuk galeri desa.</p>
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

                    {{-- ALERT SUKSES SETELAH REDIRECT --}}
                    @if (session('success'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: '{{ session('success') }}',
                                    showConfirmButton: false,
                                    timer: 1800
                                });
                            });
                        </script>
                    @endif

                    <form id="form-galeri" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Pilih Gambar</label>
                            <input type="file" name="file" class="form-control" required>
                            <small class="text-muted">Format: jpeg, png, jpg, gif | Max: 2MB</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Judul Gambar</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="desc" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="datetime-local" name="tanggal" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Unggah</button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- SWEETALERT KONFIRMASI SUBMIT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("form-galeri").addEventListener("submit", function(e){
        e.preventDefault();

        Swal.fire({
            title: "Yakin Simpan?",
            text: "Pastikan semua data sudah benar.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Simpan!"
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });
    });
</script>

@endsection
