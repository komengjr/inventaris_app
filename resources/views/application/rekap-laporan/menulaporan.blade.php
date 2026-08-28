@extends('layouts.template')

@section('base.css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<style>
    .hover-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .hover-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<!-- BANNER HEADER -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-100 shadow-none border overflow-hidden">
            <div class="row gx-0 align-items-center justify-content-between">
                <div class="col-sm-auto d-flex align-items-center p-3">
                    <img class="ms-2 me-3" src="{{ asset('img/laporan.png') }}" alt="Laporan" width="55" />
                    <div>
                        <h6 class="text-primary fs--1 mb-0 fw-semibold">Welcome back, Administrator</h6>
                        <h4 class="text-primary fw-bold mb-0">Inventaris <span class="text-info fw-medium">Management System</span></h4>
                    </div>
                </div>
                <div class="col-xl-auto px-4 py-3 bg-light-subtle border-start-xl">
                    <h6 class="text-700 fs--1 mb-0">Modul Aktif:</h6>
                    <h5 class="text-primary fw-bold mb-0">Rekap <span class="text-info fw-medium">Laporan Cabang</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PANEL UTAMA & EXPORT INVENTARIS -->
<div class="row g-3 mb-4">
    <!-- Tombol Cetak Per Ruangan -->
    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="card h-100 border hover-card shadow-sm">
            <div class="card-body p-3 text-center d-flex flex-column align-items-center justify-content-center">
                <div class="icon-box bg-primary-subtle text-primary mb-3">
                    <img class="img-fluid rounded-circle" src="{{ asset('ruangan.png') }}" alt="Ruangan" width="40">
                </div>
                <h6 class="fw-bold mb-1">
                    <a href="#" id="button-cetak-ruangan-cabang" data-bs-toggle="modal" data-bs-target="#modal-laporan-xl" class="text-dark stretched-link text-decoration-none">
                        Cetak Per Ruangan
                    </a>
                </h6>
                <p class="fs--2 text-500 mb-0">Laporan Rekapitulasi per Lokasi</p>
            </div>
        </div>
    </div>

    <!-- FITUR BARU: Export Data Inventaris (Excel) -->
    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="card h-100 border hover-card shadow-sm">
            <div class="card-body p-3 text-center d-flex flex-column align-items-center justify-content-center">
                <div class="icon-box bg-success-subtle text-success mb-3">
                    <i class="fas fa-file-excel fs-2"></i>
                </div>
                <h6 class="fw-bold mb-1">
                    <a href="#" id="button-export-all-excel" class="text-dark text-decoration-none">
                        Export Excel (Semua)
                    </a>
                </h6>
                <p class="fs--2 text-500 mb-0">Download Data Inventaris (.xlsx)</p>
            </div>
        </div>
    </div>

    <!-- FITUR BARU: Export Data Inventaris (PDF) -->
    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="card h-100 border hover-card shadow-sm">
            <div class="card-body p-3 text-center d-flex flex-column align-items-center justify-content-center">
                <div class="icon-box bg-danger-subtle text-danger mb-3">
                    <i class="fas fa-file-pdf fs-2"></i>
                </div>
                <h6 class="fw-bold mb-1">
                    <a href="#" id="button-export-all-pdf" class="text-dark text-decoration-none">
                        Export PDF (Semua)
                    </a>
                </h6>
                <p class="fs--2 text-500 mb-0">Cetak Seluruh Data Inventaris</p>
            </div>
        </div>
    </div>
</div>

<!-- CONTAINER MODAL DIMELETAKKAN DI SINI -->
<div class="modal fade" id="modal-laporan" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-laporan"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-laporan-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-laporan-lg"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-laporan-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-laporan-xl"></div>
        </div>
    </div>
</div>
@endsection

@section('base.js')
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
<script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Dynamic loading spinner HTML
        const spinner = `<div class="text-center my-4 py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="text-muted fs--1 mt-2 mb-0">Memuat data...</p>
                         </div>`;

        // 1. Load Modal Rekap Ruangan
        $(document).on("click", "#button-cetak-ruangan-cabang", function(e) {
            e.preventDefault();
            $('#menu-laporan-xl').html(spinner);

            $.ajax({
                url: "{{ route('laporan_cetak_rekap_ruangan') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-laporan-xl').html(data);
            }).fail(function() {
                $('#menu-laporan-xl').html('<div class="alert alert-danger m-3">Gagal memuat data dari server.</div>');
            });
        });

        // 2. Preview Cetak Ruangan (PDF via Base64)
        $(document).on("click", "#button-cetak-ruangan-cabang-preview", function(e) {
            e.preventDefault();
            let code = $("#lokasi_id").val();
            let tgl_cetak = $("#tgl_cetak").val();
            let pj = $("#pj_lokasi").val();

            if (!code || !tgl_cetak) {
                Swal.fire({
                    icon: "warning",
                    title: "Form Belum Lengkap",
                    text: "Silakan pilih lokasi dan tanggal cetak terlebih dahulu!",
                    confirmButtonColor: "#3085d6"
                });
                return;
            }

            $('#menu-print-data-ruangan').html(spinner);

            $.ajax({
                url: "{{ route('master_location_print_data_ruangan_cetak') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tgl_cetak": tgl_cetak,
                    "pj": pj,
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-print-data-ruangan').html(
                    '<iframe src="data:application/pdf;base64, ' + data + '" style="width:100%; height:550px; border-radius: 8px;" frameborder="0"></iframe>'
                );
            }).fail(function() {
                Swal.fire({
                    icon: "error",
                    title: "Gagal Memuat PDF",
                    text: "Terjadi kesalahan saat mengunduh data PDF."
                });
            });
        });

        // 3. Export Excel Berdasarkan Ruangan
        $(document).on("click", "#button-export-excel-ruangan-cabang", function(e) {
            e.preventDefault();
            let code = $("#lokasi_id").val();
            let pj = $("#pj_lokasi").val();

            if (!code) {
                Swal.fire({
                    icon: "warning",
                    title: "Pilih Lokasi",
                    text: "Mohon pilih lokasi ruangan terlebih dahulu!",
                    confirmButtonColor: "#3085d6"
                });
                return;
            }

            $('#menu-print-data-ruangan').html(spinner);

            $.ajax({
                url: "{{ route('master_location_print_data_ruangan_export') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "pj": pj
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-print-data-ruangan').html(data);
            }).fail(function() {
                Swal.fire({
                    icon: "error",
                    title: "Export Gagal",
                    text: "Gagal mengeksport data ke Excel."
                });
            });
        });

        // Export Seluruh Data Inventaris (Excel Direct Download)
        $(document).on("click", "#button-export-all-excel", function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Export Data Excel',
                text: "Apakah Anda yakin ingin mengunduh seluruh data inventaris?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-file-excel me-1"></i> Ya, Download',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan langsung ke Route Download Excel
                    window.location.href = "{{ route('laporan.export_excel_all') }}";
                }
            });
        });

        // Export Seluruh Data Inventaris (PDF Tab Baru)
        $(document).on("click", "#button-export-all-pdf", function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Export Data PDF',
                text: "Apakah Anda yakin ingin mencetak seluruh data inventaris?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-file-pdf me-1"></i> Ya, Cetak PDF',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Membuka PDF di Tab Baru
                    window.open("{{ route('laporan.export_pdf_all') }}", "_blank");
                }
            });
        });
    });
</script>
@endsection
