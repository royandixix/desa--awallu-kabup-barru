@extends('user.layouts.app')

@section('title', 'Transparansi Anggaran')

@section('header_transparansi')
    @include('user.partials.navbar')
    @include('user.partials.header_transparansi')
@endsection

@section('content')

<div class="bg-gray-50 py-16 text-[18px]"
    x-data="{
        tahun: '{{ $rekap->first()->tahun ?? date('Y') }}',
        showModal: false,
        modalTitle: '',
        modalPdfUrl: '',
        budgetData: {
            @if($rekap && $rekap->count())
                @foreach ($rekap as $item)
                    '{{ $item->tahun }}': {
                        pemasukan: {{ $item->pemasukan }},
                        pengeluaran: {{ $item->pengeluaran }}
                    },
                @endforeach
            @endif
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
        },
        previewFile(file, judul, extension) {
            if (extension === 'pdf') {
                this.modalPdfUrl = file;
                this.modalTitle = judul;
                this.showModal = true;
            } else {
                window.open(file, '_blank');
            }
        }
    }"
>

    <div class="container mx-auto px-8 max-w-7xl">

        {{-- SECTION 1 --}}
        <div class="mb-12" data-aos="fade-up" data-aos-delay="200">

            <div class="mb-8">
                <h2 class="text-3xl text-black mb-3">
                    1. Transparansi Anggaran
                </h2>
                <p class="text-black mb-2">
                    Berikut ini adalah data mengenai transparansi anggaran Pemerintah Desa Lawallu.
                </p>
            </div>

            {{-- PILIH TAHUN --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
                <h3 class="text-2xl text-black">
                    Transparansi Anggaran<br>
                    Tahun <span x-text="tahun"></span>
                </h3>

                <div class="text-left md:text-right">
                    <p class="text-black mb-2">Rekap Keuangan</p>

                    <select x-model="tahun"
                        class="border-gray-300 rounded-md px-4 py-2 shadow-sm bg-white focus:ring-teal-500 focus:border-teal-500">

                        @foreach ($rekap as $r)
                            <option value="{{ $r->tahun }}">{{ $r->tahun }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            {{-- CARDS PEMASUKAN & PENGELUARAN --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- PEMASUKAN --}}
                <div class="bg-white border-2 border-green-200 rounded-lg p-6 shadow-sm hover:shadow-lg transition">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-green-700 font-medium">Pemasukan</span>
                    </div>

                    <p class="text-2xl font-semibold text-black"
                       x-text="formatRupiah(currentPemasukan)">
                    </p>
                </div>

                {{-- PENGELUARAN --}}
                <div class="bg-white border-2 border-red-200 rounded-lg p-6 shadow-sm hover:shadow-lg transition">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                clip-rule="evenodd" transform="rotate(180 10 10)" />
                        </svg>
                        <span class="text-red-700 font-medium">Pengeluaran</span>
                    </div>

                    <p class="text-2xl font-semibold text-black"
                       x-text="formatRupiah(currentPengeluaran)">
                    </p>
                </div>

            </div>

            {{-- SURPLUS --}}
            <div class="bg-white border-2 border-gray-200 rounded-lg p-6 text-center shadow-sm">
                <p class="text-black font-medium mb-2">Surplus / Defisit</p>
                <p class="text-3xl font-bold"
                   :class="currentSurplus >= 0 ? 'text-teal-600' : 'text-red-600'"
                   x-text="formatRupiah(currentSurplus)">
                </p>
            </div>

        </div>

        {{-- ===================================================== --}}
        {{-- SECTION 2 - GRAFIK --}}
        {{-- ===================================================== --}}
        <section class="mb-24" data-aos="fade-up" data-aos-delay="300">
            <h2 class="text-3xl text-black mb-6">2. Grafik Transparansi Anggaran</h2>

            <div class="max-w-5xl">
                <canvas id="budgetChart" class="w-full" style="height:420px"></canvas>
            </div>
        </section>

        {{-- ===================================================== --}}
        {{-- SECTION 3 - DOKUMEN DARI DATABASE --}}
        {{-- ===================================================== --}}
        <section class="mb-20" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-3xl text-gray-800 mb-2 text-left">
                3. Daftar Dokumen Transparansi
            </h2>

            <p class="text-gray-500 mb-8">
                Berikut adalah dokumen APBDes yang dapat diakses publik.
            </p>

            <div class="space-y-6">

                @forelse ($anggarans as $item)
                    @php
                        $ext = pathinfo($item->file, PATHINFO_EXTENSION);
                    @endphp
                    <div class="border-l-4 border-teal-500 bg-white p-6 rounded-lg shadow-sm hover:bg-teal-50
                        flex flex-col md:flex-row md:items-center md:justify-between transition">

                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">
                                {{ $item->judul }} - {{ $item->jenis }}
                            </h3>

                            <p class="text-gray-500 text-sm mt-1 flex items-center gap-2">
                                <i class="bi bi-calendar3 text-teal-600"></i>
                                {{ $item->tanggal?->format('d/m/Y') ?? '-' }}
                            </p>
                        </div>

                        <div class="flex gap-3 mt-4 md:mt-0">

                            {{-- Modal Preview PDF --}}
                            <button
                                @click="previewFile('{{ asset('storage/'.$item->file) }}', '{{ $item->judul }} ({{ $item->jenis }})', '{{ $ext }}')"
                                class="px-4 py-2 border border-red-500 text-red-500 rounded-lg
                                    hover:bg-red-500 hover:text-white transition flex items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-lg"></i>
                                Lihat
                            </button>

                            {{-- Download --}}
                            <a href="{{ asset('storage/'.$item->file) }}" download
                                class="px-4 py-2 border border-green-600 text-green-600 rounded-lg
                                    hover:bg-green-600 hover:text-white transition flex items-center gap-2">
                                <i class="bi bi-download text-lg"></i>
                                Download
                            </a>

                        </div>
                    </div>

                @empty
                    <p class="text-gray-500">Belum ada dokumen anggaran yang tersedia.</p>
                @endforelse

            </div>

        </section>

    </div>

    {{-- Modal PDF - Enhanced Version --}}
    <div 
        x-show="showModal"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.self="showModal = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm p-4"
    >
        <div 
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="bg-white w-full max-w-6xl rounded-2xl shadow-2xl overflow-hidden"
            style="max-height: 90vh;"
        >
            <!-- Header dengan gradient -->
            <div class="flex justify-between items-center px-6 py-4 bg-gradient-to-r from-teal-600 to-teal-500 text-white">
                <div class="flex items-center gap-3">
                    <i class="bi bi-file-earmark-pdf-fill text-2xl"></i>
                    <div>
                        <h3 class="text-lg font-semibold" x-text="modalTitle"></h3>
                        <p class="text-xs text-teal-100">Dokumen Transparansi Anggaran</p>
                    </div>
                </div>
                <button 
                    @click="showModal = false" 
                    class="text-white hover:bg-white hover:bg-opacity-20 rounded-full p-2 transition-all duration-200"
                    title="Tutup"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Body: PDF iframe dengan loading -->
            <div class="relative bg-gray-100" style="height: calc(90vh - 160px);">
                <!-- Loading Spinner -->
                <div class="absolute inset-0 flex items-center justify-center bg-gray-50">
                    <div class="text-center">
                        <div class="inline-block animate-spin rounded-full h-12 w-12 border-4 border-teal-500 border-t-transparent mb-4"></div>
                        <p class="text-gray-600 font-medium">Memuat dokumen...</p>
                    </div>
                </div>
                
                <!-- PDF Viewer -->
                <iframe 
                    :src="modalPdfUrl + '#toolbar=1&navpanes=1&scrollbar=1'" 
                    class="w-full h-full relative z-10"
                    frameborder="0"
                    loading="lazy"
                ></iframe>
            </div>

            <!-- Footer dengan action buttons -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-3 px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <i class="bi bi-info-circle"></i>
                    <span>Gunakan zoom browser untuk memperbesar/memperkecil</span>
                </div>
                
                <div class="flex gap-3">
                    <a 
                        :href="modalPdfUrl" 
                        target="_blank" 
                        class="px-5 py-2.5 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-all duration-200 flex items-center gap-2 shadow-md hover:shadow-lg"
                    >
                        <i class="bi bi-box-arrow-up-right"></i>
                        <span>Buka Tab Baru</span>
                    </a>
                    
                    <a 
                        :href="modalPdfUrl" 
                        download 
                        class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-200 flex items-center gap-2 shadow-md hover:shadow-lg"
                    >
                        <i class="bi bi-download"></i>
                        <span>Download</span>
                    </a>
                    
                    <button 
                        @click="showModal = false" 
                        class="px-5 py-2.5 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 flex items-center gap-2"
                    >
                        <i class="bi bi-x-lg"></i>
                        <span>Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- SCRIPTS --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({ duration: 800, once: true });

    document.addEventListener('DOMContentLoaded', function () {

        const ctx = document.getElementById('budgetChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($rekap as $r)
                        '{{ $r->tahun }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: 'Pendapatan',
                        data: [
                            @foreach ($rekap as $r)
                                {{ $r->pemasukan }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(45, 212, 191, 0.8)',
                        borderRadius: 10,
                    },
                    {
                        label: 'Pengeluaran',
                        data: [
                            @foreach ($rekap as $r)
                                {{ $r->pengeluaran }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(244, 114, 182, 0.8)',
                        borderRadius: 10,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

    });
</script>

<style>[x-cloak]{ display:none!important }</style>

@endsection