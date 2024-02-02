<div class="table-responsive pb-5">
    <table class="table styled-table align-items-center table-flush pb-2" id="default-datatable-unverified">
        <thead>
            <tr>
                <th>No</th>
                <th>No Inventaris</th>
                <th>Nama Barang</th>
                <th>Merek / Type</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->no_inventaris}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->merk}} / {{$item->type}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#default-datatable-unverified').DataTable();
    });
</script>
