<form class="row g-3 p-4" action="{{ route('aplikasi_app_peminjaman_barang_save') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label class="form-label" for="inputAddress">Tujuan Peminjaman</label>
        <select name="tujuan" class="form-control choices-single-peminjaman" required>
            <option value="">Pilih Tujuan</option>
            <option value="MCU">MCU</option>
            <option value="EVENT">EVENT</option>
            <option value="OPRASIONAL PELAYANAN">OPRASIONAL PELAYANAN</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="inputAddress">Tanggal Peminjaman</label>
        <input class="form-control form-control-lg" id="inputAddress" type="date" name="tgl_pinjam" required />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="inputAddress">Batas Tanggal Peminjaman</label>
        <input class="form-control form-control-lg" id="inputAddress" type="date" name="batas_pinjam" required />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="inputAddress">Keterangan</label>
        <textarea class="form-control" id="inputAddress" type="text" name="deskripsi" required></textarea>
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" id="gridCheck" type="checkbox" required />
            <label class="form-check-label" for="gridCheck">Check me</label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
    </div>
</form>
<script>
    new window.Choices(document.querySelector(".choices-single-peminjaman"));
</script>
