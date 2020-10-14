const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
})

function calculate() {

    var total_price = 0;
    var total_qty = 0;

    $('.shopping-cart tbody tr').each(function() {
        var row = $(this),
            id_menu = row.find('.idmenu input').val(),
            harga = row.find('.harga input').val(),
            jml = row.find('.jumlah input').val();
        var totalharga = harga * jml;

        total_price += totalharga;
        total_qty += parseInt(jml);
        row.find('.sum').text(formatter.format(totalharga.toFixed()));

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: 'listpesanan',
            // data: 'id=' + id_menu + '&qty=' + jml + '&_token=' + '{{ csrf_token() }}',
            data: { id: id_menu, qty: jml },
            success: function(data) {
                $('#badgeTotal').html(data);
                $('#badgeTotal2').html(data);
                // console.log(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // console.log(xhr.status);
                // console.log(ajaxOptions);
                // console.log(thrownError);
            }
        });

        // const interval = setInterval(function() {
        // $('#badgeTotal').html("1301");
        // }, 5000);
    });

    $('.total_harga').text(formatter.format(total_price.toFixed()));
    $('.total_qty').text(total_qty + ' PCS');
}

$('.shopping-cart').on('keyup input change', function() {
    calculate();
});
calculate();
