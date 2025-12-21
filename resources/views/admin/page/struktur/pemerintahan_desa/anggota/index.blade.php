@extends('admin.layouts.app')

@section('title', 'Anggota Pemerintahan Desa')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4"
                     style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-users me-2" style="color:#ffd700;"></i>
                        Anggota Pemerintahan Desa
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola data anggota pemerintahan desa</p>
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
                    <p class="text-muted small mb-1">Total Anggota</p>
                    <h2 class="fw-bold">{{ $data->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-list"></i> Daftar Anggota
        </h4>
        <a href="{{ route('admin.struktur.pemerintahan_desa.anggota.create') }}"
           class="btn btn-dark">
            <i class="fas fa-plus-circle"></i> Tambah Anggota
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="anggotaTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="50">No</th>
                            <th width="80">Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th class="text-center" width="130">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                {{-- FOTO (FIX TOTAL) --}}
                                <td>
                                    @if ($d->foto && file_exists(public_path($d->foto)))
                                        <img src="{{ asset($d->foto) }}"
                                             width="60"
                                             height="60"
                                             style="object-fit:cover"
                                             class="rounded shadow-sm">
                                    @else
                                        <span class="text-muted small">Tidak ada</span>
                                    @endif
                                </td>

                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->jabatan }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.struktur.pemerintahan_desa.anggota.edit', $d->id) }}"
                                       class="btn btn-dark btn-sm me-1 btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.struktur.pemerintahan_desa.anggota.destroy', $d->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                class="btn btn-warning btn-sm btn-delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada anggota
                                </td>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
Swal.fire({
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    icon: 'success',
    timer: 1600,
    showConfirmButton: false
});
</script>
@endif

<script>
$(function () {

    $('#anggotaTable').DataTable({
        pageLength: 10,
        lengthChange: false,
        responsive: true,
        language: {
            emptyTable: "Belum ada anggota"
        }
    });

    $('.btn-edit').on('click', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Edit Anggota?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Lanjut',
            cancelButtonText: 'Batal'
        }).then(res => {
            if (res.isConfirmed) window.location.href = url;
        });
    });

    $('.btn-delete').on('click', function () {
        const form = $(this).closest('form');
        Swal.fire({
            title: 'Hapus Anggota?',
            text: 'Data tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then(res => {
            if (res.isConfirmed) form.submit();
        });
    });

});
</script>
@endpush
