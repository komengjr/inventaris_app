<table class="styled-table" style="padding-top: 120px;" >
    <thead>
        <tr>
            <td>Gambar</td>
            <td>Nama Barang</td>
            <td>No Inventaris</td>
            <td>Spesifikasi</td>
            <td>Perolehan</td>
            <td>Action</td>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($databrg as $databrg)
        <tr>
            <td>
                @if ($databrg->gambar == "")
                <img src="{{ url('1.png', []) }}" alt="" width="50">
                @else
                <img src="{{ url('/'.$databrg->gambar, []) }}" alt="" width="50">
                @endif
              
            </td>
            <td>{{$databrg->nama_barang}}</td>
            <td>{{$databrg->kd_inventaris}}</td>
            <td>
                Merek : {{$databrg->merk}} <br>
                Type : {{$databrg->type}} <br>
                Nomor Seri : {{$databrg->no_seri}} <br>
                Tahun : {{$databrg->th_pembuatan}}
            </td>
            <td>
                Harga : {{$databrg->harga_perolehan}} <br>
                Tahun : {{$databrg->th_perolehan}} 
               
            </td>
            <td><button class="btn btn-danger btn-sm" id="hapussubtablemusnah" data-url="{{ route('hapussubtablemusnah',['id'=>$databrg->id,'no'=>$databrg->id_musnah])}}"><i class="fa fa-trash"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>