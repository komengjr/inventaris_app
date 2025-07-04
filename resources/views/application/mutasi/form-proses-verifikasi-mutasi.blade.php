<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Proses Data Mutasi Antar Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="row g-3 p-3">
        <div class="col-md-12">
            <div class="card border border-warning">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-2 mb-sm-0 ">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                Form Mutasi Barang
                            </h5>
                        </div>
                        <div class="col-sm-auto">

                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0 mt-0">
                    <form class="row g-3" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label" for="inputAddress">Kode Mutasi</label>
                            <input class="form-control" type="text" value="{{ $data->kd_mutasi }}" disabled />
                            <input class="form-control" type="text" id="code" value="{{ $data->kd_mutasi }}"
                                hidden />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputAddress">Tujuan Cabang</label>
                            <input class="form-control" type="text" value="{{ $data->target_mutasi }}" disabled />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputAddress">Tanggal Order</label>
                            <input class="form-control" type="text"
                                value="{{ $data->tanggal_buat }}" disabled />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputAddress">Penanggung Jawab Mutasi</label>
                            <input class="form-control" type="text" value="{{ $data->penanggung_jawab }}" disabled />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputAddress">Deskripsi Peminjaman</label>
                            <textarea name="" class="form-control" id="" disabled>{{ $data->ket }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputAddress">Kode Verifikasi</label>
                            <input class="form-control" type="text" id="verifikasi_code" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 px-3 pb-3">

        <div class="col-md-12">
            <div class="card border border-primary">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-sm-0 mb-2">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                Data Barang Yang Dimutasi
                            </h5>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0" id="menu-data-v3">
                    <div class="tab-content" id="menu-table-pilih-mutasi">
                        <table id="data-table-pinjam" class="table table-striped nowrap" style="width:100%">
                            <thead class="bg-200 text-700 fs--2">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Id Inventaris</th>
                                    <th>No Inventaris</th>
                                    <th>Merek / Type</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Harga Perolehan</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody class="fs--1">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($brg as $brgs)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$brgs->inventaris_data_name}}</td>
                                        <td>{{$brgs->inventaris_data_code}}</td>
                                        <td>{{$brgs->inventaris_data_number}}</td>
                                        <td>{{$brgs->inventaris_data_merk}}</td>
                                        <td>{{$brgs->inventaris_data_tgl_beli}}</td>
                                        <td>@currency($brgs->inventaris_data_harga)</td>
                                        <td>{{$brgs->inventaris_data_location}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div id="menu-verifikasi-data-mutasi">
        <button class="btn btn-primary" type="button" id="button-verifikasi-code-data-mutasi"
            data-code="{{$data->kd_mutasi}}">Verifikasi Kode</button>
    </div>
</div>
<script>
    new DataTable('#data-table-pinjam', {
        responsive: true
    });
</script>

