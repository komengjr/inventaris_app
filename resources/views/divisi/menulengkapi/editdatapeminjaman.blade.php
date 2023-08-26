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
        <h6>Form Peminjaman <span style="color: royalblue;"> Nomor tiket : </span>
        </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Kegiatan</label>
                <input type="text" class="form-control" name="nama_kegiatan" value="{{ $cekdata[0]->nama_kegiatan }}">
            </div>
            <div class="col-6">
                <label for="">Penanggung Jawab Peminjam</label>
                <input type="text" class="form-control" name="pj_pinjam" value="{{ $cekdata[0]->pj_pinjam }}"
                    required>
            </div>
            <div class="col-6">
                <label for="">Tanggal Peminjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" value="{{ $cekdata[0]->tgl_pinjam }}"
                    required>
            </div>
            <div class="col-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="10" rows="3" name="deskripsi"> {{ $cekdata[0]->deskripsi }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">

    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

</div>
<script>
    $('#data-table99').DataTable();
</script>

