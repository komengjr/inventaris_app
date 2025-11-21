<table id="upload_excel" class="table table-striped" style="width:100%">
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
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
            <td>
                @php
                $lokasi = DB::table('tbl_nomor_ruangan_cabang')
                ->join('master_lokasi','master_lokasi.master_lokasi_code','=','tbl_nomor_ruangan_cabang.kd_lokasi')
                ->where('tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang',$datas->id_nomor_ruangan_cbaang)->first();
                @endphp
                @if ($lokasi)
                {{ $lokasi->master_lokasi_name }}
                @else
                <small class="text-danger">Tidak ditemukan</small>
                @endif
            </td>
            <td>{{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}</td>
            <td>{{ $datas->inventaris_data_tgl_beli }}</td>
            <td>@currency($datas->inventaris_data_harga)</td>
            <td class="text-center">
                <a href="#" class="me-2" id="button-edit-data-log" data-code="{{ $datas->inventaris_data_code }}"><span class="far fa-edit text-warning"></span></a>
                <a href="#" id="button-hapus-data-log" data-code="{{ $datas->inventaris_data_code }}"><span class="far fa-trash-alt text-danger"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    new DataTable('#upload_excel', {
        responsive: true
    });
</script>
