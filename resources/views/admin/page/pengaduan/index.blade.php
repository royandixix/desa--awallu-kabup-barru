@extends('admin.layouts.app')
@section('title', 'Daftar Pengaduan')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" 
                     style="background: linear-gradient(135deg, #00bcd4 0%, #3f51b5 100%);">
                    
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-envelope-open-text me-2" style="color: #ffd700;"></i>
                        Daftar Pengaduan
                    </h2>

                    <p class="text-white-50 mb-1 small">Data semua pengaduan warga desa</p>

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
                    <p class="text-muted small mb-1">Total Pengaduan</p>
                    <h2 class="fw-bold">{{ $pengaduans->count() }}</h2>
                </div>
            </div>
        </div>

    </div>

    {{-- Header Table --}}
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-list-alt me-2"></i> Daftar Pengaduan Warga
        </h4>
    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">

                <table id="pengaduanTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Kategori</th>
                            <th>Pesan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengaduan->nama }}</td>
                            <td>{{ $pengaduan->no_hp }}</td>
                            <td>{{ $pengaduan->kategori }}</td>
                            <td>{{ Str::limit($pengaduan->pesan, 50) }}</td>

                            <td>
                                @if($pengaduan->foto)
                                    <img src="{{ asset($pengaduan->foto) }}" 
                                         class="img-fluid rounded shadow-sm"
                                         style="max-width: 80px;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td>
                                <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm"
                                            onchange="this.form.submit()">
                                        <option value="pending"  {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai"  {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                            </td>

                            <td class="text-center">

                                {{-- DETAIL --}}
                                <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}"
                                   class="btn btn-dark btn-sm me-1 btn-detail">
                                   <i class="fas fa-eye"></i>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}"
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
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@endsection


@push('scripts')

{{-- jQuery + DataTables --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

{{-- SweetAlert --}}
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

    // DataTables
    $('#pengaduanTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada pengaduan" }
    });

    // Detail Confirm
    $('.btn-detail').on('click', function(e){
        e.preventDefault();
        let url = $(this).attr('href');

        Swal.fire({
            title: 'Lihat Detail Pengaduan?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Lanjut',
            cancelButtonText: 'Batal'
        }).then((result)=>{
            if(result.isConfirmed) window.location.href = url;
        });
    });

    // Delete Confirm
    $('.btn-delete').on('click', function(){
        let form = $(this).closest('form');

        Swal.fire({
            title: 'Hapus Pengaduan?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#d33',
        }).then((result)=>{
            if(result.isConfirmed) form.submit();
        });
    });

});
</script>

@endpush
