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
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Cabang</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-primary fw-bold">Master Cabang</h5>
                </div>
                <div class="col-auto">

                    <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                        data-bs-target="#modal-category" id="button-add-category">
                        <span class="far fa-plus-square fs--2 me-1"></span>Tambah Cabang Baru</a>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Nama Cabang</th>
                        <th>Kode Cabang</th>
                        <th>Nomor Cabang</th>
                        <th>Entitas Cabang</th>
                        <th>Kota</th>
                        <th>No Handphone</th>
                        <th>Jumlah Barang</th>
                        <th>Notifikasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="fs--2">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->nama_cabang }}</td>
                            <td>{{ $datas->kd_cabang }}</td>
                            <td>{{ $datas->no_cabang }}</td>
                            <td>{{ $datas->nama_entitas_cabang }}</td>
                            <td>{{ $datas->city }}</td>
                            <td>{{ $datas->phone }}</td>
                            <td>
                                @php
                                    $total = DB::table('sub_tbl_inventory')
                                        ->where('kd_cabang', $datas->kd_cabang)
                                        ->count();
                                @endphp
                                {{ $total }}
                            </td>
                            <td>
                                @php
                                    $notif = DB::table('t_no_telegram')->where('kd_cabang', $datas->kd_cabang)->first();
                                @endphp
                                @if ($notif)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-cabang-lg" id="button-edit-data-cabang"
                                            data-code="{{ $datas->kd_cabang }}"><span class="far fa-edit"></span>
                                            Edit Cabang</button>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-cabang"
                                            id="button-data-barang-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                                class="far fa-folder-open"></span> Data Barang
                                            Cabang</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-cabang-lg" id="button-data-lokasi-cabang"
                                            data-code="{{ $datas->kd_cabang }}"><span class="fas fa-map-marked-alt"></span>
                                            Data Lokasi
                                            Cabang</button>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-cabang"
                                            id="button-data-peminjaman-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                                class="fas fa-book-medical"></span> Data Peminjaman
                                            Cabang</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-cabang" id="button-data-stock-opname-cabang"
                                            data-code="{{ $datas->kd_cabang }}"><span class="fas fa-book-open"></span> Data
                                            Stock Opname
                                            Cabang</button>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-cabang-lg" id="button-migrasi-data-cabang"
                                            data-code="{{ $datas->kd_cabang }}"><span class="fas fa-code-branch"></span>
                                            Migrasi Data Cabang</button>


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
        $(document).on("click", "#button-data-barang-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });

        });
        $(document).on("click", "#button-update-data-barang-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#form-data-barang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_update_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#form-data-barang').html(data);
            }).fail(function() {
                $('#form-data-barang').html('eror');
            });

        });
        $(document).on("click", "#button-data-lokasi-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_data_lokasi') }}",
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
        $(document).on("click", "#button-edit-data-lokasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#form-data-lokasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_update_data_lokasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#form-data-lokasi').html(data);
            }).fail(function() {
                $('#form-data-lokasi').html('eror');
            });
        });
        $(document).on("click", "#button-data-barang-lokasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_data_barang_lokasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
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
                url: "{{ route('masteradmin_cabang_data_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
        $(document).on("click", "#button-data-stock-opname-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_data_stock_opname') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
        $(document).on("click", "#button-preview-data-stock-opname", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_preview_data_stock_opname') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cabang').html(data);
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
        $(document).on("click", "#button-migrasi-data-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_migrasi_data_cabang') }}",
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
        $(document).on("click", "#button-clone-data-master-barang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#button-clone-data-master-barang').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_clone_data_master_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#table-master-barang').html(data);
            }).fail(function() {
                $('#table-master-barang').html('eror');
            });
        });
        $(document).on("click", "#button-print-data-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#table-data-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_print_data_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#table-data-peminjaman').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#table-data-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-remove-data-stock-opname", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_remove_data_stock_opname') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                location.reload();
            }).fail(function() {
                $('#menu-cabang').html('eror');
            });
        });
    </script>
    {{-- Export Excel --}}
    <script>
        $(document).on("click", "#button-export-data-non-aset", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#button-export-data-non-aset').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_cabang_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#button-export-data-non-aset').html(data);
            }).fail(function() {
                $('#button-export-data-non-aset').html('eror');
            });

        });
    </script>
@endsection
