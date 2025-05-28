<table id="data-table-pemusnahan" class="table table-striped nowrap" style="width:100%">
    <thead class="bg-200 text-700 fs--2">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>No Inventaris</th>
            <th>Merek</th>
            <th>Type</th>
            <th>Tanggal Pembelian</th>
            <th>Harga Perolehan</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="fs--1">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $datas)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$datas->inventaris_data_name}}</td>
                <td>{{$datas->inventaris_data_number}}</td>
                <td>{{$datas->inventaris_data_merk}}</td>
                <td>{{$datas->inventaris_data_type}}</td>
                <td>{{$datas->inventaris_data_tgl_beli}}</td>
                <td>@currency($datas->inventaris_data_harga)</td>
                <td>
                    <button class="btn btn-falcon-warning" id="button-pilih-data-barang-pemusnahan" data-code="{{$datas->inventaris_data_code}}">Pilih Barang</button>
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
