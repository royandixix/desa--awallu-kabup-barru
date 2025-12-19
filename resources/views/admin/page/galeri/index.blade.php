@extends('admin.layouts.app')

@section('title', 'Galeri Desa')

@section('content')
    <div class="container-fluid px-3 px-md-4 py-3 py-md-4">

        {{-- Banner --}}
        <div class="row mb-3 mb-md-4">
            <div class="col-12">
                <div class="welcome-banner card border-0 shadow-lg overflow-hidden position-relative">
                    <div class="card-body p-3 p-md-4 position-relative"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: .5rem;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h2 class="text-white fw-bold mb-1 fs-4 fs-md-2">
                                    <i class="fas fa-folder-open me-2" style="color: #ffd700;"></i>
                                    Galeri Desa
                                </h2>
                                <p class="text-white-50 mb-0 small">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Kelola semua gambar galeri desa secara mudah
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
                                    Total Gambar Galeri
                                </p>
                                <h2 class="fw-bold mb-0 fs-3 fs-md-2 counter" data-target="{{ $images->total() }}">0</h2>
                            </div>
                            <div class="stat-icon-wrapper bg-primary-subtle p-2 rounded">
                                <i class="fas fa-images fa-lg fa-md-2x text-primary"></i>
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
            <h4 class="fw-bold mb-2 mb-md-0"><i class="fas fa-folder-open"></i>&nbsp;Daftar Gambar Galeri</h4>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-dark mb-2 mb-md-0">
                <i class="fas fa-plus-circle"></i>&nbsp;Tambah Gambar
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
                                <th>Preview</th>
                                <th>Lokasi</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th style="width:120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($images as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="white-space:normal; word-break:break-word;">{{ $item->judul }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/galeri/' . $item->file) }}" alt="{{ $item->judul }}"
                                            class="rounded" style="width: 100px; height: auto; object-fit:cover;">
                                    </td>
                                    <td style="white-space:normal; word-break:break-word;">{{ $item->lokasi ?? '-' }}</td>
                                    <td style="white-space:normal; word-break:break-word;">
                                        <span class="badge bg-primary">{{ $item->kategori ?? '-' }}</span>
                                    </td>
                                    <td>{{ $item->tanggal?->format('Y-m-d H:i:s') ?? '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.galeri.edit', $item->id) }}"
                                            class="btn btn-dark btn-sm btn-icon btn-edit mb-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                                            class="d-inline form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-warning btn-sm btn-icon btn-delete"
                                                title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada gambar</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $images->links() }}
                    </div>
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

        .table td,
        .table th {
            vertical-align: middle;
        }

        .table td {
            white-space: normal;
            word-break: break-word;
        }

        /* Mobile Responsif */
        @media (max-width: 767.98px) {

            .table th,
            .table td {
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
            /* jarak antar baris */
        }

        .table thead th {
            border-bottom: 2px solid #e9ecef !important;
            /* header tetap rapi */
        }

        /* Baris tabel lebih lembut */
        .table tbody tr {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .table tbody tr td {
            border: none !important;
        }

        /* Hover lebih soft */
        .table-hover tbody tr:hover {
            background-color: #f7f7f7 !important;
        }

        /* Hilangkan border default bootstrap */
        .table> :not(caption)>*>* {
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

    {{-- SWEETALERT SUKSES (CREATE / UPDATE / DELETE) --}}
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            if ($.fn.DataTable.isDataTable('#example')) {
                $('#example').DataTable().destroy();
            }

            $('#example').DataTable({
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }],
                pageLength: 10,
                lengthChange: false,
                language: {
                    emptyTable: "Belum ada gambar"
                }
            });

            // Edit button
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');
                    Swal.fire({
                        title: 'Edit Gambar?',
                        text: "Kamu akan diarahkan ke halaman edit!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Edit',
                        cancelButtonText: 'Batal'
                    }).then(result => {
                        if (result.isConfirmed) window.location.href = url;
                    });
                });
            });

            // Delete button
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Yakin hapus gambar ini?',
                        text: "Gambar yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then(result => {
                        if (result.isConfirmed) form.submit();
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
                    if (count < target) {
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
