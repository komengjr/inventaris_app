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
                                    {{-- <img class="ms-1" src="{{ asset('vendor/prospek.png') }}" alt=""
                                        width="80" /> --}}
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
                            <h4 class="text-white fw-bold mb-1"><span class="badge bg-primary">Proses <span
                                        class="fw-medium">Stock
                                        Opname Barang Inventaris</span></span> </h4>
                        </div>
                        <div class="col-sm-auto d-flex align-items-center" style="justify-content: center;">
                            <button class="btn btn-falcon-warning me-2" role="button" id="button-stock-opname-kamera"
                                data-code="{{ $id }}"><span class="fas fa-camera-retro"></span>
                                <span class="d-none d-md-inline-block">Kamera</span></button>
                            <button class="btn btn-falcon-primary me-2" role="button" id="button-stock-opname-scanner"
                                data-code="{{ $id }}"><span class="fas fa-barcode"></span>
                                <span class="d-none d-md-inline-block">Scanner</span></button>
                            <button class="btn btn-falcon-success" role="button" id="button-stock-opname-manual"
                                data-code="{{ $id }}"><span class="fas fa-check-square"></span>
                                <span class="d-none d-md-inline-block">Checklist</span></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="view-report-stokopname-ruangan"></div>

            <table id="exampledata" class="table table-striped nowrap border border-primary" style="width:100%"
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
                    @foreach ($no_ruangan as $no_ruangans)
                        <?php
                        $ceklokasix = DB::table('inventaris_data')
                            ->where('inventaris_data_cabang', Auth::user()->cabang)
                            ->where('id_nomor_ruangan_cbaang', $no_ruangans->id_nomor_ruangan_cbaang)
                            ->where('inventaris_data_status', '<', '4')
                            ->count();
                        ?>
                        @if ($ceklokasix == 0)
                        @else
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="fs--2">{{ $no_ruangans->nomor_ruangan }}
                                    @php
                                        $nama_lokasi = DB::table('tbl_lokasi')
                                            ->select('nama_lokasi')
                                            ->where('kd_lokasi', $no_ruangans->kd_lokasi)
                                            ->first();
                                    @endphp
                                    {{ $nama_lokasi->nama_lokasi }}

                                </td>
                                @php
                                    $totalbarang = DB::table('inventaris_data')
                                        ->where('inventaris_data_cabang', auth::user()->cabang)
                                        ->where('id_nomor_ruangan_cbaang', $no_ruangans->id_nomor_ruangan_cbaang)
                                        ->where(
                                            'inventaris_data.inventaris_data_tgl_beli',
                                            '<=',
                                            $cekdata->end_date_verif,
                                        )
                                        ->where('inventaris_data_status', '<', '4')
                                        ->count();
                                    $jumlah = $totalbarang + $jumlah;
                                @endphp
                                <td class="text-center">
                                    {{ $totalbarang }}
                                </td>
                                @php
                                    $statusbarang = DB::table('tbl_sub_verifdatainventaris')
                                        ->join(
                                            'inventaris_data',
                                            'inventaris_data.inventaris_data_code',
                                            '=',
                                            'tbl_sub_verifdatainventaris.id_inventaris',
                                        )
                                        ->where('tbl_sub_verifdatainventaris.kode_verif', $cekdata->kode_verif)
                                        ->where(
                                            'inventaris_data.id_nomor_ruangan_cbaang',
                                            $no_ruangans->id_nomor_ruangan_cbaang,
                                        )
                                        ->where(
                                            'inventaris_data.inventaris_data_tgl_beli',
                                            '<=',
                                            $cekdata->end_date_verif,
                                        )
                                        ->where('inventaris_data.inventaris_data_status', '<', '4')
                                        ->where('tbl_sub_verifdatainventaris.status_data_inventaris', 0)
                                        ->count();
                                    $statusbarang1 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join(
                                            'inventaris_data',
                                            'inventaris_data.inventaris_data_code',
                                            '=',
                                            'tbl_sub_verifdatainventaris.id_inventaris',
                                        )
                                        ->where('tbl_sub_verifdatainventaris.kode_verif', $cekdata->kode_verif)
                                        ->where(
                                            'inventaris_data.id_nomor_ruangan_cbaang',
                                            $no_ruangans->id_nomor_ruangan_cbaang,
                                        )
                                        ->where(
                                            'inventaris_data.inventaris_data_tgl_beli',
                                            '<=',
                                            $cekdata->end_date_verif,
                                        )
                                        ->where('inventaris_data.inventaris_data_status', '<', '4')
                                        ->where('tbl_sub_verifdatainventaris.status_data_inventaris', 1)
                                        ->count();
                                    $statusbarang2 = DB::table('tbl_sub_verifdatainventaris')
                                        ->join(
                                            'inventaris_data',
                                            'inventaris_data.inventaris_data_code',
                                            '=',
                                            'tbl_sub_verifdatainventaris.id_inventaris',
                                        )
                                        ->where('tbl_sub_verifdatainventaris.kode_verif', $cekdata->kode_verif)
                                        ->where(
                                            'inventaris_data.id_nomor_ruangan_cbaang',
                                            $no_ruangans->id_nomor_ruangan_cbaang,
                                        )
                                        ->where(
                                            'inventaris_data.inventaris_data_tgl_beli',
                                            '<=',
                                            $cekdata->end_date_verif,
                                        )
                                        ->where('inventaris_data.inventaris_data_status', '<', '4')
                                        ->where('tbl_sub_verifdatainventaris.status_data_inventaris', 2)
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
                                            id="button-print-stockopname-ruangan" data-code="{{ $id }}"
                                            data-lokasi="{{ $no_ruangans->id_nomor_ruangan_cbaang }}"><i
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
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="mb-0 text-white">Keterangan Barang Yang Sudah Mutasi / Musnah</h5>
                        </div>
                        <div class="card-body bg-light">
                            <table id="exampledetail" class="table table-striped nowrap" style="width:100%">
                                <thead class="bg-200 text-700">
                                    <tr>

                                        <th>Nama Barang</th>
                                        <th>Nomor Inventaris</th>
                                        <th>Merek</th>
                                        <th>Harga Barang</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $datas)
                                        <tr>

                                            <td>{{ $datas->inventaris_data_name }}</td>
                                            <td>{{ $datas->inventaris_data_number }}</td>
                                            <td>{{ $datas->inventaris_data_merk }}</td>
                                            <td>@currency($datas->inventaris_data_harga)</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="mb-0 text-white">Status Jumlah Barang</h5>
                        </div>
                        <div class="card-body bg-light">
                            <div class="d-flex justify-content-between fs--1 mb-1">
                                <h6 class="mb-0 text-success">Keadaan Baik</h6>
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
                                <h6 class="mb-0 text-success">Keadaan Maintenance</h6>
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
                                <h6 class="mb-0 text-danger">Keadaan Rusak</h6>
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
                                <p class="mb-0 text-danger">Total Belum Verifikasi :</p>
                                <span>
                                    <h5 style="cursor: pointer; color: rgb(255, 0, 0);" id="btn-show-data-belum-verif"
                                        data-id="{{ $cekdata->kode_verif }}">
                                        {{ $jumlah - $barangbaik - $barangmaintenance - $barangrusak }}</h5>
                                </span>
                            </div>
                            <hr>
                            <h5 class="d-flex justify-content-between"><span>Total Data
                                    Keseluruhan</span><span>{{ $jumlah }}</span></h5>
                            <p class="fs--1 text-danger">Pastikan Semua Data Sudah di verifikasi sesuai kondisi barang
                                masing - masing.</p>
                            @if ($barangbaik + $barangmaintenance + $barangrusak == $jumlah)
                                <span id="menu-button-penyelesaian-stockopname">
                                    <button class="btn btn-falcon-success" id="button-penyelesaian-stockopname"
                                        data-code="{{ $cekdata->kode_verif }}"><i class="fa fa-save"></i>
                                        Penyelesaian
                                        &
                                        Simpan</button>
                                </span>
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
        new DataTable('#exampledetail', {
            responsive: true
        });
    </script>
</div>
