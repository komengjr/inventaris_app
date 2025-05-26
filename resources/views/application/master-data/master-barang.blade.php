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
                            <h6 class="text-primary fs--1 mb-0 pt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div>
                        <img class="ms-n4 d-none d-lg-block "
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Barang Cabang</span>
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
                    <h5 class="mb-0">Master Barang Cabang</h5>
                </div>
                <div class="col-auto">
                    {{-- <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                        data-bs-target="#modal-user" id="button-add-data-user">
                        <span class="far fa-user fs--2 me-1"></span>Tambah No Document</a> --}}
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Nama Document</th>
                        <th>No Document</th>
                        <th>Cabang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-user" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-user"></div>
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

@endsection
