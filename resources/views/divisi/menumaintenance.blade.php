@extends('layouts.app')
@section('content')
    <div class="row pl-3 pt-2 pb-2">
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
                            <p class="mb-0 small-font text-white">Fleet Efficiency</p>
                        </div>
                        <div class="col-12 col-lg-5 p-3">
                            <ul>
                                <li class="text-white">Total fleet : 63</li>
                                <li class="text-white">On the move : 60</li>
                                <li class="text-white">In Maintenence : 3</li>
                            </ul>
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
                    <li class="list-group-item">Within Time Limit : <span class="badge badge-warning float-right">325</span>
                    </li>
                    <li class="list-group-item">Out of Time Limit : <span class="badge badge-info float-right">45</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">Deliveries by Country</div>
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
                    Recent Order Tables
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
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Completion</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                        class="product-img" />
                                </td>
                                <td>Headphone GL</td>
                                <td>$1,840 USD</td>
                                <td>
                                    <span class="badge-dot">
                                        <i class="bg-danger"></i> pending
                                    </span>
                                </td>
                                <td>
                                    <div class="progress shadow" style="height: 4px">
                                        <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 60%">
                                        </div>
                                    </div>
                                </td>
                                <td>10 July 2018</td>
                            </tr>
                            <tr>
                                <td>
                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                        class="product-img" />
                                </td>
                                <td>Clasic Shoes</td>
                                <td>$1,520 USD</td>
                                <td>
                                    <span class="badge-dot">
                                        <i class="bg-success"></i> completed
                                    </span>
                                </td>
                                <td>
                                    <div class="progress shadow" style="height: 4px">
                                        <div class="progress-bar gradient-ohhappiness" role="progressbar"
                                            style="width: 100%"></div>
                                    </div>
                                </td>
                                <td>12 July 2018</td>
                            </tr>
                            <tr>
                                <td>
                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                        class="product-img" />
                                </td>
                                <td>Hand Watch</td>
                                <td>$1,620 USD</td>
                                <td>
                                    <span class="badge-dot">
                                        <i class="bg-warning"></i> delayed
                                    </span>
                                </td>
                                <td>
                                    <div class="progress shadow" style="height: 4px">
                                        <div class="progress-bar gradient-orange" role="progressbar" style="width: 70%">
                                        </div>
                                    </div>
                                </td>
                                <td>14 July 2018</td>
                            </tr>
                            <tr>
                                <td>
                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                        class="product-img" />
                                </td>
                                <td>Hand Camera</td>
                                <td>$2,220 USD</td>
                                <td>
                                    <span class="badge-dot">
                                        <i class="bg-info"></i> on schedule
                                    </span>
                                </td>
                                <td>
                                    <div class="progress shadow" style="height: 4px">
                                        <div class="progress-bar gradient-scooter" role="progressbar" style="width: 85%">
                                        </div>
                                    </div>
                                </td>
                                <td>16 July 2018</td>
                            </tr>
                            <tr>
                                <td>
                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                        class="product-img" />
                                </td>
                                <td>Iphone-X Pro</td>
                                <td>$9,890 USD</td>
                                <td>
                                    <span class="badge-dot">
                                        <i class="bg-success"></i> completed
                                    </span>
                                </td>
                                <td>
                                    <div class="progress shadow" style="height: 4px">
                                        <div class="progress-bar gradient-ohhappiness" role="progressbar"
                                            style="width: 100%"></div>
                                    </div>
                                </td>
                                <td>17 July 2018</td>
                            </tr>
                            <tr>
                                <td>
                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                        class="product-img" />
                                </td>
                                <td>Ladies Purse</td>
                                <td>$3,420 USD</td>
                                <td>
                                    <span class="badge-dot">
                                        <i class="bg-danger"></i> pending
                                    </span>
                                </td>
                                <td>
                                    <div class="progress shadow" style="height: 4px">
                                        <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 80%">
                                        </div>
                                    </div>
                                </td>
                                <td>18 July 2018</td>
                            </tr>
                        </tbody>
                    </table>
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
                    labels: ["Germany", "France", "Switzerland", "Australia"],
                    datasets: [{
                        backgroundColor: [
                            "#14abef",
                            "#02ba5a",
                            "#d13adf",
                            "#fba540"
                        ],
                        data: [55, 220, 40, 40],
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
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: 'Baik',
                        data: [1005, 800, 1200, 500, 1200, 800, 1160, 1125, 1115, 1110, 1120, 1510],
                        backgroundColor: gradientStroke3,
                        hoverBackgroundColor: gradientStroke3
                    }, {
                        label: 'Maintenance',
                        data: [25, 18, 22, 15, 22, 18, 26, 35, 25, 20, 30, 20],
                        backgroundColor: gradientStroke4,
                        hoverBackgroundColor: gradientStroke4,
                    }, {
                        label: 'Rusak',
                        data: [25, 18, 22, 15, 22, 18, 26, 35, 25, 20, 30, 20],
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
@endsection
