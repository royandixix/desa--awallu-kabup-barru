<style>
    .dropdown-content-desktop {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
    }

    .dropdown-content-desktop.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-btn i {
        transition: transform 0.3s ease;
    }

    .dropdown-btn.active i {
        transform: rotate(180deg);
    }
</style>
<nav id="navbar"
    class="fixed top-0 inset-x-0 z-50 bg-teal-900/40 backdrop-blur-md border-b border-white/10 transition-all duration-500">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 lg:h-20">

            <!-- LOGO -->
            <a href="{{ route('user.home') }}" class="flex items-center space-x-2 flex-shrink-0 pl-2">
                <img src="/img/user/logo/barru.webp" alt="Logo Desa Lawallu"
                    class="h-10 w-10 sm:h-12 sm:w-12 object-contain transition-transform hover:scale-105" />
                <div class="flex flex-col leading-tight">
                    <span class="text-base font-semibold tracking-wide text-white">Desa Lawallu</span>
                    <span class="text-[11px] text-lime-300/90">Energi Hijau Nusantara</span>
                </div>
            </a>

            <!-- TOGGLE MOBILE -->
            <button id="mobile-toggle" class="md:hidden text-white p-2 hover:bg-white/10 rounded-lg transition-colors"
                aria-label="Toggle menu">
                <i id="menu-icon" class="bi bi-list text-2xl"></i>
            </button>

            <!-- MENU DESKTOP -->
            <div class="hidden md:flex items-center space-x-2 font-medium text-white text-sm lg:text-base">

                <a href="{{ route('user.home') }}"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Beranda</a>
                <a href="{{ route('user.profil') }}"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Profil Desa</a>
                <a href="{{ route('user.galeri') }}"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Galeri</a>

                <!-- Dropdown Transparansi -->
                <div class="relative dropdown-wrapper">
                    <button
                        class="dropdown-btn-desktop px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 flex items-center transition">
                        Transparansi <i class="bi bi-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div
                        class="dropdown-content-desktop absolute top-full left-0 mt-2 w-56 bg-white/95 backdrop-blur-md text-gray-900 rounded-xl shadow-xl border border-white/20 z-50">
                        <a href="{{ route('user.transparansi', ['halaman' => 'anggaran']) }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition rounded-t-xl">Transparansi
                            Anggaran</a>
                        <a href="{{ route('user.transparansi', ['halaman' => 'laporan']) }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition">Laporan Kegiatan</a>
                        <a href="{{ route('user.transparansi', ['halaman' => 'dokumen']) }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition">Dokumen Perencanaan</a>
                        <a href="{{ route('user.transparansi', ['halaman' => 'bumdes']) }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition rounded-b-xl">Bumdes dan Kopdes MP</a>
                    </div>
                </div>

                  
                <!-- Dropdown Struktur -->
                <div class="relative dropdown-wrapper">
                    <button
                        class="dropdown-btn-desktop px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 flex items-center transition">
                        Struktur <i class="bi bi-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div
                        class="dropdown-content-desktop absolute top-full left-0 mt-2 w-52 bg-white/95 backdrop-blur-md text-gray-900 rounded-xl shadow-xl border border-white/20 z-50">
                        <a href="{{ route('user.struktur.pemerintahan_desa') }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition rounded-t-xl">Pemerintah Desa</a>
                        <a href="{{ route('user.struktur.bpd') }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition">BPD</a>
                        <a href="{{ route('user.struktur.pkk') }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition">PKK</a>
                        <a href="{{ route('user.struktur.lpm') }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition">LPM</a>
                        <a href="{{ route('user.struktur.karang_taruna') }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition">Karang Taruna</a>
                        <a href="{{ route('user.struktur.posyandu') }}"
                            class="block px-4 py-2.5 hover:bg-lime-100 transition rounded-b-xl">Posyandu</a>
                    </div>
                </div>

                <a href="{{ route('user.berita') }}"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Berita</a>
                <a href="{{ route('user.pengaduan') }}"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition flex items-center gap-1">
                    Pengaduan
                </a>
                <a href="{{ route('user.kontak') }}"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Kontak</a>

                <a href="/login"
                    class="px-4 py-2 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:scale-105 hover:shadow-lg transition ml-2">Login</a>
            </div>
        </div>
    </div>

    <!-- MENU MOBILE -->
    <div id="mobile-menu"
        class="md:hidden bg-teal-950/70 backdrop-blur-xl border-t border-white/10 shadow-inner max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
        <div class="px-4 py-4 space-y-1 text-white text-base font-medium">
            <a href="{{ route('user.home') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Beranda</a>
            <a href="{{ route('user.profil') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Profil Desa</a>
            <a href="{{ route('user.galeri') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Galeri</a>

            <!-- Dropdown Transparansi Mobile -->
            <div>
                <button
                    class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition dropdown-btn">
                    Transparansi <i class="bi bi-chevron-down transition-transform duration-200"></i>
                </button>
                <div class="max-h-0 overflow-hidden transition-all duration-300 dropdown-content">
                    <div class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('user.transparansi', ['halaman' => 'anggaran']) }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Transparansi Anggaran</a>
                        <a href="{{ route('user.transparansi', ['halaman' => 'laporan']) }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Laporan Kegiatan</a>
                        <a href="{{ route('user.transparansi', ['halaman' => 'dokumen']) }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Dokumen Perencanaan</a>
                        <a href="{{ route('user.transparansi', ['halaman' => 'bumdes']) }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Bumdes dan Kopdes MP</a>
                    </div>
                </div>
            </div>

            <!-- Dropdown Struktur Mobile -->
            <div>
                <button
                    class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition dropdown-btn">
                    Struktur <i class="bi bi-chevron-down transition-transform duration-200"></i>
                </button>
                <div class="max-h-0 overflow-hidden transition-all duration-300 dropdown-content">
                    <div class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('user.struktur.pemerintahan_desa') }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Pemerintah Desa</a>
                        <a href="{{ route('user.struktur.bpd') }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">BPD</a>
                        <a href="{{ route('user.struktur.pkk') }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">PKK</a>
                        <a href="{{ route('user.struktur.lpm') }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">LPM</a>
                        <a href="{{ route('user.struktur.karang_taruna') }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Karang Taruna</a>
                        <a href="{{ route('user.struktur.posyandu') }}"
                            class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Posyandu</a>
                    </div>
                </div>
            </div>

            <a href="{{ route('user.berita') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Berita</a>
            <a href="{{ route('user.pengaduan') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition flex items-center gap-2">
                Pengaduan
            </a>
            <a href="{{ route('user.kontak') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Kontak</a>
            <a href="/login"
                class="block text-center py-2.5 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:shadow-lg transition">Login</a>
        </div>
    </div>
