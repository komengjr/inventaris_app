<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Update Verifikasi</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('master_no_whatsapp_update_save') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-12">
            <label class="form-label" for="inputAddress">Akses User</label>
            <select name="akses" class="form-control" required>
                @if ($data->wa_number_akses == 'KCB')
                    <option value="KCB">Kepala Cabang</option>
                    <option value="MGR">Manager</option>
                @else
                    <option value="MGR">Manager</option>
                    <option value="KCB">Kepala Cabang</option>
                @endif
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Lengkap</label>
            <input class="form-control" id="inputAddress" type="text" name="name"
                value="{{ $data->wa_number_name }}" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nomor Whatsapp</label>
            <input class="form-control" id="inputAddress" type="text" name="nomor"
                value="{{ $data->wa_number_no }}" required />
        </div>

        <div class="col-12">
            <input type="text" name="code" id="" value="{{ $data->wa_number_code }}" hidden>
            <button class="btn btn-success float-end" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-select"));
</script>
