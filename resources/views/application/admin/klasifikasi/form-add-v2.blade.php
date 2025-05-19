<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Klasifikasi Ver. 2</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('masteradmin_klasifikasi_add_data_v2_save') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label class="form-label" for="inputAddress">Menu</label>
            <select name="no_urut" class="form-control choices-single-jenis" id="">
                <option value="">Pilih Kategori</option>
                @foreach ($cat as $cats)
                    <option value="{{$cats->no_urut_barang }}">{{$cats->no_urut_barang }} - {{$cats->kategori_barang}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Kode Klasifikasi</label>
            <input class="form-control" id="inputAddress" type="text" name="kd_klasifikasi" placeholder="01.20.xx"
                required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Klasifikasi</label>
            <input class="form-control" id="inputAddress" type="text" name="nama_klasifikasi"
                placeholder="Alumunium Baja" required />
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
    new window.Choices(document.querySelector(".choices-single-jenis"));
    // new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
