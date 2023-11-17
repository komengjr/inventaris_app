@extends('layouts.app')
@section('content')
    <div class="content-wrapper gradient-forest">
        <div class="container-fluid">
            <div class="row pl-2 pt-2 pb-2">
                <div class="col-sm-9">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Inventaris & aset</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form</li>
                    </ol>
                </div>
            </div>
            @if ($message = Session::get('sukses'))
                <div class="pl-3 pt-2 pb-2">
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

                            </div>
                            <div class="float-sm-right m-3 m-3">
                                <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal"
                                    data-target="#tambahdatabaru" id="tombolbarupeminjaman"
                                    data-url="{{ url('divisi/tambahdataverifikasiinventaris', []) }}">
                                    <i class="fa fa-plus mr-1"></i> Tambah Data
                                </button>
                                {{-- <button type="button" class="btn-primary waves-effect waves-light">
                            <i class="fa fa-print mr-1"></i> Print
                        </button> --}}
                                {{-- <button type="button" data-toggle="modal" data-target="#upload-detail-barang" class="btn-dark waves-effect waves-light" >
                <i class="fa fa-upload mr-1"></i> Upload Data
                </button> --}}
                            </div>
                            <div class="table-responsive" id="showdatamutasi">
                                <table id="default-datatable" class="table styled-table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Verifikasi</th>
                                            <th>Tanggal Verifikasi</th>
                                            <th>Tahun Verifikasi</th>
                                            <th>Status Verifikasi</th>

                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($dataverif as $dataverif)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $dataverif->kode_verif }}</td>
                                                <td>{{ $dataverif->tgl_verif }}</td>
                                                <td>{{ $dataverif->tahun }}</td>
                                                <td>{{ $dataverif->status_verif }}</td>

                                                <td class="text-center">
                                                    <button class="btn-warning" data-toggle="modal"
                                                        data-target="#lengkapipeminjaman" id="tombollengkapipeminjaman"
                                                        data-url="{{ url('divisi/verifikasi/lengkapi', ['id' => $dataverif->kode_verif]) }}">Lengkapi
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
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatalengkapi">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#default-datatable').DataTable();

        });
    </script>
@endsection
