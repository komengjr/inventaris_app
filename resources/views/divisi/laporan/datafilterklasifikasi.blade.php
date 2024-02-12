<link href="{{ asset('https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css') }}" rel="stylesheet"
    type="text/css">
<div class=" pb-3 pr-3">
    <table id="example" class="display nowrap" style="width:100%">
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
<script src="{{ asset('https://code.jquery.com/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js') }}"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
