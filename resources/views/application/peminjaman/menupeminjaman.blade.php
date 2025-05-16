@extends('layouts.template')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="{{ asset('asset/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Inventaris <span class="text-info fw-medium">Menu Peminjaman</span></h4>
                        </div><img class="ms-n4 d-md-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-md-auto p-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 g-3">
        <div class="col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 pb-3 pb-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-primary">
                                        <span class="fs--2 fas fa-table text-primary"></span>
                                    </div>
                                    <h6 class="mb-0">Data Cabang</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-contact" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-contact"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">100%</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-up text-primary"></span>
                                        <p class="fs--2 mb-0 text-nowrap">0</p>
                                    </div>
                                </div>
                                <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[220,230,150,175,200,170,70,160],"color":"#2c7be5","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#2c7be53A"},{"offset":1,"color":"#2c7be50A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-user text-info"></span></div>
                                    <h6 class="mb-0">Cabang Aktif</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-users" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-users"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">0%</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-up text-success"></span>
                                        <p class="fs--2 mb-0 text-nowrap">0</p>
                                    </div>
                                </div>
                                <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[90,160,150,120,230,155,220,240],"color":"#27bcfd","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#27bcfd3A"},{"offset":1,"color":"#27bcfd0A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-3 pt-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-danger shadow-none me-2 bg-soft-success">
                                        <span class="fs--2 fas fa-bolt text-danger"></span>
                                    </div>
                                    <h6 class="mb-0">Cabang Non Aktif</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-leads" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-leads"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">0%</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-down text-danger"></span>
                                        <p class="fs--2 mb-0 text-nowrap">0</p>
                                    </div>
                                </div>
                                <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[200,150,175,130,150,115,130,100],"color":"#00d27a","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#00d27a3A"},{"offset":1,"color":"#00d27a0A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Data Menu</h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                                data-bs-target="#modal-menu" id="button-add-menu">
                                <span class="fas fa-book fs--2 me-1"></span>Add Menu</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-2">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700">
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Kebutuhan</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Batas Tanggal Peminjaman</th>
                                <th>Status Peminjaman</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $datas)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$datas->tiket_peminjaman}}</td>
                                    <td>{{$datas->nama_kegiatan}}</td>
                                    <td>{{$datas->tgl_pinjam}}</td>
                                    <td>{{$datas->batas_tgl_pinjam}}</td>
                                    <td>{{$datas->status_pinjam}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-4">
            <div class="card">
                <div class="card-header d-flex flex-between-center py-2 border-bottom">
                    <h5 class="mb-0">Table Status Order</h5>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button
                            class="btn btn-falcon-primary text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-most-leads" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-most-leads"><a
                                class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class=" m-2">
                    @foreach ($proses as $prosess)
                        <div class="list-group bg-light mb-2 border border-warning">
                            <a class="list-group-item list-group-item-action flex-column align-items-start p-2 p-sm-3"
                                href="#">
                                <div class="d-flex flex-column flex-sm-row justify-content-between mb-0 mb-md-0">
                                    <h5 class="mb-0">{{ $prosess->m_table_master_name }}</h5><small
                                        class="text-muted">{{ $prosess->m_order_date }}</small>
                                </div>
                                <p class="mb-0">Proses</p><small class="text-muted">{{ $prosess->no_reg_order }}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-menu" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-menu"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-master" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-master"></div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>


    {{-- <script src="{{ asset('assets/img/animated-icons/loading.json') }}"></script> --}}
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-add-menu", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-menu').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_menu_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-menu').html(data);
            }).fail(function() {
                $('#menu-menu').html('eror');
            });

        });
        $(document).on("click", "#button-master-staff", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master').html(data);
            }).fail(function() {
                $('#menu-master').html('eror');
            });

        });
    </script>
@endsection
