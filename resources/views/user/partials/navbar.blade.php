<nav class="bg-white fixed w-full top-0 z-50 shadow-md transition-all duration-300" id="navbar">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between py-3 md:py-4">
      <!-- Logo & Nama Desa -->
      <a href="{{ url('/') }}" class="flex items-center gap-2 sm:gap-3 group">
        <div class="bg-green-600 text-white rounded-lg flex items-center justify-center font-bold w-10 h-10 sm:w-12 sm:h-12 shadow-md group-hover:bg-green-700 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
          <svg class="w-5 h-5 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
        </div>
        <div class="flex flex-col leading-tight">
          <span class="text-gray-800 font-bold text-base sm:text-lg md:text-xl group-hover:text-green-600 transition-colors duration-300">Desa Batupute</span>
          <small class="text-gray-500 text-xs md:text-sm hidden xs:block">Kab. Barru, Sulawesi Selatan</small>
        </div>
      </a>

      <!-- Hamburger Button -->
      <button id="menu-btn" class="lg:hidden flex flex-col justify-center items-center w-10 h-10 sm:w-12 sm:h-12 focus:outline-none relative group">
        <div class="absolute inset-0 bg-green-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        <span class="hamburger-line block w-6 h-0.5 bg-gray-700 transition-all duration-300 relative z-10"></span>
        <span class="hamburger-line block w-6 h-0.5 bg-gray-700 my-1.5 transition-all duration-300 relative z-10"></span>
        <span class="hamburger-line block w-6 h-0.5 bg-gray-700 transition-all duration-300 relative z-10"></span>
      </button>

      <!-- Desktop Menu -->
      <div class="hidden lg:flex items-center gap-1 xl:gap-2">
        <a href="#" class="nav-link px-3 xl:px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 font-medium transition-all duration-200 rounded-lg relative overflow-hidden group">
          <span class="relative z-10">Beranda</span>
          <span class="absolute inset-0 bg-gradient-to-r from-green-50 to-green-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#" class="nav-link px-3 xl:px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 font-medium transition-all duration-200 rounded-lg relative overflow-hidden group">
          <span class="relative z-10">Profil Desa</span>
          <span class="absolute inset-0 bg-gradient-to-r from-green-50 to-green-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#" class="nav-link px-3 xl:px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 font-medium transition-all duration-200 rounded-lg relative overflow-hidden group">
          <span class="relative z-10">Galeri</span>
          <span class="absolute inset-0 bg-gradient-to-r from-green-50 to-green-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>

        <!-- Dropdown Transparansi -->
        <div class="relative group/dropdown">
          <button class="flex items-center gap-1 px-3 xl:px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 font-medium transition-all duration-200 rounded-lg">
            <span>Transparansi</span>
            <svg class="w-4 h-4 transition-transform duration-300 group-hover/dropdown:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div class="dropdown-menu absolute hidden group-hover/dropdown:block bg-white border border-gray-200 rounded-xl shadow-xl mt-2 min-w-[220px] xl:min-w-[240px] py-2 opacity-0 group-hover/dropdown:opacity-100 transform translate-y-2 group-hover/dropdown:translate-y-0 transition-all duration-300">
            <a href="#" class="dropdown-item flex items-center justify-between px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <span class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Anggaran Desa
              </span>
              <span class="bg-red-500 text-white text-xs font-semibold rounded-full px-2 py-0.5 animate-pulse">Baru</span>
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              Laporan Kegiatan
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
              Dokumen Perencanaan
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>
              BUMDes
            </a>
          </div>
        </div>

        <!-- Dropdown Pemerintahan -->
        <div class="relative group/dropdown">
          <button class="flex items-center gap-1 px-3 xl:px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 font-medium transition-all duration-200 rounded-lg">
            <span>Pemerintahan</span>
            <svg class="w-4 h-4 transition-transform duration-300 group-hover/dropdown:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div class="dropdown-menu absolute hidden group-hover/dropdown:block bg-white border border-gray-200 rounded-xl shadow-xl mt-2 min-w-[220px] xl:min-w-[240px] py-2 opacity-0 group-hover/dropdown:opacity-100 transform translate-y-2 group-hover/dropdown:translate-y-0 transition-all duration-300">
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              Struktur Pemerintah
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              BPD
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              PKK
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              LPM
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              Karang Taruna
            </a>
            <a href="#" class="dropdown-item flex items-center gap-2 px-4 py-2.5 hover:bg-green-50 text-gray-700 hover:text-green-600 transition-all duration-200 transform hover:translate-x-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
              Posyandu
            </a>
          </div>
        </div>

        <a href="#" class="nav-link px-3 xl:px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 font-medium transition-all duration-200 rounded-lg relative overflow-hidden group">
          <span class="relative z-10">Berita</span>
          <span class="absolute inset-0 bg-gradient-to-r from-green-50 to-green-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#" class="nav-link px-3 xl:px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 font-medium transition-all duration-200 rounded-lg relative overflow-hidden group">
          <span class="relative z-10">Kontak</span>
          <span class="absolute inset-0 bg-gradient-to-r from-green-50 to-green-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>

        <!-- Login Button -->
        <a href="{{ url('/login') }}" class="ml-2 xl:ml-3 bg-green-600 text-white font-semibold rounded-lg px-5 xl:px-6 py-2 hover:bg-green-700 transition-all duration-300 shadow-sm hover:shadow-md hover:scale-105 relative overflow-hidden group">
          <span class="relative z-10 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            Masuk
          </span>
          <span class="absolute inset-0 bg-green-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-200 max-h-[calc(100vh-64px)] overflow-y-auto">
    <div class="container mx-auto px-4 py-4 space-y-1">
      <a href="#" class="mobile-menu-item block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all duration-200 transform hover:translate-x-2">
        <span class="flex items-center gap-3">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          Beranda
        </span>
      </a>
      <a href="#" class="mobile-menu-item block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all duration-200 transform hover:translate-x-2">
        <span class="flex items-center gap-3">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Profil Desa
        </span>
      </a>
      <a href="#" class="mobile-menu-item block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all duration-200 transform hover:translate-x-2">
        <span class="flex items-center gap-3">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          Galeri
        </span>
      </a>
      
      <!-- Mobile Dropdown Transparansi -->
      <div class="border-t border-gray-100 pt-2 mt-2">
        <button class="mobile-dropdown-btn flex items-center justify-between w-full px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all duration-200" onclick="toggleMobileDropdown('transparansi')">
          <span class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Transparansi
          </span>
          <svg id="icon-transparansi" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="dropdown-transparansi" class="hidden pl-8 mt-1 space-y-1">
          <a href="#" class="mobile-submenu-item flex items-center justify-between px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">
            <span>Anggaran Desa</span>
            <span class="bg-red-500 text-white text-xs font-semibold rounded-full px-2 py-0.5 animate-pulse">Baru</span>
          </a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">Laporan Kegiatan</a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">Dokumen Perencanaan</a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">BUMDes</a>
        </div>
      </div>

      <!-- Mobile Dropdown Pemerintahan -->
      <div>
        <button class="mobile-dropdown-btn flex items-center justify-between w-full px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all duration-200" onclick="toggleMobileDropdown('pemerintahan')">
          <span class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Pemerintahan
          </span>
          <svg id="icon-pemerintahan" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="dropdown-pemerintahan" class="hidden pl-8 mt-1 space-y-1">
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">Struktur Pemerintah</a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">BPD</a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">PKK</a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">LPM</a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">Karang Taruna</a>
          <a href="#" class="mobile-submenu-item block px-4 py-2.5 text-gray-600 hover:bg-green-50 hover:text-green-600 rounded-lg transition-all duration-200 text-sm transform hover:translate-x-2">Posyandu</a>
        </div>
      </div>

      <a href="#" class="mobile-menu-item block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all duration-200 transform hover:translate-x-2 border-t border-gray-100 mt-2 pt-3">
        <span class="flex items-center gap-3">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
          </svg>
          Berita
        </span>
      </a>
      <a href="#" class="mobile-menu-item block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all duration-200 transform hover:translate-x-2">
        <span class="flex items-center gap-3">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          Kontak
        </span>
      </a>

      <!-- Mobile Login Button -->
      <div class="pt-4 border-t border-gray-100 mt-3">
        <a href="{{ url('/login') }}" class="block text-center bg-green-600 text-white font-semibold rounded-lg px-6 py-3 hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
          <span class="flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            Masuk
          </span>
        </a>
      </div>
    </div>
  </div>
