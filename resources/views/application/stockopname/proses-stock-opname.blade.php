<div class="modal-body p-0">
    <!-- Modal Header Header Gradient -->
    <div class="bg-gradient-primary text-white p-3 p-md-4 rounded-top-lg position-relative overflow-hidden">
        <div class="d-flex justify-content-between align-items-center position-relative z-index-1">
            <div>
                <span class="badge bg-white text-primary fw-bold mb-1 fs--2">PROSES SO INVENTARIS</span>
                <h4 class="text-white fw-bold mb-0">Tiket: {{ $id }}</h4>
                <p class="fs--2 mb-0 opacity-75"><i class="fas fa-building me-1"></i>{{ $cabang->nama_cabang ?? 'Cabang' }}</p>
            </div>
            <div class="d-none d-sm-block text-end">
                <span class="fs--2 opacity-75">Supported by</span>
                <div class="d-flex align-items-center gap-2 mt-1 bg-white p-1 rounded-2">
                    <img src="{{ asset('vendor/pramita.png') }}" alt="Pramita" height="25" />
                    <img src="{{ asset('vendor/sima.jpeg') }}" alt="Sima" height="25" />
                </div>
            </div>
        </div>
    </div>

    <div id="form-data-stock">
        <div class="p-3 p-md-4">
            <!-- Choice Mode Input Section (Button Only) -->
            <div class="card border border-primary shadow-sm rounded-4 mb-4 bg-white overflow-hidden">
                <!-- Header Title Section -->
                <div class="card-header bg-white border-0 pt-3 pb-0 px-3 px-md-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="icon-header-badge me-3">
                                <i class="fas fa-layer-group text-primary fs-0"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Metode Verifikasi Stock Opname</h6>
                                <span class="fs--2 text-muted">Pilih mode penginputan data barang</span>
                            </div>
                        </div>
                        <span class="badge bg-soft-primary text-primary rounded-pill font-monospace fs--2 px-2.5 py-1.5 d-none d-sm-inline-flex align-items-center">
                            <i class="fas fa-circle text-primary fs--2 me-1.5 animate-pulse"></i> Select Mode
                        </span>
                    </div>
                </div>

                <!-- Mode Action Buttons -->
                <div class="card-body p-3 p-md-4">
                    <div class="row g-2">
                        <!-- Button 1: Scanner Barcode Physical (Active Default State) -->
                        <div class="col-12 col-md-4">
                            <button class="btn btn-so-mode w-100 p-3 text-start rounded-3 d-flex align-items-center"
                                type="button"
                                id="button-stock-opname-scanner"
                                data-code="{{ $id }}">
                                <div class="btn-logo-icon bg-soft-primary text-primary me-3 rounded-3">
                                    <i class="fas fa-barcode fs-1"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <span class="fw-bold d-block text-dark fs--1 lh-sm">Scanner Barcode</span>
                                    <small class="text-muted d-block text-truncate fs--2">Alat scan / USB fisik</small>
                                </div>
                            </button>
                        </div>

                        <!-- Button 2: Kamera HP Device -->
                        <div class="col-12 col-md-4">
                            <button class="btn btn-so-mode w-100 p-3 text-start rounded-3 d-flex align-items-center"
                                type="button"
                                id="button-stock-opname-kamera"
                                data-code="{{ $id }}">
                                <div class="btn-logo-icon bg-soft-info text-info me-3 rounded-3">
                                    <i class="fas fa-camera-retro fs-1"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <span class="fw-bold d-block text-dark fs--1 lh-sm">Kamera Device</span>
                                    <small class="text-muted d-block text-truncate fs--2">Scan QR via HP / Smartphone</small>
                                </div>
                            </button>
                        </div>

                        <!-- Button 3: Checklist Manual -->
                        <div class="col-12 col-md-4">
                            <button class="btn btn-so-mode w-100 p-3 text-start rounded-3 d-flex align-items-center"
                                type="button"
                                id="button-stock-opname-manual"
                                data-code="{{ $id }}">
                                <div class="btn-logo-icon bg-soft-success text-success me-3 rounded-3">
                                    <i class="fas fa-tasks fs-1"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <span class="fw-bold d-block text-dark fs--1 lh-sm">Checklist Manual</span>
                                    <small class="text-muted d-block text-truncate fs--2">Input centang fisik manual</small>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                /* Background Soft Colors */
                .bg-soft-primary {
                    background-color: #e0edff;
                }

                .bg-soft-info {
                    background-color: #e0f7fa;
                }

                .bg-soft-success {
                    background-color: #d1e7dd;
                }

                /* Header Icon Badge */
                .icon-header-badge {
                    width: 36px;
                    height: 36px;
                    background: #f0f4f9;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                /* Custom Button Base Styling */
                .btn-so-mode {
                    /* background-color: #ffffff; */
                    border: 1px solid #e2e8f0 !important;
                    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
                    position: relative;
                }

                .btn-so-mode:hover {
                    border-color: #cbd5e1 !important;
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                }

                .btn-so-mode:focus {
                    box-shadow: none;
                }

                /* Active State Button Styling */
                .btn-so-mode.active {
                    /* background-color: #f8fafc; */
                    border-color: #0d6efd !important;
                    border-width: 2px !important;
                    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.12);
                }

                /* Button Logo Icon Styling */
                .btn-logo-icon {
                    width: 42px;
                    height: 42px;
                    min-width: 42px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                /* Pulse Indicator Animation */
                .animate-pulse {
                    animation: pulse 1.8s infinite;
                }

                @keyframes pulse {
                    0% {
                        opacity: 1;
                    }

                    50% {
                        opacity: 0.3;
                    }

                    100% {
                        opacity: 1;
                    }
                }
            </style>

            <script>
                $(document).ready(function() {
                    // Toggle class 'active' antar button saat diklik
                    $('.btn-so-mode').on('click', function() {
                        $('.btn-so-mode').removeClass('active');
                        $(this).addClass('active');
                    });
                });
            </script>

            <div id="view-report-stokopname-ruangan"></div>

            <!-- Tabel Monitoring Ruangan -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light border-bottom py-3">
                    <h6 class="mb-0 text-primary fw-bold"><i class="fas fa-door-open me-2"></i>Status Stock Opname Per Ruangan</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="exampledata" class="table table-hover align-middle mb-0 nowrap w-100">
                            <thead class="bg-200 text-800 fs--1">
                                <tr>
                                    <th class="text-center" style="width: 50px;">No</th>
                                    <th>Ruangan / Lokasi</th>
                                    <th class="text-center">Total Barang</th>
                                    <th>Rincian Kondisi Barang</th>
                                    <th class="text-center">Total Terverifikasi</th>
                                    <th class="text-center">Aksi / Status</th>
                                </tr>
                            </thead>
                            <tbody class="fs--1">
                                @php
                                $no = 1;
                                $grandTotalBarang = 0;
                                @endphp
                                @foreach ($no_ruangan as $item)
                                @php
                                if ($item->total_barang == 0) continue; // Skip jika tidak ada barang

                                $grandTotalBarang += $item->total_barang;
                                $totalVerifRuang = $item->count_baik + $item->count_maintenance + $item->count_rusak + $item->count_hilang;
                                $isComplete = ($item->total_barang == $totalVerifRuang);
                                @endphp
                                <tr>
                                    <td class="text-center fw-bold">{{ $no++ }}</td>
                                    <td>
                                        <div class="fw-bold text-900">{{ $item->nomor_ruangan }}</div>
                                        <div class="fs--2 text-500"><i class="fas fa-map-marker-alt text-danger me-1"></i>{{ $item->nama_lokasi }}</div>
                                    </td>
                                    <td class="text-center fw-bold fs-0">{{ $item->total_barang }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span class="badge bg-soft-success text-success border border-success fs--2" title="Baik">
                                                <i class="fas fa-check me-1"></i>Baik: {{ $item->count_baik }}
                                            </span>
                                            <span class="badge bg-soft-warning text-warning border border-warning fs--2" title="Maintenance">
                                                <i class="fas fa-tools me-1"></i>Maint: {{ $item->count_maintenance }}
                                            </span>
                                            <span class="badge bg-soft-danger text-danger border border-danger fs--2" title="Rusak">
                                                <i class="fas fa-times me-1"></i>Rusak: {{ $item->count_rusak }}
                                            </span>
                                            <span class="badge bg-soft-secondary text-secondary border border-secondary fs--2" title="Hilang">
                                                <i class="fas fa-question me-1"></i>Hilang: {{ $item->count_hilang }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <span class="{{ $isComplete ? 'text-success' : 'text-primary' }}">
                                            {{ $totalVerifRuang }} / {{ $item->total_barang }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if ($isComplete)
                                        <button class="btn btn-sm btn-success rounded-pill px-3 shadow-sm"
                                            id="button-print-stockopname-ruangan"
                                            data-code="{{ $id }}"
                                            data-lokasi="{{ $item->id_nomor_ruangan_cbaang }}">
                                            <i class="fa fa-print me-1"></i> Cetak PDF
                                        </button>
                                        @else
                                        <span class="badge bg-soft-danger text-danger border border-danger p-2"><i class="fas fa-hourglass-half me-1"></i>Belum Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Bottom Section Grid -->
            <div class="row g-3">
                <!-- Mutasi & Musnah Barang Card -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-light border-bottom py-3">
                            <h6 class="mb-0 text-primary fw-bold"><i class="fas fa-exclamation-circle me-2"></i>Barang Mutasi / Musnah (Status ≥ 4)</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="exampledetail" class="table table-striped align-middle mb-0 nowrap w-100">
                                    <thead class="bg-200 text-700 fs--2">
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>No. Inventaris</th>
                                            <th>Merek</th>
                                            <th class="text-end">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs--2">
                                        @forelse ($data as $datas)
                                        <tr>
                                            <td class="fw-bold">{{ $datas->inventaris_data_name }}</td>
                                            <td><span class="badge bg-light text-dark border">{{ $datas->inventaris_data_number }}</span></td>
                                            <td>{{ $datas->inventaris_data_merk }}</td>
                                            <td class="text-end fw-bold text-primary">@currency($datas->inventaris_data_harga)</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-3">Tidak ada barang mutasi/musnah.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Ringkasan Total & Actions -->
                <div class="col-lg-5">
                    @php
                    $tBaik = $summary->total_baik ?? 0;
                    $tMaint = $summary->total_maintenance ?? 0;
                    $tRusak = $summary->total_rusak ?? 0;
                    $tHilang = $summary->total_hilang ?? 0;
                    $tVerif = $tBaik + $tMaint + $tRusak + $tHilang;
                    $tBelumVerif = max(0, $grandTotalBarang - $tVerif);
                    $isAllVerified = ($grandTotalBarang > 0 && $tVerif == $grandTotalBarang);
                    @endphp

                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-light border-bottom py-3">
                            <h6 class="mb-0 text-primary fw-bold"><i class="fas fa-chart-pie me-2"></i>Ringkasan Total Stock Opname</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-2 text-center mb-3">
                                <div class="col-6">
                                    <div class="p-2 bg-soft-success rounded border border-success">
                                        <div class="fs--2 text-success fw-bold">Keadaan Baik</div>
                                        <h4 class="mb-0 fw-bold text-success">{{ $tBaik }}</h4>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 bg-soft-warning rounded border border-warning">
                                        <div class="fs--2 text-warning fw-bold">Maintenance</div>
                                        <h4 class="mb-0 fw-bold text-warning">{{ $tMaint }}</h4>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 bg-soft-danger rounded border border-danger">
                                        <div class="fs--2 text-danger fw-bold">Keadaan Rusak</div>
                                        <h4 class="mb-0 fw-bold text-danger">{{ $tRusak }}</h4>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 bg-soft-secondary rounded border border-secondary">
                                        <div class="fs--2 text-secondary fw-bold">Keadaan Hilang</div>
                                        <h4 class="mb-0 fw-bold text-secondary">{{ $tHilang }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded border mb-3">
                                <span class="fs--1 text-danger fw-bold"><i class="fas fa-exclamation-triangle me-1"></i>Belum Verifikasi:</span>
                                <h5 class="mb-0 text-danger fw-bold cursor-pointer" id="btn-show-data-belum-verif" data-id="{{ $cekdata->kode_verif }}">
                                    {{ $tBelumVerif }} <small class="fs--2 text-muted">Barang</small>
                                </h5>
                            </div>

                            <hr class="my-2">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold fs-0">Total Target Barang:</span>
                                <span class="fw-bold fs-1 text-primary">{{ $grandTotalBarang }}</span>
                            </div>

                            <div class="d-grid gap-2">
                                @if ($isAllVerified)
                                <span id="menu-button-penyelesaian-stockopname">
                                    <button class="btn btn-success w-100 py-2 fw-bold shadow-sm" id="button-penyelesaian-stockopname" data-code="{{ $cekdata->kode_verif }}">
                                        <i class="fa fa-check-circle me-1"></i> Penyelesaian & Simpan Data
                                    </button>
                                </span>
                                @else
                                <button class="btn btn-warning w-100 fw-bold mb-1" id="button-fix-data-stockopname" data-id="{{ $id }}">
                                    <i class="fa fa-sync me-1"></i> Fix Data Sync
                                </button>
                                <button class="btn btn-outline-danger w-100" disabled>
                                    <i class="fa fa-lock me-1"></i> Belum Dapat Diselesaikan
                                </button>
                                @endif
                            </div>

                            <p class="fs--2 text-muted text-center mt-3 mb-0">
                                Pastikan seluruh item di setiap ruangan sudah sesuai sebelum menyelesaikan Stock Opname.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #2c7be5 0%, #1a5bb8 100%);
    }

    .bg-soft-success {
        background-color: #e6f9f0;
    }

    .bg-soft-warning {
        background-color: #fff8ec;
    }

    .bg-soft-danger {
        background-color: #fde8e8;
    }

    .bg-soft-secondary {
        background-color: #f0f1f5;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>

<script>
    new DataTable('#exampledata', {
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50]
    });
    new DataTable('#exampledetail', {
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50]
    });
</script>
