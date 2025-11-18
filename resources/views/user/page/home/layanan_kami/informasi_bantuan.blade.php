@extends('user.layouts.app')
@section('title', 'informasi_bantuan')
@section('header_layanan')
    @include('user.partials.header_layanan_kami')
@endsection
@section('content')
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-8 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[500px]">
                
                <!-- Left Side: Social Aid Illustration -->
                <div class="flex justify-center lg:justify-start" data-aos="fade-right">
                    <div class="relative">
                        <!-- Main Card -->
                        <div class="relative w-80 h-96 bg-white rounded-2xl shadow-2xl p-8">
                            <!-- Icon Circle -->
                            <div class="flex justify-center mb-6">
                                <div class="w-24 h-24 bg-teal-500 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- List Items -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">BLT</span>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-10 h-10 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">PKH</span>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-10 h-10 bg-teal-300 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">Bantuan Sosial</span>
                                </div>
                            </div>

                            <!-- Bottom Accent -->
                            <div class="absolute bottom-0 left-0 right-0 h-2 bg-teal-500 rounded-b-2xl"></div>
                        </div>

                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-teal-400 rounded-full opacity-50"></div>
                        <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-teal-300 rounded-full opacity-50"></div>
                    </div>
                </div>

                <!-- Right Side: Content -->
                <div data-aos="fade-left">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        Informasi & Bantuan Sosial
                    </h1>
                    <p class="text-gray-600 mb-8 text-lg">
                        Pengajuan bantuan seperti BLT & PKH.
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
                            <option value="pkh">Program Keluarga Harapan (PKH)</option>
                            <option value="bibit-padi">Bantuan Bibit Padi 2025</option>
                            <option value="blt-2025">BLT 2025</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

