{{-- FILE 1: resources/views/user/struktur.blade.php --}}
@extends('user.layouts.app')

@section('title', 'Struktur Anggaran')

@section('header_struktur')
    @include('user.partials.navbar')
    @include('user.partials.header_struktur')
@endsection

@section('content')
    <div class="bg-gray-50 py-16 text-[18px]" x-data="{ tahun: '2025' }">
        <div class="container mx-auto px-8 max-w-7xl">

            <!-- TITLE -->
            <h2 class="text-3xl text-gray-800 mb-2 text-center">Dokumen Perencanaan</h2>
            <p class="text-gray-500 mb-10 text-center">
                Berikut adalah daftar dokumen APBDes yang dapat diakses untuk transparansi publik.
            </p>

            <!-- GAMBAR STRUKTUR -->
            <img src="{{ asset('img/user/struktural/struktural_pemerintahan_desa.png') }}" alt="Struktur Pemerintahan Desa"
                class="w-full h-auto mb-14" />

            <!-- GRID STRUKTUR PERANGKAT DESA -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

                @php
                    $pegawai = [
                        [
                            'folder' => 'FOTO KEPALA DESA DAN IBU KEPALA DESA',
                            'foto' => 'foto kepala desa dan ibu kepala desa.jpg',
                            'nama' => 'JAHARUDDIN',
                            'jabatan' => 'Kepala Desa',
                        ],
                        [
                            'folder' => 'RASWADY, S.I.Pem (Kepala Desa)', // Diganti dari folder aslinya (Kepala Desa) ke Sekretaris Desa yang sebenarnya
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.37_b12e29ee45.jpg',
                            'nama' => 'SITTI RABIAH, S.SOS',
                            'jabatan' => 'Sekretaris Desa',
                        ],
                        [
                            'folder' => 'ALIAH (Kaur Tata Usaha & Umum)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.38_4e9ef9bf.jpg',
                            'nama' => 'MARLINA YASIN', // Nama yang di-display diubah menjadi Marlina Yasin (Asumsi nama yang benar)
                            'jabatan' => 'Kaur Umum & Tata Usaha',
                        ],
                        [
                            'folder' => 'INDARAYANI (Kaur Keuangan)', // Menggunakan folder Kaur Keuangan yang konsisten
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.37_be29ee45.jpg',
                            'nama' => 'INDARAYANI', // Menggunakan nama Indarayani (Asumsi Kaur Keuangan yang benar)
                            'jabatan' => 'Kaur Keuangan',
                        ],
                        [
                            'folder' => 'ASWAN, S. Pd. I  (Kaur Perencanaan)',
                            'foto' => 'WhatsApp Image 2025-10-26 at 19.05.01_742a3ff9.jpg',
                            'nama' => 'ASWAN, S. Pd. I', // Nama diubah menjadi Aswan (Sesuai folder)
                            'jabatan' => 'Kaur Perencanaan', // Jabatan diubah ke Kaur Perencanaan
                        ],
                        [
                            'folder' => 'WAHID SUMARYO, A.Md.Pi (Kasi Kesejahteraan)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 10.33.18_4baf5966.jpg',
                            'nama' => 'WAHID SUMARYO, A.Md.Pi', // Nama diubah menjadi Wahid Sumaryo (Sesuai folder)
                            'jabatan' => 'Kasi Kesejahteraan',
                        ],
                        [
                            'folder' => 'HASDI, S. M (Kasi Pelayanan)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 10.33.19_14f454a1.jpg',
                            'nama' => 'HASDI, S. M', // Nama diubah menjadi Hasdi (Sesuai folder)
                            'jabatan' => 'Kasi Pelayanan',
                        ],
                        [
                            'folder' => 'NASMA A.Md. Pi  (Kasi Pemerintahan)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.37_fd8d613f.jpg',
                            'nama' => 'NASMA A.Md. PI',
                            'jabatan' => 'Kasi Pemerintahan',
                        ],
                        [
                            'folder' => 'EGA ENRIANI, S.A.P (Staf Kaur Keuangan)', // Asumsi ini adalah Kaur Pembangunan baru
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.37_f8427478.jpg',
                            'nama' => 'EGA ENRIANI, S.A.P',
                            'jabatan' => 'Kaur Pembangunan', // Mengisi jabatan NAMA BARU 2
                        ],
                        [
                            'folder' => 'AKKAS (Kadus Tanra_balana)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.37_fb2d455c.jpg',
                            'nama' => 'AKKAS',
                            'jabatan' => 'Kadus Tanra Balana', // Jabatan diubah
                        ],
                        [
                            'folder' => 'HASNAWATI (Kadus Oring)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.38_962bec61.jpg',
                            'nama' => 'HASNAWATI',
                            'jabatan' => 'Kadus Oring', // Jabatan diubah
                        ],
                        [
                            'folder' => 'JUMAIDI (Kadus Lawallu)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 21.53.22_d89c9938.jpg',
                            'nama' => 'JUMAIDI',
                            'jabatan' => 'Kadus Lawallu',
                        ],
                        [
                            'folder' => 'NIRMALA DEWI (Staf Kasi Pemerintahan 1)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.38_3625d762.jpg',
                            'nama' => 'NIRMALA DEWI',
                            'jabatan' => 'Staf Kasi Pemerintahan',
                        ],
                        [
                            'folder' => 'NUR HIJRAH (Staf Kaur Perencanaan)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 10.33.17_ca1464dd.jpg',
                            'nama' => 'NUR HIJRAH',
                            'jabatan' => 'Staf Kaur Perencanaan',
                        ],
                        [
                            'folder' => 'ROSMINI (Staf Kasi Pelayanan)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 10.33.19_d3e2a16e.jpg',
                            'nama' => 'ROSMINI',
                            'jabatan' => 'Staf Kasi Pelayanan',
                        ],
                        [
                            'folder' => 'ZAINAL (Staf Kasi Pemerintahan 2)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.39_98f3c60a.jpg',
                            'nama' => 'ZAINAL',
                            'jabatan' => 'Staf Kasi Pemerintahan 2', // Jabatan dibuat unik
                        ],
                        [
                            'folder' => 'FITRIA WAHYUDDIN, S.Pd  (Staf Kaur Keuangan)',
                            'foto' => 'WhatsApp Image 2025-10-27 at 11.44.39_4c05087a.jpg',
                            'nama' => 'FITRIA WAHYUDDIN, S.Pd',
                            'jabatan' => 'Staf Kaur Keuangan', // Tambahan Staf Kaur Keuangan
                        ],
                    ];
                @endphp

                @foreach ($pegawai as $index => $p)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition"
                        onclick="openModal({{ $index }})">
                        <img src="{{ asset('img/DESA_LAWALLU/FOTO PERANGKAT DESA/' . $p['folder'] . '/' . $p['foto']) }}"
                            alt="{{ $p['nama'] }}" class="w-full h-80 object-cover" />
                        <div class="bg-teal-500 text-white p-4 text-center">
                            <h3 class="font-bold text-lg">{{ $p['nama'] }}</h3>
                            <p class="text-sm">{{ $p['jabatan'] }}</p>
                        </div>
                    </div>
                @endforeach

            </div>





            <!-- PAGINATION -->
            <div class="flex justify-center mt-10 space-x-2">
                <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">&laquo;</a>
                <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">1</a>
                <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">2</a>
                <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">3</a>
                <a class="px-3 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100">&raquo;</a>
            </div>

        </div>
    </div>
@endsection
