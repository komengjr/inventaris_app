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
                        <img class="ms-3 mx-3" src="{{ asset('img/app.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">E - <span class="text-info fw-medium">Aplikasi</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-light d-flex justify-content-center">

        </div>
        <div class="card-body pb-0">
            <div class="row text-center" id="hasil-pencarian-cabang">
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-4" data-bs-toggle="modal" data-bs-target="#modal-aplikasi-xl" id="button-peminjaman-barang">
                    <div class="bg-white dark__bg-1100 p-3"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/peminjaman.png') }}" alt="" width="100"></a>
                        <h6 class="mb-1"><a href="#">Peminjaman Barang</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Technext limited</a></p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-4">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/recycle.png') }}" alt="" width="105"></a>
                        <h6 class="mb-1"><a href="#">Pemusnahan Barang</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Technext limited</a></p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-4" data-bs-toggle="modal" data-bs-target="#modal-aplikasi-xl" id="button-log-maintenance">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#" >
                            <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/maintenance.png') }}" alt="" width="100"></a>
                        <h6 class="mb-1"><a href="#">Maintenance Log</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Technext limited</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light d-flex justify-content-center">

        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-aplikasi" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-aplikasi"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-aplikasi-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-aplikasi-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-aplikasi-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-aplikasi-xl"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>

    <script>
        $(document).on("click", "#button-peminjaman-barang", function(e) {
            e.preventDefault();
            $('#menu-aplikasi-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('aplikasi_app_peminjaman_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-aplikasi-xl').html(data);
            }).fail(function() {
                $('#menu-aplikasi-xl').html('eror');
            });
        });
        $(document).on("click", "#button-log-maintenance", function(e) {
            e.preventDefault();
            $('#menu-aplikasi-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('aplikasi_app_maintenance_log') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-aplikasi-xl').html(data);
            }).fail(function() {
                $('#menu-aplikasi-xl').html('eror');
            });
        });
    </script>
    {{-- REPORT --}}
    <script>
        $(document).on("click", "#button-report-mutasi-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var cabang = $(this).data("cabang");
            $('#table-data-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_cabang_data_mutasi_print') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "cabang": cabang,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#table-data-mutasi').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#table-data-mutasi').html('eror');
            });
        });
    </script>
@endsection
