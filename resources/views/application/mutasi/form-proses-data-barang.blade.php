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
                        <div class="col-md-3">
                            <label class="form-label" for="inputAddress">Kode Mutasi</label>
                            <input class="form-control" type="text" value="{{ $data->kd_mutasi }}" disabled />
                            <input class="form-control" type="text" id="code" value="{{ $data->kd_mutasi }}"
                                hidden />
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" for="inputAddress">Tujuan Cabang</label>
                            <input class="form-control" type="text" value="{{ $data->target_mutasi }}" disabled />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Tanggal Order</label>
                            <input class="form-control" type="text"
                                value="{{ $data->tanggal_buat }}" disabled />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="inputAddress">Penanggung Jawab Mutasi</label>
                            <input class="form-control" type="text" value="{{ $data->penanggung_jawab }}" disabled />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="inputAddress">Deskripsi Peminjaman</label>
                            <textarea name="" class="form-control" id="" disabled>{{ $data->ket }}</textarea>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 px-3 pb-3">
        <div class="col-md-6">
            <div class="card border border-primary mb-3">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-sm-0 mb-2">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                Cari Data Barang
                            </h5>
                        </div>
                        <div class="col-auto">
                            <div class="search-box" data-list='{"valueNames":["title"]}'>
                                <div class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                    <input class="form-control search-input fuzzy-search" type="search"
                                        placeholder="Cari Nama Barang" id="nama_inventaris"
                                        onkeydown="caridata(this)" />
                                    <span class="fas fa-search search-box-icon"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content" id="hasil-pencarian-barang">
                        {{-- <table id="data-table-search" class="table table-striped nowrap" style="width:100%">
                            <thead class="bg-200 text-700">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>No Inventaris</th>
                                    <th>Merek / Type</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
                                    <th>No Inventaris</th>
                                    <th>Merek / Type</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Action</th>
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
                                        <td>{{$brgs->inventaris_data_merk}}</td>
                                        <td>{{$brgs->inventaris_data_tgl_beli}}</td>
                                        <td>
                                            <button class="btn btn-falcon-danger"><span class="fas fa-trash"></span></button>
                                        </td>
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
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="button" id="button-verifikasi-data-mutasi"
            data-code="{{$data->kd_mutasi}}">Verifikasi</button>
    </div>
</div>
<script>
    new DataTable('#data-table-pinjam', {
        responsive: true
    });
</script>
<script>
    function caridata(ele) {
        if (event.key === 'Enter') {
            var code = document.getElementById('code').value;
            var name = document.getElementById('nama_inventaris').value;
            $.ajax({
                url: "{{ route('menu_mutasi_find_data') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "name": name,
                },
                dataType: 'html',
            }).done(function(data) {
                document.getElementById('nama_inventaris').value = "";
                $('#hasil-pencarian-barang').html(data);
            }).fail(function() {
                $('#hasil-pencarian-barang').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });

        }
    }
</script>
