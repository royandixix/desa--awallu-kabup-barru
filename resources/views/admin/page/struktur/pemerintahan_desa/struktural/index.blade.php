@extends('admin.layouts.app')

@section('title', 'Bagan Pemerintahan Desa')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-sitemap me-2" style="color: #ffd700;"></i>
                        Bagan Pemerintahan Desa
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola struktur organisasi desa</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Header / Tombol Upload --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-sitemap"></i> Struktur Saat Ini
        </h4>
        <a href="{{ route('admin.struktur.pemerintahan_desa.struktural.create') }}" class="btn btn-dark">
            <i class="fas fa-plus-circle"></i> Upload Bagan Baru
        </a>
    </div>

    {{-- Card Bagan --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">
            @if ($bagan && $bagan->foto)
                <img src="{{ asset('storage/' . $bagan->foto) }}" 
                     alt="Bagan Pemerintahan Desa" 
                     class="img-fluid rounded shadow mb-3" 
                     style="max-width: 600px;">
                <p class="text-muted small">
                    Bagan terakhir di-upload: {{ $bagan->created_at->format('d/m/Y H:i') }}
                </p>
            @else
                <p class="text-muted">Belum ada bagan struktur di-upload.</p>
            @endif
        </div>
    </div>

    {{-- Table History Upload --}}
    @if($bagan)
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Preview</th>
                        <th>Tanggal Upload</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="{{ asset('storage/' . $bagan->foto) }}" 
                                 class="img-fluid rounded shadow" 
                                 style="max-width: 200px;">
                        </td>
                        <td>{{ $bagan->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.struktur.pemerintahan_desa.struktural.edit', $bagan->id) }}" 
                               class="btn btn-dark btn-sm me-1 btn-edit">
                               <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.struktur.pemerintahan_desa.struktural.destroy', $bagan->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" class="btn btn-warning btn-sm btn-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // SweetAlert notifikasi sukses
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 1600,
            showConfirmButton: false
        });
    @endif

    // EDIT SWEETALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            Swal.fire({
                title: 'Edit Bagan?',
                text: 'Kamu akan diarahkan ke halaman edit!',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Lanjut Edit',
                cancelButtonText: 'Batal'
            }).then(res => {
                if (res.isConfirmed) window.location.href = url;
            });
        });
    });

    // DELETE SWEETALERT
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Bagan?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(res => {
                if (res.isConfirmed) form.submit();
            });
        });
    });

});
</script>
@endpush
