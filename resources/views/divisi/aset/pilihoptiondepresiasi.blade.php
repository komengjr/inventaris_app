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
        <h6>Pilih Masa Depresiasi<span style="color: royalblue;"></span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <form method="POST" action="{{ url('divisi/dataaset/posttambahdatadepresiasi', []) }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">

                <div class="col-12">
                    <label for="">Pilih Masa Depresiasi</label>
                    <select name="kd_depresiasi" id="" class="form-control single-select">
                        <option value="">Klasifikasi Aset / Masa Depresiasi</option>
                        @foreach ($data as $item)
                            <option value="{{$item->kd_depresiasi}}">{{$item->klasifikasi_aset}} ( {{$item->harga_perolhean}} )</option>
                        @endforeach
                    </select>
                    <input type="text" name="id_inventaris" value="{{$id}}" hidden>
                </div>

            </div>
        </div>


        <div class="modal-footer">
            <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save"></i> Simpan
                Data</button>
        </div>
    </form>

</div>

<script>
    $(document).ready(function() {
        $('.single-select').select2();

    });

</script>

