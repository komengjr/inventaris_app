
<div class="container-fluid">
<style>
    .content, .modal {

    top:0;
    left:0;
    height:100%;
    width: 100%;
    }
    #lihatdatabarang:hover {
        color: #fff;
        background-color: #ff1900;
        border-color: #eb7d07
    }
    #ubahwarnass:hover {
        color: #fff;
        background-color-line: #ff1900;
        border-color: #eb7d07
    }
    #ubahtombolaset:hover {
        color: rgb(255, 14, 14);
        padding: 1px;
        /* background-color: #dd57e0; */
        border-radius: 10%;
        border: 5px solid #dd57e0;
    }
    @media only screen and  (max-width: 800px) {
    #iconruangan {
        display: none;
    }
    }
</style>
    <div class="row">
        <div class="col-12 col-lg-4 col-xl-4">
            <div class="card gradient-warning rounded-0">
                <div class="card-body p-1">
                    <div class="media align-items-center bg-white p-4">
                        <div class="media-body">
                            <p class="mb-0 text-dark">Cabang :</p>
                            <h5 class="mb-0 text-dark">{{ auth::user()->name }}</h5>

                        </div>
                        <div class="w-icon">
                            <i class="fa fa-user-o text-gradient-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-4">
            <div class="card gradient-danger rounded-0">
                <div class="card-body p-1">
                    <div class="media align-items-center bg-white p-4">
                        <div class="media-body">
                            @if ($totalinventaris == 1)
                            <h5 class="mb-0 text-dark">Kosong</h5>
                            @else
                            <h5 class="mb-0 text-dark">{{ $totalinventaris }}</h5>
                            @endif

                            <p class="mb-0 text-dark">Total Inventaris</p>
                        </div>
                        <div class="w-icon">
                            <i class="fa fa-th-large text-gradient-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-4">
            <div class="card gradient-secondary rounded-0">
                <div class="card-body p-1">
                    <div class="media align-items-center bg-white p-4">
                        <div class="media-body">
                            <h5 class="mb-0 text-dark">@currency($totaljumlah)</h5>
                            <p class="mb-0 text-dark">Data Aset Perusahaan</p>
                        </div>
                        <div class="w-icon" style="cursor: pointer" id="ubahtombolaset" data-toggle="modal" data-target="#lihat-detail-data" data-url="{{ url('admin/formdataaset', []) }}">
                            <i class="fa fa-server text-gradient-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-lg-4 col-xl-4">
            <div class="card gradient-secondary rounded-0">
                <div class="card-body p-1">
                    <div class="media align-items-center bg-white p-4">
                        <div class="media-body">
                            <h5 class="mb-0 text-dark">@currency($totaljumlah)</h5>
                            <p class="mb-0 text-dark">Total Nilai Inventaris </p>
                        </div>
                        <div class="w-icon">
                            <i class="zmdi zmdi-desktop-mac text-gradient-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Klasifikasi</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Inventaris & aset</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </div>
    </div>
    <div class="row">
        @foreach ($datakategori as $item)
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="card texture-wave-c rounded-0">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h6 class="mb-0 text-white">{{ $item->kategori_barang }}</h6>
                                <?php $jumlah = 0; ?>
                                <?php

                                $dataklasifikasi1x = DB::table('tbl_inventory')
                                    ->select('tbl_inventory.*')
                                    ->where('no_urut_barang', $item->no_urut_barang)
                                    ->get();
                                // dd($dataklasifikasi1)
                                ?>

                                @foreach ($dataklasifikasi1x as $item1x)
                                    <?php
                                    $totalx = DB::table('sub_tbl_inventory')
                                        ->select('sub_tbl_inventory.*')
                                        ->where('kd_inventaris', $item1x->kd_inventaris)
                                        ->where('kd_cabang', auth::user()->cabang)
                                        ->count();

                                    $jumlah = $jumlah + $totalx;
                                    ?>
                                @endforeach
                                <p class="mb-0 text-white">Total Inventaris</p>
                            </div>
                            <div class="w-icon" >
                                @if ($item->no_urut_barang == '01')
                                    <i class="fa fa-road text-white"></i>
                                @elseif($item->no_urut_barang == '02')
                                    <i class="fa fa-car text-white"></i>
                                @elseif($item->no_urut_barang == '03')
                                    <i class="fa fa-bed text-white"></i>
                                @elseif($item->no_urut_barang == '04')
                                    <i class="fa fa-stethoscope text-white"></i>
                                @elseif($item->no_urut_barang == '05')
                                    <i class="fa fa-laptop text-white"></i>
                                @else
                                    <i class="fa fa-scissors text-white"></i>
                                @endif
                                {{-- <i class="zmdi zmdi-thumb-up text-white"></i> --}}
                            </div>
                        </div>
                        <div class="progress-wrapper mt-3">
                            <div class="progress mb-0" style="height: 5px">
                                <div class="progress-bar bg-white" role="progressbar"
                                    style="width: {{ ($jumlah * 100) / $totalinventaris }}%"></div>
                            </div>
                            <p class="mt-2 mb-0 extra-small-font text-white">
                                {{ $jumlah }}
                            </p>
                            {{-- <button class="btn-info">Asset</button>
                            <button class="btn-info">Bukan Asset</button> --}}

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Ruangan</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">-</a></li>
                <li class="breadcrumb-item active" aria-current="page">-</li>
            </ol>
        </div>
    </div>
    <div class="row">
        @foreach ($datalokasi as $itemx)
            <?php
            $ceklokasix = DB::table('sub_tbl_inventory')
                ->select('sub_tbl_inventory.*')
                ->where('kd_cabang', auth::user()->cabang)
                ->where('kd_lokasi', $itemx->kd_lokasi)
                ->count();
            ?>
            @if ($ceklokasix == 0)
            @else
                <div class="col-6 col-lg-2 col-xl-2">
                    <div class="card gradient-success rounded-0">
                        <div class="card-body p-1" style="cursor: pointer" data-toggle="modal" data-target="#lihat-detail-data" id="lihatdatabarang" data-url="{{ route('lihatdatabarang1', ['id' => $itemx->kd_lokasi]) }}">
                            <div class="media align-items-center bg-white p-3">
                                <div class="media-body">
                                    <p class="text-dark text-uppercase extra-small-font font-weight-bold">
                                        <strong>{{ $itemx->nama_lokasi }}</strong>
                                    </p>
                                    <h6 class="mb-0 text-dark">{{ $ceklokasix }} Item</h6>
                                </div>

                                <div class="w-icon" id="iconruangan">
                                    <i class="zmdi zmdi-desktop-mac text-gradient-danger"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="overlay toggle-menu"></div>

