@extends('layouts.template')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="{{ asset('img/icon/icon.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Akses User</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0"></h6>
                </div>
                <div class="col-sm-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">
                            <div class="row gx-2">
                                <div class="col-auto mb-1">
                                    <small>Accses By User</small>
                                </div>
                                <div class="col-auto mb-1">
                                    <select name="" class="form-select" id="">
                                        <option value="admin">Admin</option>
                                        <option value="dir">Direksi</option>
                                        <option value="sdm">SDM & Umum</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto pe-0 mb-2">
                            <button class="btn btn-falcon-primary" id="button-cari-data-nama-cabang"><span
                                    class="fas fa-search-location"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        @foreach ($menu as $menus)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="col-auto align-self-center">
                                <h5 class="mb-0" data-anchor="data-anchor" id="list-group-with-badge">
                                    {{ $menus->menu_name }}<a class="anchorjs-link " aria-label="Anchor"
                                        data-anchorjs-icon="#" href="#list-group-with-badge"
                                        style="padding-left: 0.375em;"></a></h5>
                            </div>
                            <div class="col-auto ms-auto">

                            </div>
                        </div>
                    </div>
                    @php
                        $sub_menu = DB::table('z_menu_sub')->where('menu_code', $menus->menu_code)->get();
                    @endphp
                    <div class="card-body bg-light">
                        <div class="tab-content">
                            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                aria-labelledby="tab-dom-3e0c5eb1-6a1d-4b72-8120-3f4047238d1e"
                                id="dom-3e0c5eb1-6a1d-4b72-8120-3f4047238d1e">
                                <ul class="list-group">
                                    @foreach ($sub_menu as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $item->menu_sub_name }}<span>
                                                <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                                                    <button class="btn btn-sm btn-falcon-success active"
                                                        data-bs-toggle="pill">Aktif</button>
                                                    <button class="btn btn-sm btn-falcon-danger" data-bs-toggle="pill"
                                                        type="button">Non</button>
                                                </div>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-cabang" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-cabang"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-cabang-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-cabang-lg"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-edit-data-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_edit') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang-lg').html(data);
            }).fail(function() {
                $('#menu-cabang-lg').html('eror');
            });

        });
    </script>
@endsection
