<div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="/" class="logo">
                <span>
                    <img src="{{ asset('images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="{{ asset('images/dahlolet.png') }}" alt="logo-large" class="logo-lg">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topbar-nav float-right mb-0">
            {{-- keranjang --}}
            @if (Auth::user()->jabatan == 'Kasir')
            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect"  href="{{ route('getListPesanan') }}"
                    role="button" >
                    <i class="mdi mdi-cart-arrow-right nav-icon"></i>
                    <a href="{{ route('getListPesanan') }}" id="badgeTotal" class="badge badge-danger badge-pill noti-icon-badge">{{ getJmlPesanan() }}</a>
                </a>
                {{-- <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                    <!-- item-->
                    <h6 class="dropdown-item-text">
                        Keranjang ({{ getJmlPesanan() }})
                    </h6>
                    <div class="slimscroll notification-list">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of
                                    the printing and typesetting industry.</small></p>
                        </a>
                        <!-- item-->
                    </div>
                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div> --}}
            </li>
            @endif
            {{-- keranjang --}}

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama }}" alt="profile-user" class="rounded-circle" />
                    <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('getProfile') }}"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="dripicons-exit text-muted mr-2"></i> Logout</a>
                </div>
            </li>
        </ul>

        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="button-menu-mobile nav-link waves-effect waves-light">
                    <i class="mdi mdi-menu nav-icon"></i>
                </button>
            </li>
        </ul>

    </nav>
    <!-- end navbar-->
</div>
