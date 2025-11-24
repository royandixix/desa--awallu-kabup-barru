<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin') - Sistem Admin Desa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @stack('styles')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        :root {
            --sidebar-width: 280px;
            --sidebar-bg: linear-gradient(180deg, #027430 0%, #60bd60 100%);
            --sidebar-color: #fff;
            --sidebar-hover: rgba(255,255,255,0.1);
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --header-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f5f7fb;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .content-wrapper {
            flex: 1;
            padding: 2rem;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1035;
            backdrop-filter: blur(2px);
        }

        .sidebar-overlay.show {
            display: block;
        }

        @media (max-width: 991.98px) {
            .main-content {
                margin-left: 0;
            }

            .content-wrapper {
                padding: 1.5rem;
            }
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        @include('admin.partials.sidebar')

        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- MAIN CONTENT -->
        <div class="main-content">

            <!-- HEADER -->
            @include('admin.partials.header')

            <!-- CONTENT -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- FOOTER -->
            @include('admin.partials.footer')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebarBtn');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
            document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
        }

        toggleBtn?.addEventListener('click', toggleSidebar);
        overlay?.addEventListener('click', toggleSidebar);

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 992) {
                if (!sidebar.contains(e.target) && !toggleBtn?.contains(e.target) && sidebar.classList.contains('show')) {
                    toggleSidebar();
                }
            }
        });

        // Active menu handling
        const currentPath = window.location.pathname;
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
                
                // Open parent collapse if exists
                const collapse = link.closest('.collapse');
                if (collapse) {
                    collapse.classList.add('show');
                    const trigger = document.querySelector(`[data-bs-target="#${collapse.id}"]`);
                    if (trigger) trigger.setAttribute('aria-expanded', 'true');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
