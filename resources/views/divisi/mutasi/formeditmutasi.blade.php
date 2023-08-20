<div class="modal-body">
    <div class="card-body" style="border: 2px solid rgba(0, 0, 0, 0.5)">
        <form id="updatedatadetailpeminjaman">
            @csrf
            <h4 class="form-header text-uppercase">
                <i class="fa fa-address-book-o"></i>
                Detail Barang Mutasi
            </h4>
            <div class="form-group row">
                <label for="input-10" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-10" name="firstname" value="{{$datamutasi->nama_barang}}"/>
                    <input type="text" class="form-control" id="input-10" name="id_pinjam" value="{{$datamutasi->id_sub_mutasi}}" hidden/>

                </div>

            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-12" name="tgl_pinjam_barang" value="{{$datamutasi->kd_lokasi_awal}}"/>
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-13" name="tgl_kembali_barang" value="{{$datamutasi->kd_lokasi_tujuan}}"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-12" class="col-sm-2 col-form-label">Kondisi Barang Keluar</label>
                <div class="col-sm-4">
                    <textarea class="form-control" rows="4" name="kondisi_pinjam">{{$datamutasi->kd_cabang_awal}}</textarea>
                </div>
                <label for="input-13" class="col-sm-2 col-form-label">Kondisi Barang Kembali</label>
                <div class="col-sm-4">
                    <textarea class="form-control" rows="4" name="kondisi_kembali">{{$datamutasi->kd_cabang_tujuan}}</textarea>
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
