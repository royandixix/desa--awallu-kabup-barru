{{-- FILE 1: resources/views/user/transparansi.blade.php --}}
@extends('user.layouts.app')

@section('title', 'Transparansi Anggaran')

@section('header_transparansi')
    @include('user.partials.navbar')
    @include('user.partials.header_transparansi')
@endsection

@section('content')
    <div class="bg-gray-50 py-16 text-[18px]" x-data="{
        tahun: '2025',
        showModal: false,
        modalTitle: '',
        modalPdfUrl: '',
        budgetData: {
            '2023': { pemasukan: 3100000000, pengeluaran: 2700000000 },
            '2024': { pemasukan: 3700000000, pengeluaran: 3200000000 },
            '2025': { pemasukan: 2970729882, pengeluaran: 1848644408 }
        },
        get currentPemasukan() {
            return this.budgetData[this.tahun]?.pemasukan || 0;
        },
        get currentPengeluaran() {
            return this.budgetData[this.tahun]?.pengeluaran || 0;
        },
        get currentSurplus() {
            return this.currentPemasukan - this.currentPengeluaran;
        },
        formatRupiah(amount) {
            return 'Rp' + amount.toLocaleString('id-ID') + ',00';
        }
    }">
        <div class="container mx-auto px-8 max-w-7xl">

            {{-- SECTION 1: LAPORAN TRANSPARANSI ANGGARAN --}}
            <div class="mb-12" data-aos="fade-up" data-aos-delay="200">
                {{-- Heading Section --}}
                <div class="mb-8">
                    <h2 class="text-3xl text-black mb-3">
                        1. Transparansi Anggaran
                    </h2>
                    <p class="text-black mb-2">
                        Berikut ini adalah data mengenai transparansi anggaran yang dikelola oleh pemerintah Desa Lawallu.
                    </p>
                    <p class="text-black mb-2">
                        Laporan ini mencakup informasi terkait pemasukan dan pengeluaran desa, serta kondisi surplus atau
                        defisit yang terjadi setiap tahunnya. Tujuan dari transparansi ini adalah untuk memberikan
                        keterbukaan kepada masyarakat mengenai pengelolaan keuangan desa, sehingga warga dapat memantau
                        penggunaan dana secara akurat dan akuntabel.
                    </p>
                    <p class="text-black">
                        Data yang ditampilkan di bawah ini mencakup ringkasan keuangan tahunan, perbandingan antara
                        pendapatan dan pengeluaran, serta dokumen resmi yang dapat diakses dan diunduh oleh masyarakat.
                    </p>
                </div>

                {{-- Card Transparansi Anggaran --}}
                <div>
                    {{-- Title dan Year Selector --}}
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
                        <h3 class="text-2xl text-black">
                            Transparansi Anggaran<br>
                            Tahun <span x-text="tahun"></span>
                        </h3>
                        <div class="text-left md:text-right">
                            <p class="text-black mb-2">Rekap Keuangan</p>
                            <select x-model="tahun"
                                class="border-gray-300 rounded-md px-4 py-2 focus:ring-teal-500 focus:border-teal-500 shadow-sm bg-white">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>

                    {{-- Cards Pemasukan dan Pengeluaran --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        {{-- Card Pemasukan --}}
                        <div class="bg-white border-2 border-green-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-2 mb-3">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-green-700 font-medium">Pemasukan</span>
                            </div>
                            <p class="text-2xl font-semibold text-black" x-text="formatRupiah(currentPemasukan)"></p>
                        </div>

                        {{-- Card Pengeluaran --}}
                        <div class="bg-white border-2 border-red-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-2 mb-3">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                        clip-rule="evenodd" transform="rotate(180 10 10)" />
                                </svg>
                                <span class="text-red-700 font-medium">Pengeluaran</span>
                            </div>
                            <p class="text-2xl font-semibold text-black" x-text="formatRupiah(currentPengeluaran)"></p>
                        </div>
                    </div>

                    {{-- Card Surplus/Defisit --}}
                    <div class="bg-white border-2 border-gray-200 rounded-lg p-6 text-center">
                        <p class="text-black font-medium mb-2">Surplus/Defisit</p>
                        <p class="text-3xl font-bold"
                           :class="currentSurplus >= 0 ? 'text-teal-600' : 'text-red-600'"
                           x-text="formatRupiah(currentSurplus)"></p>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: GRAFIK ANGGARAN --}}
            <section class="mb-24" data-aos="fade-up" data-aos-delay="300">
                <h2 class="text-3xl text-black mb-6 text-left">
                    2. Grafik Transparansi Anggaran
                </h2>
                <p class="text-black text-left mb-10 max-w-3xl">
                    Grafik perbandingan pendapatan dan pengeluaran dari tahun ke tahun.
                </p>

                <div class="max-w-5xl">
                    <canvas id="budgetChart" class="w-full" style="height: 420px;"></canvas>
                </div>
            </section>

            {{-- SECTION 3: DAFTAR DOKUMEN --}}
            <section class="mb-20" data-aos="fade-up" data-aos-delay="400">
                <h2 class="text-3xl text-gray-800 mb-2 text-left">
                    3. Daftar Dokumen Transparansi
                </h2>
                <p class="text-gray-500 mb-8 text-left">
                    Berikut adalah daftar dokumen APBDes yang dapat diakses untuk transparansi dan informasi publik.
                    Anda dapat melihat atau mengunduh dokumen sesuai kebutuhan.
                </p>

                {{-- List Dokumen --}}
                <div class="space-y-6">
                    @foreach (range(1, 4) as $i)
                        <div class="border-l-4 border-teal-500 bg-white p-6 rounded-lg hover:bg-teal-50 transition-all duration-300 flex flex-col md:flex-row md:items-center md:justify-between shadow-sm">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">
                                    APBDes 2025 - {{ $i <= 2 ? 'POKOK' : 'PERUBAHAN' }}
                                </h3>
                                <p class="text-gray-500 text-sm mt-1 flex items-center gap-2">
                                    <i class="bi bi-calendar3 text-teal-600"></i>
                                    Jumat, 05/09/2025
                                </p>
                            </div>

                            <div class="flex gap-3 mt-4 md:mt-0">
                                {{-- Tombol Lihat --}}
                                <button
                                    @click="showModal = true; modalTitle='APBDes 2025 - {{ $i <= 2 ? 'POKOK' : 'PERUBAHAN' }}'; modalPdfUrl='/storage/documents/apbdes-{{ $i }}.pdf'"
                                    class="px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    <i class="bi bi-file-earmark-pdf-fill text-lg"></i>
                                    <span>Lihat</span>
                                </button>

                                {{-- Tombol Download --}}
                                <a href="/storage/documents/apbdes-{{ $i }}.pdf" 
                                   download
                                   class="px-4 py-2 border border-green-600 text-green-600 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    <i class="bi bi-download text-lg"></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="flex justify-center mt-12 space-x-2">
                    <a href="#" 
                       class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all">
                        &laquo;
                    </a>
                    <a href="#" 
                       class="px-4 py-2 bg-teal-600 text-white rounded-lg shadow-md">
                        1
                    </a>
                    <a href="#" 
                       class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all">
                        2
                    </a>
                    <a href="#" 
                       class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all">
                        3
                    </a>
                    <a href="#" 
                       class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all">
                        &raquo;
                    </a>
                </div>
            </section>

        </div>

        {{-- INCLUDE MODAL COMPONENT
        @include('user.components.anggaran_modal') --}}
    </div>

    {{-- SCRIPTS --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS Animation
        AOS.init({
            duration: 800,
            once: true
        });

        // Initialize Chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('budgetChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['2023', '2024', '2025'],
                    datasets: [
                        {
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

    <style>
        [x-cloak] { 
            display: none !important; 
        }
    </style>
@endsection


{{-- ============================================= --}}
{{-- FILE 2: resources/views/user/components/anggaran_modal.blade.php --}}

{{-- MODAL PDF VIEWER --}}
<div x-show="showModal" 
     x-cloak
     @click.away="showModal = false"
     @keydown.escape.window="showModal = false"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 p-4"
     style="display: none;">
    
    <div class="bg-white rounded-lg shadow-2xl w-full max-w-6xl h-[90vh] flex flex-col"
         @click.stop
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90">
        
        {{-- Modal Header --}}
        <div class="flex items-center justify-between p-6 border-b bg-gray-50 rounded-t-lg">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="bi bi-file-earmark-pdf-fill text-red-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800" x-text="modalTitle"></h3>
                    <p class="text-sm text-gray-500">Dokumen Transparansi Anggaran</p>
                </div>
            </div>
            <button @click="showModal = false" 
                    class="text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-gray-200 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        {{-- Modal Body - PDF Viewer --}}
        <div class="flex-1 overflow-hidden p-4 bg-gray-100">
            <div class="w-full h-full bg-white rounded-lg shadow-inner overflow-hidden">
                <iframe :src="modalPdfUrl" 
                        class="w-full h-full"
                        frameborder="0"
                        loading="lazy">
                    <p class="p-4 text-center text-gray-600">
                        Browser Anda tidak mendukung tampilan PDF. 
                        <a :href="modalPdfUrl" 
                           download 
                           class="text-teal-600 hover:underline font-medium">
                            Klik di sini untuk mengunduh
                        </a>
                    </p>
                </iframe>
            </div>
        </div>

        {{-- Modal Footer --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between p-4 border-t bg-gray-50 rounded-b-lg gap-3">
            <p class="text-sm text-gray-500">
                <i class="bi bi-info-circle mr-1"></i>
                Gunakan scroll untuk melihat seluruh dokumen
            </p>
            <div class="flex gap-2">
                <a :href="modalPdfUrl" 
                   target="_blank"
                   class="px-4 py-2 text-sm border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-300 flex items-center gap-2">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>Buka di Tab Baru</span>
                </a>
                <a :href="modalPdfUrl" 
                   download
                   class="px-4 py-2 text-sm bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-all duration-300 flex items-center gap-2">
                    <i class="bi bi-download"></i>
                    <span>Download PDF</span>
                </a>
            </div>
        </div>
    </div>
</div>