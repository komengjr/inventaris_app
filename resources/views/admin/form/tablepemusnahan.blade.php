<div class="table-responsive" id="showdatamusnah">
    <table id="default-datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Mutasi</th>
                <th>Tanggal Buat</th>                  
                <th>Penggagas</th>
                <th>Spv SDM & Umum</th>
                <th>Persetujuan</th>
                <th class="text-center">Action</th>
            
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $data)
            <tr>
                <td>1</td>
                <td>{{$data->no_surat}}</td>
                <td>{{$data->tgl_buat}}</td>
                <td>{{$data->penggagas}}</td>
                <td>{{$data->user_verifikasi}}</td>
                <td>{{$data->user_persetujuan}}</td>
                <td class="text-center"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambahbarangbaru" id="tambahbarangbarux" data-url="{{ route('tampilformmuitasi',['id' => $data->id_musnah])}}"><i class="fa fa-pencil"> Input Barang</i></button></td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();


      

    });
</script>