<div class="row">
    <div class="col-12">
        <label for="">Kode Peminjaman Barang</label>
        <input type="text" class="form-control" name="nama_kegiatan" value="" disabled>
    </div>
    <div class="col-6">
        <label for="">Kode / Nama Barang</label>
        <select class="form-control single-select">
            @foreach ($databrg as $databrg)
                <option value="">{{$databrg->kd_inventaris}} - {{$databrg->nama_barang}} - <p style="color: red;">{{$databrg->nama_lokasi}}</p></option>
            @endforeach
            
        </select>
    </div>
    <div class="col-6">
        <label for="">Tanggal Input</label>
        <input type="date" class="form-control" name="tgl_pinjam" required>
    </div>
    <div class="col-12 pt-3 text-right">
      <button class="btn-danger" id="buttontablepcloseeminjaman" data-url="{{ url('divisi/peminjaman/tableclosepeminjaman', ['id'=>123]) }}"><i class="fa fa-close" ></i> tutup</button>
      <button class="btn-info" id="buttontablepeminjaman" data-url="{{ url('divisi/peminjaman/tablepeminjaman', ['id'=>123]) }}"><i class="fa fa-plus" ></i> Tambah</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.single-select').select2();

      });

</script>