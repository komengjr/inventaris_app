<style>
    @media only screen and  (max-width: 800px) {
        td, tr { display: block; }
        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        tr { border: 1px solid #000000; }
        tr + tr { margin-top: 1.5em; }
        td {
        /* make like a "row" */
            border: 5px;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 10%;
            padding-right: 10%;
            padding-top : 10px;
            padding-bottom : 10px;
            /* background-color: #dcede4; */
            text-align: left;
        }
        td:before {
            content: attr(data-label);
            display: inline-block;
            font-family: 'Orbitron', sans-serif;
            padding-left: 4px;
            line-height: 2.5;
            margin-left: -100%;
            width: 100%;
            white-space: nowrap;
        }
    }
    .styled-table {
        /* position: static; */
        border-collapse: collapse;
        margin: 0px 0;
        font-size: 0.9em;
        color: #000000;
        width: 100%;
        /* min-width: 400px; */
        box-shadow: 0 0 20px rgba(217, 211, 211, 0.15);
        
    }
    .styled-table thead tr {
        background-color: #f58506;
        color: #ffffff;
        text-align: left;
    }
    
    @media only screen and  (min-width: 760px) {
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
    }
    
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #030303;
    }
    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #020202;
    }
</style>
<script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
<script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>
<script type="text/javascript">
    function submitForm()
    {
    document.form1.target = "myActionWin";
    window.open("","myActionWin","width=1000,height=700,toolbar=0");
    document.form1.submit();
    }
    </script>
<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        
        <button class="btn-success"  data-url=""><i class="fa fa-plus"> </i>  Cerate Nomor Asset</button>
        <span >
            {{-- <button  type="button" class="btn-outline-primary" data-toggle="modal" data-target="#printdata"><i class="fa fa-print"> </i> Print Barcode</button> --}}
            <button type="button" class="btn-danger " data-dismiss="modal" aria-label="Close" >
                <i class="fa fa-close"></i>
            </button>
        </span>
    </div>
    <div class="body" id="showdatabarang">
        <div class="row" >
            <div class="col-lg-12">     
                <div class="card-body">
                    <div class="table-responsive" style="letter-spacing: .0px;">
                        <table id="default-datatable1" class="styled-table" >
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Kode Inventaris</th>
                                <th>Lokasi</th> 
                                <th>Nama Barang</th>
                                <th>Status</th>
                                <th>Qr Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print Barcode</button> --}}
    </div>
</div>

<script>
    $(document).ready(function() {
    //Default data table
    $('#default-datatable1').DataTable();


    var table = $('#example').DataTable( {
    lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
    } );

    table.buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    
    } );

</script>
