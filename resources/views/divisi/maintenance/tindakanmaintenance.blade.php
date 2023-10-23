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
        <h6>Form Maintenance <span style="color: royalblue;"> Nomor Tiket : {{ $id }}</span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <form method="POST" action="{{ url('divisi/maintenance/tindakan', []) }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label for="">Tanggal Selesai :</label>
                    <input type="date" class="form-control" name="tgl_akhir" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Deskripsi :</label>
                    <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
                    <input type="text" class="form-control" name="id" value="{{ $id }}" hidden>
                </div>
            </div>
        </div>


        <div class="modal-footer">
            <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save"></i>
                Proses Selesai</button>
        </div>
    </form>

</div>
