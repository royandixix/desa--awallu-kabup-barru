@extends('admin.layouts.app')

@section('title', 'Transparansi BUMDes & KOPDes')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-store me-2" style="color: #ffd700;"></i>
                        Transparansi BUMDes & KOPDes
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola dokumen transparansi BUMDes/KOPDes</p>
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
                    <p class="text-muted small mb-1">Total Dokumen</p>
                    <h2 class="fw-bold">{{ $bumdes->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-folder-open"></i> Daftar Dokumen BUMDes/KOPDes
        </h4>
        <a href="{{ route('admin.transparansi.bumdes.create') }}" class="btn btn-dark shadow-sm">
            <i class="fas fa-plus-circle"></i> Tambah Dokumen
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm hover-shadow">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="bumdesTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Dokumen</th>
                            <th class="text-center" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bumdes as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                @if($item->kategori === 'BUMDes')
                                    <span class="badge bg-info text-dark">{{ $item->kategori }}</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $item->kategori }}</span>
                                @endif
                            </td>
                            <td>{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') : '-' }}</td>

                            {{-- FILE --}}
                            <td>
                                @if ($item->file)
                                    @php
                                        $ext = strtolower(pathinfo($item->file, PATHINFO_EXTENSION));
                                        $filePath = asset('uploads/bumdes/'.$item->file);
                                    @endphp

                                    @if($ext === 'pdf')
                                        <a href="{{ $filePath }}" target="_blank" class="btn btn-info btn-sm">
                                            <i class="fas fa-file-pdf"></i> PDF
                                        </a>
                                    @elseif(in_array($ext, ['jpg','jpeg','png','webp']))
                                        <a href="{{ $filePath }}" target="_blank" class="btn btn-success btn-sm">
                                            <i class="fas fa-image"></i> Gambar
                                        </a>
                                    @elseif(in_array($ext, ['xls','xlsx']))
                                        <a href="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode($filePath) }}"
                                           target="_blank" class="btn btn-success btn-sm">
                                            <i class="fas fa-file-excel"></i> Excel
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak dapat pratinjau</span>
                                    @endif
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>

                            {{-- ACTION --}}
                            <td class="text-center">
                                <a href="{{ route('admin.transparansi.bumdes.edit', $item->id) }}" class="btn btn-dark btn-sm me-1 btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.transparansi.bumdes.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="6" class="text-center text-muted">Belum ada dokumen</td>
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
    $('#bumdesTable').DataTable({
        responsive: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada dokumen" }
    });

    // EDIT SWEETALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            Swal.fire({
                title: 'Edit Dokumen?',
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
                title: 'Hapus Dokumen?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
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
