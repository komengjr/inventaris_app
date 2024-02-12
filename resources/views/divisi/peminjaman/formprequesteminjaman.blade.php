
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
         <h6>Form Request Peminjaman <span style="color: royalblue;"> Nomor tiket : {{$tiket}}</span> </h6>
         <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
<form  method="POST" action="{{ url('divisi/requestpeminjaman/tambah', []) }}" enctype="multipart/form-data" >
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <label for="">Tujuan Peminjaman</label>
                <select name="nama_kegiatan" id="" class="form-control single-select" required>
                    <option value="">Pilih Kategori</option>
                    <option value="MCU">MCU</option>
                    <option value="EVENT">EVENT</option>
                    <option value="Oprasional Pelayanan">Oprasional Pelayanan</option>
                </select>
                <input type="text" class="form-control" name="tiket_peminjaman" value="{{$tiket}}" hidden>
            </div>
            <div class="col-md-6">
                <label for="">Tujuan Request Cabang</label>
                <select name="cabang" id="" class="form-control single-select">
                    <option value="">Pilih Cabang</option>
                    @foreach ($cabang as $item)
                        <option value="{{$item->kd_cabang}}">{{$item->nama_cabang}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
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
