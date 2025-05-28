<div class="card border border-primary">
    <form class="row g-3 p-4" action="{{ route('menu_pemusnahan_pilih_data_barang_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Nama Barang</label>
           <input type="text" class="form-control" name="nama" value="{{$data->inventaris_data_name}}" disabled>
           <input type="text" class="form-control" name="id_inventaris" value="{{$data->inventaris_data_code}}" hidden>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">No Inventaris</label>
           <input type="text" class="form-control" name="" value="{{$data->inventaris_data_number}}" disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Merek / Type</label>
           <input type="text" class="form-control" name="" value="{{$data->inventaris_data_merk}}" disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Dasar Pengajuan</label>
           <input type="text" class="form-control" name="dasar_pengajuan" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Pemusnahan</label>
           <input type="date" class="form-control" name="tgl_pemusnahan" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Verifikasi</label>
            <select name="verifikasi" class="form-control choices-single-peminjaman" required>
                <option value="">Pilih Tujuan</option>
                <option value="Kondisi Barang Rusak">Kondisi Barang Rusak</option>
                <option value="Tidak Layak Pakau">Tidak Layak Pakau</option>
                <option value="Spare Part Discontinue">Spare Part Discontinue</option>
                <option value="Dan Lain Lain">Dan Lain Lain</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Persetujuan</label>
            <input type="text" class="form-control" name="" value="Setuju" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Eksekusi</label>
            <input type="text" class="form-control" name="eksekusi" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Penanggung Jawab Cabang</label>
            <select name="pj" class="form-control choices-single-user" required>
                <option value="">Pilih Penanggung Jawab</option>
                @foreach ($wa as $was)
                    <option value="{{$was->id_wa_number}}">{{$was->wa_number_name}}</option>
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
            <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span> Simpan Data</button>
        </div>
    </form>
</div>
