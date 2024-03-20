@push('css_link')
    <link rel="stylesheet" href="{{ asset('plugins/datatable/datatables.min.css') }}">
@endpush
@push('css')
    <style>
        .datatable{
            width: 100% !important;
        }
    </style>
@endpush

@push('js_link')
    <script src="{{ asset('plugins/datatable/datatables.min.js') }}"></script>
@endpush


@push('js')
  <script>
    $(document).ready(function() {
      $('.datatable').each(function() {
        var columnsToShow =  {!! json_encode($columns_to_show ?? []) !!};
        var order =  {!! json_encode($order ?? 'asc') !!};
        $(this).DataTable({
            dom: 'Bfrtip',
            responsive:true,
            iDisplayLength: 10,
            order: [[0, order]],
            buttons: [{
                    extend: 'pdfHtml5',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'A4',
                    exportOptions: {
                        columns: columnsToShow,
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: columnsToShow,
                    }
                },  'excel', 'csv', 'pageLength',
            ]
        });
      });
    });
  </script>
@endpush
