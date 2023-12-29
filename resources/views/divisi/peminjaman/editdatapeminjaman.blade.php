<style>
    input[type="file"] {
        display: none;
    }

    .row label {
        padding-top: 10px;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Form Peminjaman <span style="color: royalblue;"> Nomor tiket : </span>
        </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <form  method="POST" action="{{ url('divisi/peminjaman/editdata', []) }}" enctype="multipart/form-data" id="form-update">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <label for="">Tujuan Peminjaman</label>
                <input type="text" class="form-control" name="nama_kegiatan" value="{{ $cekdata[0]->nama_kegiatan }}">
                <input type="text" class="form-control" name="tiket_peminjaman" value="{{ $cekdata[0]->tiket_peminjaman }}" hidden>
            </div>
            <div class="col-md-6">
                <label for="">Tujuan Cabang</label>
                <select name="cabang" id="" class="form-control single-select" disabled>
                    <option value="{{ $cekdata[0]->tujuan_cabang }}">{{ $cekdata[0]->tujuan_cabang }}</option>
                    @foreach ($cabang as $item)
                        <option value="{{$item->kd_cabang}}">{{$item->nama_cabang}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label for="">Penanggung Jawab Peminjam</label>
                <input type="text" class="form-control" name="pj_pinjam" value="{{ $cekdata[0]->pj_pinjam }}"
                    required>
            </div>
            <div class="col-md-6">
                <label for="">Tanggal Peminjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" value="{{ $cekdata[0]->tgl_pinjam }}"
                    required>
            </div>
            <div class="col-md-6">
                <label for="">Batas Tanggal Peminjam</label>
                <input type="date" class="form-control" name="batas_tgl_pinjam" value="{{ $cekdata[0]->batas_tgl_pinjam }}"
                    required>
            </div>
            <div class="col-md-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="10" rows="3" name="deskripsi"> {{ $cekdata[0]->deskripsi }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn-success"><i class="fa fa-floppy-o"></i> Update</button>
    </div>
    </form>
</div>

<script>
    $('#data-table99').DataTable();
</script>

<script>
    $(document).ready(function() {
       $('.single-select').select2();

     });
</script>
