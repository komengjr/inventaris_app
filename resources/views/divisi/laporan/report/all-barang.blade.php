
        <table
            style="font-size: 8px; margin: 0px; padding: 2px; width: 710px; font-size: 11px; font-family: Calibri (Body);">
            <thead style="font-weight: bold;">
                <tr>
                    <td style="width: 4%;">No</td>
                    <td>Nomor Inventaris</td>
                    <td>Nama Barang</td>
                    <td>Merek</td>
                    <td>Type</td>
                    <td style="width: 15%;">Harga Perolehan</td>
                    <td>Status Barang</td>
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
                        <td>{{ $data->merk }}</td>
                        <td>{{ $data->type }}</td>
                        <td style="text-align: right;">@currency($data->harga_perolehan)</td>
                        <td>Baik</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
