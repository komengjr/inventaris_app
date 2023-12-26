<div class="card">
    <div class="card-body shadow-light">
        <form id="signupForm" action="{{ url('masteradmin/post-data-inventaris/', []) }}" method="post" novalidate="novalidate">
            @csrf
            <h4 class="form-header text-uppercase">
                <i class="fa fa-address-book-o"></i>
                Detail Barang
            </h4>
            <div class="form-group row">
                <label for="input-10" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-10" name="nama_barang" value="{{$data->nama_barang}}">
                    <input type="text" class="form-control" id="input-10" name="id" value="{{$data->id}}" hidden>
                </div>
                <label for="input-11" class="col-sm-2 col-form-label">No Inventaris</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-11" name="no_inventaris" value="{{$data->no_inventaris}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Kode Lokasi</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-12" name="kd_lokasi" value="{{$data->kd_lokasi}}">
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Kode Jenis</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-13" name="kd_jenis" value="{{$data->kd_jenis}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Tahun Perolehan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-12" name="th_perolehan" value="{{$data->th_perolehan}}">
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Merek</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-13" name="merk" value="{{$data->merk}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-12" name="type" value="{{$data->type}}">
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Nomor Serial</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-13" name="no_seri" value="{{$data->no_seri}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Suplier</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-12" name="suplier" value="{{$data->suplier}}">
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Harga Perolehan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-13" name="harga_perolehan" value="{{$data->harga_perolehan}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Tanggal Beli</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-12" name="tgl_beli" value="{{$data->tgl_beli}}">
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Kondisi Barang</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-13" name="status_barang" value="{{$data->status_barang}}">
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-times"></i> CANCEL
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check-square-o"></i> SAVE
                </button>
            </div>
        </form>
    </div>

</div>
