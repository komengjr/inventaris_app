
<style>
    input[type="file"] {
    display: none;
}

</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
         <h6>Form Mutasi 22<span style="color: royalblue;"> Nomor tiket : {{$tiket}}</span> </h6>
         <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
<form  method="POST" action="#" enctype="multipart/form-data" id="form-update">
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Judul Mutasi</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-6">
                <label for="">Pena</label>
            </div>
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
        <button type="submit" class="btn-success" id="updatedatabarang" data-url=""><i class="fa fa-save" ></i> Simpan Data</button>
    </div>
</form>

</div>


