@if ($id == 0)
    <div class="card-body">
        <p class="text-danger font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">Kode Verifikasi Tidak ditemukan</p>
        <hr>
        <p>Make sure the Code is correct and that the page hasn't moved. If you think this is a mistake, <a
                href="#">contact us</a>.</p>
        <a class="btn btn-primary btn-sm mt-1" href="#" onclick="location.reload();"><span
                class="fas fa-backward"></span>
            Back</a>
    </div>
@elseif ($id == 1)
    <div class="card-body">
        <p class="text-success font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">Kode Sudah di Verifikasi</p>
        <hr>
        <p>Make sure the Code is correct and that the page hasn't moved. If you think this is a mistake, <a
                href="#">contact us</a>.</p>
        <a class="btn btn-primary btn-sm mt-1 float-end" href="#" onclick="location.reload();"><span
                class="fas fa-directions"></span>
            Next</a>
    </div>
@endif
