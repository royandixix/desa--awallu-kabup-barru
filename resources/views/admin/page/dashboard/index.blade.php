@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid px-4 py-4">

    {{-- Welcome Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-banner card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4 position-relative">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="text-white fw-bold mb-2">
                                <i class="fas fa-hand-wave me-2" style="color: #ffd700;"></i>
                                Selamat Datang Kembali!
                            </h2>
                            <p class="text-white-50 mb-0">
                                <i class="far fa-calendar-alt me-2"></i>
                                {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                            </p>
                        </div>
                        <div class="col-lg-4 text-end d-none d-lg-block">
                            <div class="welcome-illustration">
                                <i class="fas fa-chart-line fa-4x text-white opacity-25"></i>
                            </div>
                        </div>
                    </div>
                    <div class="banner-overlay"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row g-4 mb-4">

        <!-- CARD 1 - Total Users -->
        <div class="col-xl-4 col-md-6">
            <div class="stat-card card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                Total Users
                            </p>
                            <h2 class="fw-bold mb-0 counter" data-target="1240">0</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-primary-subtle">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success-subtle text-success me-2">
                            <i class="fas fa-arrow-up me-1"></i>12.5%
                        </span>
                        <small class="text-muted">vs bulan lalu</small>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                    </div>
                </div>
                <div class="card-accent bg-primary"></div>
            </div>
        </div>

        <!-- CARD 2 - Total Orders -->
        <div class="col-xl-4 col-md-6">
            <div class="stat-card card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                Total Orders
                            </p>
                            <h2 class="fw-bold mb-0 counter" data-target="435">0</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-success-subtle">
                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success-subtle text-success me-2">
                            <i class="fas fa-arrow-up me-1"></i>8.3%
                        </span>
                        <small class="text-muted">vs bulan lalu</small>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%"></div>
                    </div>
                </div>
                <div class="card-accent bg-success"></div>
            </div>
        </div>

        <!-- CARD 3 - Revenue -->
        <div class="col-xl-4 col-md-6">
            <div class="stat-card card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                Revenue
                            </p>
                            <h2 class="fw-bold mb-0">Rp <span class="counter" data-target="24500000">0</span></h2>
                        </div>
                        <div class="stat-icon-wrapper bg-warning-subtle">
                            <i class="fas fa-wallet fa-2x text-warning"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-danger-subtle text-danger me-2">
                            <i class="fas fa-arrow-down me-1"></i>2.1%
                        </span>
                        <small class="text-muted">vs bulan lalu</small>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 85%"></div>
                    </div>
                </div>
                <div class="card-accent bg-warning"></div>
            </div>
        </div>

    </div>

    {{-- Charts Row --}}
    <div class="row g-4">

        <!-- Visitor Chart -->
        <div class="col-xl-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="fw-bold mb-1">
                                <i class="fas fa-chart-line text-primary me-2"></i>
                                Visitor Analytics
                            </h5>
                            <p class="text-muted small mb-0">Statistik pengunjung 7 hari terakhir</p>
                        </div>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-outline-primary active">Week</button>
                            <button type="button" class="btn btn-outline-primary">Month</button>
                            <button type="button" class="btn btn-outline-primary">Year</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2" style="height: 380px;">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Activity & Quick Stats -->
        <div class="col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-1">
                        <i class="fas fa-bolt text-warning me-2"></i>
                        Quick Stats
                    </h5>
                    <p class="text-muted small mb-0">Ringkasan aktivitas hari ini</p>
                </div>
                <div class="card-body px-4">
                    
                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-3 mb-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-info-subtle rounded-circle me-3">
                            <i class="fas fa-eye text-info"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">Page Views</p>
                            <h6 class="mb-0 fw-bold">24,563</h6>
                        </div>
                        <div class="text-success small">
                            <i class="fas fa-arrow-up"></i> 5.2%
                        </div>
                    </div>

                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-3 mb-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-success-subtle rounded-circle me-3">
                            <i class="fas fa-user-plus text-success"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">New Users</p>
                            <h6 class="mb-0 fw-bold">342</h6>
                        </div>
                        <div class="text-success small">
                            <i class="fas fa-arrow-up"></i> 12%
                        </div>
                    </div>

                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-3 mb-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-warning-subtle rounded-circle me-3">
                            <i class="fas fa-clock text-warning"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">Avg. Duration</p>
                            <h6 class="mb-0 fw-bold">5m 23s</h6>
                        </div>
                        <div class="text-danger small">
                            <i class="fas fa-arrow-down"></i> 2%
                        </div>
                    </div>

                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-danger-subtle rounded-circle me-3">
                            <i class="fas fa-percentage text-danger"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">Bounce Rate</p>
                            <h6 class="mb-0 fw-bold">32.5%</h6>
                        </div>
                        <div class="text-success small">
                            <i class="fas fa-arrow-down"></i> 3%
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@push('styles')
<style>
    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }

    .banner-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.5;
    }

    .welcome-banner .card-body {
        z-index: 1;
    }

    /* Stat Cards */
    .stat-card {
        position: relative;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    .card-accent {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        border-radius: 0 0 0.375rem 0.375rem;
    }

    .stat-icon-wrapper {
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
    }

    .letter-spacing {
        letter-spacing: 0.5px;
    }

    /* Mini Stats */
    .mini-stat-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .bg-light-hover {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .bg-light-hover:hover {
        background-color: #f8f9fa !important;
        transform: translateX(5px);
    }

    /* Counter Animation */
    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .counter {
        animation: countUp 0.5s ease;
    }

    /* Progress Bar Animation */
    .progress-bar {
        animation: progressGrow 1.5s ease-in-out;
    }

    @keyframes progressGrow {
        from {
            width: 0;
        }
    }

    /* Card Header */
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    /* Button Group */
    .btn-group-sm .btn {
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
        font-weight: 500;
    }

    /* Subtle backgrounds */
    .bg-primary-subtle {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }

    .bg-success-subtle {
        background-color: rgba(25, 135, 84, 0.1) !important;
    }

    .bg-warning-subtle {
        background-color: rgba(255, 193, 7, 0.1) !important;
    }

    .bg-danger-subtle {
        background-color: rgba(220, 53, 69, 0.1) !important;
    }

    .bg-info-subtle {
        background-color: rgba(13, 202, 240, 0.1) !important;
    }

    /* Badge colors */
    .badge.bg-success-subtle {
        color: #198754 !important;
    }

    .badge.bg-danger-subtle {
        color: #dc3545 !important;
    }

    /* Fade in animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card {
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }

    /* Wave animation for welcome icon */
    @keyframes wave {
        0% { transform: rotate(0deg); }
        10% { transform: rotate(14deg); }
        20% { transform: rotate(-8deg); }
        30% { transform: rotate(14deg); }
        40% { transform: rotate(-4deg); }
        50% { transform: rotate(10deg); }
        60% { transform: rotate(0deg); }
        100% { transform: rotate(0deg); }
    }

    .fa-hand-wave {
        animation: wave 2s infinite;
        transform-origin: 70% 70%;
        display: inline-block;
    }
</style>
@endpush

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // === COUNTER ANIMATION ===
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target.toLocaleString('id-ID');
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString('id-ID');
            }
        }, 16);
    }

    // Jalankan counter saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.counter').forEach(counter => {
            animateCounter(counter);
        });
    });

    // === VISITOR CHART ===
    const ctx = document.getElementById('visitorChart');

    // Gradient untuk area chart
    const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(102, 126, 234, 0.5)');
    gradient.addColorStop(1, 'rgba(118, 75, 162, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Pengunjung',
                data: [120, 190, 150, 220, 300, 280, 350],
                borderWidth: 3,
                borderColor: '#667eea',
                backgroundColor: gradient,
                tension: 0.4,
                fill: true,
                pointRadius: 6,
                pointHoverRadius: 8,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#667eea',
                pointBorderWidth: 3,
                pointHoverBackgroundColor: '#667eea',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index',
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Pengunjung: ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10,
                        callback: function(value) {
                            return value.toLocaleString('id-ID');
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10
                    }
                }
            }
        }
    });

    // === SMOOTH SCROLL ANIMATION ===
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });
</script>

@endpush