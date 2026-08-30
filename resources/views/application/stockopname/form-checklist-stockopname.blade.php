<div class="modal-body py-3 p-md-4 bg-light">
    <!-- Indicator Header -->
    <div class="d-flex justify-content-between align-items-center mb-3 p-3 bg-white rounded-3 shadow-sm border-start border-4 border-primary">
        <div>
            <h6 class="fw-bold mb-0 text-primary"><i class="fas fa-tasks me-2"></i>Checklist Verifikasi Fisik</h6>
            <span class="fs--2 text-muted">Selesaikan verifikasi barang yang tersedia pada daftar berikut</span>
        </div>
        <span class="badge bg-soft-primary text-primary fs-0 fw-bold px-3 py-2 rounded-pill">
            {{ count($data) }} Sisa Barang
        </span>
    </div>

    @if(!$data->isEmpty())
    <!-- Search Bar Input Box -->
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body p-2">
            <div class="input-group">
                <span class="input-group-text bg-white border-0 text-primary"><i class="fas fa-search"></i></span>
                <input type="text" id="input-search-checklist" class="form-control border-0 shadow-none ps-0" placeholder="Cari berdasarkan nama barang atau nomor inventaris..." autocomplete="off">
                <button class="btn btn-outline-secondary border-0 d-none" type="button" id="btn-clear-search"><i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>
    @endif

    @if($data->isEmpty())
    <div class="card border-0 shadow-sm text-center p-4 my-3">
        <div class="card-body">
            <i class="fas fa-check-circle text-success fa-3x mb-3"></i>
            <h5 class="fw-bold">Semua Barang Telah Diverifikasi!</h5>
            <p class="text-muted fs--1 mb-0">Tidak ada barang tersisa di ruangan ini untuk tiket verifikasi saat ini.</p>
        </div>
    </div>
    @else
    <!-- Alert Jika Hasil Pencarian Tidak Ditemukan -->
    <div id="no-search-result" class="card border-0 shadow-sm text-center p-4 my-3 d-none">
        <div class="card-body">
            <i class="fas fa-search-minus text-warning fa-3x mb-3"></i>
            <h6 class="fw-bold mb-1">Barang Tidak Ditemukan</h6>
            <p class="text-muted fs--2 mb-0">Tidak ada barang yang cocok dengan kata kunci pencarian Anda.</p>
        </div>
    </div>

    <!-- Grid list barang dalam bentuk Card UI Berwarna -->
    <div class="row g-3" id="checklist-card-container">
        @foreach ($data as $datas)
        <div class="col-12 col-md-6 item-card-wrapper"
            id="card-item-{{ $datas->id_inventaris_data }}"
            data-name="{{ strtolower($datas->inventaris_data_name) }}"
            data-number="{{ strtolower($datas->inventaris_data_number) }}">

            <div class="card border-0 shadow-sm rounded-3 h-100 position-relative overflow-hidden card-item-accent" id="card-border-{{ $datas->id_inventaris_data }}">

                <!-- Header Card (Responsif Mobile Layout) -->
                <div class="card-header bg-gradient-item p-3 border-0">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2">

                        <!-- Nama Barang & Ikon -->
                        <div class="d-flex align-items-center me-2">
                            <div class="icon-box-item me-2 flex-shrink-0" id="icon-box-{{ $datas->id_inventaris_data }}">
                                <i class="fas fa-box text-primary fs-0"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0 search-target-name text-break" title="{{ $datas->inventaris_data_name }}">
                                {{ $datas->inventaris_data_name }}
                            </h6>
                        </div>

                        <!-- Badge Nomor Inventaris (Turun di Mobile) -->
                        <div class="ms-4 ms-sm-0">
                            <span class="badge bg-primary text-white border-0 fs--2 font-monospace px-2.5 py-1 rounded-pill shadow-sm search-target-number">
                                <i class="fas fa-barcode me-1"></i>{{ $datas->inventaris_data_number }}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="card-body p-3 pt-0 d-flex flex-column justify-content-between">
                    <!-- Detail Info Barang -->
                    <div class="mb-3">
                        <div class="fs--2 text-muted bg-light p-2 rounded-2 d-flex align-items-center justify-content-between">
                            <span><i class="fas fa-tag text-info me-1"></i><strong>Merek:</strong> {{ $datas->inventaris_data_merk ?? 'Tidak Ada' }}</span>
                            <span class="badge bg-soft-info text-info"><i class="fas fa-cubes me-1"></i>Aktif</span>
                        </div>
                    </div>

                    <!-- Form Checklist Action -->
                    <form id="form-verif-{{ $datas->id_inventaris_data }}" class="bg-white p-2.5 rounded-3">
                        <div class="row g-2">
                            <div class="col-12 col-sm-5">
                                <label class="form-label fs--2 fw-bold text-700 mb-1">Status Kondisi</label>
                                <select class="form-select form-select-sm fw-bold select-status"
                                    id="answer{{ $datas->id_inventaris_data }}"
                                    name="answer"
                                    data-id="{{ $datas->id_inventaris_data }}">
                                    <option value="">-- Pilih --</option>
                                    <option value="0" class="text-success">🟢 BAIK</option>
                                    <option value="1" class="text-warning">🟡 MAINTENANCE</option>
                                    <option value="2" class="text-danger">🔴 RUSAK</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-7">
                                <label class="form-label fs--2 fw-bold text-700 mb-1">Catatan / Deskripsi</label>
                                <input type="text"
                                    class="form-control form-control-sm"
                                    id="desk{{ $datas->id_inventaris_data }}"
                                    placeholder="Ketik catatan..." />
                            </div>

                            <div class="col-12 mt-2">
                                <button class="btn btn-primary btn-sm w-100 fw-bold btn-submit-verif shadow-sm"
                                    type="button"
                                    data-id="{{ $datas->id_inventaris_data }}"
                                    data-code="{{ $datas->inventaris_data_code }}">
                                    <i class="fas fa-check-circle me-1"></i> Verifikasi Barang
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<style>
    .bg-soft-primary {
        background-color: #e0edff;
    }

    .bg-soft-info {
        background-color: #e0f7fa;
    }

    /* Styling Card & Accent Border */
    .card-item-accent {
        border-left: 4px solid #2c7be5 !important;
        transition: all 0.25s ease-in-out;
    }

    .card-item-accent:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.12) !important;
    }

    .bg-gradient-item {
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    .icon-box-item {
        width: 32px;
        height: 32px;
        background: #e0edff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    /* Dinamis Border Color saat Kondisi Dipilih */
    .border-status-baik {
        border-left: 5px solid #00d27a !important;
    }

    .border-status-maint {
        border-left: 5px solid #f5803e !important;
    }

    .border-status-rusak {
        border-left: 5px solid #e63757 !important;
    }
</style>

<script>
    // Ubah Warna Border & Ikon Secara Real-Time saat Select Option Dipilih
    $(document).off('change', '.select-status').on('change', '.select-status', function() {
        const id = $(this).data('id');
        const val = $(this).val();
        const cardElem = $('#card-border-' + id);
        const iconBox = $('#icon-box-' + id);

        // Reset class
        cardElem.removeClass('border-status-baik border-status-maint border-status-rusak');

        if (val === "0") { // Baik
            cardElem.addClass('border-status-baik');
            iconBox.html('<i class="fas fa-check-circle text-success fs-0"></i>').css('background', '#e6f9f0');
        } else if (val === "1") { // Maintenance
            cardElem.addClass('border-status-maint');
            iconBox.html('<i class="fas fa-tools text-warning fs-0"></i>').css('background', '#fff8ec');
        } else if (val === "2") { // Rusak
            cardElem.addClass('border-status-rusak');
            iconBox.html('<i class="fas fa-times-circle text-danger fs-0"></i>').css('background', '#fde8e8');
        } else {
            iconBox.html('<i class="fas fa-box text-primary fs-0"></i>').css('background', '#e0edff');
        }
    });

    // Real-Time Client Side Search Filter
    $(document).off('keyup change input', '#input-search-checklist').on('keyup change input', '#input-search-checklist', function() {
        const value = $(this).val().toLowerCase().trim();
        let visibleCount = 0;

        if (value.length > 0) {
            $('#btn-clear-search').removeClass('d-none');
        } else {
            $('#btn-clear-search').addClass('d-none');
        }

        $('.item-card-wrapper').each(function() {
            const name = $(this).data('name').toString();
            const number = $(this).data('number').toString();

            if (name.includes(value) || number.includes(value)) {
                $(this).removeClass('d-none');
                visibleCount++;
            } else {
                $(this).addClass('d-none');
            }
        });

        if (visibleCount === 0 && value.length > 0) {
            $('#no-search-result').removeClass('d-none');
        } else {
            $('#no-search-result').addClass('d-none');
        }
    });

    // Reset Search Input Button
    $(document).off('click', '#btn-clear-search').on('click', '#btn-clear-search', function() {
        $('#input-search-checklist').val('').trigger('keyup').focus();
    });

    // Single Global JavaScript Listener untuk Simpan Verifikasi
    $(document).off('click', '.btn-submit-verif').on('click', '.btn-submit-verif', function(e) {
        e.preventDefault();

        const itemDbId = $(this).data('id');
        const inventarisCode = $(this).data('code');
        const answer = $("#answer" + itemDbId).val();
        const desk = $("#desk" + itemDbId).val();

        if (answer === "" || desk.trim() === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Data Belum Lengkap',
                text: 'Harap pilih Status Kondisi dan isi Catatan/Deskripsi barang!',
                confirmButtonColor: '#3085d6',
            });
            return;
        }

        $('#hasil-pencarian').html(
            '<div class="text-center my-4"><div class="spinner-border text-primary" role="status"></div><p class="mt-2 text-muted fs--1">Menyimpan data verifikasi...</p></div>'
        );

        $.ajax({
            url: "{{ route('menu_stock_opname_proses_data_with_checklist_lokasi_save') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": "{{ $code }}",
                "tiket": "{{ $tiket }}",
                "id": inventarisCode,
                'answer': answer,
                'desk': desk,
            },
            dataType: 'html',
        }).done(function(data) {
            $('#hasil-pencarian').html(data);
        }).fail(function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan',
                text: 'Terjadi kesalahan sistem saat menyimpan data.',
            });
        });
    });
</script>
