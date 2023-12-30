
<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Upload Data<span style="color: royalblue;"></span>
        </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <form method="POST" action="{{ url('divisi/masterstaff/tambah', []) }}" enctype="multipart/form-data"
        id="form-update">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormInputGroupUsername">Format : xlx ,
                        xlxs</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa fa-upload"></i></div>
                        <input type="file" name="file" id="file" class="form-control" required="">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
            <button type="submit" class="btn-success"><i class="fa fa-save"></i> Upload</button>
        </div>
    </form>
</div>


<script>
    $('#data-table99').DataTable();
</script>
