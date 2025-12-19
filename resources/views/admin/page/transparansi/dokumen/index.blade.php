@extends('admin.layouts.app')

@section('title', 'Data Dokumen Transparansi')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Data Dokumen Transparansi</h3>
            <p class="text-muted mb-0">Daftar seluruh dokumen transparansi desa.</p>
        </div>

        <a href="{{ route('admin.transparansi.dokumen.create') }}" class="btn btn-primary">
            + Tambah Dokumen
        </a>
    </div>

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Dokumen</p>
                    <h2 class="fw-bold">{{ $dokumens->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">
            Tabel Dokumen Transparansi
        </div>
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th style="width: 50px;">No</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Tahun</th>
                            <th>Tanggal</th>
                            <th>File</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dokumens as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td class="text-center">
                                <span class="badge bg-info">{{ $item->jenis }}</span>
                            </td>
                            <td class="text-center">{{ $item->tahun }}</td>
                            <td class="text-center">
                                {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="text-center">
                                @if ($item->file)
                               <a href="{{ asset('storage/' . $item->file) }}" 
   class="btn btn-sm btn-success" 
   target="_blank">
    Lihat
</a>

                                @else
                                <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                            <td class="text-center">

                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.transparansi.dokumen.edit', $item->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <button class="btn btn-danger btn-sm btnHapus"
                                    data-id="{{ $item->id }}">
                                    Hapus
                                </button>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">
                                Belum ada dokumen.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            {{ $dokumens->links() }}
        </div>
    </div>

</div>
@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- SweetAlert Notif Sukses --}}
@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}'
})
</script>
@endif

<script>
    // Hapus data
    document.querySelectorAll('.btnHapus').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.dataset.id;

            Swal.fire({
                title: 'Hapus Dokumen?',
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/admin/transparansi/dokumen/delete/" + id;
                }
            });
        });
    });
</script>
@endpush
