
<style>
    input[type="file"] {
    display: none;
}
.row label{
    padding-top: 10px;
}


</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
         <h6>Form Verifikasi Data Inventaris <span style="color: royalblue;"> Nomor tiket : {{$tiket}}</span> </h6>
         <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
<form  method="POST" action="{{ url('divisi/verifikasi/tambah', []) }}" enctype="multipart/form-data" >
    @csrf
    <div class="modal-body">
        <div class="row">

            <div class="col-md-6">
                <label for="">Waktu Mulai Verifikasi</label>
                <input type="date" class="form-control" name="waktu" required>
                <input type="text" name="tiket_verif" id="" value="{{$tiket}}" hidden>
            </div>
            <div class="col-md-6">
                <label for="">Waktu  Selesai Verifikasi</label>
                <input type="date" class="form-control" name="waktuselesai" required>
            </div>

        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save" ></i> Simpan Data</button>
    </div>
</form>

</div>


