<form action="" id="formbarangmutasi" method="post">
<div class="row">
    
        <div class="col-md-7" id="selectlokasixx">
            
                @csrf
            <label for="">Nomor Inventaris</label>
                    <select class="form-control single-select" name="kd_inventaris">
                                <option>Nama barang -- Type barang</option>
                                @foreach ($data_brg as $item)
                                    <option value="{{$item->id}}">
                                                -{{$item->nama_barang}} -- {{$item->type}}
                                    </option>
                                @endforeach
                    </select>
                
        </div>
        <div class="col-md-5" id="selectlokasixx">
            
            <label for="">Lokasi Tujuan</label>
                    <select class="form-control single-select" name="kd_lokasi">
                                <option>Cari Lokasi Tujuan</option>
                                @foreach ($lokasi as $lokasi)
                                    <option value="{{$lokasi->kd_lokasi}}">
                                                -{{$lokasi->nama_lokasi}} -- 
                                    </option>
                                @endforeach
                    </select>
                
        </div>
   
    
</div>
</form>
<div class="row pt-4" style="float: right;">
    <div class="col-12">
        <button class="btn btn-success btn-sm" id="kliktambahbrgmutasi" data-url="{{ route('kliktambahbrgmutasi',['id'=>$id])}}"><i class="fa fa-save"> Simpan</i></button>
        <button class="btn btn-danger btn-sm"><i class="fa fa-back"> Batal</i></button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.single-select').select2();

    });
</script>