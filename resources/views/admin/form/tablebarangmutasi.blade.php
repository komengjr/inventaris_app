<table class="styled-table" style="padding-top: 120px;" id="kliktambahbrgmutasix">
    <thead>
        <tr>
            <td>Gambar</td>
            <td>Nama Barang</td>
            <td>No Inventaris</td>
            <td>Spesifikasi</td>
            <td>Perolehan</td>
            <td>Lokasi</td>
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
            <td>
                <?php $lok1 = DB::select('select * from tbl_lokasi where kd_lokasi = "'. $databrg->kd_lokasi_awal.'"',[0]) ?>
                Asal Lokasi <br>
                Cabang : {{$databrg->kd_cabang_awal}} <br>
                Ruang : {{$lok1[0]->nama_lokasi}} <br>
                <?php $lok2 = DB::select('select * from tbl_lokasi where kd_lokasi = "'. $databrg->kd_lokasi_tujuan.'"',[0]) ?>
                Target Lokasi : <br>
                Cabang : {{$databrg->kd_cabang_tujuan}} <br>
                Ruang : {{$lok2[0]->nama_lokasi}} 
            </td>
            <td><button class="btn btn-danger btn-sm"  id="hapussubtablemutasi" data-url="{{ route('hapussubtablemutasi',['id'=>$databrg->id,'no'=>$databrg->id_mutasi])}}"><i class="fa fa-trash"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>