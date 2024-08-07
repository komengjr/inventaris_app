@extends('layouts.app')

@section('content')
    <style>
        .modal {
            padding: 10px;
            !important; //
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
            <div class="card mt-3 mr-2">
                <div class="row pl-4 pt-3">
                    <div class="col-sm-9">
                        <h4 class="page-title">Menu Peminjaman</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu Peminjaman</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card gradient-ohhappiness">
                        <div class="card-body">
                            <div class="row row-group align-items-center">
                                <div class="col-12 col-lg-3 text-center p-3 border-white-2">
                                    <div class="fleet-status fleet-chart"
                                        data-percent="{{ ($jumlahdataselesai * 100) / $jumlahdata }}">
                                        <span class="fleet-status-percent"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 text-center p-3  border-white-2">
                                    <h4 class="mb-0 text-white">{{ round(($jumlahdataselesai * 100) / $jumlahdata) }}%</h4>
                                    <p class="mb-0 small-font text-white">Persentase</p>
                                </div>
                                <div class="col-12 col-lg-5 p-3">
                                    <ul>
                                        <li class="text-white">Total Peminjaman : {{ $jumlahdata }}</li>
                                        <li class="text-white">Selesai : {{ $jumlahdataselesai }}</li>
                                        <li class="text-white">Belum Selesai : {{ $jumlahdata - $jumlahdataselesai }}</li>
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
                                    <a href="javaScript:void();" class="dropdown-item" data-toggle="modal"
                                        data-target="#tambahdatabaru" id="tombolbarupeminjaman"
                                        data-url="{{ url('divisi/tambahdatapeminjaman', []) }}"><i
                                            class="fa fa-plus mr-1"></i> Tambah Data Peminjaman</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javaScript:void();" class="dropdown-item" data-toggle="modal"
                                        data-target="#tambahdatabaru" id="button-request-peminjaman"
                                        data-url="{{ url('divisi/requestdatapeminjaman', []) }}"><i
                                            class="fa fa-plus mr-1"></i> Request Peminjaman Antar Cabang</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pb-3" id="showdatamutasi">
                            <table id="default-datatable" class="table styled-table table-bordered align-items-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tiket Peminjaman</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Batas Tanggal Peminjaman</th>
                                        <th>Penanggung Jawab Cabang</th>
                                        <th>Status Peminjaman</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($datapinjam as $datapinjam)
                                        @if ($datapinjam->kd_cabang == Auth::user()->cabang)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    @if ($datapinjam->kd_cabang == $datapinjam->tujuan_cabang)
                                                        <span class="badge badge-primary p-1">Antar Divisi</span> <br>
                                                    @else
                                                        <span class="badge badge-secondary p-1">Antar Cabang</span> <br>
                                                    @endif
                                                    {{ $datapinjam->tiket_peminjaman }}
                                                </td>
                                                <td>{{ $datapinjam->nama_kegiatan }}</td>
                                                <td>{{ $datapinjam->tgl_pinjam }}</td>
                                                <td>{{ $datapinjam->batas_tgl_pinjam }}</td>
                                                <td>{{ $datapinjam->nama_staff }}</td>
                                                {{-- <td>{{ $datapinjam->tujuan_cabang }}</td> --}}
                                                <td class="text-center">
                                                    @if ($datapinjam->status_pinjam == 0)
                                                        <span class="badge badge-danger p-2">Pending</span>
                                                    @elseif($datapinjam->status_pinjam == 10)
                                                        <span class="badge badge-warning p-2">Proses</span>
                                                    @else
                                                        <span class="badge badge-success p-2">Done</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button type="button"
                                                        class="btn-info waves-effect waves-light dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if ($datapinjam->status_pinjam == 0)
                                                            <a href="javaScript:void();" class="dropdown-item"
                                                                class="btn-warning" data-toggle="modal"
                                                                data-target="#lengkapipeminjaman"
                                                                id="tombollengkapipeminjaman"
                                                                data-url="{{ url('divisi/peminjaman/lengkapi', ['id' => $datapinjam->id_pinjam]) }}"><i
                                                                    class="fa fa-file-text"></i> Lengkapi Data</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="javaScript:void();" class="dropdown-item"
                                                                data-toggle="modal" data-target="#tambahdatabaru"
                                                                id="editdatapeminjamaninventaris"
                                                                data-url="{{ url('divisi/peminjaman/editdatatablepeminjaman', ['id' => $datapinjam->id_pinjam]) }}"><i
                                                                    class="fa fa-pencil-square-o"></i> Edit</a>
                                                        @elseif($datapinjam->status_pinjam == 10)
                                                            <a href="javaScript:void();" class="dropdown-item"
                                                                class="btn-warning" data-toggle="modal"
                                                                data-target="#lengkapipeminjaman"
                                                                id="tombollengkapipeminjaman"
                                                                data-url="{{ url('divisi/peminjaman/lengkapi', ['id' => $datapinjam->id_pinjam]) }}"><i
                                                                    class="fa fa-file-text"></i> Penyelesaian Data</a>
                                                        @else
                                                            <a href="javaScript:void();" class="dropdown-item"
                                                                id="button-print-hasipeminjaman" data-toggle="modal"
                                                                data-target="#modal-report"
                                                                data-id="{{ $datapinjam->tiket_peminjaman }}"><i
                                                                    class="fa fa-print"></i>
                                                                Cetak / Print</a>
                                                        @endif

                                                        {{-- <a href="javaScript:void();" class="dropdown-item" ><i class="fa fa-trash"></i> Hapus</a> --}}
                                                    </div>


                                                </td>
                                            </tr>
                                        @elseif ($datapinjam->tujuan_cabang == Auth::user()->cabang)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="badge badge-secondary p-1">Antar Cabang</span> <br>
                                                    {{ $datapinjam->tiket_peminjaman }}
                                                </td>
                                                <td>{{ $datapinjam->nama_kegiatan }}</td>
                                                <td>{{ $datapinjam->tgl_pinjam }}</td>
                                                <td>{{ $datapinjam->batas_tgl_pinjam }}</td>
                                                <td>
                                                    @php
                                                        $nama_staff = DB::table('tbl_staff')
                                                            ->where('nip', $datapinjam->pj_pinjam_cabang)
                                                            ->first();
                                                    @endphp
                                                    @if ($nama_staff)
                                                        {{ $nama_staff->nama_staff }}
                                                    @else
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $datapinjam->tujuan_cabang }}</td> --}}
                                                <td class="text-center">
                                                    @if ($datapinjam->status_pinjam == 0)
                                                        <span class="badge badge-danger p-2">Pending</span>
                                                    @elseif($datapinjam->status_pinjam == 10)
                                                        <span class="badge badge-warning p-2">Proses</span>
                                                    @else
                                                        <span class="badge badge-success p-2">Done</span>
                                                    @endif

                                                </td>
                                                <td class="text-center">
                                                    <button type="button"
                                                        class="btn-info waves-effect waves-light dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">

                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if ($datapinjam->status_pinjam == '0')
                                                            <a href="javaScript:void();" class="dropdown-item"
                                                                class="btn-warning" data-toggle="modal"
                                                                data-target="#lengkapipeminjaman"
                                                                id="tombollengkapipeminjaman"
                                                                data-url="{{ url('divisi/peminjaman/verifikasidata', ['id' => $datapinjam->id_pinjam]) }}"><i
                                                                    class="fa fa-file-text"></i> Verif Data</a>
                                                            <div class="dropdown-divider"></div>
                                                        @elseif($datapinjam->status_pinjam == '10')
                                                            <span class="badge badge-warning p-2">Barang Berhasil
                                                                dipinjam</span>
                                                        @else
                                                            <a href="javaScript:void();" class="dropdown-item"
                                                                id="button-print-hasipeminjaman" data-toggle="modal"
                                                                data-target="#modal-report"
                                                                data-id="{{ $datapinjam->tiket_peminjaman }}"><i
                                                                    class="fa fa-print"></i>
                                                                Cetak / Print</a>
                                                        @endif

                                                        {{-- <a href="javaScript:void();" class="dropdown-item" ><i class="fa fa-trash"></i> Hapus</a> --}}
                                                    </div>


                                                </td>
                                            </tr>
                                        @endif
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
    <div class="modal fade" id="tambahdatabaru">
        <div class="modal-dialog modal-dialog-centered modal-lg">
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
    <div class="modal fade" id="modal-report">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content animated fadeInUp ">
                <div class="modal-header">
                    <h5 class="modal-title">Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-report-peminjaman" style="text-align: center;">

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
        $(document).on("click", "#button-print-hasipeminjaman", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#modal-report-peminjaman").html(
                '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>'
            );
            $.ajax({
                    url: "../divisi/verifikasi/print/peminjaman/" + id,
                    type: "GET",
                    dataType: "html",
                })
                .done(function(data) {
                    $("#modal-report-peminjaman").html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                    );
                })
                .fail(function() {
                    $("#modal-report-peminjaman").html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });
        });
    </script>
@endsection
