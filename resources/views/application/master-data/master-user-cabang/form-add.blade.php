<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Add Data Staff</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('master_user_cabang_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Pilih Staff</label>
            <select name="user_id" class="form-control choices-single-cabang" required>
                <option value="">Pilih Staff</option>
                @foreach ($data as $datas)
                    <option value="{{ $datas->id_staff }}">{{ $datas->nama_staff }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Email</label>
        <input class="form-control form-control-lg" id="inputAddress" type="text" name="email" required />
        </div>
        <div class="col-md-12">
            <label class="form-label" for="inputAddress">Password</label>
        <input class="form-control form-control-lg" id="inputAddress" type="password" name="password" required />
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-cabang"));
</script>