</nav>


<script>
    // ========== MOBILE MENU TOGGLE ==========
    const toggleBtn = document.getElementById('mobile-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            const isOpen = mobileMenu.style.maxHeight && mobileMenu.style.maxHeight !== '0px';
            mobileMenu.style.maxHeight = isOpen ? '0px' : mobileMenu.scrollHeight + 'px';
            menuIcon.classList.toggle('bi-list');
            menuIcon.classList.toggle('bi-x-lg');
        });
    }

    // ========== MOBILE DROPDOWN ==========
    function initMobileDropdown() {
        const dropdownBtns = document.querySelectorAll('.dropdown-btn');
        dropdownBtns.forEach(btn => {
            // Hapus event listener lama
            btn.replaceWith(btn.cloneNode(true));
        });

        // Re-query setelah clone
        document.querySelectorAll('.dropdown-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const content = btn.nextElementSibling;
                const icon = btn.querySelector('i');
                const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

                // Tutup semua dropdown lain
                document.querySelectorAll('.dropdown-content').forEach(c => {
                    if (c !== content) {
                        c.style.maxHeight = '0px';
                    }
                });
                document.querySelectorAll('.dropdown-btn').forEach(b => {
                    if (b !== btn) {
                        b.classList.remove('active');
                    }
                });

                // Toggle dropdown yang diklik
                if (isOpen) {
                    content.style.maxHeight = '0px';
                    btn.classList.remove('active');
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    btn.classList.add('active');
                    // Update mobile menu height
                    setTimeout(() => {
                        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                    }, 300);
                }
            });
        });
    }

    // Jalankan saat halaman load
    initMobileDropdown();

    // ========== DESKTOP DROPDOWN ==========
    function initDesktopDropdown() {
        const desktopBtns = document.querySelectorAll('.dropdown-btn-desktop');
        desktopBtns.forEach(btn => {
            // Hapus event listener lama jika ada
            btn.replaceWith(btn.cloneNode(true));
        });

        // Re-query setelah clone
        document.querySelectorAll('.dropdown-btn-desktop').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                const content = btn.nextElementSibling;
                const isOpen = content.classList.contains('show');

                // Tutup semua dropdown lain
                document.querySelectorAll('.dropdown-content-desktop').forEach(c => {
                    c.classList.remove('show');
                });

                // Toggle dropdown yang diklik
                if (!isOpen) {
                    content.classList.add('show');
                }
            });
        });
    }

    // Jalankan saat halaman load
    initDesktopDropdown();

    // Tutup dropdown saat klik di luar
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.dropdown-wrapper')) {
            document.querySelectorAll('.dropdown-content-desktop').forEach(c => {
                c.classList.remove('show');
            });
        }
    });

    // ========== NAVBAR SCROLL EFFECT ==========
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbar');
        if (window.scrollY > 50) {
            nav.classList.add('bg-teal-900/70', 'backdrop-blur-xl', 'shadow-lg');
        } else {
            nav.classList.remove('bg-teal-900/70', 'backdrop-blur-xl', 'shadow-lg');
        }
    });

    // ========== CLOSE MOBILE MENU ON LINK CLICK ==========
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            if (mobileMenu) {
                mobileMenu.style.maxHeight = '0px';
                if (menuIcon) {
                    menuIcon.classList.remove('bi-x-lg');
                    menuIcon.classList.add('bi-list');
                }
            }
        });
    });

    // ========== RE-INIT SAAT DOM READY ==========
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            initMobileDropdown();
            initDesktopDropdown();
        });
    } else {
        initMobileDropdown();
        initDesktopDropdown();
    }
</script>
