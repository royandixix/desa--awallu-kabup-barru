<nav class="fixed top-0 inset-x-0 z-50 bg-gradient-to-r from-teal-900/95 to-emerald-800/95 backdrop-blur-xl border-b border-white/10 shadow-lg">
  <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16 lg:h-20">

      <!-- LOGO - Ukuran tetap sama di semua device -->
      <a href="{{ route('user.home') }}" class="flex items-center space-x-2 sm:space-x-3 flex-shrink-0 pl-2 md:pl-4">
        <img src="/img/user/logo/barru.webp" alt="Logo Desa Lawallu" class="h-12 w-12 object-contain transition-transform hover:scale-105" />
        <div class="flex flex-col leading-tight">
          <span class="text-base font-semibold tracking-wide text-white">Desa Lawallu</span>
          <span class="text-xs text-lime-300 opacity-80">Energi Hijau Nusantara</span>
        </div>
      </a>

      <!-- TOGGLE MOBILE -->
      <button id="mobile-toggle" class="md:hidden text-white p-2 hover:bg-white/10 rounded-lg transition-colors active:bg-white/20" aria-label="Toggle menu">
        <i id="menu-icon" class="bi bi-list text-2xl"></i>
      </button>

      <!-- MENU DESKTOP - Font size tetap sama -->
      <div class="hidden md:flex items-center space-x-3 font-medium text-white text-base">

        <a href="{{ route('user.home') }}" class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Beranda</a>
        <a href="{{ route('user.profil') }}" class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Profil Desa</a>
        <a href="{{ route('user.galeri') }}" class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Galeri</a>

        <!-- Dropdown Transparansi Desktop -->
        <div class="relative group">
          <button class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition dropdown-btn-desktop flex items-center">
            Transparansi <i class="bi bi-chevron-down ml-1"></i>
          </button>
          <div class="dropdown-content-desktop opacity-0 invisible group-hover:opacity-100 group-hover:visible absolute top-full left-0 mt-2 w-64 bg-white text-gray-900 rounded-xl shadow-xl border z-[9999] transition-all duration-200">
            <a href="{{ route('user.transparansi.anggaran') }}" class="block px-4 py-3 hover:bg-lime-50 transition">Transparansi Anggaran</a>
            <a href="{{ route('user.transparansi.laporan') }}" class="block px-4 py-3 hover:bg-lime-50 transition">Laporan Kegiatan</a>
            <a href="{{ route('user.transparansi.dokumen') }}" class="block px-4 py-3 hover:bg-lime-50 transition">Dokumen Perencanaan</a>
            <a href="{{ route('user.transparansi.bumdes') }}" class="block px-4 py-3 hover:bg-lime-50 transition">Bumdes dan Kopdes MP</a>
          </div>
        </div>

        <!-- Dropdown Struktur Desktop -->
        <div class="relative group">
          <button class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition dropdown-btn-desktop flex items-center">
            Struktur <i class="bi bi-chevron-down ml-1"></i>
          </button>
          <div class="dropdown-content-desktop opacity-0 invisible group-hover:opacity-100 group-hover:visible absolute top-full left-0 mt-2 w-56 bg-white text-gray-900 rounded-xl shadow-xl border z-[9999] transition-all duration-200">
            <a href="{{ route('user.struktur') }}" class="block px-4 py-3 hover:bg-lime-50 transition">Struktur Pemerintahan</a>
            <a href="{{ route('user.bpd') }}" class="block px-4 py-3 hover:bg-lime-50 transition">BPD</a>
            <a href="{{ route('user.karangtaruna') }}" class="block px-4 py-3 hover:bg-lime-50 transition">Karang Taruna</a>
          </div>
        </div>

        <a href="{{ route('user.berita') }}" class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Berita</a>
        <a href="{{ route('user.pengaduan') }}" class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Pengaduan</a>
        <a href="{{ route('user.kontak') }}" class="px-3 py-2 rounded-lg hover:text-lime-300 hover:bg-white/10 transition">Kontak</a>
        <a href="/login" class="px-4 py-2 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:scale-105 hover:shadow-lg transition whitespace-nowrap ml-2">Login</a>
      </div>
    </div>
  </div>

  <!-- MOBILE MENU - Font size tetap sama dengan desktop -->
  <div id="mobile-menu" class="md:hidden bg-teal-950/98 backdrop-blur-lg border-t border-white/10 shadow-inner max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
    <div class="px-4 py-4 space-y-1 font-medium text-white text-base max-h-[calc(100vh-4rem)] overflow-y-auto">
      <a href="{{ route('user.home') }}" class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Beranda</a>
      <a href="{{ route('user.profil') }}" class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Profil Desa</a>
      <a href="{{ route('user.galeri') }}" class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Galeri</a>

      <!-- Dropdown Transparansi Mobile -->
      <div>
        <button class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition text-left dropdown-btn">
          Transparansi <i class="bi bi-chevron-down transition-transform duration-200"></i>
        </button>
        <div class="max-h-0 overflow-hidden transition-all duration-300 dropdown-content">
          <div class="pl-4 mt-1 space-y-1">
            <a href="{{ route('user.transparansi.anggaran') }}" class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Transparansi Anggaran</a>
            <a href="{{ route('user.transparansi.laporan') }}" class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Laporan Kegiatan</a>
            <a href="{{ route('user.transparansi.dokumen') }}" class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Dokumen Perencanaan</a>
            <a href="{{ route('user.transparansi.bumdes') }}" class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Bumdes dan Kopdes MP</a>
          </div>
        </div>
      </div>

      <!-- Dropdown Struktur Mobile -->
      <div>
        <button class="flex justify-between items-center w-full px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition text-left dropdown-btn">
          Struktur <i class="bi bi-chevron-down transition-transform duration-200"></i>
        </button>
        <div class="max-h-0 overflow-hidden transition-all duration-300 dropdown-content">
          <div class="pl-4 mt-1 space-y-1">
            <a href="{{ route('user.struktur') }}" class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Struktur Pemerintahan</a>
            <a href="{{ route('user.bpd') }}" class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">BPD</a>
            <a href="{{ route('user.karangtaruna') }}" class="block px-4 py-2 rounded-lg hover:bg-lime-600/50 transition">Karang Taruna</a>
          </div>
        </div>
      </div>

      <a href="{{ route('user.berita') }}" class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Berita</a>
      <a href="{{ route('user.pengaduan') }}" class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Pengaduan</a>
      <a href="{{ route('user.kontak') }}" class="block px-4 py-2.5 rounded-lg hover:bg-lime-600/50 transition">Kontak</a>
      <a href="/login" class="block text-center py-2.5 rounded-full bg-gradient-to-r from-lime-400 to-emerald-400 text-teal-900 font-semibold hover:shadow-lg transition">Login</a>
    </div>
  </div>
