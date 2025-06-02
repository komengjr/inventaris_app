<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Add No Whatsapp</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('master_no_whatsapp_save') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-12">
            <label class="form-label" for="inputAddress">Akses User</label>
            <select name="akses"  class="form-control" required>
                <option value="">Pilih Akses</option>
                <option value="KCB">Kepala Cabang</option>
                <option value="MGR">Manager</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Lengkap</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Muhammad Usman S.T M.T" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nomor Whatsapp</label>
            <input class="form-control" id="inputAddress" type="text" name="nomor" placeholder="08XXXXXXXXX"
                required />
        </div>

        <div class="col-12">
            <button class="btn btn-success float-end" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-select"));
</script>
