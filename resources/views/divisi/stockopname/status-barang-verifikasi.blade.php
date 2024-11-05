<div class="ml-3 pb-2"><h3><span class="badge badge-danger">Data Not Verified</span></h3></div>
<div class="table-responsive pb-5">
    <table class="table styled-table align-items-center table-flush pb-2" id="default-datatable-kondisi-v">
        <thead>
            <tr>
                <th>No</th>
                <th>No Inventaris</th>
                <th>Nama Barang</th>
                <th>Merek / Type</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($databarang as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->no_inventaris }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->merk }} / {{ $item->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {

        $('#default-datatable-kondisi-v').DataTable();

    });
</script>
