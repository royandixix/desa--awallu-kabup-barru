@extends('user.layouts.app')

@section('title', 'Transparansi BUMDes')

@section('header_transparansi')
    @include('user.partials.navbar')
    @include('user.partials.header_transparansi')
@endsection

@section('content')
<div class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- PENJELASAN HALAMAN -->
        <div class="mb-12 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-3xl text-gray-800 mb-2">Transparansi Dokumen BUMDes</h2>
            <p class="text-gray-500">
                Di halaman ini, Anda dapat melihat dokumen resmi BUMDes dan KOPDes. Setiap dokumen dapat dibuka atau diunduh untuk referensi publik.
            </p>
        </div>

        <!-- DAFTAR DOKUMEN BUMDes -->
        <section class="mb-20" data-aos="fade-up" data-aos-delay="200">
            <div class="space-y-6">
                @forelse($bumdes as $data)
                    <div class="border-l-4 border-teal-500 bg-white p-6 rounded-lg hover:bg-teal-50 transition-all duration-300 flex flex-col md:flex-row md:items-center md:justify-between shadow-sm">

                        {{-- Judul & Tanggal --}}
                        <div>
                            <h3 class="text-xl text-gray-900">{{ $data->judul }} - {{ $data->kategori }}</h3>
                            <p class="text-gray-500 text-sm mt-1 flex items-center gap-2">
                                <i class="bi bi-calendar3 text-teal-600"></i>
                                {{ $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->isoFormat('dddd, DD/MM/YYYY') : '-' }}
                            </p>
                        </div>

                        {{-- Tombol File --}}
                        <div class="flex gap-3 mt-4 md:mt-0">
                            @if($data->file)
                                @php $ext = strtolower(pathinfo($data->file, PATHINFO_EXTENSION)); @endphp

                                {{-- Lihat File --}}
                                <a href="{{ asset('storage/' . $data->file) }}" target="_blank"
                                   class="px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    @if($ext === 'pdf')
                                        <i class="bi bi-file-earmark-pdf-fill text-lg"></i>
                                    @elseif(in_array($ext, ['xls','xlsx']))
                                        <i class="bi bi-file-earmark-excel-fill text-lg"></i>
                                    @elseif(in_array($ext, ['jpg','jpeg','png','webp']))
                                        <i class="bi bi-image-fill text-lg"></i>
                                    @else
                                        <i class="bi bi-file-text-fill text-lg"></i>
                                    @endif
                                    <span>Lihat</span>
                                </a>

                                {{-- Download --}}
                                <a href="{{ asset('storage/' . $data->file) }}" download
                                   class="px-4 py-2 border border-green-600 text-green-600 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    <i class="bi bi-download text-lg"></i>
                                    <span>Download</span>
                                </a>
                            @else
                                <span class="text-gray-400">Tidak ada file</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada dokumen BUMDes atau KOPDes yang tersedia.</p>
                @endforelse
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-center mt-8 space-x-2">
                {{ $bumdes->links('pagination::tailwind') }}
            </div>
        </section>
    </div>
</div>

{{-- SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>
@endsection
