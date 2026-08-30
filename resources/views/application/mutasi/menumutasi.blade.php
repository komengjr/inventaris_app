@extends('layouts.template')

@section('base.css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<style>
    .badge-soft-draft {
        background-color: #e2e8f0;
        color: #475569;
    }

    .badge-soft-process {
        background-color: #e0f2fe;
        color: #0369a1;
    }

    .badge-soft-pending {
        background-color: #fef3c7;
        color: #b45309;
    }

    .badge-soft-success {
        background-color: #dcfce7;
        color: #15803d;
    }

    .mutasi-route-box {
        /* background: #f8fafc; */
        border-radius: 8px;
        padding: 6px 12px;
        border: 1px dashed #cbd5e1;
        display: inline-block;
    }
</style>
@endsection

@section('content')
<!-- Header Banner -->
<div class="row mb-3">
    <div class="col-12">
        <div class="card bg-white shadow-sm border-0 rounded-3">
            <div class="card-body p-3 p-md-4">
                <div class="row align-items-center">
                    <div class="col-md-7 d-flex align-items-center mb-3 mb-md-0">
                        <div class="avatar avatar-3xl me-3 bg-soft-primary p-2 rounded-3 text-center">
                            <i class="fas fa-exchange-alt text-primary fs-2"></i>
                        </div>
                        <div>
                            <h4 class="text-dark fw-bold mb-1">Manajemen Mutasi Barang</h4>
                            <p class="text-muted fs--1 mb-0">Kelola dan pantau perpindahan inventaris antar cabang secara real-time.</p>
                        </div>
                    </div>
                    <div class="col-md-5 text-md-end">
                        <span class="badge bg-soft-info text-info rounded-pill px-3 py-2 font-monospace fs--1">
                            <i class="fas fa-building me-1"></i> Cabang: {{ $cabang->nama_cabang ?? 'Utama' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Metrics Cards & Action Bar -->
<div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-3 text-center">
                <h6 class="text-muted fs--2 text-uppercase fw-semibold mb-1">Total Mutasi</h6>
                <h3 class="mb-0 fw-bold text-dark">{{ $data->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-3 text-center">
                <h6 class="text-muted fs--2 text-uppercase fw-semibold mb-1">Draft / Input</h6>
                <h3 class="mb-0 fw-bold text-secondary">{{ $data->where('status_mutasi', 0)->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-3 text-center">
                <h6 class="text-muted fs--2 text-uppercase fw-semibold mb-1">Proses Verifikasi</h6>
                <h3 class="mb-0 fw-bold text-warning">{{ $data->whereIn('status_mutasi', [1, 2])->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-3 text-center">
                <h6 class="text-muted fs--2 text-uppercase fw-semibold mb-1">Selesai</h6>
                <h3 class="mb-0 fw-bold text-success">{{ $data->where('status_mutasi', 3)->count() }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Main Data Card -->
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-bottom py-3">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h5 class="mb-0 fw-bold text-dark">Daftar Transaksi Mutasi</h5>
            <div class="d-flex gap-2">
                <button class="btn btn-primary btn-sm rounded-2" data-bs-toggle="modal" data-bs-target="#modal-mutasi-lg" id="button-add-data-mutasi-cabang" data-code="123">
                    <i class="fas fa-plus-circle me-1"></i> Buat Mutasi Baru
                </button>
                <div class="btn-group">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle rounded-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v me-1"></i> Menu Order
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 fs--1">
                        <li>
                            <button class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modal-mutasi" id="button-show-order-mutasi-cabang" data-code="123">
                                <i class="fas fa-inbox text-warning me-2"></i> Cek Order Masuk
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modal-mutasi" id="button-rekap-order-mutasi-cabang">
                                <i class="fas fa-file-invoice text-primary me-2"></i> Rekap Data Order
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-3">
        <table id="example" class="table table-hover align-middle nowrap w-100">
            <thead class="bg-light fs--1 text-dark">
                <tr>
                    <th width="40">No</th>
                    <th>Kode Tiket</th>
                    <th>Rute Mutasi</th>
                    <th>Penanggung Jawab</th>
                    <th>Logistik (Serah / Terima)</th>
                    <th>Status</th>
                    <th class="text-center" width="100">Aksi</th>
                </tr>
            </thead>
            <tbody class="fs--1">
                @php $no = 1; @endphp
                @foreach ($data as $item)
                <tr>
                    <td class="text-center font-monospace">{{ $no++ }}</td>
                    <td>
                        <span class="fw-bold text-primary font-monospace">{{ $item->kd_mutasi }}</span>
                        <small class="d-block text-muted fs--2"><i class="far fa-calendar-alt me-1"></i>{{ $item->tgl_terima ?? '-' }}</small>
                    </td>
                    <td>
                        <div class="mutasi-route-box">
                            <span class="fw-semibold text-dark fs--2">{{ $cabang->nama_cabang }}</span>
                            <i class="fas fa-long-arrow-alt-right text-primary mx-1"></i>
                            <span class="fw-semibold text-primary fs--2">{{ $item->nama_cabang_tujuan }}</span>
                        </div>
                    </td>
                    <td>
                        <!-- Nama Penanggung Jawab (dari tbl_staff) -->
                        <div class="fw-semibold text-dark">
                            {{ $item->nama_penanggung_jawab ?? $item->penanggung_jawab }}
                        </div>

                        <!-- Menampilkan wa_number_name dari wa_number_cabang. Jika null/kosong, tampilkan nilai asli menyetujui -->
                        <small class="text-muted fs--2">
                            ACC: {{ $item->nama_menyetujui ?? ($item->menyetujui ?? '-') }}
                        </small>
                    </td>
                    <td>
                        <div class="fs--2">
                            <span class="text-muted">Serah:</span> <span class="fw-semibold text-dark">{{ $item->yang_menyerahkan ?? '-' }}</span><br>
                            <span class="text-muted">Terima:</span> <span class="fw-semibold text-dark">{{ $item->penerima ?? '-' }}</span>
                        </div>
                    </td>
                    <td>
                        @if ($item->status_mutasi == 0)
                        <span class="badge badge-soft-draft rounded-pill px-2.5 py-1 fs--2"><i class="fas fa-pencil-alt me-1"></i> Draft</span>
                        @elseif($item->status_mutasi == 1)
                        <span class="badge badge-soft-process rounded-pill px-2.5 py-1 fs--2"><i class="fas fa-spinner fa-spin me-1"></i> Verifikasi</span>
                        @elseif($item->status_mutasi == 2)
                        <span class="badge badge-soft-pending rounded-pill px-2.5 py-1 fs--2"><i class="fas fa-clock me-1"></i> Wait Approval</span>
                        @elseif($item->status_mutasi == 3)
                        <span class="badge badge-soft-success rounded-pill px-2.5 py-1 fs--2"><i class="fas fa-check-circle me-1"></i> Selesai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm rounded-circle p-1 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v text-secondary"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 fs--1">
                                @if ($item->status_mutasi == 0)
                                <li>
                                    <button class="dropdown-item py-2 text-primary" data-bs-toggle="modal" data-bs-target="#modal-mutasi" id="button-input-data-barang-mutasi" data-code="{{ $item->kd_mutasi }}">
                                        <i class="fas fa-boxes me-2"></i> Input Barang
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item py-2 text-danger" data-bs-toggle="modal" data-bs-target="#modal-mutasi-lg" id="button-remove-data-mutasi" data-code="{{ $item->kd_mutasi }}">
                                        <i class="fas fa-trash-alt me-2"></i> Hapus Mutasi
                                    </button>
                                </li>
                                @elseif($item->status_mutasi == 1)
                                <li>
                                    <button class="dropdown-item py-2 text-warning" data-bs-toggle="modal" data-bs-target="#modal-mutasi-xl" id="button-proses-verifikasi-data-mutasi-cabang" data-code="{{ $item->kd_mutasi }}">
                                        <i class="fas fa-check-double me-2"></i> Verifikasi Mutasi
                                    </button>
                                </li>
                                @elseif($item->status_mutasi == 2)
                                <li>
                                    <span class="dropdown-item py-2 text-muted disabled">
                                        <i class="fas fa-hourglass-half me-2"></i> Menunggu Cabang Tujuan
                                    </span>
                                </li>
                                @elseif($item->status_mutasi == 3)
                                <li>
                                    <button class="dropdown-item py-2 text-dark" data-bs-toggle="modal" data-bs-target="#modal-mutasi-lg" id="button-print-data-mutasi-cabang" data-code="{{ $item->kd_mutasi }}">
                                        <i class="fas fa-print me-2"></i> Cetak Laporan
                                    </button>
                                </li>
                                @endif
                            </ul>
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
<!-- Modals (Tetap Mempertahankan ID Asli) -->
<div class="modal fade" id="modal-mutasi" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 95%;">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-mutasi"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-mutasi-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-mutasi-lg"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-mutasi-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-mutasi-xl"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-stock-sm" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-stock-sm"></div>
        </div>
    </div>
</div>

<!-- DataTables JS & Scripts -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
<script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
<script>
    new DataTable('#example', {
        responsive: true
    });

    // Seluruh Event Listener AJAX (Sesuai ID Asli tanpa mengubah fungsionalitas)
    $(document).on("click", "#button-add-data-mutasi-cabang", function(e) {
        e.preventDefault();
        $('#menu-mutasi-lg').html('<div class="spinner-border my-4" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_add') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": 0
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-mutasi-lg').html(data);
        }).fail(function() {
            $('#menu-mutasi-lg').html('eror');
        });
    });

    $(document).on("click", "#button-remove-barang-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        var id = $(this).data("id");
        $('#menu-table-pilih-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_remove_data_barang') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
                "id": id
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-table-pilih-mutasi').html(data);
        }).fail(function() {
            $('#menu-table-pilih-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-show-order-mutasi-cabang", function(e) {
        e.preventDefault();
        $('#menu-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_show_data_order_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": 0
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-mutasi').html(data);
        }).fail(function() {
            $('#menu-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-rekap-order-mutasi-cabang", function(e) {
        e.preventDefault();
        $('#menu-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_rekap_data_order_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": 0
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-mutasi').html(data);
        }).fail(function() {
            $('#menu-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-terima-order-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-terima-order-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_terima_data_order_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-terima-order-mutasi').html(data);
        }).fail(function() {
            $('#menu-terima-order-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-pilih-lokasi-barang-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-setup-lokasi-barang-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_pilih_lokasi_data_order_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-setup-lokasi-barang-mutasi').html(data);
        }).fail(function() {
            $('#menu-setup-lokasi-barang-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-form-pilih-lokasi-barang", function(e) {
        e.preventDefault();
        var data = $("#form-pilih-lokasi-barang").serialize();
        $('#menu-setup-lokasi-barang-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_proses_lokasi_data_order_mutasi') }}",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'html',
        }).done(function(data) {
            $('#menu-setup-lokasi-barang-mutasi').html('');
            $('#menu-table-pilih-mutasi').html(data);
        }).fail(function() {
            $('#menu-setup-lokasi-barang-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-poroses-terima-verifikasi-data-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        var penerima = document.getElementById("penerima").value;
        if (penerima == '') {
            alert('Pastikan Penerima Sudah diisi');
        } else {
            $('#menu-poroses-terima-verifikasi-data-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
            $.ajax({
                url: "{{ route('menu_mutasi_proses_terima_lokasi_data_order_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "penerima": penerima
                },
                dataType: 'html',
            }).done(function(data) {
                if (data == 0) {
                    alert('Pastikan Barang Sudah Sesuai Tujuan Lokasi');
                    location.reload();
                } else {
                    location.reload();
                }
            }).fail(function() {
                $('#menu-poroses-terima-verifikasi-data-mutasi').html('eror');
            });
        }
    });

    $(document).on("click", "#button-input-data-barang-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_add_barang') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-mutasi').html(data);
        }).fail(function() {
            $('#menu-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-remove-data-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-mutasi-lg').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_remove_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-mutasi-lg').html(data);
        }).fail(function() {
            $('#menu-mutasi-lg').html('eror');
        });
    });

    $(document).on("click", "#button-pilih-barang-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        var id = $(this).data("id");
        $('#menu-table-pilih-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_pilih_data') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
                "id": id
            },
            dataType: 'html',
        }).done(function(data) {
            $('#hasil-pencarian-barang').html("");
            $('#menu-table-pilih-mutasi').html(data);
        }).fail(function() {
            $('#menu-table-pilih-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-verifikasi-data-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-verifikasi-data-mutasi').html('<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_verifikasi_data_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            if (data == '1') {
                location.reload();
            } else {
                alert('Pastikan Barang Sudah di Pilih');
                location.reload();
            }
        }).fail(function() {
            $('#menu-verifikasi-data-mutasi').html('eror');
        });
    });

    $(document).on("click", "#button-verifikasi-code-data-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        var verifikasi_code = document.getElementById("verifikasi_code").value;
        if (verifikasi_code == '') {
            alert('Kode Verifikasi Tidak Boleh Kosong');
        } else {
            $('#menu-verifikasi-data-mutasi').html('<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
            $.ajax({
                url: "{{ route('menu_mutasi_verifikasi_code_data_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "verifikasi_code": verifikasi_code
                },
                dataType: 'html',
            }).done(function(data) {
                if (data == '1') {
                    location.reload();
                } else {
                    alert('Kode Verifikasi Salah');
                    location.reload();
                }
            }).fail(function() {
                $('#menu-verifikasi-data-mutasi').html('eror');
            });
        }
    });

    $(document).on("click", "#button-proses-verifikasi-data-mutasi-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-mutasi-xl').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_proses_verifikasi_data_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-mutasi-xl').html(data);
        }).fail(function() {
            $('#menu-mutasi-xl').html('eror');
        });
    });

    $(document).on("click", "#button-print-data-mutasi-cabang", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-mutasi-lg').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_print_data_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-mutasi-lg').html(data);
        }).fail(function() {
            $('#menu-mutasi-lg').html('eror');
        });
    });

    $(document).on("click", "#button-print-rekap-order-mutasi", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#menu-print-rekap-mutasi').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{ route('menu_mutasi_proses_print_data_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#menu-print-rekap-mutasi').html(
                '<iframe src="data:application/pdf;base64, ' + data + '" style="width:100%; height:533px;" frameborder="0"></iframe>'
            );
        }).fail(function() {
            $('#menu-print-rekap-mutasi').html('eror');
        });
    });
</script>
@endsection
