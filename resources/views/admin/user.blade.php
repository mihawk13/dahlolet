@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right align-item-center mt-2">
                <button class="btn btn-info px-4 align-self-center report-btn" data-toggle="modal"
                    data-target=".tambah"><i class="fa fa-plus"></i> Tambah</button>

                <!-- modal tambah -->
                <div class="modal fade tambah" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Tambah Data User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('postUsers') }}" method="POST">
                                <input type="hidden" name="_method" value="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telp</label>
                                        <input name="telp" type="text" class="form-control" placeholder="Masukkan Telp"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select name="jabatan" class="form-control">
                                            <option value="">--Pilih Jabatan--</option>
                                            @foreach (getJabatan() as $jab)
                                            <option value="{{ $jab }}">{{ $jab }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control"
                                            placeholder="Masukkan Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Masukkan Password" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal tambah -->
            </div>
            <h4 class="page-title mb-2"><i class="mdi mdi-clipboard-account-outline"></i> Data User</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
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
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->telp }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->jabatan }}</td>
                            <td>
                                <center>
                                    <a type="button" style="color:white" class="btn btn-warning btn-sm"
                                        data-toggle="modal" data-target=".ubah{{ $user->id }}" data-placement="left"
                                        title="Ubah Data User">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>

                        <!-- modal ubah -->
                        <div class="modal fade ubah{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Ubah Data User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('ubahUsers') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input name="nama" type="text" class="form-control"
                                                    placeholder="Masukkan Nama" required value="{{ $user->nama }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Telp</label>
                                                <input name="telp" type="text" class="form-control"
                                                    placeholder="Masukkan Telp" required value="{{ $user->telp }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <select name="jabatan" class="form-control">
                                                    <option value="">--Pilih Jabatan--</option>
                                                    @foreach (getJabatan() as $jab)
                                                    <option {{ ($user->jabatan == $jab) ? 'selected' : '' }}
                                                        value="{{ $jab }}">{{ $jab }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="username" type="text" class="form-control"
                                                    placeholder="Masukkan Username" required
                                                    value="{{ $user->username }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" type="password" class="form-control"
                                                    placeholder="Masukkan Password">
                                                <small>Kosongkan jika tidak ingin diganti!</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="ubah">Simpan</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- modal ubah -->
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
