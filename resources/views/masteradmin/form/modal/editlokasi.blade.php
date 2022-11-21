<form action="#" method="post" id="formeditlokasi">
    @csrf
    <div class="row">
        <div class="col-12">
            <label for="">Kode Lokasi</label>
            <input type="text" class="form-control" value="{{$data[0]->kd_lokasi}}" disabled>
            <input type="text" class="form-control" name="kd_lokasi" value="{{$data[0]->kd_lokasi}}" hidden>
        </div>
        <div class="col-12">
            <label for="">Nama Lokasi</label>
            <input type="text" class="form-control" name="nama_lokasi" value="{{$data[0]->nama_lokasi}}">
        </div>
    </div>
</form>
<div class="float-sm-right pt-3">
    <button class="btn-danger" id="deletedatalokasibaru" data-url="{{ url('master/datacabang/lokasi/delete', []) }}"><i class="fa fa-trash"></i> hapus</button>
    <button class="btn-info" id="simpanupdatedatalokasi" data-url="{{ url('master/datacabang/lokasi/update', []) }}"><i class="fa fa-save"></i> Update</button>
</div>