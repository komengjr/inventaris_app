@extends('layouts.app')
@section('content')
    <div class="content-wrapper gradient-forest">
        <div class="container-fluid">
            <div class="card mt-3 mr-2">
                <div class="row pl-4 pt-3">
                    <div class="col-sm-9">
                        <h4 class="page-title">Menu Stock Opname Barang</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Stock Opname</li>
                        </ol>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('sukses'))
                <div class="pl-3 pt-2 pb-2">
                    <div class="alert alert-icon-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert-icon icon-part-success">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="alert-message">
                            <span><strong>Success!</strong> ---- <a href="javascript:void();"
                                    class="alert-link">{{ $message }}</a></span>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">Avg Stock Opname
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a> --}}
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-11">
                                <canvas id="timeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="float-right m-3 m-3">
                            <div class="btn-group m-0" style="float: right;">
                                <button type="button" class="btn-info waves-effect waves-light"> <i class="fa fa-cog"></i>
                                    <span>Menu Option</span> </button>
                                <button type="button"
                                    class="btn-primary split-btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(102px, 37px, 0px);">
                                    <a href="javaScript:void();" class="dropdown-item" data-toggle="modal"
                                        data-target="#tambahdatabaru" id="tombolbarupeminjaman"
                                        data-url="{{ url('divisi/tambahdataverifikasiinventaris', []) }}"><i
                                            class="fa fa-plus mr-1"></i> Tambah Data Stockopname</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                        </div>

                        <div class="pb-3" id="showdatamutasi">
                            <table id="default-datatable" class="styled-table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Verifikasi</th>
                                        <th>Tanggal Mulai Verifikasi</th>
                                        <th>Tanggal Selesai Verifikasi</th>
                                        <th>Jumlah Inventaris</th>
                                        <th>Jumlah Terverifikasi</th>
                                        <th>Kondisi Barang</th>
                                        <th>Status Verifikasi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dataverif as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->kode_verif }}</td>
                                            <td>{{ $item->tgl_verif }}</td>
                                            <td>{{ $item->end_date_verif }}</td>
                                            <td>
                                                @php
                                                    $jumlahi = DB::table('sub_tbl_inventory')
                                                        ->where('kd_cabang', Auth::user()->cabang)
                                                        ->where('status_barang', '!=', 5)
                                                        ->count();
                                                @endphp
                                                {{ $jumlahi }}
                                            </td>
                                            <td>
                                                @php
                                                    $jumlah = DB::table('tbl_sub_verifdatainventaris')
                                                        ->where('kode_verif', $item->kode_verif)
                                                        ->count();
                                                @endphp
                                                {{ $jumlah }}
                                            </td>
                                            <td>
                                                <button class="btn-success m-1" data-toggle="modal"
                                                    data-target="#lengkapipeminjaman"
                                                    id="button-verifikasi-kondisi-barang-baik"
                                                    data-id="{{ $item->kode_verif }}" data-status="0"><i
                                                        class="fa fa-tasks"> B</i></button>
                                                <button class="btn-warning m-1" data-toggle="modal"
                                                    data-target="#lengkapipeminjaman"
                                                    id="button-verifikasi-kondisi-barang-baik"
                                                    data-id="{{ $item->kode_verif }}" data-status="1"><i
                                                        class="fa fa-tasks "> M</i></button>
                                                <button class="btn-danger m-1" data-toggle="modal"
                                                    data-target="#lengkapipeminjaman"
                                                    id="button-verifikasi-kondisi-barang-baik"
                                                    data-id="{{ $item->kode_verif }}" data-status="2"><i
                                                        class="fa fa-tasks"> R</i></button> |
                                                <button class="btn-primary m-1" data-toggle="modal"
                                                    data-target="#modal-data-verifikasi" id="button-status-data-verifikasi"
                                                    data-id="{{ $item->kode_verif }}">Status</button>
                                            </td>
                                            <td>
                                                @if ($item->status_verif == 0)
                                                    <span class="badge badge-danger m-1">Belum Selesai</span>
                                                @else
                                                    <span class="badge badge-success m-1">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="text-center ">
                                                <button class="btn-warning m-1" data-toggle="modal"
                                                    data-target="#tambahdatabaru" id="tomboleditdataverifikasidata"
                                                    data-url="{{ url('divisi/editdataverifikasiinventaris', ['id' => $item->id_verifdatainventaris]) }}"><i
                                                        class="fa fa-pencil"></i> Edit</button>
                                                @if ($item->status_verif == 0)
                                                    <button class="btn-primary m-1" data-toggle="modal"
                                                        data-target="#lengkapipeminjaman" id="tombollengkapipeminjaman"
                                                        data-url="{{ url('divisi/verifikasi/lengkapi', ['id' => $item->kode_verif]) }}"><i
                                                            class="fa fa-shield"></i> Proses
                                                        Verifikasi</button>
                                                @else
                                                    <button class="btn-info m-1" data-toggle="modal"
                                                        data-target="#modal-data-verifikasi"
                                                        id="button-cetak-stock-opname"
                                                        data-id="{{ $item->kode_verif }}"><i class="fa fa-print"></i>
                                                        Full Report</button>
                                                    <button class="btn-dark m-1" data-toggle="modal"
                                                        data-target="#modal-data-verifikasi"
                                                        id="button-cetak-ruangan-stock-opname"
                                                        data-id="{{ $item->kode_verif }}"> <i class="fa fa-tasks"></i>
                                                        Print Ruang
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahdatabaru">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div id="showdatasdm">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lengkapipeminjaman">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div id="showdatalengkapi">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-data-verifikasi" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report</h5>
                    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="show-menu-report-stockopname">

                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close</button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save
                        changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#default-datatable').DataTable();

        });
    </script>
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


            // chart 6

            var ctx = document.getElementById("timeChart").getContext('2d');


            var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke3.addColorStop(0, '#42e695');
            gradientStroke3.addColorStop(1, '#3bb2b8');

            var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke4.addColorStop(0, ' #8E2DE2');
            gradientStroke4.addColorStop(0.5, '#4A00E0');

            var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke5.addColorStop(0, ' #F5AF19');
            gradientStroke5.addColorStop(0.5, '#F12711');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($dataverif as $dataverif1)
                            "{{ $dataverif1->tgl_verif }}",
                        @endforeach

                    ],
                    datasets: [{
                        label: 'Baik',
                        data: [
                            @foreach ($dataverif as $data)
                                @php
                                    $totalbaik = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif', $data->kode_verif)->where('status_data_inventaris', 0)->count();
                                @endphp
                                    "{{ $totalbaik }}",
                            @endforeach
                        ],
                        backgroundColor: gradientStroke3,
                        hoverBackgroundColor: gradientStroke3
                    }, {
                        label: 'Mintenance',
                        data: [
                            @foreach ($dataverif as $dataverif3)
                                @php
                                    $totalmaintenance = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif', $dataverif3->kode_verif)->where('status_data_inventaris', 1)->count();
                                @endphp
                                    "{{ $totalmaintenance }}",
                            @endforeach
                        ],
                        backgroundColor: gradientStroke4,
                        hoverBackgroundColor: gradientStroke4,
                    }, {
                        label: 'Rusak',
                        data: [
                            @foreach ($dataverif as $dataverif4)
                                @php
                                    $totalrusak = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif', $dataverif4->kode_verif)->where('status_data_inventaris', 2)->count();
                                @endphp
                                    "{{ $totalrusak }}",
                            @endforeach
                        ],
                        backgroundColor: gradientStroke5,
                        hoverBackgroundColor: gradientStroke5,
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: true,
                        labels: {
                            fontColor: '#585757',
                            boxWidth: 40
                        }
                    },
                    tooltips: {
                        enabled: true,
                        displayColors: false
                    },
                    scales: {
                        xAxes: [{
                            categoryPercentage: 0.3,
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757'
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.05)"
                            },
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757'
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.05)"
                            },
                        }]
                    }

                }
            });



        });
    </script>
    <script>
        $(document).on("click", "#button-print-stockopname-ruangan", function(e) {
            e.preventDefault();
            var kode = $(this).data("id");
            var lokasi = $(this).data("lokasi");
            $("#view-report-stokopname-ruangan").html(
                '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
            );
            $.ajax({
                    url: "../../menu/verifdatainventaris/stockopname-ruangan",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "kode": kode,
                        "lokasi": lokasi,
                    },
                    dataType: 'html',
                })
                .done(function(data) {
                    $("#view-report-stokopname-ruangan").html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                    );
                })
                .fail(function() {
                    Lobibox.notify("error", {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: "top right",
                        icon: "fa fa-info",
                        msg: "Gagal",
                    });
                });
        });
        $(document).on("click", "#tomboleditdataverifikasidata", function(e) {
            e.preventDefault();
            var url = $(this).data("url");

            $.ajax({
                url: url,
                type: "GET",
                dataType: "html",
            }).done(function(data) {
                $("#showdatasdm").html(data);
            }).fail(function() {
                $("#showdatasdm").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });
        });
        $(document).on("click", "#button-status-data-verifikasi", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#show-menu-report-stockopname").html(
                '<div style="text-align: center; padding:2%;"><div class="spinner-border text-warning" role="status" > <span class="sr-only"></span> </div></div>'
            );
            $.ajax({
                url: "{{ route('poststatusdatainevntarissverifikasi') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id": id,
                    // "pilihan": pilihan,
                },
                dataType: "html",
            }).done(function(datapdf) {
                $("#show-menu-report-stockopname").html(datapdf);
            }).fail(function() {
                // console.log(data);
                $("#show-menu-report-stockopname").html("Gagal Baca");
            });
        });
        $(document).on("click", "#button-fix-data-stockopname", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#menuverifikasi").html(
                '<div style="text-align: center; padding:2%;"><div class="spinner-border text-warning" role="status" > <span class="sr-only"></span> </div></div>'
            );
            $.ajax({
                url: "{{ route('divisi/postverifikasiall/datasemua/fixdata') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id": id,
                    // "pilihan": pilihan,
                },
                dataType: "html",
            }).done(function(data) {
                $("#menuverifikasi").html(
                    '<div style="text-align: center; padding:2%;"><span class="badge bg-success text-white">Berhasil Fix Data : Mohon Tunggu</span></div>'
                );
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }).fail(function() {
                // console.log(data);
                $("#menuverifikasi").html("Gagal Baca");
            });
        });
    </script>
@endsection
