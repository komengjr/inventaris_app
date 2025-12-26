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
                    <img class="ms-3 mx-3" src="{{ asset('img/laporan.png') }}" alt="" width="50" />
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
                    <h4 class="text-primary fw-bold mb-0">Rekap <span class="text-info fw-medium">Laporan Cabang</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    {{-- <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" id="followers">Followers <span class="d-none d-sm-inline-block">(233)</span></h5>
                </div>
                <div class="col">

                </div>
            </div>
        </div> --}}
    <div class="card-body bg-light p-2">
        <div class="row g-0 text-center fs--1">
            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                            class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                            src="{{ asset('ruangan.png') }}" alt="" width="100"></a>
                    <h6 class="mb-1"><a href="#" id="button-cetak-ruangan-cabang" data-bs-toggle="modal"
                            data-bs-target="#modal-laporan-xl">Cetak Per Ruangan</a>
                    </h6>
                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Mode</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('base.js')
<div class="modal fade" id="modal-laporan" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-laporan"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-laporan-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-laporan-lg"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-laporan-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="menu-laporan-xl"></div>
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
    $(document).on("click", "#button-cetak-ruangan-cabang", function(e) {
        e.preventDefault();
        $('#menu-laporan-xl').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
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
            $('#menu-laporan-xl').html('eror');
        });
    });
    $(document).on("click", "#button-cetak-ruangan-cabang-preview", function(e) {
        e.preventDefault();
        var code = document.getElementById("lokasi_id").value;
        var tgl_cetak = document.getElementById("tgl_cetak").value;
        if (code == "" || tgl_cetak == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        } else {
            $('#menu-print-data-ruangan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_location_print_data_ruangan_cetak') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tgl_cetak": tgl_cetak,
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-print-data-ruangan').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#menu-print-data-ruangan').html('eror');
            });
        }
    });
    $(document).on("click", "#button-export-excel-ruangan-cabang", function(e) {
        e.preventDefault();
        var code = document.getElementById("lokasi_id").value;
        if (code == "") {
            alert('mohon dipilih terlebih dahulu');
        } else {
            $('#menu-print-data-ruangan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_location_print_data_ruangan_export') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-print-data-ruangan').html(data);
            }).fail(function() {
                $('#menu-print-data-ruangan').html('eror');
            });
        }
    });
</script>
@endsection
