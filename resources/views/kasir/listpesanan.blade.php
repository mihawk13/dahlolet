@extends('layouts.app')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title mb-2"><i class="mdi mdi-cart-arrow-right"></i> List Pesanan</h4>
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
<style>
    .hide {
        display: none;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="header-title mt-0">Shopping Cart</h4>
                <p class="mb-4 text-muted">Frogetor morden shopping cart.</p> --}}
                <div class="table-responsive shopping-cart">
                    {{-- <form >
                        @csrf
                        <input type="text" id="F_id" value="0">
                        <input type="text" id="F_harga" value="0">
                        <input type="text" id="F_qty" value="0">
                    </form> --}}

                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $item)
                            <tr>
                                <td class="idmenu hide">
                                    <input type="hidden" value="{{ $item->id_menu }}" />
                                </td>
                                <td class="harga hide">
                                    <input type="text" value="{{ $item->harga }}" />
                                </td>
                                <td>
                                    <img src="{{ asset($item->gambar) }}" alt="" height="52">
                                    <p class="d-inline-block align-middle mb-0">
                                        <a href=""
                                            class="d-inline-block align-middle mb-0 product-name">{{ $item->nama }}</a>
                                        <br>
                                        {{-- <span class="text-muted font-13">size-08 (Model 2019)</span> --}}
                                    </p>
                                </td>

                                <td>Rp. {{ number_format($item->harga) }}</td>
                                <td class="jumlah">
                                    <input class="form-control w-25" type="number" value="{{ $item->qty }}">
                                </td>
                                <td class="sum"></td>
                                <td>
                                    <a href="{{ route('hapusPesanan', $item->id_menu) }}" class="text-dark"><i
                                            class="mdi mdi-close-circle-outline font-20 text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Grand Total</th>
                                <th class="total_harga"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @include('kasir.pesanan.pembayaran')
                <!--end row-->
            </div>
            <!--end card-->
        </div>
        <!--end card-body-->
    </div>
    <!--end col-->
</div>
<!--end row-->


@endsection

@section('script-bottom')
<script src="{{ asset('js/listpesanan.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#kategori').change(function() { // Jika Select Box kode_kelas dipilih
            var kategori = $('#kategori').val();
            document.getElementById("kategoriFrom" + kategori).submit();
         });
    } );
</script>
@endsection
