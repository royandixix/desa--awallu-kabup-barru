<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <!-- HEADER LOGO -->
        <div class="m-header">
            <a href="{{ url('/admin') }}" class="b-brand text-primary d-flex align-items-center">
                <img src="{{ asset('assets/images/logo-baru.webp') }}" alt="logo" class="logo-lg me-2">
                <span class="fw-bold text-dark">Desa Lawallu</span>
                <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version">v1.0</span>
            </a>
        </div>

        <!-- NAVIGATION -->
        <div class="navbar-content">
            <ul class="pc-navbar">

                <!-- === DASHBOARD === -->
                <li class="pc-item pc-caption">
                    <label>Dashboard</label>
                </li>
                <li class="pc-item active">
                    <a href="{{ url('/admin') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- === MANAJEMEN WEBSITE === -->
                <li class="pc-item pc-caption">
                    <label>Manajemen Website</label>
                </li>

                <!-- 🏠 Beranda (Menu Baru) -->
                <li class="pc-item">
                    <a href="{{ route('admin.beranda') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-home-2"></i></span>
                        <span class="pc-mtext">Beranda</span>
                    </a>
                </li>


                <!-- Profil Desa -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-home"></i></span>
                        <span class="pc-mtext">Profil Desa</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#">Data Profil</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Visi & Misi</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Struktur Organisasi</a></li>
                    </ul>
                </li>

                <!-- Galeri -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-photo"></i></span>
                        <span class="pc-mtext">Galeri</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#">Daftar Galeri</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Tambah Gambar</a></li>
                    </ul>
                </li>

                <!-- Transparansi -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-report"></i></span>
                        <span class="pc-mtext">Transparansi</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#">Anggaran</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Laporan</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Bumdes</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Dokumen</a></li>
                    </ul>
                </li>

                <!-- Berita -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-news"></i></span>
                        <span class="pc-mtext">Berita</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#">Daftar Berita</a></li>
                        <li class="pc-item"><a class="pc-link" href="#">Tambah Berita</a></li>
                    </ul>
                </li>

                <!-- Pengaduan -->
                <li class="pc-item">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-message"></i></span>
                        <span class="pc-mtext">Pengaduan</span>
                    </a>
                </li>

                <!-- Kontak -->
                <li class="pc-item">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-phone"></i></span>
                        <span class="pc-mtext">Kontak & Saran</span>
                    </a>
                </li>

                <!-- === SYSTEM SETTINGS === -->
                <li class="pc-item pc-caption">
                    <label>System</label>
                </li>
                <li class="pc-item">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-settings"></i></span>
                        <span class="pc-mtext">Pengaturan</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<style>
    .logo-lg {
        display: block !important;
        width: 120px;
        height: auto;
        transition: transform 0.3s ease;
    }

    .logo-lg:hover {
        transform: scale(1.05);
    }

    .pc-sidebar .pc-item.active>.pc-link {
        background: rgba(16, 185, 129, 0.1);
        border-radius: 10px;
    }

    .pc-sidebar .pc-item.active .pc-micon i {
        color: #10b981;
    }
</style>


<style>
    .logo-lg {
        display: block !important;
        width: 120px;
        height: auto;
    }
</style>
