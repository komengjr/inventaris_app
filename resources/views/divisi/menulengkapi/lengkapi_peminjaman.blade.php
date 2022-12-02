
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
         <h6>Form Peminjaman <span style="color: royalblue;"> Nomor tiket : {{$cekdata[0]->tiket_peminjaman}}</span> </h6>
         <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Kegiatan</label>
                <input type="text" class="form-control" name="nama_kegiatan" value="{{$cekdata[0]->nama_kegiatan}}" disabled>
            </div>
            <div class="col-6">
                <label for="">Penanggung Jawab Peminjam</label>
                <input type="text" class="form-control" name="pj_pinjam" required>
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


    <div class="modal-body" id="buttoninputbarangpeminjaman">
        
        <button type="button" class="btn-success" id="buttontambahbarangpeminjaman" data-url="{{ url('divisi/peminjaman/inputdatabarang', []) }}"><i class="fa fa-keyboard-o" ></i> Input Barang</button>
    </div>

    <div class="modal-body">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Nama Barang</th>
                    <th>Status barang</th>
                </tr>
            </thead>
        </table>
    </div>

</div>


