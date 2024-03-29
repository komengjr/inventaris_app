<link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Report</h5>
        <span>
            <button class="btn-warning" id="button-download-excel-inventaris"><i class="fa fa-download"></i> Download
                Excel</button>
            <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </span>
    </div>
    <div class="modal-body" id="show-data-laporan">
        <div class="table-responsive pb-3">
            <table id="example" class="table styled-table">
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
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->kd_inventaris }}</td>
                            <td>{{ $data->kd_lokasi }}</td>
                            <td>{{ $data->type }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>{{ $data->harga_perolehan }}</td>
                            <td>{{ $data->status_barang }}</td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="modal-footer">
            {{-- <a href="{{ url('menureport/masterlaporan/cetak-all-barang-cabang/', []) }}" class="btn-dark"><i
                    class="fa fa-times"></i> Download PDF</a>
            <button type="button" class="btn-success" id="button-print-laporan"
                data-url="{{ url('menureport/masterlaporan/cetak-all-barang-cabang/', []) }}"><i
                    class="fa fa-print"></i> PDF</button> --}}
        </div>
    </div>
    <a href="{{ url('export-data', []) }}" style="display: none;" id="button-download"></a>
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
                //buttons: ['excel']
                // buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>
    <script>
        $(document).on("click", "#button-download-excel-inventaris", function(e) {
            e.preventDefault();
            $("#show-data-laporan").html('<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>');
            $.ajax({
                    url: '../../export-data',
                    type: "GET",
                    dataType: "html",
                })
                .done(function(data) {
                    document.getElementById("button-download").click();
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        icon: 'fa fa-info-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'center top',
                        showClass: 'bounceIn',
                        hideClass: 'bounceOut',
                        sound: false,
                        width: 400,
                        msg: 'Berhasil Download'
                    });
                    $("#show-data-laporan").html('<span class="badge badge-success shadow-success m-1">Downloaded</span>');
                })
                .fail(function() {
                    Lobibox.notify('error', {
                        pauseDelayOnHover: true,
                        icon: 'fa fa-info-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'center top',
                        showClass: 'bounceIn',
                        hideClass: 'bounceOut',
                        sound: false,
                        width: 400,
                        msg: 'Hubungi Administrator Jika terjadi Eror'
                    });
                });
        });
    </script>
