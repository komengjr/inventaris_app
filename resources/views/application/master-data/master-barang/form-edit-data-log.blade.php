<div class="card border border-primary">
    <form class="row g-3 p-4" id="form-update-data-log" action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Barang</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="nama_barang"
                value="{{$data->inventaris_data_name}}" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">No Inventaris</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="no_inventaris"
                value="{{$data->inventaris_data_number}}" required />
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="code"
                value="{{$data->inventaris_data_code}}" hidden />
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="location"
                value="{{$data->inventaris_data_location}}" hidden/>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Kode Lokasi</label>
            <select name="lokasi" class="form-select choices-single-lokasi" id="">
                <option value="{{$data->id_nomor_ruangan_cbaang}}">
                    @if ($data->id_nomor_ruangan_cbaang == "")
                    Tidak diketahui
                    @else
                    {{$data->inventaris_data_location}}
                    @endif
                </option>
                @foreach ($lokasi as $lokasis)
                <option value="{{$lokasis->id_nomor_ruangan_cbaang}}">{{$lokasis->master_lokasi_code}} -
                    {{$lokasis->master_lokasi_name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Kode Klasifikasi</label>
            <select name="klasifikasi" class="form-control form-control-lg choices-single-klasifikasi" id="">
                <option value="{{$data->inventaris_klasifikasi_code}}">{{$data->inventaris_klasifikasi_code}}</option>
                @foreach ($klasifikasi as $klasifikasis)
                <option value="{{$klasifikasis->inventaris_klasifikasi_code}}">
                    {{$klasifikasis->inventaris_klasifikasi_code}} - {{$klasifikasis->inventaris_klasifikasi_name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Jenis Barang</label>
            <select name="jenis" class="form-control" id="">
                <option value="{{$data->inventaris_data_jenis}}">{{$data->inventaris_data_jenis}}</option>
                <option value="0">Barang Non Aset</option>
                <option value="1">Barang Aset</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Pembelian</label>
            <input class="form-control form-control-lg" id="inputAddress" type="date" name="tgl_beli"
                value="{{$data->inventaris_data_tgl_beli}}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Harga Barang</label>
            <input class="form-control form-control-lg text-end" id="inputAddress" type="text" name="harga"
                value="{{$data->inventaris_data_harga}}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Merk Barang</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="merk"
                value="{{$data->inventaris_data_merk}}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Type Barang</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="type"
                value="{{$data->inventaris_data_type}}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">No Seri Barang</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="seri"
                value="{{$data->inventaris_data_no_seri}}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Suplier Barang</label>
            <input class="form-control form-control-lg" id="inputAddress" type="text" name="suplier"
                value="{{$data->inventaris_data_suplier}}" required />
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <span id="loading-button-edit">
                <button class="btn btn-primary float-end" type="button" id="button-save-data-log"><span
                        class="fas fa-save"></span> Save</button>
            </span>
        </div>
    </form>
</div>
