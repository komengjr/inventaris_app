<div class="row mb-3">
    <div class="col">
        <div class="card bg-100 shadow-none border">
            <div class="row gx-0 flex-between-center">
                <div class="col-sm-auto d-flex align-items-center">
                    <img class="ms-3 mx-3" src="{{ asset('img/icon/icon.png') }}" alt="" width="50" />
                    <div>
                        <h6 class="text-primary fs--1 mb-0 mt-2">No Tiket :</h6>
                        <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Peminjaman
                                Barang</span></h4>
                    </div>
                    <img class="ms-n4 d-none d-lg-block" src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}"
                        alt="" width="150" />
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row g-3">
    <div class="col-md-6">
        <div class="card border border-primary">
            <div class="card-header pb-0">
                <div class="row flex-between-center">
                    <div class="col-sm-auto mb-sm-0 mb-2">
                        <h5 class="mb-0" data-anchor="data-anchor">
                            Data Cabang Peminjam
                        </h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><span class="fas fa-align-left me-1"
                                    data-fa-transform="shrink-3"></span>Option</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                <button class="dropdown-item" id="button-clone-master-klasifikasi-barang"><span
                                        class="far fa-folder-open"></span>
                                    Clone Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body pt-0" id="menu-data-v3">
                <form class="row g-2">
                    <div class="col-6">
                        <label class="form-label" for="inputAddress">Kegiatan</label>
                        <input class="form-control" id="inputAddress" type="text" value="{{$data->nama_kegiatan}}" disabled/>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="inputAddress2">Tanggal Pinjam</label>
                        <input class="form-control" id="inputAddress2" type="text"value="{{$data->tgl_pinjam}}" disabled/>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="inputAddress2">Penanggung Jawab</label>
                        <input class="form-control" id="inputAddress2" type="text" value="{{$data->pj_pinjam}}" disabled/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border border-primary">
            <div class="card-header pb-0">
                <div class="row flex-between-center">
                    <div class="col-sm-auto mb-sm-0 mb-2">
                        <h5 class="mb-0" data-anchor="data-anchor">
                            Data Cabang Meminjamkan
                        </h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><span class="fas fa-align-left me-1"
                                    data-fa-transform="shrink-3"></span>Option</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                <button class="dropdown-item" id="button-clone-master-klasifikasi-barang"><span
                                        class="far fa-folder-open"></span>
                                    Clone Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body shadow pt-0 " id="menu-data-v3">
                 <form class="row g-2">
                    <div class="col-6">
                        <label class="form-label" for="inputAddress">Tanggal Pinjam</label>
                        <input class="form-control" id="inputAddress" type="text" value="{{$data->tgl_pinjam}}" disabled/>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="inputAddress2">Tanggal Selesai Pinjam</label>
                        <input class="form-control" id="inputAddress2" type="text" value="{{$data->tgl_selesai}}" disabled/>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="inputAddress2">Penanggung Jawab</label>
                        <input class="form-control" id="inputAddress2" type="text"value="{{$data->pj_pinjam_cabang}}" disabled/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card border border-primary">
            <div class="card-header pb-0">
                <div class="row flex-between-center">
                    <div class="col-sm-auto mb-sm-0 mb-2">
                        <h5 class="mb-0" data-anchor="data-anchor">
                            Data Barang Pinjaman
                        </h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><span class="fas fa-align-left me-1"
                                    data-fa-transform="shrink-3"></span>Option</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                <button class="dropdown-item" id="button-clone-master-klasifikasi-barang"><span
                                        class="far fa-folder-open"></span>
                                    Clone Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body shadow pt-0 " id="menu-data-v3">
                <div class="tab-content">
                    <table id="data-v3" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700">
                            <tr>
                                <th>No</th>
                                <th>Kode Klasifikasi</th>
                                <th>Nama Klasifikasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
