<div class="card-body invoice-head">
    <div class="row">
        <div class="col-md-4 align-self-center">
            <img src="{{ asset('images/logo-sm.png') }}" alt="logo-small" class="logo-sm mr-2" height="38">
            <img src="{{ asset('images/dahlolet.png') }}" alt="logo-large" class="logo-lg" height="18">
        </div>
        <div class="col-md-8">

            <ul class="list-inline mb-0 contact-detail float-right">
                <li class="list-inline-item">
                    <div class="pl-3">
                        <i class="mdi mdi-phone"></i>
                        <p class="text-muted mb-0">0817-4889-988</p>
                        <p class="text-muted mb-0">-</p>
                    </div>
                </li>
                <li class="list-inline-item">
                    <div class="pl-3">
                        <i class="mdi mdi-map-marker"></i>
                        <p class="text-muted mb-0">Jl. Teuku Umar No.235, Dauh Puri Kauh,</p>
                        <p class="text-muted mb-0">Kec. Denpasar Bar., Kota Denpasar, Bali 80113</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end card-body-->
<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div class="">
                <h6 class="mb-0"><b>Tanggal & Waktu Order :</b>
                    {{ \Carbon\Carbon::parse($trx->created_at)->translatedFormat('d M Y H:i') }}</h6>
                <h6><b>Nama Pelanggan :</b> {{ $trx->nama_pelanggan }}</h6><br><br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th class="text-right">Harga</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trx->detail as $item)
                        <tr>
                            <th>{{ $item->menu->nama }}</th>
                            <td class="text-right">Rp. {{ number_format($item->menu->harga) }}</td>
                            <td class="text-right">{{ $item->qty }}</td>
                            <td class="text-right">Rp. {{ number_format($item->total_harga) }}</td>
                        </tr>
                        @endforeach
                        <tr class="bg-dark text-white">
                            <th colspan="1" class="border-0"></th>
                            <td class="border-0 font-14"><b>Grand Total</b></td>
                            <td class="border-0 font-14 text-right"><b>{{ $trx->qty }} Pcs</b></td>
                            <td class="border-0 font-14 text-right"><b>Rp. {{ number_format($trx->grand_total) }}</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h5 class="mt-4">Terms And Condition :</h5>
            <ul class="pl-3">
                <li><small>Barang yang sudah dibeli tidak dapat dikembalikan.</small></li>
            </ul>
        </div>
        <div class="col-lg-6 align-self-end mt-5">
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
            <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks !</small>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4">
            <div class="float-right d-print-none">
                <a href="{{ route($back . '.getDataPesanan') }}" class="btn btn-danger text-light"><i
                        class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
