<div class="card-body py-0">
    <div class="card-body border border-info" id="menu-data-v3">
        <form class="row gx-4" id="form-pilih-lokasi-barang" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-md-3">
                <label class="form-label" for="inputAddress">No Inventaris</label>
                <input class="form-control" id="inputAddress" type="text" name="no_inventaris" value="{{$data->inventaris_data_number}}" disabled />
                <input class="form-control" id="inputAddress" type="text" name="kd_mutasi" value="{{$data->kd_mutasi}}" hidden />
                <input class="form-control" id="inputAddress" type="text" name="id_mutasi" value="{{$data->id_sub_mutasi}}" hidden />
            </div>
            <div class="col-md-3">
                <label class="form-label" for="inputAddress">Nama Barang</label>
                <input class="form-control" id="inputAddress" type="text" name="nama_barang" value="{{$data->inventaris_data_name}}" disabled/>
            </div>

            <div class="col-md-3">
                <label class="form-label" for="inputAddress">Yang Menyerahkan</label>
                <input class="form-control" id="inputAddress" type="text" name="menyerahkan" value="{{$data->inventaris_data_number}}" disabled/>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="inputAddress">Pilih Lokasi</label>
                <select name="lokasi" class="form-control choices-single-lokasi" required>
                    <option>Pilih Cabang</option>
                    @foreach ($lokasi as $lokasis)
                        <option value="{{$lokasis->id_nomor_ruangan_cbaang}}">{{$lokasis->master_lokasi_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 pt-3">
                <button class="btn btn-primary float-end" type="button" id="button-form-pilih-lokasi-barang"><span class="fas fa-save"></span> Save</button>
            </div>
        </form>
    </div>

</div>
<script>
    new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
