<table id="data-table-pemusnahan" class="table table-striped nowrap" style="width:100%">
    <thead class="bg-200 text-700 fs--2">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>No Inventaris</th>
            <th>Merek / Type </th>
            <th>Tanggal Pembelian / Harga</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody class="fs--1">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $datas)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $datas->inventaris_data_name }} <br>

                </td>
                <td>{{ $datas->inventaris_data_number }} <br>
                    <strong class="text-primary">{{ $datas->nama_cabang }}</strong>
                </td>
                <td>{{ $datas->inventaris_data_merk }} <br>{{ $datas->inventaris_data_type }}</td>
                <td>{{ $datas->inventaris_data_tgl_beli }} <br>@currency($datas->inventaris_data_harga) </td>
                <td>
                    <button class="btn btn-falcon-warning btn-sm" id="button-pilih-data-barang-peminjaman"
                        data-code="{{ $datas->inventaris_data_code }}" data-no="{{$code}}"><span class="fas fa-check-square"></span>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    new DataTable('#data-table-pemusnahan', {
        responsive: true
    });
</script>
