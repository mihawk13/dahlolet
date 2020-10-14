@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title mb-2"><i class="mdi mdi-clipboard-account-outline"></i> Profile</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">User</li>
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
                <div class="card-content">
                    <div class="card-header">
                        <h5 class="card-title mt-0">Ubah Profile</h5>
                    </div>
                    <form action="{{ route('postProfile') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama" required value="{{ old('nama') ?? Auth::user()->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Telp</label>
                                <input name="telp" type="text" class="form-control" placeholder="Masukkan Telp"
                                    required value="{{ old('telp') ?? Auth::user()->telp }}">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="jabatan" class="form-control">
                                    <option value="">--Pilih Jabatan--</option>
                                    @foreach (getJabatan() as $jab)
                                    <option {{ (Auth::user()->jabatan == $jab) ? 'selected' : '' }} value="{{ $jab }}">{{ $jab }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control" placeholder="Masukkan Username"
                                    required value="{{ old('username') ?? Auth::user()->username }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                                <small>kosongkan jika tidak mau diubah!</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
