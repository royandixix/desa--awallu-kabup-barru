@extends('user.layouts.app')
@section('title', 'Kesarah')

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
                        Layanan Kesra
                    </h1>
                    <p class="text-gray-600 mb-8 text-lg">
                        Berikut adalah beberapa informasi bantuan yang ada di Desa Batupute.
                    </p>

                    <!-- Dropdown Select -->
                    <div class="max-w-md">
                        <select class="w-full px-6 py-4 text-gray-500 bg-white border-2 border-teal-500 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all cursor-pointer text-center text-lg">
                            <option value="">-- Pilih Bantuan --</option>
                            <option value="blt-sept">BLT BULAN SEPTEMBER 2025</option>
                            <option value="blt-agust">BLT BULAN AGUSTUS 2025</option>
                            <option value="blt-juli">BLT BULAN JULI 2025</option>
                            <option value="blt-juni">BLT BULAN JUNI 2025</option>
                            <option value="blt-mei">BLT BULAN MEI 2025</option>
                            <option value="blt-april">BLT BULAN APRIL 2025</option>
                            <option value="blt-jan-mar">BLT BULAN JANUARI-MARET 2025</option>
                            <option value="bibit-padi">bantuan Bibit Padi 2025</option>
                            <option value="blt-2025">BLT 2025</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection