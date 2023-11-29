<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6><span style="color: royalblue;"> Data Detail : {{$data->nama_barang}}</span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <form  method="POST" action="{{ url('master/dataexcel/detail/postdata', []) }}" enctype="multipart/form-data" id="form-update">
        @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <label for="">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}" id="">
                <input type="text" class="form-control" name="id" value="{{$data->id}}" id="" hidden>
            </div>
            <div class="col-md-6">
                <label for="">Harga Barang</label>
                <input type="text" class="form-control" name="harga" value="{{$data->harga_perolehan}}" id="">
            </div>
        </div>
    </div>

    <div class="modal-footer pt-3">

        <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button>

    </div>
    </form>
</div>

