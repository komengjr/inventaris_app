<div class="container-fluid">
    <style>
        .modal {
            padding: 10px;
            !important; //
        }

        .modal .modal-full {
            width: 100%;
            max-width: none;
            /* height: 100%; */
            margin: 0;
        }

        #lihatdatabarang:hover {
            color: #fff;
            background-color: #00e5ff;
            border-color: #07aaeb
        }

        #ubahwarnass:hover {
            color: #fff;
            background-color-line: #00bfff;
            border-color: #07a7eb
        }

        #ubahtombolaset:hover {
            display: flex;
            color: rgb(14, 243, 255);
            padding: 2px;
            /* background-color: #dd57e0; */
            border-radius: 10%;
            border: 3px solid #14bbd1;
        }

        #tambahdatainevntaris:hover {
            display: flex;
            color: rgb(14, 243, 255);
            padding: 2px;
            /* background-color: #dd57e0; */
            border-radius: 10%;
            border: 3px solid #14bbd1;
        }

        #datainevntaris:hover {
            display: flex;
            color: rgb(14, 243, 255);
            padding: 2px;
            /* background-color: #dd57e0; */
            border-radius: 10%;
            border: 3px solid #14bbd1;
        }

        @media only screen and (max-width: 800px) {
            #iconruangan {
                display: none;
            }
        }
    </style>
    <div class="row mt-3">
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
                                <h5 class="mb-0 text-dark">@currency($totaljumlahinventaris)</h5>
                            @endif

                            <p class="mb-0 text-dark">Total Inventaris Cabang : {{ $totalinventaris }}</p>
                        </div>
                        <div class="w-icon" style="cursor: pointer" id="tambahdatainevntaris" data-toggle="modal"
                            data-target="#modaladdbarang"
                            data-url="{{ url('admin/formdatainventaris/tambadata', []) }}">
                            <i class="fa fa-plus-square text-gradient-danger"></i>
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
                            <h5 class="mb-0 text-dark">@currency($totaljumlahaset)</h5>
                            <p class="mb-0 text-dark">Total Aset Cabang : {{ $dataasetcabang }}</p>
                        </div>
                        <div class="w-icon" style="cursor: pointer" id="ubahtombolaset" data-toggle="modal"
                            data-target="#lihat-detail-data" data-url="{{ url('admin/formdataaset', []) }}">
                            <i class="fa fa-eye text-gradient-danger"></i>
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
                <li class="breadcrumb-item"><a href="javaScript:void();">Klasifikasi</a></li>
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
                            <div class="w-icon">
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
                                @if ($totalinventaris == 0)
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 0%"></div>
                                @else
                                    <div class="progress-bar bg-white" role="progressbar"
                                        style="width: {{ ($jumlah * 100) / $totalinventaris }}%"></div>
                                @endif

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
            <h4 class="page-title">Ruangan / Lantai</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Ruangan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </div>
    </div>
    <div class="row">
        @foreach ($ruangan as $itemx)
            <?php
            $ceklokasix = DB::table('sub_tbl_inventory')
                ->select('sub_tbl_inventory.*')
                ->where('kd_cabang', auth::user()->cabang)
                ->where('id_nomor_ruangan_cbaang', $itemx->id_nomor_ruangan_cbaang)
                ->count();
            ?>
            @if ($ceklokasix == 0)
            @else
                <div class="col-6 col-lg-2 col-xl-2">
                    <div class="card gradient-success rounded-0">
                        <div class="card-body p-1" style="cursor: pointer" data-toggle="modal"
                            data-target="#lihat-detail-data" id="lihatdatabarang"
                            data-url="{{ route('lihatdatabarang1', ['id' => $itemx->id_nomor_ruangan_cbaang]) }}">
                            <div class="media align-items-center bg-white p-3">
                                <div class="media-body">
                                    <p class="text-dark text-uppercase extra-small-font font-weight-bold">
                                        <strong>{{ $itemx->nomor_ruangan }} : {{ $itemx->nama_lokasi }}</strong>
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
{{-- <div class="modal fade" id="printbarcodelokasi">
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
</div> --}}

<div class="modal fade" id="lihat-detail-data">
    <div class="modal-dialog modal-dialog-centered modal-full" style="margin-top: 2%;">
        <div class="modal-content">
            <div  id="showdatabarang">
                <div class="modal-body" style="font-size: 9px;" >
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modaladdbarang">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div id="showtambahdatabarang">
                <div class="modal-body" style="font-size: 9px;">
                </div>
            </div>
        </div>
    </div>
</div>

<button id="button-iklan" data-toggle="modal" data-target="#cardmodal" style="display: none;"></button>
<script type="text/javascript">
    function submitForm1() {
        document.form2.target = "myActionWin";
        window.open("", "myActionWin", "width=1000,height=700,toolbar=0");
        document.form2.submit();
    }
</script>
@php
    $browser = Agent::browser();
    $platform = Agent::platform();
    DB::table('z_log_kunjungan')->insert([
        'ip_addres' => \Request::getClientIp(true),
        'user' => Auth::user()->email,
        'cabang' => Auth::user()->cabang,
        'device' => $device = Agent::device(),
        'os' => Agent::platform().' '.Agent::version($platform),
        'browser' => Agent::browser() . ' Version ' . Agent::version($browser),
        'created_at' => date('Y-m-d H:i:s'),
    ]);
    $cekiklan = DB::table('q_iklan_cabang')
        ->join('q_iklan', 'q_iklan.kd_iklan', '=', 'q_iklan_cabang.kd_iklan')
        ->where('q_iklan_cabang.kd_cabang', Auth::user()->cabang)
        ->where('q_iklan.status_iklan', 1)
        ->get();
@endphp
@if ($cekiklan->isEmpty())
    @php
        $iklan = DB::table('q_iklan')
            ->where('status_iklan', 1)
            ->get();
    @endphp
    <div class="modal fade" id="cardmodal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="card mb-0">
                    <div id="carousel-2" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @foreach ($iklan as $iklan)
                                <div class="carousel-item active">
                                    <img class="d-block w-100 card-img-top" src="{{ $iklan->link }}"
                                        alt="Card image cap">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body pt-2 p-0">
                        <div class="form-group col-12">
                            <div class="icheck-material-info">
                                <input type="checkbox" id="iklan-checkbox" onclick="status_iklan()">
                                <label for="iklan-checkbox">Tidak ditampilkan Kembali Ketika Login</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#button-iklan').click();
        });

        function status_iklan() {
            if ($('#iklan-checkbox').is(':checked')) {
                $.ajax({
                    url: '/divisi/iklan/update/check',
                    type: 'GET',
                    dataType: 'html'
                })
            } else {
                $.ajax({
                    url: '/divisi/iklan/update/removecheck',
                    type: 'GET',
                    dataType: 'html'
                })
            }

        };
    </script>
@else
@endif
