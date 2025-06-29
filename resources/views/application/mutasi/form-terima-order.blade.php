<div class="row g-3 pb-3">
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
                <form class="row g-3" method="post" enctype="multipart/form-data">
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
                        <input class="form-control" type="text" value="{{ $data->tanggal_buat }}" disabled />
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
                        <label class="form-label" for="inputAddress">Penerima</label>
                        <input class="form-control" type="text" name="penerima" id="penerima" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row g-3">

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
            <span id="menu-setup-lokasi-barang-mutasi"></span>
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
                                <th class="text-end">Harga Perolehan</th>
                                <th>Lokasi Awal</th>
                                <th>Lokasi Tujuan</th>
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
                                    <td>{{ $brgs->inventaris_data_code }}</td>
                                    <td>{{ $brgs->inventaris_data_merk }}</td>
                                    <td>{{ $brgs->inventaris_data_tgl_beli }}</td>
                                    <td class="text-end">
                                        @if ($brgs->inventaris_data_jenis == 0)
                                            @currency($brgs->inventaris_data_harga)
                                        @else
                                            @php
                                                $harga = DB::table('depresiasi_penyusutan_log')
                                                    ->where('inventaris_data_code', $brgs->inventaris_data_code)
                                                    ->orderBy('id_penyusutan_log', 'DESC')
                                                    ->first();
                                            @endphp
                                            @if ($harga)
                                                @currency($harga->penyusutan_log_harga)
                                            @else
                                                @currency($brgs->inventaris_data_harga)
                                            @endif
                                        @endif

                                    </td>
                                    <td>{{ $brgs->inventaris_data_location }}</td>
                                    <td>
                                        @if ($brgs->kd_lokasi_tujuan == null)
                                            <button class="btn btn-falcon-primary btn-sm"
                                                id="button-pilih-lokasi-barang-mutasi"
                                                data-code="{{ $brgs->id_sub_mutasi }}"><span
                                                    class="fas fa-download"></span> Pilih
                                                Lokasi</button>
                                        @else
                                            @php
                                                $lokasi = DB::table('tbl_nomor_ruangan_cabang')
                                                    ->join(
                                                        'master_lokasi',
                                                        'master_lokasi.master_lokasi_code',
                                                        '=',
                                                        'tbl_nomor_ruangan_cabang.kd_lokasi',
                                                    )
                                                    ->where(
                                                        'tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang',
                                                        $brgs->kd_lokasi_tujuan,
                                                    )
                                                    ->first();
                                            @endphp
                                            @if ($lokasi)
                                                {{ $lokasi->master_lokasi_name }}
                                            @endif
                                        @endif
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

<div id="menu-poroses-terima-verifikasi-data-mutasi" class="float-end py-4">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="button" id="button-poroses-terima-verifikasi-data-mutasi"
        data-code="{{ $data->kd_mutasi }}">Verifikasi Terima Barang</button>
</div>


<script>
    new DataTable('#data-table-pinjam', {
        responsive: true
    });
</script>
