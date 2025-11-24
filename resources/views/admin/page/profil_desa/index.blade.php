@extends('admin.layouts.app')

@section('title', 'Profil Desa')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Header / Banner --}}
    <div class="row mb-3 mb-md-4">
        <div class="col-12">
            <div class="welcome-banner card border-0 shadow-lg overflow-hidden position-relative">
                <div class="card-body p-3 p-md-4 position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: .5rem;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h2 class="text-white fw-bold mb-1 fs-4 fs-md-2">
                                <i class="fas fa-village me-2" style="color: #ffd700;"></i>
                                Profil Desa
                            </h2>
                            <p class="text-white-50 mb-0 small">
                                <i class="fas fa-info-circle me-2"></i>
                                Kelola data profil desa secara mudah dan terstruktur
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
                                Total Profil Desa
                            </p>
                            <h2 class="fw-bold mb-0 fs-3 fs-md-2 counter" data-target="{{ $data->count() }}">0</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-primary-subtle p-2 rounded">
                            <i class="fas fa-village fa-lg fa-md-2x text-primary"></i>
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

    {{-- Tabel Profil Desa --}}
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Daftar Profil Desa</h4>
                <a href="{{ route('admin.profil_desa.create') }}" class="btn btn-primary">+ Tambah Profil Desa</a>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 p-md-4">
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
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Counter Animation
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 1500;
        const step = target / (duration / 16);
        let current = 0;
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.counter').forEach(animateCounter);
    });

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
