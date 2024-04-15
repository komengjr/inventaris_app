@extends('layouts.app')
@section('content')
<style>
    .list-group-item:hover{
        background: rgb(168, 156, 156);
        cursor: pointer;
    }
</style>
    <div class="content-wrapper gradient-forest">
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="row pl-4 pt-3">
                    <div class="col-sm-9">
                        <h4 class="page-title">Menu Laporan</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu Laporan</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Report Menu
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush shadow-none">
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="{{ asset('vendor/icon/1.png') }}" alt="user avatar"
                                        class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Menu Peminjaman</h6>
                                        <small class="small-font"><span class="badge badge-success shadow-success m-0">Aktif</span></small>
                                    </div>
                                    <div class="date">
                                        <button class="btn-dark" data-toggle="modal" data-target="#modal-laporan"
                                            id="button-report-peminjaman"><i class="zmdi zmdi-assignment"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="{{ asset('vendor/icon/2.png') }}" alt="user avatar"
                                        class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Menu Maintenance</h6>
                                        <small class="small-font">Soon</small>
                                    </div>
                                    <div class="date">
                                        <button class="btn-dark"><i class="zmdi zmdi-assignment"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="{{ asset('vendor/icon/3.png') }}" alt="user avatar"
                                        class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Menu Mutasi</h6>
                                        <small class="small-font">Soon</small>
                                    </div>
                                    <div class="date">
                                        <button class="btn-dark"><i class="zmdi zmdi-assignment"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="{{ asset('vendor/icon/4.png') }}" alt="user avatar"
                                        class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Menu Pemusnahan</h6>
                                        <small class="small-font">Soon</small>
                                    </div>
                                    <div class="date">
                                        <button class="btn-dark" ><i class="zmdi zmdi-assignment"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="{{ asset('vendor/icon/5.png') }}" alt="user avatar"
                                        class="customer-img rounded">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Menu Stockopname</h6>
                                        <small class="small-font"><span class="badge badge-success shadow-success m-0">Aktif</span></small>
                                    </div>
                                    <div class="date">
                                        <button class="btn-dark" data-toggle="modal" data-target="#modal-laporan"
                                        id="button-report-stokopname"><i class="zmdi zmdi-assignment"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <img src="{{ asset('vendor/icon/6.png') }}" alt="user avatar"
                                        class="customer-img rounded" width="60">
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Menu Laporan Maintenance Bulanan IT</h6>
                                        <small class="small-font"><span class="badge badge-success shadow-success m-0">Aktif</span></small>
                                    </div>
                                    <div class="date">
                                        <button class="btn-dark" data-toggle="modal" data-target="#modal-laporan"
                                        id="button-report-stokopname"><i class="zmdi zmdi-assignment"></i></button>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="card-footer text-center bg-transparent border-0">
                            {{-- <a href="javascript:void();">View all listings</a> --}}
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Report Data Barang
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(14px, 18px, 0px);">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush shadow-none">
                            <li class="list-group-item" data-toggle="modal" data-target="#modal-laporan"
                            id="button-laporan-barang-keseluruhan">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-light">
                                        <i class="zmdi zmdi-assignment"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Barang Keseluruhan</h6>
                                    </div>
                                    <div class="date">
                                        <i class="zmdi zmdi-assignment"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-toggle="modal" data-target="#modal-laporan"
                            id="button-laporan-barang-lokasi">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-light">
                                        <i class="zmdi zmdi-assignment"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Barang Per Ruangan</h6>
                                    </div>
                                    <div class="date">
                                    <i class="zmdi zmdi-assignment"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-toggle="modal" data-target="#modal-laporan"
                            id="button-laporan-barang-klasifikasi">
                                <div class="media align-items-center">
                                    <div class="icon-box border border-light">
                                        <i class="zmdi zmdi-assignment"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0">Barang Berdasarkan Klasifikasi</h6>
                                    </div>
                                    <div class="date">
                                        <i class="zmdi zmdi-assignment"></i>
                                    </div>
                                </div>
                            </li>

                        </ul>

                        <div class="card-footer text-center border-0">
                            {{-- <a href="javascript:void();">View all Categories</a> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-laporan">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div id="menu-laporan">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", "#button-report-peminjaman", function(e) {
            e.preventDefault();
            $("#menu-laporan").html(
                '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>');
            $.ajax({
                    url: '../menu/masterlaporan/report-peminjaman/',
                    type: "GET",
                    dataType: "html",
                })
                .done(function(data) {
                    $("#menu-laporan").html(data);
                })
                .fail(function() {
                    $("#menu-laporan").html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });

        });
        $(document).on("click", "#button-report-stokopname", function(e) {
            e.preventDefault();
            $("#menu-laporan").html(
                '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>');
            $.ajax({
                    url: '../menu/masterlaporan/report-stokopname/',
                    type: "GET",
                    dataType: "html",
                })
                .done(function(data) {
                    $("#menu-laporan").html(data);
                })
                .fail(function() {
                    $("#menu-laporan").html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });

        });
    </script>
@endsection
