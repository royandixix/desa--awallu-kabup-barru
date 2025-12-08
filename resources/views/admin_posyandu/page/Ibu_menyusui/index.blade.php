@extends('admin_posyandu.layouts.app')

@section('title', 'Data Ibu Menyusui')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-female me-2" style="color: #ffd700;"></i>
                        Data Ibu Menyusui
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola data ibu menyusui di posyandu</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Header & Button Tambah --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><i class="fas fa-female"></i> Daftar Ibu Menyusui</h4>
        <a href="{{ route('admin_posyandu.ibu-menyusui.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-1"></i> Tambah Data
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Ibu</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Dusun</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama ?? '-' }}</td>
                        <td>{{ $item->umur ?? '-' }}</td>
                        <td>{{ $item->alamat ?? '-' }}</td>
                        <td>{{ $item->dusun ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin_posyandu.ibu-menyusui.edit', $item->id) }}" class="btn btn-warning btn-sm me-1 btn-edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin_posyandu.ibu-menyusui.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada data ibu menyusui</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    timer: 1600,
    showConfirmButton: false
});
</script>
@endif

<script>
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function() {
        const form = this.closest('form');
        Swal.fire({
            title: 'Hapus Data?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
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

document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();
        const url = this.href;
        Swal.fire({
            title: 'Edit Data?',
            text: 'Kamu akan diarahkan ke halaman edit!',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Lanjut Edit',
            cancelButtonText: 'Batal'
        }).then(result => {
            if(result.isConfirmed) window.location.href = url;
        });
    });
});
</script>
@endpush
