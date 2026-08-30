<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
    <!-- Card Header / Title -->
    <div class="card-header bg-primary text-white p-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-white">
            <i class="fas fa-qrcode me-2"></i>Hasil Scan Inventaris
        </h6>
        <span class="badge bg-white text-primary font-monospace fs--2 px-2.5 py-1 rounded-pill">
            Tiket: {{ $kode }}
        </span>
    </div>

    <div class="card-body p-3 p-md-4 bg-light">
        @if ($data)
        <!-- Detail Informasi Barang -->
        <div class="card border-0 shadow-sm rounded-3 mb-3 bg-white">
            <div class="card-body p-3">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2 mb-3 pb-2 border-bottom">
                    <div>
                        <span class="fs--2 text-muted text-uppercase fw-bold">Nama Barang</span>
                        <h5 class="fw-bold text-dark mb-0">{{ $data->inventaris_data_name }}</h5>
                    </div>
                    <span class="badge bg-soft-primary text-primary border border-primary fs--1 font-monospace px-3 py-1.5 rounded-pill">
                        <i class="fas fa-barcode me-1"></i>{{ $data->inventaris_data_number }}
                    </span>
                </div>

                <div class="row g-2">
                    <div class="col-6 col-md-3">
                        <div class="p-2 bg-light rounded-2">
                            <span class="fs--2 text-muted d-block"><i class="fas fa-layer-group me-1 text-primary"></i>Tipe</span>
                            <strong class="fs--1 text-dark">{{ $data->inventaris_data_type ?? '-' }}</strong>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-2 bg-light rounded-2">
                            <span class="fs--2 text-muted d-block"><i class="fas fa-tag me-1 text-info"></i>Merek</span>
                            <strong class="fs--1 text-dark">{{ $data->inventaris_data_merk ?? 'Tidak Ada' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Verifikasi atau Alert Sudah Diverifikasi -->
        @if ($data->is_verified)
        <div class="card border-0 shadow-sm rounded-3 bg-white border-start border-4 border-info">
            <div class="card-body p-3 text-center">
                <div class="avatar avatar-2xl mb-2 mx-auto">
                    <div class="bg-soft-info text-info rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin: 0 auto;">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
                <h6 class="fw-bold text-info mb-1">Barang Sudah Diverifikasi!</h6>
                <p class="text-muted fs--2 mb-0">
                    Barang ini telah diverifikasi pada tanggal <strong>{{ \Carbon\Carbon::parse($data->verif_date)->format('d M Y H:i') }}</strong>.
                </p>
            </div>
        </div>
        @else
        <form method="post" id="form-verifikasi-data-inevntaris" class="card border-0 shadow-sm rounded-3 bg-white p-3">
            @csrf
            <!-- Option Status Radio Card -->
            <label class="form-label fw-bold text-700 fs--1 mb-2">
                <i class="fas fa-clipboard-check text-primary me-1"></i>Pilih Kondisi Barang <span class="text-danger">*</span>
            </label>

            <div class="row g-2 mb-3">
                <!-- Option Baik -->
                <div class="col-12 col-sm-4">
                    <input type="radio" class="btn-check select-kondisi-radio" name="inlineradio" id="radio-baik" value="0" autocomplete="off">
                    <label class="btn btn-outline-success w-100 p-2 text-start rounded-3 shadow-none border-2 h-100 d-flex align-items-center" for="radio-baik">
                        <i class="fas fa-check-circle fs-1 me-2"></i>
                        <div>
                            <div class="fw-bold fs--1">BAIK</div>
                            <div class="fs--2 opacity-75">Kondisi normal</div>
                        </div>
                    </label>
                </div>

                <!-- Option Maintenance -->
                <div class="col-12 col-sm-4">
                    <input type="radio" class="btn-check select-kondisi-radio" name="inlineradio" id="radio-maint" value="1" autocomplete="off">
                    <label class="btn btn-outline-warning w-100 p-2 text-start rounded-3 shadow-none border-2 h-100 d-flex align-items-center" for="radio-maint">
                        <i class="fas fa-tools fs-1 me-2"></i>
                        <div>
                            <div class="fw-bold fs--1">MAINTENANCE</div>
                            <div class="fs--2 opacity-75">Butuh perbaikan</div>
                        </div>
                    </label>
                </div>

                <!-- Option Rusak -->
                <div class="col-12 col-sm-4">
                    <input type="radio" class="btn-check select-kondisi-radio" name="inlineradio" id="radio-rusak" value="2" autocomplete="off">
                    <label class="btn btn-outline-danger w-100 p-2 text-start rounded-3 shadow-none border-2 h-100 d-flex align-items-center" for="radio-rusak">
                        <i class="fas fa-times-circle fs-1 me-2"></i>
                        <div>
                            <div class="fw-bold fs--1">RUSAK</div>
                            <div class="fs--2 opacity-75">Tidak berfungsi</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Input Keterangan -->
            <div class="mb-3">
                <label class="form-label fw-bold text-700 fs--1 mb-1">
                    <i class="fas fa-edit me-1"></i>Catatan / Keterangan <span class="text-danger">*</span>
                </label>
                <textarea class="form-control form-control-sm" name="keterangan" id="keterangan-scan" rows="3" placeholder="Ketik keterangan fisik atau lokasi barang..."></textarea>
            </div>

            <!-- Hidden Inputs -->
            <input type="hidden" name="id_inventaris" value="{{ $data->inventaris_data_code }}">
            <input type="hidden" name="kode" value="{{ $kode }}">

            <!-- Button Simpan -->
            <button type="button" class="btn btn-success btn-sm w-100 fw-bold shadow-sm py-2" id="button-simpan-hasil-verifikasi">
                <i class="fas fa-save me-1"></i> Simpan Hasil Verifikasi
            </button>
        </form>
        @endif

        @else
        <!-- State Jika Barang Tidak Ditemukan -->
        <div class="card border-0 shadow-sm rounded-3 bg-white p-4 text-center">
            <div class="avatar avatar-2xl mb-2 mx-auto">
                <div class="bg-soft-warning text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; margin: 0 auto;">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                </div>
            </div>
            <h5 class="fw-bold text-dark mb-1">Barang Tidak Ditemukan</h5>
            <p class="text-muted fs--1 mb-0">Nomor inventaris hasil scan tidak cocok dengan database cabang Anda.</p>
        </div>
        @endif
    </div>
</div>

<style>
    .bg-soft-primary {
        background-color: #e0edff;
    }

    .bg-soft-info {
        background-color: #e0f7fa;
    }

    .bg-soft-warning {
        background-color: #fff3cd;
    }
</style>

<script>
    // Integration script simpan tanpa reload page
    $(document).off("click", "#button-simpan-hasil-verifikasi").on("click", "#button-simpan-hasil-verifikasi", function(e) {
        e.preventDefault();

        // Validasi opsional SweetAlert sebelum AJAX dikirim
        const kondisiSelected = $("input[name='inlineradio']:checked").val();
        const keterangan = $("#keterangan-scan").val();

        if (typeof kondisiSelected === 'undefined') {
            Swal.fire({
                icon: 'warning',
                title: 'Kondisi Belum Dipilih',
                text: 'Harap pilih salah satu kondisi barang (Baik / Maintenance / Rusak)!',
                confirmButtonColor: '#3085d6',
            });
            return;
        }

        if ($.trim(keterangan) === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Catatan Masih Kosong',
                text: 'Harap isi catatan / keterangan barang!',
                confirmButtonColor: '#3085d6',
            });
            return;
        }

        var data = $("#form-verifikasi-data-inevntaris").serialize();

        // Loading Indicator
        $("#hasil-pencarian").html(
            '<div class="text-center my-4"><div class="spinner-border text-primary" role="status"></div><p class="mt-2 text-muted fs--1">Menyimpan data verifikasi...</p></div>'
        );

        $.ajax({
                url: "{{ route('menu_stock_opname_scan_data_with_scanner_save') }}",
                type: "POST",
                data: data,
                dataType: "html",
            })
            .done(function(data) {
                $("#hasil-pencarian").html(data);
            })
            .fail(function() {
                $("#hasil-pencarian").html(
                    '<div class="alert alert-danger text-center"><i class="fas fa-exclamation-circle me-1"></i> Terjadi kesalahan sistem. Silakan coba lagi.</div>'
                );
            });
    });
</script>
