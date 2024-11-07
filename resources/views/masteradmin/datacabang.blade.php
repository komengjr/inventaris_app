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
    </style>

    <div class="row pl-3 pt-2 pb-2" id="menumasteradminplus">

        <div class="col-sm-9">
            <h4 class="page-title">Data Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('masteradmin', []) }}">Master Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Master</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-light waves-effect waves-light">
                    <i class="fa fa-cog mr-1"></i> Pengaturan Data
                </button>
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                    data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    @if (Auth::user()->akses == 'admin')
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                            class="dropdown-item" id="buttondatacabang" data-url="{{ url('master/datacabang', []) }}"><i class="fa fa-file-text-o"></i> 1. Data Cabang</a>
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                            class="dropdown-item" id="buttondatalokasi" data-url="{{ url('master/datalokasi', []) }}"><i class="fa fa-file-text-o"></i> 2. Data Lokasi</a>
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                            class="dropdown-item" id="buttondataklasifikasi" data-url="{{ url('master/dataklasifikasi', []) }}"><i class="fa fa-file-text-o"></i> 4. Data Klasifikasi</a>
                    @else
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="body">
        @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="alert-icon">
                <i class="fa fa-check"></i>
                </div>
                <div class="alert-message">
                <span><strong>{{ $message }}</strong> This is a success alert—check it out!</span>
                </div>
            </div>
        @endif
    </div>
    <div class="body" id="showdatamaster">
        <div class="row pl-3 pt-2 pb-2" >
            <table id="default-datatable" class="styled-table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Cabang</th>
                        <th>Alamat</th>
                        <th>Data Excel</th>
                        <th>Data Master</th>
                        <th>Telegram</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no=1;?>
                    @foreach ($data as $data)
                    <tr>
                        <td data-label="No">{{$no++}}</td>
                        <td data-label="Nama Cabang">{{$data->nama_cabang}}</td>
                        <td data-label="Alamat">{{$data->alamat}}</td>
                        <td data-label="Data Excel">
                            @php
                                $dataexcel = DB::table('sub_tbl_inventory_log')->where('kd_cabang',$data->kd_cabang)->count();
                            @endphp
                            {{$dataexcel}}
                        </td>
                        <td data-label="Data Master">
                            @php
                                $datainventaris = DB::table('sub_tbl_inventory')->where('kd_cabang',$data->kd_cabang)->count();
                            @endphp
                            {{$datainventaris}}
                        </td>
                        <td>
                            @php
                                $telegram = DB::table('t_no_telegram')->where('kd_cabang',$data->kd_cabang)->first();
                            @endphp
                            @if ($telegram)
                                <span class="badge badge-success">Terdaftar</span>
                            @else
                                <span class="badge badge-danger">Belum Terdaftar</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group float-sm-right">

                                <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                    data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    @if (Auth::user()->akses == 'admin')
                                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                                            class="dropdown-item" id="button-master-data-excel" data-id="{{$data->kd_cabang}}"><i class="fa fa-file-text-o"></i> 1. Data Excle Cabang</a>
                                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                                            class="dropdown-item" id="button-master-data-inventaris" data-id="{{$data->kd_cabang}}"><i class="fa fa-file-text-o"></i> 2. Data Master Barang</a>
                                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                                            class="dropdown-item" id="button-master-data-lokasi" data-id="{{$data->kd_cabang}}"><i class="fa fa-file-text-o"></i> 3. Data Lokasi Cabang</a>
                                    @else
                                    @endif

                                </div>
                            </div>
                        </td>

                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


    <div class="modal fade" id="formdatamaster">
        <div class="modal-dialog modal-dialog-centered modal-full">
          <div class="modal-content border-danger" id="bodyformdatamaster">



          </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();

        });
    </script>
@endsection
