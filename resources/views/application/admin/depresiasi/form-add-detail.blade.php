<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Detail Depresiasi</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('masteradmin_depresiasi_save_detail') }}" method="post"
        enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Depresiasi</label>
            <input class="form-control" id="inputAddress" type="text" name="nama" placeholder="Renovasi Bangun Milik"
                required />
                <input type="text"  name="code" value="{{$code}}" id="" hidden>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Depresiasi Harga</label>
            <input class="form-control" id="inputAddress" type="text" name="harga" placeholder="@currency(12000000000)"
                required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Depresiasi Masa</label>
            <input class="form-control" id="inputAddress" type="text" name="masa" placeholder="2"
                required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Rentang Depresiasi Awal</label>
            <input class="form-control" id="inputAddress" type="text" name="start" placeholder="@currency(0)"
                required />
        </div>
         <div class="col-md-4">
            <label class="form-label" for="inputAddress">Rentang Depresiasi Akhir</label>
            <input class="form-control" id="inputAddress" type="text" name="end" placeholder="@currency(12000000000)"
                required />
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-jenis"));
    // new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
