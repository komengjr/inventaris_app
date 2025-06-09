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
                        <h4 class="text-primary fw-bold mb-0">Maintenance <span class="text-info fw-medium">Cabang</span>
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
                    <h5 class="mb-1 text-primary fw-bold">Data Maintenance</h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Option
                            Maintenance</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-maintenance-xl"
                                id="button-add-data-maintenance" data-code="123"><span class="fas fa-swatchbook"></span>
                                Tambah Data Maintenance</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>No Maintenance</th>
                        <th>Nomor Inventaris</th>
                        <th>Nama Barang</th>
                        <th>Pelapor</th>
                        <th>Tgl Laporan</th>
                        <th>Tgl Selesai Laporan</th>
                        <th>Status</th>
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
                            <td>{{ $datas->kd_maintenance }}</td>
                            <td>{{ $datas->inventaris_data_number }}</td>
                            <td>{{ $datas->inventaris_data_name }}</td>
                            <td>{{ $datas->pelapor }}</td>
                            <td>{{ $datas->tgl_mulai }}</td>
                            <td>{{ $datas->tgl_akhir }}</td>
                            <td>
                                @if ($datas->status_maintenance == 0)
                                    <span class="badge bg-danger">Belum di Verifikasi</span>
                                @elseif ($datas->status_maintenance == 1)
                                    <span class="badge bg-warning">Sudah di Verifikasi</span>
                                @elseif ($datas->status_maintenance == 2)
                                    <span class="badge bg-primary">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        @if ($datas->status_maintenance == 0)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-maintenance-md"
                                                id="button-verifikasi-maintenance-barang"
                                                data-code="{{ $datas->kd_maintenance }}"><span
                                                    class="fas fa-swatchbook"></span>
                                                Verifikasi Maintenance</button>
                                        @elseif($datas->status_maintenance == 1)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-maintenance-xl"
                                                id="button-proses-data-maintenance-barang"
                                                data-code="{{ $datas->kd_maintenance }}"><span class="fas fa-compress-arrows-alt"></span>
                                                Penyelesaian Proses Maintenance</button>
                                        @elseif($datas->status_maintenance == 2)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-maintenance-lg"
                                                id="button-cetak-data-maintenance-barang"
                                                data-code="{{ $datas->kd_maintenance }}"><span class="fas fa-print"></span>
                                                Cetak Laporan Maintenance</button>
                                        @endif
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
    <div class="modal fade" id="modal-pemusnahan" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-pemusnahan"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-maintenance-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-maintenance-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-maintenance-md" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-maintenance-md"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-maintenance-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-maintenance-xl"></div>
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
        $(document).on("click", "#button-add-data-maintenance", function(e) {
            e.preventDefault();
            $('#menu-pemusnahan-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_maintenance_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-maintenance-xl').html(data);
            }).fail(function() {
                $('#menu-maintenance-xl').html('eror');
            });
        });
        $(document).on("click", "#button-find-data-barang", function(e) {
            e.preventDefault();
            var data = $("#form-pencarian-data-pemusnahan").serialize();
            $('#menu-data-table-maintenance').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_maintenance_find_data') }}",
                type: "POST",
                cache: false,
                data: data,
                dataType: 'html',
            }).done(function(data) {
                $('#menu-data-table-maintenance').html(data);
            }).fail(function() {
                $('#menu-data-table-maintenance').html('eror');
            });
        });
        $(document).on("click", "#button-pilih-data-barang-maintenance", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-data-table-maintenance').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_maintenance_pilih_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-data-table-maintenance').html(data);
            }).fail(function() {
                $('#menu-data-table-maintenance').html('eror');
            });
        });
        $(document).on("click", "#button-cetak-data-maintenance-barang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-maintenance-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_maintenance_print_laporan') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-maintenance-lg').html(data);
            }).fail(function() {
                $('#menu-maintenance-lg').html('eror');
            });
        });
        $(document).on("click", "#button-verifikasi-maintenance-barang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-maintenance-md').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_maintenance_verifikasi_data_maintenance') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-maintenance-md').html(data);
            }).fail(function() {
                $('#menu-maintenance-md').html('eror');
            });
        });
        $(document).on("click", "#button-proses-data-maintenance-barang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-maintenance-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_maintenance_proses_data_maintenance') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-maintenance-xl').html(data);
            }).fail(function() {
                $('#menu-maintenance-xl').html('eror');
            });
        });
    </script>
@endsection
