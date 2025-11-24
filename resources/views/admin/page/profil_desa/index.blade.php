@extends('admin.layouts.app')

@section('title', 'Profil Desa')

@section('content')

{{-- Panggil Header --}}

{{-- Panggil Statistik --}}


{{-- Tabel Profil Desa --}}
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Profil Desa</h3>
        <a href="{{ route('admin.profil_desa.create') }}" class="btn btn-primary">+ Tambah Profil Desa</a>
    </div>

    <div class="card tbl-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless mb-0">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ Str::limit($item->deskripsi, 80) }}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('uploads/profil_desa/' . $item->gambar) }}" alt="" width="80" class="rounded">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.profil_desa.edit', $item->id) }}" class="btn btn-sm btn-warning btn-edit" data-id="{{ $item->id }}">Edit</a>
                                <form action="{{ route('admin.profil-desa.destroy', $item->id) }}" method="POST" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data Profil Desa.</td>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Edit button alert
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

    // Delete button alert
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
</script>
@endpush
