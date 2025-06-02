<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Hapus Data Mutasi</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
      <form class="row g-3 p-4" action="{{ route('menu_mutasi_proses_remove_mutasi') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <h5>Proses Pengapusan Data Mutasi Dengan No Tiket <strong class="text-danger">{{$data->kd_mutasi}}</strong></h5>
            <input type="text" name="code" value="{{$data->kd_mutasi}}" hidden>
            {{-- <textarea name="deskripsi" class="form-control" id=""></textarea> --}}
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-danger float-end" type="submit"><span class="fas fa-trash"></span> Remove</button>
        </div>
    </form>
</div>
<script>

</script>
