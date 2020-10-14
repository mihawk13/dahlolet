@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right align-item-center mt-2">
                <li class="hide-phone app-search">
                    <form id="formCariMenu" action="{{ route('cariMenu') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="text" placeholder="Cari nama menu..." class="form-control" name="cari" value="{{ $cari }}">
                        <a><i class="fas fa-search"></i></a>
                    </form>
                </li>
            </div>
            <div class="float-right mt-2">
                <li class="app-kategori" style="list-style-type: none;">
                    <form role="search" class="">
                        <select name="kategori" id="kategori" class="select2 form-control custom-select">
                            <option value="">--Pilih Kategori--</option>
                            @foreach ($kategori as $kat)
                            @if ($kat->id_kategori == $idkat)
                            <option selected value="{{ $kat->id_kategori }}">{{ $kat->nama }}</option>
                            @else
                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                    </form>
                </li>

            </div>
            <h4 class="page-title mb-2"><i class="mdi mdi-cart-arrow-right"></i> List Menu</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Kasir</a></li>
                    <li class="breadcrumb-item active">Pesanan</li>
                </ol>
            </div>
        </div>
        <!--end page title box-->
    </div>
    <!--end col-->
</div>
@endsection

@section('content')

<!-- alert -->
@if (session()->has('gagal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
    </button>
    <strong>{{ Session::get('gagal') }}</strong>
</div>
@endif

@if (session()->has('berhasil'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
    </button>
    <strong>{{ Session::get('berhasil') }}</strong>
</div>
@endif
<!-- alert-->

<div class="row">
    @foreach ($menus as $menu)
    <div class="col-lg-4">
        <div class="card e-co-product">
            <a>
                <img src="{{ Storage::url('menu/' . $menu->gambar) }}" width="250" height="250" alt="" class="img-fluid">
            </a>
            <div class="card-body text-center product-info">
                <a href="" class="product-title">{{ $menu->nama }}</a>
                <p class="product-price">Rp. {{ number_format($menu->harga) }}</p>

                @if ($menu->qty > 0)
                {{-- hapus --}}
                <button
                    onclick="event.preventDefault(); document.getElementById('kurangi{{ $menu->id_menu }}').submit();"
                    class="btn btn-danger btn-sm waves-effect waves-light wishlist" data-toggle="tooltip"
                    data-placement="top" title="Kurangi"><i class="mdi mdi-minus"></i></button>
                {{-- Qty --}}
                <button
                    class="btn btn-cart btn-sm waves-effect waves-light">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $menu->qty }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                {{-- tambah --}}
                <button
                    onclick="event.preventDefault(); document.getElementById('tambah{{ $menu->id_menu }}').submit();"
                    class="btn btn-success btn-sm waves-effect waves-light quickview" data-toggle="tooltip"
                    data-placement="top" title="Tambah"><i class="mdi mdi-plus"></i></button>
                @else
                {{-- masuk keranjang --}}
                <button onclick="event.preventDefault(); document.getElementById('masuk{{ $menu->id_menu }}').submit();"
                    class="btn btn-cart btn-sm waves-effect waves-light"><i class="mdi mdi-cart mr-1"></i> Masukkan ke
                    Keranjang
                </button>
                @endif

            </div>
        </div>
    </div>

    <form id="kurangi{{ $menu->id_menu }}" action="{{ route('kurangiKeranjang') }}" method="POST"
        style="display: none;">
        @csrf
        <input type="hidden" name="id" value="{{ $menu->id_menu }}">
        <input type="hidden" name="harga" value="{{ $menu->harga }}">
        <input type="hidden" name="qty" value="{{ $menu->qty }}">
    </form>

    <form id="masuk{{ $menu->id_menu }}" action="{{ route('masukKeranjang') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="id" value="{{ $menu->id_menu }}">
        <input type="hidden" name="harga" value="{{ $menu->harga }}">
        <input type="hidden" name="qty" value="{{ $menu->qty }}">
    </form>

    <form id="tambah{{ $menu->id_menu }}" action="{{ route('tambahKeranjang') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="id" value="{{ $menu->id_menu }}">
        <input type="hidden" name="harga" value="{{ $menu->harga }}">
        <input type="hidden" name="qty" value="{{ $menu->qty }}">
    </form>
    @endforeach
</div>

@foreach ($kategori as $kat)
<form id="kategoriFrom{{ $kat->id_kategori }}" action="{{ route('cariKategori') }}" method="POST"
    style="display: none;">
    @csrf
    <input type="hidden" name="idkat" value="{{ $kat->id_kategori }}">
</form>
@endforeach
@endsection

@section('body')
<script>
    $(document).ready(function() {
        $('#kategori').change(function() { // Jika Select Box kode_kelas dipilih
            var kategori = $('#kategori').val();
            document.getElementById("kategoriFrom" + kategori).submit();
         });
    } );
</script>
@endsection
