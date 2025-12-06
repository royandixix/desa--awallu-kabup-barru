<header class="top-header">
    <div class="header-left">
        <button class="menu-toggle" id="toggleSidebarBtn">
            <i class="fas fa-bars"></i>
        </button>
        <div class="header-info">
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
        <button class="header-btn search-btn" title="Search">
            <i class="bi bi-search"></i>
        </button>

        {{-- Notifications --}}
        <button class="header-btn notification-btn" title="Notifications">
            <i class="bi bi-bell"></i>
            <span class="badge pulse">3</span>
        </button>

        {{-- Messages --}}
        <button class="header-btn message-btn" title="Messages">
            <i class="bi bi-chat-dots"></i>
            <span class="badge pulse">5</span>
        </button>

        {{-- User Dropdown --}}
        <div class="user-dropdown">
            <div class="user-dropdown-avatar">
                <span>A</span>
            </div>
            <div class="user-dropdown-info">
                <div class="user-dropdown-name">Admin</div>
                <div class="user-dropdown-role">
                    <i class="bi bi-shield-check"></i> Administrator
                </div>
            </div>
            <i class="bi bi-chevron-down dropdown-arrow"></i>
        </div>
    </div>
</header>

<style>
    /* ========== ROOT VARIABLES ========== */
    :root {
        --header-height: 70px;
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --primary-color: #667eea;
        --secondary-color: #764ba2;
        --text-dark: #1e293b;
        --text-light: #64748b;
        --bg-light: #f8f9fa;
        --border-radius: 12px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ========== HEADER STYLES ========== */
    .top-header {
        height: var(--header-height);
        background: #fff;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 0;
        z-index: 1030;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 2rem;
        transition: var(--transition);
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex: 1;
        min-width: 0; /* Prevent flex overflow */
    }

    .header-info {
        flex: 1;
        min-width: 0;
        overflow: hidden;
    }

    .menu-toggle {
        display: none;
        width: 44px;
        height: 44px;
        border: none;
        background: var(--bg-light);
        border-radius: 12px;
        cursor: pointer;
        transition: var(--transition);
        flex-shrink: 0;
    }

    .menu-toggle:hover {
        background: var(--primary-gradient);
        transform: scale(1.05);
    }

    .menu-toggle:hover i {
        color: #fff;
    }

    .menu-toggle i {
        font-size: 1.2rem;
        color: var(--text-dark);
        transition: var(--transition);
    }

    .header-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0 0 0.25rem 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .breadcrumb-custom {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
        padding: 0;
        list-style: none;
        font-size: 0.85rem;
        flex-wrap: wrap;
    }

    .breadcrumb-custom li {
        color: var(--text-light);
        display: flex;
        align-items: center;
    }

    .breadcrumb-custom li:not(:last-child)::after {
        content: '/';
        margin-left: 0.5rem;
        color: #cbd5e1;
    }

    .breadcrumb-custom .active {
        color: var(--primary-color);
        font-weight: 600;
    }

    /* ========== HEADER ACTIONS ========== */
    .header-actions {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-shrink: 0;
    }

    .header-btn {
        width: 44px;
        height: 44px;
        border: none;
        background: var(--bg-light);
        border-radius: var(--border-radius);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        transition: var(--transition);
        font-size: 1.2rem;
        color: var(--text-dark);
    }

    .header-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .search-btn:hover {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: #fff;
    }

    .notification-btn:hover {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: #fff;
    }

    .message-btn:hover {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #fff;
    }

    .header-btn .badge {
        position: absolute;
        top: -6px;
        right: -6px;
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        border-radius: 10px;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: #fff;
        font-size: 0.65rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        border: 2px solid #fff;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }

    .badge.pulse {
        animation: pulse 2s infinite;
    }

    /* ========== USER DROPDOWN ========== */
    .user-dropdown {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 1rem;
        background: var(--bg-light);
        border-radius: var(--border-radius);
        cursor: pointer;
        transition: var(--transition);
        border: 2px solid transparent;
        margin-left: 0.5rem;
    }

    .user-dropdown:hover {
        background: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }

    .user-dropdown-avatar {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        flex-shrink: 0;
    }

    .user-dropdown-info {
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    .user-dropdown-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-dark);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .user-dropdown-role {
        font-size: 0.75rem;
        color: var(--text-light);
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .user-dropdown-role i {
        font-size: 0.8rem;
        color: var(--primary-color);
    }

    .dropdown-arrow {
        color: var(--text-light);
        font-size: 0.9rem;
        transition: var(--transition);
        flex-shrink: 0;
    }

    .user-dropdown:hover .dropdown-arrow {
        transform: rotate(180deg);
        color: var(--primary-color);
    }

    /* ========== RESPONSIVE DESIGN ========== */
    
    /* Tablet View (768px - 991px) */
    @media (max-width: 991.98px) {
        .top-header {
            padding: 0 1.5rem;
            height: 65px;
        }

        .menu-toggle {
            display: flex;
        }

        .header-title {
            font-size: 1.2rem;
        }

        .breadcrumb-custom {
            display: none;
        }

        .header-actions {
            gap: 0.4rem;
        }

        .user-dropdown {
            padding: 0.4rem 0.8rem;
            gap: 0.5rem;
        }

        .user-dropdown-avatar {
            width: 38px;
            height: 38px;
        }

        .user-dropdown-name {
            font-size: 0.85rem;
        }

        .user-dropdown-role {
            font-size: 0.7rem;
        }
    }

    /* Mobile View (576px - 767px) */
    @media (max-width: 767.98px) {
        .top-header {
            padding: 0 1rem;
            height: 60px;
        }

        .header-left {
            gap: 1rem;
        }

        .header-title {
            font-size: 1.1rem;
        }

        .header-btn {
            width: 40px;
            height: 40px;
            font-size: 1.1rem;
        }

        .header-btn .badge {
            min-width: 18px;
            height: 18px;
            font-size: 0.6rem;
            top: -5px;
            right: -5px;
        }

        .user-dropdown-info {
            display: none;
        }

        .dropdown-arrow {
            display: none;
        }

        .user-dropdown {
            padding: 0.3rem;
            margin-left: 0.25rem;
        }

        .user-dropdown-avatar {
            width: 40px;
            height: 40px;
        }
    }

    /* Small Mobile View (< 576px) */
    @media (max-width: 575.98px) {
        .top-header {
            padding: 0 0.75rem;
            height: 56px;
        }

        .header-left {
            gap: 0.75rem;
        }

        .header-title {
            font-size: 1rem;
        }

        .menu-toggle {
            width: 40px;
            height: 40px;
        }

        .menu-toggle i {
            font-size: 1.1rem;
        }

        .header-actions {
            gap: 0.3rem;
        }

        .header-btn {
            width: 38px;
            height: 38px;
            font-size: 1rem;
        }

        /* Hide message button on very small screens */
        .message-btn {
            display: none;
        }

        .user-dropdown-avatar {
            width: 38px;
            height: 38px;
            font-size: 0.9rem;
        }
    }

    /* Extra Small Mobile View (< 400px) */
    @media (max-width: 399.98px) {
        .top-header {
            padding: 0 0.5rem;
        }

        .header-title {
            font-size: 0.95rem;
        }

        .header-actions {
            gap: 0.25rem;
        }

        .header-btn {
            width: 36px;
            height: 36px;
        }

        /* Hide search button on extra small screens */
        .search-btn {
            display: none;
        }

        .user-dropdown {
            padding: 0.25rem;
        }

        .user-dropdown-avatar {
            width: 36px;
            height: 36px;
        }
    }
</style>