</nav>

<script>
  // Toggle mobile menu
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const hamburgerLines = menuBtn.querySelectorAll('.hamburger-line');

  menuBtn.addEventListener('click', function() {
    mobileMenu.classList.toggle('hidden');
    
    // Animate hamburger to X
    if (!mobileMenu.classList.contains('hidden')) {
      hamburgerLines[0].style.transform = 'rotate(45deg) translateY(8px)';
      hamburgerLines[1].style.opacity = '0';
      hamburgerLines[1].style.transform = 'translateX(-10px)';
      hamburgerLines[2].style.transform = 'rotate(-45deg) translateY(-8px)';
      
      // Add stagger animation to menu items
      const menuItems = mobileMenu.querySelectorAll('.mobile-menu-item, .mobile-dropdown-btn');
      menuItems.forEach((item, index) => {
        item.style.animation = `slideInLeft 0.3s ease-out ${index * 0.05}s both`;
      });
    } else {
      hamburgerLines[0].style.transform = 'none';
      hamburgerLines[1].style.opacity = '1';
      hamburgerLines[1].style.transform = 'none';
      hamburgerLines[2].style.transform = 'none';
    }
  });

  // Toggle mobile dropdown
  function toggleMobileDropdown(id) {
    const dropdown = document.getElementById('dropdown-' + id);
    const icon = document.getElementById('icon-' + id);
    
    dropdown.classList.toggle('hidden');
    
    if (!dropdown.classList.contains('hidden')) {
      icon.style.transform = 'rotate(180deg)';
      
      // Add stagger animation to submenu items
      const submenuItems = dropdown.querySelectorAll('.mobile-submenu-item');
      submenuItems.forEach((item, index) => {
        item.style.animation = `slideInLeft 0.3s ease-out ${index * 0.05}s both`;
      });
    } else {
      icon.style.transform = 'rotate(0deg)';
    }
  }

  // Close mobile menu when clicking outside
  document.addEventListener('click', function(event) {
    const menu = document.getElementById('mobile-menu');
    const menuBtn = document.getElementById('menu-btn');
    
    if (!menu.contains(event.target) && !menuBtn.contains(event.target)) {
      menu.classList.add('hidden');
      
      // Reset hamburger
      hamburgerLines[0].style.transform = 'none';
      hamburgerLines[1].style.opacity = '1';
      hamburgerLines[1].style.transform = 'none';
      hamburgerLines[2].style.transform = 'none';
    }
  });

  // Add shadow and shrink effect on scroll
  let lastScroll = 0;
  const navbar = document.getElementById('navbar');

  window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll > 50) {
      navbar.classList.add('shadow-xl');
      navbar.classList.remove('shadow-md');
      navbar.style.transform = 'translateY(0)';
    } else {
      navbar.classList.add('shadow-md');
      navbar.classList.remove('shadow-xl');
    }
    
    // Hide navbar on scroll down, show on scroll up (optional)
    // Uncomment below if you want this feature
    /*
    if (currentScroll > lastScroll && currentScroll > 100) {
      navbar.style.transform = 'translateY(-100%)';
    } else {
      navbar.style.transform = 'translateY(0)';
    }
    */
    
    lastScroll = currentScroll;
  });

  // Add entrance animation to desktop nav links on page load
  window.addEventListener('load', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach((link, index) => {
      link.style.animation = `fadeInDown 0.5s ease-out ${index * 0.1}s both`;
    });
  });

  // Desktop dropdown hover with smooth appearance
  const dropdownMenus = document.querySelectorAll('.dropdown-menu');
  dropdownMenus.forEach(menu => {
    menu.style.pointerEvents = 'none';
    menu.parentElement.addEventListener('mouseenter', function() {
      setTimeout(() => {
        menu.style.pointerEvents = 'auto';
      }, 300);
    });
    menu.parentElement.addEventListener('mouseleave', function() {
      menu.style.pointerEvents = 'none';
    });
  });

  // Add ripple effect on mobile menu items
  document.querySelectorAll('.mobile-menu-item, .mobile-submenu-item').forEach(item => {
    item.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = x + 'px';
      ripple.style.top = y + 'px';
      ripple.classList.add('ripple');
      
      this.style.position = 'relative';
      this.style.overflow = 'hidden';
      this.appendChild(ripple);
      
      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  });
