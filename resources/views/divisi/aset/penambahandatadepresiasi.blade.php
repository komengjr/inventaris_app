<form method="POST" action="{{ url('divisi/dataaset/datadepresiasi/postpenambahandata', []) }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Klasifikasi Aset</label>
                <input type="text" class="form-control" name="tgl_invoice" required>
            </div>
            <div class="col-6">
                <label for="">Harga Perolehan</label>
                <input type="text" class="form-control" name="harga_perolehan" id="dengan-rupiah" required>
            </div>
            <div class="col-6">
                <label for="">Masa Depresiasi</label>
                <input type="number" class="form-control" name="masa_depresiasi" required>
            </div>


            <div class="col-12">
                <label for="">Deskripsi Maintenance</label>
                <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
            </div>

        </div>
    </div>


    <div class="modal-footer">
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save"></i> Simpan
            Data</button>
    </div>
</form>
<script src="{{ url('js/rupiah.js', []) }}"></script>
