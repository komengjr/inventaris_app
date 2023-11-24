<div class="modal-header">
    <h6>Form Verifikasi Data <span style="color: royalblue;"></span> </h6>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
    <i class="fa fa-close"></i>
    </button>
</div>
<div id='menuverifikasi'>
    <div class="card-body ">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>

                {{-- <small> {{$cekdata[0]->kode_verif}}</small> --}}
            </h3>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row mt-3">
                <div class="col-lg-6">
                    <h4><img src="{{ asset('icon.png') }}" alt="" width="200"></h4>
                    <p>{{$cabang[0]->nama_cabang}}</p>
                </div>
                <div class="col-lg-6">
                    <h5 class="float-sm-right">Date : {{$cekdata->tgl_verif}}</h5>
                </div>
            </div>

            <hr>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From Stock Opname Barang Inventaris
                    <address>
                        <strong>{{$cabang[0]->nama_cabang}}</strong><br>
                        {{$cabang[0]->alamat}}<br>
                        Telepon : {{$cabang[0]->phone}}<br>

                    </address>
                </div><!-- /.col -->


            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive" >
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ruangan</th>
                                <th>Total Barang</th>
                                <th>Status Cek Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $jumlah = 0;
                            @endphp
                            @foreach ($lokasi as $lokasi)
                                <?php
                                $ceklokasix = DB::table('sub_tbl_inventory')
                                    ->select('sub_tbl_inventory.*')
                                    ->where('kd_cabang',Auth::user()->cabang)
                                    ->where('kd_lokasi', $lokasi->kd_lokasi)
                                    ->count();
                                ?>
                                @if ($ceklokasix == 0)
                                @else

                                <tr>
                                    <td data-label="No">{{$no++}}</td>
                                    <td>{{$lokasi->nama_lokasi}}
                                    @php
                                        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('kd_lokasi',$lokasi->kd_lokasi)->where('kd_cabang',Auth::user()->cabang)->first();
                                    @endphp
                                    @if ($cekruangan)
                                        <span class="badge badge-info m-1">{{$cekruangan->nomor_ruangan}}</span>
                                    @else
                                        <span class="badge badge-danger m-1">Tidak ditemukan</span>
                                    @endif
                                    </td>
                                    @php
                                        $totalbarang = DB::table('sub_tbl_inventory')
                                        ->where('kd_cabang',auth::user()->cabang)
                                        ->where('kd_lokasi',$lokasi->kd_lokasi)
                                        ->count();
                                        $jumlah = $totalbarang + $jumlah;
                                    @endphp
                                    <td><h5>{{$totalbarang}}</h5></td>
                                    @php
                                        $statusbarang = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata->kode_verif)
                                        ->where('sub_tbl_inventory.kd_lokasi',$lokasi->kd_lokasi)
                                        ->where('status_data_inventaris',0)
                                        ->count();
                                        $statusbarang1 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata->kode_verif)
                                        ->where('sub_tbl_inventory.kd_lokasi',$lokasi->kd_lokasi)
                                        ->where('status_data_inventaris',1)
                                        ->count();
                                        $statusbarang2 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata->kode_verif)
                                        ->where('sub_tbl_inventory.kd_lokasi',$lokasi->kd_lokasi)
                                        ->where('status_data_inventaris',2)
                                        ->count();
                                    @endphp
                                    <td>
                                        <table>
                                            <tr>
                                                <td>Baik</td>
                                                <td>:</td>
                                                <td> {{$statusbarang}} </td>
                                            </tr>
                                            <tr>
                                                <td>Maintenance</td>
                                                <td>:</td>
                                                <td>{{$statusbarang1}}</td>
                                            </tr>
                                            <tr>
                                                <td>Rusak</td>
                                                <td>:</td>
                                                <td>{{$statusbarang2}}</td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td>
                                        @if ($totalbarang == ($statusbarang+$statusbarang1+$statusbarang2))
                                        <button class="btn-success" disabled>Verified</button>
                                        @else
                                        <button class="btn-warning" id="verifdatainventaris" data-url="{{ url('divisi/verifikasi/lokasi', ['tiket'=>$cekdata->kode_verif,'id' => $lokasi->kd_lokasi ]) }}"><i class="fa fa-shield"></i> Verif</button>
                                        @endif

                                    </td>
                                </tr>
                                @endif
                            @endforeach


                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-lg-4 payment-icons">
                    {{-- <p class="lead">Payment Methods:</p>
                    <img src="assets/images/payment-icons/visa-dark.png" alt="Visa">
                    <img src="assets/images/payment-icons/mastro-dark.png" alt="Mastercard">
                    <img src="assets/images/payment-icons/american-dark.png" alt="American Express">
                    <img src="assets/images/payment-icons/paypal-dark.png" alt="Paypal"> --}}
                    <p class="bg-light p-2 mt-3 rounded">
                        <button class="btn-success mt-3">C</button> : Baik <br>
                        <button class="btn-warning mt-3">C</button> : kurang Baik <br>
                        <button class="btn-danger mt-3">C</button> : Rusak <br>
                    </p>
                </div><!-- /.col -->
                <div class="col-lg-8 pt-3">

                    <div class="">
                        <table class="styled-table" border="1">
                            <tbody>
                                <tr>
                                    <th>Keadaan Barang Baik</th>
                                    <td>
                                        @php
                                            $barangbaik = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif',$cekdata->kode_verif)->where('status_data_inventaris',0)->count();
                                        @endphp
                                        <h5>{{$barangbaik}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Keadaan Barang Maintenance</th>
                                    <td>
                                        @php
                                            $barangmaintenance = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif',$cekdata->kode_verif)->where('status_data_inventaris',1)->count();
                                        @endphp
                                        <h5>{{$barangmaintenance}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Keadaan Barang Rusak:</th>
                                    <td>
                                        @php
                                        $barangrusak = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif',$cekdata->kode_verif)->where('status_data_inventaris',2)->count();
                                        @endphp
                                        <h5>{{$barangrusak}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Total Belum Verifikasi :</th>
                                    <td><h5>{{$jumlah-$barangbaik-$barangmaintenance-$barangrusak}}</h5></td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Total Data Keseluruhan :</th>
                                    <td><h5>{{$jumlah}}</h5></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- this row will not appear when printing -->

            <div class="row no-print pt-5">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9">
                    <div class="float-sm-right">
                        <button class="btn-success" id="button-penyelesaian-stockopname" data-id="{{$cekdata->kode_verif}}"><i class="fa fa-save"></i> Penyelesaian & Simpan</button>
                        <button class="btn-info m-1" onclick="window.open('{{ url('divisi/verifikasi/print/verif', ['id'=>$cekdata->kode_verif]) }}', '', 'width=1200, height=700');"><i class="fa fa-print"></i> Preview PDF</button>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
<script src="{{ asset('assets/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
<script>
    $("#button-penyelesaian-stockopname").click(function() {
        swal({
            title: "Are you sure?",
            text: "Menyelesaikan Verifikasi Data Inventaris",
            icon: "success",
            buttons: true,

        }).then((willDelete) => {
            if (willDelete) {
                swal("Data Lokasi Berhasil Di Hapus", {
                    icon: "success",
                });
                var id = $(this).data("id");
                $.ajax({
                        url: '../divisipostpenyelesaian/data/stockopname/'+id,
                        type: "GET",
                        // data: data,
                        // dataType: "html",
                    })
                    .done(function(data) {
                        location.reload();
                    })
                    .fail(function() {
                        swal("Batal Menghapus");
                    });
            } else {
                swal("Batal Menghapus");
            }
        });
    });
</script>