</script>

<style>
  /* Keyframe Animations */
  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateX(-30px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  @keyframes fadeInDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes rippleEffect {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }

  /* Ripple Effect */
  .ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(34, 197, 94, 0.3);
    transform: scale(0);
    animation: rippleEffect 0.6s ease-out;
    pointer-events: none;
  }

  /* Smooth transitions for all interactive elements */
  * {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Custom scrollbar for mobile menu */
  #mobile-menu::-webkit-scrollbar {
    width: 6px;
  }

  #mobile-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
  }

  #mobile-menu::-webkit-scrollbar-thumb {
    background: #16a34a;
    border-radius: 10px;
  }

  #mobile-menu::-webkit-scrollbar-thumb:hover {
    background: #15803d;
  }

  /* Hover effect for dropdown items */
  .dropdown-item {
    position: relative;
  }

  .dropdown-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 3px;
    height: 0;
    background: linear-gradient(to bottom, #16a34a, #22c55e);
    transition: height 0.3s ease;
    border-radius: 0 3px 3px 0;
  }

  .dropdown-item:hover::before {
    height: 70%;
  }

  /* Responsive adjustments */
  @media (max-width: 320px) {
    .text-xs {
      font-size: 0.7rem;
    }
  }

  @media (min-width: 1536px) {
    .container {
      max-width: 1400px;
    }
  }

  /* Improve touch targets for mobile */
  @media (max-width: 1023px) {
    button, a {
      min-height: 44px;
      min-width: 44px;
    }
  }

  /* Prevent layout shift */
  nav {
    contain: layout;
  }

  /* Smooth scroll behavior */
  html {
    scroll-behavior: smooth;
  }

  /* Focus states for accessibility */
  a:focus-visible, button:focus-visible {
    outline: 2px solid #16a34a;
    outline-offset: 2px;
    border-radius: 0.5rem;
  }

  /* Print styles */
  @media print {
    nav {
      display: none;
    }
  }

  /* High contrast mode support */
  @media (prefers-contrast: high) {
    .bg-green-600 {
      background-color: #15803d;
    }
    .text-gray-700 {
      color: #1f2937;
    }
  }

  /* Reduce motion for users who prefer it */
  @media (prefers-reduced-motion: reduce) {
    * {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
    }
  }
</style>