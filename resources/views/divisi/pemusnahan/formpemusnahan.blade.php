<form  method="POST" action="{{ url('divisi/posttambahdatapemusnahan', []) }}" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-6">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}" disabled>

        </div>
        <div class="col-6">
            <label for="">No Inventaris</label>
            <input type="text" class="form-control" name="no_inventaris" value="{{$data->no_inventaris}}" disabled>
            <input type="text" class="form-control" name="id_inventaris" value="{{$data->id_inventaris}}" hidden>

        </div>
        <div class="col-12">
            <label for="">Dasar Pengajuan</label>
            <input type="text" class="form-control" name="dasar_pengajuan" required>

        </div>
        <div class="col-6">
            <label for="">Tanggal Pemusnahan</label>
            <input type="date" class="form-control" name="tgl_mulai" required>
        </div>
        <div class="col-6">
            <label for="">Verifikasi</label>
            <select name="verifikasi" class="form-control" id="" required>
                <option value="">Pilih</option>
                <option value="Kondisi Barang Rusak">Kondisi Barang Rusak</option>
                <option value="Tidak Layak Pakai">Tidak Layak Pakai</option>
                <option value="Spare Part Discontinu">Spare Part Discontinu</option>
                <option value="Dan lain-lain">Dan lain-lain</option>
            </select>
        </div>
        <div class="col-6">
            <label for="">Persetujuan</label>
            <select name="persetujuan" class="form-control" id="" required>
                <option value="">Pilih</option>
                <option value="Setuju">Setuju</option>
                <option value="Tidak Setuju">Tidak Setuju</option>
            </select>
        </div>
        <div class="col-6">
            <label for="">Eksekusi</label>
            <input type="text" class="form-control" name="eksekusi" required>
        </div>
    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save" ></i> Simpan Data</button>
    </div>
</form>

