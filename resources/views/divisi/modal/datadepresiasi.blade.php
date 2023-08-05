<div class="row" >
    <div class="col-lg-12">
        <div class="card-body">
            <div class="table-responsive" style="letter-spacing: .0px;">
                <table id="default-datatable1" class="styled-table" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Klasifikasi Aset</th>
                        <th>Harga Perolehan</th>
                        <th>Masa Depresiasi</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->klasifikasi_aset}}</td>
                            <td>{{$data->harga_perolhean}}</td>
                            <td>{{$data->masa_depresiasi}}</td>
                        </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
        </div>
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
