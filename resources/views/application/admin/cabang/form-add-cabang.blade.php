<div class="modal-body p-0">
    <div class="bg-300 rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Add Data Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-4">
        <form class="row g-3" action="{{ route('masteradmin_cabang_save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <label class="form-label" for="inputAddress">Pilih Entitas Cabang</label>
                <select name="entitas" class="form-control" id="">
                    <option value="">Pilih Entitas</option>
                    @foreach ($entitas as $ent)
                    <option value="{{$ent->kd_entitas_cabang}}">{{$ent->nama_entitas_cabang}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <label class="form-label" for="inputAddress">Nama Cabang</label>
                <input class="form-control" id="inputAddress" type="text"
                    name="nama" placeholder="Ex. Pramita Adityawarman" required />
            </div>
            <div class="col-md-3">
                <label class="form-label" for="inputAddress">Kode Cabang</label>
                <input class="form-control" id="inputAddress" type="text"
                    name="kode" placeholder="Ex. LA" required />
            </div>
            <div class="col-md-3">
                <label class="form-label" for="inputAddress">No Dokumen Cabang</label>
                <input class="form-control" id="inputAddress" type="text"
                    name="nomor" placeholder="Ex. 00" required />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="inputAddress">Kota</label>
                <input class="form-control" id="inputAddress" type="text" name="kota" placeholder="Ex. Surabaya"
                    required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">Telepon</label>
                <input class="form-control" id="inputAddress" type="text" name="telepon" placeholder="Ex. 1231xxxxx"
                    required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">Email</label>
                <input class="form-control" id="inputAddress" type="text" name="email" placeholder="Ex. Example@pramita.co.id"
                    required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">Latitude</label>
                <input class="form-control" id="inputAddress" type="text" name="latitude" placeholder="-0.23123"
                    required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">Longtitude</label>
                <input class="form-control" id="inputAddress" type="text" name="longtitude" placeholder="111.23123"
                    required />
            </div>
            <div class="col-12">
                <label class="form-label" for="inputAddress">Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
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
</div>
