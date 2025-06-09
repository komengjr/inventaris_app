@extends('layouts.template')
@section('base.css')
    <style>
        #button-view-data-lokasi {
            cursor: pointer;
        }

        #button-view-data-lokasi:hover {
            background: blanchedalmond;
        }
    </style>
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border border-primary">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="{{ asset('img/icon/icon.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to {{ $cabang->nama_cabang }}</h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-1">Support By : </h6>
                        <h4 class="text-primary fw-bold mb-0">
                            <img class="" src="{{ asset('vendor/pramita.png') }}" alt="" width="90" />
                            <img class="ms-1" src="{{ asset('vendor/sima.jpeg') }}" alt="" width="80" />
                            <img class="ms-1" src="{{ asset('vendor/prospek.png') }}" alt="" width="80" />
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-0 py-lg-2">
                    <div class="row">
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-2">
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fas fa-city text-info"></span></div> --}}
                                    <h6 class="mb-0"><span class="badge bg-primary">Total Non Aset Cabang</span></h6>
                                </div>

                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-falcon-primary text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-users" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-users">
                                        <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#modal-dashboard" id="button-add-barang-non-aset">Tambah Barang
                                            Non Aset</a>
                                        <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#modal-dashboard" id="button-data-barang-non-aset">View Barang
                                            Non Aset</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-primary" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#modal-dashboard-lg" id="button-export-data-non-aset"><span
                                                class="fas fa-file-export"></span>
                                            Export Data Non Aset</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-warning shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-shipping-fast text-info"></span></div>
                                    <h6 class="mb-0">{{ $datanonaset }} Barang</h6>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-money-check-alt text-info"></span></div>
                                    <p class="font-sans-serif lh-1 mb-1 fs-2 pe-2">@currency($nonaset) </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-2">
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0"><span class="badge bg-primary">Total Aset Cabang</span></h6>
                                </div>

                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-falcon-primary text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-users" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-users">
                                        <a class="dropdown-item" href="#!">Tambah Barang Aset</a>
                                        <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#modal-dashboard" id="button-data-barang-aset">View Barang
                                            Aset</a>
                                        <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#modal-dashboard" id="button-data-doc-depresiasi">Data
                                            Depresiasi</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-primary"
                                            data-bs-toggle="modal" data-bs-target="#modal-dashboard-lg" href="#!"
                                            id="button-export-data-aset"><span class="fas fa-file-export"></span> Export
                                            Data Aset</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-warning shadow-none me-2 bg-soft-info"><span
                                            class="fs--1 fab fa-wpforms text-info"></span></div>
                                    <h6 class="mb-0">{{ $dataaset }} Barang</h6>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-money-check-alt text-info"></span></div>
                                    <p class="font-sans-serif lh-1 mb-1 fs-2 pe-2">@currency($aset) </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 border-lg-0 py-3 py-lg-2">
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fas fa-city text-info"></span></div> --}}
                                    <h6 class="mb-0"><span class="badge bg-primary">Total Data KSO</span></h6>
                                </div>

                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-falcon-primary text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-users" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-users">
                                        <a class="dropdown-item" href="#!">Tambah Barang KSO</a>
                                        <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#modal-dashboard" id="button-data-barang-kso">View Data
                                            KSO</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-primary"
                                            href="#!"><span class="fas fa-file-export"></span> Export Data KSO</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-warning shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 far fa-folder text-info"></span></div>
                                    <h6 class="mb-0">{{ $datakso }} Barang</h6>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-book text-info"></span></div>
                                    <p class="font-sans-serif lh-1 mb-1 fs-2 pe-2">{{ $documentkso }} Dokumen</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header d-flex flex-between-center ps-0 py-0 border-bottom">
                    <ul class="nav nav-tabs border-0 flex-nowrap tab-active-caret" id="crm-revenue-chart-tab"
                        role="tablist" data-tab-has-echarts="data-tab-has-echarts">
                        <li class="nav-item" role="presentation"><a class="nav-link py-3 mb-0 active"
                                id="crm-revenue-tab" data-bs-toggle="tab" href="#crm-revenue" role="tab"
                                aria-controls="crm-revenue" aria-selected="true">Revenue</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link py-3 mb-0" id="crm-users-tab"
                                data-bs-toggle="tab" href="#crm-users" role="tab" aria-controls="crm-users"
                                aria-selected="false">Users</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link py-3 mb-0" id="crm-deals-tab"
                                data-bs-toggle="tab" href="#crm-deals" role="tab" aria-controls="crm-deals"
                                aria-selected="false">Deals</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link py-3 mb-0" id="crm-profit-tab"
                                data-bs-toggle="tab" href="#crm-profit" role="tab" aria-controls="crm-profit"
                                aria-selected="false">Profit</a></li>
                    </ul>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-session-by-country" data-bs-toggle="dropdown"
                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"
                            aria-labelledby="dropdown-session-by-country"><a class="dropdown-item"
                                href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-1">
                        <div class="col-xxl-3">
                            <div class="row g-0 my-2">
                                <div class="col-md-6 col-xxl-12">
                                    <div class="border-xxl-bottom border-xxl-200 mb-2">
                                        <h2 class="text-primary">$37,950</h2>
                                        <p class="fs--2 text-500 fw-semi-bold mb-0"><span
                                                class="fas fa-circle text-primary me-2"></span>Closed Amount</p>
                                        <p class="fs--2 text-500 fw-semi-bold"><span
                                                class="fas fa-circle text-warning me-2"></span>Revenue Goal</p>
                                    </div>
                                    <div class="form-check form-check-inline me-2">
                                        <input class="form-check-input" id="crmInbound" type="radio" name="bound"
                                            value="inbound" Checked="Checked" />
                                        <label class="form-check-label" for="crmInbound">Inbound</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="outbound" type="radio" name="bound"
                                            value="outbound" />
                                        <label class="form-check-label" for="outbound">Outbound</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-12 py-2">
                                    <div class="row mx-0">
                                        <div class="col-6 border-end border-bottom py-3">
                                            <h5 class="fw-normal text-600">$4.2k</h5>
                                            <h6 class="text-500 mb-0">Email</h6>
                                        </div>
                                        <div class="col-6 border-bottom py-3">
                                            <h5 class="fw-normal text-600">$5.6k</h5>
                                            <h6 class="text-500 mb-0">Social</h6>
                                        </div>
                                        <div class="col-6 border-end py-3">
                                            <h5 class="fw-normal text-600">$6.7k</h5>
                                            <h6 class="text-500 mb-0">Call</h6>
                                        </div>
                                        <div class="col-6 py-3">
                                            <h5 class="fw-normal text-600">$2.3k</h5>
                                            <h6 class="text-500 mb-0">Other</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-9">
                            <div class="tab-content">
                                <!-- Find the JS file for the following chart at: src/js/charts/echarts/crm-revenue.js-->
                                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                                <div class="tab-pane active" id="crm-revenue" role="tabpanel"
                                    aria-labelledby="crm-revenue-tab">
                                    <div class="echart-crm-revenue" data-echart-responsive="true"
                                        data-echart-tab="data-echart-tab" style="height:320px;"></div>
                                </div>
                                <div class="tab-pane" id="crm-users" role="tabpanel" aria-labelledby="crm-users-tab">
                                    <div class="echart-crm-users" data-echart-responsive="true"
                                        data-echart-tab="data-echart-tab" style="height:320px;"></div>
                                </div>
                                <div class="tab-pane" id="crm-deals" role="tabpanel" aria-labelledby="crm-deals-tab">
                                    <div class="echart-crm-deals" data-echart-responsive="true"
                                        data-echart-tab="data-echart-tab" style="height:320px;"></div>
                                </div>
                                <div class="tab-pane" id="crm-profit" role="tabpanel" aria-labelledby="crm-profit-tab">
                                    <div class="echart-crm-profit" data-echart-responsive="true"
                                        data-echart-tab="data-echart-tab" style="height:320px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header d-flex flex-between-center py-2 border-bottom">
                    <h6 class="mb-0">Klasifikasi Data Inventaris</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
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
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="row align-items-center">
                        <div class="col-md-5 ">
                            <div class="position-relative">
                                <div class="echart-most-leads my-2" data-echart-responsive="true"></div>
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <p class="fs--1 mb-0 text-400 font-sans-serif fw-medium">Total</p>
                                    <p class="fs-3 mb-0 font-sans-serif fw-medium mt-n2">
                                        {{ $datanonaset + $dataaset }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <hr class="mx-ncard mb-0 d-md-none d-xxl-block" />
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($klasifikasi as $klasifikasis)
                                <div class="d-flex flex-between-center border-bottom py-1 pt-md-0 pt-xxl-3">
                                    <div class="d-flex"><img class="me-2" src="{{ asset('img/icon/icon.png') }}"
                                            width="16" height="16" alt="..." />
                                        <a href="#" id="button-show-barang-klasifikasi" data-bs-toggle="modal" data-bs-target="#modal-dashboard" data-code="{{$klasifikasis->inventaris_cat_code }}"><h6 class="text-700 mb-0">{{ $klasifikasis->inventaris_cat_name }} </h6></a>
                                    </div>
                                    @php
                                        $jumlah = 0;
                                        $jumlah = DB::table('inventaris_data')
                                            ->join(
                                                'inventaris_klasifikasi',
                                                'inventaris_klasifikasi.inventaris_klasifikasi_code',
                                                '=',
                                                'inventaris_data.inventaris_klasifikasi_code',
                                            )
                                            ->join(
                                                'inventaris_cat',
                                                'inventaris_cat.inventaris_cat_code',
                                                '=',
                                                'inventaris_klasifikasi.inventaris_cat_code',
                                            )
                                            ->where(
                                                'inventaris_cat.inventaris_cat_code',
                                                $klasifikasis->inventaris_cat_code,
                                            )
                                            ->where('inventaris_data.inventaris_data_cabang', Auth::user()->cabang)
                                            ->sum('inventaris_data.inventaris_data_harga');
                                    @endphp
                                    <h6 class="text-700 mb-3">@currency($jumlah)</h6>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                {{-- <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block py-2"
                        href="#!">Primary<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div> --}}
            </div>
        </div>
    </div>
    {{-- LOKASI RUANGAN  --}}
    <div class="card">
        <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" id="followers">Lokasi Ruangan<span class="d-none d-sm-inline-block">(233)</span>
                    </h5>
                </div>
                <div class="col">
                    <form>
                        <div class="row g-0">

                            <div class="col d-md-block">
                                <select class="form-select form-select-sm ms-2" aria-label=".form-select-sm example">
                                    <option selected="selected">Semua Lantai</option>
                                    <option>Lantai 1</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body bg-light px-1 py-0">
            <div class="row g-0 text-center fs--1">
                @foreach ($ruangan as $ruangans)
                    <div class="col-6 col-md-3 col-lg-2 mb-1">
                        <div class="card-body border h-100 " id="button-view-data-lokasi"
                            data-code="{{ $ruangans->id_nomor_ruangan_cbaang }}" data-bs-toggle="modal"
                            data-bs-target="#modal-dashboard">

                            <div class="bg-white dark__bg-1100 border p-3 h-100 border-primary"><a href="#"><img
                                        class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                        src="{{ asset('ruangan.png') }}" alt="" width="100" /></a>
                                <h6 class="mb-1"><a href="#">{{ $ruangans->master_lokasi_name }}</a>
                                </h6>
                                <p class="fs--2 mb-0">Nomor Ruangan : <span
                                        class="badge bg-primary m-1">{{ $ruangans->nomor_ruangan }}</span></p>
                                @php
                                    $total = DB::table('inventaris_data')
                                        ->where('id_nomor_ruangan_cbaang', $ruangans->id_nomor_ruangan_cbaang)
                                        ->count();
                                @endphp
                                <p class="fs--2 mb-0">Total Barang : {{ $total }}</p>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-dashboard" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-dashboard"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-dashboard-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-dashboard-lg"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>

    <script>
        $(document).on("click", "#button-add-barang-non-aset", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-dashboard').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard').html(data);
            }).fail(function() {
                $('#menu-dashboard').html('eror');
            });

        });
        $(document).on("click", "#button-show-barang-klasifikasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-dashboard').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_data_barang_klasifikasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard').html(data);
            }).fail(function() {
                $('#menu-dashboard').html('eror');
            });

        });
        $(document).on("click", "#button-data-barang-non-aset", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-dashboard').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_data_non_aset') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard').html(data);
            }).fail(function() {
                $('#menu-dashboard').html('eror');
            });

        });
        $(document).on("click", "#button-export-data-non-aset", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-dashboard-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_export_data_non_aset') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard-lg').html(data);
            }).fail(function() {
                $('#menu-dashboard-lg').html('eror');
            });

        });
        $(document).on("click", "#button-export-data-aset", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-dashboard-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_export_data_aset') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard-lg').html(data);
            }).fail(function() {
                $('#menu-dashboard-lg').html('eror');
            });

        });
        $(document).on("click", "#button-data-barang-aset", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-dashboard').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_data_aset') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard').html(data);
            }).fail(function() {
                $('#menu-dashboard').html('eror');
            });

        });
        $(document).on("click", "#button-data-barang-kso", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-dashboard').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_data_kso') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard').html(data);
            }).fail(function() {
                $('#menu-dashboard').html('eror');
            });

        });
        $(document).on("click", "#button-data-doc-depresiasi", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-dashboard').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_data_depresiasi_aset') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard').html(data);
            }).fail(function() {
                $('#menu-dashboard').html('eror');
            });

        });
        $(document).on("click", "#button-view-data-lokasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-dashboard').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_lokasi_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-dashboard').html(data);
            }).fail(function() {
                $('#menu-dashboard').html('eror');
            });

        });
        $(document).on("click", "#button-print-barcode-page", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            var page = document.getElementById("page").value;
            if (page == "-") {
                alert('eror');
            } else {
                $("#menu-data-lokasi-barang").html(
                    '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
                );
                $.ajax({
                        url: "{{ route('masteradmin_cabang_data_lokasi_print_barcode') }}",
                        type: "POST",
                        cache: false,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                            "page": page,
                        },
                        dataType: 'html',
                    })
                    .done(function(data) {
                        $("#menu-data-lokasi-barang").html(
                            '<iframe src="data:application/pdf;base64, ' +
                            data +
                            '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                        );
                    })
                    .fail(function() {
                        alert('sasdads');
                    });
            }
        });
        $(document).on("click", "#button-metode-export-data", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            var option = document.getElementById("option").value;
            $("#menu-data-export-barang-non-aset").html(
                '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
            );
            if (option == "-") {
                alert('eror');
            } else if (option == "data") {
                $.ajax({
                    url: "{{ route('dashboard_export_data_non_aset_data') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "option": option,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $("#menu-data-export-barang-non-aset").html(data);
                }).fail(function() {
                    alert('sasdads');
                });
            } else if (option == "excel") {
                $.ajax({
                    url: "{{ route('dashboard_export_data_non_aset_excel') }}",
                    type: "GET",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "option": option,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    window.location.replace("{{ route('dashboard_export_data_non_aset_excel') }}");
                    $("#menu-data-export-barang-non-aset").html('done');
                }).fail(function() {
                    alert('error');
                });
            } else {
                $.ajax({
                    url: "{{ route('dashboard_export_data_non_aset_pdf') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "option": option,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $("#menu-data-export-barang-non-aset").html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                    );
                }).fail(function() {
                    alert('error');
                });
            }
        });
        $(document).on("click", "#button-metode-export-data-aset", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            var option = document.getElementById("option").value;
            $("#menu-data-export-barang-non-aset").html(
                '<div style="text-align: center; padding:2%;"><div class="spinner-border spinner-sm" role="status" > <span class="sr-only">Loading...</span> </div></div>'
            );
            if (option == "-") {
                alert('eror');
            } else if (option == "data") {
                $.ajax({
                    url: "{{ route('dashboard_export_data_aset_data') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "option": option,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $("#menu-data-export-barang-non-aset").html(data);
                }).fail(function() {
                    alert('sasdads');
                });
            } else if (option == "excel") {
                $.ajax({
                    url: "{{ route('dashboard_export_data_aset_excel') }}",
                    type: "GET",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "option": option,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    window.location.replace("{{ route('dashboard_export_data_aset_excel') }}");
                    $("#menu-data-export-barang-non-aset").html('done');
                }).fail(function() {
                    alert('error');
                });
            } else {
                $.ajax({
                    url: "{{ route('dashboard_export_data_aset_pdf') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "option": option,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $("#menu-data-export-barang-non-aset").html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                    );
                }).fail(function() {
                    alert('error');
                });
            }
        });
        $(document).on("click", "#button-document-data-kso", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-data-barang-kso').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_data_kso_document') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-data-barang-kso').html(data);
            }).fail(function() {
                $('#menu-data-barang-kso').html('eror');
            });

        });
        $(document).on("click", "#button-update-data-barang-lokasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-data-barang-lokasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('dashboard_data_lokasi_detail') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-data-barang-lokasi').html(data);
            }).fail(function() {
                $('#menu-data-barang-lokasi').html('eror');
            });

        });
        $(document).on("click", "#button-simpan-data-non-aset", function(e) {
            e.preventDefault();
            var data = $("#form-add-data-non-aset").serialize();
            var nama = document.getElementById("nama_barang").value;
            var klasifikasi = document.getElementById("klasifikasi").value;
            var tgl_beli = document.getElementById("tgl_beli").value;
            var harga_perolehan = document.getElementById("dengan-rupiah").value;
            var suplier = document.getElementById("suplier").value;
            var lokasi = document.getElementById("lokasi").value;
            // var merk = document.getElementById("merk").value;
            // var type = document.getElementById("type").value;
            // var seri = document.getElementById("seri").value;
            $('#menu-simpan-data-non-aset').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            if (nama == "" || klasifikasi == "" || tgl_beli == "" || harga_perolehan == "" || suplier == "" ||
                lokasi == "") {
                alert('eror');
                $('#menu-simpan-data-non-aset').html(
                    '<button type="submit" class="btn btn-outline-success" id="button-simpan-data-non-aset"><iclass="fa fa-save"></i> Simpan Data</button>'
                    );
            } else {
                $.ajax({
                    url: "{{ route('dashboard_add_data_non_aset') }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                    },
                    type: "POST",
                    cache: false,
                    data: data,
                    dataType: 'html',
                }).done(function(data) {
                    $('#menu-simpan-data-non-aset').html(data);
                    location.reload();
                }).fail(function() {
                    $('#menu-simpan-data-non-aset').html('eror');
                });
            }
        });
        $(document).on("click", "#button-simpan-update-data-inventaris", function(e) {
            e.preventDefault();
            var data = $("#form-update-data-inventaris").serialize();
            var nama = document.getElementById("nama_barang").value;
            var klasifikasi = document.getElementById("klasifikasi").value;
            var tgl_beli = document.getElementById("tgl_beli").value;
            var harga_perolehan = document.getElementById("dengan-rupiah").value;
            var suplier = document.getElementById("suplier").value;
            var lokasi = document.getElementById("lokasi").value;
            // var merk = document.getElementById("merk").value;
            // var type = document.getElementById("type").value;
            // var seri = document.getElementById("seri").value;
            $('#menu-simpan-data-inventaris').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            if (nama == "" || klasifikasi == "" || tgl_beli == "" || harga_perolehan == "" || suplier == "" ||
                lokasi == "") {
                alert('eror');
                $('#menu-simpan-data-inventaris').html(
                    '<button type="submit" class="btn btn-outline-success" id="button-simpan-data-non-aset"><iclass="fa fa-save"></i> Simpan Data</button>'
                    );
            } else {
                $.ajax({
                    url: "{{ route('dashboard_update_data_inventaris') }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                    },
                    type: "POST",
                    cache: false,
                    data: data,
                    dataType: 'html',
                }).done(function(data) {
                    $('#menu-simpan-data-inventaris').html(data);
                    location.reload();
                }).fail(function() {
                    $('#menu-simpan-data-inventaris').html('eror');
                });
            }
        });
    </script>
    <script>
        var mostLeadsInit = function mostLeadsInit() {
            var ECHART_MOST_LEADS = ".echart-most-leads";
            var $echartMostLeads = document.querySelector(ECHART_MOST_LEADS);
            if ($echartMostLeads) {
                var userOptions = utils.getData($echartMostLeads, "options");
                var chart = window.echarts.init($echartMostLeads);
                var getDefaultOptions = function getDefaultOptions() {
                    return {
                        color: [
                            utils.getColors().primary,
                            utils.getColors().info,
                            utils.getColors().warning,
                            utils.getColors().info, //
                            utils.getGrays()[300],
                        ],
                        tooltip: {
                            trigger: "item",
                            padding: [7, 10],
                            backgroundColor: utils.getGrays()["100"],
                            borderColor: utils.getGrays()["300"],
                            textStyle: {
                                color: utils.getColors().dark,
                            },
                            borderWidth: 1,
                            transitionDuration: 0,
                            formatter: function formatter(params) {
                                return "<strong>"
                                    .concat(params.data.name, ":</strong> ")
                                    .concat(params.percent, " %");
                            },
                        },
                        position: function position(pos, params, dom, rect, size) {
                            return getPosition(pos, params, dom, rect, size);
                        },
                        legend: {
                            show: false,
                        },
                        series: [{
                            type: "pie",
                            radius: ["100%", "67%"],
                            avoidLabelOverlap: false,
                            hoverAnimation: false,
                            itemStyle: {
                                borderWidth: 2,
                                borderColor: utils.getColor("card-bg"),
                            },
                            label: {
                                normal: {
                                    show: false,
                                    position: "center",
                                    textStyle: {
                                        fontSize: "20",
                                        fontWeight: "500",
                                        color: utils.getGrays()["700"],
                                    },
                                },
                                emphasis: {
                                    show: false,
                                },
                            },
                            labelLine: {
                                normal: {
                                    show: false,
                                },
                            },
                            data: [
                                @foreach ($klasifikasi as $klasifikasis)
                                    @php
                                        $data = DB::table('inventaris_data')->join('inventaris_klasifikasi', 'inventaris_klasifikasi.inventaris_klasifikasi_code', '=', 'inventaris_data.inventaris_klasifikasi_code')->where('inventaris_klasifikasi.inventaris_cat_code', $klasifikasis->inventaris_cat_code)->count();
                                    @endphp {
                                        value: {{ $data }},
                                        name: '{{ $klasifikasis->inventaris_cat_name }}',
                                    },
                                @endforeach
                            ],
                        }, ],
                    };
                };
                echartSetOption(chart, userOptions, getDefaultOptions);
            }
        };
        docReady(mostLeadsInit);
    </script>
@endsection
