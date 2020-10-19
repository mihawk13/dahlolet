@foreach ($trans as $trx)
<div class="col-lg-4">
    <div class="card">
        <div class="card-header bg-info d-flex">
            <div style="flex: 0.9;">
                <h5 class="text-white">No Meja: {{ $trx->no_meja }}</h5>
                <h5 class="text-white">Pelanggan: {{ $trx->nama_pelanggan }}</h5>
            </div>
            <div style="flex: 0.1">
                <h5 class="@if($trx->status == 'Dipesan') text-warning @else text-primary @endif">{{ $trx->status }}
                </h5>
            </div>
        </div>
        <div class="card-body text-center">
            @foreach ($trx->detail as $dtl)
            <p class="font-20">{{ $dtl->menu->nama . ' x ' . $dtl->qty }}</p>
            @endforeach
        </div>
        <div class="card-footer text-right">
            @if ($trx->status == 'Dipesan')
            <a href="{{ route('siapkanPesanan', $trx->id) }}" class="btn btn-primary btn-sm text-white">Siapkan
                Pesanan</a>
            @else
            <a href="{{ route('selesaiPesanan', $trx->id) }}" class="btn btn-success btn-sm text-white">Selesai</a>
            @endif
        </div>
    </div>
</div>
@endforeach
