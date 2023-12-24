<div class="card">
    <div class="card-body">
        @if ($data)
            <div class="row">
                <div class="col-md-3">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" value="{{ $data->nama_barang }}" disabled>

                </div>
                <div class="col-md-3">
                    <label for="">Nomor Inventaris</label>
                    <input type="text" class="form-control" value="{{ $data->no_inventaris }}" disabled>
                </div>
                <div class="col-md-3">
                    <label for="">Type</label>
                    <input type="text" class="form-control" value="{{ $data->type }}" disabled>
                </div>
                <div class="col-md-3">
                    <label for="">Merek</label>
                    <input type="text" class="form-control" value="{{ $data->merk }}" disabled>
                </div>
            </div>
            <!--End Row-->

            <hr>
            @php
                $cekdata = DB::table('tbl_sub_verifdatainventaris')
                    ->where('kode_verif', $kode)
                    ->where('id_inventaris', $data->id_inventaris)
                    ->first();
            @endphp
            @if ($cekdata)
                <span class="badge badge-info shadow-warning m-1">Barang Sudah di Verif</span>
            @else
                <form method="post" id="form-verifikasi-data-inevntaris">
                    @csrf
                    <div class="demo-heading">Pilih Kondisi</div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icheck-material-success icheck-inline">
                                <input type="radio" id="inline-radio-success" name="inlineradio" value="0">
                                <label for="inline-radio-success">Baik</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icheck-material-warning icheck-inline">
                                <input type="radio" id="inline-radio-warning" name="inlineradio" value="1">
                                <label for="inline-radio-warning">Maintenance</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icheck-material-danger icheck-inline">
                                <input type="radio" id="inline-radio-danger" name="inlineradio" value="2">
                                <label for="inline-radio-danger">Rusak</label>
                            </div>
                        </div>
                    </div>
                    <div class="demo-heading">Keterangan</div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
                        </div>

                    </div>
                    <div class="row pt-2">
                        <div class="col-md-12">
                            <input type="text" name="id_inventaris" value="{{ $data->id_inventaris }}" hidden>
                            <input type="text" name="kode" value="{{ $kode }}" id="" hidden>
                            <button class="btn-success" id="button-simpan-hasil-verifikasi"><i class="fa fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
            @endif
        @else
            <span class="badge badge-warning shadow-warning m-1">Barang Tidak DItemukan</span>
        @endif

    </div>
</div>
<script>

</script>
