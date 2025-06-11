<table id="data-table-pinjam1" class="table table-striped nowrap" style="width:100%">
    <thead class="bg-200 text-700 fs--2">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>No Inventaris</th>
            <th>Merek / Type</th>
            <th>Tanggal Pembelian</th>
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
                    <button class="btn btn-danger btn-sm" id="button-remove-barang-req-peminjaman" data-code="{{$datas->peminjaman_req_code}}" data-no="{{$datas->tiket_req}}"><span class="fas fa-trash-restore-alt"></span></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    new DataTable('#data-table-pinjam1', {
        responsive: true
    });
</script>
<hr>
<div class="col-12">
    <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span> Save</button>
</div>
