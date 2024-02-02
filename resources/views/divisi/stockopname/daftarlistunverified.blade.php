<div class="table-responsive pb-5">
    <table class="table styled-table align-items-center table-flush pb-2" id="default-datatable-unverified">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Inventaris</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Type</th>
                <th>Kode Lokasi</th>
                <th>Nomor Ruangan</th>
                {{-- <th>Serial</th> --}}
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->id_inventaris}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->merk}} </td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->kd_lokasi}}</td>
                    <td>{{$item->id_nomor_ruangan_cbaang}}</td>
                    {{-- <td>{{$item->no_seri}}</td> --}}
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
