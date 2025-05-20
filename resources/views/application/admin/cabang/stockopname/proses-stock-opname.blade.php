<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Detail Data Stock Opname </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div id="form-data-stock">
        <div class="p-4">
            <div class="row mb-3">
                <div class="col">
                    <div class="card bg-100 shadow-none border border-primary">
                        <div class="row gx-0 flex-between-center">
                            <div class="col-sm-auto d-flex align-items-center border-bottom">
                                <img class="ms-3 mx-3" src="{{ asset('img/icon/icon.png') }}" alt=""
                                    width="50" />
                                <div>
                                    <h6 class="text-primary fs-1 mb-0 mt-2"> {{ $cabang[0]->nama_cabang }}</h6>
                                    <h6 class="text-primary fs--1 mb-0">Tiket Stockopname : {{ $id }}</h6>
                                    <h4 class="text-primary fw-bold mb-1">Inventaris <span
                                            class="text-info fw-medium">Management
                                            System</span></h4>
                                </div><img class="ms-n4 d-none d-lg-block"
                                    src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt=""
                                    width="150" />
                            </div>
                            <div class="col-xl-auto px-3 py-2">
                                <h6 class="text-primary fs--1 mb-1">Support By : </h6>
                                <h4 class="text-primary fw-bold mb-0">
                                    <img class="" src="{{ asset('vendor/pramita.png') }}" alt=""
                                        width="90" />
                                    <img class="ms-1" src="{{ asset('vendor/sima.jpeg') }}" alt=""
                                        width="80" />
                                    <img class="ms-1" src="{{ asset('vendor/prospek.png') }}" alt=""
                                        width="80" />
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 border bg-primary">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md d-none d-lg-block">
                            <h4 class="text-white fw-bold mb-1">Proses <span class="text-white fw-medium">Stock
                                    Opname Barang Inventaris</span></h4>
                        </div>
                        <div class="col-sm-auto d-flex align-items-center" style="justify-content: center;">
                            <button class="btn btn-falcon-warning me-2" role="button" id="button-stock-opname-kamera"
                                data-code="{{ $id }}"><span class="fas fa-camera-retro"></span>
                                Kamera</button>
                            <button class="btn btn-falcon-primary" role="button"><span class="fas fa-barcode"></span>
                                Scanner</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="view-report-stokopname-ruangan"></div>


            <table id="exampledata" class="table table-striped nowrap" style="width:100%"
                style="border: 1px solid black;">
                <thead class="bg-200 text-800">
                    <tr>
                        <th>No</th>
                        <th>No ( Nama Ruangan )</th>
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
                            ->where('kd_cabang', Auth::user()->cabang)
                            ->where('id_nomor_ruangan_cbaang', $no_ruangan->id_nomor_ruangan_cbaang)
                            ->where('status_barang', '<', '4')
                            ->count();
                        ?>
                        @if ($ceklokasix == 0)
                        @else
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="fs--2">{{ $no_ruangan->nomor_ruangan }}
                                    @php
                                        $nama_lokasi = DB::table('tbl_lokasi')
                                            ->select('nama_lokasi')
                                            ->where('kd_lokasi', $no_ruangan->kd_lokasi)
                                            ->first();
                                    @endphp
                                    {{ $nama_lokasi->nama_lokasi }}

                                </td>
                                @php
                                    $totalbarang = DB::table('sub_tbl_inventory')
                                        ->where('kd_cabang', auth::user()->cabang)
                                        ->where('id_nomor_ruangan_cbaang', $no_ruangan->id_nomor_ruangan_cbaang)
                                        ->where('status_barang', '<', '4')
                                        ->count();
                                    $jumlah = $totalbarang + $jumlah;
                                @endphp
                                <td class="text-center">
                                    {{ $totalbarang }}
                                </td>
                                @php
                                    $statusbarang = DB::table('tbl_sub_verifdatainventaris')
                                        ->join(
                                            'sub_tbl_inventory',
                                            'sub_tbl_inventory.id_inventaris',
                                            '=',
                                            'tbl_sub_verifdatainventaris.id_inventaris',
                                        )
                                        ->where('tbl_sub_verifdatainventaris.kode_verif', $cekdata->kode_verif)
                                        ->where('id_nomor_ruangan_cbaang', $no_ruangan->id_nomor_ruangan_cbaang)
                                        ->where('status_data_inventaris', 0)
                                        ->count();
                                    $statusbarang1 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join(
                                            'sub_tbl_inventory',
                                            'sub_tbl_inventory.id_inventaris',
                                            '=',
                                            'tbl_sub_verifdatainventaris.id_inventaris',
                                        )
                                        ->where('tbl_sub_verifdatainventaris.kode_verif', $cekdata->kode_verif)
                                        ->where('id_nomor_ruangan_cbaang', $no_ruangan->id_nomor_ruangan_cbaang)
                                        ->where('status_data_inventaris', 1)
                                        ->count();
                                    $statusbarang2 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join(
                                            'sub_tbl_inventory',
                                            'sub_tbl_inventory.id_inventaris',
                                            '=',
                                            'tbl_sub_verifdatainventaris.id_inventaris',
                                        )
                                        ->where('tbl_sub_verifdatainventaris.kode_verif', $cekdata->kode_verif)
                                        ->where('id_nomor_ruangan_cbaang', $no_ruangan->id_nomor_ruangan_cbaang)
                                        ->where('status_data_inventaris', 2)
                                        ->count();
                                @endphp
                                <td>
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>Baik</td>

                                            <td class="text-end"> {{ $statusbarang }} </td>
                                        </tr>
                                        <tr>
                                            <td>Maintenance</td>

                                            <td class="text-end">{{ $statusbarang1 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Rusak</td>

                                            <td class="text-end">{{ $statusbarang2 }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="text-center">
                                    {{ $statusbarang + $statusbarang1 + $statusbarang2 }}
                                </td>
                                <td>
                                    @if ($totalbarang == $statusbarang + $statusbarang1 + $statusbarang2)
                                        <button class="btn btn-falcon-success btn-sm"
                                            id="button-print-stockopname-ruangan" data-id="{{ $id }}"
                                            data-lokasi="{{ $no_ruangan->id_nomor_ruangan_cbaang }}"><i
                                                class="fa fa-print"></i> Verified + Cetak</button>
                                    @else
                                        <button class="btn btn-falcon-danger btn-sm" disabled>Unverified</button>
                                    @endif

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <div class="row g-3 mb-3 pt-2">
                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="card-header bg-primary">
                            <h5 class="mb-0 text-white">Stockopname Detail</h5>
                        </div>
                        <div class="card-body bg-light">
                            <p class="bg-light rounded">
                                @if (Auth::user()->cabang == 'PA')
                                    <form action="{{ url('divisi/postverifikasiall/datasemua/simpandata', []) }}"
                                        method="post">
                                        @csrf
                                        <input type="text" name="kode" id=""
                                            value="{{ $cekdata->kode_verif }}">
                                        <button type="submit" class="btn-success">Eksekusi</button>
                                    </form>
                                @endif
                                <button class="btn-success mt-3">C</button> : Baik <br>
                                <button class="btn-warning mt-3">C</button> : kurang Baik <br>
                                <button class="btn-danger mt-3">C</button> : Rusak <br>
                            </p>
                            {{-- <div class="row gx-3 mb-3">
                                <div class="col">
                                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                        for="cardNumber">Card Number</label>
                                    <input class="form-control" id="cardNumber" placeholder="XXXX XXXX XXXX XXXX"
                                        type="text">
                                </div>
                                <div class="col">
                                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                        for="cardName">Name of Card</label>
                                    <input class="form-control" id="cardName" placeholder="John Doe" type="text">
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-6 col-sm-3">
                                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                        for="inputCountry">Country</label>
                                    <input class="form-select mb-3" id="inputCountry" aria-label="customSelectCountry"
                                        list="country-list" placeholder="Country">
                                    <datalist class="scrollbar" id="country-list">
                                        <option>Afghanistan</option>

                                    </datalist>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                        for="zipCode">Zip Code</label>
                                    <input class="form-control" id="zipCode" placeholder="1234" type="text">
                                </div>
                                <div class="col-6 col-sm-3">
                                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                        for="expDate">Exp Date</label>
                                    <input class="form-control" id="expDate" placeholder="15/2024" type="text">
                                </div>
                                <div class="col-6 col-sm-3">
                                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                        for="cvv">CVV<span class="ms-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title=""
                                            data-bs-original-title="Card verification value"
                                            aria-label="Card verification value"><svg
                                                class="svg-inline--fa fa-question-circle fa-w-16" aria-hidden="true"
                                                focusable="false" data-prefix="fa" data-icon="question-circle"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z">
                                                </path>
                                            </svg><!-- <span class="fa fa-question-circle"></span> Font Awesome fontawesome.com --></span></label>
                                    <input class="form-control" id="cvv" placeholder="123" maxlength="3"
                                        pattern="[0-9]{3}" type="text">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header bg-primary">
                            <h5 class="mb-0 text-white">Status Jumlah Barang</h5>
                        </div>
                        <div class="card-body bg-light">
                            <div class="d-flex justify-content-between fs--1 mb-1">
                                <h6 class="mb-0">Keadaan Baik</h6>
                                <span>
                                    @php
                                        $barangbaik = DB::table('tbl_sub_verifdatainventaris')
                                            ->where('kode_verif', $cekdata->kode_verif)
                                            ->where('status_data_inventaris', 0)
                                            ->count();
                                    @endphp
                                    <h5>{{ $barangbaik }}</h5>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between fs--1 mb-1">
                                <h6 class="mb-0">Keadaan Maintenance</h6>
                                <span>
                                    @php
                                        $barangmaintenance = DB::table('tbl_sub_verifdatainventaris')
                                            ->where('kode_verif', $cekdata->kode_verif)
                                            ->where('status_data_inventaris', 1)
                                            ->count();
                                    @endphp
                                    <h5>{{ $barangmaintenance }}</h5>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between fs--1 mb-1">
                                <h6 class="mb-0">Keadaan Maintenance</h6>
                                <span>
                                    @php
                                        $barangrusak = DB::table('tbl_sub_verifdatainventaris')
                                            ->where('kode_verif', $cekdata->kode_verif)
                                            ->where('status_data_inventaris', 2)
                                            ->count();
                                    @endphp
                                    <h5>{{ $barangrusak }}</h5>
                                </span>
                            </div>


                            <div class="d-flex justify-content-between fs--1 mb-1 text-success">
                                <p class="mb-0">Total Belum Verifikasi :</p>
                                <span>
                                    <h5 style="cursor: pointer; color: rgb(255, 0, 0);" id="btn-show-data-belum-verif"
                                        data-id="{{ $cekdata->kode_verif }}">
                                        {{ $jumlah - $barangbaik - $barangmaintenance - $barangrusak }}</h5>
                                </span>
                            </div>
                            <hr>
                            <h5 class="d-flex justify-content-between"><span>Total Data
                                    Keseluruhan</span><span>{{ $jumlah }}</span></h5>
                            <p class="fs--1 text-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            @if ($barangbaik + $barangmaintenance + $barangrusak == $jumlah)
                                <button class="btn btn-falcon-success" id="button-penyelesaian-stockopname"
                                    data-id="{{ $cekdata->kode_verif }}"><i class="fa fa-save"></i> Penyelesaian &
                                    Simpan</button>
                            @else
                                <button class="btn btn-falcon-success" id="button-fix-data-stockopname"
                                    data-id="{{ $id }}"><i class="fa fa-check"></i> Fix Data</button>
                                <button class="btn btn-falcon-danger" disabled><i class="fa fa-info"></i> Belum
                                    Selesai</button>
                            @endif
                            <div class="text-center mt-2"><small class="d-inline-block">By continuing, you are
                                    agreeing to
                                    our subscriber <a href="#!">terms</a> and will be charged at the end of the
                                    trial.
                                </small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
