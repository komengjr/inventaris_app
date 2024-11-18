@extends('layouts.app')
@section('content')
    <style>
        .modal {
            padding: 10px;
            !important; //
        }

        .modal .modal-full {
            width: 100%;
            max-width: none;
            /* height: 100%; */
            margin: 0;
        }

        .modal .modal-content {
            /* height: 100%; */
            border: 0;
            border-radius: 0;
        }

        .modal .modal-body {
            overflow-y: auto;
        }
    </style>
    <div class="content-wrapper gradient-forest">
        <div class="container-fluid" id="menudetaildataaset">
            <div class="card mt-3 mr-2">
                <div class="row pl-4 pt-3">
                    <div class="col-sm-9">
                        <h4 class="page-title">Menu Mutasi</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu Mutasi</li>
                        </ol>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-primary mb-0">{{$order}} Order</h4>
                                    <span class="small-font">Notifikasi Order</span>
                                </div>
                                <button class="btn btn-info" style="cursor: pointer;" data-toggle="modal"
                                data-target="#modalmutasirecord" id="buttonshownotiforder"><i class="fa fa-clock-o text-white"></i> Lihat Order Mutasi</button>
                                {{-- <div class="w-circle-icon rounded bg-primary" >
                                     Lihat Order
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-secondary mb-0">{{$jumlah}}</h4>
                                    <span class="small-font">Data Rekap Mutasi</span>
                                </div>
                                <button class="btn btn-info" style="cursor: pointer;" data-toggle="modal"
                                data-target="#modalmutasirecord" id="button-rekap-mutasi-cabang"><i class="fa fa-clock-o text-white"></i> Lihat Rekap Mutasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->



            <!--End Row-->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="float-right m-3 m-3">
                            <div class="btn-group m-0" style="float: right;">
                                <button type="button" class="btn-info waves-effect waves-light"> <i class="fa fa-cog"></i>
                                    <span>Menu Option</span> </button>
                                <button type="button"
                                    class="btn-info split-btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(102px, 37px, 0px);">
                                    <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" data-target="#modalmutasi" id="ordertiketmutasi"
                                    data-url="{{ url('divisi/datamutasi/tambahdata', []) }}"><i class="fa fa-plus mr-1"></i> Tambah Data Mutasi</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pb-5">
                            <table class="table styled-table align-items-center table-flush pb-2" id="default-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tiket Order</th>
                                        <th>Jenis Mutasi</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Menyetujui</th>
                                        <th>Yang Menyerahkan</th>
                                        <th>Penerima</th>
                                        <th>Tanggal Terima</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                                @if ($item->jenis_mutasi == 1)
                                                    Mutasi Antar Cabang
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->penanggung_jawab }}
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
                                                @if ($item->status_mutasi == 0)
                                                    <button class="btn-warning" data-toggle="modal"
                                                        data-target="#modalmutasi" id="buttondetailmutasibarang"
                                                        data-id="{{ $item->kd_mutasi }}"><i class="fa fa-pencil"></i>
                                                        Lengkapi Data</button>
                                                @else
                                                    <button class="btn-info" id="button-report-mutasi-cabang"
                                                        data-toggle="modal" data-target="#modal-report-mutasi"
                                                        data-id="{{ $item->kd_mutasi }}"><i class="fa fa-print"></i>
                                                        Cetak / Print</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container-fluid-->
    </div>
    <div class="modal fade" id="modalmutasi">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div id="showdatalengkapi">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalmutasirecord">
        <div class="modal-dialog modal-dialog-centered modal-full">
            <div class="modal-content">
                <div id="bodymodalmutasirecord">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-report-mutasi" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content animated flipInX">
                <div class="modal-header">
                    <h5 class="modal-title">Report</h5>
                    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="view-report-mutasi">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, dicta. Voluptate cumque odit quam
                        velit maiores sint rerum, dolore impedit commodi. Tempora eveniet odit vero rem blanditiis, tenetur
                        laudantium cumque.</p>

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/Chart.js/Chart.min.js', []) }}"></script>
    {{-- <script src="{{ url('assets/js/dashboard-logistics.js', []) }}"></script> --}}
    <script>
        $(document).ready(function() {

            $('#default-datatable').DataTable();

        });
    </script>
    <script>
        $(document).on("click", "#button-report-mutasi-cabang", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#view-report-mutasi").html(
                '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
            );
            $.ajax({
                    url: "../divisi/datamutasi/print/datamutasi/" + id,
                    type: "GET",
                    dataType: "html",
                })
                .done(function(data) {
                    $("#view-report-mutasi").html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                    );
                })
                .fail(function() {
                    Lobibox.notify('error', {
                        pauseDelayOnHover: true,
                        icon: 'fa fa-info-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'center top',
                        showClass: 'bounceIn',
                        hideClass: 'bounceOut',
                        width: 500,
                        msg: 'Hubungi Administrator Jika terjadi Eror'
                    });

                });
        });
    </script>
@endsection
