@extends('layouts.app')
@section('content')
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
                    @if (auth::user()->akses == 'admin')
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster" class="dropdown-item"
                            id="buttondatacabang" data-url="{{ url('master/datacabang', []) }}"><i
                                class="fa fa-file-text-o"></i> 1. Data Cabang</a>
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster" class="dropdown-item"
                            id="buttondatalokasi" data-url="{{ url('master/datalokasi', []) }}"><i
                                class="fa fa-file-text-o"></i> 2. Data Lokasi</a>
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster" class="dropdown-item"
                            id="buttondataklasifikasi" data-url="{{ url('master/dataklasifikasi', []) }}"><i
                                class="fa fa-file-text-o"></i> 4. Data Klasifikasi</a>
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
    <div class="row pl-3 pt-2 pb-2">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="float-sm-left m-3 m-3">
                        <h4 class="page-title">Data Inventaris <strong style="color: rgb(223, 8, 8)">Cabang :
                                {{ $id }}</strong></h4>
                    </div>
                    <div class="float-sm-right m-3 m-3">
                        <button type="button" class="btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#tambahdatabaru">
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
                                    <th>Nama Barang</th>
                                    <th>No Inventaris</th>
                                    <th>Merek</th>
                                    <th>Harga Perolehan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->no_inventaris }}</td>
                                        <td>{{ $item->merk }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>
                                            @php
                                                $cekdata = DB::table('sub_tbl_inventory')
                                                    ->where('no_inventaris', $item->no_inventaris)
                                                    ->first();
                                            @endphp
                                            @if ($cekdata)
                                                <button data-toggle="modal" data-target="#modelverif" id="postnomor" data-id="{{$item->no_inventaris}}" data-harga="{{$item->harga}}" data-ket="{{$item->ket}}" class="btn-warning">Update</button>
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
    <div class="modal fade" id="modelverif">
        <div class="modal-dialog modal-dialog-centered modal-sm" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatabarangx">
                    <div class="modal-body">
                        <form action="{{ url('master/datainventaris/simpanupdateinventaris', []) }}" method="post">
                            @csrf
                            <input type="text" name="id" id="id">
                            <input type="text" name="harga" id="harga">
                            <input type="text" name="ket" id="ket">
                            <button type="submit" class="btn-warning">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
        $(document).on('click', '#postnomor', function(e) {
        var dataId = $(this).attr("data-id");
        document.getElementById("id").value = dataId;
        var harga = $(this).attr("data-harga");
        document.getElementById("id").value = dataId;
        var ket = $(this).attr("data-ket");
        document.getElementById("ket").value = ket;
    });
    </script>

@endsection
