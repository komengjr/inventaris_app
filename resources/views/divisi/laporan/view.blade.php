<link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Report</h5>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body" id="show-data-laporan">
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Inventaris</th>
                    <th>Kode Lokasi</th>
                    <th>Type</th>
                    <th>Merek</th>
                    <th>Harga Perolehan</th>
                    <th>Status Barang</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->nama_barang}}</td>
                    <td>{{$data->kd_inventaris}}</td>
                    <td>{{$data->kd_lokasi}}</td>
                    <td>{{$data->type}}</td>
                    <td>{{$data->merk}}</td>
                    <td>{{$data->harga_perolehan}}</td>
                    <td>{{$data->status_barang}}</td>
                </tr>
                @endforeach
                  
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Inventaris</th>
                    <th>Kode Lokasi</th>
                    <th>Type</th>
                    <th>Merek</th>
                    <th>Harga Perolehan</th>
                    <th>Status Barang</th>
                </tr>
            </tfoot>
        </table>
        <div class="modal-footer">
            {{-- <a href="{{ url('menureport/masterlaporan/cetak-all-barang-cabang/', []) }}" class="btn-dark"><i
                    class="fa fa-times"></i> Download PDF</a>
            <button type="button" class="btn-success" id="button-print-laporan"
                data-url="{{ url('menureport/masterlaporan/cetak-all-barang-cabang/', []) }}"><i
                    class="fa fa-print"></i> PDF</button> --}}
        </div>
    </div>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>
    {{-- <script>
        $(document).on("click", "#button-print-laporan", function(e) {
            e.preventDefault();
            var url = $(this).data("url");
            $("#show-data-laporan").html(
                '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>');
            $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "html",
                })
                .done(function(data) {
                    $("#show-data-laporan").html(data);
                    $("#show-data-laporan").html('<iframe src="data:application/pdf;base64, ' + data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>');
                })
                .fail(function() {
                    $("#show-data-laporan").html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });

        });
    </script> --}}

    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>
