@extends('layouts.app')

@section('content')
<style>
.modal {
  padding: 10px; !important; //
}
.modal .modal-dialog {
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
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pl-2 pt-2 pb-2">
                <div class="col-sm-9">
                    {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Peminjaman</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card gradient-ohhappiness">
                        <div class="card-body">
                            <div class="row row-group align-items-center">
                                <div class="col-12 col-lg-3 text-center p-3 border-white-2">
                                    <div class="fleet-status fleet-chart" data-percent="65">
                                        <span class="fleet-status-percent"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 text-center p-3  border-white-2">
                                    <h4 class="mb-0 text-white">65%</h4>
                                    <p class="mb-0 small-font text-white">Persentase</p>
                                </div>
                                <div class="col-12 col-lg-5 p-3">
                                    <ul>
                                        <li class="text-white">Total Laporan : 0</li>
                                        <li class="text-white">Dapat Di Perbaiki : 0</li>
                                        <li class="text-white">Tidak Dapat di Perbaiki : 0</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('sukses'))
                    <div class="pl-1 pt-2 pb-2">
                        <div class="alert alert-icon-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon icon-part-success">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="alert-message">
                                <span><strong>Success!</strong> ---- <a href="javascript:void();"
                                        class="alert-link">{{ $message }}</a></span>
                            </div>
                        </div>
                    </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-sm-left m-3 m-3">
                                {{-- <h4 class="page-title">Data Peminjaman </h4> --}}
                            </div>
                            <div class="float-sm-right m-3 m-3">
                                <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal"
                                    data-target="#tambahdatabaru" id="tombolbarupeminjaman"
                                    data-url="{{ url('divisi/tambahdatapeminjaman', []) }}">
                                    <i class="fa fa-plus mr-1"></i> Tambah Data
                                </button>
                                <button type="button" class="btn-primary waves-effect waves-light">
                                    <i class="fa fa-print mr-1"></i> Print
                                </button>
                                {{-- <button type="button" data-toggle="modal" data-target="#upload-detail-barang" class="btn-dark waves-effect waves-light" >
                    <i class="fa fa-upload mr-1"></i> Upload Data
                    </button> --}}
                            </div>
                            <div class="table-responsive" id="showdatamutasi">
                                <table id="default-datatable" class="table styled-table table-bordered align-items-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tiket Peminjaman</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Status Peminjaman</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($datapinjam as $datapinjam)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $datapinjam->tiket_peminjaman }}</td>
                                                <td>{{ $datapinjam->nama_kegiatan }}</td>
                                                <td>{{ $datapinjam->tgl_pinjam }}</td>
                                                <td>{{ $datapinjam->pj_pinjam }}</td>
                                                <td>{{ $datapinjam->status_pinjam }}</td>
                                                <td class="text-center">
                                                    <button class="btn-warning" data-toggle="modal"
                                                        data-target="#lengkapipeminjaman" id="tombollengkapipeminjaman"
                                                        data-url="{{ url('divisi/peminjaman/lengkapi', ['id' => $datapinjam->id_pinjam]) }}">Lengkapi
                                                        data</button>
                                                    <button class="btn-danger"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahdatabaru">
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatasdm">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lengkapipeminjaman">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div id="showdatalengkapi">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="upload-detail-barang">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content animated fadeInUp">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



            </div>
        </div>
    </div>
    <script src="{{ url('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/Chart.js/Chart.min.js', []) }}"></script>
    <script>
        $(function() {
            "use strict";


            // chart 1

            $('.fleet-chart').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#ffffff',
                lineWidth: 10,
                trackColor: 'rgba(255, 255, 255, 0.12)',
                scaleColor: false,
                onStep: function(from, to, percent) {
                    $(this.el).find('.fleet-status-percent').text(Math.round(percent));
                }
            });
        });
    </script>
@endsection