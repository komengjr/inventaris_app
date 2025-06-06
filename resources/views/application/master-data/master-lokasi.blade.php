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
                            <h6 class="text-primary fs--1 mb-0 pt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div>
                        <img class="ms-n4 d-none d-lg-block "
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Lokasi Cabang</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Master Lokasi</h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-falcon-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                            type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Menu</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-master-lokasi-lg"
                                id="button-add-nomor-ruangan"><span class="far fa-edit"></span>
                                Tambah Nomor Ruangan</button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item text-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-master-lokasi-lg" id="button-data-master-lokasi"><span
                                    class="far fa-file-alt"></span>
                                Master Lokasi</button>
                            <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                data-bs-target="#modal-peminjaman" id="button-data-order-peminjaman"><span
                                    class="fab fa-stack-overflow"></span>
                                Master Lantai</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Nomor Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Posisi Lantai</th>
                        <th>Totoal barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->nomor_ruangan }}</td>
                            <td>{{ $datas->master_lokasi_name }}</td>
                            <td><span class="badge bg-warning">Coming Soon</span></td>
                            <td>
                                @php
                                    $total = DB::table('inventaris_data')
                                        ->where('id_nomor_ruangan_cbaang', $datas->id_nomor_ruangan_cbaang)
                                        ->count();
                                @endphp
                                {{ $total }} Barang
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-master-lokasi" id="button-data-lokasi-barang"
                                            data-code="{{ $datas->id_nomor_ruangan_cbaang }}"><span
                                                class="fas fa-book"></span>
                                            Data Lokasi Barang
                                        </button>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-master-lokasi-md" id="button-update-data-nomor-ruangan"
                                            data-code="{{ $datas->id_nomor_ruangan_cbaang }}"><span
                                                class="fas fa-edit"></span>
                                            Perubahan Nomor Ruangan
                                        </button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-master-lokasi-md" id="button-update-data-lokasi"
                                            data-code="{{ $datas->id_nomor_ruangan_cbaang }}"><span
                                                class="fas fa-synagogue"></span>
                                            Migrasi Lokasi Ruangan
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-master-lokasi" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-master-lokasi"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-master-lokasi-lg" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-master-lokasi-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-master-lokasi-md" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-master-lokasi-md"></div>
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
        $(document).on("click", "#button-add-nomor-ruangan", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master-lokasi-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_location_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master-lokasi-lg').html(data);
            }).fail(function() {
                $('#menu-master-lokasi-lg').html('eror');
            });
        });
        $(document).on("click", "#button-data-master-lokasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master-lokasi-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_location_data_lokasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master-lokasi-lg').html(data);
            }).fail(function() {
                $('#menu-master-lokasi-lg').html('eror');
            });
        });
        $(document).on("click", "#button-data-lokasi-barang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master-lokasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_location_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master-lokasi').html(data);
            }).fail(function() {
                $('#menu-master-lokasi').html('eror');
            });
        });
        $(document).on("click", "#button-update-data-nomor-ruangan", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master-lokasi-md').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_location_update_no_ruangan') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master-lokasi-md').html(data);
            }).fail(function() {
                $('#menu-master-lokasi-md').html('eror');
            });
        });
        $(document).on("click", "#button-update-data-lokasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master-lokasi-md').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_location_update_location') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master-lokasi-md').html(data);
            }).fail(function() {
                $('#menu-master-lokasi-md').html('eror');
            });
        });

    </script>
@endsection
