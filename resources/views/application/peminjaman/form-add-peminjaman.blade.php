<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Data Pmeinjaman</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('peminjaman_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tujuan Peminjaman</label>
            <select name="tujuan" class="form-control choices-single-peminjaman" id="">
                <option value="">Pilih Tujuan</option>
                <option value="MCU">MCU</option>
                <option value="EVENT">EVENT</option>
                <option value="OPRASIONAL PELAYANAN">OPRASIONAL PELAYANAN</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tujuan Cabang</label>
            <select name="cabang" class="form-control choices-single-cabang" id="">
                <option value="">Pilih Cabang</option>
                @foreach ($cabang as $cabangs)
                    <option value="{{$cabangs->kd_cabang}}">{{$cabangs->nama_cabang}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Penanggung Jawab Peminjaman</label>
            <select name="pj" class="form-control choices-single-user" id="">
                <option value="">Pilih Staff</option>
                @foreach ($staff as $stafss)
                    <option value="{{$stafss->id_staff}}">{{$stafss->nama_staff}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tanggal Peminjaman</label>
            <input class="form-control form-control-lg" id="inputAddress" type="date" name="tgl_pinjam"
                required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Batas Tanggal Peminjaman</label>
            <input class="form-control form-control-lg" id="inputAddress" type="date" name="batas_pinjam"
                required />
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Keterangan</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="deskripsi"
                required />
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
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-peminjaman"));
    new window.Choices(document.querySelector(".choices-single-cabang"));
    new window.Choices(document.querySelector(".choices-single-user"));
    new window.Choices(document.querySelector(".choices-doble-user"));
</script>
