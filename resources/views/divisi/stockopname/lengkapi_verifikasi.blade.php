<div class="modal-header">
    <h6>Form Verifikasi Data <span style="color: royalblue;"></span> </h6>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
    <i class="fa fa-close"></i>
    </button>
</div>
<div id='menuverifikasi'>
    <div class="card-body " id="menu-form-verifikasi-data-stockopname">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>

                {{-- <small> {{$cekdata[0]->kode_verif}}</small> --}}
            </h3>
        </section>
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4 col-lg-6 col-xl-4">
                            <img src="{{ asset('vendor/pramita.png') }}" alt="" srcset="" width="100" style="width: 70%; height: auto;">
                        </div>
                        <div class="col-4 col-lg-6 col-xl-4">
                            <img src="{{ asset('vendor/sima.jpeg') }}" alt="" srcset="" width="100" style="width: 70%; height: auto;">
                        </div>
                        <div class="col-4 col-lg-6 col-xl-4">
                            <img src="{{ asset('vendor/prospek.png') }}" alt="" srcset="" width="100" style="width: 70%; height: auto;">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- <h5 class="float-sm-right">Date : {{$cekdata->tgl_verif}}</h5> --}}
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
                        kode : {{$id}}
                    </address>
                </div>
                <div class="col-sm-8 invoice-col p-1" style="text-align: right;">
                    <button class="btn btn-secondary btn-round waves-effect waves-light m-2" id="verifdatainventaris" data-url="{{ url('divisi/verifikasi/lokasi', ['tiket'=>$cekdata->kode_verif ]) }}"><i class="fa fa-shield"></i> Verif Menggunakan Kamera</button>
                    <button class="btn btn-secondary btn-round waves-effect waves-light m-2" id="button-scanner-verifdatainventaris" data-url="{{ url('divisi/verifikasi/scanner', ['tiket'=>$cekdata->kode_verif ]) }}"><i class="fa fa-shield"></i> Verif Menggunakan Scanner</button>
                </div><!-- /.col -->


            </div><!-- /.row -->
            <div id="view-report-stokopname-ruangan"></div>
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive" >
                    <table id="default-datatable-unverified" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Ruangan ( Nama Ruangan )</th>
                                <th>Total Barang</th>
                                <th>Status Cek Barang</th>
                                <th>Total Verifikasi</th>
                                <th>Status Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $jumlah = 0;
                            @endphp
                            @foreach ($no_ruangan as $no_ruangan)
                                <?php
                                $ceklokasix = DB::table('sub_tbl_inventory')
                                    ->select('sub_tbl_inventory.*')
                                    ->where('kd_cabang',Auth::user()->cabang)
                                    ->where('id_nomor_ruangan_cbaang', $no_ruangan->id_nomor_ruangan_cbaang)
                                    ->where('status_barang','<','4')
                                    ->count();
                                ?>
                                @if ($ceklokasix == 0)
                                @else

                                <tr>
                                    <td data-label="No">{{$no++}}</td>
                                    <td>{{$no_ruangan->nomor_ruangan}}
                                        @php
                                            $nama_lokasi = DB::table('tbl_lokasi')->select('nama_lokasi')->where('kd_lokasi',$no_ruangan->kd_lokasi)->first();
                                        @endphp
                                        <span class="badge badge-secondary m-1">{{$nama_lokasi->nama_lokasi}}</span>

                                    </td>
                                    @php
                                        $totalbarang = DB::table('sub_tbl_inventory')
                                        ->where('kd_cabang',auth::user()->cabang)
                                        ->where('id_nomor_ruangan_cbaang',$no_ruangan->id_nomor_ruangan_cbaang)
                                        ->where('status_barang','<','4')
                                        ->count();
                                        $jumlah = $totalbarang + $jumlah;
                                    @endphp
                                    <td><h5>{{$totalbarang}}</h5></td>
                                    @php
                                        $statusbarang = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata->kode_verif)
                                        ->where('id_nomor_ruangan_cbaang',$no_ruangan->id_nomor_ruangan_cbaang)
                                        ->where('status_data_inventaris',0)
                                        ->count();
                                        $statusbarang1 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata->kode_verif)
                                        ->where('id_nomor_ruangan_cbaang',$no_ruangan->id_nomor_ruangan_cbaang)
                                        ->where('status_data_inventaris',1)
                                        ->count();
                                        $statusbarang2 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata->kode_verif)
                                        ->where('id_nomor_ruangan_cbaang',$no_ruangan->id_nomor_ruangan_cbaang)
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
                                    <td><h5>{{$statusbarang+$statusbarang1+$statusbarang2}}</h5></td>
                                    <td>
                                        @if ($totalbarang == ($statusbarang+$statusbarang1+$statusbarang2))
                                        <button class="btn-success" id="button-print-stockopname-ruangan" data-id="{{$id}}" data-lokasi="{{$no_ruangan->id_nomor_ruangan_cbaang}}"><i class="fa fa-print"></i> Verified + Cetak</button>
                                        @else
                                        <button class="btn-danger" disabled>Unverified</button>
                                        @endif

                                    </td>
                                </tr>
                                @endif
                            @endforeach


                        </tbody>
                    </table>
                    {{-- <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ruangan</th>
                                <th>Total Barang</th>
                                <th>Status Cek Barang</th>
                                <th>Total Verifikasi</th>
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
                                    <td><h5>{{$statusbarang+$statusbarang1+$statusbarang2}}</h5></td>
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
                    </table> --}}
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
                        @if (Auth::user()->cabang == 'PA')
                        <form action="{{ url('divisi/postverifikasiall/datasemua/simpandata', []) }}" method="post">
                            @csrf
                            <input type="text" name="kode" id="" value="{{$cekdata->kode_verif}}">
                            <button type="submit" class="btn-success">Eksekusi</button>
                        </form>
                        @endif
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
                                    <td><h5 style="cursor: pointer; color: rgb(255, 0, 0);" id="btn-show-data-belum-verif" data-id="{{$cekdata->kode_verif}}">{{$jumlah-$barangbaik-$barangmaintenance-$barangrusak}}</h5> </td>
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

                        {{-- @if (54 == $jumlah) --}}
                        @if (($barangbaik+$barangmaintenance+$barangrusak) == $jumlah)
                        <button class="btn-success" id="button-penyelesaian-stockopname" data-id="{{$cekdata->kode_verif}}"><i class="fa fa-save"></i> Penyelesaian & Simpan</button>
                        @else
                        <button class="btn-success" id="button-fix-data-stockopname" data-id="{{$id}}"><i class="fa fa-shield"></i> Fix Data</button>
                        <button class="btn-danger" disabled><i class="fa fa-info"></i> Belum Selesai</button>
                        @endif

                        {{-- <button class="btn-info m-1" onclick="window.open('{{ url('divisi/verifikasi/print/verif', ['id'=>$cekdata->kode_verif]) }}', '', 'width=1200, height=700');"><i class="fa fa-print"></i> Preview PDF</button> --}}
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
<script>
    $(document).ready(function() {
        $('#default-datatable-unverified').DataTable();
    });
</script>
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
                swal("Data Berhasil Di Update", {
                    icon: "success",
                });
                var id = $(this).data("id");
                $.ajax({
                        url: '../../divisipostpenyelesaian/data/stockopname/'+id,
                        type: "GET",
                        // data: data,
                        // dataType: "html",
                    })
                    .done(function(data) {
                        location.reload();
                    })
                    .fail(function() {
                        swal("gagal");
                    });
            } else {
                swal("Batal Setuju");
            }
        });
    });
</script>
