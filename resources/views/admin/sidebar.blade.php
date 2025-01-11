<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <span class="brand-text font-weight-light">Admin Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/adjs/img/admin_illus.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/admin" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Category Menu -->
                <li class="nav-item {{ Request::is('admin/menus/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/menus/add') || Request::is('admin/menus/list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menus/add" class="nav-link {{ Request::is('admin/menus/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menus/list" class="nav-link {{ Request::is('admin/menus/list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Product Menu -->
                <li class="nav-item {{ Request::is('admin/products/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/products/add') || Request::is('admin/products/list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/products/add" class="nav-link {{ Request::is('admin/products/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/products/list" class="nav-link {{ Request::is('admin/products/list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Slider Menu -->
                <li class="nav-item {{ Request::is('admin/sliders/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/sliders/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link {{ Request::is('admin/sliders/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link {{ Request::is('admin/sliders/list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Cart Menu -->
                <li class="nav-item {{ Request::is('admin/customers') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Cart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/customers" class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- User Menu -->
                <li class="nav-item {{ Request::is('admin/users/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/users/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/users/users/add" class="nav-link {{ Request::is('admin/users/users/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/users/users/list" class="nav-link {{ Request::is('admin/users/users/list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
