@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Case Report</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javaScript:void();">Menu</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javaScript:void();">Case</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Report
                        </li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card gradient-meridian">
                        <div class="card-body">
                            <div class="row">
                                <!-- Left sidebar -->
                                <div class="col-lg-3 col-md-4">
                                    <a href="mail-compose.html" class="btn btn-danger btn-block"
                                        id="button-tambah-data-case-baru">New Case</a>
                                    <div class="card mt-3 shadow">
                                        <div class="list-group shadow-none">
                                            <a href="javascript:void();" class="list-group-item"><i
                                                    class="fa fa-inbox mr-2"></i>Data Case
                                                <b></b></a>
                                            <a href="javascript:void();" class="list-group-item"><i
                                                    class="fa fa-star-o mr-2"></i>Case Proses</a>
                                            <a href="javascript:void();" class="list-group-item"><i
                                                    class="fa fa-file-text-o mr-2"></i>Case Selesai
                                                <b></b></a>

                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow">
                                        <div class="list-group shadow-none">
                                            <a href="javascript:void();" class="list-group-item"
                                                id="button-case-data-lokasi"><i class="fa fa-map-marker mr-2"></i>Data
                                                Lokasi</a>
                                            <a href="javascript:void();" class="list-group-item"
                                                id="button-case-data-klasifikasi"><i class="fa fa-sitemap mr-2"></i>Data
                                                Klasifikasi</a>


                                        </div>
                                    </div>
                                </div>
                                <!-- End Left sidebar -->

                                <!-- Right Sidebar -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            {{-- <div class="btn-toolbar" role="toolbar">
                                                <div class="btn-group mr-1">
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light">
                                                        <i class="fa fa-inbox"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light">
                                                        <i class="fa fa-refresh"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>
                                                <div class="btn-group mr-1">
                                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-folder"></i>
                                                        <b class="caret"></b>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Another
                                                            action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Something else
                                                            here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javaScript:void();" class="dropdown-item">Separated
                                                            link</a>
                                                    </div>
                                                </div>
                                                <div class="btn-group mr-1">
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-tag"></i>
                                                        <b class="caret"></b>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Another
                                                            action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Something else
                                                            here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javaScript:void();" class="dropdown-item">Separated
                                                            link</a>
                                                    </div>
                                                </div>

                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        More
                                                        <span class="caret"></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Another
                                                            action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Something else
                                                            here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javaScript:void();" class="dropdown-item">Separated
                                                            link</a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="col-lg-4">
                                            {{-- <div class="position-relative has-icon-right">
                                                <input type="text" class="form-control" placeholder="search mail" />
                                                <div class="form-control-position">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- End row -->

                                    <div class="card mt-1 shadow">
                                        <div class="card-body" id="menu-data-case">
                                            <div class="table-responsive">
                                                <table class="table styled-table" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul</th>
                                                            <th>Keterangan</th>
                                                            <th>Report</th>
                                                            <th>Waktu</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                {{-- <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox17" type="checkbox" />
                                                                    <label for="checkbox17"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td> --}}
                                                                <td>
                                                                    1
                                                                </td>
                                                                <td>
                                                                    <a href="#">{{ $item->judul_case }}</a>
                                                                </td>
                                                                <td>
                                                                    <a href="#">{{ $item->keterangan_case }}</a>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button class="btn-dark" data-toggle="modal" data-target="#modal-case" id="button-detail-data-case" data-id="{{$item->tiket_case}}"><i
                                                                            class="fa fa-paperclip"></i></button>
                                                                </td>
                                                                <td class="text-right">{{ $item->created_at }}</td>
                                                                <td>
                                                                    @if ($item->status_case == 1)
                                                                        <span class="badge badge-success m-1">Selesai</span>
                                                                    @else
                                                                        <span class="badge badge-danger m-1">Belum
                                                                            Selesai</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                            {{-- <hr /> --}}


                                        </div>
                                        <!-- card body -->
                                    </div>
                                    <!-- card -->
                                </div>
                                <!-- end Col-9 -->
                            </div>
                            <!-- End row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->
    </div>
    <div class="modal fade" id="modal-case" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content animated flipInX">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Case</h5>
                    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body gradient-royal" id="data-modal-case">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, dicta. Voluptate cumque odit quam
                        velit maiores sint rerum, dolore impedit commodi. Tempora eveniet odit vero rem blanditiis, tenetur
                        laudantium cumque.</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close</button>
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
    </script>
@endsection
