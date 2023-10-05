<style>
    input[type="file"] {
    display: none;
}
.row label{
    padding-top: 10px;
}
</style>
<div class="modal-content" id="showdatabarang">
    <div class="modal-header bg-success">
         <h6>Form Maintenance <span style="color: royalblue;"> Nomor tiket : </span> </h6>
         <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
<form  method="POST" action="{{ url('divisi/peminjaman/tambah', []) }}" enctype="multipart/form-data" >
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <label for="">Tujuan Peminjaman</label>
                <input type="text" class="form-control" name="nama_kegiatan" required>
                <input type="text" class="form-control" name="tiket_peminjaman" value="" hidden>
            </div>
            <div class="col-6">
                <label for="">Tanggal Peminjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" required>
            </div>
            <div class="col-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
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

<script>
     $(document).ready(function() {
        $('.single-select').select2();

      });
</script>
