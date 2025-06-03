<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('admin') }}/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Order System</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard.home') }}"
                        class="nav-link {{ Route::currentRouteName() == 'dashboard.home' ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('*clients*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*clients*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-fill"></i>
                        <p>
                            Clients
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.clients.create') }}"
                                class="nav-link {{ Route::currentRouteName() == 'dashboard.clients.create' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-plus-circle-fill"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.clients.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'dashboard.clients.index' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-list"></i>
                                <p>index</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ Request::is('*orders*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*orders*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-cart-check-fill"></i>
                        <p>
                            Orders
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.orders.create') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard.orders.create' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-plus-circle-fill"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.orders.index') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard.orders.index' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-list"></i>
                                <p>index</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard2-data-fill"></i>
                        <p>
                            Reports
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./widgets/small-box.html" class="nav-link">
                                <i class="nav-icon bi bi-cart-check-fill"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./widgets/info-box.html" class="nav-link">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>Clients</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
