@extends('admin.layouts.app')

@section('title', 'Daftar Berita')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="bi bi-newspaper me-2" style="color: #ffd700;"></i>
                        Daftar Berita
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola berita desa dengan mudah</p>
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
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Berita</p>
                    <h2 class="fw-bold">{{ $beritas->total() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="bi bi-newspaper"></i> Semua Berita
        </h4>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-dark">
            <i class="fas fa-plus-circle"></i> Tambah Berita
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="beritaTable" class="table table-striped table-hover align-middle nowrap" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Author</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $item)
                        <tr>
                            <td>{{ $loop->iteration + ($beritas->currentPage() - 1) * $beritas->perPage() }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->kategori ?? '-' }}</td>
                            <td>{{ $item->author ?? '-' }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if($item->image && file_exists(public_path($item->image)))
                                    <img src="{{ asset($item->image) }}" alt="Gambar Berita" class="img-thumbnail" style="width:80px;height:50px;object-fit:cover;">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{-- EDIT BUTTON --}}
                                <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-dark btn-sm me-1 btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- DELETE BUTTON --}}
                                <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn btn-warning btn-sm btn-delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada berita</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $beritas->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
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

<script>
document.addEventListener('DOMContentLoaded', function() {

    // DATATABLE
    $('#beritaTable').DataTable({
        responsive: true,
        autoWidth: false,
        columnDefs: [{ orderable: false, targets: -1 }],
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada berita" }
    });

    // EDIT SWEETALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            Swal.fire({
                title: 'Edit Berita?',
                text: 'Kamu akan diarahkan ke halaman edit!',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Lanjut Edit',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) window.location.href = url;
            });
        });
    });

    // DELETE SWEETALERT
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Berita?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

});
</script>
@endpush
