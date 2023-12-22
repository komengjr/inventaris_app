<div class="modal-header bg-success">
    <h5 class="modal-title text-white">Data edit barang</h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ url('divisi/masterbarang/editbarang', []) }}" method="post">
    @csrf
    <div class="modal-body" id="divmodalklasifikasi">
        <div class="row">
            <div class="col-12">
                <label for="">nama barang</label>
                <input type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}">
            </div>
            <div class="col-12">
                <label for="">ID</label>
                <input type="text" class="form-control" name="id_inventaris" value="{{$data->id_inventaris}}">
            </div>
            <div class="col-12">
                <label for="">type</label>
                <input type="text" class="form-control" name="type" value="{{$data->type}}">
            </div>
            @php
                $cekdata = DB::table('tbl_lokasi')->where('kd_lokasi',$data->kd_lokasi)->first();
            @endphp
            @if ($cekdata)
                <div class="col-12">
                    <label for="">Lokasi Barang</label>
                    <input type="text" class="form-control" name="type" value="{{$data->kd_lokasi}}" disabled>
                </div>
            @else
                <div class="col-12">
                    <label for="">Lokasi Barang</label>
                    <input type="text" class="form-control" name="type" value="{{$data->kd_lokasi}}" disabled>
                </div>
            @endif
            <div class="col-12">
                <label for="">Merek</label>
                <input type="text" class="form-control" name="merk" value="{{$data->merk}}">
            </div>
            <div class="col-12">
                <label for="">Harga</label>
                <input type="text" class="form-control" name="harga" value="{{$data->harga_perolehan}}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn-dark" ><i class="fa fa-close"></i> Simpan</button>

    </div>
</form>

