@extends('layouts.app')
@section('content')
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
                                    <h4 class="text-primary mb-0">0 Item</h4>
                                    <span class="small-font">Avg Loading Time</span>
                                </div>
                                <div class="w-circle-icon rounded bg-primary" style="cursor: pointer;">
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
                                    <h4 class="text-secondary mb-0">15 Item</h4>
                                    <span class="small-font">Avg Loading Weight</span>
                                </div>
                                <div class="w-circle-icon rounded bg-secondary">
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
            <div class="row" >
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
                                        {{-- <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a> --}}
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();" data-toggle="modal" data-target="#modalmutasi" id="ordertiketmutasi" data-url={{ url('divisi/datamutasi/tambahdata', []) }}><i class="fa fa-ticket"></i> Order Tiket Mutasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pb-5">
                            <table class="table styled-table align-items-center table-flush pb-2" id="default-table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Tiket</th>
                                        <th>Jenis Mutasi</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tanggal Terbit</th>
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
                                            {{$no++}}
                                        </td>
                                        <td>{{$item->kd_mutasi}}</td>
                                        <td></td>
                                        <td>
                                            <span class="badge-dot">
                                                <i class="bg-danger"></i> pending
                                            </span>
                                        </td>
                                        <td>
                                            <div class="progress shadow" style="height: 4px">
                                                <div class="progress-bar gradient-ibiza" role="progressbar"
                                                    style="width: 60%"></div>
                                            </div>
                                        </td>
                                        <td>{{$item->tanggal_buat}}</td>
                                        <td><button class="btn-warning" data-toggle="modal" data-target="#modalmutasi" id="buttondetailmutasibarang" data-url="{{ url('divisi/datamutasi/detaildatamutasi',['id'=>$item->id_mutasi]) }}" ><i class="fa fa-pencil"></i> Update</button></td>
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
    <div class="modal fade" id="modalmutasi">
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatalengkapi">
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
                        "{{$datakategori->kategori_barang}}",
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
                        data: [0,0, 10, 40, 40,200],
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