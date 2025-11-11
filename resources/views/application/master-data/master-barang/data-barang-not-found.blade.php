<table id="example" class="table table-striped" style="width:100%">
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
    <tbody class="fs--2 child">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $datas)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $datas->inventaris_data_name }}</td>
                <td>{{ $datas->inventaris_data_number }}</td>
                <td>{{ $datas->inventaris_klasifikasi_code }}</td>
                <td>{{ $datas->inventaris_data_location }}</td>
                <td>{{ $datas->id_nomor_ruangan_cbaang }}<span class="badge bg-danger" style="font-size: 9px;">Tidak di
                        temukan</span></td>
                <td>
                    {{ $datas->inventaris_data_merk }}<br>
                    {{ $datas->inventaris_data_type }}<br>
                    {{ $datas->inventaris_data_no_seri }}
                </td>
                <td>{{ $datas->inventaris_data_tgl_beli }}</td>
                <td>{{ $datas->inventaris_data_harga }}</td>
                <td>{{ $datas->inventaris_data_status }}</td>
                <td>
                    <button class='btn btn-falcon-warning btn-sm' data-bs-toggle='modal'
                        data-bs-target='#modal-master-barang' id='button-edit-not-found'
                        data-code='{{ $datas->inventaris_data_code }}'><span class='far fa-edit'></span> </button>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
<script>
    new DataTable('#example', {
        responsive: true
    });
</script>
