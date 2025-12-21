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
                    <h2 class="fw-bold">{{ $dokumens->total() }}</h2> {{-- gunakan total() untuk paginasi --}}
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
                    <thead class="table-light text-center">
                        <tr>
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
                        <tr class="text-center">
                            <td>{{ $loop->iteration + ($dokumens->currentPage() - 1) * $dokumens->perPage() }}</td>
                            <td class="text-start">{{ $item->judul }}</td>
                            <td>
                                <span class="badge bg-info">{{ $item->jenis }}</span>
                            </td>
                            <td>{{ $item->tahun }}</td>
                            <td>
                                {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') : '-' }}
                            </td>
                            <td>
                                @if ($item->file)
                                    <a href="{{ asset('uploads/dokumen/' . $item->file) }}" 
                                       class="btn btn-sm btn-success" 
                                       target="_blank">
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                            <td>

                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.transparansi.dokumen.edit', $item->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.transparansi.dokumen.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btnHapus">Hapus</button>
                                </form>

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
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
})
</script>
@endif

<script>
    // Konfirmasi Hapus dengan SweetAlert
    document.querySelectorAll('.btnHapus').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault(); // hentikan submit form default
            let form = this.closest('form'); // ambil form terdekat

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
                    form.submit(); // submit form jika dikonfirmasi
                }
            });
        });
    });
</script>
@endpush
