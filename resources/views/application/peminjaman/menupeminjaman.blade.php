@extends('layouts.template')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
    <style>
        #button-pick-request {
            cursor: pointer;
        }

        #button-pick-request:hover {
            background: rgb(223, 217, 25);
        }
        #button-terima-order-barang-peminjaman:hover {
            background: rgb(223, 217, 25);
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="{{ asset('img/peminjaman.png') }}" alt="" width="60" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Peminjaman <span
                                class="text-info fw-medium">Cabang</span>
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
                    <h5 class="mb-0">Informasi Peminjaman</h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-falcon-primary" id="btnGroupVerticalDrop2" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Menu
                            Peminjaman</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman-xl"
                                id="button-add-peminjaman"><span class="fas fa-folder-plus"></span>
                                Tambah Peminjaman</button>
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman"
                                id="button-add-request-peminjaman"><span class="far fa-share-square"></span>
                                Request Peminjaman Cabang</button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                data-bs-target="#modal-peminjaman" id="button-data-order-peminjaman"><span
                                    class="far fa-bell"></span>
                                Data Order Peminjaman</button>
                            <button class="dropdown-item text-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-peminjaman" id="button-data-rekap-peminjaman"><span
                                    class="far fa-file-alt"></span>
                                Data Rekap Peminjaman</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-light border-top pb-0">
            <div class="row">
                {{-- <div class="col-md-4">
                    <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                        <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span>
                        </div>
                        <p class="mb-0 flex-1">A simple success alert—check it out!</p>
                        <button class="btn btn-primary btn-sm" type="button"><span
                                class="far fa-check-square"></span></button>
                    </div>
                </div> --}}
                @if ($req->isEmpty() && $order->isEmpty())
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Halo {{ Auth::user()->name }} !</strong> You should check in on some of those fields
                            below.
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @foreach ($order as $orders)
                    <div class=" col-md-4">
                        <div class="alert alert-success border-2 d-flex align-items-center" id="button-terima-order-barang-peminjaman"
                            data-bs-toggle="modal" data-bs-target="#modal-peminjaman-xl"
                            data-code="{{ $orders->id_pinjam }}" role="alert">
                            <div class="bg-dark me-3 icon-item">
                                <span class="fas fa-mail-bulk text-white fs-1"></span>
                            </div>
                            <p class="mb-0 flex-1 fs--1">Ada Kiriman Barang dengan Tiket : {{ $orders->tiket_peminjaman }}
                                dari Cabang {{ $orders->nama_cabang }}
                            </p>
                            {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    </div>
                @endforeach
                @foreach ($req as $reqs)
                    <div class=" col-md-4">
                        <div class="alert alert-primary border-2 d-flex align-items-center" id="button-pick-request"
                            data-bs-toggle="modal" data-bs-target="#modal-peminjaman-xl" data-code="{{ $reqs->tiket_req }}"
                            role="alert">
                            <div class="bg-dark me-3 icon-item">
                                <span class="fas fa-mail-bulk text-white fs-1"></span>
                            </div>
                            <p class="mb-0 flex-1 fs--1">Ada Request dengan Tiket : {{ $reqs->tiket_req }}
                                dari Cabang : {{ $reqs->nama_cabang }}
                            </p>
                            {{-- <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer border-top text-end">
            <button class="btn btn-falcon-info btn-sm" href="#!"data-bs-toggle="modal"
                data-bs-target="#modal-peminjaman" id="button-data-rekap-peminjaman"><span class="fas fa-credit-card"></span> Rekap
                Peminjaman Cabang</button>
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
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 text-white fw-bold">Data Peminjaman</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-2">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700 fs--2">
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
                        <tbody class="fs--2">
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
                                            $staff = DB::table('tbl_staff')
                                                ->where('id_staff', '=', $datas->pj_pinjam)
                                                ->first();
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
                                        @elseif ($datas->status_pinjam == 1)
                                            <span class="badge bg-warning m-2">Verifikasi</span>
                                        @elseif ($datas->status_pinjam == 2)
                                            @if ($datas->kd_cabang == $datas->tujuan_cabang)
                                                <span class="badge bg-info m-2">Proses Peminjaman</span>
                                            @else
                                                <span class="badge bg-warning m-2">Menunggu Cabang Menerima</span>
                                            @endif
                                        @elseif ($datas->status_pinjam == 3)
                                            <span class="badge bg-primary m-2">Menunngu Kembali</span>
                                        @elseif ($datas->status_pinjam == 4)
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
                                                @elseif ($datas->status_pinjam == 1)
                                                    <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-verifikasi-peminjaman-cabang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span
                                                            class="fas fa-file-signature"></span>
                                                        Verifikasi Data Peminjaman</button>
                                                @elseif ($datas->status_pinjam == 2)
                                                    {{-- <button class="dropdown-item text-info" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-proses-verifikasi-peminjaman-cabang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span
                                                            class="fas fa-file-signature"></span>
                                                        Proses Data Peminjaman</button> --}}
                                                @elseif ($datas->status_pinjam == 3)
                                                    <button class="dropdown-item text-info" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-proses-verifikasi-peminjaman-cabang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span
                                                            class="fas fa-file-signature"></span>
                                                        Proses Data Peminjaman</button>
                                                @elseif ($datas->status_pinjam == 4)
                                                    <button class="dropdown-item text-success" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman-xl"
                                                        id="button-report-data-peminjaman-barang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span
                                                            class="fas fa-print"></span>
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
        $(document).on("click", "#button-add-request-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_request_peminjaman_cabang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-pilih-data-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var no = $(this).data("no");
            $('#table-fix-req-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_request_pilih_data_cabang_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "no": no,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian-barang-cabang').html('');
                $('#table-fix-req-peminjaman').html(data);
            }).fail(function() {
                $('#table-fix-req-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-remove-barang-req-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var no = $(this).data("no");
            $('#table-fix-req-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_request_remove_barang_cabang_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "no": no,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian-barang-cabang').html('');
                $('#table-fix-req-peminjaman').html(data);
            }).fail(function() {
                $('#table-fix-req-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-data-order-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_data_order') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-data-rekap-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_data_rekap') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-terima-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-terima-order-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_terima_data_order') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-terima-order-peminjaman').html(data);
            }).fail(function() {
                $('#menu-terima-order-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-terima-order-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_terima_data_order_cabang') }}",
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
        $(document).on("click", "#button-cetak-rekap-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-print-rekap-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('print_report_data_peminjaman_show') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-print-rekap-peminjaman').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#menu-print-rekap-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-terima-barang-satuan-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-table-pilih-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_terima_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#mmenu-table-pilih-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-verifikasi-penerimaan-barang-pinjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var penerima = document.getElementById("penerima").value;
            var deskripsi = document.getElementById("deskripsi").value;
            if (penerima == '') {
                alert('penerima wajib diisi');
            } else {
                $('#menu-verifikasi-data-peminjaman').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('verifikasi_peminjaman_terima_data_barang') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": code,
                        "penerima": penerima,
                        "deskripsi": deskripsi,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    if (data == 0) {
                        alert('Barang ada yang belum di terima');
                        location.reload();
                    } else {
                        location.reload();
                    }
                }).fail(function() {
                    $('#menu-verifikasi-data-peminjaman').html('eror');
                });
            }
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
                url: "{{ route('peminjaman_data_verifikasi') }}",
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
        $(document).on("click", "#button-proses-verifikasi-data-user", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var token = document.getElementById("token").value;
            $('#menu-verifikasi-data-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_data_verifikasi_user') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "token": token,
                },
                dataType: 'html',
            }).done(function(data) {
                if (data == 0) {
                    alert('kode verifikasi Salah')
                    location.reload();
                } else {
                    location.reload();
                }
            }).fail(function() {
                $('#menu-verifikasi-data-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-proses-verifikasi-peminjaman-cabang", function(e) {
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
            var mengetahui = document.getElementById("mengetahui").value;
            if (mengetahui == '') {
                alert('Mohon di Pilih Yang mengetahui')
            } else {
                $('#menu-verifikasi-data-peminjaman').html(
                    '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('verifikasi_data_peminjaman') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": code,
                        "mengetahui": mengetahui,
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
            }
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
    <script>
        $(document).on("click", "#button-pick-request", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_request_take_request_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman-xl').html(data);
            }).fail(function() {
                $('#menu-peminjaman-xl').html('eror');
            });
        });
        $(document).on("click", "#button-reject-request-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-verifikasi-request-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_request_reject_request_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-verifikasi-request-peminjaman').html(data);
                location.reload();
            }).fail(function() {
                $('#menu-verifikasi-request-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-accept-request-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var user = document.getElementById("penanggung_jawab").value;
            var deskripsi = document.getElementById("keterangan_peminjaman").value;
            var mengetahui = document.getElementById("mengetahui").value;
            $('#menu-verifikasi-request-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_request_accept_request_peminjaman') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "user": user,
                    "deskripsi": deskripsi,
                    "mengetahui": mengetahui,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-verifikasi-request-peminjaman').html(data);
                location.reload();
            }).fail(function() {
                $('#menu-verifikasi-request-peminjaman').html('eror');
            });
        });
    </script>
@endsection
