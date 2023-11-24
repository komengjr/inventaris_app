<form class="row g-3" method="POST" id="form-updateloginventory" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6 pt-2">
        <label for="inputEmail4" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" value="{{ $data->nama_barang }}">
        <input type="text" class="form-control" name="kd_lokasi" value="{{$data->kd_lokasi}}" hidden>
    </div>
    <div class="col-md-6 pt-2 bg-danger">
        <label for="inputPassword4" class="form-label">Kode Klasifikasi</label>
        <select class="form-control single-select" name="kd_inventaris">
            <option value="{{$data->kd_inventaris}}">{{$data->kd_inventaris}}</option>
            @foreach ($klasifikasi as $klasifikasi)
            <option value="{{$klasifikasi->kd_inventaris}}">{{$klasifikasi->nama_barang}} ( {{$klasifikasi->kd_inventaris}} )</option>
            @endforeach
        </select>
        {{-- <input type="text" class="form-control" name="kd_inventaris" value="{{$data->kd_inventaris}}"> --}}
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
        <input type="text" class="form-control" name="suplier" value="{{ $data->suplier }}" >
    </div>
    <div class="col-md-4 pt-2">
        <label for="inputCity" class="form-label">Harga Perolehan</label>
        <input type="text" class="form-control" name="harga" value="{{ $data->harga_perolehan }}" >
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
