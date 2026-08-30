<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-300 rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Penambahan Barang Non Asets</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form method="POST" action="#" enctype="multipart/form-data" id="form-add-data-non-aset">
        @csrf
        <div class="body" id="showdatabarang">
            <div class="card-body">
                <div class="row g-4">
                    <!-- Upload Gambar Column -->
                    <div class="col-md-4 text-center">
                        <label class="custom-file-upload form-control" id="upload-container">
                            <input type="file" id="browseFile" class="form-control" />
                            <span class="fas fa-cloud-upload-alt"></span> Upload Gambar
                        </label>
                        <a href="#" data-fancybox="images" data-caption="">
                            <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="lightbox-thumb img-thumbnail"
                                id="videoPreview" width="350" height="350">
                        </a>
                        <div class="progress mt-3" style="height: 20px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated loading"
                                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                style="width: 0%; height: 100%">0%</div>
                        </div>
                    </div>

                    <!-- Column 2 Input -->
                    <div class="col-md-4">
                        <label for="nama_barang" class="form-label">Nama Barang <small class="text-danger">Wajib diisi</small></label>
                        <input type="text" name="nama_barang" class="form-control form-control-lg" id="nama_barang" required>

                        <!-- TAMBAHAN BARU: Input Jumlah Barang -->
                        <label for="jumlah_barang" class="form-label text-primary fw-bold">
                            <i class="fas fa-boxes me-1"></i> Jumlah Barang (Qty) <small class="text-danger">Wajib diisi</small>
                        </label>
                        <input type="number" name="jumlah_barang" class="form-control form-control-lg border-primary fw-bold" id="jumlah_barang" min="1" value="1" required>

                        <label for="klasifikasi" class="form-label">Klasifikasi Inventaris <small class="text-danger">Wajib diisi</small></label>
                        <select class="form-control choices-single-jenis" name="klasifikasi" id="klasifikasi" required>
                            <option value="">Pilih Jenis Inventaris</option>
                            @foreach ($klasifikasi as $klasifikasis)
                            <option value="{{ $klasifikasis->inventaris_klasifikasi_code }}">{{ $klasifikasis->inventaris_klasifikasi_code }}-{{ $klasifikasis->inventaris_klasifikasi_name }}</option>
                            @endforeach
                        </select>

                        <label for="jenis" class="form-label">Kategori <small class="text-danger">Wajib diisi</small></label>
                        <select class="form-control form-control-lg kategori_barang" name="jenis" required>
                            <option value="0">Inventaris</option>
                        </select>

                        <label for="tgl_beli" class="form-label">Tanggal Pembelian <small class="text-danger">Wajib diisi</small></label>
                        <input type="date" name="tgl_beli" class="form-control form-control-lg" id="tgl_beli" required>

                        <label for="dengan-rupiah" class="form-label">Harga Perolehan <small class="text-danger">Wajib diisi</small></label>
                        <input type="text" name="harga_perolehan" class="form-control form-control-lg" id="dengan-rupiah" required>
                        <input id="link" type="text" name="link" class="form-control" hidden>
                    </div>

                    <!-- Column 3 Input -->
                    <div class="col-md-4">
                        <label for="suplier" class="form-label">Supplier <small class="text-danger">Wajib diisi</small></label>
                        <input type="text" name="suplier" class="form-control form-control-lg" id="suplier" required>

                        <label for="lokasi" class="form-label">Lokasi <small class="text-danger">Wajib diisi</small></label>
                        <select class="form-control choices-single-lokasi" name="lokasi" id="lokasi" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach ($lokasi as $lokasis)
                            <option value="{{ $lokasis->id_nomor_ruangan_cbaang }}">{{ $lokasis->nomor_ruangan }} - {{ $lokasis->master_lokasi_name }}</option>
                            @endforeach
                        </select>

                        <label for="merk" class="form-label">Merek</label>
                        <input type="text" name="merk" class="form-control form-control-lg" id="merk">

                        <label for="type" class="form-label">Type Barang</label>
                        <input type="text" name="type" class="form-control form-control-lg" id="type">

                        <label for="seri" class="form-label">Nomor Serial</label>
                        <input type="text" name="seri" class="form-control form-control-lg" id="seri">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <div id="menu-simpan-data-non-aset">
                <button type="submit" class="btn btn-outline-success" id="button-simpan-data-non-aset">
                    <i class="fa fa-save"></i> Simpan Data
                </button>
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
        target: "{{ route('file-upload.uploadgambarbarang') }}",
        query: {
            _token: '{{ csrf_token() }}'
        },
        fileType: ['jpg', 'jpeg', 'png'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function(file) {
        showProgress();
        resumable.upload();
    });

    resumable.on('fileProgress', function(file) {
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function(file, response) {
        response = JSON.parse(response);
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile').hide();
    });

    resumable.on('fileError', function(file, response) {
        alert('file uploading error.');
    });

    var progress = $('.progress');

    function showProgress() {
        progress.find('.loading').css('width', '0%');
        progress.find('.loading').html('0%');
        progress.find('.loading').removeClass('bg-info');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.loading').css('width', ` ${value}%`);
        progress.find('.loading').html(`${value}%`);
    }

    function hideProgress() {
        progress.hide();
    }
</script>
