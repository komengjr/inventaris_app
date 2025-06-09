<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Formulir Maintenance Barang Inventaris</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card border border-primary">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-sm-auto mb-sm-0">
                        <h5 class="mb-0">Cari Barang</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row gx-2 align-items-center">
                            <div class="col-auto">
                                <form class="row gx-2" id="form-pencarian-data-pemusnahan" action="#">
                                    @csrf
                                    <div class="col-auto mb-1">
                                        <input type="text" class="form-control " name="name">
                                    </div>
                                    <div class="col-auto mb-1">
                                        <select class="form-select " aria-label="Bulk actions" name="option">
                                            <option value="name">By Nama Barang</option>
                                            <option value="no_inventaris">By No Inventaris</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto pe-0 mb-1">
                                <button class="btn btn-falcon-primary btn-sm" id="button-find-data-barang"><span class="fas fa-search"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3" id="menu-data-table-maintenance"></div>
</div>
