<div class="row">
    <div class="col-lg-12">
        @if ($message = Session::get('sukses'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="card">

            <div class="card-body">
                <div class="float-sm-left m-3 m-3">
                    <h4 class="page-title">Data Mutasi Barang <strong style="color: rgb(223, 8, 8)">Cabang : {{$lokasi[0]->nama_cabang}}</strong></h4>
                </div>
                <div class="float-sm-right m-3 m-3">
                    <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal" data-target="#tambahdatabaru">
                    <i class="fa fa-plus mr-1"></i> Tambah Data
                    </button>
                    <button type="button" class="btn-primary waves-effect waves-light" >
                    <i class="fa fa-print mr-1"></i> Print
                    </button>
                </div>
             
                <div class="table-responsive" id="showdatamutasi">
                    <table id="default-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Mutasi</th>
                                <th>Tanggal Buat</th>
                                <th>Pembuat Mutasi</th>
                                <th>Jenis Mutasi</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->kd_mutasi }}</td>
                                    <td>{{ $data->tanggal_buat }}</td>
                                    <td>{{ $data->penanggung_jawab }}</td>
                                    @if ($data->jenis_mutasi == 1)
                                        <td>Penempatan</td>
                                    @elseif($data->jenis_mutasi == 2)
                                        <td>Penarikan</td>
                                    @elseif($data->jenis_mutasi == 3)
                                        <td>Mutasi Antar Bagian</td>
                                    @elseif($data->jenis_mutasi == 4)
                                        <td>Mutasi Antar Cabang</td>
                                    @endif

                                    @if ($data->ket == 1)
                                        <td class="text-center"><button class="btn btn-info btn-sm" disabled><i
                                                    class="fa fa-spinner"> </i> Prosess</button></td>
                                    @elseif($data->ket == 2)
                                        <td class="text-center"><button class="btn btn-info btn-sm" disabled><i
                                                    class="fa fa-spinner"> </i> Menunggu Perstujuan</button></td>
                                    @else
                                    @endif
                                    <td class="text-center"><button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#showmodalmutasi" id="tambahbarangbarux"
                                            data-url="{{ url('master/datamutasi/tampilformmuitasi', ['id' => $data->id_mutasi]) }}"><i
                                                class="fa fa-pencil"> </i> Lengkapi Data</button></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahdatabaru">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content animated fadeInUp ">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-data-mutasi" name="importform" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">No Kode Mutasi</label>
                            <input type="text" class="form-control" name="no_mutasi">
                        </div>
                        <div class="col-md-6">
                            <label for="">Jenis Mutasi</label>
                            <select class="form-control single-selectkode" name="jenis_mutasi" id="greet1x"
                                onchange="getOption1x()">
                                <option value="">Pilih Jenis Mutasi</option>
                                <option value="1">Penempatan</option>
                                <option value="2">Penarikan</option>
                                <option value="3">Mutasi Antar Bagian</option>
                                <option value="4">Mutasi Antar Cabang</option>
                            </select>
                        </div>

                        <div class="col-md-12" id="jenis_mutasi">

                        </div>


                        <div class="col-md-6">
                            <label for="">Departemen</label>
                            <input type="text" class="form-control" name="departemen" id="departemen">
                        </div>
                        <div class="col-md-6">
                            <label for="">Divisi</label>
                            <input type="text" class="form-control" name="divisi" id="divisi">
                        </div>
                        <div class="col-md-6">
                            <label for="">Penanggung Jawab</label>
                            <input type="text" class="form-control" name="pj" id="pj">
                        </div>
                        <div class="col-md-6">
                            <label for="">Penerima</label>
                            <input type="text" class="form-control" name="penerima" id="penerima">
                        </div>
                        <div class="col-md-6">
                            <label for="">Menyetujui</label>
                            <input type="text" class="form-control" name="menyetujui" id="menyetujui">
                        </div>
                        <div class="col-md-6">
                            <label for="">Yang Menyerahkan</label>
                            <input type="text" class="form-control" name="ym" id="ym">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Tutup</button>
                <button type="button" class="btn btn-success" id="show-data-mutasi"
                    data-url="{{ route('inputdatamutasibaru', []) }}"><i class="fa fa-check-square-o"></i> Buat
                    Data</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="showmodalmutasi">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content animated fadeInUp modal-xl">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="tampildatabaru">

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
