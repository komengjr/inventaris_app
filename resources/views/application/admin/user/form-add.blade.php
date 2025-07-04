<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Add User</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('masteradmin_user_save') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-12">
            <label class="form-label" for="inputAddress">Cabang</label>
            <select name="cabang" class="form-control choices-single-select" required>
                <option value="">Pilih Menu</option>
                @foreach ($cabang as $cabangs)
                    <option value="{{$cabangs->kd_cabang}}">{{$cabangs->nama_cabang}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-6">
            <label class="form-label" for="inputAddress">Nama Lengkap</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Usman"
                required />
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Akses User</label>
           <select name="akses" id="" class="form-control">
                <option value="">Pilih Akses</option>
                <option value="dir">Direksi</option>
                <option value="sdm">SDM & Umum</option>
           </select>
        </div>
         <div class="col-6">
            <label class="form-label" for="inputAddress">Username</label>
            <input class="form-control" id="inputAddress" type="text" name="username" placeholder="dashboard"
                required />
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Password</label>
            <input class="form-control" id="inputAddress" type="password" name="pwd" placeholder="fa fa-book"
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
    new window.Choices(document.querySelector(".choices-single-select"));
</script>
