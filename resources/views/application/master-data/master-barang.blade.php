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
                            <h6 class="text-primary fs--1 mb-0 pt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div>
                        <img class="ms-n4 d-none d-lg-block "
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Barang Cabang</span>
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
                    <h5 class="mb-0">Master Barang Cabang</h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Option</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman"
                                id="button-proses-sinkronisasi-data-cabang" data-code="123"><span
                                    class="fas fa-sync-alt"></span> Sinkronisasi Data Barang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3" id="menu-master-barang-cabang">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>No Inventaris</th>
                        <th>Kode Klasifikasi</th>
                        <th>Kode Lokasi</th>
                        <th>Nomor Ruangan</th>
                        <th>Merek / Type</th>
                        <th>Tanggal Pembelian</th>
                        <th>Harga Perolehan</th>
                        <th>Status Barang</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="fs--2 child"></tbody>
                {{-- <tbody class="fs--2">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->inventaris_data_name }}</td>
                            <td>{{ $datas->inventaris_data_number }}</td>
                            <td>{{ $datas->inventaris_klasifikasi_code }}</td>
                            <td>{{ $datas->id_nomor_ruangan_cbaang }}</td>
                            <td>{{ $datas->inventaris_data_merk }}</td>
                            <td>{{ $datas->inventaris_data_tgl_beli }}</td>
                            <td>{{ $datas->inventaris_data_harga }}</td>
                            <td>{{ $datas->inventaris_data_status }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span></button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-peminjaman" id="button-proses-peminjaman-cabang"
                                            data-code="{{ $datas->inventaris_data_code }}"><span
                                                class="far fa-edit"></span> Perubahan Data Barang</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-peminjaman" id="button-proses-peminjaman-cabang"
                                            data-code="{{ $datas->inventaris_data_code }}"><span
                                                class="fas fa-qrcode"></span> Cetak Barcode</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-master-barang" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-master-barang"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-master-barang-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-master-barang-lg"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script>
        $(document).on("click", "#button-edit-master-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master-barang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_barang_data_edit') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master-barang').html(data);
            }).fail(function() {
                $('#menu-master-barang').html('eror');
            });
        });
        $(document).on("click", "#button-proses-sinkronisasi-data-cabang", function(e) {
            e.preventDefault();
            $('#menu-master-barang-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_barang_sinkronisasi_data_cabang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                setInterval(() => {
                    location.reload();
                }, 3000);
                // $('#menu-master-barang-cabang').html('adsa');
            }).fail(function() {
                $('#menu-master-barang-cabang').html('eror');
            });
        });
        $(document).on("click", "#button-cetak-barcode-master-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-master-barang-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_barang_data_cetak_barcode') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-master-barang-lg').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#menu-master-barang-lg').html('eror');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('master_barang_data') }}",
                columns: [{
                        data: 'id',
                        "width": "4%"
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'no_inventaris',
                        className: 'child'
                    },

                    {
                        data: 'kd_inventaris',
                        className: 'child'
                    },
                    {
                        data: 'kd_lokasi',
                        className: 'child'
                    },
                    {
                        data: 'dataruangan',
                        className: 'child'
                    },
                    {
                        data: 'merk',
                        className: 'child'
                    },
                    {
                        data: 'tglbeli',
                    },
                    {
                        data: 'harga_perolehan',
                        className: 'text-end'
                    },
                    {
                        data: 'status_barang',
                        className: 'text-center'
                    },
                    {
                        data: 'btn',
                        className: 'text-center',
                        "width": "1%"
                    }
                ]

            });
        });
    </script>
@endsection
