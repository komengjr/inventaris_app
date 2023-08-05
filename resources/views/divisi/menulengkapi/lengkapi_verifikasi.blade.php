<div class="card" id='menuverifikasi'>
    <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>
                STOCK OPNAME BARANG INVENTARIS
                {{-- <small> {{$cekdata[0]->kode_verif}}</small> --}}
            </h3>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row mt-3">
                <div class="col-lg-6">
                    <h4><i class="fa fa-globe"></i> Laboratorium Pramita</h4>
                </div>
                <div class="col-lg-6">
                    <h5 class="float-sm-right">Date: 2/10/2014</h5>
                </div>
            </div>

            <hr>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>{{$cabang[0]->nama_cabang}}</strong><br>
                        {{$cabang[0]->alamat}}<br>
                        Phone: {{$cabang[0]->phone}}<br>
                        Email: info@example.com
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
                                    ->where('kd_cabang', auth::user()->cabang)
                                    ->where('kd_lokasi', $lokasi->kd_lokasi)
                                    ->count();
                                ?>
                                @if ($ceklokasix == 0)
                                @else

                                <tr>
                                    <td data-label="No">{{$no++}}</td>
                                    <td>{{$lokasi->nama_lokasi}}</td>
                                    @php
                                        $totalbarang = DB::table('sub_tbl_inventory')
                                        ->where('kd_cabang',auth::user()->cabang)
                                        ->where('kd_lokasi',$lokasi->kd_lokasi)
                                        ->count();
                                        $jumlah = $totalbarang + $jumlah;
                                    @endphp
                                    <td>{{$totalbarang}}</td>
                                    @php
                                        $statusbarang = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata[0]->kode_verif)
                                        ->where('sub_tbl_inventory.kd_lokasi',$lokasi->kd_lokasi)
                                        ->where('status_data_inventaris',0)
                                        ->count();
                                        $statusbarang1 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata[0]->kode_verif)
                                        ->where('sub_tbl_inventory.kd_lokasi',$lokasi->kd_lokasi)
                                        ->where('status_data_inventaris',1)
                                        ->count();
                                        $statusbarang2 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
                                        ->where('tbl_sub_verifdatainventaris.kode_verif',$cekdata[0]->kode_verif)
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
                                    <td><button class="btn-warning" id="verifdatainventaris" data-url="{{ url('divisi/verifikasi/lokasi', ['tiket'=>$cekdata[0]->kode_verif,'id' => $lokasi->kd_lokasi ]) }}">Verif</button></td>
                                </tr>
                                @endif
                            @endforeach


                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-lg-6 payment-icons">
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
                <div class="col-lg-6 pt-5" >

                    <div class="table-responsive">
                        <table class="table" >
                            <tbody>
                                <tr>
                                    <th style="width:50%">Total Data Keseluruhan :</th>
                                    <td>{{$jumlah}}</td>
                                </tr>
                                <tr>
                                    <th>Keadaan Barang Baik</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>Keadaan Barang Rusak:</th>
                                    <td>0</td>
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
                        <button class="btn-success m-1" onclick="window.open('{{ url('divisi/verifikasi/print/verif', ['id'=>$cekdata[0]->kode_verif]) }}', '', 'width=1200, height=700');"><i class="fa fa-print"></i> Submit Penyelesaian & Generate PDF</button>
                        {{-- <button class="btn btn-primary m-1"><i class="fa fa-download"></i> Generate PDF</button> --}}
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
</div>
