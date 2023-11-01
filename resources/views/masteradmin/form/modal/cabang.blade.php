<div class="modal-header bg-success">
    <h5 class="modal-title text-white"></h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ url('master/datacabang/simpandatacabang', []) }}" method="post" >
    @csrf
<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <label for="">Kode Cabang</label>
            <input type="text" class="form-control" name="kd_cabang">
        </div>
        <div class="col-12">
            <label for="">Nama Cabang</label>
            <input type="text" class="form-control" name="nama_cabang">
        </div>
        <div class="col-12">
            <label for="">No Telp</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="col-12">
            <label for="">Kota / Kabupaten</label>
            <input type="text" class="form-control" name="city">
        </div>
        <div class="col-12">
            <label for="">Alamat</label>
            <textarea  class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn-success" ><i class="fa fa-save"></i> Simpan</button>
    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" id="simpanhapusdatauser" data-url="{{ url('master/datauser/proses/hapus', []) }}"><i class="fa fa-trash"></i> Hapus Data</button> --}}
</div>
</form>
