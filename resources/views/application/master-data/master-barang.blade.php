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
                    <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Barang Cabang {{ $cabang->nama_cabang }}</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body d-flex justify-content-between">
        <div>
            <a class="btn btn-falcon-default btn-sm" href="#" onclick="location.reload()" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Refresh" aria-label="Back to inbox">
                <span class="fas fa-redo"></span>
            </a>
            <span class="mx-1 mx-sm-2 text-300">|</span>

            <button class="btn btn-falcon-default btn-sm ms-1 ms-sm-2" type="button" data-bs-toggle="modal"
                data-bs-target="#modal-master-barang" id="button-upload-excel-barang">
                <span class="fas fa-file-import"></span> Import Excel
            </button>
        </div>
        <div class="d-flex">
            <div class="d-none d-md-block">

            </div>
            <div class="dropdown font-sans-serif">
                <button class="btn btn-falcon-default text-600 btn-sm dropdown-toggle dropdown-caret-none ms-2" type="button" id="email-settings" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-cog fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"></path>
                    </svg><!-- <span class="fas fa-cog"></span> Font Awesome fontawesome.com --></button>
                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="email-settings">
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman"
                        id="button-proses-sinkronisasi-data-cabang" data-code="123"><span
                            class="fas fa-sync-alt"></span> Sinkronisasi Data Barang</button>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman"
                        id="button-proses-export-data-cabang" data-code="aset"><span
                            class="fas fa-file-export"></span> Export Data Barang Aset</button>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman"
                        id="button-proses-export-data-cabang" data-code="aset"><span
                            class="fas fa-file-export"></span> Export Data Barang Non Aset</button>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                        data-bs-target="#modal-master-lokasi-lg" id="button-barang-not-found"><span
                            class="far fa-file-alt"></span>
                        Barang Yang tidak ditemukan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">Master Barang Cabang</h5>
            </div>
            <div class="col-auto">

            </div>
        </div>
    </div>
    <div class="card-body border-top p-3" id="menu-master-barang-cabang">
        <table id="example" class="table table-striped" style="width:100%">
            <thead class="bg-200 text-700 fs--2">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>No Inventaris</th>
                    <th>Kode Klasifikasi</th>
                    <th>Kode Lokasi</th>
                    <th>Nomor Ruangan</th>
                    <th>Merek / Type</th>
                    <th>Tanggal Pembelian</th>
                    <th>Harga Perolehan</th>
                    <th>Status Barang</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody class="fs--2 child"></tbody>

        </table>
    </div>
</div>
@endsection
@section('base.js')
<div class="modal fade" id="modal-master-barang" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="max-width: 95%;">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-master-barang"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-master-barang-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-master-barang-lg"></div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
<script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).on("click", "#button-edit-master-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-master-barang').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_data_edit') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-master-barang').html(data);
        }).fail(function() {
            $('#menu-master-barang').html('eror');
        });
    });
    $(document).on("click", "#button-proses-sinkronisasi-data-cabang", function(e) {
        e.preventDefault();
        $('#menu-master-barang-cabang').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_sinkronisasi_data_cabang') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": 0,
            },
            dataType: 'html',
        }).done(function(data) {
            setInterval(() => {
                location.reload();
            }, 3000);
            // $('#menu-master-barang-cabang').html('adsa');
        }).fail(function() {
            $('#menu-master-barang-cabang').html('eror');
        });
    });
    $(document).on("click", "#button-proses-export-data-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-master-barang-cabang').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_export_data_cabang') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
            },
            dataType: 'html',
        }).done(function(data) {
            setInterval(() => {
                location.reload();
            }, 3000);
            // $('#menu-master-barang-cabang').html('adsa');
        }).fail(function() {
            $('#menu-master-barang-cabang').html('eror');
        });
    });
    $(document).on("click", "#button-cetak-barcode-master-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-master-barang-lg').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_data_cetak_barcode') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-master-barang-lg').html(
                '<iframe src="data:application/pdf;base64, ' +
                data +
                '" style="width:100%; height:533px;" frameborder="0"></iframe>');
        }).fail(function() {
            $('#menu-master-barang-lg').html('eror');
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('master_barang_data') }}",
            columns: [{
                    data: 'id',
                    "width": "4%"
                },
                {
                    data: 'nama_barang'
                },
                {
                    data: 'no_inventaris',
                    className: 'child'
                },

                {
                    data: 'kd_inventaris',
                    className: 'child'
                },
                {
                    data: 'kd_lokasi',
                    className: 'child'
                },
                {
                    data: 'dataruangan',
                    className: 'child'
                },
                {
                    data: 'merk',
                    className: 'child'
                },
                {
                    data: 'tglbeli',
                },
                {
                    data: 'harga_perolehan',
                    className: 'text-end'
                },
                {
                    data: 'status_barang',
                    className: 'text-center'
                },
                {
                    data: 'btn',
                    className: 'text-center',
                    "width": "1%"
                }
            ]

        });
    });
