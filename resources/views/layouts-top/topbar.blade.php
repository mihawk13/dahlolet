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

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama }}" alt="profile-user"
                        class="rounded-circle" />
                    <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('getProfile') }}"><i
                            class="dripicons-user text-muted mr-2"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="dripicons-exit text-muted mr-2"></i> Logout</a>
                </div>
            </li>
        </ul>

    </nav>
    <!-- end navbar-->
</div>
