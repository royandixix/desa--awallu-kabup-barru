@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    {{-- Welcome Banner --}}
    <div class="row mb-3 mb-md-4">
        <div class="col-12">
            <div class="welcome-banner card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-3 p-md-4 position-relative">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h2 class="text-white fw-bold mb-2 fs-4 fs-md-2">
                                <i class="fas fa-hand-wave me-2" style="color: #ffd700;"></i>
                                Selamat Datang!
                            </h2>
                            <p class="text-white-50 mb-0 small">
                                <i class="far fa-calendar-alt me-2"></i>
                                {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="banner-overlay"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row g-3 g-md-4 mb-3 mb-md-4">

        <!-- CARD 1 - Total Users -->
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card card border-0 shadow-sm h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                Total Users
                            </p>
                            <h2 class="fw-bold mb-0 fs-3 fs-md-2 counter" data-target="1240">0</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-primary-subtle">
                            <i class="fas fa-users fa-lg fa-md-2x text-primary"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-success-subtle text-success me-2 mb-1">
                            <i class="fas fa-arrow-up me-1"></i>12.5%
                        </span>
                        <small class="text-muted">vs bulan lalu</small>
                    </div>
                    <div class="progress mt-2 mt-md-3" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                    </div>
                </div>
                <div class="card-accent bg-primary"></div>
            </div>
        </div>

        <!-- CARD 2 - Total Orders -->
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card card border-0 shadow-sm h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                Total Orders
                            </p>
                            <h2 class="fw-bold mb-0 fs-3 fs-md-2 counter" data-target="435">0</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-success-subtle">
                            <i class="fas fa-shopping-cart fa-lg fa-md-2x text-success"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-success-subtle text-success me-2 mb-1">
                            <i class="fas fa-arrow-up me-1"></i>8.3%
                        </span>
                        <small class="text-muted">vs bulan lalu</small>
                    </div>
                    <div class="progress mt-2 mt-md-3" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%"></div>
                    </div>
                </div>
                <div class="card-accent bg-success"></div>
            </div>
        </div>

        <!-- CARD 3 - Revenue -->
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card card border-0 shadow-sm h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                Revenue
                            </p>
                            <h2 class="fw-bold mb-0 fs-5 fs-md-3">
                                <span class="small">Rp</span> 
                                <span class="counter" data-target="24500000">0</span>
                            </h2>
                        </div>
                        <div class="stat-icon-wrapper bg-warning-subtle">
                            <i class="fas fa-wallet fa-lg fa-md-2x text-warning"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-danger-subtle text-danger me-2 mb-1">
                            <i class="fas fa-arrow-down me-1"></i>2.1%
                        </span>
                        <small class="text-muted">vs bulan lalu</small>
                    </div>
                    <div class="progress mt-2 mt-md-3" style="height: 4px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 85%"></div>
                    </div>
                </div>
                <div class="card-accent bg-warning"></div>
            </div>
        </div>

    </div>

    {{-- Charts Row --}}
    <div class="row g-3 g-md-4">

        <!-- Visitor Chart -->
        <div class="col-12 col-xl-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-3 pt-md-4 px-3 px-md-4 pb-0">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-2">
                        <div>
                            <h5 class="fw-bold mb-1 fs-6 fs-md-5">
                                <i class="fas fa-chart-line text-primary me-2"></i>
                                Visitor Analytics
                            </h5>
                            <p class="text-muted small mb-0">Statistik pengunjung 7 hari terakhir</p>
                        </div>
                        <div class="btn-group btn-group-sm w-100 w-md-auto" role="group">
                            <button type="button" class="btn btn-outline-primary active">Week</button>
                            <button type="button" class="btn btn-outline-primary">Month</button>
                            <button type="button" class="btn btn-outline-primary">Year</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2 px-2 px-md-4" style="height: 300px; min-height: 300px;">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Activity & Quick Stats -->
        <div class="col-12 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-3 pt-md-4 px-3 px-md-4">
                    <h5 class="fw-bold mb-1 fs-6 fs-md-5">
                        <i class="fas fa-bolt text-warning me-2"></i>
                        Quick Stats
                    </h5>
                    <p class="text-muted small mb-0">Ringkasan aktivitas hari ini</p>
                </div>
                <div class="card-body px-3 px-md-4">
                    
                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-2 p-md-3 mb-2 mb-md-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-info-subtle rounded-circle me-2 me-md-3">
                            <i class="fas fa-eye text-info"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">Page Views</p>
                            <h6 class="mb-0 fw-bold fs-6">24,563</h6>
                        </div>
                        <div class="text-success small">
                            <i class="fas fa-arrow-up"></i> 5.2%
                        </div>
                    </div>

                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-2 p-md-3 mb-2 mb-md-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-success-subtle rounded-circle me-2 me-md-3">
                            <i class="fas fa-user-plus text-success"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">New Users</p>
                            <h6 class="mb-0 fw-bold fs-6">342</h6>
                        </div>
                        <div class="text-success small">
                            <i class="fas fa-arrow-up"></i> 12%
                        </div>
                    </div>

                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-2 p-md-3 mb-2 mb-md-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-warning-subtle rounded-circle me-2 me-md-3">
                            <i class="fas fa-clock text-warning"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">Avg. Duration</p>
                            <h6 class="mb-0 fw-bold fs-6">5m 23s</h6>
                        </div>
                        <div class="text-danger small">
                            <i class="fas fa-arrow-down"></i> 2%
                        </div>
                    </div>

                    <!-- Mini Stat Item -->
                    <div class="mini-stat-item d-flex align-items-center p-2 p-md-3 rounded-3 bg-light-hover">
                        <div class="mini-stat-icon bg-danger-subtle rounded-circle me-2 me-md-3">
                            <i class="fas fa-percentage text-danger"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 small text-muted">Bounce Rate</p>
                            <h6 class="mb-0 fw-bold fs-6">32.5%</h6>
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

    .card-accent {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        border-radius: 0 0 0.375rem 0.375rem;
    }

    .stat-icon-wrapper {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .letter-spacing {
        letter-spacing: 0.5px;
    }

    /* Mini Stats */
    .mini-stat-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .bg-light-hover {
        transition: all 0.3s ease;
        cursor: pointer;
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
        padding: 0.35rem 0.65rem;
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

    /* ========== RESPONSIVE STYLES ========== */
    
    /* Desktop hover effects - only on larger screens */
    @media (min-width: 992px) {
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
        }

        .stat-card:hover .stat-icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }

        .bg-light-hover:hover {
            background-color: #f8f9fa !important;
            transform: translateX(5px);
        }

        .stat-icon-wrapper {
            width: 64px;
            height: 64px;
            border-radius: 16px;
        }

        .mini-stat-icon {
            width: 48px;
            height: 48px;
            font-size: 1.2rem;
        }
    }

    /* Tablet adjustments */
    @media (max-width: 991.98px) and (min-width: 576px) {
        .stat-icon-wrapper {
            width: 56px;
            height: 56px;
        }
    }

    /* Mobile specific */
    @media (max-width: 575.98px) {
        .container-fluid {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }

        .welcome-banner h2 {
            font-size: 1.25rem !important;
        }

        .stat-card h2 {
            font-size: 1.5rem !important;
        }

        .btn-group {
            width: 100%;
        }

        .btn-group .btn {
            flex: 1;
        }

        /* Optimize chart on mobile */
        .card-body canvas {
            max-height: 250px;
        }

        /* Reduce spacing on mobile */
        .mini-stat-item {
            padding: 0.75rem !important;
        }
    }

    /* Extra small mobile devices */
    @media (max-width: 374.98px) {
        .stat-icon-wrapper {
            width: 40px;
            height: 40px;
        }

        .stat-icon-wrapper i {
            font-size: 1rem !important;
        }

        .mini-stat-icon {
            width: 36px;
            height: 36px;
        }

        .badge {
            font-size: 0.65rem;
        }
    }

    /* Ensure proper spacing on all screen sizes */
    @media (max-width: 767.98px) {
        .card-body {
            padding: 1rem !important;
        }

        .card-header {
            padding: 1rem !important;
        }
    }

    /* Fix chart responsiveness */
    canvas {
        max-width: 100% !important;
        height: auto !important;
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

    // Responsive font sizes
    const isMobile = window.innerWidth < 768;
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: isMobile 
                ? ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Ming']
                : ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Pengunjung',
                data: [120, 190, 150, 220, 300, 280, 350],
                borderWidth: isMobile ? 2 : 3,
                borderColor: '#667eea',
                backgroundColor: gradient,
                tension: 0.4,
                fill: true,
                pointRadius: isMobile ? 4 : 6,
                pointHoverRadius: isMobile ? 6 : 8,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#667eea',
                pointBorderWidth: isMobile ? 2 : 3,
                pointHoverBackgroundColor: '#667eea',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: isMobile ? 2 : 3
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
                    padding: isMobile ? 8 : 12,
                    titleFont: {
                        size: isMobile ? 12 : 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: isMobile ? 11 : 13
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
                        padding: isMobile ? 5 : 10,
                        font: {
                            size: isMobile ? 10 : 12
                        },
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
                        padding: isMobile ? 5 : 10,
                        font: {
                            size: isMobile ? 10 : 12
                        }
                    }
                }
            }
        }
    });

    // Redraw chart on window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            location.reload();
        }, 500);
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