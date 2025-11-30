@extends('user.layouts.app')

@section('title', 'Dokumen Perencanaan')

@section('header_transparansi')
    @include('user.partials.navbar')
    @include('user.partials.header_transparansi')
@endsection

@section('content')
    <div class="bg-gray-50 py-16 text-[18px]" x-data="{ tahun: '2025' }">
        <div class="container mx-auto px-8 max-w-7xl">

            <!-- LAPORAN TRANSPARANSI ANGGARAN -->
            <div class="mb-12" data-aos="fade-up" data-aos-delay="200">
                <!-- Card Transparansi Anggaran -->

            </div>

            <!-- DAFTAR DOKUMEN -->
            <section class="mb-20" data-aos="fade-up" data-aos-delay="400">
                <h2 class="text-3xl text-gray-800 mb-2 text-center">
                    Dokumen Perencanaan
                </h2>
                <p class="text-gray-500 mb-8 text-center">
                    Berikut adalah daftar dokumen APBDes yang dapat diakses untuk transparansi dan informasi publik.
                    Anda dapat melihat atau mengunduh dokumen sesuai kebutuhan.
                </p>


                <div class="space-y-6">
                    @foreach (range(1, 4) as $i)
                        <div
                            class="border-l-4 border-teal-500 bg-white p-6 rounded-lg hover:bg-teal-50 transition-all duration-300 flex flex-col md:flex-row md:items-center md:justify-between shadow-sm">
                            <div>
                                <h3 class="text-xl text-gray-900">
                                    APBDes 2025 - {{ $i <= 2 ? 'POKOK' : 'PERUBAHAN' }}
                                </h3>
                                <p class="text-gray-500 text-sm mt-1 flex items-center gap-2">
                                    <i class="bi bi-calendar3 text-teal-600"></i>
                                    Jumat, 05/09/2025
                                </p>
                            </div>

                            <div class="flex gap-3 mt-4 md:mt-0">
                                <button
                                    @click="showModal = true; modalTitle='APBDes 2025 - {{ $i <= 2 ? 'POKOK' : 'PERUBAHAN' }}'; excelData=[['Item A','1000','Rp1.000'],['Item B','2000','Rp2.000']]"
                                    class="px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    <i class="bi bi-file-earmark-pdf-fill text-lg"></i>
                                    <span>Lihat</span>
                                </button>
                                <button
                                    class="px-4 py-2 border border-green-600 text-green-600 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    <i class="bi bi-download text-lg"></i>
                                    <span>Download</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- PAGINATION (HTML BIASA) -->
                <div class="flex justify-center mt-8 space-x-2">
                    <a href="#" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">
                        &laquo;
                    </a>
                    <a href="#" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">
                        1
                    </a>
                    <a href="#" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">
                        2
                    </a>
                    <a href="#" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">
                        3
                    </a>
                    <a href="#" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">
                        &raquo;
                    </a>
                </div>
            </section>
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
