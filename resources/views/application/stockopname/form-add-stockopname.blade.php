<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-4">
        <h4 class="mb-1" id="staticBackdropLabel">Form Stockopname Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('menu_stock_opname_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <label class="form-label" for="inputAddress">Tanggal Mulai Stockopname</label>
            <input class="form-control" id="inputAddress" type="date" name="start" required />
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Tanggal Berakhir Stockopname</label>
            <input class="form-control" id="inputAddress" type="date" name="end" required />
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
