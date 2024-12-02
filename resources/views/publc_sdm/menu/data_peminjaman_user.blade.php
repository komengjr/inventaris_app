
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>No Tiket</th>
            <th>Kategori</th>
            <th>Deskripsi Peminjaman</th>
            <th>Tanggal Buat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $data)
            <tr>
                <td>1</td>
                <td>{{ $data->tiket_peminjaman_user }}</td>
                <td>{{ $data->kategori_req }}</td>
                <td>{{ $data->deskripsi_req }}</td>
                <td>{{ $data->tgl_req }}</td>
                <td><button class="btn btn-warning btn-sm   "><i class="fa fa-info"></i> Edit</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>

    new DataTable('#example', {
        responsive: true
    });
</script>
