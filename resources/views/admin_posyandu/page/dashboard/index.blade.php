@extends('admin_posyandu.layouts.app')

@section('title', 'Dashboard Posyandu')

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
                                <i class="fas fa-clinic-medical me-2" style="color: #ffd700;"></i>
                                Dashboard Posyandu
                            </h2>
                            <p class="text-white-50 mb-0 small">
                                <i class="far fa-calendar-alt me-2"></i>
                                {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                            </p>
                 x       </div>
                    </div>
                    <div class="banner-overlay"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row g-3 g-md-4 mb-3 mb-md-4">
        @php
            $stats = [
                ['label'=>'Ibu Hamil','value'=>$totalIbuHamil,'icon'=>'fas fa-pregnant-woman','bg'=>'primary','bgSubtle'=>'primary-subtle'],
                ['label'=>'Ibu Menyusui','value'=>$totalIbuMenyusui,'icon'=>'fas fa-baby','bg'=>'success','bgSubtle'=>'success-subtle'],
                ['label'=>'Bayi (0-12 Bln)','value'=>$totalBayi,'icon'=>'fas fa-baby-carriage','bg'=>'warning','bgSubtle'=>'warning-subtle'],
                ['label'=>'Balita (1-5 Thn)','value'=>$totalBalita,'icon'=>'fas fa-child','bg'=>'danger','bgSubtle'=>'danger-subtle'],
                ['label'=>'Apras (5-6 Thn)','value'=>$totalApras,'icon'=>'fas fa-running','bg'=>'info','bgSubtle'=>'info-subtle'],
                ['label'=>'PUS','value'=>$totalPUS,'icon'=>'fas fa-venus','bg'=>'purple','bgSubtle'=>'purple-subtle'],
                ['label'=>'WUS','value'=>$totalWUS,'icon'=>'fas fa-female','bg'=>'pink','bgSubtle'=>'pink-subtle'],
                ['label'=>'Pra Lansia + Lansia','value'=>$totalLansia,'icon'=>'fas fa-user-friends','bg'=>'secondary','bgSubtle'=>'secondary-subtle'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                        <div class="flex-grow-1">
                            <p class="text-muted text-uppercase small fw-semibold mb-1 letter-spacing">
                                {{ $stat['label'] }}
                            </p>
                            <h2 class="fw-bold mb-0 fs-3 fs-md-2 counter" data-target="{{ $stat['value'] }}">0</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-{{ $stat['bgSubtle'] }}">
                            <i class="{{ $stat['icon'] }} fa-lg fa-md-2x text-{{ $stat['bg'] }}"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-info-subtle text-info me-2 mb-1">
                            <i class="fas fa-heartbeat me-1"></i>Total Data
                        </span>
                    </div>
                </div>
                <div class="card-accent bg-{{ $stat['bg'] }}"></div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Charts --}}
    <div class="row g-3 g-md-4">
        <div class="col-12 col-xl-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-3 pt-md-4 px-3 px-md-4 pb-0">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-2">
                        <div>
                            <h5 class="fw-bold mb-1 fs-6 fs-md-5">
                                <i class="fas fa-chart-bar text-primary me-2"></i>
                                Data Posyandu Per Kategori
                            </h5>
                            <p class="text-muted small mb-0">Distribusi data kesehatan masyarakat</p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2 px-2 px-md-4" style="height: 350px; min-height: 350px;">
                    <canvas id="posyanduChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Quick Access --}}
        <div class="col-12 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-3 pt-md-4 px-3 px-md-4">
                    <h5 class="fw-bold mb-1 fs-6 fs-md-5">
                        <i class="fas fa-tasks text-primary me-2"></i>
                        Akses Cepat
                    </h5>
                    <p class="text-muted small mb-0">Kelola data posyandu</p>
                </div>
                <div class="card-body px-3 px-md-4">
                    @php
                        $quickLinks = [
                            ['label'=>'Ibu Hamil','route'=>'admin_posyandu.ibu-hamil.index','icon'=>'fas fa-pregnant-woman','bg'=>'primary-subtle'],
                            ['label'=>'Ibu Menyusui','route'=>'admin_posyandu.ibu-menyusui.index','icon'=>'fas fa-baby','bg'=>'success-subtle'],
                            ['label'=>'Bayi (0-12 Bulan)','route'=>'admin_posyandu.bayi_0_sampai_12_bulan.index','icon'=>'fas fa-baby-carriage','bg'=>'warning-subtle'],
                            ['label'=>'Balita (1-5 Tahun)','route'=>'admin_posyandu.balita.index','icon'=>'fas fa-child','bg'=>'danger-subtle'],
                            ['label'=>'Lansia','route'=>'admin_posyandu.lansia.index','icon'=>'fas fa-user-friends','bg'=>'secondary-subtle'],
                        ];
                    @endphp

                    @foreach($quickLinks as $link)
                    <a href="{{ route($link['route']) }}" class="text-decoration-none">
                        <div class="quick-access-item d-flex align-items-center p-2 p-md-3 mb-2 mb-md-3 rounded-3 bg-light-hover">
                            <div class="quick-icon bg-{{ $link['bg'] }} rounded-circle me-2 me-md-3">
                                <i class="{{ $link['icon'] }} text-{{ explode('-', $link['bg'])[0] }}"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-semibold text-dark">{{ $link['label'] }}</p>
                                <small class="text-muted">Kelola data {{ strtolower($link['label']) }}</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Posyandu Location Table --}}
    <div class="row g-3 g-md-4 mt-2">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 pt-3 pt-md-4 px-3 px-md-4">
                    <h5 class="fw-bold mb-1 fs-6 fs-md-5">
                        <i class="fas fa-map-marker-alt text-danger me-2"></i>
                        Data Per Lokasi Posyandu
                    </h5>
                    <p class="text-muted small mb-0">Ringkasan data dari setiap posyandu</p>
                </div>
                <div class="card-body px-3 px-md-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold">Nama Posyandu</th>
                                    <th class="fw-semibold">Lokasi Dusun</th>
                                    <th class="fw-semibold text-center">Ibu Hamil</th>
                                    <th class="fw-semibold text-center">Balita</th>
                                    <th class="fw-semibold text-center">Lansia</th>
                                    <th class="fw-semibold text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posyanduData as $pos)
                                <tr>
                                    <td><i class="fas fa-hospital text-primary me-2"></i><strong>{{ $pos->nama_posyandu }}</strong></td>
                                    <td><span class="badge bg-light text-dark">{{ $pos->lokasi_dusun }}</span></td>
                                    <td class="text-center"><span class="badge bg-primary">{{ $pos->ibu_hamil_count }}</span></td>
                                    <td class="text-center"><span class="badge bg-warning">{{ $pos->balita_count }}</span></td>
                                    <td class="text-center"><span class="badge bg-secondary">{{ $pos->lansia_count }}</span></td>
                                    <td class="text-center"><strong>{{ $pos->total }}</strong></td>
                                </tr>
                                @endforeach
                                <tr class="table-active fw-bold">
                                    <td colspan="2"><i class="fas fa-calculator me-2"></i>TOTAL</td>
                                    <td class="text-center"><span class="badge bg-primary">{{ $grandTotals['ibu_hamil'] }}</span></td>
                                    <td class="text-center"><span class="badge bg-warning">{{ $grandTotals['balita'] }}</span></td>
                                    <td class="text-center"><span class="badge bg-secondary">{{ $grandTotals['lansia'] }}</span></td>
                                    <td class="text-center"><strong>{{ $grandTotals['total'] }}</strong></td>
                                </tr>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Animate counters
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
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.counter').forEach(animateCounter);
    });

    // Chart
    const ctx = document.getElementById('posyanduChart');
    const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(102, 126, 234, 0.5)');
    gradient.addColorStop(1, 'rgba(118, 75, 162, 0.0)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartData['labels']) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode($chartData['data']) !!},
                backgroundColor: [
                    'rgba(13, 110, 253, 0.8)',
                    'rgba(25, 135, 84, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(220, 53, 69, 0.8)',
                    'rgba(13, 202, 240, 0.8)',
                    'rgba(111, 66, 193, 0.8)',
                    'rgba(214, 51, 132, 0.8)',
                    'rgba(108, 117, 125, 0.8)'
                ],
                borderColor: [
                    'rgb(13, 110, 253)',
                    'rgb(25, 135, 84)',
                    'rgb(255, 193, 7)',
                    'rgb(220, 53, 69)',
                    'rgb(13, 202, 240)',
                    'rgb(111, 66, 193)',
                    'rgb(214, 51, 132)',
                    'rgb(108, 117, 125)'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            responsive:true,
            maintainAspectRatio:false,
            plugins:{legend:{display:false}}
        }
    });
</script>
@endpush
