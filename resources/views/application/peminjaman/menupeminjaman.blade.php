@extends('layouts.template')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
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
                        <h4 class="text-primary fw-bold mb-0">Peminjaman Barang <span
                                class="text-info fw-medium">Cabang</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 g-3">
        <div class="col-xl-12">
            {{-- <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 pb-3 pb-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-primary">
                                        <span class="fs--2 fas fa-table text-primary"></span>
                                    </div>
                                    <h6 class="mb-0">Total Peminjaman</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-contact" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-contact"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">100%</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-up text-primary"></span>
                                        <p class="fs--2 mb-0 text-nowrap">0</p>
                                    </div>
                                </div>
                                <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[220,230,150,175,200,170,70,160],"color":"#2c7be5","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#2c7be53A"},{"offset":1,"color":"#2c7be50A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 fas fa-cog text-info"></span></div>
                                    <h6 class="mb-0">Selesai Peminjaman</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-users" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-users"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">0%</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-up text-success"></span>
                                        <p class="fs--2 mb-0 text-nowrap">0</p>
                                    </div>
                                </div>
                                <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[90,160,150,120,230,155,220,240],"color":"#27bcfd","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#27bcfd3A"},{"offset":1,"color":"#27bcfd0A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-3 pt-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-danger shadow-none me-2 bg-soft-success">
                                        <span class="fs--2 fas fa-bolt text-danger"></span>
                                    </div>
                                    <h6 class="mb-0">Proses Peminjaman</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-leads" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-leads"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">0%</p>
                                    <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-down text-danger"></span>
                                        <p class="fs--2 mb-0 text-nowrap">0</p>
                                    </div>
                                </div>
                                <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[200,150,175,130,150,115,130,100],"color":"#00d27a","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#00d27a3A"},{"offset":1,"color":"#00d27a0A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-1 text-primary fw-bold">Data Menu Peminjaman</h5>
                        </div>
                        <div class="col-auto">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-falcon-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><span class="fas fa-align-left me-1"
                                        data-fa-transform="shrink-3"></span>Menu</button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                    <button class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#modal-peminjaman-xl" id="button-add-peminjaman"><span
                                            class="far fa-edit"></span>
                                        Tambah Peminjaman</button>
                                    <div class="dropdown-divider"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-2">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700">
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Kebutuhan</th>
                                <th>Penanggung Jawab</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Status Peminjaman</th>
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
                                    <td>
                                        {{ $datas->tiket_peminjaman }}<br>
                                        @if ($datas->kd_cabang == $datas->tujuan_cabang)
                                            <span class="badge bg-primary">Antar Divisi</span> <br>
                                        @else
                                            <span class="badge bg-warning">Antar Cabang</span> <br>
                                        @endif
                                    </td>
                                    <td>{{ $datas->nama_kegiatan }}</td>
                                    <td>
                                        @php
                                            $staff = DB::table('tbl_staff')->where('nip', $datas->pj_pinjam)->first();
                                        @endphp
                                        @if ($staff)
                                            {{ $staff->nama_staff }}
                                        @else
                                            <span class="badge bg-danger">Staff Tidak diTemukan</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $datas->tgl_pinjam }} <br> Sampai <br> {{ $datas->batas_tgl_pinjam }}
                                    </td>
                                    <td class="text-center">
                                        @if ($datas->status_pinjam == 0)
                                            <span class="badge bg-danger m-2">Not Verifed</span>
                                        @elseif ($datas->status_pinjam == 10)
                                            <span class="badge bg-warning m-2">Proses</span>
                                        @elseif ($datas->status_pinjam == 1)
                                            <span class="badge bg-success m-2">Done</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-primary dropdown-toggle"
                                                id="btnGroupVerticalDrop2" type="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-align-left me-1"
                                                    data-fa-transform="shrink-3"></span>Option</button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                                @if ($datas->status_pinjam == 0)
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-proses-peminjaman-cabang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span
                                                            class="far fa-edit"></span>
                                                        Lengkapi Data Peminjaman</button>
                                                @elseif ($datas->status_pinjam == 10)
                                                    <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-verifikasi-peminjaman-cabang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span
                                                            class="fas fa-file-signature"></span>
                                                        Proses Data Peminjaman</button>
                                                @elseif ($datas->status_pinjam == 1)
                                                    <button class="dropdown-item text-success" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman-xl" id="button-report-data-peminjaman-barang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span class="fas fa-print"></span>
                                                        Print Form Peminjaman</button>
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
        {{-- <div class="col-xl-4">
            <div class="card">
                <div class="card-header d-flex flex-between-center py-2 border-bottom">
                    <h5 class="mb-0">Table Status Order</h5>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button
                            class="btn btn-falcon-primary text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-most-leads" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-most-leads"><a
                                class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class=" m-2">
                    @foreach ($proses as $prosess)
                        <div class="list-group bg-light mb-2 border border-warning">
                            <a class="list-group-item list-group-item-action flex-column align-items-start p-2 p-sm-3"
                                href="#">
                                <div class="d-flex flex-column flex-sm-row justify-content-between mb-0 mb-md-0">
                                    <h5 class="mb-0">{{ $prosess->m_table_master_name }}</h5><small
                                        class="text-muted">{{ $prosess->m_order_date }}</small>
                                </div>
                                <p class="mb-0">Proses</p><small class="text-muted">{{ $prosess->no_reg_order }}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-peminjaman" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-peminjaman"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-peminjaman-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-peminjaman-xl"></div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/img/animated-icons/loading.json') }}"></script> --}}
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-add-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman-xl').html(data);
            }).fail(function() {
                $('#menu-peminjaman-xl').html('eror');
            });

        });
        $(document).on("click", "#button-proses-peminjaman-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_proses') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-verifikasi-peminjaman-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_proses_verifikasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-pilih-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#menu-table-pilih-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_pilih_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian-barang').html("");
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#menu-table-pilih-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-batal-data-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#menu-table-pilih-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_batal_pilih_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#menu-table-pilih-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-verifikasi-data-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-verifikasi-data-peminjaman').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('verifikasi_data_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                if (data == 1) {
                    location.reload();
                } else {
                    alert('Data Barang Peminjaman Masih Kosong');
                    location.reload();
                }
            }).fail(function() {
                $('#menu-verifikasi-data-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-proses-check-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-check-barang-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            console.log(code);

            $.ajax({
                url: "{{ route('proses_check_data_barang_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-check-barang-peminjaman').html(data);
            }).fail(function() {
                $('#menu-check-barang-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-proses-verifikasi-data-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-verifikasi-data-peminjaman').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('proses_verifikasi_data_peminjaman') }}",
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
                    alert('Pastikasn Semua Barang Sudah Kembali');
                    location.reload();
                }
            }).fail(function() {
                $('#menu-verifikasi-data-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-proses-save-verifikasi-data-peminjaman", function(e) {
            e.preventDefault();
            var data = $("#form-check-data-peminjaman").serialize();
            $('#menu-check-barang-peminjaman').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('proses_save_check_data_barang_peminjaman') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                cache: false,
                data: data,
                dataType: 'html',
            }).done(function(data) {
                $('#menu-check-barang-peminjaman').html('');
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#menu-check-barang-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-report-data-peminjaman-barang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('print_report_data_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman-xl').html(data);
            }).fail(function() {
                $('#menu-peminjaman-xl').html('eror');
            });

        });

    </script>
@endsection
