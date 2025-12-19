@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Welcome Banner --}}
    <div class="row mb-3 mb-md-4">
        <div class="col-12">
            <div class="welcome-banner card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-3 p-md-4 position-relative">
                    <h2 class="text-white fw-bold mb-2 fs-4 fs-md-2">
                        <i class="fas fa-hand-wave me-2" style="color: #ffd700;"></i>
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h2>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                    </p>
                    <div class="banner-overlay"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="row g-3 g-md-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="mini-stat-item d-flex align-items-center p-3 rounded-3 bg-light-hover">
                <div class="mini-stat-icon bg-info-subtle rounded-circle me-3">
                    <i class="fas fa-users text-info"></i>
                </div>
                <div class="flex-grow-1">
                    <p class="mb-0 small text-muted">Total Penduduk</p>
                    <h6 class="mb-0 fw-bold fs-6">{{ number_format($totalPenduduk) }}</h6>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="mini-stat-item d-flex align-items-center p-3 rounded-3 bg-light-hover">
                <div class="mini-stat-icon bg-success-subtle rounded-circle me-3">
                    <i class="fas fa-store text-success"></i>
                </div>
                <div class="flex-grow-1">
                    <p class="mb-0 small text-muted">Total UMKM</p>
                    <h6 class="mb-0 fw-bold fs-6">{{ number_format($totalUMKM) }}</h6>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="mini-stat-item d-flex align-items-center p-3 rounded-3 bg-light-hover">
                <div class="mini-stat-icon bg-warning-subtle rounded-circle me-3">
                    <i class="fas fa-newspaper text-warning"></i>
                </div>
                <div class="flex-grow-1">
                    <p class="mb-0 small text-muted">Total Berita</p>
                    <h6 class="mb-0 fw-bold fs-6">{{ number_format($totalBerita) }}</h6>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="mini-stat-item d-flex align-items-center p-3 rounded-3 bg-light-hover">
                <div class="mini-stat-icon bg-danger-subtle rounded-circle me-3">
                    <i class="fas fa-exclamation-circle text-danger"></i>
                </div>
                <div class="flex-grow-1">
                    <p class="mb-0 small text-muted">Pengaduan Pending</p>
                    <h6 class="mb-0 fw-bold fs-6">{{ number_format($pengaduanPending) }}</h6>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
    .welcome-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        padding: 1.5rem;
        border-radius: 0.5rem;
    }
    .banner-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.1);
        z-index: 0;
    }
    .mini-stat-item {
        transition: all 0.3s ease;
    }
    .mini-stat-item:hover {
        background-color: #f8f9fa;
        transform: translateY(-3px);
    }
    .mini-stat-icon {
        width: 48px;
        height: 48px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.2rem;
    }
</style>
@endpush
