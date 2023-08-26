@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pl-2 pt-2 pb-2">
                <div class="col-sm-9">
                    {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Staff</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-primary mb-0">0 Item</h4>
                                    <span class="small-font">Avg Loading Time</span>
                                </div>
                                <div class="w-circle-icon rounded bg-primary">
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
                                    <h4 class="text-secondary mb-0">15 Item</h4>
                                    <span class="small-font">Avg Loading Weight</span>
                                </div>
                                <div class="w-circle-icon rounded bg-secondary">
                                    <i class="fa fa-tasks text-white"></i>
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
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            Recent History
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaldatastaff" id="buttontambahstaff">Tambah Staff</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pb-5">
                            <table class="table styled-table align-items-center table-flush pb-2" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Staff</th>
                                        <th>No Induk Pegawai</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama_staff}}</td>
                                            <td>{{$item->nip}}</td>
                                            <td class="text-center">
                                                @if ($item->status_staff == 1)
                                                <span class="badge badge-success p-2">Aktif</span>
                                                @else
                                                <span class="badge badge-danger p-2">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td class="text-center"><button class="btn-warning"><i class="fa fa-pencil"></i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container-fluid-->

    </div>
    <script src="{{ url('assets/js/app-script.js', []) }}"></script>

    <div class="modal fade" id="modaldatastaff">
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatastaff">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/jszip.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/pdfmake.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/vfs_fonts.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/buttons.html5.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/buttons.print.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js', []) }}"></script>
    <script>
        $(document).ready(function() {
         //Default data table
          $('#default-datatablexx').DataTable();


          var table = $('#examplexx').DataTable( {
           lengthChange: false,
           buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
         } );

        table.buttons().container()
           .appendTo( '#example_wrapper .col-md-6:eq(0)' );

         } );

       </script>
@endsection
