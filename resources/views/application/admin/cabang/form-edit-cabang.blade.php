<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Update Data Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-4">
        <form class="row g-3" action="{{ route('masteradmin_menu_save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-6">
                <label class="form-label" for="inputAddress">Nama Cabang</label>
                <input class="form-control" id="inputAddress" type="text"
                    name="nama"value="{{ $data->nama_cabang }}" required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">Kota</label>
                <input class="form-control" id="inputAddress" type="text" name="kota" value="{{ $data->city }}"
                    required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">Latitude</label>
                <input class="form-control" id="inputAddress" type="text" name="latitude" value="{{ $data->latitude }}"
                    required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">Longtitude</label>
                <input class="form-control" id="inputAddress" type="text" name="longtitude" value="{{ $data->longtitude }}"
                    required />
            </div>
            <div class="col-12">
                <label class="form-label" for="inputAddress">Alamat</label>
                <textarea name="alamat" class="form-control" >{{ $data->alamat }}</textarea>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" id="gridCheck" type="checkbox" required />
                    <label class="form-check-label" for="gridCheck">Check me</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Update</button>
            </div>
        </form>

    </div>
</div>
