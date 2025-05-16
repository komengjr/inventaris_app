@extends('layouts.template')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="{{ asset('asset/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Inventaris <span class="text-info fw-medium">Managemen
                                    System</span></h4>
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
        <div class="col-lg-12 col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 pb-3 pb-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-primary">
                                        <span class="fs--2 fas fa-cube text-primary"></span>
                                    </div>
                                    <h6 class="mb-0">Total Inventaris</h6>
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
                                    <p class="font-sans-serif lh-1 mb-1 fs-3 pe-2">@currency(423000000)</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-up text-primary"></span>
                                        <p class="fs--3 mb-0 text-nowrap">123 Barang</p>
                                    </div>
                                </div>
                                {{-- <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[220,230,150,175,200,170,70,160],"color":"#2c7be5","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#2c7be53A"},{"offset":1,"color":"#2c7be50A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fas fa-city text-info"></span></div>
                                    <h6 class="mb-0">Total Aset Cabang</h6>
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
                                    <p class="font-sans-serif lh-1 mb-1 fs-3 pe-2">@currency(4030092029)</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-up text-success"></span>
                                        <p class="fs--3 mb-0 text-nowrap">1635 Barang</p>
                                    </div>
                                </div>
                                {{-- <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[90,160,150,120,230,155,220,240],"color":"#27bcfd","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#27bcfd3A"},{"offset":1,"color":"#27bcfd0A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 pt-3 pt-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-success">
                                        <span class="fs--2 fas fa-bolt text-success"></span>
                                    </div>
                                    <h6 class="mb-0">Data KSO</h6>
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
                                    <p class="font-sans-serif lh-1 mb-1 fs-3 pe-2">0 Doc</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-down text-danger"></span>
                                        <p class="fs--3 mb-0 text-nowrap">12 Barang</p>
                                    </div>
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
                                <div class="d-flex flex-between-center border-bottom py-3 pt-md-0 pt-xxl-3">
                                    <div class="d-flex"><img class="me-2" src="{{ asset('asset/img/crm/other.svg') }}"
                                            width="16" height="16" alt="..." />
                                        <h6 class="text-700 mb-0">{{ $klasifikasis->kategori_barang }} </h6>
                                    </div>
                                    <h6 class="text-700 mb-0">12%</h6>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                {{-- <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block py-2"
                        href="#!">Primary<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div> --}}
            </div>
        </div>
        {{-- <div class="col-md-12 col-xxl-8">
            <div class="card h-100">
                <div class="card-header d-flex flex-between-center border-bottom border-200 py-2">
                    <h6 class="mb-0">Deal Forecast</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="crm-deal-forecast-bar" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-deal-forecast-bar">
                            <a class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center">
                    <div class="w-100">
                        <h3 class="text-700 mb-6">$90,439</h3>
                        <div class="progress overflow-visible rounded-3 font-sans-serif fw-medium fs--1 mt-xxl-auto"
                            style="height: 20px;">
                            <div class="progress-bar overflow-visible bg-progress-gradient border-end border-white border-2 rounded-end rounded-pill text-start"
                                role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                aria-valuemax="100"><span class="text-700 mt-n6">$47.8k</span></div>
                            <div class="progress-bar overflow-visible bg-soft-primary border-end border-white border-2 text-start"
                                role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                aria-valuemax="100"><span class="text-700 mt-n6">$20.2k</span></div>
                            <div class="progress-bar overflow-visible bg-soft-info border-end border-white border-2 text-start"
                                role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0"
                                aria-valuemax="100"><span class="text-700 mt-n6">$18k</span></div>
                            <div class="progress-bar overflow-visible bg-info rounded-start rounded-pill text-start"
                                role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="15"
                                aria-valuemax="100"><span class="text-700 mt-n6">$16k</span></div>
                        </div>
                        <div class="row fs--1 fw-semi-bold text-500 mt-3 g-0 mt-3 mt-xxl-4">
                            <div class="col-auto d-flex align-items-center pe-3"><span
                                    class="dot bg-primary"></span><span>Closed won</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(100%)</span></div>
                            <div class="col-auto d-flex align-items-center pe-3"><span
                                    class="dot bg-soft-primary"></span><span>Contact sent</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(5%)</span></div>
                            <div class="col-auto d-flex align-items-center pe-3"><span
                                    class="dot bg-soft-info"></span><span>Pending</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(5%)</span></div>
                            <div class="col-auto d-flex align-items-center"><span
                                    class="dot bg-info"></span><span>Qualified</span><span
                                    class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(20%)</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-xxl-4">
            <div class="card h-100">
                <div class="card-header d-flex flex-between-center border-bottom py-2">
                    <h6 class="mb-0">Deal Storage Funnel</h6><a class="btn btn-link btn-sm px-0 shadow-none"
                        href="#!">View Details<span class="fas fa-chevron-right ms-1 fs--2"></span></a>
                </div>
                <div class="card-body">
                    <div class="row rtl-row-reverse g-1">
                        <div class="col">
                            <div class="d-flex flex-between-center rtl-row-reverse">
                                <h6 class="fs--2 text-500">Deal Stage</h6>
                                <h6 class="fs--2 text-500">Count of Deals</h6>
                            </div>
                        </div>
                        <div class="col-auto">
                            <h6 class="fs--2 text-500">Conversion </h6>
                        </div>
                    </div>
                    <!-- Find the JS file for the following chart at: src/js/charts/echarts/deal-storage-funnel.js-->
                    <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                    <div class="echart-deal-storage-funnel" data-echart-responsive="true"
                        data-options='{"data":[7,10,13,19,19],"dataAxis1":["Processing","Contact won","Contact Sent","Qualified to Buy","Created"],"dataAxis2":["50%","70%","76%","68%","99%"]}'>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-xxl-6">
            <div class="card h-100">
                <div class="card-header d-flex flex-between-center py-2">
                    <h6 class="mb-0">Deal Closed vs Goal</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="crm-closed-vs-goal" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-closed-vs-goal"><a
                                class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Find the JS file for the following chart at: src/js/charts/echarts/closed-vs-goal.js-->
                    <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                    <div class="echart-closed-vs-goal" data-echart-responsive="true"></div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-xxl-6">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h6 class="mb-0">Deal Forecast by Owner</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive scrollbar">
                        <table class="table mb-0 fs--1 border-200 table-borderless">
                            <thead class="bg-light">
                                <tr class="text-800 bg-200">
                                    <th class="text-nowrap">Owner</th>
                                    <th class="text-center text-nowrap">Qualified to buy</th>
                                    <th class="text-center text-nowrap">Appointment </th>
                                    <th class="text-end text-nowrap">Contact sent</th>
                                    <th class="pe-card text-end text-nowrap">Closed won</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-bottom border-200">
                                    <td class="align-middle font-sans-serif fw-medium text-nowrap"><a
                                            href="../app/e-commerce/customer-details.html">John oliver</a></td>
                                    <td class="align-middle text-center">1000</td>
                                    <td class="align-middle text-center">$2600</td>
                                    <td class="align-middle text-center">$3523</td>
                                    <td class="align-middle text-end">$1311</td>
                                </tr>
                                <tr class="border-bottom border-200">
                                    <td class="align-middle font-sans-serif fw-medium text-nowrap"><a
                                            href="../app/e-commerce/customer-details.html">Sean Paul</a></td>
                                    <td class="align-middle text-center">1500</td>
                                    <td class="align-middle text-center">$1600</td>
                                    <td class="align-middle text-center">$3523</td>
                                    <td class="align-middle text-end">$2311</td>
                                </tr>
                                <tr class="border-bottom border-200">
                                    <td class="align-middle font-sans-serif fw-medium text-nowrap"><a
                                            href="../app/e-commerce/customer-details.html">Brad Shaw</a></td>
                                    <td class="align-middle text-center">1400</td>
                                    <td class="align-middle text-center">$2200</td>
                                    <td class="align-middle text-center">$3523</td>
                                    <td class="align-middle text-end">$3311</td>
                                </tr>
                                <tr>
                                    <td class="align-middle font-sans-serif fw-medium text-nowrap"><a
                                            href="../app/e-commerce/customer-details.html">Max Payne</a></td>
                                    <td class="align-middle text-center">6600</td>
                                    <td class="align-middle text-center">$2220</td>
                                    <td class="align-middle text-center">$3523</td>
                                    <td class="align-middle text-end">$1511</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-light">
                                <tr class="text-700 fw-bold">
                                    <td>Total</td>
                                    <td class="text-center">$6359</td>
                                    <td class="text-center"> $8151</td>
                                    <td class="text-center"> $9174</td>
                                    <td class="pe-card text-end"> $12587</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>


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
                            <div class="col">
                                <input class="form-control form-control-sm" type="text" placeholder="Search..." />
                            </div>
                            <div class="col d-md-block d-none">
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
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                    class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                    src="{{ asset('asset/img/team/2.jpg') }}" alt="" width="100" /></a>
                            <h6 class="mb-1"><a href="#">Kit Harington</a>
                            </h6>
                            <p class="fs--2 mb-1"><a class="text-700" href="#!">Harvard Korea Society</a></p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
