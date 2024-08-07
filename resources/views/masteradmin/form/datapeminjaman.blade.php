<div class="row pl-3 pt-2 pb-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row pl-3 pt-2 pb-2">
                    <div class="col-6 ">
                        <h5><strong>Form Peminjaman :: Cabang </strong></h5>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showdatamutasi">
                <table id="default-datatable" class="styled-table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tiket Peminjaman</th>
                            <th>Tujuan Peminjaman</th>
                            <th>Penanggung jawab</th>
                            <th>Tanggal Peminjaman</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($data as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->tiket_peminjaman}}</td>
                                <td>{{$data->nama_kegiatan}}</td>
                                <td>{{$data->pj_pinjam}}</td>
                                <td>{{$data->tgl_pinjam}}</td>
                                <td><button class="btn-info"><i class="fa fa-eye"></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="master-lihat-detail-barang">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
        <div class="modal-content">
         <div id="showdatabarangx">
            <div class="modal-body">
            </div>
            </div>
        </div>
      </div>
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
