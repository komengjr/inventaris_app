<div class="table-responsive" id="showdatamutasi">
    <table id="default-datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Mutasi</th>
                <th>Tanggal Buat</th>                  
                <th>Pembuat Mutasi</th>
                <th class="text-center">Action</th>
            
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($data as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->kd_mutasi}}</td>
                    <td>{{$data->tanggal_buat}}</td>
                    <td>{{$data->penanggung_jawab}}</td>
                    <td><button class="btn btn-warning btn-sm"><i class="fa fa-eye">Lengkapi</i></button></td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
<script>
    $(document).ready(function() {
    //Default data table
    $('#default-datatable').DataTable();


    var table = $('#example').DataTable( {
    lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
    } );

    table.buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    
    } );

</script>