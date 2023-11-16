<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote-bs4.css') }}"/>
<form method="POST" action="{{ url('divisi/case/databaru', []) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Judul</label>
        <input type="text" name="judul"  class="form-control" placeholder="Isi kan Judul Case" required>
    </div>

    <div class="form-group">
        <label for="">Keterangan</label>
        <input type="text" name="ket" class="form-control" placeholder="Isikan Keterangan" required>
    </div>
    <div class="form-group">
        <label for="">Deskripsi</label>
        <textarea class="form-control" name="desk" id="summernoteEditor" style="height: 200px" required></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-floppy-o mr-1"></i> Simpan</button>
    </div>
</form>
<script src="{{ asset('assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script>
    $('#summernoteEditor').summernote({
          height: 400,
          tabsize: 2
    });
</script>
