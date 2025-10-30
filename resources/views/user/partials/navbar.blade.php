<nav x-data="{ open: false, dropdownTrans: false, dropdownStruktur: false }"
    class="fixed top-0 inset-x-0 z-50 bg-gradient-to-r from-teal-900/95 to-emerald-800/95 backdrop-blur-xl border-b border-white/10 shadow-lg">

    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 lg:h-20">

            <!-- 🌿 LOGO -->
            <a href="{{ route('user.home') }}"
                class="flex items-center space-x-2 sm:space-x-3 flex-shrink-0 pl-2 md:pl-4">
                <img src="/img/user/logo/barru.webp" alt="Logo Desa Lawallu"
                    class="h-10 w-10 sm:h-12 sm:w-12 object-contain transition-transform hover:scale-105" />
                <div class="flex flex-col leading-tight">
                    <span class="text-sm sm:text-base lg:text-lg font-semibold tracking-wide text-white">
                        Desa Lawallu
                    </span>
                    <span class="text-[10px] sm:text-xs text-lime-300 opacity-80">
                        Energi Hijau Nusantara
                    </span>
                </div>
            </a>

            <!-- 📱 TOGGLE MOBILE -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none p-2">
                    <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- 🌳 MENU DESKTOP -->
            <div
                class="hidden md:flex items-center flex-wrap justify-end space-x-1 lg:space-x-3 xl:space-x-5 font-medium text-white text-sm lg:text-base overflow-x-auto">

                <a href="{{ route('user.home') }}"
                    class="px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Beranda</a>
                <a href="{{ route('user.profil') }}"
                    class="px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Profil
                    Desa</a>
                <a href="{{ route('user.galeri') }}"
                    class="px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Galeri</a>

                <!-- 🔻 Dropdown Transparansi -->
                <div class="relative" @mouseenter="dropdownTrans = true" @mouseleave="dropdownTrans = false">
                    <button
                        class="flex items-center px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">
                        <span>Transparansi</span>
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                            :class="dropdownTrans ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdownTrans" x-transition
                        class="absolute top-full left-0 mt-2 w-48 bg-white text-gray-900 rounded-xl shadow-xl overflow-hidden border border-gray-200">
                        <a href="{{ route('user.keuangan') }}"
                            class="block px-4 py-3 hover:bg-lime-50 transition">Keuangan</a>
                        <a href="{{ route('user.pembangunan') }}"
                            class="block px-4 py-3 hover:bg-lime-50 transition">Pembangunan</a>
                    </div>
                </div>

                <!-- 🔻 Dropdown Struktur -->
                <div class="relative" @mouseenter="dropdownStruktur = true" @mouseleave="dropdownStruktur = false">
                    <button
                        class="flex items-center px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">
                        <span>Struktur</span>
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                            :class="dropdownStruktur ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdownStruktur" x-transition
                        class="absolute top-full left-0 mt-2 w-56 bg-white text-gray-900 rounded-xl shadow-xl overflow-hidden border border-gray-200">
                        <a href="{{ route('user.struktur') }}"
                            class="block px-4 py-3 hover:bg-lime-50 transition">Struktur Pemerintahan</a>
                        <a href="{{ route('user.bpd') }}" class="block px-4 py-3 hover:bg-lime-50 transition">BPD</a>
                        <a href="{{ route('user.karangtaruna') }}"
                            class="block px-4 py-3 hover:bg-lime-50 transition">Karang Taruna</a>
                    </div>
                </div>

                <a href="{{ route('user.berita') }}"
                    class="px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Berita</a>
                <a href="{{ route('user.pengaduan') }}"
                    class="px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Pengaduan</a>
                <a href="{{ route('user.kontak') }}"
                    class="px-2 lg:px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Kontak</a>
                <a href="/login"
                    class="px-4 lg:px-5 py-2 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:scale-105 hover:shadow-lg transition whitespace-nowrap ml-2">
                    Login
                </a>



            </div>
        </div>
    </div>

    <!-- 📱 MOBILE MENU -->
    <div x-show="open" x-transition
        class="md:hidden bg-teal-950/98 backdrop-blur-lg border-t border-white/10 shadow-inner">

        <div class="px-4 py-4 space-y-1 font-medium text-white max-h-[calc(100vh-4rem)] overflow-y-auto">
            <a href="{{ route('user.home') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Beranda</a>
            <a href="{{ route('user.profil') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Profil Desa</a>
            <a href="{{ route('user.galeri') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Galeri</a>

            <!-- Dropdown Transparansi Mobile -->
            <div x-data="{ subOpenTrans: false }">
                <button @click="subOpenTrans = !subOpenTrans"
                    class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition text-left">
                    <span>Transparansi</span>
                    <svg class="w-5 h-5 transform transition-transform" :class="subOpenTrans ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="subOpenTrans" x-transition class="pl-4 mt-1 space-y-1">
                    <a href="{{ route('user.keuangan') }}"
                        class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Keuangan</a>
                    <a href="{{ route('user.pembangunan') }}"
                        class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Pembangunan</a>
                </div>
            </div>

            <!-- Dropdown Struktur Mobile -->
            <div x-data="{ subOpenStruktur: false }">
                <button @click="subOpenStruktur = !subOpenStruktur"
                    class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition text-left">
                    <span>Struktur</span>
                    <svg class="w-5 h-5 transform transition-transform" :class="subOpenStruktur ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="subOpenStruktur" x-transition class="pl-4 mt-1 space-y-1">
                    <a href="{{ route('user.struktur') }}"
                        class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Struktur Pemerintahan</a>
                    <a href="{{ route('user.bpd') }}"
                        class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">BPD</a>
                    <a href="{{ route('user.karangtaruna') }}"
                        class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Karang Taruna</a>
                </div>
            </div>

            <a href="{{ route('user.berita') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Berita</a>
            <a href="{{ route('user.pengaduan') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Pengaduan</a>
            <a href="{{ route('user.kontak') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Kontak</a>

            <div class="pt-4">
                <a href="/login"
                    class="block text-center py-2.5 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:shadow-lg transition">
                    Login
                </a>

            </div>
        </div>
    </div>
</nav>
