@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title mb-2"><i class="mdi mdi-cart-arrow-right"></i> Laporan Penjualan Harian Per Kategori</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Penjualan Harian Per Kategori</li>
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
                <form action="{{ route('lap_penjualan_kategori') }}" method="post">
                    @csrf
                    <div class="row pt-6">
                        <div class="col-md-6">
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="tglAwal" placeholder="Tanggal Awal"
                                    value="{{ $tglAwal }}" required/>
                                <input type="text" class="form-control" name="tglAkhir" placeholder="Tanggal Akhir"
                                    value="{{ $tglAkhir }}" required/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="kategori" class="form-control" required>
                                <option value="">--Pilih Kategori--</option>
                                @foreach ($kategori as $cat)
                                    <option @if($kat == $cat->id_kategori) selected @endif value="{{ $cat->id_kategori }}">{{ $cat->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" style="color:white">-</label>
                            <button type="submit" class="btn btn-success" style="height:40px;"><i
                                    class="fa fa-search"></i> Tampilkan</button>
                        </div>
                    </div>
                </form><br><br>
                @if(isset($tglAwal))
                @php
                $total = 0;
                $qtys = 0;
                $no=1;
                @endphp
                <table id="file_export" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-right">Total Pesanan</th>
                            <th class="text-right">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trans as $trx)
                        @php
                        $total += $trx->total;
                        $qtys += $trx->qty;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($trx->tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="text-right">{{ $trx->qty }}</td>
                            <td class="text-right">{{ number_format($trx->total) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            {{-- <td>-</td> --}}
                            <td colspan="2" class="text-center"><strong>TOTAL</strong></td>
                            <td class="text-right"><strong><?= $qtys ?></strong></td>
                            <td class="text-right"><strong><?= number_format($total) ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
