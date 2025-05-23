<div class="modal-content" id="showdatabarang">
    <div class="modal-header bg-success">
        <h5 class="text-white">
            <span class="badge badge-primary">Form Mutasi Antar Cabang</span>
        </h5>
        <button type="button" class="btn-danger text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
    </div>
    <form id="signupForm" method="POST" action="{{ url('divisi/datamutasi/posttambahdata', []) }}" >
        @csrf
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
                <div class="col-sm-4">
                    <select name="asal_cabang" id="" class="form-control single-select" required>
                        <option value="">Pilih Cabang</option>
                        @foreach ($cabang as $item)
                        <option value="{{$item->kd_cabang}}">{{$item->nama_cabang}}</option>
                        @endforeach
                    </select>
                </div> --}}
                <label for="input-13" class="col-sm-2 col-form-label">Tujuan Lokasi</label>
                <div class="col-sm-10">
                    <select name="tujuan_cabang" id="" class="form-control single-select" required>
                        <option value="">Pilih Cabang</option>
                        @foreach ($cabang as $item1)
                        <option value="{{$item1->kd_cabang}}">{{$item1->nama_cabang}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="input-10" class="col-sm-2 col-form-label" style="font-size: 11px;">Penanggung Jawab Alat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="pj" id="" required>
                </div>
                <label for="input-14" class="col-sm-2 col-form-label">Tanggal Order</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="input-14" name="tgl_buat" required/>
                </div>
            </div>

            <div class="form-group row">
                <label for="input-14" class="col-sm-2 col-form-label">Menyetujui</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-14" name="menyetujui" required/>
                </div>
                <label for="input-15" class="col-sm-2 col-form-label">Yang Menyerahkan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-15" name="menyerahkan" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-17" class="col-sm-2 col-form-label">Deskripsi Yang Menyerahkan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-17" name="deskripsi" required></textarea>
                </div>
            </div>
            {{-- <div class="form-group row">
                <label for="input-15" class="col-sm-2 col-form-label">Penerima</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="input-15" name="penerima" required/>
                </div>
                <label for="input-14" class="col-sm-2 col-form-label">Tanggal Terima</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="input-14" name="tgl_buat" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-17" class="col-sm-2 col-form-label">Deskripsi Yang Menerima</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-17" name="deskripsi" required></textarea>
                </div>
            </div> --}}

        </div>
        <div class="modal-footer">
            <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" class="btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
        </div>
        </form>
    </div>
<script>
    $(document).ready(function() {
       $('.single-select').select2();

     });
</script>
