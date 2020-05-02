<!-- jQuery  -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/waves.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('vendor/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/responsive.bootstrap4.min.js') }}"></script>

{{-- <script src="{{ asset('vendor/moment/moment.js') }}"></script>
<script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script> --}}

<script src="{{ asset('pages/jquery.dashboard-3.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();

		$('.alert').delay(3000).fadeOut(350);
        // $(document).ready(function() {
        //     $('#datatable2').DataTable();  
        // } );

        // //Buttons examples
        // var table = $('#datatable-buttons').DataTable({
        //     lengthChange: false,
        //     buttons: ['copy', 'excel', 'pdf', 'colvis']
        // });

        // table.buttons().container()
        //     .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );
</script>