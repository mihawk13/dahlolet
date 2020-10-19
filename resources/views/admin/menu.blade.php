@extends('layouts.app')
@section('head')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('vendor/isotope/isotope.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/lightbox/css/lightbox.css') }}" rel="stylesheet" />
@stop
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
                                <h5 class="modal-title mt-0">Tambah Data Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('postMenu') }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>ID Menu</label>
                                        <input name="id" type="text" class="form-control" value="{{ $kode }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control">
                                            <option value="">--Pilih Kategori--</option>
                                            @foreach ($kategori as $kat)
                                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input name="nama" type="text" class="form-control"
                                            placeholder="Masukkan Nama Menu" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input name="harga" type="text" class="form-control"
                                            placeholder="Masukkan Harga Menu" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input name="gambar" type="file" class="form-control" required>
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
            <h4 class="page-title mb-2"><i class="mdi mdi-cards-playing-outline"></i> Data Menu</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Menu</li>
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
                <table id="dataMenu" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID Menu</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>HideStatus</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menu->id_menu }}</td>
                            <td>{{ $menu->kategori }}</td>
                            <td>{{ $menu->nama }}</td>
                            <td>Rp. {{ number_format($menu->harga) }}</td>
                            <td>{{ $menu->status }}</td>
                            <td>{{ $status = ($menu->status == 0) ? "Tidak Aktif" : "Aktif" }}</td>
                            <td>
                                <center>
                                    <div class="image-inner">
                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-placement="left"
                                            title="{{ $menu->nama }}" href="{{ Storage::url('menu/' . $menu->gambar) }}"
                                            data-lightbox="gallery-group-1">
                                            <span class="s-icon"><i class="fa fa-eye"></i></span></a>
                                    </div>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a type="button" style="color:white" class="btn btn-warning btn-sm"
                                        data-toggle="modal" data-target=".ubah{{ $menu->id_menu }}"
                                        data-placement="left" title="Ubah Data Menu">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @if ($menu->status == 0)
                                    <a type="button" style="color:white" class="btn btn-success btn-sm"
                                        data-toggle="tooltip" data-placement="left" title="Aktifkan Menu" href="{{ route('setStatus') }}" onclick="event.preventDefault(); document.getElementById('AktifMenu{{ $menu->id_menu }}').submit();">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <form id="AktifMenu{{ $menu->id_menu }}" action="{{ route('setStatus') }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="id" value="{{ $menu->id_menu }}">
                                        <input type="hidden" name="status" value="Aktif">
                                        @csrf
                                    </form>
                                    @else
                                    <a type="button" style="color:white" class="btn btn-danger btn-sm"
                                        data-toggle="tooltip" data-placement="left" title="Non Aktifkan Menu" href="{{ route('setStatus') }}" onclick="event.preventDefault(); document.getElementById('NonAktifMenu{{ $menu->id_menu }}').submit();">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <form id="NonAktifMenu{{ $menu->id_menu }}" action="{{ route('setStatus') }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="id" value="{{ $menu->id_menu }}">
                                        <input type="hidden" name="status" value="NonAktif">
                                        @csrf
                                    </form>
                                    @endif
                                </center>
                            </td>
                        </tr>
                        <!-- modal ubah -->
                        <div class="modal fade ubah{{ $menu->id_menu }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Ubah Data Menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('ubahMenu') }}" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PATCH">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>ID Menu</label>
                                                <input name="id" type="text" class="form-control"
                                                    value="{{ $menu->id_menu }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="kategori" class="form-control">
                                                    <option value="">--Pilih Kategori--</option>
                                                    @foreach ($kategori as $kat)
                                                    @if($menu->id_kategori == $kat->id_kategori)
                                                    <option selected value="{{ $menu->id_kategori }}">
                                                        {{ $menu->kategori }}</option>
                                                    @else
                                                    <option value="{{ $kat->id_kategori }}">{{ $kat->nama }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input name="nama" type="text" class="form-control"
                                                    placeholder="Masukkan Nama Menu" required value="{{ $menu->nama }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input name="harga" type="text" class="form-control"
                                                    placeholder="Masukkan Harga Menu" required
                                                    value="{{ $menu->harga }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input name="gambar" type="file" class="form-control">
                                                <small>Kosongkan jika tidak ingin diubah!</small>
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
@section('script-bottom')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('vendor/lightbox/js/lightbox.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataMenu').DataTable({
            "order": [[ 4, "DESC" ]],
            "columnDefs": [
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": false
            }
        ]
        });
    } );
</script>
@endsection
