<form class="row g-3" method="POST" id="form-updateloginventory" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6 pt-2">
        <label for="inputEmail4" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" value="{{ $data->nama_barang }}">
        <input type="text" class="form-control" name="kd_inventaris" value="{{$data->kd_inventaris}}" hidden>
    </div>

    <div class="col-md-6 pt-2" >
        <label for="inputAddress" class="form-label" style="color: red"><b>Kode Lokasi</b></label>
        <select class="form-control single-select bg-danger" name="kd_lokasi" >
            <option value="{{$data->kd_lokasi}}">{{$data->kd_lokasi}}</option>
            @foreach ($lokasi as $lokasi)
            <option value="{{$lokasi->kd_lokasi}}">{{$lokasi->nama_lokasi}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 pt-2">
        <label for="inputAddress2" class="form-label">Tahun Perolehan</label>
        <input type="text" class="form-control" name="th_perolehan" value="{{ $data->th_perolehan }}">
    </div>
    <div class="col-md-4 pt-2">
        <label for="inputCity" class="form-label">Merek</label>
        <input type="text" class="form-control" name="merk" value="{{ $data->merk }}">
    </div>
    <div class="col-md-4 pt-2">
        <label for="inputCity" class="form-label">Type</label>
        <input type="text" class="form-control" name="type" value="{{ $data->type }}">
    </div>
    <div class="col-md-4 pt-2">
        <label for="inputCity" class="form-label">No Seri</label>
        <input type="text" class="form-control" name="seri" value="{{ $data->no_seri }}">
    </div>
    <div class="col-md-4 pt-2">
        <label for="inputCity" class="form-label">Suplier</label>
        <input type="text" class="form-control" name="suplier" value="{{ $data->suplier }}">
    </div>
    <div class="col-md-4 pt-2">
        <label for="inputCity" class="form-label">Harga Perolehan</label>
        <input type="text" class="form-control" name="harga" value="{{ $data->harga_perolehan }}">
    </div>


    <div class="col-12 pt-3">
        <button type="button" class="btn-primary" style="float: right;" id="buttoneditdataloginventory"
            data-url="{{ route('divisi/masterbarang/postedit', ['id' => $data->id]) }}"><i
                class="fa fa-save"></i> Simpan</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('.single-select').select2();

        $('.multiple-select').select2();



    });
</script>
