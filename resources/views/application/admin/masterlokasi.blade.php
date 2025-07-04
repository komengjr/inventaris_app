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
                        </div>
                        <img class="ms-n4 d-none d-lg-block" src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}"
                            alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Lokasi</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-2 mb-sm-0 ">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                Data Lokasi V.2
                            </h5>
                        </div>
                        <div class="col-sm-auto">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><span class="fas fa-align-left me-1"
                                        data-fa-transform="shrink-3"></span>Option</button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-lokasi"
                                        id="button-add-data-lokasi-v2"><span class="far fa-edit"></span>
                                        Tambah Lokasi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0 mt-0">
                    <div class="tab-content">
                        <table id="data-v2" class="table table-striped nowrap" style="width:100%">
                            <thead class="bg-200 text-700">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Lokasi</th>
                                    <th>Nama Lokasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($datav2 as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->kd_lokasi }}</td>
                                        <td>{{ $item->nama_lokasi }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-sm-0 ">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                Data Lokasi V.3
                            </h5>
                        </div>
                        <div class="col-sm-auto">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><span class="fas fa-align-left me-1"
                                        data-fa-transform="shrink-3"></span>Option</button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                    <button class="dropdown-item" id="button-clone-master-lokasi"><span
                                            class="far fa-folder-open"></span>
                                        Clone Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0" id="menu-data-v3">
                    <div class="tab-content">
                        <table id="data-v3" class="table table-striped nowrap" style="width:100%">
                            <thead class="bg-200 text-700">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Lokasi</th>
                                    <th>Nama Lokasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($datav3 as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->master_lokasi_code }}</td>
                                        <td>{{ $item->master_lokasi_name }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-lokasi" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-lokasi"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script>
        new DataTable('#data-v2', {
            responsive: true
        });
        new DataTable('#data-v3', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-clone-master-lokasi", function(e) {
            e.preventDefault();
            $('#menu-data-v3').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_lokasi_clone_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-data-v3').html(data);
            }).fail(function() {
                $('#menu-data-v3').html('eror');
            });

        });
        $(document).on("click", "#button-add-data-lokasi-v2", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-lokasi').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('masteradmin_lokasi_add_data_v2') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-lokasi').html(data);
            }).fail(function() {
                $('#menu-lokasi').html('eror');
            });

        });
    </script>
@endsection
