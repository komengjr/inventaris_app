<div class="modal-content" id="showdatabarang">
    <div class="modal-header bg-success">
        <h5 class="text-white">
            Form Mutasi
        </h5>
        <button type="button" class="btn-danger text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
    </div>
    <form >

        <div class="modal-body" >
            <div class="form-group row">
                <label for="input-10" class="col-sm-2 col-form-label">Pilih Jenis Mutasi</label>
                <div class="col-sm-10">
                    <select name="jenis_mutasi" id="" class="form-control single-select" required disabled>
                        {{-- <option value="">Pilih Jenis</option> --}}
                        {{-- <option value="1">Penempatan</option>
                        <option value="2">Penarikan</option> --}}
                        <option value="3">Mutasi Antar Cabang</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                {{-- <label for="input-12" class="col-sm-2 col-form-label">Asal Lokasi</label>
                <div clsass="col-sm-4">
                    <select name="asal_cabang" id="" class="form-control single-select" required>
                        <option value="">Pilih Cabang</option>
                        @foreach ($cabang as $item)
                        <option value="{{$item->kd_cabang}}">{{$item->nama_cabang}}</option>
                        @endforeach
                    </select>
                </div> --}}
                <label for="input-13" class="col-sm-2 col-form-label">Tujuan Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->target_mutasi}}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="input-10" class="col-sm-2 col-form-label" style="font-size: 11px;">Penanggung Jawab Alat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="pj" value="{{$data->penanggung_jawab}}" disabled>
                </div>
                <label for="input-14" class="col-sm-2 col-form-label">Tanggal Order</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="input-14" name="tgl_buat" value="{{$data->tanggal_buat}}" disabled/>
                </div>
            </div>

            <div class="form-group row">
                <label for="input-14" class="col-sm-2 col-form-label">Menyetujui</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-14" name="menyetujui" value="{{$data->menyetujui}}" disabled/>
                </div>
                <label for="input-15" class="col-sm-2 col-form-label">Yang Menyerahkan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-15" name="menyerahkan" value="{{$data->yang_menyerahkan}}" disabled/>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-17" class="col-sm-2 col-form-label">Deskripsi Yang Menyerahkan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-17" name="deskripsi" disabled>{{$data->ket}}</textarea>
                </div>
            </div>
            <hr>
            <div class="table-responsive pb-5">
                <table class="table styled-table pb-5">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>No Inventaris</th>
                            <th>Merek</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $databarang = DB::table('tbl_sub_mutasi')
                            ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_mutasi.id_inventaris')
                            ->where('tbl_sub_mutasi.kd_mutasi',$data->kd_mutasi)
                            ->get();
                        @endphp
                        @foreach ($databarang as $databarang)
                            <tr>
                                <td>{{$databarang->nama_barang}}</td>
                                <td>{{$databarang->no_inventaris}}</td>
                                <td>{{$databarang->merk}}</td>
                                <td>{{$databarang->type}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="form-group row">
                <label for="input-15" class="col-sm-2 col-form-label">Penerima</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-15" name="penerima" value="{{$data->penerima}}" disabled/>
                    <input type="text" name="kd_mutasi" value="{{$data->kd_mutasi}}" hidden>
                </div>
                <label for="input-14" class="col-sm-2 col-form-label">Tanggal Terima</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="input-14" name="tgl_terima" value="{{$data->tgl_terima}}" disabled/>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-17" class="col-sm-2 col-form-label">Deskripsi Yang Menerima</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-17" name="deskripsi_penerima" disabled>{{$data->ket_penerima}}</textarea>
                </div>
            </div>

        </div>
        </form>
    </div>
<script>
    $(document).ready(function() {
       $('.single-select').select2();

     });
</script>
