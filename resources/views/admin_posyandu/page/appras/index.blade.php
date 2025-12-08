@extends('admin_posyandu.layouts.app')

@section('title', 'Data APPRAS')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #28a745 0%, #218838 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-users me-2" style="color: #ffd700;"></i>
                        Data APPRAS
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola data anak dan orang tua dengan mudah</p>
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
                    <p class="text-muted small mb-1">Total Data</p>
                    <h2 class="fw-bold">{{ $data->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-table"></i> Daftar APPRAS
        </h4>
        <a href="{{ route('appras.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="apprasTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Anak</th>
                            <th>Umur</th>
                            <th>Nama Orang Tua</th>
                            <th>Alamat</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_anak }}</td>
                                <td>{{ $item->umur }} Tahun</td>
                                <td>{{ $item->nama_ortu }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="text-center">
                                    {{-- EDIT --}}
                                    <a href="{{ route('appras.edit', $item->id) }}" class="btn btn-warning btn-sm btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('appras.destroy', $item->id) }}" method="POST" class="d-inline">
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
                                <td colspan="6" class="text-center py-4 text-muted">Belum ada data.</td>
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
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- ALERT SUCCESS --}}
@if(session('success'))
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
    $('#apprasTable').DataTable({
        responsive: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada data." }
    });

    // EDIT SWEETALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;

            Swal.fire({
                title: 'Edit Data?',
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
                title: 'Hapus Data?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
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
