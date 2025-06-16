<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Maintenance Log</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form method="POST" action="#" enctype="multipart/form-data" id="form-add-data-non-aset">
        @csrf
        <div class="body" id="showdatabarang">
            <div class="card-body">

            </div>

        </div>

        <div class="modal-footer">
            <div id="menu-simpan-data-non-aset">
                <button type="submit" class="btn btn-outline-success" id="button-simpan-data-non-aset"><i
                        class="fa fa-save"></i> Simpan Data</button>
            </div>
        </div>
    </form>
</div>
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    new window.Choices(document.querySelector(".choices-single-jenis"));
    new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>

