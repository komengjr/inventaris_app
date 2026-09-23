@extends('layouts.template')

@section('base.css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<style>
    .transition-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .transition-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08) !important;
    }
</style>
@endsection

@section('content')
<!-- Header Banner Modern -->
<div class="row mb-4">
    <div class="col">
        <div class="card bg-white shadow-sm border-0 rounded-4 overflow-hidden position-relative border-start border-primary border-4">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-lg-8 d-flex align-items-center mb-3 mb-lg-0">
                        <div class="bg-primary-subtle p-3 rounded-4 me-3 text-primary d-flex align-items-center justify-content-center shadow-sm" style="width: 65px; height: 65px;">
                            <img src="{{ asset('img/icon/icon.png') }}" alt="" width="40" class="img-fluid" />
                        </div>
                        <div>
                            <span class="badge bg-primary-subtle text-primary fw-semibold px-2 py-1 rounded-pill fs--2 mb-1">
                                <i class="fas fa-network-wired me-1"></i> Pengaturan Sistem
                            </span>
                            <h3 class="fw-bold text-dark mb-0 fs-2">Master <span class="text-primary">Cabang</span></h3>
                            <p class="text-muted fs--2 mb-0 mt-1">Pusat manajemen data entitas, inventaris cabang, migrasi, dan konfigurasi wilayah operasional.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <button class="btn btn-primary rounded-pill px-4 py-2 shadow-sm fs--2 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#modal-cabang-lg" id="button-add-cabang">
                            <span class="fas fa-plus-circle me-1"></span> Tambah Cabang Baru
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Master Cabang Utama -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
    <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-dark fw-bold fs-0"><i class="fas fa-building text-primary me-2"></i> Daftar Cabang Terdaftar</h5>
        <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fs--2 fw-semibold">
            Total Cabang: {{ count($data) }} Unit
        </span>
    </div>
    <div class="card-body p-4">
        <table id="example" class="table table-hover align-middle nowrap w-100 fs--2">
            <thead class="bg-light text-uppercase fs--2 text-dark">
                <tr>
                    <th class="py-3">No</th>
                    <th class="py-3">Nama Cabang</th>
                    <th class="py-3">Kode / No</th>
                    <th class="py-3">Entitas Cabang</th>
                    <th class="py-3">Lokasi & Koordinat</th>
                    <th class="py-3">No Handphone</th>
                    <th class="py-3 text-center">Inv. Lama</th>
                    <th class="py-3 text-center">Inv. Baru</th>
                    <th class="py-3 text-center">Notifikasi</th>
                    <th class="py-3 text-center">Gambar</th>
                    <th class="py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $datas)
                <tr>
                    <td class="fw-bold text-muted">{{ $no++ }}</td>
                    <td>
                        <span class="fw-bold text-dark fs--1">{{ $datas->nama_cabang }}</span>
                    </td>
                    <td>
                        <span class="badge bg-primary bg-opacity-10 text-white fw-bold px-2 py-1">{{ $datas->kd_cabang }}</span>
                        <div class="text-muted fs--2 mt-1">No: {{ $datas->no_cabang }}</div>
                    </td>
                    <td>
                        <span class="fw-semibold text-secondary">{{ $datas->nama_entitas_cabang }}</span>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark"><i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $datas->city }}</div>
                        <span class="text-muted fs--2">Lat: {{ $datas->latitude }} | Long: {{ $datas->longtitude }}</span>
                    </td>
                    <td>
                        <span class="text-dark"><i class="fas fa-phone-alt text-success me-1"></i> {{ $datas->phone }}</span>
                    </td>
                    <td class="text-center">
                        @php
                        $total = DB::table('sub_tbl_inventory')->where('kd_cabang', $datas->kd_cabang)->count();
                        @endphp
                        <span class="badge bg-info bg-opacity-10 text-white fw-bold px-2 py-1">{{ $total }}</span>
                    </td>
                    <td class="text-center">
                        @php
                        $totals = DB::table('inventaris_data')->where('inventaris_data_cabang', $datas->kd_cabang)->count();
                        @endphp
                        <span class="badge bg-primary bg-opacity-10 text-white fw-bold px-2 py-1">{{ $totals }}</span>
                    </td>
                    <td class="text-center">
                        @php
                        $notif = DB::table('t_no_telegram')->where('kd_cabang', $datas->kd_cabang)->first();
                        @endphp
                        @if ($notif)
                        <span class="badge bg-success bg-opacity-10 text-white px-3 py-2 rounded-pill">Aktif</span>
                        @else
                        <span class="badge bg-danger bg-opacity-10 text-white px-3 py-2 rounded-pill">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($datas->link_gambar == "")
                        <span class="badge bg-danger bg-opacity-10 text-white px-2 py-1 rounded-pill">Belum</span>
                        @else
                        <span class="badge bg-primary bg-opacity-10 text-white px-2 py-1 rounded-pill">Ada</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light border dropdown-toggle px-3 rounded-pill fw-semibold text-primary" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog me-1"></i> Option
                            </button>
                            <div class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-2 fs--2">
                                <button class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modal-cabang-lg" id="button-edit-data-cabang" data-code="{{ $datas->kd_cabang }}">
                                    <span class="far fa-edit text-primary me-2"></span> Edit Cabang
                                </button>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modal-cabang" id="button-data-barang-cabang" data-code="{{ $datas->kd_cabang }}">
                                    <span class="far fa-folder-open text-info me-2"></span> Data Barang Cabang
                                </button>
                                <button class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modal-cabang-lg" id="button-data-lokasi-cabang" data-code="{{ $datas->kd_cabang }}">
                                    <span class="fas fa-map-marked-alt text-warning me-2"></span> Data Lokasi Cabang
                                </button>
                                <button class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modal-cabang" id="button-data-peminjaman-cabang" data-code="{{ $datas->kd_cabang }}">
                                    <span class="fas fa-book-medical text-success me-2"></span> Data Peminjaman Cabang
                                </button>
                                <button class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modal-cabang" id="button-data-stock-opname-cabang" data-code="{{ $datas->kd_cabang }}">
                                    <span class="fas fa-book-open text-primary me-2"></span> Data Stock Opname Cabang
                                </button>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item py-2 text-danger" data-bs-toggle="modal" data-bs-target="#modal-cabang-lg" id="button-migrasi-data-cabang" data-code="{{ $datas->kd_cabang }}">
                                    <span class="fas fa-code-branch me-2"></span> Migrasi Data Cabang
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
<!-- Modal Standar -->
<div class="modal fade" id="modal-cabang" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-cabang"></div>
        </div>
    </div>
