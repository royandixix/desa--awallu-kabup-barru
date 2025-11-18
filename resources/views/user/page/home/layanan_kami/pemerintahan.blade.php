@extends('user.layouts.app')
@section('title', 'Pemerintahan Desa')

@section('header_layanan')
    @include('user.partials.header_layanan_kami')
@endsection

@section('content')
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-8 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[500px]">
                
                <!-- Left Side: Illustration -->
                <div class="flex justify-center lg:justify-start" data-aos="fade-right">
                    <div class="relative">
                        <!-- Document 1 (Back) -->
                        <div class="absolute top-0 left-8 w-72 h-80 bg-white rounded-2xl shadow-lg transform rotate-6 opacity-80">
                            <div class="p-8">
                                <div class="w-12 h-12 bg-teal-500 rounded-lg mb-4"></div>
                                <div class="space-y-3">
                                    <div class="h-3 bg-gray-200 rounded w-full"></div>
                                    <div class="h-3 bg-gray-200 rounded w-5/6"></div>
                                    <div class="h-3 bg-gray-200 rounded w-4/6"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Document 2 (Front) -->
                        <div class="relative w-80 h-96 bg-white rounded-2xl shadow-2xl p-8">
                            <!-- Checkmark Items -->
                            <div class="space-y-6 mb-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="h-2 bg-teal-500 rounded w-full"></div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <div class="h-2 bg-gray-200 rounded w-3/4"></div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <div class="h-2 bg-gray-200 rounded w-2/3"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Magnifying Glass -->
                            <div class="absolute -bottom-6 -right-6">
                                <div class="relative">
                                    <div class="w-32 h-32 bg-teal-600 rounded-full shadow-xl"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-20 h-20 border-4 border-gray-700 rounded-full bg-teal-400 bg-opacity-30"></div>
                                    </div>
                                    <div class="absolute bottom-2 right-2 w-16 h-2 bg-gray-700 rounded-full transform rotate-45 origin-bottom-left"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Content -->
                <div data-aos="fade-left">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        Layanan Pemerintahan
                    </h1>
                    <p class="text-gray-600 mb-8 text-lg">
                        Berikut adalah beberapa layanan pemerintahan yang ada di Desa Batupute.
                    </p>

                    <!-- Dropdown Select -->
                    <div class="max-w-md">
                        <select class="w-full px-6 py-4 text-gray-500 bg-white border-2 border-teal-500 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all cursor-pointer text-center text-lg">
                            <option value="">-- Pilih Layanan --</option>
                            <option value="surat">Surat Menyurat</option>
                            <option value="kependudukan">Kependudukan</option>
                            <option value="perizinan">Perizinan</option>
                            <option value="bantuan">Bantuan Sosial</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('budgetChart')?.getContext('2d');
            if (!ctx) return;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['2023', '2024', '2025'],
                    datasets: [{
                            label: 'Pendapatan',
                            data: [3100000000, 3700000000, 2970729882],
                            backgroundColor: 'rgba(45, 212, 191, 0.8)',
                            borderRadius: 10,
                        },
                        {
                            label: 'Pengeluaran',
                            data: [2700000000, 3200000000, 1848644408],
                            backgroundColor: 'rgba(244, 114, 182, 0.8)',
                            borderRadius: 10,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.9)',
                            cornerRadius: 10,
                            padding: 12,
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            callbacks: {
                                label: (ctx) => 'Rp ' + ctx.parsed.y.toLocaleString('id-ID'),
                            },
                        },
                        legend: {
                            labels: {
                                color: '#374151',
                                font: {
                                    size: 14,
                                    weight: '500'
                                },
                            },
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: (v) => 'Rp ' + (v / 1e9).toFixed(1) + ' M',
                                color: '#6b7280',
                                font: {
                                    size: 12
                                },
                            },
                            grid: {
                                color: 'rgba(229, 231, 235, 0.4)'
                            },
                        },
                        x: {
                            ticks: {
                                color: '#374151',
                                font: {
                                    size: 13
                                },
                            },
                            grid: {
                                display: false
                            },
                        },
                    },
                },
            });
        });
    </script>
@endsection
