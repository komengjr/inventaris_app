<div class="row">
    <div class="col-md-4">
        <label for="">Lokasi barang</label>
        <select class="form-control single-selectq" name="kd_inventaris" id="greet" onchange="getOption()">
            <option>Pilih Lokasi</option>
            @foreach ($data_lokasi as $data_lokasi)
                <option  value="{{ url('selectlokasi', ['id'=>$data_lokasi->kd_lokasi ,'kd'=>$id]) }}">- {{$data_lokasi->nama_lokasi}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-8" id="selectlokasixx">
        
    </div>
    
    
</div>
<script>
    $(document).ready(function() {
        $('.single-select').select2();
        $('.single-selectq').select2();

    });
</script>
