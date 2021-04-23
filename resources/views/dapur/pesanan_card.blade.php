@foreach ($trans as $trx)
<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{ $trx->nama_pelanggan }} || Meja {{ $trx->no_meja }}</h4>
            {{-- <p class="text-muted mb-4 font-13">Add an optional header and/or footer within a card.</p> --}}
            <div class="card border mb-0 text-center">
                <div class="card-header @if($trx->status == 'Dipesan') text-warning @else text-primary @endif">
                    {{ $trx->status }}
                </div>
                <div class="card-body">
                    @foreach ($trx->detail as $dtl)
                    <h3 class="card-title">{{ $dtl->menu->nama . ' x ' . $dtl->qty }}</h3>
                    @endforeach
                    @if ($trx->status == 'Dipesan')
                    <a href="{{ route('siapkanPesanan', $trx->id) }}" class="btn btn-primary btn-sm text-white">Siapkan
                        Pesanan</a>
                    @else
                    <a href="{{ route('selesaiPesanan', $trx->id) }}"
                        class="btn btn-success btn-sm text-white">Selesai</a>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    {{ $trx->created_at->diffForHumans() }}
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
<!--end col-->
@endforeach
