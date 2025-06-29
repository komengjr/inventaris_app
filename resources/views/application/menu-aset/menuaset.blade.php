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
            <div class="card bg-100 shadow-none border border-youtube">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="{{ asset('img/aset.png') }}" alt="" width="60" />
                        <div>
                            <h6 class="text-youtube fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-youtube fw-bold mb-1">Inventaris <span class="text-youtube fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-youtube fs--1 mb-0">Menu : </h6>
                        <h4 class="text-youtube fw-bold mb-0">Data Aset <span class="text-youtube fw-medium">Cabang</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3 g-3">
        <div class="col-xl-12">
            <div class="card mb-3">
                <div class="card-header bg-youtube">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 text-white fw-bold">Data Aset Cabang</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-2">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700 fs--2">
                            <tr>

                                <th>Gambar</th>
                                <th>Nama Inventaris Aset</th>
                                <th>No Inventaris</th>
                                <th>Spesifikasi</th>
                                <th>Tanggal Pembelian</th>
                                <th>Harga Awal</th>
                                <th>Status</th>
                                <th>Status Depresiasi</th>
                                <th>Penyusutan Ke</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="fs--2 list">

                            @foreach ($data as $datas)
                                <tr>

                                    <td>
                                        @if ($datas->inventaris_data_file == '')
                                            <div class="avatar avatar-4xl">
                                                <img class="rounded-soft" src="{{ asset('no_pict.png') }}" alt="" />
                                            </div>
                                        @else
                                            <div class="avatar avatar-4xl">
                                                <img class="rounded-soft" src="{{ asset($datas->inventaris_data_file) }}"
                                                    alt="" />
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $datas->inventaris_data_name }}</td>
                                    <td>{{ $datas->inventaris_data_number }}</td>
                                    <td>{{ $datas->inventaris_data_merk }} <br>{{ $datas->inventaris_data_type }}</td>

                                    <td>{{ $datas->inventaris_data_tgl_beli }}</td>
                                    <td class="text-end">@currency($datas->inventaris_data_harga)</td>
                                    <td>
                                        @if ($datas->inventaris_data_status == 0)
                                            <span class="badge bg-primary">Baik</span>
                                        @elseif ($datas->inventaris_data_status == 4)
                                            <span class="badge bg-warning">Mutasi</span>
                                        @elseif ($datas->inventaris_data_status == 5)
                                            <span class="badge bg-danger">musnah</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $cek = DB::table('master_depresiasi_aset')
                                                ->join(
                                                    'master_depresiasi_sub',
                                                    'master_depresiasi_sub.depresiasi_sub_code',
                                                    '=',
                                                    'master_depresiasi_aset.depresiasi_sub_code',
                                                )
                                                ->where(
                                                    'master_depresiasi_aset.inventaris_data_code',
                                                    $datas->inventaris_data_code,
                                                )
                                                ->first();
                                        @endphp
                                        @if ($cek)
                                            <strong class="text-danger">{{ $cek->depresiasi_sub_name }}</strong> <br>
                                            @currency($cek->depresiasi_sub_start) - @currency($cek->depresiasi_sub_end)
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $penyusutan = DB::table('depresiasi_penyusutan_log')
                                                ->where('inventaris_data_code', $datas->inventaris_data_code)
                                                ->count();
                                        @endphp
                                        {{ $penyusutan }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-falcon-danger" id="btnGroupVerticalDrop2"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><span class="fas fa-align-left me-1"
                                                    data-fa-transform="shrink-3"></span>Option</button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                                @if ($cek)
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-aset-xl" id="button-depresiasi-data-aset"
                                                        data-id="{{ $datas->inventaris_data_code }}"
                                                        data-code="{{ $cek->depresiasi_sub_code }}"><span
                                                            class="fas fa-poll-h"></span>
                                                        Perhitungan Depresiasi Aset</button>
                                                @else
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-aset-xl" id="button-setup-data-aset"
                                                        data-code="{{ $datas->inventaris_data_code }}"><span
                                                            class="fas fa-photo-video"></span>
                                                        Setup Depresiasi</button>
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
    <div class="modal fade" id="modal-aset" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-aset"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-aset-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-aset-xl"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-aset-md" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-aset-md"></div>
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
        $(document).on("click", "#button-setup-data-aset", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-aset-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_aset_setup') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-aset-xl').html(data);
            }).fail(function() {
                $('#menu-aset-xl').html('eror');
            });
        });
        $(document).on("click", "#button-depresiasi-data-aset", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#menu-aset-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_aset_data_depresiasi_aset') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-aset-xl').html(data);
            }).fail(function() {
                $('#menu-aset-xl').html('eror');
            });
        });
        $(document).on("click", "#button-fix-data-aset", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#menu-aset-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_aset_setup_pilih_depresiasi_save') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                location.reload();
            }).fail(function() {
                $('#menu-aset-xl').html('eror');
            });
        });
        $(document).on("click", "#button-generate-fix-aset", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            var nilai = $(this).data("nilai");
            var persen = $(this).data("persen");
            var harga = $(this).data("harga");
            var date = $(this).data("date");
            $('#menu-aset-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_aset_data_depresiasi_aset_generate') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "id": id,
                    "nilai": nilai,
                    "persen": persen,
                    "harga": harga,
                    "date": date,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-aset-xl').html(data);
            }).fail(function() {
                $('#menu-aset-xl').html('eror');
            });
        });
    </script>
@endsection
