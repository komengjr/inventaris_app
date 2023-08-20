<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Form Mutasi <span style="color: royalblue;"> Nomor tiket : </span> </h6>
        <input type="text" id="id_mutasi" value="{{$data->kd_mutasi}}" hidden>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <div class="row pb-3">
            <div class="col-12">
                <label for="">Jenis Mutasi</label>
                @if ($data->jenis_mutasi == 1)
                <input type="text" class="form-control" value="Penempatan" disabled>
                @elseif($data->jenis_mutasi == 2)
                <input type="text" class="form-control" value="Penarikan" disabled>
                @elseif($data->jenis_mutasi == 3)
                <input type="text" class="form-control" value="Mutasi Antar Cabang" disabled>
                @endif

            </div>
            @php
                $cabangasal = DB::table('tbl_cabang')->select('nama_cabang')->where('kd_cabang',$data->jenis_mutasi)
            @endphp
            <div class="col-6">
                <label for="">Asal Lokasi Barang</label>
                <input type="text" class="form-control" >
            </div>
            <div class="col-6">
                <label for="">Lokasi Penempatan</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-6">
                <label for="">Departemen</label>
                <input type="text" class="form-control" value="{{$data->departemen}}">
            </div>
            <div class="col-6">
                <label for="">Divisi</label>
                <input type="text" class="form-control" value="{{$data->divisi}}">
            </div>
            <div class="col-6">
                <label for="">Penanggung Jawab</label>
                <input type="text" class="form-control" value="{{$data->penanggung_jawab}}">
            </div>
            <div class="col-6">
                <label for="">Tanggal Order</label>
                <input type="text" class="form-control" value="{{$data->tanggal_buat}}">
            </div>
            <hr>
            <div class="col-12 pt-5">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan ID Inventaris" id="idinventarismutasi" onkeydown="caribarangmutasi(this)">

                </div>
            </div>

        </div>

    </div>
    <div class="pb-3" id="showmenumutasi"></div>
    <div id="tablemenudatamutasi" class="pb-3">
        <table class="table styled-table align-items-center table-flush pb-2 " id="data-table97">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>No Inventaris</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
            @foreach ($datamutasi as $datamutasi)
            @php
                $dataintentaris = DB::table('sub_tbl_inventory')->where('id_inventaris',$datamutasi->id_inventaris)->first();
            @endphp
                <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dataintentaris->nama_barang}}</td>
                        <td>{{$dataintentaris->no_inventaris}}</td>
                        <td>{{$dataintentaris->merk}}</td>
                        <td>{{$dataintentaris->type}}</td>
                        <td>{{$dataintentaris->harga_perolehan}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-dark btn-sm waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </button>
                            <div class="dropdown-menu">
                                <a href="javaScript:void();" class="dropdown-item" id="buttoneditbarangmutasi" data-url="{{ url('divisi/datamutasi/editdatamutasi', ['id'=>$datamutasi->id_sub_mutasi]) }}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                <div class="dropdown-divider"></div>
                                <a href="javaScript:void();" class="dropdown-item" id="buttonhapusdatabarangmutasi" data-id="{{$datamutasi->id_sub_mutasi}}" data-kode="{{$datamutasi->kd_mutasi}}"><i class="fa fa-trash-o"></i> Hapus</a>
                            </div>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="modal-footer pt-3">
        <button type="button" class="btn-info" id="buttonrefreshtablemutasi" data-url="{{ url('divisi/datamutasi/datatable', ['id'=>$data->kd_mutasi]) }}"><i class="fa fa-refresh"></i></button>
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
        <button onclick="window.open('{{ url('divisi/datamutasi/print/datamutasi', ['id'=>123]) }}', '', 'width=1200, height=700');"class="btn-info"
        id="" data-url="asdasd"><i class="fa fa-print"></i> Cetak / Print</button>
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
