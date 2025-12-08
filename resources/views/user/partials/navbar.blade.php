<style>
    /* Dropdown desktop */
    .dropdown-content-desktop {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .dropdown-content-desktop.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
    }

    /* Icon rotate desktop */
    .dropdown-btn-desktop i {
        transition: transform 0.3s ease;
    }

    .dropdown-btn-desktop.active i {
        transform: rotate(180deg);
    }

    /* Mobile dropdown */
    .dropdown-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-in-out;
    }

    .dropdown-content.open {
        max-height: 500px;
    }

    /* Icon rotate mobile */
    .dropdown-btn i {
        transition: transform 0.3s ease;
    }

    .dropdown-btn.open i {
        transform: rotate(180deg);
    }

    /* Ensure mobile toggle is always clickable */
    #mobile-toggle {
        position: relative;
        z-index: 99999 !important;
        cursor: pointer !important;
        -webkit-tap-highlight-color: transparent;
        pointer-events: auto !important;
    }

    #menu-icon {
        pointer-events: none !important;
    }

    /* Mobile menu */
    #mobile-menu {
        max-height: 0;
        transition: max-height 0.5s ease-in-out;
    }

    #mobile-menu.show {
        max-height: 1000px;
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
            <button type="button" id="mobile-toggle" 
                class="md:hidden text-white p-2 hover:bg-white/10 rounded-lg transition-colors"
                onclick="window.toggleMobileMenu()"
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
                    <button type="button"
                        class="dropdown-btn-desktop px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 flex items-center transition"
                        onclick="window.toggleDesktopDropdown(this)">
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
                    <button type="button"
                        class="dropdown-btn-desktop px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 flex items-center transition"
                        onclick="window.toggleDesktopDropdown(this)">
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
                <a href="{{ route('user.pengaduan.index') }}"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition flex items-center gap-1">
                    Pengaduan
                </a>
                <a href="{{ route('user.home') }}#kontak"
                    class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition scroll-link">Kontak</a>

                <a href="{{ route('login') }}"
                    class="relative z-50 px-4 py-2 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:scale-105 hover:shadow-lg transition ml-2">
                    Login
                </a>
            </div>
        </div>
    </div>

    <!-- MENU MOBILE -->
    <div id="mobile-menu"
        class="md:hidden bg-teal-950/70 backdrop-blur-xl border-t border-white/10 shadow-inner overflow-hidden">
        <div class="px-4 py-4 space-y-1 text-white text-base font-medium">
            <a href="{{ route('user.home') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Beranda</a>
            <a href="{{ route('user.profil') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Profil Desa</a>
            <a href="{{ route('user.galeri') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Galeri</a>

            <!-- Dropdown Transparansi Mobile -->
            <div class="dropdown-wrapper-mobile">
                <button type="button"
                    class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition dropdown-btn"
                    onclick="window.toggleMobileDropdown(this)">
                    Transparansi <i class="bi bi-chevron-down transition-transform duration-200"></i>
                </button>
                <div class="dropdown-content">
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
            <div class="dropdown-wrapper-mobile">
                <button type="button"
                    class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition dropdown-btn"
                    onclick="window.toggleMobileDropdown(this)">
                    Struktur <i class="bi bi-chevron-down transition-transform duration-200"></i>
                </button>
                <div class="dropdown-content">
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
            <a href="{{ route('user.pengaduan.index') }}"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition flex items-center gap-2">Pengaduan</a>
            <a href="{{ route('user.home') }}#kontak"
                class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition scroll-link">Kontak</a>
            <a href="{{ route('login') }}"
                class="relative z-50 block text-center py-2.5 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:shadow-lg transition">
                Login
            </a>
        </div>
    </div>
</nav>

<script>
// ===== GLOBAL FUNCTIONS (SELALU AVAILABLE) =====
console.log('🚀 NAVBAR SCRIPT LOADED');

// Toggle Mobile Menu
window.toggleMobileMenu = function() {
    console.log('🍔 HAMBURGER CLICKED!');
    
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    
    if (!mobileMenu || !menuIcon) {
        console.error('❌ Elements not found!');
        return;
    }
    
    const isOpen = mobileMenu.classList.contains('show');
    
    console.log('Is Open:', isOpen);
    
    if (isOpen) {
        mobileMenu.classList.remove('show');
        menuIcon.classList.remove('bi-x-lg');
        menuIcon.classList.add('bi-list');
        console.log('❌ Menu CLOSED');
        
        // Reset dropdowns
        document.querySelectorAll('.dropdown-content').forEach(function(c) {
            c.classList.remove('open');
        });
        document.querySelectorAll('.dropdown-btn').forEach(function(b) {
            b.classList.remove('open');
        });
    } else {
        mobileMenu.classList.add('show');
        menuIcon.classList.remove('bi-list');
        menuIcon.classList.add('bi-x-lg');
        console.log('✅ Menu OPENED');
    }
};

