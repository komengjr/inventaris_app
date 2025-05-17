<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Update Data Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-4">
        <form class="row g-3" action="{{ route('masteradmin_menu_save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-6">
                <label class="form-label" for="inputAddress">From</label>
                <input class="form-control" id="inputAddress" type="text"
                    name="from"value="{{ $id }}" required />
            </div>
            <div class="col-6">
                <label class="form-label" for="inputAddress">To</label>
                <input class="form-control" id="inputAddress" type="text" name="to"
                    required />
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
