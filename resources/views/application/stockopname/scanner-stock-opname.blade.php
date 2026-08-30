<div class="p-2 p-md-3 bg-light">
    <!-- Card Scanner Box -->
    <div class="card border-0 shadow-sm rounded-3 mb-3 overflow-hidden">
        <div class="card-header bg-gradient-scan p-3 border-0 border-start border-4 border-primary">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="icon-scanner-wrapper me-2">
                        <i class="fas fa-barcode text-primary fs-1"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Scan Barcode / QR Code</h6>
                        <span class="fs--2 text-muted">Arahkan scanner atau ketik nomor inventaris lalu tekan Enter</span>
                    </div>
                </div>
                <span class="badge bg-soft-primary text-primary font-monospace fs--2 px-2.5 py-1 rounded-pill d-none d-sm-inline-block">
                    <i class="fas fa-ticket-alt me-1"></i>{{ $tiket }}
                </span>
            </div>
        </div>

        <div class="card-body p-3 p-md-4 bg-white">
            <form id="form-input-scan" onsubmit="return false;">
                <div class="row g-2 align-items-center">
                    <div class="col-12">
                        <label for="data_inventaris" class="form-label fw-bold text-700 fs--1 mb-1">
                            Nomor Inventaris <span class="text-danger">*</span>
                        </label>
                        <div class="input-group input-group-lg shadow-sm rounded-3 overflow-hidden border">
                            <span class="input-group-text bg-light border-0 text-primary px-3">
                                <i class="fas fa-qrcode fs-0"></i>
                            </span>
                            <input type="text"
                                class="form-control border-0 font-monospace fw-bold text-dark fs-0 shadow-none ps-2"
                                name="data_inventaris"
                                id="data_inventaris"
                                autofocus
                                placeholder="Scan barcode di sini..."
                                autocomplete="off"
                                onkeydown="caridata(event, this)">
                            <button class="btn btn-primary px-4 fw-bold fs--1" type="button" id="btn-submit-manual" onclick="triggerSearchManual()">
                                <i class="fas fa-search me-1"></i> Cari
                            </button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="tiket" id="tiket" value="{{ $tiket }}">
            </form>
        </div>
    </div>

    <!-- Target Container Result -->
    <div class="col-12" id="hasil-pencarian"></div>
</div>

<style>
    .bg-soft-primary {
        background-color: #e0edff;
    }

    .bg-gradient-scan {
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    .icon-scanner-wrapper {
        width: 38px;
        height: 38px;
        background: #e0edff;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<script>
    // Fungsi Pencarian via Enter (Barcode Hardware Scanner Compatible)
    function caridata(e, ele) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            e.preventDefault();
            executeSearch();
        }
    }

    // Trigger Manual untuk Tombol Cari
    function triggerSearchManual() {
        executeSearch();
    }

    // Core AJAX Execution
    function executeSearch() {
        var nama = $.trim($("#data_inventaris").val());
        var tiket = $("#tiket").val();

        if (nama === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Input Kosong',
                text: 'Harap scan barcode atau masukkan nomor inventaris terlebih dahulu!',
                confirmButtonColor: '#3085d6',
            });
            $("#data_inventaris").focus();
            return;
        }

        // Animated Loading State
        $('#hasil-pencarian').html(
            '<div class="card border-0 shadow-sm p-4 text-center my-3"><div class="spinner-border text-primary mx-auto mb-2" role="status"></div><span class="text-muted fs--1 fw-bold">Mencari Data Inventaris...</span></div>'
        );

        $.ajax({
                url: "{{ route('menu_stock_opname_scan_data_with_scanner') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "nama": nama,
                    "tiket": tiket,
                },
                dataType: 'html',
            })
            .done(function(data) {
                $("#data_inventaris").val("").focus(); // Reset & Refocus ke input agar siap scan barang berikutnya
                $('#hasil-pencarian').html(data);
            })
            .fail(function() {
                $('#hasil-pencarian').html(
                    '<div class="alert alert-danger text-center shadow-sm my-3"><i class="fas fa-exclamation-triangle me-1"></i> Terjadi kesalahan sistem. Silakan coba scan ulang.</div>'
                );
                $("#data_inventaris").select().focus();
            });
    }

    // Auto Refocus Field saat modal / halaman aktif
    $(document).ready(function() {
        setTimeout(function() {
            $('#data_inventaris').focus();
        }, 300);
    });
</script>
