<div class="row">
    <div class="col-md-12">
        <label for="">Cari Ruangan</label>
        <select name="nomor_ruangan" id="nomor_ruangan" class="form-control">
            <option value=""></option>
            @foreach ($ruangan as $data)
                <option value="{{ $data->id_nomor_ruangan_cbaang }}">{{ $data->nomor_ruangan }} -
                    {{ $data->nama_lokasi }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-12 pt-4">
        <button class="btn-info" id="button-cetak-ruangan-stock-opname-print" data-code="{{$id}}">Cetak Report</button>
    </div>

    <div class="col-md-12">
        <hr>
        <div id="menu-cetak-ruangan-stock-opname-print"></div>
    </div>
</div>
