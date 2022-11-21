<form action="" method="post" id="formtambahlokasi">
    @csrf
    <div class="row">
        <div class="col-12">
            <label for="">Kode Lokasi</label>
            <input type="text" class="form-control" name="kd_lokasi">
        </div>
        <div class="col-12">
            <label for="">Nama Lokasi</label>
            <input type="text" class="form-control" name="nama_lokasi">
        </div>
    </div>
</form>
<div class="float-sm-right pt-3">
    <button class="btn-success" id="simpanbarudatalokasi" data-url="{{ url('master/datacabang/lokasi/tambah', []) }}"><i class="fa fa-save"></i> Simpan</button>
</div>