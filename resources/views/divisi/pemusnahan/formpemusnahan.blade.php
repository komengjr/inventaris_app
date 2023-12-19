<form  method="POST" action="{{ url('divisi/tambahdatapemusnahan', []) }}" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-6">
            <label for="">Nama Barang Pe</label>
            <input type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}" disabled>

        </div>
        <div class="col-6">
            <label for="">No Inventaris</label>
            <input type="text" class="form-control" name="no_inventaris" value="{{$data->no_inventaris}}" disabled>
            <input type="text" class="form-control" name="id_inventaris" value="{{$data->id_inventaris}}" hidden>

        </div>
        <div class="col-6">
            <label for="">Dasar Pengajuan</label>
            <input type="text" class="form-control" name="pelapor" required>

        </div>
        <div class="col-6">
            <label for="">Tanggal Pemusnahan</label>
            <input type="date" class="form-control" name="tgl_mulai" required>
        </div>
        <div class="col-6">
            <label for="">Verifikasi</label>
            <select name="verifikasi" class="form-control" id="">
                <option value="">Pilih</option>
                <option value="Kondisi Barang Rusak">Kondisi Barang Rusak</option>
                <option value="Tidak Layak Pakai">Tidak Layak Pakai</option>
                <option value="Spare Part Discontinu">Kondisi Barang Rusak</option>
            </select>
        </div>
        <div class="col-6">
            <label for="">Persetujuan</label>
            <select name="verifikasi" class="form-control" id="">
                <option value="">Pilih</option>
                <option value="Kondisi Barang Rusak">Kondisi Barang Rusak</option>
                <option value="Tidak Layak Pakai">Tidak Layak Pakai</option>
                <option value="Spare Part Discontinu">Kondisi Barang Rusak</option>
            </select>
        </div>
        <div class="col-6">
            <label for="">Eksekusi</label>
            <input type="text" class="form-control" name="tgl_mulai" required>
        </div>


        <div class="col-12">
            <label for="">Deskripsi Maintenance</label>
            <textarea class="form-control" id="" cols="30" rows="10" name="ket_maintenance"></textarea>
        </div>
        <div class="col-12">
            {{-- <button type="submit" class="btn-info"><i class="zmdi zmdi-save"></i></button> --}}
        </div>
    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save" ></i> Simpan Data</button>
    </div>
</form>

