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
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Pemusnahan <span class="text-info fw-medium">Cabang</span>
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
                    <h5 class="mb-1 text-primary fw-bold">Data Pemusnahan</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                        data-bs-target="#modal-pemusnahan" id="button-add-data-pemusnahan">
                        <span class="far fa-file-alt fs--2 me-1"></span>Tambah Pemusnahan Barang</a>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Nomor Inventaris</th>
                        <th>Nama Barang</th>
                        <th>Type</th>
                        <th>Merek</th>
                        <th>Penanggung Jawab</th>
                        <th>Eksekusi</th>
                        <th>Status</th>
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
                            <td>{{ $datas->inventaris_data_number }}</td>
                            <td>{{ $datas->inventaris_data_name }}</td>
                            <td>{{ $datas->inventaris_data_type }}</td>
                            <td>{{ $datas->inventaris_data_merk }}</td>
                            <td>
                                @php
                                    $nama = DB::table('wa_number_cabang')->where('id_wa_number',$datas->pj_pemusnahan)->first();
                                @endphp
                                @if ($nama)
                                    {{$nama->wa_number_name}}
                                @else

                                @endif
                            </td>
                            <td>{{ $datas->eksekusi }}</td>
                            <td>
                                @if ($datas->status_pemusnahan == 0)
                                    <span class="badge bg-warning fs--2">Belum diverifikasi</span>
                                @elseif($datas->status_pemusnahan == 1)
                                    <span class="badge bg-primary fs--2">Sudah diverifikasi</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        @if ($datas->status_pemusnahan == 0)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-pemusnahan-md" id="button-verifikasi-data-pemusnahan-cabang"
                                                data-code="{{$datas->id_pemusnahan}}"><span class="fas fa-swatchbook"></span>
                                                Verifikasi Pemusnahan</button>
                                        @elseif($datas->status_pemusnahan == 1)
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-pemusnahan-lg" id="button-cetak-data-pemusnahan-cabang"
                                                data-code="{{$datas->id_pemusnahan}}"><span class="fas fa-print"></span> Cetak Data</button>
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
    <div class="modal fade" id="modal-pemusnahan" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-pemusnahan"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-pemusnahan-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-pemusnahan-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-pemusnahan-md" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-pemusnahan-md"></div>
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
        $(document).on("click", "#button-add-data-pemusnahan", function(e) {
            e.preventDefault();
            $('#menu-pemusnahan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_pemusnahan_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-pemusnahan').html(data);
            }).fail(function() {
                $('#menu-pemusnahan').html('eror');
            });
        });
        $(document).on("click", "#button-find-data-barang", function(e) {
            e.preventDefault();
            var data = $("#form-pencarian-data-pemusnahan").serialize();
            $('#menu-data-table-pemusnahan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_pemusnahan_find_data_barang') }}",
                type: "POST",
                cache: false,
                data: data,
                dataType: 'html',
            }).done(function(data) {
                $('#menu-data-table-pemusnahan').html(data);
            }).fail(function() {
                $('#menu-data-table-pemusnahan').html('eror');
            });
        });
        $(document).on("click", "#button-pilih-data-barang-pemusnahan", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-data-table-pemusnahan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_pemusnahan_pilih_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-data-table-pemusnahan').html(data);
            }).fail(function() {
                $('#menu-data-table-pemusnahan').html('eror');
            });
        });
        $(document).on("click", "#button-verifikasi-data-pemusnahan-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-pemusnahan-md').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_pemusnahan_pilih_data_barang_verifikasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-pemusnahan-md').html(data);
            }).fail(function() {
                $('#menu-pemusnahan-md').html('eror');
            });
        });
        $(document).on("click", "#button-cetak-data-pemusnahan-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-pemusnahan-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_pemusnahan_pilih_data_barang_print') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-pemusnahan-lg').html(data);
            }).fail(function() {
                $('#menu-pemusnahan-lg').html('eror');
            });
        });
    </script>
@endsection