// Toggle Mobile Dropdown
window.toggleMobileDropdown = function(btn) {
    console.log('🎯 Mobile Dropdown clicked');
    
    const content = btn.nextElementSibling;
    if (!content) {
        console.error('❌ Content not found');
        return;
    }
    
    const isOpen = content.classList.contains('open');
    
    // Close all other dropdowns
    document.querySelectorAll('.dropdown-content').forEach(function(c) {
        if (c !== content) c.classList.remove('open');
    });
    document.querySelectorAll('.dropdown-btn').forEach(function(b) {
        if (b !== btn) b.classList.remove('open');
    });
    
    // Toggle current
    if (isOpen) {
        content.classList.remove('open');
        btn.classList.remove('open');
        console.log('📤 Dropdown closed');
    } else {
        content.classList.add('open');
        btn.classList.add('open');
        console.log('📥 Dropdown opened');
    }
};

// Toggle Desktop Dropdown
window.toggleDesktopDropdown = function(btn) {
    const wrapper = btn.closest('.dropdown-wrapper');
    if (!wrapper) return;
    
    const content = wrapper.querySelector('.dropdown-content-desktop');
    if (!content) return;
    
    const isOpen = content.classList.contains('show');
    
    // Close all dropdowns
    document.querySelectorAll('.dropdown-content-desktop').forEach(function(c) {
        c.classList.remove('show');
    });
    document.querySelectorAll('.dropdown-btn-desktop').forEach(function(b) {
        b.classList.remove('active');
    });
    
    // Toggle current
    if (!isOpen) {
        content.classList.add('show');
        btn.classList.add('active');
    }
};

// Close desktop dropdown on outside click
document.addEventListener('click', function(e) {
    if (!e.target.closest('.dropdown-wrapper') && !e.target.closest('.dropdown-btn-desktop')) {
        document.querySelectorAll('.dropdown-content-desktop').forEach(function(c) {
            c.classList.remove('show');
        });
        document.querySelectorAll('.dropdown-btn-desktop').forEach(function(b) {
            b.classList.remove('active');
        });
    }
});

// Close mobile menu when link clicked
document.addEventListener('click', function(e) {
    if (e.target.closest('#mobile-menu a')) {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        
        if (mobileMenu) mobileMenu.classList.remove('show');
        if (menuIcon) {
            menuIcon.classList.remove('bi-x-lg');
            menuIcon.classList.add('bi-list');
        }
        
        document.querySelectorAll('.dropdown-content').forEach(function(c) {
            c.classList.remove('open');
        });
        document.querySelectorAll('.dropdown-btn').forEach(function(b) {
            b.classList.remove('open');
        });
    }
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;
    
    if (window.scrollY > 50) {
        navbar.classList.add('bg-teal-900/70', 'backdrop-blur-xl', 'shadow-lg');
    } else {
        navbar.classList.remove('bg-teal-900/70', 'backdrop-blur-xl', 'shadow-lg');
    }
});

// Reset on page load
function resetNavbar() {
    console.log('🔄 Resetting navbar');
    
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    
    if (mobileMenu) mobileMenu.classList.remove('show');
    if (menuIcon) {
        menuIcon.classList.remove('bi-x-lg');
        menuIcon.classList.add('bi-list');
    }
    
    document.querySelectorAll('.dropdown-content').forEach(function(c) {
        c.classList.remove('open');
    });
    document.querySelectorAll('.dropdown-btn').forEach(function(b) {
        b.classList.remove('open');
    });
    document.querySelectorAll('.dropdown-content-desktop').forEach(function(c) {
        c.classList.remove('show');
    });
    document.querySelectorAll('.dropdown-btn-desktop').forEach(function(b) {
        b.classList.remove('active');
    });
}

// Run on load
window.addEventListener('load', resetNavbar);

// Run on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', resetNavbar);
} else {
    resetNavbar();
}

// Run on page show (for back/forward navigation)
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        console.log('🔄 Page from cache');
        resetNavbar();
    }
});

// For Turbolinks/Livewire compatibility
document.addEventListener('turbolinks:load', resetNavbar);
document.addEventListener('livewire:load', resetNavbar);
document.addEventListener('DOMContentLoaded', resetNavbar);

console.log('✅ Navbar initialized!');
</script>