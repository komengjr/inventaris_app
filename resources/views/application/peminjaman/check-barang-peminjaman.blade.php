<div class="row g-3 p-3">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-body pt-2" id="menu-data-v3">
                <div class="tab-content" id="menu-table-pilih-peminjaman">
                    <form class="row g-3" method="post" id="form-check-data-peminjaman" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Nama Barang</label>
                            <input class="form-control" type="text" value="{{ $data->inventaris_data_name }}"
                                disabled />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">No Inventaris</label>
                            <input class="form-control" type="text" value="{{ $data->inventaris_data_number }}" disabled />
                            <input class="form-control" type="text" name="code" value="{{ $data->tiket_peminjaman }}" hidden/>
                            <input class="form-control" type="text" name="id_pinjam" value="{{ $data->id_sub_peminjaman }}" hidden/>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Catatan</label>
                            <input class="form-control" type="text" name="catatan"/>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary float-end" type="button" id="button-proses-save-verifikasi-data-peminjaman"><span class="fas fa-save"></span>
                                Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