</script>
<script>
    $(document).on("click", "#button-barang-not-found", function(e) {
        e.preventDefault();
        $('#menu-master-barang-cabang').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_data_not_found') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": 123
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-master-barang-cabang').html(data);
        }).fail(function() {
            $('#menu-master-barang-cabang').html('eror');
        });
    });
    $(document).on("click", "#button-edit-not-found", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-master-barang').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_data_edit_not_found') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-master-barang').html(data);
        }).fail(function() {
            $('#menu-master-barang').html('eror');
        });
    });
    $(document).on("click", "#button-save-not-found", function(e) {
        e.preventDefault();
        var data = $("#form-edit-not-found").serialize();
        $('#loading-button-edit').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_data_save_not_found') }}",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'html',
        }).done(function(data) {
            $('#modal-master-barang').modal('hide');
            $('#menu-master-barang-cabang').html(data);
        }).fail(function() {
            $('#menu-master-barang-cabang').html('eror');
        });
    });
    $(document).on("click", "#button-upload-excel-barang", function(e) {
        e.preventDefault();
        $('#menu-master-barang').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_upload_excel_master_barang') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": 123
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-master-barang').html(data);
        }).fail(function() {
            $('#menu-master-barang').html('eror');
        });
    });
</script>
<script>
    $(document).on("click", "#button-edit-data-log", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#response').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_upload_excel_master_barang_edit') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
            },
            dataType: 'html',
        }).done(function(data) {
            $('#response').html(data);
        }).fail(function() {
            $('#response').html('eror');
        });
    });
    $(document).on("click", "#button-save-data-log", function(e) {
        e.preventDefault();
        var data = $("#form-update-data-log").serialize();
        $('#loading-button-edit').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('master_barang_upload_excel_master_barang_update_save') }}",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'html',
        }).done(function(data) {
            $('#response').html(data);
        }).fail(function() {
            $('#response').html('eror');
        });
    });
    $(document).on("click", "#button-hapus-data-log", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: "Your Data has been deleted.",
                    icon: "success"
                });
                $('#response').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('master_barang_upload_excel_master_barang_remove') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": code,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $('#response').html(data);
                }).fail(function() {
                    $('#response').html('eror');
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your Data is safe :)",
                    icon: "error"
                });
            }
        });

    });
    $(document).on("click", "#button-fix-save-data-log", function(e) {
        e.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "Pastikan Semua data barang sudah sesuai dengan kode masing masing!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Agree it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Berhasil!",
                    text: "Your Data has been Insert.",
                    icon: "success"
                });
                $('#menu-fix-save-data-log').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('master_barang_upload_excel_master_barang_fix_save') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": "{{Auth::user()->cabang}}",
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $('#menu-fix-save-data-log').html(data);
                    location.reload();
                }).fail(function() {
                    $('#menu-fix-save-data-log').html('eror');
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your Data is safe :)",
                    icon: "error"
                });
            }
        });

    });
</script>
@endsection
