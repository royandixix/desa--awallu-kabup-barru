@extends('admin.layouts.app')

@section('title', 'Daftar Gambar LPM')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #3182ce 0%, #2b6cb0 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-images me-2" style="color: #ffd700;"></i>
                        Daftar Gambar LPM
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola semua gambar LPM</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm hover-shadow">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Gambar</p>
                    <h2 class="fw-bold">{{ $lpms->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-folder-open"></i> Daftar Gambar LPM
        </h4>
        <a href="{{ route('admin.struktur.lpm.create') }}" class="btn btn-dark shadow-sm">
            <i class="fas fa-plus-circle"></i> Tambah Gambar
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm hover-shadow">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle" id="lpmTable">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th class="text-center" style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lpms as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar LPM" class="img-fluid rounded" style="max-height: 120px;">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.struktur.lpm.edit', $item->id) }}" class="btn btn-warning btn-sm me-1 btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.struktur.lpm.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada gambar</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    // EDIT SWEETALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            Swal.fire({
                title: 'Edit Gambar?',
                text: 'Kamu akan diarahkan ke halaman edit!',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Lanjut Edit',
                cancelButtonText: 'Batal'
            }).then(result => {
                if(result.isConfirmed) window.location.href = url;
            });
        });
    });

    // DELETE SWEETALERT
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Gambar?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(result => {
                if(result.isConfirmed) form.submit();
            });
        });
    });

});
</script>
@endpush
