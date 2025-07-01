<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Cetak Lokasi Ruangan Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="row g-3 p-4">
        <div class="card p-3 border border-primary">
            <div class="col-md-12">
                <label class="form-label" for="inputAddress">Pilih Ruangan</label>
                <select name="lokasi_id" id="lokasi_id" class="form-control choices-single-cabang" required>
                    <option value="">Pilih</option>
                    @foreach ($data as $datas)
                        <option value="{{ $datas->id_nomor_ruangan_cbaang }}">
                            {{ $datas->nomor_ruangan }}-{{ $datas->master_lokasi_name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col-12">
                <button class="btn btn-warning btn-sm float-end " id="button-export-excel-ruangan-cabang">
                    <span class="fas fa-file-excel"></span> Download Excel</button>
                <button class="btn btn-primary float-end btn-sm me-2" id="button-cetak-ruangan-cabang-preview">
                    <span class="fas fa-save"></span> Preview Data</button>
            </div>
        </div>
    </div>
    <div class="p-3 pt-0">
        <span id="menu-print-data-ruangan"></span>
    </div>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-cabang"));
</script>
