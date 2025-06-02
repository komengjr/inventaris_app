<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Data Mutasi Antar Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('menu_mutasi_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label class="form-label" for="inputAddress">Tujuan Cabang</label>
            <select name="cabang" class="form-control choices-single-cabang" required>
                <option value="">Pilih Cabang</option>
                @foreach ($cabang as $cabangs)
                    <option value="{{$cabangs->kd_cabang}}">{{$cabangs->nama_cabang}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Penanggung Jawab Alat</label>
             <input class="form-control form-control-lg" id="inputAddress" type="text" name="pj_alat"
                required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tanggal Order</label>
            <input class="form-control form-control-lg" id="inputAddress" type="date" name="tgl_order"
                required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Pimpinan Cabang</label>
            <select name="menyetujui" class="form-select form-select-lg" required>
                <option value="">Pilih Yang Menyetujui</option>
                @foreach ($wa as $was)
                    <option value="{{$was->wa_number_code}}">{{$was->wa_number_name}} - {{$was->wa_number_akses}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Yang Menyerahkan</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="menyerahkan"
                required />
        </div>
        <div class="col-12">
            <label class="form-label" for="inputAddress">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id=""></textarea>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-cabang"));
</script>
