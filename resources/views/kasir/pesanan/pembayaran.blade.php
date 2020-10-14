<div class="row justify-content-center">
    <form class="col-md-6 align-self-center" method="POST" action="{{ route('postCheckOut') }}">
        @method('PATCH')
        @csrf
        <div class="total-payment">
            <h4 class="header-title">Detail Pesanan</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="payment-title">Tanggal</td>
                        <td>{{ \Carbon\Carbon::parse(date('d-m-Y'))->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td class="payment-title">Nama Pelanggan</td>
                        <td><input name="nama_pelanggan" type="text" class="form-control" placeholder="Masukkan Nama Pelanggan" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Total Pesanan</td>
                        <td class="total_qty font-weight-bold"></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Grand Total</td>
                        <td class="total_harga font-weight-bold"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('getListMenu') }}" class="text-info"><i
                            class="fas fa-long-arrow-alt-left mr-1"></i>
                        Pilih Menu</a>
                </div>
                <div class="col-6 text-right">
                    <button type="submit" style="border:none;background: none;" class="text-info">Checkout <i class="fas fa-long-arrow-alt-right ml-1"></i></button>
                </div>
            </div>
        </div>
    </form>
    <!--end col-->

</div>
