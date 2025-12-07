@extends('admin.layouts.app')

@section('title', 'Transparansi Laporan Kegiatan')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-clipboard-list me-2" style="color: #ffd700;"></i>
                        Data Laporan Kegiatan
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola laporan kegiatan dengan mudah</p>
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
            <div class="card shadow-sm hover-shadow">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Laporan</p>
                    <h2 class="fw-bold">{{ $laporan->total() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-folder-open"></i> Daftar Laporan Kegiatan
        </h4>
        <a href="{{ route('admin.transparansi.laporan.create') }}" class="btn btn-dark shadow-sm">
            <i class="fas fa-plus-circle"></i> Tambah Laporan
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm hover-shadow">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="laporanTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Anggaran</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th class="text-center" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporan as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->judul }}</td>
                            <td>{{ $row->lokasi }}</td>
                            <td>Rp {{ number_format($row->anggaran,0,',','.') }}</td>
                            <td>{{ $row->tanggal }}</td>

                            {{-- Foto --}}
                            <td>
                                @if($row->foto)
                                    <a href="{{ asset('storage/' . $row->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $row->foto) }}" width="60" class="rounded">
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="text-center">
                                <a href="{{ route('admin.transparansi.laporan.edit', $row->id) }}" class="btn btn-dark btn-sm me-1 btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.transparansi.laporan.destroy', $row->id) }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center text-muted">Belum ada data laporan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $laporan->links() }}
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
    $('#laporanTable').DataTable({
        responsive: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada laporan kegiatan" }
    });

    // EDIT SWEETALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            Swal.fire({
                title: 'Edit Laporan?',
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
                title: 'Hapus Laporan?',
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
