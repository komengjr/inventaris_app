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
                                    <h4 class="text-primary mb-0">0 Record</h4>
                                    <span class="small-font">Notifikasi Order</span>
                                </div>
                                <div class="w-circle-icon rounded bg-primary" style="cursor: pointer;" data-toggle="modal" data-target="#modalmutasirecord" id="buttonshownotiforder">
                                    <i class="fa fa-clock-o text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-secondary mb-0">0</h4>
                                    <span class="small-font">History Record</span>
                                </div>
                                <div class="w-circle-icon rounded bg-secondary" style="cursor: pointer;" data-toggle="modal" data-target="#modalmutasirecord">
                                    <i class="fa fa-history text-white"></i>
                                </div>
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
            <div class="row" >
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-sm-right m-3 m-3">
                                <button type="button" class="btn-success waves-effect waves-light"  data-toggle="modal" data-target="#modalmutasi" id="ordertiketmutasi" data-url={{ url('divisi/datamutasi/tambahdata', []) }}>
                                    <i class="fa fa-plus mr-1"></i> Tambah Data
                                </button>
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
                                                {{$no++}}
                                            </td>
                                            <td>{{$item->kd_mutasi}}</td>
                                            <td>
                                                @if ($item->jenis_mutasi == 1)
                                                Mutasi Antar Cabang
                                                @endif
                                            </td>
                                            <td>
                                            {{$item->penanggung_jawab}}
                                            </td>
                                            <td>
                                                {{$item->menyetujui}}
                                            </td>
                                            <td>
                                                {{$item->yang_menyerahkan}}
                                            </td>
                                            <td>
                                                {{$item->penerima}}
                                            </td>
                                            <td>
                                                {{$item->tgl_terima}}
                                            </td>
                                            <td>
                                                @if ($item->status_mutasi == 0)
                                                <button class="btn-warning" data-toggle="modal" data-target="#modalmutasi" id="buttondetailmutasibarang" data-id="{{$item->kd_mutasi}}" ><i class="fa fa-pencil"></i> Lengkapi Data</button>
                                                @else
                                                <button onclick="window.open('{{ url('divisi/datamutasi/print/datamutasi', ['id'=>$item->kd_mutasi]) }}', '', 'width=1200, height=700');"class="btn-info"
                                                    id="" data-url="asdasd"><i class="fa fa-print"></i> Cetak / Print</button>
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
    <script src="{{ url('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/Chart.js/Chart.min.js', []) }}"></script>
    {{-- <script src="{{ url('assets/js/dashboard-logistics.js', []) }}"></script> --}}
    <script>
        $(document).ready(function() {

            $('#default-datatable').DataTable();

        });
    </script>
@endsection
