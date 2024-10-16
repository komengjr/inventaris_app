@extends('layouts.app')
@section('content')
    <div class="content-wrapper gradient-forest">
        <div class="container-fluid">
          <div class="card mt-3">
            <div class="row pl-4 pt-3">
                <div class="col-sm-9">
                    <h4 class="page-title">Master Staff</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Staff</li>
                    </ol>
                </div>
            </div>
          </div>


            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-secondary mb-0">{{count($data)}} Staff</h4>
                                    <span class="small-font">Total Staff</span>
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
                        <div class="float-sm-right m-3 m-3">
                            <div class="btn-group m-0" style="float: right;">
                                <button type="button" class="btn-info waves-effect waves-light"> <i
                                        class="fa fa-cog"></i> <span>Menu Option</span> </button>
                                <button type="button"
                                    class="btn-info split-btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(102px, 37px, 0px);">
                                    <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" data-target="#modaldatastaff" id="buttontambahstaff"><i class="fa fa-plus mr-1"></i> Tambah Staff Baru</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" data-target="#modaldatastaff" id="button-upload-excel-staff"><i class="fa fa-upload mr-1"></i> Upload Excel Staff</a>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive pb-5">
                            <table class="table styled-table align-items-center table-flush pb-2" id="default-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Staff</th>
                                        <th>No Induk Pegawai</th>
                                        <th>Class</th>
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
                                            <td>{{$item->class}}</td>
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
    {{-- <script src="{{ url('assets/js/app-script.js', []) }}"></script> --}}

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

            $('#default-datatable').DataTable();

        });
    </script>
@endsection
