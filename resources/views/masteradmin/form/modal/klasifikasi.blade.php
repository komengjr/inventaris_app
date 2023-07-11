<div class="modal-header bg-success">
    <h5 class="modal-title text-white">Data Klasifikasi</h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="divmodalklasifikasi">
    <div class="card-body" id="diveditklasifikasi">

    </div>
    <div class="modal-body pt-2">
        <table class="styled-table" id="default-datatable">
            <thead>
                <th>No</th>
                <th>Kode Klasifikasi</th>
                <th>Nama Klasifikasi</th>
                <th class="text-center" style="width: 100px;"><button class="btn-success" id="tambahdataklasifikasi" data-url="{{ url('master/dataklasifikasi/tambah', []) }}"><i class="fa fa-plus"></i> tambah</button></th>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->kd_inventaris}}</td>
                        <td>{{$data->nama_barang}}</td>
                        <td class="text-center">
                            <button class="btn-warning m-1" id="editdataklasifikasi" data-url="{{ url('master/dataklasifikasi/edit', ['id'=>$data->id]) }}"><i class="fa fa-pencil"></i> edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" id="simpanhapusdatauser" data-url="{{ url('master/datauser/proses/hapus', []) }}"><i class="fa fa-trash"></i> Hapus Data</button> --}}
</div>
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
