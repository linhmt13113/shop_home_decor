<!-- Header -->
<header>
    @php
        $menusHtml = \App\Helpers\Helper::menus($menus);
    @endphp

    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="header-limit-ds content">

                <!-- Logo desktop -->
                <a href="/" class="header-logo">
                    <img src="/template/images/icons/logo-store1.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="header-main-ds">
                        <li class="header-active-ds">
                            <a href="/">Home Page</a>
                        </li>

                        <!-- Dynamic menus -->
                        {!! $menusHtml !!}


                        <!-- Check if user is logged in -->
                        @auth
                            <li>
                                <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="logout">Logout</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="login">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register.form') }}" class="register">Register</a>
                            </li>
                        @endauth

                    </ul>
                </div>

                <!-- Icon header -->
                <div class="header-icon-ds flex-w flex-r-m">
                    <div class="icon-ds-items ds-in-icon icon-hv trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-ds-items ds-in-icon icon-hv trans-04 p-l-22 p-r-11 icon-ds-annou js-show-cart"
                        data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="{{ route('product.search') }}" method="GET">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
            </form>
        </div>
    </div>
</header>
