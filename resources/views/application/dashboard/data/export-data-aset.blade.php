<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Export Data Barang Aset</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card mb-3 border border-primary ">
            <div class="card-body py-2">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center">
                        <img class="ms-1 mx-3" src="{{ asset('img/brg.png') }}" alt="" width="50" />
                        <div>
                            {{-- <h6 class="text-primary fs--1 mb-0 mt-2">Data Barang</h6>
                            <h4 class="text-primary fw-bold mb-1">123<span class="text-info fw-medium">No.123</span>
                            </h4> --}}
                        </div>
                    </div>
                    <div class="col-xl-auto px-3 py-0">
                        <div class="row gx-2 align-items-center">
                            <div class="col-auto">
                                <form class="row gx-2 float-end" action="#">
                                    <div class="col-auto"><small class="text-primary">Print by: </small></div>
                                    <div class="col-auto">
                                        <select class="form-select form-select-sm text-primary" name="option"
                                            id="option" aria-label="Bulk actions">
                                            <option value="-">Pilih Metode</option>
                                            <option value="data">Preview Data</option>
                                            <option value="pdf">Preview PDF</option>
                                            <option value="excel">Export Excel</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-falcon-primary btn-sm float-end"
                                            id="button-metode-export-data-aset" data-id="0"><span
                                                class="fas fa-qrcode"></span> Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-data-export-barang-non-aset">

        </div>
    </div>
    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
<script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
