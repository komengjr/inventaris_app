<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Perubahan Data Lokasi Ruangan</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-1 px-4 py-3" action="{{ route('master_location_update_location_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label class="form-label" for="inputAddress">Pilih Nama Ruangan</label>
            <select name="lokasi" class="form-select form-select-lg choices-single-lokasi" required>
                <option value="{{$data->master_lokasi_code}}">{{$data->master_lokasi_name}}</option>
                @foreach ($lokasi as $lokasis)
                <option value="{{$lokasis->master_lokasi_code}}">{{$lokasis->master_lokasi_name}}</option>
                @endforeach
            </select>
            <input type="text" name="id_ruangan" value="{{$data->id_nomor_ruangan_cbaang }}" hidden/>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12" >
            <button class="btn btn-primary float-end" type="submit" ><span class="fas fa-save"></span> Save</button>
        </div>
    </form>

</div>
<script>
    new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
