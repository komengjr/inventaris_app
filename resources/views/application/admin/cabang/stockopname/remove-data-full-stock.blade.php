<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Remove Data</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="remove-data-stock">
        <div class="text-center"><img class="d-block mx-auto"
                src="{{ asset('img/icon/remove.png') }}" alt="shield" width="100">
            <h5 class="text-danger">Apakah Anda Yakin Untuk Menhapus Data {{$id}} ?</h5>
            {{-- <p>Thanks for using Falcon. You are <br>now successfully signed out.</p> --}}
            <a class="btn btn-danger btn-sm mt-3" href="#" id="button-remove-full-data-stock" data-code="{{$id}}"> Remove Data</a>
        </div>
    </div>

</div>
