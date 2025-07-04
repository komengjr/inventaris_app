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
                        <img class="ms-3 mx-3" src="{{ asset('img/stock.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Stock Opname <span class="text-info fw-medium">Cabang</span>
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
                    <h5 class="mb-1 text-primary fw-bold">Data Stock Opname</h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-falcon-primary" id="btnGroupVerticalDrop2" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Menu Stockopname</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg"
                                id="button-add-stockopname"><span class="fas fa-swatchbook"></span>
                                Tambah Jadwal Stockopname</button>
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
                        <th>Kode Verifikasi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Jumlah Inventaris</th>
                        <th>Jumlah Terverifikasi</th>
                        <th>Kondisi Barang</th>
                        <th>Status Verifikasi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="fs--2">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->kode_verif }}</td>
                            <td>{{ $item->tgl_verif }}</td>
                            <td>{{ $item->end_date_verif }}</td>
                            <td>
                               {{ $item->total_barang }}
                            </td>
                            <td>
                                @php
                                    $jumlah = DB::table('tbl_sub_verifdatainventaris')
                                        ->where('kode_verif', $item->kode_verif)
                                        ->count();
                                @endphp
                                {{ $jumlah }}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-warning dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Kondisi</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang"
                                            data-code="{{ $item->kode_verif }}" data-status="0"><span
                                                class="fas fa-check-square"></span> Baik</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang"
                                            data-code="{{ $item->kode_verif }}" data-status="1"><span
                                                class="fas fa-exclamation-triangle"></span> Maintenance</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang"
                                            data-code="{{ $item->kode_verif }}" data-status="2"><span
                                                class="fas fa-trash-alt"></span> Rusak</button>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-stock" id="button-kondisi-unvalid-data-cabang"
                                            data-code="{{ $item->kode_verif }}"><span class="fas fa-code-branch"></span>
                                            Unvalid</button>


                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($item->status_verif == 0)
                                    <span class="badge bg-danger m-1">Belum Selesai</span>
                                @else
                                    <span class="badge bg-success m-1">Selesai</span>
                                @endif
                            </td>
                            <td class="text-center ">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        @if ($item->status_verif == 0)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-stock" id="button-proses-stock-opname-cabang"
                                                data-code="{{ $item->kode_verif }}"><span
                                                    class="fas fa-swatchbook"></span>
                                                Proses Stock Opname</button>
                                        @elseif($item->status_verif == 1)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-stock" id="button-print-stock-opname-cabang"
                                                data-code="{{ $item->kode_verif }}"><span class="fas fa-print"></span>
                                                Print Stock Opname</button>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-stock-lg" id="button-edit-data-stock-opname"
                                            data-code="{{ $item->kode_verif }}"><span class="far fa-edit"></span> Edit
                                            Data Tanggal</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-stock-lg" id="button-data-sinkronisasi-stock-cabang"
                                            data-code="{{ $item->kode_verif }}"><span class="fas fa-sync"></span>
                                            Sinkronisasi Data</button>
                                        @if ($item->status_verif == 0)
                                            <div class="dropdown-divider"></div>
                                            <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modal-stock-sm" id="button-remove-full-stock-opname"
                                                data-code="{{ $item->kode_verif }}"><span class="fas fa-trash"></span>
                                                Remove Full</button>
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
    <div class="modal fade" id="modal-stock" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-stock"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-stock-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-stock-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-stock-sm" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-stock-sm"></div>
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
        $(document).on("click", "#button-add-stockopname", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-stock-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock-lg').html(data);
            }).fail(function() {
                $('#menu-stock-lg').html('eror');
            });
        });
        $(document).on("click", "#button-kondisi-data-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var status = $(this).data("status");
            $('#menu-stock-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_kondisi_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "status": status,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock-lg').html(data);
            }).fail(function() {
                $('#menu-stock-lg').html('eror');
            });
        });
        $(document).on("click", "#button-kondisi-unvalid-data-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-stock').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_kondisi_data_unvalid') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock').html(data);
            }).fail(function() {
                $('#menu-stock').html('eror');
            });
        });
        $(document).on("click", "#button-remove-full-stock-opname", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-stock-sm').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_remove_full_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "status": status,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock-sm').html(data);
            }).fail(function() {
                $('#menu-stock-sm').html('eror');
            });
        });
        $(document).on("click", "#button-remove-full-data-stock", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#remove-data-stock').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_proses_remove_full_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "status": status,
                },
                dataType: 'html',
            }).done(function(data) {
                location.reload();
            }).fail(function() {
                $('#remove-data-stock').html('eror');
            });
        });
        $(document).on("click", "#button-proses-stock-opname-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-stock').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_proses_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock').html(data);
            }).fail(function() {
                $('#menu-stock').html('eror');
            });
        });
        $(document).on("click", "#button-stock-opname-kamera", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#form-data-stock').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_proses_data_with_kamera') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#form-data-stock').html(data);
            }).fail(function() {
                $('#form-data-stock').html('eror');
            });
        });
        $(document).on("click", "#button-stock-opname-scanner", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#form-data-stock').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_proses_data_with_scanner') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#form-data-stock').html(data);
            }).fail(function() {
                $('#form-data-stock').html('eror');
            });
        });
        $(document).on("click", "#button-simpan-hasil-verifikasi", function(e) {
            var data = $("#form-verifikasi-data-inevntaris").serialize();
            e.preventDefault();
            $.ajax({
                    url: "{{ route('menu_stock_opname_scan_data_with_scanner_save') }}",
                    type: "POST",
                    data: data,
                    dataType: "html",
                })
                .done(function(data) {
                    $("#hasil-pencarian").html(data);
                })
                .fail(function() {
                    $("#hasil-pencarian").html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });
        });
        // $(document).on("click", "#button-data-stock-opname-cabang", function(e) {
        //     e.preventDefault();
        //     var code = $(this).data("code");
        //     $('#menu-cabang').html(
        //         '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        //     );
        //     $.ajax({
        //         url: "{{ route('masteradmin_cabang_data_stock_opname') }}",
        //         type: "POST",
        //         cache: false,
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "code": code
        //         },
        //         dataType: 'html',
        //     }).done(function(data) {
        //         $('#menu-cabang').html(data);
        //     }).fail(function() {
        //         $('#menu-cabang').html('eror');
        //     });
        // });
        // $(document).on("click", "#button-preview-data-stock-opname", function(e) {
        //     e.preventDefault();
        //     var code = $(this).data("code");
        //     $('#menu-cabang').html(
        //         '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        //     );
        //     $.ajax({
        //         url: "{{ route('masteradmin_cabang_preview_data_stock_opname') }}",
        //         type: "POST",
        //         cache: false,
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "code": code
        //         },
        //         dataType: 'html',
        //     }).done(function(data) {
        //         $('#menu-cabang').html(data);
        //     }).fail(function() {
        //         $('#menu-cabang').html('eror');
        //     });
        // });
        // $(document).on("click", "#button-migrasi-data-cabang", function(e) {
        //     e.preventDefault();
        //     var code = $(this).data("code");
        //     $('#menu-cabang-lg').html(
        //         '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        //     );
        //     $.ajax({
        //         url: "{{ route('masteradmin_cabang_migrasi_data_cabang') }}",
        //         type: "POST",
        //         cache: false,
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "code": code
        //         },
        //         dataType: 'html',
        //     }).done(function(data) {
        //         $('#menu-cabang-lg').html(data);
        //     }).fail(function() {
        //         $('#menu-cabang-lg').html('eror');
        //     });
        // });
        // $(document).on("click", "#button-clone-data-master-barang", function(e) {
        //     e.preventDefault();
        //     var code = $(this).data("code");
        //     $('#button-clone-data-master-barang').html(
        //         '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        //     );
        //     $.ajax({
        //         url: "{{ route('masteradmin_cabang_clone_data_master_barang') }}",
        //         type: "POST",
        //         cache: false,
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "code": code
        //         },
        //         dataType: 'html',
        //     }).done(function(data) {
        //         $('#table-master-barang').html(data);
        //     }).fail(function() {
        //         $('#table-master-barang').html('eror');
        //     });
        // });
        $(document).on("click", "#button-print-stockopname-ruangan", function(e) {
            e.preventDefault();
            var lokasi = $(this).data("lokasi");
            var code = $(this).data("code");
            $('#view-report-stokopname-ruangan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_print_data_ruangan') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "lokasi": lokasi
                },
                dataType: 'html',
            }).done(function(data) {
                $('#view-report-stokopname-ruangan').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#view-report-stokopname-ruangan').html('eror');
            });

        });
        $(document).on("click", "#button-edit-data-stock-opname", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-stock-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_edit_data_tanggal') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock-lg').html(data);
            }).fail(function() {
                $('#menu-stock-lg').html('eror');
            });
        });
        $(document).on("click", "#button-data-sinkronisasi-stock-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-stock-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_sinkronisasi_data_stock') }}",
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
                $('#menu-stock-lg').html('eror');
            });
        });
        $(document).on("click", "#button-penyelesaian-stockopname", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-button-penyelesaian-stockopname').html(
                '<div class="spinner-border spinner-border-sm" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span> </div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_penyelesaian_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-button-penyelesaian-stockopname').html(data);
                location.reload();
            }).fail(function() {
                $('#menu-button-penyelesaian-stockopname').html('eror');
            });
        });
        $(document).on("click", "#button-print-stock-opname-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-stock').html(
                '<div class="spinner-border spinner-border-sm" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span> </div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_laporan_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock').html(data);
            }).fail(function() {
                $('#menu-stock').html('eror');
            });
        });
        $(document).on("click", "#button-fix-data-stockopname", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#button-fix-data-stockopname").html(
                '<div style="text-align: center; padding:2%;"><div class="spinner-border spinner-sm text-warning" role="status" > <span class="sr-only"></span> </div></div>'
            );
            $.ajax({
                url: "{{ route('divisi/postverifikasiall/datasemua/fixdata') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id": id,
                    // "pilihan": pilihan,
                },
                dataType: "html",
            }).done(function(data) {
                $("#button-fix-data-stockopname").html(
                    'Berhasil Fix Data'
                );
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }).fail(function() {
                $("#button-fix-data-stockopname").html("Gagal Baca");
            });
        });
    </script>
    <script>
        $(document).on("click", "#button-stock-opname-manual", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#form-data-stock').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_proses_data_with_checklist') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#form-data-stock').html(data);
            }).fail(function() {
                $('#form-data-stock').html('eror');
            });
        });
    </script>
@endsection
