<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Data Maintenance <span style="color: royalblue;"> </span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>

    <div class="modal-body">
        <iframe src="{{ asset($data->file_maintenance) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>
