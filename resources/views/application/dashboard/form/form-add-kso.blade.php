<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Penambahan Barang KSO</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form method="POST" action="{{ route('dashboard_add_kso_save') }}" enctype="multipart/form-data"
        id="form-add-data-non-aset">
        @csrf
        <div class="body" id="showdatabarang">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                        <label class="custom-file-upload form-control" id="upload-container">
                            <input type="file" id="browseFile" class="form-control" />
                            <span class="fas fa-cloud-upload-alt"></span> Upload Gambar
                        </label>
                        <a href="#" data-fancybox="images" data-caption="">
                            <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="lightbox-thumb img-thumbnail"
                                id="videoPreview" width="350" height="350">
                        </a>
                        <div class="progress  mt-3" style="height: 20px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated loading"
                                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                style="width: 0%; height: 100%">0%</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control form-control-lg" id="nama_barang"
                            required>

                        <label for="inputEmail4" class="form-label">Klasifikasi Inventaris</label>
                        <select class="form-select choices-single-jenis" name="kd_inventaris" id="kd_inventaris" required>
                            <option value="">Pilih Jenis Inventaris</option>
                            @foreach ($klasifikasi as $klasifikasis)
                                <option value="{{ $klasifikasis->inventaris_klasifikasi_code }}">
                                    {{ $klasifikasis->inventaris_klasifikasi_code }} -
                                    {{ $klasifikasis->inventaris_klasifikasi_name }}</option>
                            @endforeach
                        </select>

                        <label for="inputPassword4" class="form-label">No Mou Dokumen</label>
                        <input type="tex" name="no_mou" class="form-control form-control-lg" id="no_mou"
                            required>

                        <label for="inputEmail4" class="form-label">Tanggal KSO</label>
                        <input type="date" name="tgl_kso" class="form-control form-control-lg" id="tgl_kso"
                            required>

                        <input id="link" type="text" name="link" class="form-control" hidden>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Merek</label>
                        <input type="text" name="merk" class="form-control form-control-lg" id="merk">


                        <label for="inputEmail4" class="form-label">Lokasi</label>
                        <select class="form-select choices-single-lokasi" name="no_ruangan" id="no_ruangan" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach ($lokasi as $lokasis)
                                <option value="{{ $lokasis->id_nomor_ruangan_cbaang }}">{{ $lokasis->nomor_ruangan }} -
                                    {{ $lokasis->master_lokasi_name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="inputEmail4" class="form-label">No KSO Alat</label>
                        <input type="text" name="no_kso" class="form-control form-control-lg" id="inputPassword4">

                        <label for="inputPassword4" class="form-label">Nomor Serial</label>
                        <input type="text" name="seri" class="form-control form-control-lg" id="seri">
                    </div>

                </div>
            </div>

        </div>

        <div class="modal-footer">
            <div id="menu-simpan-data-non-aset">
                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> Simpan
                    Data</button>
            </div>
        </div>
    </form>
</div>
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    new window.Choices(document.querySelector(".choices-single-jenis"));
    new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
<script type="text/javascript">
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: '{{ route('file-upload.uploadgambarbarangkso') }}',
        query: {
            _token: '{{ csrf_token() }}'
        }, // CSRF token
        fileType: ['jpg', 'jpeg', 'png'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile').hide();
    });

    resumable.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.')
    });

    var progress = $('.progress');

    function showProgress() {
        progress.find('.loading').css('width', '0%');
        progress.find('.loading').html('0%');
        progress.find('.loading').removeClass('bg-info');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.loading').css('width', ` ${value}%`)
        progress.find('.loading').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>
