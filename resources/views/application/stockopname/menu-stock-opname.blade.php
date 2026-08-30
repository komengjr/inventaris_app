@extends('layouts.template')
@section('base.css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />

<style>
    /* Styling Gradasi Modern */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #2c7be5 0%, #1a5bb8 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #00d27a 0%, #00a760 100%);
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #f5803e 0%, #d96320 100%);
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #e63757 0%, #b81d39 100%);
    }

    /* Mobile Card Styles */
    .stock-card-mobile {
        border: none;
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stock-card-mobile:active {
        transform: scale(0.98);
    }

    .badge-soft-primary {
        background-color: #e0edff;
        color: #2c7be5;
    }

    .badge-soft-success {
        background-color: #ccf6e4;
        color: #008a4f;
    }

    .badge-soft-danger {
        background-color: #fde8e8;
        color: #e63757;
    }
</style>
<style>
    /* Fix Dropdown Terpotong / Berada di Belakang Card Mobile */
    .stock-card-mobile {
        position: relative;
        z-index: 1;
        overflow: visible !important;
        /* Memastikan dropdown tidak terpotong card */
    }

    /* Memastikan card yang dropdown-nya sedang terbuka naik ke tumpukan paling depan */
    .stock-card-mobile:focus-within,
    .stock-card-mobile:hover {
        z-index: 10;
    }

    .stock-card-mobile .dropdown-menu {
        z-index: 1050 !important;
        /* Memastikan dropdown tampil paling depan */
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endsection

@section('content')
<!-- Header Banner -->
<div class="row mb-3">
    <div class="col">
        <div class="card bg-gradient-primary text-white shadow-sm border-0 rounded-3 overflow-hidden">
            <div class="card-body p-3 p-md-4">
                <div class="row align-items-center">
                    <div class="col-auto d-flex align-items-center">
                        <img class="me-3 bg-white p-2 rounded-circle shadow-sm" src="{{ asset('img/stock.png') }}" alt="" width="55" />
                        <div>
                            <span class="badge bg-white text-primary fw-bold mb-1 fs--2">SISTEM INVENTARIS</span>
                            <h4 class="text-white fw-bold mb-0">Stock Opname Cabang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3 border-0 shadow-sm rounded-3">
    <div class="card-header bg-light border-bottom py-3">
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <h5 class="mb-0 text-primary fw-bold fs-0 fs-md-1">
                    <i class="fas fa-boxes me-2"></i>Data Stock Opname
                </h5>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-sm btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-add-stockopname">
                    <i class="fas fa-plus-circle me-1"></i> <span class="d-none d-sm-inline">Tambah</span> Jadwal
                </button>
            </div>
        </div>
    </div>

    <div class="card-body p-3">

        <!-- ================= DISPLAY MOBILE (CARD VIEW) ================= -->
        <div class="d-block d-md-none">
            @foreach ($data as $item)
            @php
            $total_inv = ($item->status_verif == 0) ? $item->total_barang : $item->total_sub;
            $terverif = $item->total_sub - $item->total_unvalid;
            $persen = $total_inv > 0 ? round(($terverif / $total_inv) * 100) : 0;
            @endphp

            <div class="card stock-card-mobile shadow-sm mb-3 border-start border-4 {{ $item->status_verif == 0 ? 'border-danger' : 'border-success' }}">
                <div class="card-body p-3">
                    <!-- Top Info -->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge badge-soft-primary fs--2 fw-bold">
                            <i class="fas fa-barcode me-1"></i>{{ $item->kode_verif }}
                        </span>
                        @if ($item->status_verif == 0)
                        <span class="badge bg-gradient-danger rounded-pill"><i class="fas fa-clock me-1"></i>Belum Selesai</span>
                        @else
                        <span class="badge bg-gradient-success rounded-pill"><i class="fas fa-check-circle me-1"></i>Selesai</span>
                        @endif
                    </div>

                    <!-- Date Info -->
                    <div class="text-muted fs--2 mb-3">
                        <i class="far fa-calendar-alt text-primary me-1"></i> {{ $item->tgl_verif }}
                        <i class="fas fa-arrow-right mx-1 text-400"></i>
                        <i class="far fa-calendar-check text-success me-1"></i> {{ $item->end_date_verif }}
                    </div>

                    <!-- Stats Grid -->
                    <div class="row g-2 text-center mb-3">
                        <div class="col-6">
                            <div class="bg-light p-2 rounded-2 border">
                                <div class="text-400 fs--2 fw-semi-bold">Total Barang</div>
                                <div class="fw-bold fs-0 text-900">{{ $total_inv }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-light p-2 rounded-2 border">
                                <div class="text-400 fs--2 fw-semi-bold">Terverifikasi</div>
                                <div class="fw-bold fs-0 text-success">{{ $terverif }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Group -->
                    <!-- Action Group -->
                    <div class="d-flex gap-2 position-relative">
                        <!-- Dropdown Kondisi -->
                        <div class="dropdown flex-fill position-relative">
                            <button class="btn btn-sm btn-outline-warning w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                <i class="fas fa-clipboard-list me-1"></i> Kondisi
                            </button>
                            <div class="dropdown-menu shadow-lg border-0 stop-dropdown-propagation" style="z-index: 1060; min-width: 180px;">
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang" data-code="{{ $item->kode_verif }}" data-status="0">
                                    <i class="fas fa-check-square text-success me-2"></i>Baik
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang" data-code="{{ $item->kode_verif }}" data-status="1">
                                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>Maintenance
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang" data-code="{{ $item->kode_verif }}" data-status="2">
                                    <i class="fas fa-trash-alt text-danger me-2"></i>Rusak
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock" id="button-kondisi-unvalid-data-cabang" data-code="{{ $item->kode_verif }}">
                                    <i class="fas fa-times-circle text-secondary me-2"></i>Unvalid
                                </a>
                            </div>
                        </div>

                        <!-- Dropdown Action -->
                        <div class="dropdown flex-fill position-relative">
                            <button class="btn btn-sm btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                <i class="fas fa-cog me-1"></i> Aksi
                            </button>
                            <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 stop-dropdown-propagation" style="z-index: 1060; min-width: 200px;">
                                @if ($item->status_verif == 0)
                                <a href="javascript:void(0)" class="dropdown-item fw-bold text-primary" data-bs-toggle="modal" data-bs-target="#modal-stock" id="button-proses-stock-opname-cabang" data-code="{{ $item->kode_verif }}">
                                    <i class="fas fa-play me-2"></i>Proses Stock Opname
                                </a>
                                @else
                                <a href="javascript:void(0)" class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#modal-stock" id="button-print-stock-opname-cabang" data-code="{{ $item->kode_verif }}">
                                    <i class="fas fa-print me-2"></i>Print Laporan
                                </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-edit-data-stock-opname" data-code="{{ $item->kode_verif }}">
                                    <i class="far fa-edit me-2"></i>Edit Tanggal
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-data-sinkronisasi-stock-cabang" data-code="{{ $item->kode_verif }}">
                                    <i class="fas fa-sync me-2"></i>Sinkronisasi
                                </a>
                                @if ($item->status_verif == 0)
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal-stock-sm" id="button-remove-full-stock-opname" data-code="{{ $item->kode_verif }}">
                                    <i class="fas fa-trash me-2"></i>Hapus Data
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ================= DISPLAY DESKTOP (TABLE VIEW) ================= -->
        <div class="d-none d-md-block table-responsive">
            <table id="example" class="table table-hover align-middle nowrap w-100">
                <thead class="bg-200 text-800 fs--1">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Kode Verifikasi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th class="text-center">Total Barang</th>
                        <th class="text-center">Terverifikasi</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="fs--1">
                    @php $no = 1; @endphp
                    @foreach ($data as $item)
                    @php
                    $total_inv = ($item->status_verif == 0) ? $item->total_barang : $item->total_sub;
                    $terverif = $item->total_sub - $item->total_unvalid;
                    @endphp
                    <tr>
                        <td class="text-center fw-bold">{{ $no++ }}</td>
                        <td><span class="badge badge-soft-primary px-2 py-1 fs--1">{{ $item->kode_verif }}</span></td>
                        <td>{{ $item->tgl_verif }}</td>
                        <td>{{ $item->end_date_verif }}</td>
                        <td class="text-center fw-bold">{{ $total_inv }}</td>
                        <td class="text-center fw-bold text-success">{{ $terverif }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-warning dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Kondisi
                                </button>
                                <div class="dropdown-menu shadow">
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang" data-code="{{ $item->kode_verif }}" data-status="0"><i class="fas fa-check-square text-success me-2"></i>Baik</button>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang" data-code="{{ $item->kode_verif }}" data-status="1"><i class="fas fa-exclamation-triangle text-warning me-2"></i>Maintenance</button>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-kondisi-data-cabang" data-code="{{ $item->kode_verif }}" data-status="2"><i class="fas fa-trash-alt text-danger me-2"></i>Rusak</button>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock" id="button-kondisi-unvalid-data-cabang" data-code="{{ $item->kode_verif }}"><i class="fas fa-times-circle text-secondary me-2"></i>Unvalid</button>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            @if ($item->status_verif == 0)
                            <span class="badge bg-gradient-danger">Belum Selesai</span>
                            @else
                            <span class="badge bg-gradient-success">Selesai</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Option
                                </button>
                                <div class="dropdown-menu dropdown-menu-end shadow">
                                    @if ($item->status_verif == 0)
                                    <button class="dropdown-item fw-bold text-primary" data-bs-toggle="modal" data-bs-target="#modal-stock" id="button-proses-stock-opname-cabang" data-code="{{ $item->kode_verif }}"><i class="fas fa-play me-2"></i>Proses Stock Opname</button>
                                    @else
                                    <button class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#modal-stock" id="button-print-stock-opname-cabang" data-code="{{ $item->kode_verif }}"><i class="fas fa-print me-2"></i>Print Stock Opname</button>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-edit-data-stock-opname" data-code="{{ $item->kode_verif }}"><i class="far fa-edit me-2"></i>Edit Data Tanggal</button>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-stock-lg" id="button-data-sinkronisasi-stock-cabang" data-code="{{ $item->kode_verif }}"><i class="fas fa-sync me-2"></i>Sinkronisasi Data</button>
                                    @if ($item->status_verif == 0)
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal-stock-sm" id="button-remove-full-stock-opname" data-code="{{ $item->kode_verif }}"><i class="fas fa-trash me-2"></i>Remove Full</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    $(document).on("click", "#button-stockopname-ba-template", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#laporan-berita-acara').html(
            '<div class="spinner-border spinner-border-sm" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span> </div>'
        );
        $.ajax({
            url: "{{ route('menu_stock_opname_print_berita_acara_2') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#laporan-berita-acara').html(
                '<iframe src="data:application/pdf;base64, ' +
                data +
                '" style="width:100%; height:533px;" frameborder="0"></iframe>');
        }).fail(function() {
            $('#laporan-berita-acara').html('eror');
        });
    });
</script>

@endsection
