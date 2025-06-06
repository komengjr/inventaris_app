<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Perubahan Data Staff</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('master_staff_edit_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">NIP</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="nip" value="{{$data->nip}}"
                required />
            <input type="text" name="id_staff" id="" value="{{$data->id_staff}}" hidden>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Staff</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="nama" value="{{$data->nama_staff}}"
                required />
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

