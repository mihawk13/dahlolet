<!-- jQuery  -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/waves.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/moment/moment.js') }}"></script>

<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Datatable Export Button -->
<script src="{{ asset('vendor/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>


@yield('script')

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('script-bottom')

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();

        $('#file_export').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                footer: true
            },
            {
                extend: 'print',
                footer: true
            }
            ]
        });

        $('.alert').delay(3000).fadeOut(350);

        // Select2
        $(".select2").select2();

        $('#date-range').datepicker({
          toggleActive: true,
          format: 'yyyy-mm-dd'
        });

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
