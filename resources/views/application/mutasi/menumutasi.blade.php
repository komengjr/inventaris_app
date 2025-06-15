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
                        <img class="ms-3 mx-3" src="{{ asset('img/mutasi.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Mutasi <span class="text-info fw-medium">Cabang</span>
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
                    <h5 class="mb-0">Informasi Mutasi</h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-falcon-primary" id="btnGroupVerticalDrop2" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Menu Mutasi</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-mutasi-lg"
                                id="button-add-data-mutasi-cabang" data-code="123"><span class="fas fa-swatchbook"></span>
                                Tambah Mutasi Barang</button>

                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#modal-mutasi"
                                id="button-show-order-mutasi-cabang" data-code="123"><span class="fas fa-mail-bulk"></span>
                                Cek Order Masuk</button>
                            <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#modal-mutasi"
                                id="button-rekap-order-mutasi-cabang"><span class="fas fa-envelope-open-text"></span>
                                Data Order</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-light border-top pb-0">
            <div class="row">

                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Halo {{ Auth::user()->name }} !</strong> You should check in on some of those fields
                        below.
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer border-top text-end">
            <button class="btn btn-falcon-info btn-sm" href="#!"data-bs-toggle="modal" data-bs-target="#modal-mutasi"
                id="button-rekap-order-mutasi-cabang"><span class="fas fa-credit-card"></span> Rekap
                Mutasi Cabang</button>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0 text-white fw-bold">Data Mutasi</h5>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-2">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Tiket Order</th>
                        <th>Tujuan Cabang</th>
                        <th>Penanggung Jawab</th>
                        <th>Menyetujui</th>
                        <th>Yang Menyerahkan</th>
                        <th>Penerima</th>
                        <th>Tanggal Terima</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="fs--2">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>{{ $item->kd_mutasi }}</td>
                            <td>
                                {{ $cabang->nama_cabang }}<br>
                                <span class="fas fa-arrow-circle-down text-primary"></span><br>
                                {{ $item->nama_cabang }}
                            </td>
                            <td>
                                @php
                                    $staff = DB::table('tbl_staff')
                                        ->where('id_staff', $item->penanggung_jawab)
                                        ->first();
                                @endphp
                                @if ($staff)
                                    {{ $staff->nama_staff }}
                                @else
                                    {{ $item->penanggung_jawab }}
                                @endif
                            </td>
                            <td>
                                {{ $item->menyetujui }}
                            </td>
                            <td>
                                {{ $item->yang_menyerahkan }}
                            </td>
                            <td>
                                {{ $item->penerima }}
                            </td>
                            <td>
                                {{ $item->tgl_terima }}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        @if ($item->status_mutasi == 0)
                                            <button class="dropdown-item text-primary" data-bs-toggle="modal"
                                                data-bs-target="#modal-mutasi" id="button-input-data-barang-mutasi"
                                                data-code="{{ $item->kd_mutasi }}"><span
                                                    class="fas fa-swatchbook"></span>
                                                Input Data Barang</button>
                                            <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modal-mutasi-lg" id="button-remove-data-mutasi"
                                                data-code="{{ $item->kd_mutasi }}"><span class="fas fa-trash"></span>
                                                Hapus Data Mutasi</button>
                                        @elseif($item->status_mutasi == 1)
                                            <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                                data-bs-target="#modal-mutasi-xl"
                                                id="button-proses-verifikasi-data-mutasi-cabang"
                                                data-code="{{ $item->kd_mutasi }}"><span
                                                    class="fas fa-swatchbook"></span>
                                                Verifikasi Mutasi Barang</button>
                                        @elseif($item->status_mutasi == 2)
                                            {{-- <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-mutasi-lg" id="button-print-data-mutasi-cabang"
                                                data-code="{{ $item->kd_mutasi }}"><span class="fas fa-print"></span>
                                                Cetak Laporan Mutasi</button> --}}
                                            <button class="dropdown-item text-warning" disabled><span
                                                    class="fas fa-swatchbook"></span>
                                                Menunggu Verifikasi Cabang Tujuan</button>
                                        @elseif($item->status_mutasi == 3)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-mutasi-lg" id="button-print-data-mutasi-cabang"
                                                data-code="{{ $item->kd_mutasi }}"><span class="fas fa-print"></span>
                                                Cetak Laporan Mutasi</button>
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
    <div class="modal fade" id="modal-mutasi" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-mutasi"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-mutasi-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-mutasi-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-mutasi-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-mutasi-xl"></div>
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
        $(document).on("click", "#button-add-data-mutasi-cabang", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-mutasi-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-mutasi-lg').html(data);
            }).fail(function() {
                $('#menu-mutasi-lg').html('eror');
            });
        });
        $(document).on("click", "#button-show-order-mutasi-cabang", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_show_data_order_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
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
            // var code = $(this).data("code");
            $('#menu-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_rekap_data_order_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
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
            $('#menu-terima-order-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_terima_data_order_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
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
            $('#menu-setup-lokasi-barang-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_pilih_lokasi_data_order_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
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
            var code = $(this).data("code");
            $('#menu-setup-lokasi-barang-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
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
                alert('Pastikasn Penerima Sudah diisi');
            } else {
                $('#menu-poroses-terima-verifikasi-data-mutasi').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('menu_mutasi_proses_terima_lokasi_data_order_mutasi') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": code,
                        "penerima": penerima,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    if (data == 0) {
                        alert('Pastikasn Barang Sudah Sesuai Tujuan Lokasi');
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
            $('#menu-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_add_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
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
            $('#menu-mutasi-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_remove_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
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
            $('#menu-table-pilih-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_pilih_data') }}",
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
                $('#menu-table-pilih-mutasi').html(data);
            }).fail(function() {
                $('#menu-table-pilih-mutasi').html('eror');
            });
        });
        $(document).on("click", "#button-verifikasi-data-mutasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-verifikasi-data-mutasi').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
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
                    alert('Pastikasn Barang Sudah di Pilih');
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
                alert('Kode Verifikasi Tidak Boleh Kosong')
            } else {
                $('#menu-verifikasi-data-mutasi').html(
                    '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('menu_mutasi_verifikasi_code_data_mutasi') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": code,
                        "verifikasi_code": verifikasi_code,
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
            $('#menu-mutasi-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_proses_verifikasi_data_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
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
            $('#menu-mutasi-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_print_data_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-mutasi-lg').html(data);
            }).fail(function() {
                $('#menu-mutasi-lg').html('eror');
            });
        });
    </script>
    <script>
        $(document).on("click", "#button-print-rekap-order-mutasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-print-rekap-mutasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_mutasi_proses_print_data_mutasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-print-rekap-mutasi').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#menu-print-rekap-mutasi').html('eror');
            });
        });
    </script>
@endsection
