<div class="card border border-primary">
    <form class="row g-3 p-4" action="{{ route('menu_pemusnahan_pilih_data_barang_save') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <h5><span class="badge bg-primary">1. Pengajuan</span></h5>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Penggagas</label>
            <input type="text" class="form-control" name="penggagas" required>
        </div>
        <div class="col-md-8">
            <label class="form-label" for="inputAddress">Dasar Pengajuan</label>
            <input type="text" class="form-control" name="dasar_pengajuan" required>
        </div>
        <h5><span class="badge bg-primary">2. Identitas Barang</span></h5>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Nama Barang</label>
            <input type="text" class="form-control" name="nama" value="{{ $data->inventaris_data_name }}"
                disabled>
            <input type="text" class="form-control" name="id_inventaris" value="{{ $data->inventaris_data_code }}"
                hidden>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">No Inventaris</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_number }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Merek / Type</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_merk }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">No Seri</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_no_seri }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Pembelian</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_tgl_beli }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Harga Perolehan</label>
            <input type="text" class="form-control" name="" value="@currency($data->inventaris_data_harga)" disabled>
        </div>

        <h5><span class="badge bg-primary">3. Verifikasi</span></h5>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">User Verifikasi</label>
            <select name="user_verifikasi" class="form-control choices-single-peminjaman" required>
                <option value="">Pilih user</option>
                @foreach ($mgr as $mgrs)
                    <option value="{{ $mgrs->wa_number_code }}">{{ $mgrs->wa_number_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Status Verifikasi</label>
            <select name="verifikasi" class="form-control choices-single-peminjaman" required>
                <option value="">Pilih Status Verifikasi</option>
                <option value="Kondisi Barang Rusak">Kondisi Barang Rusak</option>
                <option value="Tidak Layak Pakau">Tidak Layak Pakau</option>
                <option value="Spare Part Discontinue">Spare Part Discontinue</option>
                <option value="Dan Lain Lain">Dan Lain Lain</option>
            </select>
        </div>
        <h5><span class="badge bg-primary">4. Persetujuan</span></h5>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Persetujuan Kepala Cabang</label>
            <select name="user_persetujuan" class="form-control choices-single-user" required>
                <option value="">Pilih Penanggung Jawab</option>
                @foreach ($kcb as $kcbs)
                    <option value="{{ $kcbs->wa_number_code }}">{{ $kcbs->wa_number_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Status Persetujuan</label>
            <select name="persetujuan" class="form-control choices-single-user" required>
                <option value="">Pilih Status Persetujuan</option>
                <option value="Persetujuan Pemusnahan">Setuju dimusnahkan</option>
                <option value="Persetujuan Dihibahkan">Dihibahkan</option>
                <option value="Persetujuan Barang Hilang">Barang Hilang</option>
                <option value="Persetujuan Barang Kelebihan Input">Barang Kelebihan Input</option>
                <option value="Barang Dijual Karena Peremajaan">Barang Dijual Karena Peremajaan</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Pemusnahan</label>
            <input type="date" class="form-control" name="tgl_pemusnahan" required>
        </div>
        <div class="col-md-8">
            <label class="form-label" for="inputAddress">Eksekusi</label>
            <select name="ekseskusi" class="form-control choices-single-user" required>
                <option value="">Pilih user Ekseskusi</option>
                @foreach ($staff as $staffs)
                    <option value="{{ $staffs->id_staff}}">{{ $staffs->nama_staff }}  NIP.{{ $staffs->nip }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span> Simpan
                Data</button>
        </div>
    </form>
</div>
