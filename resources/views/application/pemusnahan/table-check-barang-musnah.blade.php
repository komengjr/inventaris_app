<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Check Pemusnahan Barang Inventaris</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <table id="data-table-data" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700 fs--2">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>No Inventaris</th>
                    <th>Merek / Type</th>
                    <th>Tanggal Pembelian</th>
                    <th>No Pemusnahan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="fs--1">
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->inventaris_data_name }}</td>
                        <td>{{ $datas->inventaris_data_number }}</td>
                        <td>{{ $datas->inventaris_data_merk }}</td>
                        <td>{{ $datas->inventaris_data_tgl_beli }}</td>
                        <td>
                            @php
                                $no_pemusnahan = DB::table('tbl_pemusnahan')->where('id_inventaris',$datas->inventaris_data_code)->first();
                            @endphp
                            @if ($no_pemusnahan)
                                {{$no_pemusnahan->kd_pemusnahan}}
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-falcon-primary" id="btnGroupVerticalDrop2" type="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                    <button class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#modal-pemusnahan" id="button-add-data-pemusnahan"><span
                                            class="fas fa-swatchbook"></span>
                                        Sinkronisasi Data</button>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                        data-bs-target="#modal-pemusnahan-xl"
                                        id="button-check-data-barang-musnah-cabang"><span class="fas fa-receipt"></span>
                                        Pengecekan Data Pemusnahan</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            new DataTable('#data-table-data', {
                responsive: true,
                search: false,
            });
        </script>

    </div>
    <div class="p-3" id="menu-data-table-pemusnahan"></div>
</div>
