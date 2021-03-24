<div class="left-sidenav">

    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="/"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
        </li>
        @if (auth()->user()->jabatan == 'Admin')
        <li>
            <a href="{{ route('getUsers') }}"><i class="mdi mdi-clipboard-account-outline"></i><span>User</span></a>
        </li>
        <li>
            <a href="{{ route('getKategori') }}"><i class="mdi mdi-buffer"></i><span>Kategori</span></a>
        </li>
        <li>
            <a href="{{ route('getMenu') }}"><i class="mdi mdi-food"></i><span>Menu</span></a>
        </li>
        <li>
            <a href="{{ route('admin.getDataPesanan') }}"><i class="mdi mdi-cards-playing-outline"></i><span>Data Pesanan</span></a>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-book-open-page-variant"></i><span>Laporan</span><span
                    class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('lap_penjualan') }}">Penjualan</a></li>
                <li><a href="{{ route('lap_penjualan_harian') }}">Penjualan Harian</a></li>
                <li><a href="{{ route('lap_penjualan_kategori') }}">Penjualan Per Kategori</a></li>
            </ul>
        </li>
        @endif
        @if (auth()->user()->jabatan == 'Kasir')

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cart-arrow-right"></i><span>Pesanan</span><span
                    class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('getListMenu') }}">List Menu</a></li>
                <li><a href="{{ route('getListPesanan') }}">Keranjang <span id="badgeTotal2" class="badge badge-danger badge-pill float-right">{{ getJmlPesanan() }}</span></a> </li>
                <li><a href="{{ route('kasir.getDataPesanan') }}">Data Pesanan</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-book-open-page-variant"></i><span>Laporan</span><span
                    class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('lap_penjualan') }}">Penjualan</a></li>
                <li><a href="{{ route('lap_penjualan_harian') }}">Penjualan Harian</a></li>
                <li><a href="{{ route('lap_penjualan_kategori') }}">Penjualan Per Kategori</a></li>
            </ul>
        </li>

        @endif
        @if (auth()->user()->jabatan == 'Dapur')
        <li>
            <a href="{{ route('dapur.getDataPesanan') }}"><i class="mdi mdi-buffer"></i><span>Data Pesanan</span></a>
        </li>
        @endif


    </ul>
</div>
