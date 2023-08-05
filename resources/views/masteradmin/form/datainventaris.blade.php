<div class="row pl-3 pt-2 pb-2">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <div class="float-sm-left m-3 m-3">
                    <h4 class="page-title">Data Inventaris <strong style="color: rgb(223, 8, 8)">Cabang : {{$lokasi[0]->nama_cabang}}</strong></h4>
                </div>
                <div class="float-sm-right m-3 m-3">
                    <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal" data-target="#tambahdatabaru">
                    <i class="fa fa-plus mr-1"></i> Tambah Data
                    </button>
                    <button type="button" class="btn-primary waves-effect waves-light" >
                    <i class="fa fa-print mr-1"></i> Print
                    </button>
                    {{-- <button type="button" data-toggle="modal" data-target="#upload-detail-barang" class="btn-dark waves-effect waves-light" >
                    <i class="fa fa-upload mr-1"></i> Upload Data
                    </button> --}}
                </div>
                <div class="table-responsive" id="showdatamutasi">
                <table id="default-datatable" class="styled-table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>kode Inventaris</th>
                            <th>Kategori Barang</th>
                            <th>Nama Kelompok Barang</th>
                            {{-- <th>Jumlah Barang</th> --}}
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1;?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->no_inventaris}}</td>
                            <td>{{$item->merk}}</td>
                            <td>{{$item->type}}</td>
                            {{-- <?php

                                $jumlah = DB::table('sub_tbl_inventory')
                                ->where('kd_inventaris',$item->kd_inventaris)
                                ->where('kd_cabang',$id)
                                ->count();
                            ?>
                            <td>{{$jumlah}}</td> --}}

                            <td class="text-center"><button data-toggle="modal" data-target="#master-lihat-detail-barang" class="btn-info" id="masterlihatdatabarang" data-url="{{ route('master/datainventaris/lihatdatabarang',['id'=>$id,'kd' => $item->id_inventaris])}}"><i class="fa fa-eye"> </i> Lihat data</button></td>

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
<div class="modal fade" id="upload-detail-barang">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content animated fadeInUp">
        <div class="modal-header">
          <h5 class="modal-title">Upload Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            <form action="{{ url('master/datainventaris/simpandetailbarang', []) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <input type="file" name="file" id="file" class="form-control" required>
            <input type="text" name="kd_cabang" id="kd_cabang" value="{{$id}}" hidden>


        <div class="modal-footer">
            <button type="button" class="btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <button type="submit" class="btn-success"><i class="fa fa-check-square-o"></i> Upload Excel1</button>
        </div>
    </form>

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