</div>
<div class="modal fade" id="printbarcodelokasi">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h5 class="modal-title">Upload Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="form2" action="{{ url('printbarcodelokasi', []) }}" method="POST" name="importform"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="rwo">
                        <div class="form-group">
                            <label for="inputEmail4" class="form-label">Print Sesuai Lokasi</label>
                            <select class="form-control single-selectlokasi" name="kd_lokasi">
                                <option>Pilih Lokasi</option>
                                @foreach ($datalokasi as $datalokasi)
                                    <option value="{{ $datalokasi->kd_lokasi }}">{{ $datalokasi->nama_lokasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Tutup</button>
                <a type="submit" class="btn btn-success" onclick="submitForm1()"> <i
                        class="fa fa-print">Cetak</i></a>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="printpeserta">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h5 class="modal-title">Upload Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('printpeserta', []) }}" method="POST">
                    @csrf

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Tutup</button>
                <a type="submit" class="btn btn-success"> <i class="fa fa-print">Cetak</i></a>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="lihat-detail-data" >
    <div class="modal-dialog modal-dialog-centered modal-xl" style="margin-top: 2%;">
        <div class="modal-content" >
            <div id="showdatabarang">
                <div class="modal-body" style="font-size: 9px;">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function submitForm1() {
        document.form2.target = "myActionWin";
        window.open("", "myActionWin", "width=1000,height=700,toolbar=0");
        document.form2.submit();
    }
</script>
