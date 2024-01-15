<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Edit Nomor Ruangan <span style="color: royalblue;"></span>
        </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <form  method="POST" action="#" enctype="multipart/form-data" id="form-update">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="">Nomor Ruangan</label>
                <input type="text" class="form-control" name="nomor_ruangan" value="" required >
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn-success"><i class="fa fa-save"></i> Update</button>
    </div>
    </form>
</div>


<script>
    $(document).ready(function() {
       $('.single-select').select2();

     });
</script>

