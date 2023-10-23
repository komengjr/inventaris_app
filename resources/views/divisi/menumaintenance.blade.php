@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pl-2 pt-2 pb-2">
                <div class="col-sm-9">
                    {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Maintenance</li>
                    </ol>
                </div>
            </div>
            <!--End Row-->

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">Avg Delivery Time (hours) & Route (km)
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
                        <div class="card-body">
                            <div class="chart-container-11">
                                <canvas id="timeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card gradient-ohhappiness">
                        <div class="card-body">
                            <div class="row row-group align-items-center">
                                <div class="col-12 col-lg-3 text-center p-3 border-white-2">
                                    <div class="fleet-status fleet-chart" data-percent="65">
                                        <span class="fleet-status-percent"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 text-center p-3  border-white-2">
                                    <h4 class="mb-0 text-white">65%</h4>
                                    <p class="mb-0 small-font text-white">Persentase</p>
                                </div>
                                <div class="col-12 col-lg-5 p-3">
                                    <ul>
                                        <li class="text-white">Total Laporan : 0</li>
                                        <li class="text-white">Dapat Di Perbaiki : 0</li>
                                        <li class="text-white">Tidak Dapat di Perbaiki : 0</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->


            <!--End Row-->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-sm-left m-3 m-3">
                                {{-- <h4 class="page-title">Data Peminjaman </h4> --}}
                            </div>
                            <div class="float-sm-right m-3 m-3">
                                <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal"
                                    data-target="#modalmaintenance" id="tombolbarumaintenance"
                                    data-url="{{ url('divisi/tambahdatamaintenance', []) }}">
                                    <i class="fa fa-plus mr-1"></i> Tambah Data
                                </button>
                                {{-- <button type="button" class="btn-primary waves-effect waves-light">
                                    <i class="fa fa-print mr-1"></i> Print
                                </button> --}}

                            </div>
                            <div class="table-responsive pb-5">
                                <table class="table styled-table align-items-center table-flush pb-2"
                                    id="default-datatable">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Tiket Maintenance</th>
                                            <th>Nama Barang</th>
                                            <th>Pelapor</th>
                                            <th>Tanggal Masuk Laporan</th>
                                            <th>Tanggal Selesai Laporan</th>
                                            <th>Document Upload</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datamaintenance as $item)
                                            <tr>
                                                <td>
                                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                                        class="product-img" />
                                                </td>
                                                <td>{{ $item->kd_maintenance }}</td>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>{{ $item->pelapor }}</td>
                                                <td>{{ $item->tgl_mulai }}</td>
                                                <td>{{ $item->tgl_akhir }}</td>
                                                <td class="text-center">
                                                    @if ($item->file_maintenance == '')
                                                        <span class="badge badge-danger shadow-danger m-1">Belum Ada
                                                            File</span>
                                                    @else
                                                        <button class="btn-info" data-toggle="modal"
                                                            data-target="#modalmaintenance"
                                                            id="button-lihat-file-maintenance"
                                                            data-id="{{ $item->id_maintenance }}"><i
                                                                class="fa fa-eye"></i></button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status_maintenance == 1)
                                                        <span class="badge-dot">
                                                            <i class="bg-danger"></i> pending
                                                        </span>
                                                    @else
                                                        <span class="badge-dot">
                                                            <i class="bg-success"></i> Selesai
                                                        </span>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="dropdown-toggle dropdown-toggle-nocaret btn-dark"
                                                            data-toggle="dropdown">
                                                            <i class="zmdi zmdi-menu"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @if ($item->file_maintenance == '')
                                                                <a class="dropdown-item" href="javascript:void();"
                                                                    data-toggle="modal" data-target="#modalmaintenance"><i
                                                                        class="fa fa-upload"></i> Upload Document</a>
                                                            @else
                                                                @if ($item->status_maintenance == 1)
                                                                    <a class="dropdown-item" href="javascript:void();"
                                                                        data-toggle="modal" data-target="#modalmaintenance"
                                                                        id="tomboltindakanmaintenance"
                                                                        data-url="{{ url('divisi/maintenance/tindakan', ['id' => $item->kd_maintenance]) }}"><i
                                                                            class="fa fa-cog"></i> Lakukan Tindakan</a>
                                                                @else
                                                                <a class="dropdown-item" href="javascript:void();"
                                                                data-toggle="modal" data-target="#modalmaintenance"
                                                                id="tomboltindakanmaintenance"
                                                                data-url="{{ url('divisi/maintenance/tindakan', ['id' => $item->kd_maintenance]) }}"><i
                                                                    class="fa fa-print"></i> Cetak</a>
                                                                @endif
                                                            @endif
                                                        </div>
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
        </div>
    </div>
    <div class="modal fade" id="modalmaintenance">
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatasdm">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <script src="{{ url('assets/js/app-script.js', []) }}"></script> --}}
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
                        @foreach ($dataperiode as $dataperiode1)
                            "{{ $dataperiode1->bulan }}",
                        @endforeach

                    ],
                    datasets: [{
                        label: 'Banyak Laporan',
                        data: [22, 13, 25, 11, 41, 22, 11, ],
                        backgroundColor: gradientStroke3,
                        hoverBackgroundColor: gradientStroke3
                    }, {
                        label: 'Dapat diperbaiki',
                        data: [25, 18, 22, 15, 22, 18, 26, ],
                        backgroundColor: gradientStroke4,
                        hoverBackgroundColor: gradientStroke4,
                    }, {
                        label: 'Tidak dapat diperbaiki',
                        data: [25, 18, 22, 15, 22, 18, 26, ],
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
        $(document).ready(function() {

            $('#default-datatable').DataTable();

        });
    </script>
@endsection
