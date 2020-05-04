<div class="left-sidenav">

    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="/"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
        </li>
        @if (auth()->user()->jabatan == 'Manager')
        <li>
            <a href="{{ route('getUsers') }}"><i class="mdi mdi-clipboard-account-outline"></i><span>User</span></a>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-book-open-page-variant"></i><span>Laporan</span><span
                    class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="page-tour.html">Tour</a></li>
                <li><a href="page-timeline.html">Timeline</a></li>
                <li><a href="page-invoice.html">Invoice</a></li>
                <li><a href="page-treeview.html">Treeview</a></li>
                <li><a href="page-profile.html">Profile</a></li>
                <li><a href="page-starter.html">Starter Page</a></li>
                <li><a href="page-pricing.html">Pricing</a></li>
                <li><a href="page-blogs.html"><span>Blogs</span></a></li>
                <li><a href="page-faq.html">FAQs</a></li>
                <li><a href="page-gallery.html">Gallery</a></li>
            </ul>
        </li>
        @endif
        @if (auth()->user()->jabatan == 'Kasir')
        <li>
            <a href="{{ route('getKategori') }}"><i class="mdi mdi-buffer"></i><span>Kategori</span></a>
        </li>

        <li>
            <a href="{{ route('getMenu') }}"><i class="mdi mdi-cards-playing-outline"></i><span>Menu</span></a>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cart-arrow-right"></i><span>Pesanan</span><span
                    class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="charts-apex.html">Menu</a></li>
                <li><a href="charts-morris.html">Daftar Pesanan</a></li>
                <li><a href="charts-chartist.html">Pesanan Selesai</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);"><i class="mdi mdi-ballot-recount"></i><span>Stock Opname</span><span
                    class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="email-templates-basic.html">Data</a></li>
                <li><a href="email-templates-alert.html">Tambah</a></li>
            </ul>
        </li>

        @endif


    </ul>
</div>