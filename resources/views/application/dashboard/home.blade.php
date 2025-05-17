@extends('layouts.template')
@section('base.css')
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
    {{-- <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script> --}}
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center mb-2"><img class="ms-n2"
                            src="{{ asset('asset/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 pt-2">Welcome {{ $cabang->nama_cabang }} </h6>
                            <h4 class="text-primary fw-bold mb-0">Inventaris <span class="text-info fw-medium">Managemen
                                    System</span></h4>
                        </div><img class="ms-n4 d-md-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    {{-- <div class="col-md-auto p-3">

                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 g-3">
        <div class="col-lg-12 col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
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
                                            data-bs-target="#modal-dashboard" id="button-add-barang-non-aset">Tambah Barang Non Aset</a>
                                        <a class="dropdown-item" href="#!">View Barang Non Aset</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-primary"
                                            href="#!">Print</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 far fa-folder text-info"></span></div>
                                    <h6 class="mb-0">122 Barang</h6>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-money-check-alt text-info"></span></div>
                                    <p class="font-sans-serif lh-1 mb-1 fs-2 pe-2">@currency(4030092029) </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fas fa-city text-info"></span></div> --}}
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
                                        <a class="dropdown-item" href="#!">View Barang Aset</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 far fa-folder text-info"></span></div>
                                    <h6 class="mb-0">122 Barang</h6>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-money-check-alt text-info"></span></div>
                                    <p class="font-sans-serif lh-1 mb-1 fs-2 pe-2">@currency(4030092029) </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
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
                                        <a class="dropdown-item" href="#!">Tambah Barang Aset</a>
                                        <a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 far fa-folder text-info"></span></div>
                                    <h6 class="mb-0">122 Barang</h6>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-book text-info"></span></div>
                                    <p class="font-sans-serif lh-1 mb-1 fs-2 pe-2">0 Dokumen</p>
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
        <div class="col-xxl-3">
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
                        <div class="col-md-5 col-xxl-12 mb-xxl-1">
                            <div class="position-relative">
                                <!-- Find the JS file for the following chart at: src/js/charts/echarts/most-leads.js-->
                                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                                <div class="echart-most-leads my-2" data-echart-responsive="true"></div>
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <p class="fs--1 mb-0 text-400 font-sans-serif fw-medium">Total</p>
                                    <p class="fs-3 mb-0 font-sans-serif fw-medium mt-n2">15.6k</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-md-7">
                            <hr class="mx-ncard mb-0 d-md-none d-xxl-block" />
                            @foreach ($klasifikasi as $klasifikasis)
                                <div class="d-flex flex-between-center border-bottom py-1 pt-md-0 pt-xxl-3">
                                    <div class="d-flex"><img class="me-2" src="{{ asset('asset/img/crm/other.svg') }}"
                                            width="16" height="16" alt="..." />
                                        <h6 class="text-700 mb-0">{{ $klasifikasis->inventaris_cat_name }} </h6>
                                    </div>
                                    <h6 class="text-700 mb-3">@currency(4539000)</h6>
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
                @for ($i = 0; $i < 10; $i++)
                    <div class="col-6 col-md-3 col-lg-2 col-xxl-1 mb-1">
                        <div class="card-body border h-100 ">

                            <div class="bg-white dark__bg-1100 border p-3 h-100 border-primary"><a href="#"><img
                                        class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                        src="{{ asset('ruangan.png') }}" alt="" width="100" /></a>
                                <h6 class="mb-1"><a href="#">Ruang {{ $i }}</a>
                                </h6>
                                <p class="fs--2 mb-1"><a class="text-700" href="#!">Harvard Korea Society</a>
                                </p>
                            </div>

                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-dashboard" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-dashboard"></div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('vendors/chart/chart.min.js') }}"></script> --}}
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
    </script>
@endsection
