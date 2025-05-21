@extends('layouts.template')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="{{ asset('img/icon/icon.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Mutasi <span class="text-info fw-medium">Cabang</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-primary fw-bold">Data Mutasi</h5>
                </div>
                <div class="col-auto">

                    <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                        data-bs-target="#modal-category" id="button-add-category">
                        <span class="far fa-file-alt fs--2 me-1"></span>Tambah Mutasi</a>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Tiket Order</th>
                        <th>Jenis Mutasi</th>
                        <th>Penanggung Jawab</th>
                        <th>Menyetujui</th>
                        <th>Yang Menyerahkan</th>
                        <th>Penerima</th>
                        <th>Tanggal Terima</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="fs--2">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>{{ $item->kd_mutasi }}</td>
                            <td>
                                @if ($item->jenis_mutasi == 1)
                                    Mutasi Antar Cabang
                                @endif
                            </td>
                            <td>
                                {{ $item->penanggung_jawab }}
                            </td>
                            <td>
                                {{ $item->menyetujui }}
                            </td>
                            <td>
                                {{ $item->yang_menyerahkan }}
                            </td>
                            <td>
                                {{ $item->penerima }}
                            </td>
                            <td>
                                {{ $item->tgl_terima }}
                            </td>
                            <td>
                                @if ($item->status_mutasi == 0)
                                    <button class="btn btn-falcon-warning btn-sm" data-toggle="modal" data-target="#modalmutasi"
                                        id="buttondetailmutasibarang" data-id="{{ $item->kd_mutasi }}"><i
                                            class="fa fa-pencil"></i>
                                        Lengkapi Data</button>
                                @else
                                    <button class="btn btn-falcon-info btn-sm" id="button-report-mutasi-cabang" data-toggle="modal"
                                        data-target="#modal-report-mutasi" data-id="{{ $item->kd_mutasi }}"><i
                                            class="fa fa-print"></i>
                                        Cetak / Print</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-stock" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-stock"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-stock-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-stock-lg"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-stock-sm" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-stock-sm"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-kondisi-data-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var status = $(this).data("status");
            $('#menu-stock-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_stock_opname_kondisi_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "status": status,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stock-lg').html(data);
            }).fail(function() {
                $('#menu-stock-lg').html('eror');
            });
        });
    </script>
@endsection
