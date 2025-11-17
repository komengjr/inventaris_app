<div class="modal-body p-0">
    <div class="bg-300 rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="menu-data-barang-lokasi">
        <div class="card mb-3 border border-primary ">
            <div class="card-body py-2">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center">
                        <img class="ms-1 mx-3" src="{{ asset('img/brg.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Data Barang</h6>
                            <h4 class="text-primary fw-bold mb-1">{{ $lokasi->master_lokasi_name }} <span
                                    class="text-info fw-medium">No.{{ $lokasi->nomor_ruangan }} </span></h4>
                        </div>
                        {{-- <img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt=""
                            width="150" /> --}}
                    </div>
                    <div class="col-xl-auto px-3 py-0">
                        <div class="row gx-2 align-items-center">
                            <div class="col-auto">
                                <form class="row gx-2 float-end" action="#">
                                    <div class="col-auto"><small class="text-primary">Print by: </small></div>
                                    <div class="col-auto">
                                        <select class="form-select form-select-sm text-primary" name="page"
                                            id="page" aria-label="Bulk actions">
                                            <option value="-">Pilih Option Prints</option>
                                            @php
                                                $cetak = $data->count();
                                            @endphp
                                            @for ($i = 1; $i < 10; $i++)
                                                @if ($cetak < 0)
                                                @else
                                                    <option value="{{ $i }}">Page {{ $i }}
                                                    </option>
                                                @endif
                                                @php
                                                    $cetak = $cetak - 50;
                                                @endphp
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-falcon-primary btn-sm float-end"
                                            id="button-print-barcode-page" data-id="{{ $id }}"><span
                                                class="fas fa-qrcode"></span> Print barcode</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-data-lokasi-barang">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%" border="1">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>ID Inventaris</th>
                        <th>Nomor Inventaris</th>
                        <th>Tanggal Pembelian</th>
                        <th>Merek / Type</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px;">
                    @foreach ($data as $datas)
                        <tr>
                            <td>
                                @if ($datas->inventaris_data_file == '')
                                    <div class="avatar avatar-3xl">
                                        <img class="rounded-soft" src="{{ asset('no_pict.png') }}" alt="" />
                                    </div>
                                @else
                                    <div class="avatar avatar-3xl">
                                        <img class="rounded-soft" src="{{ asset($datas->inventaris_data_file) }}"
                                            alt="" />
                                    </div>
                                    {{-- <img src="{{ asset($datas->inventaris_data_file) }}" alt=""
                                        width="80" /> --}}
                                @endif
                            </td>
                            <td>{{ $datas->inventaris_data_name }}</td>
                            <td>{{ $datas->inventaris_data_code }}</td>
                            <td>{{ $datas->inventaris_data_number }}</td>
                            <td>{{ date('d-m-Y', strtotime($datas->inventaris_data_tgl_beli)) }}</td>

                            <td>
                                {{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}
                            </td>

                            <td>@currency($datas->inventaris_data_harga)</td>
                            <td class="text-center">

                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                        <button class="dropdown-item" id="button-update-data-barang-lokasi"
                                            data-code="{{ $datas->inventaris_data_code }}">
                                            <span class="far fa-address-card"></span> Detail & Edit
                                        </button>
                                        <button class="dropdown-item"
                                            onclick="window.open('{{ route('dashboard_data_lokasi_detail_barcode', ['id' => $datas->inventaris_data_code]) }}', 'formpopup', 'width=400,height=400,resizeable,scrollbars'); this.target = 'formpopup';">
                                            <span class="fas fa-qrcode"></span> Print Barcode
                                        </button>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
<script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
