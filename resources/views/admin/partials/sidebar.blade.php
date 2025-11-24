<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <i class="bi bi-building" style="font-size: 1.8rem; color: #fff;"></i>
            <div class="sidebar-brand-text">
                <div class="brand-title">Admin Desa</div>
                <div class="brand-subtitle">Panel Administrasi</div>
            </div>
        </div>
    </div>

    <div class="sidebar-content">
        <ul class="sidebar-menu">
            
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Manajemen Website -->
            <li class="menu-item has-submenu">
                <a href="#webMgmt" class="nav-link" data-bs-toggle="collapse">
                    <i class="bi bi-globe"></i>
                    <span>Manajemen Website</span>
                    <i class="bi bi-chevron-down ms-auto submenu-arrow"></i>
                </a>
                <ul class="collapse submenu" id="webMgmt">
                    <li><a href="{{ url('/admin/beranda') }}" class="nav-link">
                        <i class="bi bi-house-door"></i> Beranda
                    </a></li>
                    
                    <li><a href="{{ url('/admin/profil_desa') }}" class="nav-link">
                        <i class="bi bi-info-circle"></i> Profil Desa
                    </a></li>

                    <!-- Galeri Nested -->
                    <li class="has-submenu">
                        <a href="#galeriMenu" class="nav-link" data-bs-toggle="collapse">
                            <i class="bi bi-images"></i> Galeri
                            <i class="bi bi-chevron-down ms-auto submenu-arrow"></i>
                        </a>
                        <ul class="collapse submenu" id="galeriMenu">
                            <li><a href="{{ url('/admin/galeri') }}" class="nav-link">Daftar Galeri</a></li>
                            <li><a href="{{ url('/admin/galeri/create') }}" class="nav-link">Tambah Gambar</a></li>
                        </ul>
                    </li>

                    <!-- Transparansi Nested -->
                    <li class="has-submenu">
                        <a href="#transMenu" class="nav-link" data-bs-toggle="collapse">
                            <i class="bi bi-file-earmark-text"></i> Transparansi
                            <i class="bi bi-chevron-down ms-auto submenu-arrow"></i>
                        </a>
                        <ul class="collapse submenu" id="transMenu">
                            <li><a href="{{ url('/admin/transparansi/anggaran') }}" class="nav-link">Anggaran</a></li>
                            <li><a href="{{ url('/admin/transparansi/laporan') }}" class="nav-link">Laporan</a></li>
                            <li><a href="{{ url('/admin/transparansi/bumdes') }}" class="nav-link">Bumdes</a></li>
                            <li><a href="{{ url('/admin/transparansi/dokumen') }}" class="nav-link">Dokumen</a></li>
                        </ul>
                    </li>

                    <!-- Berita Nested -->
                    <li class="has-submenu">
                        <a href="#beritaMenu" class="nav-link" data-bs-toggle="collapse">
                            <i class="bi bi-newspaper"></i> Berita
                            <i class="bi bi-chevron-down ms-auto submenu-arrow"></i>
                        </a>
                        <ul class="collapse submenu" id="beritaMenu">
                            <li><a href="{{ url('/admin/berita') }}" class="nav-link">Daftar Berita</a></li>
                            <li><a href="{{ url('/admin/berita/create') }}" class="nav-link">Tambah Berita</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ url('/admin/pengaduan') }}" class="nav-link">
                        <i class="bi bi-megaphone"></i> Pengaduan
                    </a></li>
                    
                    <li><a href="{{ url('/admin/kontak-saran') }}" class="nav-link">
                        <i class="bi bi-chat-left-text"></i> Kontak & Saran
                    </a></li>
                </ul>
            </li>

            <!-- Divider -->
            <li class="menu-divider"></li>

            <!-- System -->
            <li class="menu-item has-submenu">
                <a href="#systemMenu" class="nav-link" data-bs-toggle="collapse">
                    <i class="bi bi-gear"></i>
                    <span>System</span>
                    <i class="bi bi-chevron-down ms-auto submenu-arrow"></i>
                </a>
                <ul class="collapse submenu" id="systemMenu">
                    <li><a href="{{ url('/admin/pengaturan') }}" class="nav-link">
                        <i class="bi bi-sliders"></i> Pengaturan
                    </a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link logout-btn">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">A</div>
            <div class="user-info">
                <div class="user-name">Admin Desa</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
    </div>
</aside>

<style>
    /* ========== SIDEBAR STYLES ========== */
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
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 4px 0 15px rgba(0,0,0,0.1);
    }

    /* Sidebar Header */
    .sidebar-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        background: rgba(0,0,0,0.1);
    }

    .sidebar-brand {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .sidebar-brand-text {
        flex: 1;
    }

    .brand-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.15rem;
    }

    .brand-subtitle {
        font-size: 0.75rem;
        opacity: 0.8;
    }

    /* Sidebar Content */
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
        background: rgba(255,255,255,0.2);
        border-radius: 10px;
    }

    /* Sidebar Menu */
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
        color: rgba(255,255,255,0.85);
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
        font-size: 0.9rem;
    }

    .nav-link i:first-child {
        font-size: 1.1rem;
        width: 20px;
    }

    .nav-link:hover {
        background: var(--sidebar-hover);
        color: #fff;
    }

    .nav-link.active {
        background: rgba(255,255,255,0.15);
        color: #fff;
        font-weight: 600;
        border-left: 3px solid #fff;
    }

    /* Submenu Arrow */
    .submenu-arrow {
        font-size: 0.75rem;
        transition: transform 0.2s ease;
    }

    [aria-expanded="true"] .submenu-arrow {
        transform: rotate(180deg);
    }

    /* Submenu */
    .submenu {
        list-style: none;
        padding: 0;
        margin: 0;
        background: rgba(0,0,0,0.15);
    }

    .submenu .nav-link {
        padding-left: 3.5rem;
        font-size: 0.85rem;
    }

    .submenu .submenu .nav-link {
        padding-left: 4.5rem;
        font-size: 0.82rem;
    }

    /* Menu Divider */
    .menu-divider {
        height: 1px;
        background: rgba(255,255,255,0.1);
        margin: 1rem 1.5rem;
    }

    /* Logout Button */
    .logout-btn {
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.2);
        color: #fca5a5;
    }

    /* Sidebar Footer */
    .sidebar-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid rgba(255,255,255,0.1);
        background: rgba(0,0,0,0.1);
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
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .user-info {
        flex: 1;
    }

    .user-name {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.15rem;
    }

    .user-role {
        font-size: 0.75rem;
        opacity: 0.75;
    }

    /* Mobile Responsive */
    @media (max-width: 991.98px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.show {
            transform: translateX(0);
        }
    }
</style>