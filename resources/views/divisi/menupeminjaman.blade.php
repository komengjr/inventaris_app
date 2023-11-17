@extends('layouts.app')

@section('content')
<style>
.modal {
  padding: 10px; !important; //
}
.modal .modal-xl {
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
                                    <div class="fleet-status fleet-chart" data-percent="{{(($jumlahdataselesai)*100)/$jumlahdata}}">
                                        <span class="fleet-status-percent"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 text-center p-3  border-white-2">
                                    <h4 class="mb-0 text-white">{{round((($jumlahdataselesai)*100)/$jumlahdata)}}%</h4>
                                    <p class="mb-0 small-font text-white">Persentase</p>
                                </div>
                                <div class="col-12 col-lg-5 p-3">
                                    <ul>
                                        <li class="text-white">Total Peminjaman : {{$jumlahdata}}</li>
                                        <li class="text-white">Selesai : {{$jumlahdataselesai}}</li>
                                        <li class="text-white">Belum Selesai : {{$jumlahdata - $jumlahdataselesai}}</li>
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
                                            {{-- <th>Tujuan Cabang</th> --}}
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
                                                <td>{{ $datapinjam->nama_staff }}</td>
                                                {{-- <td>{{ $datapinjam->tujuan_cabang }}</td> --}}
                                                <td class="text-center">
                                                    @if ($datapinjam->status_pinjam == 0)
                                                    <span class="badge badge-danger p-2">Pending</span>
                                                    @else
                                                    <span class="badge badge-success p-2">Done</span>
                                                    @endif

                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if ($datapinjam->status_pinjam == 0)
                                                        <a href="javaScript:void();" class="dropdown-item" class="btn-warning" data-toggle="modal"
                                                        data-target="#lengkapipeminjaman" id="tombollengkapipeminjaman"
                                                        data-url="{{ url('divisi/peminjaman/lengkapi', ['id' => $datapinjam->id_pinjam]) }}"><i class="fa fa-file-text"></i> Lengkapi Data</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" data-target="#tambahdatabaru" id="editdatapeminjamaninventaris" data-url="{{ url('divisi/peminjaman/editdatatablepeminjaman', ['id' => $datapinjam->id_pinjam]) }}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                        @else
                                                        <a href="javaScript:void();" class="dropdown-item" onclick="window.open('{{ url('divisi/verifikasi/print/peminjaman', ['id'=>$datapinjam->tiket_peminjaman]) }}', '', 'width=1200, height=700');"
                                                        id=""><i class="fa fa-print"></i> Cetak / Print</a>
                                                        @endif

                                                      {{-- <a href="javaScript:void();" class="dropdown-item" ><i class="fa fa-trash"></i> Hapus</a> --}}
                                                    </div>


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
        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 100%;">
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
     <script>
        $(document).ready(function() {

            $('#default-datatable').DataTable();

        });
    </script>
@endsection
