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
    <form method="POST" action="{{ url('divisi/peminjaman/tambah', []) }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="icheck-material-primary icheck-inline">
                <input type="radio" id="inline-radio-primary" name="inlineradio" checked />
                <label for="inline-radio-primary">Ringan</label>
            </div>
            <div class="icheck-material-info icheck-inline">
                <input type="radio" id="inline-radio-info" name="inlineradio" />
                <label for="inline-radio-info">Sedang</label>
            </div>
            <div class="icheck-material-danger icheck-inline">
                <input type="radio" id="inline-radio-danger" name="inlineradio" />
                <label for="inline-radio-danger">Berat</label>
            </div>
            <div class="row pt-4">
                <div class="col-12">

                    <input type="text" class="form-control" name="tiket_peminjaman" value="{{ $id }}" hidden>
                </div>

                <div class="col-12">
                    <label for="">Deskripsi :</label>
                    <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
                </div>
            </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
            <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save"></i>
                Proses</button>
        </div>
    </form>

</div>
