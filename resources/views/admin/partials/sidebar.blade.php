<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <!-- Header -->
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="brand-icon">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <path d="M3 9h18" />
                <path d="M9 21V9" />
            </svg>
            <div class="sidebar-brand-text">
                <div class="brand-title">Admin Desa</div>
                <div class="brand-subtitle">Panel Administrasi</div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="sidebar-content">
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Manajemen Website -->
            <li class="menu-item has-submenu">
                <a href="#webMgmt" class="nav-link" data-bs-toggle="collapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="2" y1="12" x2="22" y2="12" />
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                    </svg>
                    <span>Manajemen Website</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="submenu-arrow ms-auto">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </a>

                <ul class="collapse submenu" id="webMgmt">

                    {{-- <!-- Beranda -->
                    <li>
                        <a href="{{ url('/admin/beranda') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" 
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                            <span>Beranda</span>
                        </a>
                    </li> --}}

                    <!-- Profil Desa -->
                    <li>
                        <a href="{{ url('/admin/profil_desa') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="16" x2="12" y2="12" />
                                <line x1="12" y1="8" x2="12.01" y2="8" />
                            </svg>
                            <span>Profil Desa</span>
                        </a>
                    </li>

                    <!-- Galeri -->
                    <li class="has-submenu">
                        <a href="#galeriMenu" class="nav-link" data-bs-toggle="collapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <polyline points="21 15 16 10 5 21" />
                            </svg>
                            <span>Galeri</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="submenu-arrow ms-auto">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </a>
                        <ul class="collapse submenu" id="galeriMenu">
                            <li><a href="{{ url('/admin/galeri') }}" class="nav-link">Daftar Galeri</a></li>
                            <li><a href="{{ url('/admin/galeri/create') }}" class="nav-link">Tambah Gambar</a></li>
                        </ul>
                    </li>

                    <!-- Transparansi -->
                    <li class="has-submenu">
                        <a href="#transMenu" class="nav-link" data-bs-toggle="collapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="16" y1="13" x2="8" y2="13" />
                                <line x1="16" y1="17" x2="8" y2="17" />
                                <polyline points="10 9 9 9 8 9" />
                            </svg>
                            <span>Transparansi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="submenu-arrow ms-auto">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </a>
                        <ul class="collapse submenu" id="transMenu">
                            <li><a href="{{ route('admin.transparansi.anggaran.index') }}"
                                    class="nav-link">Anggaran</a></li>
                            <li><a href="{{ route('admin.transparansi.laporan.index') }}" class="nav-link">Laporan</a>
                            </li>
                            <li><a href="{{ route('admin.transparansi.bumdes.index') }}" class="nav-link">Bumdes</a>
                            </li>
                            <li><a href="{{ route('admin.transparansi.dokumen.index') }}" class="nav-link">Dokumen</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Struktur -->
                    <li class="has-submenu">
                        <a href="#strukturMenu" class="nav-link" data-bs-toggle="collapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            <span>Struktur</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="submenu-arrow ms-auto">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </a>

                        <ul class="collapse submenu" id="strukturMenu">
                            <!-- Pemerintahan Desa -->
                            <li class="has-submenu">
                                <a href="#pemerintahanDesaMenu" class="nav-link" data-bs-toggle="collapse">
                                    <span>Pemerintahan Desa</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="submenu-arrow ms-auto">
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </a>
                                <ul class="collapse submenu" id="pemerintahanDesaMenu">
                                    <li><a href="{{ route('admin.struktur.pemerintahan_desa.struktural.index') }}"
                                            class="nav-link">Struktural</a></li>
                                    <li><a href="{{ route('admin.struktur.pemerintahan_desa.anggota.index') }}"
                                            class="nav-link">Anggota</a></li>
                                </ul>
                            </li>

                            <li><a href="{{ route('admin.struktur.bpd.index') }}" class="nav-link">BPD</a></li>
                            <li><a href="{{ route('admin.struktur.pkk.index') }}" class="nav-link">PKK</a></li>
                            <li><a href="{{ route('admin.struktur.lpm.index') }}" class="nav-link">LPM</a></li>
                            <li><a href="{{ route('admin.struktur.karang_taruna.index') }}" class="nav-link">Karang
                                    Taruna</a></li>
                            <li><a href="{{ route('admin.struktur.posyandu.index') }}" class="nav-link">Posyandu</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Berita -->
                    <li class="has-submenu">
                        <a href="#beritaMenu" class="nav-link" data-bs-toggle="collapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                <path d="M18 14h-8" />
                                <path d="M15 18h-5" />
                                <path d="M10 6h8v4h-8V6Z" />
                            </svg>
                            <span>Berita</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="submenu-arrow ms-auto">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </a>
                        <ul class="collapse submenu" id="beritaMenu">
                            <li><a href="{{ route('admin.berita.index') }}" class="nav-link">Daftar Berita</a></li>
                            <li><a href="{{ route('admin.berita.create') }}" class="nav-link">Tambah Berita</a></li>
                        </ul>
                    </li>

                    <!-- Pengaduan -->
                    <li>
                        <a href="{{ url('/admin/pengaduan') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                                <path d="M12 6v6l4 2" />
                            </svg>
                            <span>Pengaduan</span>
                        </a>
                    </li>

                    <!-- Kontak & Saran -->
                    <li>
                        <a href="{{ url('/admin/kontak-saran') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                            <span>Kontak & Saran</span>
                        </a>
                    </li>

                    <!-- =============================== -->
                    <!-- HALAMAN DEPAN (TAMBAHAN BARU) -->
                    <!-- =============================== -->
                    <li class="has-submenu">
                        <a href="#homePageMenu" class="nav-link" data-bs-toggle="collapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>
                            <span>Halaman Depan</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="submenu-arrow ms-auto">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </a>

                        <ul class="collapse submenu" id="homePageMenu">
                            <li><a href="{{ route('admin.home.administrasi.index') }}" class="nav-link">Administrasi
                                    Penduduk</a></li>

                            <li><a href="{{ route('admin.home.foto_warga.index') }}" class="nav-link">Foto Bersama
                                    Warga</a></li>

                            {{-- <li><a href="{{ route('admin.home.keindahan.index') }}" class="nav-link">Menelusuri
                                    Keindahan</a></li> --}}

                            {{-- <li><a href="{{ route('admin.home.sambutan.index') }}" class="nav-link">Sambutan</a></li> --}}

                            {{-- <li><a href="{{ route('admin.home.struktur.index') }}" class="nav-link">Struktur
                                    Organisasi</a></li> --}}

                            {{-- <li><a href="{{ route('admin.home.visimisi.index') }}" class="nav-link">Visi & Misi</a> --}}
                            </li>
                            <li><a href="{{ route('admin.home.umkm.index') }}" class="nav-link">UMKM</a></li>


                        </ul>
                    </li>
                    <!-- =============================== -->
                    <!-- END HALAMAN DEPAN -->
                    <!-- =============================== -->

                </ul>
            </li>

            <!-- Divider -->
            <li class="menu-divider"></li>

            <!-- System -->
            <li class="menu-item has-submenu">
                <a href="#systemMenu" class="nav-link" data-bs-toggle="collapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3" />
                        <path d="M12 1v6m0 6v6m-9-9h6m6 0h6" />
                        <path d="m4.93 4.93 4.24 4.24m5.66 5.66 4.24 4.24m-12.73 0 4.24-4.24m5.66-5.66 4.24-4.24" />
                    </svg>
                    <span>System</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="submenu-arrow ms-auto">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </a>

                <ul class="collapse submenu" id="systemMenu">
                    <!-- Pengaturan -->
                    {{-- <li>
                        <a href="{{ url('/admin/pengaturan') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" 
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span>Pengaturan</span>
                        </a>
                    </li> --}}

                    <!-- Logout -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link logout-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" y1="12" x2="9" y2="12" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Footer -->
    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </div>
            <div class="user-info">
                <div class="user-name">Admin Desa</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
    </div>
