@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('vendor/morris/morris.css') }}">
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title mb-2"><i class="mdi mdi-monitor-dashboard mr-2"></i>Dashboard</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!--end page title box-->
    </div>
    <!--end col-->
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-user-group font-24 text-secondary"></i>
                </div>
                <span class="badge badge-danger">Jumlah Menu</span>
                <h3 class="font-weight-bold">{{ getJmlMenu() }} macam</h3>
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                            class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-cart  font-20 text-secondary"></i>
                </div>
                <span class="badge badge-info">Total Pendapatan</span>
                <h3 class="font-weight-bold">Rp. {{ number_format(getTotalPendapatan()) }}</h3>
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                            class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-jewel font-20 text-secondary"></i>
                </div>
                <span class="badge badge-warning">Pendapatan Hari Ini</span>
                <h3 class="font-weight-bold">Rp. {{ number_format(getTotalPendapatanHariIni()) }}</h3>
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i
                            class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-wallet font-20 text-secondary"></i>
                </div>
                <span class="badge badge-success">Penjualan Hari Ini</span>
                <h3 class="font-weight-bold">{{ getPenjualanHariIni() }} pcs</h3>
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                            class="mdi mdi-trending-up"></i>10.5%</span> Up From Last Week</p> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Grafik Pendapatan Perhari Bulan
                    {{ \Carbon\Carbon::parse(date('M'))->translatedFormat('F') . ' ' . date('Y') }}</h4>
                <div id="grfPendapatan" class="chart-gutters"></div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Grafik Penjualan Bulan
                    {{ \Carbon\Carbon::parse(date('M'))->translatedFormat('F') . ' ' . date('Y') }}</h4>
                <div id="grfPenjualan" class="chart-gutters"></div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
@endsection

@section('script')
<script src="{{ asset('vendor/morris/raphael-min.js') }}"></script>
<script src="{{ asset('vendor/morris/morris.min.js') }}"></script>

<script>
    function number_format (number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    function grafikPendapatan(srs) {
        Morris.Bar({
            element: 'grfPendapatan',
            data: srs,
            xkey: 'tanggal',
            ykeys: ['value'],
            labels: ['Pendapatan'],
            parseTime: false,
            yLabelFormat: function (y) { return 'Rp. ' + number_format(y); }
        });
    }

    function grafikPenjualan(srs) {
        // console.log(srs)
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'grfPenjualan',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: srs,
            // The name of the data record attribute that contains x-values.
            xkey: 'tanggal',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Transaksi'],
            parseTime: false,
        });
    }

    $(document).ready(function() {
        var srs1 = [];
        var srs2 = [];

        fetch("{{ env('APP_URL') }}" + '/api/grafik')
        .then(response => response.json())
        .then(data => {
            // console.log(JSON.stringify(data))
            // console.log(data[0].total);
            for (let i = 0; i < data.length; i++) {
                var tgl = new Date(data[i].tanggal);
                // console.log(tgl.getDate());
                // mnth1.push(tgl.getDate())
                srs1.push({
                    tanggal: tgl.getDate(),
                    value: data[i].total
                })
            }
            grafikPendapatan(srs1);
        });


        fetch("{{ env('APP_URL') }}" + '/api/grafikPenjualan')
        .then(response => response.json())
        .then(data => {
            for (let i = 0; i < data.length; i++) {
                var tgl = new Date(data[i].tanggal);
                srs2.push({
                    tanggal: tgl.getDate(),
                    value: data[i].jml
                })
            }
            grafikPenjualan(srs2);
        });

    })
</script>
@endsection
