<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts-top.head')
    @yield('head')
    @livewireStyles
</head>

<body>

    <!-- Top Bar Start -->
    @include('layouts-top.topbar')

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- Top Bar End -->
    <div class="page-wrapper-img">
        <div class="page-wrapper-img-inner">
            <div class="sidebar-user media">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama }}" alt="user"
                    class="rounded-circle img-thumbnail mb-1">
                <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                <div class="media-body">
                    <h5 class="text-light">{{ Auth::user()->nama }}</h5>
                    <ul class="list-unstyled list-inline mb-0 mt-2">
                        <li class="list-inline-item">
                            <a href="{{ route('getProfile') }}" class=""><i class="mdi mdi-account text-light"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class=""><i class="mdi mdi-power text-danger"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-Title -->
            @yield('breadcrumb')
            <!--end row-->
            <!-- end page title end breadcrumb -->
        </div>
        <!--end page-wrapper-img-inner-->
    </div>
    <!--end page-wrapper-img-->

    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            <!-- Left Sidenav -->
            @include('layouts-top.sidebar')
            <!-- end left-sidenav-->

        </div>
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
                <!--end row-->
            </div><!-- container -->

            <footer class="footer text-center text-sm-left">
                &copy; 2020-{{ date('Y') }} Dahlolet <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Yogi</span>
            </footer>
        </div>
        <!-- end page content -->

        <!--end page-wrapper-inner -->
    </div>
    <!-- end page-wrapper -->
    @include('layouts-top.body')
    @livewireScripts

</body>

</html>