</aside>

<style>
    /* ========================================
       CSS VARIABLES
    ======================================== */
    :root {
        --sidebar-width: 280px;
        --sidebar-bg: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        --sidebar-color: #ffffff;
        --sidebar-hover: rgba(255, 255, 255, 0.08);
        --sidebar-active-bg: rgba(59, 130, 246, 0.15);
        --sidebar-active-color: #60a5fa;
        --sidebar-border: rgba(255, 255, 255, 0.1);
        --transition-speed: 0.3s;
    }

    /* ========================================
       SIDEBAR CONTAINER
    ======================================== */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: var(--sidebar-width);
        height: 100vh;
        background: var(--sidebar-bg);
        color: var(--sidebar-color);
        display: flex;
        flex-direction: column;
        z-index: 1040;
        transition: transform var(--transition-speed) cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
    }

    /* ========================================
       SIDEBAR HEADER
    ======================================== */
    .sidebar-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--sidebar-border);
        background: rgba(0, 0, 0, 0.15);
    }

    .sidebar-brand {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .brand-icon {
        color: #fff;
        flex-shrink: 0;
    }

    .sidebar-brand-text {
        flex: 1;
    }

    .brand-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.15rem;
        color: #fff;
    }

    .brand-subtitle {
        font-size: 0.75rem;
        opacity: 0.75;
        color: #e2e8f0;
    }

    /* ========================================
       SIDEBAR CONTENT
    ======================================== */
    .sidebar-content {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 1rem 0;
    }

    .sidebar-content::-webkit-scrollbar {
        width: 5px;
    }

    .sidebar-content::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }

    .sidebar-content::-webkit-scrollbar-track {
        background: transparent;
    }

    /* ========================================
       SIDEBAR MENU
    ======================================== */
    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        margin: 0.25rem 0;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        padding: 0.85rem 1.5rem;
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
        font-size: 0.9rem;
        border-left: 3px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .nav-link svg {
        flex-shrink: 0;
    }

    .nav-link span {
        flex: 1;
    }

    /* Hover effect */
    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(180deg, #3b82f6, #8b5cf6);
        transform: translateX(-100%);
        transition: transform var(--transition-speed) ease;
    }

    .nav-link:hover {
        background: var(--sidebar-hover);
        color: #fff;
        border-left-color: rgba(255, 255, 255, 0.3);
    }

    .nav-link:hover::before,
    .nav-link.active::before {
        transform: translateX(0);
    }

    .nav-link.active {
        background: var(--sidebar-active-bg);
        color: var(--sidebar-active-color);
        font-weight: 600;
        border-left-color: #3b82f6;
    }

    .nav-link.active svg {
        color: var(--sidebar-active-color);
    }

    /* ========================================
       SUBMENU
    ======================================== */
    .submenu {
        list-style: none;
        padding: 0;
        margin: 0;
        background: rgba(0, 0, 0, 0.2);
        transition: all var(--transition-speed) ease;
    }

    .submenu .nav-link {
        padding-left: 3.5rem;
        font-size: 0.85rem;
    }

    .submenu .submenu .nav-link {
        padding-left: 4.5rem;
        font-size: 0.82rem;
    }

    .submenu .nav-link:hover {
        background: rgba(255, 255, 255, 0.06);
    }

    .submenu.collapsing {
        transition: height var(--transition-speed) ease;
    }

    /* ========================================
       SUBMENU ARROW
    ======================================== */
    .submenu-arrow {
        flex-shrink: 0;
        transition: transform 0.2s ease;
    }

    [aria-expanded="true"] .submenu-arrow {
        transform: rotate(180deg);
    }

    /* ========================================
       MENU DIVIDER
    ======================================== */
    .menu-divider {
        height: 1px;
        background: var(--sidebar-border);
        margin: 1rem 1.5rem;
        list-style: none;
    }

    /* ========================================
       LOGOUT BUTTON
    ======================================== */
    .logout-btn {
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
        display: flex;
        align-items: center;
        gap: 0.85rem;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.15);
        color: #fca5a5;
        border-left-color: #ef4444;
    }

    .logout-btn:hover svg {
        color: #fca5a5;
    }

    /* ========================================
       SIDEBAR FOOTER
    ======================================== */
    .sidebar-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--sidebar-border);
        background: rgba(0, 0, 0, 0.15);
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 0.85rem;
    }

    .user-avatar {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .user-avatar svg {
        color: #fff;
    }

    .user-info {
        flex: 1;
        min-width: 0;
    }

    .user-name {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.15rem;
        color: #fff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .user-role {
        font-size: 0.75rem;
        opacity: 0.7;
        color: #cbd5e1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* ========================================
       MOBILE RESPONSIVE
    ======================================== */
    @media (max-width: 991.98px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.show {
            transform: translateX(0);
        }
    }
</style>
