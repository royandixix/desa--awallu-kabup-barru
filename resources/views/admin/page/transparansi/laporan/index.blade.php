@extends('admin.layouts.app')

@section('title', 'Transparansi Laporan')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-file-alt me-2" style="color: #ffd700;"></i>
                        Transparansi Laporan
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola dokumen laporan desa</p>
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
                    <p class="text-muted small mb-1">Total Laporan</p>
                    <h2 class="fw-bold">{{ $laporan->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-file-alt"></i> Daftar Laporan
        </h4>
        <a href="{{ route('admin.transparansi.laporan.create') }}" class="btn btn-dark">
            <i class="fas fa-plus-circle"></i> Tambah Laporan
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="laporanTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>File</th>
                            <th class="text-center" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi ?? '-' }}</td>
                            <td>{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') : '-' }}</td>
                            <td>
                                @if ($item->file)
                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                       class="btn btn-info btn-sm">Lihat PDF</a>
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{-- EDIT --}}
                                <a href="{{ route('admin.transparansi.laporan.edit', $item->id) }}"
                                   class="btn btn-dark btn-sm me-1 btn-edit">
                                   <i class="fas fa-edit"></i>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.transparansi.laporan.destroy', $item->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn btn-warning btn-sm btn-delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        {{-- Baris kosong sesuai jumlah kolom --}}
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
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
{{-- Pastikan jQuery dan DataTables hanya dipanggil sekali di app.blade.php --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    // Inisialisasi DataTables
    $('#laporanTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada laporan" },
        columnDefs: [
            { orderable: false, targets: -1 } // Kolom aksi tidak bisa di-sort
        ]
    });

    // SweetAlert Edit
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            Swal.fire({
                title: 'Edit Laporan?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Lanjut Edit',
                cancelButtonText: 'Batal'
            }).then(res => {
                if (res.isConfirmed) window.location.href = btn.href;
            });
        });
    });

    // SweetAlert Delete
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', () => {
            const form = btn.closest('form');
            Swal.fire({
                title: 'Hapus Laporan?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
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
