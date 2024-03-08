<style>
    .modal {
        padding: 20px;
        !important; //
    }

    .modal .modal-full {
        /* width: 80%; */
        max-width: none;
        /* height: 100%; */
        margin: 0;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="card gradient-shifter">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="w-icon pr-3">
                                <i class="fa fa-money text-white"></i>
                            </div>
                            <div class="media-body pl-3 border-left border-white-2">
                                <h5 class="text-white mb-0">$876,524 <small class="small-font">(-1%)</small></h5>
                                <span class="text-white small-font">Total Revenue</span>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container-7">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="card gradient-forest">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="w-icon pr-3">
                                <i class="fa fa-usd text-white"></i>
                            </div>
                            <div class="media-body pl-3 border-left border-white-2">
                                <h5 class="text-white mb-0">$976,324 <small class="small-font">(-28%)</small></h5>
                                <span class="text-white small-font">Total Profit</span>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container-7">
                        <canvas id="profitChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-4">
                <div class="card gradient-deepblue">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="w-icon pr-3">
                                <i class="fa fa-truck text-white"></i>
                            </div>
                            <div class="media-body pl-3 border-left border-white-2">
                                <h5 class="text-white mb-0">8245 <small class="small-font">(+11%)</small></h5>
                                <span class="text-white small-font">Total Shipments</span>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container-7">
                        <canvas id="shipmentChart"></canvas>
                    </div>
                </div>
            </div>
        </div><!--End Row-->

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">Daftar Entitas Cabang
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
                                    <a class="dropdown-item" href="javascript:void();" data-toggle="modal"
                                        data-target='#modal-admin' id="button-data-pemusnahan-inventaris">Pemusnahan
                                        Barang</a>
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
        </div><!--End Row-->

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
        </div><!--End Row-->

        <div class="row">
            <div class="col-12 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body text-left">
                                <h4 class="text-primary mb-0">28min</h4>
                                <span class="small-font">Avg Loading Time</span>
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
                                <h4 class="text-secondary mb-0">15 tons</h4>
                                <span class="small-font">Avg Loading Weight</span>
                            </div>
                            <div class="w-circle-icon rounded bg-secondary">
                                <i class="fa fa-tasks text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End Row-->


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
                    <div class="card-header">Deliveries by Country</div>
                    <div class="card-body">
                        <div class="chart-container-6">
                            <canvas id="regionchart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End Row-->
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->

</div>
<div class="modal fade" id="modal-admin" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-full">
        <div class="modal-content" id="menu-modal-admin">

        </div>
    </div>
</div>
<!-- Easy Pie Chart JS -->
<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard-logistics.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js', []) }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js', []) }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js', []) }}"></script>
<script>
    $(document).on("click", "#button-data-pemusnahan-inventaris", function(e) {
        e.preventDefault();
        var kode = $(this).data("id");
        $("#menu-modal-admin").html(
            '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
        );
        $.ajax({
                url: "data-pemusnahan-inventaris",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tiket": kode,
                },
                dataType: 'html',
            })
            .done(function(data) {
                $("#menu-modal-admin").html(data);
            })
            .fail(function() {
                Lobibox.notify("error", {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: "top right",
                    icon: "bx bx-x-circle",
                    msg: "Gagal",
                });
            });
    });
</script>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatablesubbarang').DataTable();


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
</script>
