<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1 text-danger" id="staticBackdropLabel">Data Unvalid Stock Opname </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">
        <div id="table-data-peminjaman">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>ID Inventaris</th>
                        <th>Nomor Inventaris</th>
                        <th>Type Barang</th>
                        <th>Tanggal Beli</th>
                        <th>Harga Beli</th>

                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                        @php
                            $check = DB::table('tbl_sub_verifdatainventaris')
                                ->where('kode_verif', $code)
                                ->where('id_inventaris', $datas->inventaris_data_code)
                                ->first();
                        @endphp
                        @if (!$check)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datas->inventaris_data_name }}</td>
                                <td>{{ $datas->inventaris_data_code }}</td>
                                <td>{{ $datas->inventaris_data_number }}</td>
                                <td>{{ $datas->inventaris_data_merk }} <br>{{ $datas->inventaris_data_type }}</td>
                                <td>{{ $datas->inventaris_data_tgl_beli }}</td>
                                <td>@currency($datas->inventaris_data_harga)</td>
                            </tr>
                        @endif
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
