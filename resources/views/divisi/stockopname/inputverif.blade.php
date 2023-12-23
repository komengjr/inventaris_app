<div class="card-body">
    @if ($data)
        <div class="row">
            <div class="col-md-3">
                <label for="">Nama Barang</label>
                <input type="text" class="form-control" value="{{ $data->nama_barang }}">
            </div>
            <div class="col-md-3">
                <label for="">Nomor Inventaris</label>
                <input type="text" class="form-control" value="{{ $data->no_inventaris }}">
            </div>
        </div>
        <!--End Row-->

        <hr>
        <div class="demo-heading">Pilih Kondisi</div>
        <div class="row">
            <div class="col-md-4">
                <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="inline-radio-primary" name="inlineradio" checked="">
                    <label for="inline-radio-primary">Baik</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icheck-material-info icheck-inline">
                    <input type="radio" id="inline-radio-info" name="inlineradio">
                    <label for="inline-radio-info">Maintenance</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icheck-material-success icheck-inline">
                    <input type="radio" id="inline-radio-success" name="inlineradio">
                    <label for="inline-radio-success">Rusak</label>
                </div>
            </div>
        </div>
        <div class="demo-heading">Keterangan</div>
        <div class="row">
            <div class="col-md-12">
                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>

        </div>
        <div class="row pt-2">
            <div class="col-md-12">
                <button class="btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    @else
    <span class="badge badge-warning shadow-warning m-1">Barang Tidak DItemukan</span>
    @endif

</div>
