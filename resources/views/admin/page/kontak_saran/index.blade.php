@extends('admin.layouts.app')

@section('title', 'Daftar Kontak & Saran')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-envelope-open-text me-2" style="color: #ffd700;"></i>
                        Daftar Kontak & Saran
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola pesan masuk dari masyarakat</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm hover-shadow">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Pesan Masuk</p>
                    <h2 class="fw-bold">{{ $data->total() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-mail-bulk"></i> Daftar Kontak / Saran
        </h4>
    </div>

    <div class="card shadow-sm hover-shadow">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="kontakTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th class="text-center" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $item)
                        <tr>
                            <td>{{ $i + $data->firstItem() }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ Str::limit($item->pesan, 50) }}</td>
                            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td class="text-center">

                                <a href="{{ route('admin.kontak-saran.show', $item->id) }}" 
                                   class="btn btn-dark btn-sm me-1 btn-detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <form action="{{ route('admin.kontak-saran.destroy', $item->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $data->links() }}
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

    $('#kontakTable').DataTable({
        responsive: true,
        searching: true,
        ordering: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada pesan masuk" }
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Pesan?',
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
