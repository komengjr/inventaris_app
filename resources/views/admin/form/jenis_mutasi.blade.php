<div class="row">
    @if ($id == 0)
        
    @elseif($id == 1)
    <input type="text" class="form-control" value="-"  id="asal_lokasi" name="asal_lokasi" hidden>      
    <input type="text" class="form-control" value="-"  id="target_lokasi" name="target_lokasi" hidden>
    @elseif($id == 2)
    <input type="text" class="form-control" value="-"  id="asal_lokasi" name="asal_lokasi" hidden>      
    <input type="text" class="form-control" value="-"  id="target_lokasi" name="target_lokasi" hidden>
    @elseif($id == 3)
    <input type="text" class="form-control" value="-"  id="asal_lokasi" name="asal_lokasi" hidden>      
    <input type="text" class="form-control" value="-"  id="target_lokasi" name="target_lokasi" hidden>
    @elseif($id == 4)

    <div class="col-6">
        <label for="">Asal Cabang</label>
        <?php
        $lokasigue = DB::table('tbl_cabang')
        ->select('tbl_cabang.*')
        ->where('kd_cabang',auth::user()->cabang) 
        ->get();
        ?>
        <input type="text" class="form-control" value="{{$lokasigue[0]->nama_cabang}}" name="asal_lokasi" id="asal_lokasi">
    </div>
    <div class="col-6">
        <label for="">Target Cabang</label>
        <select class="form-control single-lokasi" name="target_lokasi" id="target_lokasi">
            <option value="">Pilih Lokasi</option>
            <?php
            $lokasi = DB::table('tbl_cabang')
            ->select('tbl_cabang.*')
            ->get();
            ?>
            @foreach ($lokasi as $lokasi)
                @if ($lokasi->kd_cabang == auth::user()->cabang)
                    
                @else
                    <option value="{{$lokasi->kd_cabang}}">{{$lokasi->nama_cabang}}</option>
                @endif
                    
            @endforeach
            
        </select>
    </div> 

    @endif
   
</div>
<script>
    $(document).ready(function() {
        $('.single-lokasi').select2();

    });
</script>