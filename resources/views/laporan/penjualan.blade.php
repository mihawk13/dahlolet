@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title mb-2"><i class="mdi mdi-cart-arrow-right"></i> Laporan Penjualan</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Penjualan</li>
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('lap_penjualan') }}" method="post">
                    @csrf
                    <div class="row pt-6">
                        <div class="col-md-6">
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="tglAwal" placeholder="Tanggal Awal" value="{{ $tglAwal }}" />
                                <input type="text" class="form-control" name="tglAkhir" placeholder="Tanggal Akhir" value="{{ $tglAkhir }}" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" style="color:white">-</label>
                            <button type="submit" class="btn btn-success"
                                style="height:40px;"><i class="fa fa-search"></i> Tampilkan</button>
                        </div>
                    </div>
                </form><br><br>
                <table id="file_export" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">No Meja</th>
                            <th class="text-center">Waktu Pemesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trans as $trx)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $trx->no_meja }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($trx->created_at)->translatedFormat('d M Y H:i') }}</td>
                            <td>{{ $trx->nama_pelanggan }}</td>
                            <td>{{ $trx->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
