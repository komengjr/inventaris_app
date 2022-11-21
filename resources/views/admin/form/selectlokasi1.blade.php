<div class="row">
    
    <div class="col-md-7" id="selectlokasixx">
        <form action="" id="formbarangmusnah" method="post">
            @csrf
        <label for="">Nomor Inventaris</label>
                <select class="form-control single-select" name="kd_inventaris">
                            <option>Nama barang -- Type barang</option>
                            @foreach ($data_brg as $item)
                                <option value="{{$item->id}}">
                                            -{{$item->nama_barang}} -- {{$item->type}}
                                </option>
                            @endforeach
                </select>
            </form>
    </div>
    <div class="col-md-5">
        <label for="">Action</label><br>
        <button class="btn btn-success btn-sm" id="kliktambahbrgmusnah" data-url="{{ route('kliktambahbrgmusnah',['id'=>$id])}}"><i class="fa fa-save"> Simpan</i></button>
        <button class="btn btn-danger btn-sm"><i class="fa fa-close"> Tutup</i></button>
    </div>

</div>
<script>
$(document).ready(function() {
    $('.single-select').select2();

});
</script>