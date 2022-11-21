<div class="modal-header bg-success">
    <h5 class="modal-title text-white">Data Lokasi</h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="divtablelokasi">
    <div class="card-body pb-2" id="diveditlokasi">  
    </div>
    <div class="card-body pt-2" >
        <table class="styled-table" id="default-datatable">
            <thead>
                <th>No</th>
                <th>Kode Lokasi</th>
                <th>Nama Lokasi</th>
                <th class="text-center"><button class="btn-success" id="tambahdatalokasi" data-url="{{ url('master/datalokasi/tambah', []) }}"><i class="fa fa-plus"></i> tambah</button></th>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->kd_lokasi}}</td>
                        <td>{{$data->nama_lokasi}}</td>
                        <td class="text-center">
                            <button class="btn-warning" id="editdatalokasi" data-url="{{ url('master/datalokasi/edit', ['id'=>$data->kd_lokasi]) }}"><i class="fa fa-pencil"></i> edit</button>
                            {{-- <a href="{{ url('master/datalokasi/hapusdata', ['id',$data->kd_lokasi]) }}" class="btn-danger"><i class="fa fa-trash"></i> Hapus</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
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