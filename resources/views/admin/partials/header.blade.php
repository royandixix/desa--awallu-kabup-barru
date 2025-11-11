<header class="pc-header">
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- Sidebar Toggle -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <!-- Search -->
                    <li class="dropdown pc-h-item d-inline-flex d-md-none">
                        <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="mb-0 d-flex align-items-center">
                                    <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                                    <button class="btn btn-light-secondary btn-search">Search</button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="pc-h-item d-none d-md-inline-flex">
                        <form class="form-search">
                            <i class="ti ti-search"></i>
                            <input type="search" class="form-control" placeholder="Search here...">
                        </form>
                    </li>
                </ul>
            </div>

            <div class="ms-auto">
                <ul class="list-unstyled">
                    <!-- Fullscreen -->
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-maximize"></i>
                        </a>
                    </li>

                    <!-- Notifications -->
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-bell"></i>
                            <span class="badge bg-danger pc-h-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Notifications</h5>
                                <a href="#!" class="btn btn-link btn-sm">Mark all read</a>
                            </div>
                            <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 235px)">
                                <p class="text-span">Today</p>
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class="ti ti-shopping-cart text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <span class="float-end text-sm text-muted">2 min ago</span>
                                                <h6 class="text-body mb-2">New Order Received</h6>
                                                <p class="mb-0">Order #12345 has been placed</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class="ti ti-user text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <span class="float-end text-sm text-muted">1 hour ago</span>
                                                <h6 class="text-body mb-2">New User Registered</h6>
                                                <p class="mb-0">John Doe joined the platform</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center py-2">
                                <a href="#!" class="link-primary">View all Notifications</a>
                            </div>
                        </div>
                    </li>

                    <!-- User Profile -->
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="{{ asset('Mantis-Bootstrap/dist/assets/images/user/avatar-2.jpg') }}" alt="user-image" class="user-avtar">
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Profile</h5>
                            </div>
                            <div class="dropdown-body">
                                <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                    <div class="d-flex mb-1">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('Mantis-Bootstrap/dist/assets/images/user/avatar-2.jpg') }}" alt="user-image" class="user-avtar wid-35">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">{{ auth()->user()->name ?? 'Admin User' }}</h6>
                                            <span>{{ auth()->user()->email ?? 'admin@example.com' }}</span>
                                        </div>
                                    </div>
                                    <hr class="border-secondary border-opacity-50">
                                    <div class="card">
                                        <div class="card-body py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0 d-inline-flex align-items-center">
                                                    <i class="ti ti-settings me-1"></i> Settings
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <i class="ti ti-user"></i>
                                            <span>My Account</span>
                                        </span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <i class="ti ti-settings"></i>
                                            <span>Settings</span>
                                        </span>
                                    </a>
                                    <hr class="border-secondary border-opacity-50">
                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <i class="ti ti-lock"></i>
                                            <span>Change Password</span>
                                        </span>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <span>
                                                <i class="ti ti-logout"></i>
                                                <span>Logout</span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

  