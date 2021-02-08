@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title mb-2"><i class="mdi mdi-monitor-dashboard mr-2"></i>Dashboard</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Kasir</a></li>
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
                <div class="apexchart-wrapper chart-demo">
                    <div id="e-dash1" class="chart-gutters"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Grafik Penjualan Bulan
                    {{ \Carbon\Carbon::parse(date('M'))->translatedFormat('F') . ' ' . date('Y') }}</h4>
                <div class="apexchart-wrapper chart-demo">
                    <div id="e-dash2" class="chart-gutters"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="{{ asset('pages/jquery.dashboard-3.init.js') }}"></script> --}}
<script>
    function grafikPendapatan(srs, mnth) {
        var options = {

        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
            columnWidth: '50%',
            endingShape: 'flat'
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 2
        },
        series: [{
            name: 'Pendapatan',
            data: srs,
        }],
        grid: {
            row: {
            colors: ['#fff', '#f7f8f9']
            }
        },
        xaxis: {
            labels: {
            rotate: -45
            },
            categories: mnth,
        },
        yaxis: {
            labels: {
            formatter: function (value) {
                return "Rp. " + value ;
            }
            },
        },
        fill: {
            type: 'gradient',
            gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
            },
        },

        }

        var chart = new ApexCharts(
        document.querySelector("#e-dash1"),
        options
        );


        chart.render();
    }

    function grafikPenjualan(srs, mnth) {
        var options = {

        chart: {
            height: 350,
            type: 'line',
        },
        plotOptions: {
            bar: {
            columnWidth: '50%',
            endingShape: 'flat'
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 2
        },
        series: [{
            name: 'Jumlah',
            data: srs,
        }],
        grid: {
            row: {
            colors: ['#fff', '#f7f8f9']
            }
        },
        xaxis: {
            labels: {
            rotate: -45
            },
            categories: mnth,
        },
        yaxis: {
            labels: {
            formatter: function (value) {
                return value ;
            }
            },
        },
        fill: {
            type: 'gradient',
            gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
            },
        },

        }

        var chart = new ApexCharts(
        document.querySelector("#e-dash2"),
        options
        );


        chart.render();
    }

    $(document).ready(function() {
        var srs1 = [];
        var mnth1 = [];
        var srs2 = [];
        var mnth2 = [];

        fetch("{{ env('APP_URL') }}" + '/api/grafik')
        .then(response => response.json())
        .then(data => {
            // console.log(JSON.stringify(data))
            // console.log(data[0].total);
            for (let i = 0; i < data.length; i++) {
                srs1.push(data[i].total)
                var tgl = new Date(data[i].tanggal);
                // console.log(tgl.getDate());
                mnth1.push(tgl.getDate())
            }
            grafikPendapatan(srs1, mnth1);
        });


        fetch("{{ env('APP_URL') }}" + '/api/grafikPenjualan')
        .then(response => response.json())
        .then(data => {
            // console.log(JSON.stringify(data))
            // console.log(data[0].total);
            for (let i = 0; i < data.length; i++) {
                srs2.push(data[i].jml)
                var tgl = new Date(data[i].tanggal);
                // console.log(tgl.getDate());
                mnth2.push(tgl.getDate())
            }
            grafikPenjualan(srs2, mnth2);
        });

    })
</script>
@endsection
