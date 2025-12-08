@extends('admin_posyandu.layouts.app')

@section('title', 'Data Bayi (0-12 Bulan)')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Header & Tambah --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><i class="fas fa-baby"></i> Daftar Bayi (0-12 Bulan)</h4>
        <a href="{{ route('admin_posyandu.bayi_0_sampai_12_bulan.create') }}" class="btn btn-success">
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
                        <th>Nama Bayi</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Ibu</th>
                        <th>Alamat</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_bayi }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->nama_ibu ?? '-' }}</td>
                        <td>{{ $item->alamat ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin_posyandu.bayi_0_sampai_12_bulan.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin_posyandu.bayi_0_sampai_12_bulan.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data bayi</td>
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
<script>
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function(){
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
</script>
@endpush
