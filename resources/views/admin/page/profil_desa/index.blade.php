@extends('admin.layouts.app')

@section('title', 'Profil Desa')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Header / Banner --}}
    <div class="row mb-3 mb-md-4">
        <div class="col-12">
            <div class="welcome-banner card border-0 shadow-lg overflow-hidden position-relative">
                <div class="card-body p-3 p-md-4 position-relative"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: .5rem;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h2 class="text-white fw-bold mb-1 fs-4 fs-md-2">
                                <i class="fas fa-village me-2" style="color: #ffd700;"></i>
                                Profil Desa
                            </h2>
                            <p class="text-white-50 mb-0 small">
                                <i class="fas fa-info-circle me-2"></i>
                                Kelola data profil desa secara mudah dan terstruktur
                            </p>
                            <p class="text-white-50 mb-0 small mt-1">
                                <i class="far fa-calendar-alt me-2"></i>
                                {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Mini Card --}}
    <div class="row g-3 g-md-4 mb-3 mb-md-4">
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card card border-0 shadow-sm h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                Total Profil Desa
                            </p>
                            <h2 class="fw-bold mb-0 fs-3 fs-md-2 counter" data-target="{{ $data->count() }}">0</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-primary-subtle p-2 rounded">
                            <i class="fas fa-village fa-lg fa-md-2x text-primary"></i>
                        </div>
                    </div>
                    <div class="progress mt-2 mt-md-3" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                    </div>
                </div>
                <div class="card-accent bg-primary"></div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3 flex-wrap">
        <h4 class="fw-bold mb-2 mb-md-0"><i class="fas fa-village"></i>&nbsp;Daftar Profil Desa</h4>
        <a href="{{ route('admin.profil_desa.create') }}" class="btn btn-dark mb-2 mb-md-0">
            <i class="fas fa-plus-circle"></i>&nbsp;Tambah Data
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-3 p-md-4">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover align-middle w-100">
                    <thead class="table-light">
                        <tr>
                            <th style="width:40px;">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th style="width:120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="white-space:normal; word-break:break-word;">{{ $item->judul }}</td>
                                <td style="white-space:normal; word-break:break-word;">
                                    {{ Str::limit($item->deskripsi_singkat ?? '', 80) }}
                                </td>
                                <td>
                                    @php
                                        $images = json_decode($item->gambar_header) ?? [];
                                    @endphp

                                    @if(!empty($images))
                                        @foreach ($images as $gambar)
                                            @php
                                                $path = public_path('uploads/profil_desa/' . $gambar);
                                                $url = file_exists($path) ? asset('uploads/profil_desa/' . $gambar) : asset('images/default.png');
                                            @endphp
                                            <img src="{{ $url }}"
                                                alt="{{ $item->judul }}"
                                                class="rounded me-1 mb-1"
                                                style="width: 80px; height: auto; object-fit:cover;">
                                        @endforeach
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.profil_desa.edit', $item->id) }}"
                                        class="btn btn-dark btn-sm btn-icon btn-edit mb-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.profil_desa.destroy', $item->id) }}"
                                        method="POST" class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-warning btn-sm btn-icon btn-delete" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data Profil Desa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.btn-icon {
    width: 36px;
    height: 36px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.table img {
    max-width: 100%;
    height: auto;
    display: block;
}

.table td, .table th {
    vertical-align: middle;
}

.table td {
    white-space: normal;
    word-break: break-word;
}

/* Mobile Responsif */
@media (max-width: 767.98px) {
    .table th, .table td {
        font-size: 0.85rem;
        padding: 0.35rem;
    }
    .table td img {
        width: 60px;
        height: auto;
    }
}

/* Buat border tabel lebih halus */
.table {
    border-collapse: separate;
    border-spacing: 0 6px;
}

.table thead th {
    border-bottom: 2px solid #e9ecef !important;
}

.table tbody tr {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.04);
}

.table tbody tr td {
    border: none !important;
}

.table-hover tbody tr:hover {
    background-color: #f7f7f7 !important;
}

.table > :not(caption) > * > * {
    border-bottom-width: 0 !important;
}
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
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

    // Initialize DataTable
    if ($.fn.DataTable.isDataTable('#example')) {
        $('#example').DataTable().destroy();
    }

    $('#example').DataTable({
        responsive: true,
        columnDefs: [
            { orderable: false, targets: -1 }
        ],
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada data Profil Desa" }
    });

    // Edit button
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function(e){
            e.preventDefault();
            const url = this.getAttribute('href');
            Swal.fire({
                title: 'Edit Profil Desa?',
                text: "Kamu akan diarahkan ke halaman edit!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Edit',
                cancelButtonText: 'Batal'
            }).then(result => {
                if(result.isConfirmed) window.location.href = url;
            });
        });
    });

    // Delete button
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(){
            const form = this.closest('form');
            Swal.fire({
                title: 'Yakin hapus data ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(result => {
                if(result.isConfirmed) form.submit();
            });
        });
    });

    // Counter animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            let count = +counter.innerText;
            const increment = target / 50;
            if(count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });

});
</script>
@endpush
