<header class="top-header">
    <div class="header-left">
        <button class="menu-toggle" id="toggleSidebarBtn">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            <h1 class="header-title">@yield('title', 'Dashboard')</h1>
            <ul class="breadcrumb-custom">
                <li><i class="bi bi-house-door"></i></li>
                <li>Admin</li>
                <li class="active">@yield('title', 'Dashboard')</li>
            </ul>
        </div>
    </div>

    <div class="header-actions">
        {{-- Search --}}
        <button class="header-btn" title="Search">
            <i class="bi bi-search"></i>
        </button>

        {{-- Notifications --}}
        <button class="header-btn" title="Notifications">
            <i class="bi bi-bell"></i>
            <span class="badge">3</span>
        </button>

        {{-- Messages --}}
        <button class="header-btn" title="Messages">
            <i class="bi bi-chat-dots"></i>
            <span class="badge">5</span>
        </button>

        {{-- User Dropdown --}}
        <div class="user-dropdown">
            <div class="user-dropdown-avatar">A</div>
            <div class="user-dropdown-info">
                <div class="user-dropdown-name">Admin</div>
                <div class="user-dropdown-role">Administrator</div>
            </div>
            <i class="bi bi-chevron-down" style="color: #64748b; font-size: 0.8rem;"></i>
        </div>
    </div>
</header>

<style>
    /* ========== HEADER STYLES ========== */
    .top-header {
        height: var(--header-height);
        background: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        position: sticky;
        top: 0;
        z-index: 1030;
        display: flex;
        align-items: center;
        padding: 0 2rem;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .menu-toggle {
        display: none;
        width: 40px;
        height: 40px;
        border: none;
        background: #f8f9fa;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .menu-toggle:hover {
        background: #e9ecef;
    }

    .header-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .breadcrumb-custom {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
        padding: 0;
        list-style: none;
        font-size: 0.85rem;
    }

    .breadcrumb-custom li {
        color: #64748b;
    }

    .breadcrumb-custom li:not(:last-child)::after {
        content: '/';
        margin-left: 0.5rem;
        color: #cbd5e1;
    }

    .breadcrumb-custom .active {
        color: #0f172a;
        font-weight: 600;
    }

    /* Header Right */
    .header-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-left: auto;
    }

    .header-btn {
        width: 42px;
        height: 42px;
        border: none;
        background: #f8f9fa;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        transition: all 0.2s ease;
    }

    .header-btn:hover {
        background: #e9ecef;
        transform: translateY(-2px);
    }

    .header-btn .badge {
        position: absolute;
        top: -4px;
        right: -4px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #ef4444;
        color: #fff;
        font-size: 0.65rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        border: 2px solid #fff;
    }

    .user-dropdown {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 1rem;
        background: #f8f9fa;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 2px solid transparent;
    }

    .user-dropdown:hover {
        background: #e9ecef;
        border-color: #dee2e6;
    }

    .user-dropdown-avatar {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .user-dropdown-info {
        display: flex;
        flex-direction: column;
    }

    .user-dropdown-name {
        font-size: 0.88rem;
        font-weight: 600;
        color: #1e293b;
    }

    .user-dropdown-role {
        font-size: 0.72rem;
        color: #64748b;
    }

    @media (max-width: 991.98px) {
        .menu-toggle {
            display: flex;
        }

        .header-title {
            font-size: 1.1rem;
        }

        .breadcrumb-custom {
            display: none;
        }

        .user-dropdown-info {
            display: none;
        }
    }
</style>
