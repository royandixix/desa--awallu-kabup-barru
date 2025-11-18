@extends('user.layouts.app')
@section('title', 'layanan_aspirasi')

@section('header_layanan')
    @include('user.partials.header_layanan_kami')
@endsection

@section('content')
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-8 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                
                <!-- Left Side: Computer Illustration -->
                <div class="flex justify-center lg:justify-start" data-aos="fade-right">
                    <div class="relative w-full max-w-md">
                        <!-- Monitor Frame -->
                        <div class="relative bg-gray-900 rounded-3xl p-6 shadow-2xl">
                            <!-- Screen -->
                            <div class="bg-white rounded-2xl p-8 relative overflow-hidden min-h-[400px]">
                                <!-- Browser Window Elements -->
                                <div class="absolute top-4 right-4 flex gap-2">
                                    <div class="w-3 h-3 bg-teal-500 rounded-full"></div>
                                    <div class="w-3 h-3 bg-teal-400 rounded-full"></div>
                                </div>

                                <!-- Form Illustration -->
                                <div class="mt-12 space-y-6">
                                    <!-- Image Placeholder -->
                                    <div class="w-32 h-24 bg-gray-200 rounded-lg mx-auto relative">
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="w-12 h-12 bg-gray-300 rounded"></div>
                                        </div>
                                    </div>

                                    <!-- Form Lines -->
                                    <div class="space-y-3">
                                        <div class="h-3 bg-gray-200 rounded w-full"></div>
                                        <div class="h-3 bg-gray-200 rounded w-5/6"></div>
                                        <div class="h-3 bg-gray-200 rounded w-4/6"></div>
                                    </div>

                                    <!-- Button with Arrow -->
                                    <div class="flex items-center gap-3 mt-8">
                                        <div class="w-24 h-10 bg-teal-500 rounded-lg"></div>
                                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </div>

                                    <div class="flex items-center gap-3 mt-4">
                                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                        <div class="w-32 h-10 bg-teal-500 rounded-lg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Monitor Stand -->
                        <div class="flex justify-center mt-4">
                            <div class="w-24 h-16 bg-gray-300 rounded-b-3xl"></div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-48 h-2 bg-gray-900 rounded"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Form -->
                <div data-aos="fade-left">
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <form>
                            <!-- Nama & Nomor HP -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Nama</label>
                                    <input type="text" placeholder="Masukkan Nama Anda" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Nomor HP</label>
                                    <input type="text" placeholder="Masukkan Nomor HP Anda" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                            </div>

                            <!-- Foto Bukti & Kategori -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Foto Bukti</label>
                                    <input type="file" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Kategori</label>
                                    <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                        <option>- Pilih Kategori -</option>
                                        <option>Infrastruktur</option>
                                        <option>Pelayanan Publik</option>
                                        <option>Kesehatan</option>
                                        <option>Pendidikan</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Isi Pengaduan -->
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Isi Pengaduan</label>
                                <textarea rows="6" placeholder="Tulis pengaduan Anda di sini secara lengkap..." class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent resize-none"></textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-4">
                                <button type="reset" class="px-8 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors font-medium">
                                    Reset
                                </button>
                                <button type="submit" class="flex-1 px-8 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors font-medium">
                                    Kirim Pengaduan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection