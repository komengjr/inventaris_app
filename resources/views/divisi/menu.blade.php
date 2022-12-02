@extends('layouts.app')

@section('content')
    {{-- @notifyCss --}}
    <div class="row pl-3 pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Form SDM & Umum</h4>
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
                <span><strong>Success!</strong> ---- <a href="javascript:void();" class="alert-link">{{ $message }}</a></span>
            </div>
        </div>
    </div>
    @endif
    <div class="row pl-3 pt-2 pb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-sm-left m-3 m-3">
                        <h4 class="page-title">Data Peminjaman <strong style="color: rgb(223, 8, 8)">Cabang :
                                a</strong></h4>
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
                        <table id="default-datatable" class="styled-table table-bordered">
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
                                @foreach ($datapinjam as $datapinjam)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $datapinjam->tiket_peminjaman }}</td>
                                        <td>{{ $datapinjam->nama_kegiatan }}</td>
                                        <td>{{ $datapinjam->tgl_pinjam }}</td>
                                        <td>{{ $datapinjam->pj_pinjam }}</td>
                                        <td>{{ $datapinjam->status_pinjam }}</td>
                                        <td class="text-center">
                                            <button class="btn-warning" data-toggle="modal" data-target="#lengkapipeminjaman" id="tombollengkapipeminjaman" data-url="{{ url('divisi/peminjaman/lengkapi', ['id'=>$datapinjam->id_pinjam]) }}">Lengkapi data</button>
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
    <div class="row pl-3 pt-2 pb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-sm-left m-3 m-3">
                        <h4 class="page-title">Data Mutasi <strong style="color: rgb(223, 8, 8)">Cabang :
                                a</strong></h4>
                    </div>
                    <div class="float-sm-right m-3 m-3">
                        <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#tambahdatabaru" id="tombolbarumutasi"
                            data-url="{{ url('divisi/tambahdatamutasi', []) }}">
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
                        <table id="default-asd" class="styled-table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Ururt Barang</th>
                                    <th>kode Inventaris</th>
                                    <th>Kategori Barang</th>
                                    <th>Nama Kelompok Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pl-3 pt-2 pb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-sm-left m-3 m-3">
                        <h4 class="page-title">Data Pemusnahan <strong style="color: rgb(223, 8, 8)">Cabang :
                                a</strong></h4>
                    </div>
                    <div class="float-sm-right m-3 m-3">
                        <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#tambahdatabaru" id="tombolbarupemusnahan"
                            data-url="{{ url('divisi/tambahdatapemusnahan', []) }}">
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
                        <table id="default-table1" class="styled-table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Ururt Barang</th>
                                    <th>kode Inventaris</th>
                                    <th>Kategori Barang</th>
                                    <th>Nama Kelompok Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
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
@endsection
