<header class="top-header">
    <div class="header-left">
        <button class="menu-toggle" id="toggleSidebarBtn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="header-info">
            <h1 class="header-title">@yield('title', 'Dashboard Posyandu')</h1>
            <ul class="breadcrumb-custom">
                <li><i class="bi bi-house-door"></i></li>
                <li>Admin Posyandu</li>
                <li class="active">@yield('title', 'Dashboard')</li>
            </ul>
        </div>
    </div>

    <div class="header-actions">
        {{-- <button class="header-btn search-btn" title="Cari">
            <i class="bi bi-search"></i>
        </button>

        <button class="header-btn notification-btn" title="Notifikasi">
            <i class="bi bi-bell"></i>
            <span class="badge pulse">3</span>
        </button>

        <button class="header-btn message-btn" title="Pesan">
            <i class="bi bi-chat-dots"></i>
            <span class="badge pulse">5</span>
        </button> --}}

        <div class="user-dropdown">
            <div class="user-dropdown-avatar"><span>AP</span></div>
            <div class="user-dropdown-info">
                <div class="user-dropdown-name">Admin Posyandu</div>
                <div class="user-dropdown-role">
                    <i class="bi bi-heart-pulse-fill"></i> Administrator
                </div>
            </div>
            <i class="bi bi-chevron-down dropdown-arrow"></i>
        </div>
    </div>
</header>

<script>
    const toggleBtn = document.getElementById('toggleSidebarBtn');
    const sidebar = document.getElementById('sidebar');
    toggleBtn.addEventListener('click', () => sidebar.classList.toggle('show'));
</script>

<style>
:root {
    --header-height: 70px;
    --primary-gradient: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
    --primary-color: #43a047;
    --secondary-color: #66bb6a;
    --text-dark: #1b5e20;
    --text-light: #388e3c;
    --bg-light: #f0f9f4;
    --border-radius: 12px;
    --transition: all 0.3s ease-in-out;
}

.top-header {
    height: var(--header-height);
    background: #e8f5e9;
    box-shadow: 0 2px 20px rgba(0,0,0,0.08);
    position: sticky;
    top: 0;
    z-index: 1030;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2rem;
    transition: var(--transition);
}

.header-left { display: flex; align-items: center; gap: 1.5rem; flex:1; min-width:0; }
.header-info { flex:1; min-width:0; overflow:hidden; }

.menu-toggle {
    display: none;
    width:44px; height:44px; border:none;
    background: var(--primary-color); color:#fff;
    border-radius:12px; cursor:pointer;
    align-items:center; justify-content:center;
    transition: var(--transition);
}
.menu-toggle:hover { transform: scale(1.05); background: var(--secondary-color); }
.menu-toggle i { font-size: 1.2rem; }

.header-title { font-size:1.4rem; font-weight:700; color:var(--text-dark); margin:0 0 0.25rem 0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.breadcrumb-custom { display:flex; align-items:center; gap:0.5rem; margin:0; padding:0; list-style:none; font-size:0.85rem; flex-wrap:wrap; }
.breadcrumb-custom li { color: var(--text-light); display:flex; align-items:center; }
.breadcrumb-custom li:not(:last-child)::after { content:'/'; margin-left:0.5rem; color:#a5d6a7; }
.breadcrumb-custom .active { color:var(--primary-color); font-weight:600; }

.header-actions { display:flex; align-items:center; gap:0.5rem; flex-shrink:0; }
.header-btn { width:44px; height:44px; border:none; background: var(--bg-light); border-radius:var(--border-radius); display:flex; align-items:center; justify-content:center; cursor:pointer; position:relative; transition:var(--transition); font-size:1.2rem; color: var(--text-dark); }
.header-btn:hover { transform:translateY(-2px); box-shadow:0 5px 15px rgba(0,0,0,0.1); }
.search-btn:hover { background: var(--primary-color); color:#fff; }
.notification-btn:hover { background:#ff9800; color:#fff; }
.message-btn:hover { background:#4caf50; color:#fff; }

.header-btn .badge {
    position:absolute; top:-6px; right:-6px; min-width:20px; height:20px;
    padding:0 6px; border-radius:10px;
    background:#ef5350; color:#fff; font-size:0.65rem; display:flex; align-items:center; justify-content:center; font-weight:700; border:2px solid #fff;
    box-shadow:0 2px 8px rgba(239,68,68,0.4);
}
@keyframes pulse { 0%,100%{transform:scale(1);} 50%{transform:scale(1.1);} }
.badge.pulse { animation:pulse 2s infinite; }

.user-dropdown { display:flex; align-items:center; gap:0.75rem; padding:0.5rem 1rem; background: var(--bg-light); border-radius:var(--border-radius); cursor:pointer; transition:var(--transition); border:2px solid transparent; margin-left:0.5rem; }
.user-dropdown:hover { background:#fff; border-color:var(--primary-color); box-shadow:0 5px 20px rgba(102,187,106,0.15); transform:translateY(-2px); }
.user-dropdown-avatar { width:40px; height:40px; border-radius:10px; background:var(--primary-gradient); display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700; font-size:1rem; box-shadow:0 4px 12px rgba(102,187,106,0.3); flex-shrink:0; }
.user-dropdown-info { display:flex; flex-direction:column; min-width:0; }
.user-dropdown-name { font-size:0.9rem; font-weight:600; color:var(--text-dark); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.user-dropdown-role { font-size:0.75rem; color:var(--text-light); display:flex; align-items:center; gap:0.25rem; }
.user-dropdown-role i { font-size:0.8rem; color:var(--primary-color); }
.dropdown-arrow { color:var(--text-light); font-size:0.9rem; transition:var(--transition); flex-shrink:0; }
.user-dropdown:hover .dropdown-arrow { transform:rotate(180deg); color: var(--primary-color); }

@media (max-width:991.98px) {
    .menu-toggle { display:flex; }
    .breadcrumb-custom { display:none; }
    .top-header { padding: 0 1rem; }
    .header-actions { gap: 0.25rem; }
    .user-dropdown-info { display: none; }
}

@media (max-width:575.98px) {
    .header-title { font-size: 1.1rem; }
    .header-btn { width: 38px; height: 38px; font-size: 1rem; }
    .user-dropdown { padding: 0.4rem 0.6rem; }
}
</style>