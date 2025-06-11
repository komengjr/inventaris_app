<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Verifikasi Request Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="card-body p-3 pb-0">
        <div class="card border border-primary p-4">
            <form class="row g-3 " action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Tujuan Peminjaman</label>
                    <input type="text" name="" value="{{ $data->kategori_req }}" class="form-control"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Tanggal Request</label>
                    <input type="text" name="" value="{{ $data->tgl_req }}" class="form-control" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Dari Cabang</label>
                    <input type="text" name="" value="{{ $data->nama_cabang }}" class="form-control" disabled>
                </div>
                <div class="col-12">
                    <label class="form-label" for="inputAddress">Keterangan</label>
                    <textarea name="" id="" class="form-control" disabled>{{ $data->deskripsi_req }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Penanggung Jawab Cabang</label>
                    <select name="pj" class="form-control choices-single-user" id="penanggung_jawab">
                        <option value="">Pilih Staff</option>
                        @foreach ($staff as $stafss)
                            <option value="{{ $stafss->id_staff }}">{{ $stafss->nama_staff }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Mengetahui</label>
                    <select name="pj" class="form-control choices-single-users" id="mengetahui">
                        <option value="">Pilih User</option>
                        @foreach ($user as $users)
                            <option value="{{ $users->wa_number_code  }}">{{ $users->wa_number_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Keterangan Peminjaman</label>
                    <textarea name="" class="form-control" id="keterangan_peminjaman"></textarea>
                </div>
                {{-- <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" id="gridCheck" type="checkbox" required />
                        <label class="form-check-label" for="gridCheck">Check me</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
                </div> --}}
            </form>
        </div>
    </div>
    <div class="card p-3">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0 text-white">Informasi Peminjaman</h5>
                </div>
                <div class="col-auto">

                </div>
            </div>
        </div>
        <div class="card-body border border-primary p-4">
            <table id="data-table-pinjam1" class="table table-striped nowrap" style="width:100%">
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
                            <td>{{ $no++ }}</td>
                            <td>{{ $brgs->inventaris_data_name }}</td>
                            <td>{{ $brgs->inventaris_data_number }}</td>
                            <td>{{ $brgs->inventaris_data_merk }}</td>
                            <td>{{ $brgs->inventaris_data_tgl_beli }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>
            <div class="col-12" id="menu-verifikasi-request-peminjaman">
                <button class="btn btn-danger float-end" id="button-reject-request-peminjaman"
                    data-code="{{ $data->tiket_req }}"><span class="fas fa-save"></span> Reject</button>
                @if (!$brg->isEmpty())
                    <button class="btn btn-primary float-end mx-2" id="button-accept-request-peminjaman"
                        data-code="{{ $data->tiket_req }}"><span class="fas fa-save"></span> Accept</button>
                @endif
            </div>

        </div>
    </div>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-user"));
    new window.Choices(document.querySelector(".choices-single-users"));
</script>
<script>
    new DataTable('#data-table-pinjam1', {
        responsive: true
    });
</script>
