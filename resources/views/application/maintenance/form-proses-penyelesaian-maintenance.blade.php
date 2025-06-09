<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Formulir Penyelesaian Maintenance Barang Inventaris</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card border border-primary">
            <form class="row g-3 p-4" action="{{ route('menu_maintenance_proses_data_maintenance_save') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <h5><span class="badge bg-primary">1. Pengajuan</span></h5>
                <div class="col-md-3">
                    <label class="form-label" for="inputAddress">Pelapor</label>
                    <input type="text" class="form-control" name="pelapor" value="{{ $data->pelapor }}" disabled>
                    <input type="text" class="form-control" name="code_maintenance" value="{{ $data->kd_maintenance }}" hidden>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="inputAddress">Dasar Pengajuan</label>
                    <input type="text" class="form-control" name="dasar_pengajuan"
                        value="{{ $data->dasar_pengajuan }}" disabled>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="inputAddress">Mengetahui</label>
                    @php
                        $user = DB::table('wa_number_cabang')->where('wa_number_code', $data->mengetahui)->first();
                    @endphp
                    @if ($user)
                        <input type="text" class="form-control" value="{{ $user->wa_number_name }}" disabled>
                    @else
                        <input type="text" class="form-control" name="dasar_pengajuan" value="" disabled>
                    @endif
                </div>
                <h5><span class="badge bg-primary">2. Identitas Barang</span></h5>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" value="{{ $data->inventaris_data_name }}"
                        disabled>
                    <input type="text" class="form-control" name="id_inventaris"
                        value="{{ $data->inventaris_data_code }}" hidden>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">No Inventaris</label>
                    <input type="text" class="form-control" name=""
                        value="{{ $data->inventaris_data_number }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Merek / Type</label>
                    <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_merk }}"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">No Seri</label>
                    <input type="text" class="form-control" name=""
                        value="{{ $data->inventaris_data_no_seri }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Tanggal Pembelian</label>
                    <input type="text" class="form-control" name=""
                        value="{{ $data->inventaris_data_tgl_beli }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Harga Perolehan</label>
                    <input type="text" class="form-control" name="" value="@currency($data->inventaris_data_harga)" disabled>
                </div>

                <h5><span class="badge bg-primary">3. Keterangan Maintenance</span></h5>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Tanggal Maintenance</label>
                    <input type="date" class="form-control" value="{{ $data->tgl_mulai }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Tanggal Selesai Maintenance</label>
                    <input type="date" class="form-control" name="tgl_selesai" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputAddress">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" disabled>{{ $data->ket_maintenance }}</textarea>
                </div>

                <h5><span class="badge bg-primary">4. Upload Document</span></h5>

                <div class="col-md-12">
                    @if ($data->file_maintenance != '')
                        <iframe src="{{ asset($data->file_maintenance) }}" frameborder="0" id="videoPreview"
                            style="width: 100%; height: 400px;"></iframe>
                    @endif
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" id="gridCheck" type="checkbox" required />
                        <label class="form-check-label" for="gridCheck">Check me</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span>
                        Penyelesaian Data</button>
                </div>
            </form>
        </div>
    </div>
    <div class="p-3" id="menu-data-table-maintenance"></div>
</div>
