@extends('admin.layouts.app')

@section('title', 'Struktur PKK')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-users me-2" style="color: #ffd700;"></i>
                        Struktur PKK
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola gambar PKK desa</p>
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
                    <p class="text-muted small mb-1">Total Gambar PKK</p>
                    <h2 class="fw-bold">{{ $data->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><i class="fas fa-users"></i> Daftar Gambar PKK</h4>
        <a href="{{ route('admin.struktur.pkk.create') }}" class="btn btn-dark">
            <i class="fas fa-plus-circle"></i> Tambah Gambar
        </a>
    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="pkkTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Preview</th>
                            <th>Tanggal Upload</th>
                            <th class="text-center" style="width: 130px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <img src="{{ asset('pkk/' . $item->gambar) }}" 
                                    class="img-fluid rounded shadow-sm" 
                                    style="max-width: 150px">
                            </td>

                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>

                            <td class="text-center">
                                {{-- EDIT --}}
                                <a href="{{ route('admin.struktur.pkk.edit', $item->id) }}" 
                                    class="btn btn-dark btn-sm me-1 btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.struktur.pkk.destroy', $item->id) }}" 
                                      method="POST" 
                                      class="d-inline">
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
                        {{-- <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada gambar PKK.</td>
                        </tr> --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
{{-- DATATABLES --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

{{-- SWEETALERT --}}
@if(session('success'))
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
$(document).ready(function() {

    // --- DATATABLE ---
    $('#pkkTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthChange: false,
        language: {
            emptyTable: "Belum ada gambar PKK"
        }
    });

    // --- EDIT CONFIRMATION ---
    $('.btn-edit').on('click', function(e){
        e.preventDefault();
        let url = $(this).attr('href');

        Swal.fire({
            title: 'Edit Gambar PKK?',
            text: 'Kamu akan diarahkan ke halaman edit.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Lanjut Edit',
            cancelButtonText: 'Batal'
        }).then((result)=>{
            if(result.isConfirmed) window.location.href = url;
        });
    });

    // --- DELETE CONFIRMATION ---
    $('.btn-delete').on('click', function(){
        let form = $(this).closest('form');

        Swal.fire({
            title: 'Hapus Gambar?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result)=>{
            if(result.isConfirmed) form.submit();
        });
    });

});
</script>
@endpush
