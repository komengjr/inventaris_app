<style>
    input[type="file"] {
        display: none;
    }

    .upload-box {
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        background-color: #f8fafc;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .upload-box:hover {
        border-color: #3b82f6;
        background-color: #eff6ff;
    }

    .preview-img-container {
        position: relative;
        width: 100%;
        max-width: 280px;
        height: 280px;
        margin: 0 auto;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .preview-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .section-title {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #64748b;
        margin-bottom: 1rem;
        padding-bottom: 0.25rem;
        border-bottom: 2px solid #e2e8f0;
    }
</style>

<div class="modal-body p-0">
    <!-- Header Modal -->
    <div class="bg-primary text-white rounded-top-lg py-3 px-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-0 text-white fw-bold" id="staticBackdropLabel">
                <i class="fas fa-box-open me-2"></i>Form Penambahan Barang Non-Aset
            </h4>
            <p class="fs--2 mb-0 text-white-50">Lengkapi detail informasi barang inventaris non-aset di bawah ini</p>
        </div>
        <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
    </div>

    <form method="POST" action="#" enctype="multipart/form-data" id="form-add-data-non-aset" class="p-4">
        @csrf
        <div id="showdatabarang">
            <div class="row g-4">

                <!-- Kolom Upload Gambar -->
                <div class="col-lg-4 border-end-lg">
                    <div class="section-title">
                        <i class="fas fa-image me-1"></i> Foto Barang
                    </div>

                    <div class="preview-img-container mb-3 bg-light d-flex align-items-center justify-content-center">
                        <a href="{{ asset('no_img.jpg') }}" data-fancybox="images" id="fancyboxLink">
                            <img src="{{ asset('no_img.jpg') }}" alt="Preview Barang" class="img-fluid" id="videoPreview">
                        </a>
                    </div>

                    <div class="upload-box mb-3" onclick="document.getElementById('browseFile').click();">
                        <input type="file" id="browseFile" accept="image/*" />
                        <i class="fas fa-cloud-upload-alt fs-2 text-primary mb-2"></i>
                        <h6 class="fs--1 mb-1 text-dark fw-bold">Klik untuk unggah foto</h6>
                        <p class="fs--2 text-muted mb-0">Format: JPG, JPEG, PNG (Maks. 2MB)</p>
                    </div>

                    <div class="progress rounded-pill style-progress" style="height: 12px; display: none;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated loading bg-success"
                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                            style="width: 0%">0%</div>
                    </div>

                    <input id="link" type="text" name="link" hidden>
                </div>

                <!-- Kolom Input Form -->
                <div class="col-lg-8">

                    <!-- Section 1: Informasi Utama -->
                    <div class="section-title">
                        <i class="fas fa-info-circle me-1"></i> Informasi Utama
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <div class="form-floating">
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" required>
                                <label for="nama_barang">Nama Barang <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" name="jumlah_barang" class="form-control border-primary fw-bold text-primary" id="jumlah_barang" min="1" value="1" placeholder="Qty" required>
                                <label for="jumlah_barang" class="text-primary fw-bold">Jumlah (Qty) <span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="klasifikasi" class="form-label fs--2 fw-bold text-muted mb-1">Klasifikasi Inventaris <span class="text-danger">*</span></label>
                            <select class="form-control choices-single-jenis" name="klasifikasi" id="klasifikasi" required>
                                <option value="">Pilih Jenis Inventaris</option>
                                @foreach ($klasifikasi as $klasifikasis)
                                <option value="{{ $klasifikasis->inventaris_klasifikasi_code }}">
                                    {{ $klasifikasis->inventaris_klasifikasi_code }} - {{ $klasifikasis->inventaris_klasifikasi_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="jenis" class="form-label fs--2 fw-bold text-muted mb-1">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg kategori_barang" name="jenis" id="jenis" required>
                                <option value="0">Inventaris</option>
                            </select>
                        </div>
                    </div>

                    <!-- Section 2: Keuangan & Lokasi -->
                    <div class="section-title">
                        <i class="fas fa-coins me-1"></i> Pembelian & Penempatan
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="tgl_beli" class="form-control" id="tgl_beli" required>
                                <label for="tgl_beli">Tanggal Pembelian <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="harga_perolehan" class="form-control" id="dengan-rupiah" placeholder="Harga" required>
                                <label for="dengan-rupiah">Harga Perolehan (Rp) <span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="suplier" class="form-control" id="suplier" placeholder="Supplier" required>
                                <label for="suplier">Supplier / Toko <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lokasi" class="form-label fs--2 fw-bold text-muted mb-1">Lokasi Ruangan <span class="text-danger">*</span></label>
                            <select class="form-control choices-single-lokasi" name="lokasi" id="lokasi" required>
                                <option value="">Pilih Ruangan</option>
                                @foreach ($lokasi as $lokasis)
                                <option value="{{ $lokasis->id_nomor_ruangan_cbaang }}">
                                    {{ $lokasis->nomor_ruangan }} - {{ $lokasis->master_lokasi_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Section 3: Spesifikasi Detail (Optional) -->
                    <div class="section-title">
                        <i class="fas fa-microchip me-1"></i> Spesifikasi Tambahan
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="merk" class="form-control" id="merk" placeholder="Merek">
                                <label for="merk">Merek / Brand</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="type" class="form-control" id="type" placeholder="Type">
                                <label for="type">Tipe Barang</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="seri" class="form-control" id="seri" placeholder="Nomor Seri">
                                <label for="seri">Nomor Serial / SN</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer Action -->
        <div class="modal-footer border-top mt-4 px-0 pb-0 pt-3">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                <i class="fas fa-times me-1"></i> Batal
            </button>
            <div id="menu-simpan-data-non-aset">
                <button type="submit" class="btn btn-primary px-4" id="button-simpan-data-non-aset">
                    <i class="fas fa-save me-1"></i> Simpan Data Non-Aset
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
        $('#fancyboxLink').attr('href', response.path);
        $('#link').val(response.filename);
        $('.style-progress').hide();
    });

    resumable.on('fileError', function(file, response) {
        alert('Gagal mengunggah foto.');
        $('.style-progress').hide();
    });

    var progress = $('.style-progress');

    function showProgress() {
        progress.find('.loading').css('width', '0%').html('0%');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.loading').css('width', `${value}%`).html(`${value}%`);
    }
</script>
