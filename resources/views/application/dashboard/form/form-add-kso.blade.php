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
                <i class="fas fa-handshake me-2"></i>Form Penambahan Barang KSO
            </h4>
            <p class="fs--2 mb-0 text-white-50">Lengkapi detail informasi barang Kerjasama Operasional (KSO)</p>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form method="POST" action="{{ route('dashboard_add_kso_save') }}" enctype="multipart/form-data" id="form-add-data-kso" class="p-4">
        @csrf
        <div id="showdatabarang">
            <div class="row g-4">

                <!-- Kolom Upload Gambar -->
                <div class="col-lg-4 border-end-lg">
                    <div class="section-title">
                        <i class="fas fa-image me-1"></i> Foto Barang KSO
                    </div>

                    <div class="preview-img-container mb-3 bg-light d-flex align-items-center justify-content-center">
                        <a href="{{ asset('no_img.jpg') }}" data-fancybox="images" id="fancyboxLink">
                            <img src="{{ asset('no_img.jpg') }}" alt="Preview Barang KSO" class="img-fluid" id="videoPreview">
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

                    <!-- Section 1: Informasi Utama & Dokumen -->
                    <div class="section-title">
                        <i class="fas fa-file-contract me-1"></i> Informasi Barang & Dokumen KSO
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" required>
                                <label for="nama_barang">Nama Barang KSO <span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="kd_inventaris" class="form-label fs--2 fw-bold text-muted mb-1">Klasifikasi Inventaris <span class="text-danger">*</span></label>
                            <select class="form-control choices-single-jenis" name="kd_inventaris" id="kd_inventaris" required>
                                <option value="">Pilih Jenis Inventaris</option>
                                @foreach ($klasifikasi as $klasifikasis)
                                <option value="{{ $klasifikasis->inventaris_klasifikasi_code }}">
                                    {{ $klasifikasis->inventaris_klasifikasi_code }} - {{ $klasifikasis->inventaris_klasifikasi_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating" style="margin-top: 1.5rem;">
                                <input type="text" name="no_mou" class="form-control" id="no_mou" placeholder="No MoU Dokumen" required>
                                <label for="no_mou">No. MoU Dokumen <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Tanggal, Lokasi & Identitas KSO -->
                    <div class="section-title">
                        <i class="fas fa-building me-1"></i> Penempatan & Identitas KSO
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="tgl_kso" class="form-control" id="tgl_kso" required>
                                <label for="tgl_kso">Tanggal KSO <span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="no_ruangan" class="form-label fs--2 fw-bold text-muted mb-1">Lokasi Ruangan <span class="text-danger">*</span></label>
                            <select class="form-control choices-single-lokasi" name="no_ruangan" id="no_ruangan" required>
                                <option value="">Pilih Ruangan</option>
                                @foreach ($lokasi as $lokasis)
                                <option value="{{ $lokasis->id_nomor_ruangan_cbaang }}">
                                    {{ $lokasis->nomor_ruangan }} - {{ $lokasis->master_lokasi_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="no_kso" class="form-control" id="no_kso" placeholder="No KSO Alat">
                                <label for="no_kso">Nomor KSO Alat</label>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Spesifikasi Tambahan -->
                    <div class="section-title">
                        <i class="fas fa-microchip me-1"></i> Spesifikasi Alat
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="merk" class="form-control" id="merk" placeholder="Merek">
                                <label for="merk">Merek / Brand</label>
                            </div>
                        </div>
                        <div class="col-md-6">
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
            <div id="menu-simpan-data-kso">
                <button type="submit" class="btn btn-primary px-4" id="button-simpan-data-kso">
                    <i class="fas fa-save me-1"></i> Simpan Data KSO
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
        target: "{{ route('file-upload.uploadgambarbarangkso') }}",
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
