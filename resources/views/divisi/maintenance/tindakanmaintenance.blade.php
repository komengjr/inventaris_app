<style>
    input[type="file"] {
        display: none;
    }

    .row label {
        padding-top: 10px;
    }
</style>


{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
<form method="POST" action="{{ url('divisi/maintenance/tindakan', []) }}" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="row">
            <div class="col-md-12">
                <label for="">Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tgl_akhir" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="">Deskripsi :</label>
                <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
                <input type="text" class="form-control" name="id" value="{{ $id }}" hidden>
            </div>
        </div>
    </div>


    <div class="row" style="text-align: right;">
       <div class="col-md-12 pt-2">
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save"></i>
            Proses Selesai</button>
       </div>
    </div>
</form>