</nav>

<style>
  .dropdown-content-desktop,
  .dropdown-content {
    transition: all 0.3s ease;
  }
  
  #mobile-menu::-webkit-scrollbar {
    width: 4px;
  }
  
  #mobile-menu::-webkit-scrollbar-thumb {
    background: rgba(163, 230, 53, 0.5);
    border-radius: 4px;
  }
</style>

<script>
  // Toggle mobile menu
  const toggleBtn = document.getElementById('mobile-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuIcon = document.getElementById('menu-icon');
  
  if (toggleBtn && mobileMenu && menuIcon) {
    toggleBtn.addEventListener('click', () => {
      if (mobileMenu.style.maxHeight && mobileMenu.style.maxHeight !== '0px') {
        mobileMenu.style.maxHeight = '0px';
        menuIcon.classList.remove('bi-x-lg');
        menuIcon.classList.add('bi-list');
      } else {
        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
        menuIcon.classList.remove('bi-list');
        menuIcon.classList.add('bi-x-lg');
      }
    });
  }

  // Toggle mobile dropdowns
  const dropdownBtns = document.querySelectorAll('.dropdown-btn');
  dropdownBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector('i');
      
      if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        content.style.maxHeight = '0px';
        if (icon) icon.style.transform = 'rotate(0deg)';
      } else {
        dropdownBtns.forEach(otherBtn => {
          if (otherBtn !== btn) {
            const otherContent = otherBtn.nextElementSibling;
            const otherIcon = otherBtn.querySelector('i');
            if (otherContent) otherContent.style.maxHeight = '0px';
            if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
          }
        });
        
        content.style.maxHeight = content.scrollHeight + 'px';
        if (icon) icon.style.transform = 'rotate(180deg)';
      }
    });
  });

  // Desktop dropdowns fallback
  const desktopDropdowns = document.querySelectorAll('.dropdown-btn-desktop');
  desktopDropdowns.forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      if (content) {
        content.classList.toggle('opacity-0');
        content.classList.toggle('invisible');
        content.classList.toggle('opacity-100');
        content.classList.toggle('visible');
      }
    });
  });

  // Close menu on resize
  window.addEventListener('resize', () => {
    if (window.innerWidth >= 768 && mobileMenu && menuIcon) {
      mobileMenu.style.maxHeight = '0px';
      menuIcon.classList.remove('bi-x-lg');
      menuIcon.classList.add('bi-list');
      
      dropdownBtns.forEach(btn => {
        const content = btn.nextElementSibling;
        const icon = btn.querySelector('i');
        if (content) content.style.maxHeight = '0px';
        if (icon) icon.style.transform = 'rotate(0deg)';
      });
    }
  });

  // Close menu on outside click
  document.addEventListener('click', (e) => {
    if (toggleBtn && mobileMenu && menuIcon) {
      if (!toggleBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
        if (mobileMenu.style.maxHeight && mobileMenu.style.maxHeight !== '0px') {
          mobileMenu.style.maxHeight = '0px';
          menuIcon.classList.remove('bi-x-lg');
          menuIcon.classList.add('bi-list');
        }
      }
    }
    
    // Close desktop dropdowns
    desktopDropdowns.forEach(btn => {
      const content = btn.nextElementSibling;
      if (content && !btn.contains(e.target) && !content.contains(e.target)) {
        content.classList.add('opacity-0', 'invisible');
        content.classList.remove('opacity-100', 'visible');
      }
    });
  });
</script>