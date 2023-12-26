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
            <h4 class="page-title">Data Aktifitas User</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('masteradmin', []) }}">Master Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Aktifitas User</li>
            </ol>
        </div>
        <div class="col-sm-3">

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
                        <th>User</th>
                        <th>Cabang</th>
                        <th>Device</th>
                        <th>Operating System</th>
                        <th>Ip Address</th>
                        <th>Browser</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    @foreach ($data as $data)
                        <tr>
                            <td data-label="No">{{$no++}}</td>
                            <td data-label="Nama User">{{$data->user}}</td>
                            <td data-label="Nama Cabang">{{$data->nama_cabang}}</td>
                            <td data-label="Device">{{$data->device}}</td>
                            <td data-label="os">{{$data->os}}</td>
                            <td data-label="Ip Address">{{$data->ip_addres}}</td>
                            <td data-label="Header">{{$data->browser}}</td>
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
