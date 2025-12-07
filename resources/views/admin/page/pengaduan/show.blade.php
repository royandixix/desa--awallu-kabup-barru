@extends('admin.layouts.app')
@section('title', 'Detail Pengaduan')

@section('content')
<div class="container mt-4">

    {{-- Judul --}}
    <div class="d-flex align-items-center mb-4">
        <h2 class="fw-bold mb-0">Detail Pengaduan</h2>
        
    </div>

    {{-- Card --}}
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">

            {{-- Nama --}}
            <div class="mb-4">
                <label class="fw-semibold text-secondary">Nama</label>
                <div class="fs-5 fw-bold text-dark">{{ $pengaduan->nama }}</div>
            </div>

            {{-- No HP --}}
            <div class="mb-4">
                <label class="fw-semibold text-secondary">No HP</label>
                <div class="fs-5 fw-bold text-dark">{{ $pengaduan->no_hp }}</div>
            </div>

            {{-- Kategori --}}
            <div class="mb-4">
                <label class="fw-semibold text-secondary">Kategori</label>
                <div class="fs-5 fw-bold text-dark">{{ $pengaduan->kategori }}</div>
            </div>

            {{-- Pesan --}}
            <div class="mb-4">
                <label class="fw-semibold text-secondary">Pesan</label>
                <p class="fs-6 text-dark lh-lg">{{ $pengaduan->pesan }}</p>
            </div>

            {{-- Foto --}}
            <div class="mb-4">
                <label class="fw-semibold text-secondary d-block mb-2">Foto</label>

                @if ($pengaduan->foto)
                    <img src="{{ asset($pengaduan->foto) }}"
                         alt="foto pengaduan"
                         class="img-thumbnail rounded shadow-sm"
                         style="max-width: 300px; cursor: zoom-in;"
                         data-bs-toggle="modal"
                         data-bs-target="#fotoModal">
                @else
                    <span class="text-muted fst-italic">Tidak ada foto</span>
                @endif
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label class="fw-semibold text-secondary">Status</label> <br>

                @if($pengaduan->status == 'pending')
                    <span class="badge bg-warning text-dark px-3 py-2 fs-6 rounded-pill">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                @elseif($pengaduan->status == 'diproses')
                    <span class="badge bg-primary px-3 py-2 fs-6 rounded-pill">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                @else
                    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                @endif
            </div>

            <div>
                <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary px-4">
                    Kembali
                </a>
            </div>

        </div>
    </div>

</div>

{{-- Modal untuk Zoom Foto --}}
@if($pengaduan->foto)
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-0">
                <img src="{{ asset($pengaduan->foto) }}" class="img-fluid rounded" alt="foto besar">
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
