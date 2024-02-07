<div class="table-responsive pb-3">
    <table id="example" class="table styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>No Inventaris</th>
                <th>Nama Barang</th>
                <th>Type</th>
                <th>Merek</th>
                <th>Harga Perolehan</th>

            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->no_inventaris }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>{{ $data->type }}</td>
                    <td>{{ $data->merk }}</td>
                    <td>{{ $data->harga_perolehan }}</td>
                </tr>
            @endforeach

        </tbody>

    </table>
</div>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();
        var table = $('#example').DataTable({
            lengthChange: false,
            //buttons: ['excel']
            // buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
</script>
