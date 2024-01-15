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
            <div class="card mt-3">
                <div class="row pl-4 pt-3">
                    <div class="col-sm-9">
                        <h4 class="page-title">Master Lokasi</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu Lokasi</li>
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
                                    <div class="fleet-status fleet-chart" data-percent="">
                                        <span class="fleet-status-percent"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 text-center p-3  border-white-2">
                                    <h4 class="mb-0 text-white"></h4>
                                    <p class="mb-0 small-font text-white">Persentase</p>
                                </div>
                                <div class="col-12 col-lg-5 p-3">
                                    <ul>
                                        {{-- <li class="text-white">Total Peminjaman : {{$jumlahdata}}</li>
                                        <li class="text-white">Selesai : {{$jumlahdataselesai}}</li>
                                        <li class="text-white">Belum Selesai : {{$jumlahdata - $jumlahdataselesai}}</li> --}}
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
                    <div class="card pb-4">
                        <div class="">

                            <div class="float-sm-right m-3 m-3">
                                <div class="btn-group m-0">
                                    <button type="button" class="btn-info waves-effect waves-light"> <i
                                            class="fa fa-cog"></i> <span>Menu Option</span> </button>
                                    <button type="button"
                                        class="btn-info split-btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(102px, 37px, 0px);">
                                        <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" data-target="#tambahdatabaru" id="buttontambahnomorruangan"><i class="fa fa-plus mr-1"></i> Tambah Nomor Ruangan</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" data-target="#tambahdatabaru" id="button-show-lokasi-cabang"><i class="fa fa-eye mr-1"></i> Data Lokasi Cabang</a>
                                        <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" data-target="#tambahdatabaru" id="buttonlihatmasterlokasi"><i class="fa fa-eye mr-1"></i> Master Lokasi</a>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive" id="showdatamutasi">
                                <table id="default-datatable" class="table styled-table table-bordered align-items-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Ruangan</th>
                                            <th>Nama Ruangan</th>
                                            <th>Total Barang Masuk</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($ruangan as $item)
                                            <tr>
                                                <td>{{ $no++ }} </td>
                                                <td>{{ $item->nomor_ruangan }} </td>
                                                <td>{{ $item->nama_lokasi }}</td>
                                                <td>
                                                    @php
                                                        $barang = DB::table('sub_tbl_inventory')
                                                            // ->join('tbl_nomor_ruangan_cabang','tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang','=','sub_tbl_inventory.id_nomor_ruangan_cbaang')
                                                            ->where('id_nomor_ruangan_cbaang', $item->id_nomor_ruangan_cbaang)
                                                            ->count();
                                                    @endphp
                                                    {{ $barang }}
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        $cekdata = DB::table('sub_tbl_inventory')
                                                            ->where('kd_lokasi', $item->kd_lokasi)
                                                            ->where('kd_cabang', Auth::user()->cabang)
                                                            ->first();
                                                    @endphp
                                                    @if ($cekdata)
                                                        <button class="btn-primary" data-toggle="modal"
                                                            data-target="#buttontableruangan" id="buttonsetupdataruangan"
                                                            data-id="{{ $item->id_nomor_ruangan_cbaang }}"><i
                                                                class="fa fa-cog"></i> Setup</button>
                                                        <button class="btn-info" data-toggle="modal"
                                                            data-target="#buttontableruangan"
                                                            id="buttontablemasterlokasibarang"
                                                            data-id="{{ $item->id_nomor_ruangan_cbaang }}"><i
                                                                class="fa fa-eye"></i> Master</button>

                                                    @else
                                                        <button type="button" class="btn-danger"
                                                            id="confirm-btn-alert{{ $item->id_nomor_ruangan_cbaang }}"
                                                            data-id="{{ $item->id_nomor_ruangan_cbaang }}">Hapus</button>
                                                        <script>
                                                            $("#confirm-btn-alert{{ $item->id_nomor_ruangan_cbaang }}").click(function() {
                                                                swal({
                                                                    title: "Are you sure?",
                                                                    text: "Delete Data lokasi dengan Kode ",
                                                                    icon: "warning",
                                                                    buttons: true,
                                                                    dangerMode: false,
                                                                }).then((willDelete) => {
                                                                    if (willDelete) {
                                                                        swal("Data Lokasi Berhasil Di Hapus", {
                                                                            icon: "success",
                                                                        });
                                                                        var id = $(this).data("id");
                                                                        $.ajax({
                                                                                url: '../divisipost/datalokasi/delete/detail/' + id,
                                                                                type: "GET",
                                                                                // data: data,
                                                                                // dataType: "html",
                                                                            })
                                                                            .done(function(data) {
                                                                                location.reload();
                                                                            })
                                                                            .fail(function() {
                                                                                swal("Batal Menghapus");
                                                                            });
                                                                    } else {
                                                                        swal("Batal Menghapus");
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    @endif
                                                    <button class="btn-warning"data-toggle="modal" data-target="#tambahdatabaru" id="button-edit-master-nomor-lokasi" data-id="{{ $item->id_nomor_ruangan_cbaang }}"><i class="fa fa-pencil"></i> Edit</button>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div id="showdatalokasi">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="buttontableruangan">
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
    <script src="{{ asset('assets/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
@endsection
