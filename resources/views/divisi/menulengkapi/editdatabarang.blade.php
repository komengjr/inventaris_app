<div class="modal-body">
    <div class="card-body" style="border: 2px solid rgba(0, 0, 0, 0.5)">
        <form id="updatedatadetailpeminjaman">
            @csrf
            <h4 class="form-header text-uppercase">
                <i class="fa fa-address-book-o"></i>
                Detail Barang Peminjaman
            </h4>
            <div class="form-group row">
                <label for="input-10" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-10" name="firstname" value="{{$data->nama_barang}}"/>
                    <input type="text" class="form-control" id="input-10" name="id_pinjam" value="{{$data->id_pinjam}}" hidden/>
                    <input type="text" class="form-control" id="input-10" name="id_sub_peminjaman" value="{{$data->id_sub_peminjaman}}" hidden/>
                </div>

            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-12" name="tgl_pinjam_barang" value="{{$data->tgl_pinjam_barang}}"/>
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-13" name="tgl_kembali_barang" value="{{$data->tgl_kembali_barang}}"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Kondisi Barang Keluar</label>
                <div class="col-sm-4">
                    <textarea class="form-control" rows="4" name="kondisi_pinjam">{{$data->kondisi_pinjam}}</textarea>
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Kondisi Barang Kembali</label>
                <div class="col-sm-4">
                    <textarea class="form-control" rows="4" name="kondisi_kembali">{{$data->kondisi_kembali}}</textarea>
                </div>
            </div>

            <div class="form-footer">

                <button type="button" class="btn-success" id="buttonsimpandataupdatedetailpeminjaman" data-url="{{ url('divisi/peminjaman/posteditdatapeminjaman', []) }}">
                    <i class="fa fa-check-square-o"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
