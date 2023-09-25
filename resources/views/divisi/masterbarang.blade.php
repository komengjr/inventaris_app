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

        .modal .modal-content {
            /* height: 100%; */
            border: 0;
            border-radius: 0;
        }

        .modal .modal-body {
            overflow-y: auto;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pl-2 pt-2 pb-2">
                <div class="col-sm-9">
                    {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Inventaris</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="text-primary mb-0">{{ $inventory_log }} Item</h4>
                                    <span class="small-font">Upload Excel</span>
                                </div>
                                <div class="w-circle-icon rounded bg-primary" style="cursor: pointer;" data-toggle="modal"
                                    data-target="#menusmasterbarang">
                                    <i class="fa fa-upload text-white"></i>
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
                                    <h4 class="text-secondary mb-0">{{ $inventory }} Saved</h4>
                                    <span class="small-font">Avg Loading Weight</span>
                                </div>
                                <div class="w-circle-icon rounded bg-secondary" style="cursor: pointer" data-toggle="modal"
                                    data-target="#menusmasterbarang1" id="showbarangmasterloginventory">
                                    <i class="fa fa-save text-white"></i>
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
                                        {{-- <a class="dropdown-item" href="{{ url('divisi/masterbarang/token', []) }}">Create Nomor</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pb-5" style="font-size: 10px;">
                            <table class="table styled-table align-items-center table-flush pb-2" id="example">
                                <thead style="font-size: 10px;">
                                    <tr style="font-size: 10px;">
                                        <td>No</td>
                                        <td>Nama Barang</td>
                                        <td>No Inventaris</td>
                                        <td>Kode Klasifikasi</td>
                                        <td>Ruangan</td>
                                        <td>Merek / Type</td>
                                        <td>Tanggal Pembelian</td>
                                        <td>Tahun Perolehan</th>
                                        <td>Harga</td>
                                        <td>action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->no_inventaris }}</td>
                                            <td>{{ $item->kd_inventaris }}</td>
                                            <td>{{ $item->kd_lokasi }} : {{ $item->nama_lokasi }}</td>
                                            <td>{{ $item->merk }} / {{ $item->type }}</td>
                                            <td>{{ $item->tgl_beli }}</td>
                                            <td>{{ $item->th_perolehan }}</td>
                                            <td>@currency($item->harga_perolehan)</td>
                                            <td><button class="btn-dark" data-toggle="modal" data-target="#editmasterbarang"
                                                    id="editbarangmaster"
                                                    data-url="{{ url('divisi/masterbarang/showedit', ['id' => $item->id_inventaris]) }}"><i
                                                        class="fa fa-pencil"></i> edit</button></td>
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
    <script src="{{ url('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js', []) }}"></script>
    {{-- <script src="{{ url('assets/plugins/Chart.js/Chart.min.js', []) }}"></script> --}}
    {{-- <script src="{{ url('assets/js/dashboard-logistics.js', []) }}"></script> --}}

    <div class="modal fade" id="editmasterbarang">
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatasdm">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="menusmasterbarang1">
        <div class="modal-dialog modal-dialog-centered modal-full" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatmasterbarang">
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="menusmasterbarang">
        <div class="modal-dialog modal-dialog-centered modal-sm" style="width: 100%;">
            <div class="modal-content">
                <div id="showdatasdm">
                    <div class="modal-body">
                        <form action="{{ url('admin/datainventaris/uploaddatabaranginventaris', []) }}"
                            class="row row-cols-lg-auto g-3 align-items-center" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Format : xlx ,
                                    xlxs</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fa fa-upload"></i></div>
                                    <input type="file" name="file" id="file" class="form-control"
                                        id="inlineFormInputGroupUsername" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">

                                </div>
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                            </div>
                        </form>
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


            var table = $('#examplexx').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
