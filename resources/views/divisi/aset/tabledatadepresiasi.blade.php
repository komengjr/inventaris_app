<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>TABEL DEPRESIASI ASET <span style="color: royalblue;"> Lampiran SE Direksi No. 083/DIR-KEU/II/2023 </span> </h6>
        <span>
            <button class="btn-success" id="buttonpenambahandatadepresiasi"><i class="fa fa-plus" ></i> penambahan data depresiasi</button>
            <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>
        </span>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <div class="modal-body" id="showmenuddatadepresiasi">
        <div class="row" >
            <div class="col-lg-12">

                    <div class="table-responsive" style="letter-spacing: .0px;">
                        <table id="default-datatable1" class="styled-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Klasifikasi Barang</th>
                                    <th>Klasifikasi Aset</th>
                                    <th>Harga Perolehan</th>
                                    <th>Masa Depresiasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->klasifikasi_aset }}</td>
                                        <td>{{ $data->klasifikasi_aset }}</td>
                                        <td>{{ $data->harga_perolhean }}</td>
                                        <td>{{ $data->masa_depresiasi }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu">
                                              <a href="javaScript:void();" class="dropdown-item" ><i class="fa fa-pencil-square-o"></i> Edit</a>
                                              <div class="dropdown-divider"></div>
                                              <a href="javaScript:void();" class="dropdown-item" ><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

            </div>
        </div>
    </div>



    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
