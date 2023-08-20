<table class="styled-table m-0" id="data-table98" >
    <thead>
        <tr>
            <td>No Inventaris</td>
            <td>Nama Barang</td>
            <td>Merek</td>
            <td>Type</td>
            <td>Lokasi</td>
            <td>Pilih</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        @php
            $cekdata = DB::table('tbl_sub_mutasi')
            ->where('id_inventaris',$item->id_inventaris)
            ->where('kd_mutasi',$ids)->first();
        @endphp
            @if ($cekdata)

            @else
                <tr>
                    <td>{{$item->no_inventaris}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->merk}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->kd_lokasi}}</td>
                    <td class="text-center"><button class="btn-success" id="buttoninsertdatamutasi" data-url="{{ url('divisi/datamutasi/inserttable', ['ids'=>$ids,'id'=>$item->id_inventaris,'datax'=>$datax]) }}"><i class="fa fa-dot-circle-o"></i></button></td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<script>
     $('#data-table98').DataTable();
</script>