</div>

<!-- Modal Large -->
<div class="modal fade" id="modal-cabang-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
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
    $(document).on("click", "#button-add-cabang", function(e) {
        e.preventDefault();
        $('#menu-cabang-lg').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('masteradmin_cabang_add') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": 123
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-cabang-lg').html(data);
        }).fail(function() {
            $('#menu-cabang-lg').html('<div class="alert alert-danger m-3">Terjadi kesalahan memuat data.</div>');
        });
    });

    $(document).on("click", "#button-edit-data-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-cabang-lg').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
            $('#menu-cabang-lg').html('<div class="alert alert-danger m-3">Terjadi kesalahan memuat data.</div>');
        });
    });

    $(document).on("click", "#button-data-barang-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-cabang').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
            $('#menu-cabang').html('<div class="alert alert-danger m-3">Terjadi kesalahan memuat data.</div>');
        });
    });

    $(document).on("click", "#button-update-data-barang-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#form-data-barang').html('<div class="spinner-border my-3 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
        $('#menu-cabang-lg').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
            $('#menu-cabang-lg').html('<div class="alert alert-danger m-3">Terjadi kesalahan memuat data.</div>');
        });
    });

    $(document).on("click", "#button-edit-data-lokasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#form-data-lokasi').html('<div class="spinner-border my-3 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
        $('#menu-cabang').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
        $('#menu-cabang').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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

    $(document).on("click", "#button-sinkronisasi-peminjaman-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#button-sinkronisasi-peminjaman-cabang').html('<div class="spinner-border my-3 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('masteradmin_cabang_data_peminjaman_sinkronisas') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#button-sinkronisasi-peminjaman-cabang').html(data);
        }).fail(function() {
            $('#button-sinkronisasi-peminjaman-cabang').html('eror');
        });
    });

    $(document).on("click", "#button-data-stock-opname-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-cabang').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
        $('#menu-cabang').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
        $('#menu-cabang-lg').html('<div class="spinner-border my-5 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
            $('#menu-cabang-lg').html('<div class="alert alert-danger m-3">Terjadi kesalahan memuat data.</div>');
        });
    });

    $(document).on("click", "#button-clone-data-master-barang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#button-clone-data-master-barang').html('<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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

    $(document).on("click", "#button-reset-clone-data-master-barang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#button-reset-clone-data-master-barang').html('<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('masteradmin_cabang_reset_clone_data_master_barang') }}",
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
        $('#table-data-peminjaman').html('<div class="spinner-border my-3 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
            $('#table-data-peminjaman').html('<iframe src="data:application/pdf;base64, ' + data + '" style="width:100%; height:533px;" frameborder="0"></iframe>');
        }).fail(function() {
            $('#table-data-peminjaman').html('eror');
        });
    });

    $(document).on("click", "#button-remove-data-stock-opname", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-cabang').html('<div class="spinner-border my-3 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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

    $(document).on("click", "#button-sinkron-data-stock-opname", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-cabang').html('<div class="spinner-border my-3 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('masteradmin_cabang_sinkron_data_stock_opname') }}",
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

    $(document).on("click", "#button-export-data-non-aset", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#button-export-data-non-aset').html('<div class="spinner-border my-3 text-primary" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
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
