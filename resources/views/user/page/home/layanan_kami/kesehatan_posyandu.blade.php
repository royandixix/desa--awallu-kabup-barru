@extends('user.layouts.app')
@section('title', 'pelayanan_kesehatan_posyandu')
@section('header_layanan')
    @include('user.partials.header_layanan_kami')
@endsection
@section('content')
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-8 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[500px]">
                
                <!-- Left Side: Doctor Illustration -->
                <div class="flex justify-center lg:justify-start" data-aos="fade-right">
                    <div class="relative flex items-end gap-8">
                        <!-- Male Doctor -->
                        <div class="relative">
                            <!-- Head -->
                            <div class="relative w-24 h-28 mx-auto mb-2">
                                <div class="absolute top-0 w-full h-20 bg-pink-200 rounded-full"></div>
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-20 h-16 bg-gray-900 rounded-t-full"></div>
                            </div>
                            <!-- Body -->
                            <div class="relative w-40 h-56 bg-gray-100 rounded-t-3xl overflow-hidden">
                                <!-- White Coat -->
                                <div class="absolute inset-0 bg-white"></div>
                                <!-- Teal Accent -->
                                <div class="absolute left-0 top-12 w-20 h-full bg-teal-500 transform -skew-y-12"></div>
                                <!-- Stethoscope -->
                                <div class="absolute top-8 left-1/2 transform -translate-x-1/2 w-1 h-12 bg-gray-800"></div>
                                <div class="absolute top-6 left-1/2 transform -translate-x-1/2 w-8 h-8 border-4 border-gray-800 rounded-full bg-teal-600"></div>
                                <!-- Arms -->
                                <div class="absolute bottom-16 left-2 w-12 h-24 bg-pink-200 rounded-full"></div>
                                <div class="absolute bottom-16 right-2 w-12 h-24 bg-pink-200 rounded-full"></div>
                            </div>
                            <!-- Legs -->
                            <div class="flex gap-2 justify-center mt-1">
                                <div class="w-16 h-32 bg-gray-800 rounded-b-2xl"></div>
                                <div class="w-16 h-32 bg-gray-800 rounded-b-2xl"></div>
                            </div>
                        </div>

                        <!-- Female Doctor -->
                        <div class="relative">
                            <!-- Head -->
                            <div class="relative w-24 h-28 mx-auto mb-2">
                                <div class="absolute top-0 w-full h-20 bg-pink-200 rounded-full"></div>
                                <div class="absolute top-2 left-1/2 transform -translate-x-1/2 w-20 h-24 bg-gray-900 rounded-b-full"></div>
                            </div>
                            <!-- Body -->
                            <div class="relative w-40 h-56 bg-gray-100 rounded-t-3xl overflow-hidden">
                                <!-- White Coat -->
                                <div class="absolute inset-0 bg-white"></div>
                                <!-- Stethoscope -->
                                <div class="absolute top-8 left-1/2 transform -translate-x-1/2 w-1 h-12 bg-gray-800"></div>
                                <div class="absolute top-6 left-1/2 transform -translate-x-1/2 w-8 h-8 border-4 border-gray-800 rounded-full bg-teal-600"></div>
                                <!-- Arms -->
                                <div class="absolute bottom-16 left-2 w-12 h-24 bg-pink-200 rounded-full"></div>
                                <div class="absolute bottom-16 right-2 w-12 h-24 bg-pink-200 rounded-full"></div>
                            </div>
                            <!-- Legs -->
                            <div class="flex gap-2 justify-center mt-1">
                                <div class="w-16 h-32 bg-gray-800 rounded-b-2xl"></div>
                                <div class="w-16 h-32 bg-gray-800 rounded-b-2xl"></div>
                            </div>
                        </div>

                        <!-- Ground Line -->
                        <div class="absolute -bottom-2 left-0 right-0 h-1 bg-gray-800"></div>
                    </div>
                </div>

                <!-- Right Side: Content -->
                <div data-aos="fade-left">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        Informasi Posyandu
                    </h1>
                    <p class="text-gray-600 mb-8 text-lg">
                        Berikut adalah beberapa informasi posyandu yang ada di Desa Batupute.
                    </p>

                    <!-- Dropdown Select -->
                    <div class="max-w-md">
                        <select class="w-full px-6 py-4 text-gray-500 bg-white border-2 border-teal-500 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all cursor-pointer text-center text-lg">
                            <option value="">-- Pilih Lokasi Posyandu --</option>
                            <option value="kencur">Posyandu Kencur Dusun Baturebbange</option>
                            <option value="cocor">Posyandu Cocor Bebek Dusun Batupute</option>
                            <option value="mawar-awerange">Posyandu Mawar Putih II Dusun Awerange</option>
                            <option value="melati">Posyandu Melati Dusun Batupute (Palungeng Gellange)</option>
                            <option value="mawar-ujunge">Posyandu Mawar Putih I Dusun Ujunge</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection