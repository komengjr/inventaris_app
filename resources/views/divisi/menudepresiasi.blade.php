@extends('layouts.app')
@section('content')
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
    </style>
    <div class="content-wrapper">
        <div class="container-fluid" id="menudetaildataaset">
            <div class="row pl-2 pt-2 pb-2">
                <div class="col-sm-9">
                    {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Depresiasi</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-primary mb-0">{{$jumlahdata}} Item</h4>
                                    <span class="small-font">Total Aset</span>
                                </div>
                                <div class="w-circle-icon rounded bg-primary">
                                    <i class="fa fa-clock-o text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-secondary mb-0">{{$jumlahdatadepresiasi}} Klasifikasi</h4>
                                    <span class="small-font">TABEL DEPRESIASI ASET</span>
                                </div>
                                <div class="w-circle-icon rounded bg-secondary" style="cursor: pointer;" id="buttondatatabledepresiasi" data-toggle="modal"
                                    data-target="#datatabledepresiasiaset">
                                    <i class="fa fa-tasks text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->


            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">Delivery Status</div>
                        <div class="card-body">
                            <div class="chart-container-5">
                                <canvas id="deliverychart"></canvas>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Within Time Limit : <span
                                    class="badge badge-warning float-right">325</span></li>
                            <li class="list-group-item">Out of Time Limit : <span
                                    class="badge badge-info float-right">45</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">Kategori</div>
                        <div class="card-body">
                            <div class="chart-container-6">
                                <canvas id="regionchart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            Data Aset
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pb-5">
                            <table class="table styled-table align-items-center table-flush pb-2" id="default-table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang Aset</th>
                                        <th>Harga Perolehan</th>
                                        <th>Invoice</th>
                                        <th>Maintainance</th>
                                        <th>Status Depresiasi</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>@currency($item->harga_perolehan)</td>
                                            @php
                                                $cekinvoice = DB::table('tbl_invoice')
                                                    ->where('id_inventaris', $item->id_inventaris)
                                                    ->first();
                                            @endphp
                                            <td>
                                                @if ($cekinvoice)
                                                    <a href="#" data-toggle="modal" data-target="#modaldepresiasi" id="buttondetaildatainvoice" data-id="{{ $item->id_inventaris }}">{{ $cekinvoice->kd_invoice }}</a>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $maintenance = DB::table('tbl_maintenance_aset')
                                                        ->where('id_inventaris', $item->id_inventaris)
                                                        ->get();
                                                @endphp
                                                @foreach ($maintenance as $datamaintenance)
                                                    <li><a href="#" data-toggle="modal" data-target="#modaldepresiasi"
                                                            id="buttondetaildatamaintenance"
                                                            data-id="{{ $datamaintenance->kd_maintenance_aset }}"
                                                            rel="noopener noreferrer">{{ $datamaintenance->kd_maintenance_aset }}</a>
                                                    </li>
                                                @endforeach

                                            </td>
                                            <td>
                                                @php
                                                    $depresiasi = DB::table('tbl_depresiasi_aset')
                                                        ->join('tbl_depresiasi', 'tbl_depresiasi.kd_depresiasi', '=', 'tbl_depresiasi_aset.kd_depresiasi')
                                                        ->where('tbl_depresiasi_aset.id_inventaris', $item->id_inventaris)
                                                        ->first();
                                                @endphp
                                                @if ($depresiasi)
                                                    <span
                                                        class="badge badge-pill badge-success m-1">{{ $depresiasi->masa_depresiasi }}</span>
                                                @else
                                                    <a href="#" data-toggle="modal" data-target="#modaldepresiasi"
                                                        id="buttonpilihoptiondepresiasi"
                                                        data-id="{{ $item->id_inventaris }}"><span
                                                            class="badge badge-pill badge-danger m-1">Belum
                                                            Dipilih</span></a>
                                                @endif
                                            </td>
                                            <td>{{ $item->tgl_beli }}</td>
                                            <td class="text-center">
                                                <button type="button"
                                                    class="btn-outline-warning  waves-effect waves-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="javaScript:void();" class="dropdown-item"
                                                        id="buttondetaildepresiasiaset"
                                                        data-url="{{ url('divisi/data-aset/detaildataaset', ['id' => $item->id_inventaris]) }}"data-id="{{ $item->id_inventaris }}"><i
                                                            class="fa fa-eye"></i> Detail</a>
                                                    <a href="javaScript:void();" class="dropdown-item"
                                                        data-toggle="modal" data-target="#modaldepresiasi"
                                                        id="buttontambahmaintenance"
                                                        data-id="{{ $item->id_inventaris }}"><i
                                                            class="fa fa-file-text-o"></i> Upload Document Maintenance</a>
                                                    @if (!$cekinvoice)
                                                        <a href="javaScript:void();" class="dropdown-item"
                                                            data-toggle="modal" data-target="#modaldepresiasi"
                                                            id="buttontambahinvoice"
                                                            data-id="{{ $item->id_inventaris }}"><i
                                                                class="fa fa-file-text-o"></i> Upload
                                                            Document Invoice</a>
                                                    @endif


                                                    <a href="javaScript:void();" class="dropdown-item"><i
                                                            class="fa fa-pencil-square"></i> Perubahan Detail Aset</a>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container-fluid-->

    </div>
    <div class="modal fade" id="modaldepresiasi">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div id="showmenuaset">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="datatabledepresiasiaset">
        <div class="modal-dialog modal-dialog-centered modal-full">
            <div class="modal-content">
                <div id="showmenuaset1">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/js/app-script.js', []) }}"></script>
    <script src="{{ url('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/Chart.js/Chart.min.js', []) }}"></script>
    {{-- <script src="{{ url('assets/js/dashboard-logistics.js', []) }}"></script> --}}
    <script>
        $(function() {
            "use strict";


            // chart 1

            $('.fleet-chart').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#ffffff',
                lineWidth: 10,
                trackColor: 'rgba(255, 255, 255, 0.12)',
                scaleColor: false,
                onStep: function(from, to, percent) {
                    $(this.el).find('.fleet-status-percent').text(Math.round(percent));
                }
            });



            // chart 2

            var ctx = document.getElementById("deliverychart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Within Time Limit", "Out of Time Limit"],
                    datasets: [{
                        backgroundColor: [
                            "#fba540",
                            "#03d0ea"
                        ],
                        data: [325, 145],
                        borderWidth: [0, 0]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        position: "bottom",
                        display: false,
                        labels: {
                            fontColor: '#585757',
                            boxWidth: 15
                        }
                    },
                    tooltips: {
                        displayColors: false
                    }
                }
            });


            // chart 3

            var ctx = document.getElementById("regionchart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        @foreach ($datakategori as $datakategori)
                            "{{ $datakategori->kategori_barang }}",
                        @endforeach
                    ],
                    datasets: [{
                        backgroundColor: [
                            "#14abef",
                            "#02ba5a",
                            "#d13adf",
                            "#F13adf",
                            "#Z13adf",
                            "#fba540"
                        ],
                        data: [0, 0, 10, 40, 40, 200],
                        borderWidth: [0, 0, 0, 0]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        position: "bottom",
                        display: true,
                        labels: {
                            fontColor: '#585757',
                            boxWidth: 10
                        }
                    }
                }
            });






            // chart 6




        });
    </script>
@endsection
