<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="brand-icon">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
            <div class="sidebar-brand-text">
                <div class="brand-title">Posyandu</div>
                <div class="brand-subtitle">Panel Admin</div>
            </div>
        </div>
    </div>

    <div class="sidebar-content">
        <ul class="sidebar-menu">
            <li class="menu-item">
                <a href="{{ route('admin_posyandu.dashboard') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-section-title">Data Kesehatan</li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.ibu-hamil.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="7" />
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                    </svg>
                    <span>Ibu Hamil</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.ibu-menyusui.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z" />
                        <path d="M7 12H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h3" />
                        <path d="M17 12h3a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-3" />
                        <path d="M12 22v-3" />
                    </svg>
                    <span>Ibu Menyusui</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.bayi_0_sampai_12_bulan.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 12h.01" />
                        <path d="M15 12h.01" />
                        <path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5" />
                        <path d="M19 6.3a9 9 0 0 1 1.8 3.9 2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 12 3c2 0 3.5 1.1 3.5 2.5s-.9 2.5-2 2.5c-.8 0-1.5-.4-1.5-1" />
                    </svg>
                    <span>Bayi (0-12 Bulan)</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.balita.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="5" />
                        <path d="M20 21a8 8 0 1 0-16 0" />
                    </svg>
                    <span>Balita (1-5 Tahun)</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.apras.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 21a8 8 0 0 0-16 0" />
                        <circle cx="10" cy="8" r="5" />
                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                    </svg>
                    <span>Apras (5-6 Tahun)</span>
                </a>
            </li>

            <li class="menu-section-title">Kesehatan Dewasa</li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.pus.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <line x1="19" y1="8" x2="19" y2="14" />
                        <line x1="22" y1="11" x2="16" y2="11" />
                    </svg>
                    <span>PUS</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.wus.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="8.5" cy="7" r="4" />
                        <polyline points="17 11 19 13 23 9" />
                    </svg>
                    <span>WUS</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.pra_lansia.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <span>Pra Lansia</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin_posyandu.lansia.index') }}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="7" />
                        <path d="M8.21 13.89 7 23l5-3 5 3-1.21-9.12" />
                    </svg>
                    <span>Lansia</span>
                </a>
            </li>
            
        </ul>
    </div>
</aside>

<style>
:root {
    --sidebar-width: 280px;
    --sidebar-bg: linear-gradient(180deg, #1b5e20 0%, #2e7d32 100%);
    --sidebar-color: #ffffff;
    --sidebar-hover: rgba(255, 255, 255, 0.1);
    --sidebar-active-bg: rgba(129, 199, 132, 0.2);
    --sidebar-active-color: #a5d6a7;
    --sidebar-border: rgba(255, 255, 255, 0.1);
    --transition-speed: 0.3s;
}

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
    transition: transform var(--transition-speed) cubic-bezier(0.4,0,0.2,1); 
    box-shadow: 4px 0 20px rgba(0,0,0,0.15); 
}

.sidebar-header { 
    padding:1.5rem; 
    border-bottom:1px solid var(--sidebar-border); 
    background: rgba(0,0,0,0.15); 
}

.sidebar-brand { display:flex; align-items:center; gap:1rem; }
.brand-icon { color:#fff; flex-shrink:0; }
.sidebar-brand-text { flex:1; }
.brand-title { font-size:1.25rem; font-weight:700; margin-bottom:0.15rem; color:#fff; }
.brand-subtitle { font-size:0.75rem; opacity:0.75; color:#e2e8f0; }

.sidebar-content { 
    flex:1; 
    overflow-y:auto; 
    overflow-x:hidden; 
    padding:1rem 0; 
}

.sidebar-content::-webkit-scrollbar { width: 6px; }
.sidebar-content::-webkit-scrollbar-track { background: rgba(0,0,0,0.1); }
.sidebar-content::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 3px; }
.sidebar-content::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.3); }

.sidebar-menu { list-style:none; padding:0; margin:0; }

.menu-section-title {
    padding: 1rem 1.5rem 0.5rem;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: rgba(255,255,255,0.5);
    margin-top: 0.5rem;
}

.menu-item { margin:0.25rem 0; }

.nav-link { 
    display:flex; 
    align-items:center; 
    gap:0.85rem; 
    padding:0.85rem 1.5rem; 
    color:rgba(255,255,255,0.85); 
    text-decoration:none; 
    transition:all 0.2s ease; 
    cursor:pointer; 
    border:none; 
    background:transparent; 
    width:100%; 
    text-align:left; 
    font-size:0.9rem; 
    border-left:3px solid transparent; 
    position:relative; 
    overflow:hidden; 
}

.nav-link:hover { 
    background: var(--sidebar-hover); 
    color:#fff; 
    border-left-color: rgba(255,255,255,0.3); 
}

.nav-link.active { 
    background: var(--sidebar-active-bg); 
    color: var(--sidebar-active-color); 
    font-weight:600; 
    border-left-color:#81c784; 
}

.nav-link svg {
    flex-shrink: 0;
}

@media (max-width:991.98px) { 
    .sidebar { transform:translateX(-100%); } 
    .sidebar.show { transform:translateX(0); } 
}
</style>