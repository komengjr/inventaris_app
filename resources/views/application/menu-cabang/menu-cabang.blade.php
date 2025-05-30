@extends('layouts.template')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">Showing 1-24 of 205 Products</h6>
                </div>
                <div class="col-sm-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">
                            <form class="row gx-2">
                                <div class="col-auto"><small>Sort by:</small></div>
                                <div class="col-auto">
                                    <select class="form-select form-select-sm" aria-label="Bulk actions">
                                        <option selected="">Best Match</option>
                                        <option value="Refund">Newest</option>
                                        <option value="Delete">Price</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto pe-0">
                            <a class="text-600 px-1" href="../../../app/e-commerce/product/product-list.html"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Product List"><span
                                    class="fas fa-list-ul"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                @foreach ($data as $datas)
                    <div class="mb-4 col-md-6 col-lg-4 ">
                        <div class="border border-primary rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                            <div class="overflow-hidden">
                                {{-- <div class="position-relative rounded-top overflow-hidden">
                                    <a class="d-block" href="../../../app/e-commerce/product/product-details.html"><img
                                            class="img-fluid rounded-top" src="{{ asset('asset/img/products/7.jpg') }}"
                                            alt="" /></a>
                                </div> --}}
                                <div class="p-3">
                                    <h5 class="fs-0">
                                        <a class="text-dark" href="#l">{{ $datas->nama_cabang }}</a>
                                    </h5>
                                    <p class="fs--1 mb-1">
                                        <a class="text-500" href="#!">{{ $datas->alamat }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center px-3">
                                <div>
                                    <p class="fs--1 mb-1">
                                        Phone : <strong>{{ $datas->phone }}</strong>
                                    </p>
                                    <p class="fs--1 mb-1">
                                        Entitas : <strong class="text-success">{{ $datas->nama_entitas_cabang }}</strong>
                                    </p>
                                </div>
                                <div>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-warning" id="btnGroupVerticalDrop2" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-align-left" data-fa-transform="shrink-3"></span>
                                            Option</button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-menu-cabang" id="button-data-barang-cabang"
                                                data-code="{{ $datas->kd_cabang }}"><span class="fas fa-swatchbook"></span>
                                                Data Barang Cabang</button>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-menu-cabang"
                                                id="button-data-peminjaman-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                                    class="far fa-address-card"></span>
                                                Data Peminjaman Cabang</button>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-menu-cabang"
                                                id="button-data-mutasi-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                                    class="fab fa-expeditedssl"></span>
                                                Data Mutasi Cabang</button>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-menu-cabang"
                                                id="button-data-srockopname-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                                    class="fab fa-elementor"></span>
                                                Data Stockopname Cabang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer bg-light d-flex justify-content-center">
            <div>
                <button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Prev">
                    <span class="fas fa-chevron-left"></span></button><a
                    class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a><a
                    class="btn btn-sm btn-falcon-default me-2" href="#!">2</a><a
                    class="btn btn-sm btn-falcon-default me-2" href="#!">
                    <span class="fas fa-ellipsis-h"></span></a><a class="btn btn-sm btn-falcon-default me-2"
                    href="#!">35</a>
                <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Next">
                    <span class="fas fa-chevron-right"> </span>
                </button>
            </div>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-menu-cabang" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
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
    <div class="modal fade" id="modal-menu-cabang-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-menu-cabang-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-menu-cabang-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-menu-cabang-xl"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>

    <script>
        $(document).on("click", "#button-data-barang-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_cabang_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
        $(document).on("click", "#button-data-peminjaman-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_cabang_data_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
        $(document).on("click", "#button-data-mutasi-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_cabang_data_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
        $(document).on("click", "#button-data-srockopname-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_cabang_data_stockopname') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
    </script>
@endsection
