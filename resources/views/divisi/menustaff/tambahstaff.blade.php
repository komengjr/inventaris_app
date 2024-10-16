<style>
    input[type="file"] {
        display: none;
    }

    .row label {
        padding-top: 10px;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Penambahan Staff <span style="color: royalblue;"></span>
        </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <form  method="POST" action="{{ url('divisi/masterstaff/tambah', []) }}" enctype="multipart/form-data" id="form-update">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-5">
                <label for="">Nomor Induk Pegawai</label>
                <input type="text" class="form-control" name="nip" value="" required >
            </div>
            <div class="col-5">
                <label for="">Nama Staff</label>
                <input type="text" class="form-control" name="nama" value="" required>
            </div>
            <div class="col-2">
                <label for="">Class Staff</label>
                <input type="text" class="form-control" name="class" value="" required>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn-success"><i class="fa fa-save"></i> Simpan</button>
    </div>
    </form>
</div>


<script>
    $('#data-table99').DataTable();
</script>

