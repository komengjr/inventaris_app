<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Form Mutasi <span style="color: royalblue;"> Data Excel Cabang</span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <table class="styled-table align-items-center table-flush pb-2 " id="data-table97">
            <thead>
                <tr>
                    <th style="widows: 2px;">No</th>
                    <th>Nama Barang</th>
                    <th>Kode Klasifikasi</th>
                    <th>Kode Lokasi</th>
                    <th>Tanggal Pembelian</th>
                    <th>Harga</th>
                    <th>Action</th>
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
                        <td>{{$data->tgl_beli}}</td>
                        <td>{{$data->harga_perolehan}}</td>
                        <td><button class="btn-warning"><i class="fa fa-pencil"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal-footer pt-3">

        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}

    </div>
</div>
<script>
    $('#data-table97').DataTable();
</script>
<script>
    $(document).ready(function() {
        $('.single-select').select2();

      });
      function caribarangmutasi(ele) {
        if(event.key === 'Enter') {
            var id = document.getElementById('idinventarismutasi').value;
            var id_mutasi = document.getElementById('id_mutasi').value;
                        $.ajax({
                                url: '../divisi/datamutasi/caridata/'+id+'/'+id_mutasi,
                                type: 'GET',
                                dataType: 'html'
                            })
                            .done(function(data) {
                                document.getElementById('idinventarismutasi').value = "";
                                $('#showmenumutasi').html(data);
                            })
                            .fail(function() {
                                $('#showmenumutasi').html(
                                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                                    );
                            });

        }
    }

</script>
