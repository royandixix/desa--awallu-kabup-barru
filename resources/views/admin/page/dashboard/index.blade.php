@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- [ Sample Dashboard Cards ] -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Page Views</h6>
                <h4 class="mb-3">
                    4,42,236
                    <span class="badge bg-light-primary border border-primary">
                        <i class="ti ti-trending-up"></i> 59.3%
                    </span>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    You made an extra <span class="text-primary">35,000</span> this year
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Users</h6>
                <h4 class="mb-3">
                    78,250
                    <span class="badge bg-light-success border border-success">
                        <i class="ti ti-trending-up"></i> 70.5%
                    </span>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    You made an extra <span class="text-success">8,900</span> this year
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Order</h6>
                <h4 class="mb-3">
                    18,800
                    <span class="badge bg-light-warning border border-warning">
                        <i class="ti ti-trending-down"></i> 27.4%
                    </span>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    You made an extra <span class="text-warning">1,943</span> this year
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Sales</h6>
                <h4 class="mb-3">
                    $35,078
                    <span class="badge bg-light-danger border border-danger">
                        <i class="ti ti-trending-down"></i> 27.4%
                    </span>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    You made an extra <span class="text-danger">$20,395</span> this year
                </p>
            </div>
        </div>
    </div>

    <!-- [ Charts Section ] -->
    <div class="col-md-12 col-xl-8">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Statistik Pengunjung Bulanan</h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="visitor-chart"></div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-4">
        <h5 class="mb-3">Distribusi Pendapatan</h5>
        <div class="card">
            <div class="card-body">
                <div id="income-overview-chart"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // === VISITOR CHART ===
    var visitorChart = new ApexCharts(document.querySelector("#visitor-chart"), {
        chart: {
            type: 'area',
            height: 300,
            toolbar: { show: false }
        },
        series: [{
            name: 'Pengunjung',
            data: [120, 150, 180, 220, 250, 280, 310, 330, 370, 400, 430, 460]
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
        },
        colors: ['#4f46e5'],
        fill: {
            type: 'gradient',
            gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.1 }
        },
        stroke: { curve: 'smooth', width: 3 },
        dataLabels: { enabled: false },
        grid: { borderColor: '#e5e7eb' }
    });
    visitorChart.render();

    // === INCOME OVERVIEW CHART ===
    var incomeChart = new ApexCharts(document.querySelector("#income-overview-chart"), {
        chart: { type: 'donut', height: 250 },
        series: [45, 25, 15, 15],
        labels: ['Bumdes', 'Anggaran', 'Laporan', 'Lainnya'],
        colors: ['#10b981', '#3b82f6', '#f59e0b', '#ef4444'],
        legend: { position: 'bottom' }
    });
    incomeChart.render();
</script>
@endpush
