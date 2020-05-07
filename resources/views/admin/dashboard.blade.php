@extends('layouts.app')

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
                <span class="badge badge-danger">Visits</span>
                <h3 class="font-weight-bold">24k</h3>
                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                            class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-cart  font-20 text-secondary"></i>
                </div>
                <span class="badge badge-info">New Orders</span>
                <h3 class="font-weight-bold">10k</h3>
                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                            class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-jewel font-20 text-secondary"></i>
                </div>
                <span class="badge badge-warning">Return Order</span>
                <h3 class="font-weight-bold">8400</h3>
                <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i
                            class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-wallet font-20 text-secondary"></i>
                </div>
                <span class="badge badge-success">Revenue</span>
                <h3 class="font-weight-bold">$85000</h3>
                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                            class="mdi mdi-trending-up"></i>10.5%</span> Up From Last Week</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Revenue</h4>
                <div class="apexchart-wrapper chart-demo">
                    <div id="e-dash1" class="chart-gutters"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
@endsection