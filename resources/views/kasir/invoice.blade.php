@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title mb-2"><i class="mdi mdi-receipt mr-2"></i>Invoice</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </div>
        </div>
        <!--end page title box-->
    </div>
    <!--end col-->
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
           @include('list_invoice', ['back' => 'kasir'])
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@endsection
