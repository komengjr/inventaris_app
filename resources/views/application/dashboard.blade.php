@extends('layouts.template')
@section('content')
<!-- Header Banner Utama -->
<div class="row mb-3">
    <div class="col">
        <div class="card bg-white shadow-sm border-0 rounded-4 overflow-hidden position-relative border-start border-primary border-4">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-lg-8 d-flex align-items-center mb-3 mb-lg-0">
                        <div class="bg-primary-subtle p-3 rounded-4 me-3 text-primary d-flex align-items-center justify-content-center" style="width: 65px; height: 65px;">
                            <img src="{{ asset('img/icon/icon.png') }}" alt="" class="img-fluid" />
                        </div>
                        <div>
                            <span class="badge bg-info-subtle text-info fw-semibold px-2 py-1 rounded-pill fs--2 mb-1">
                                <i class="fas fa-map-marker-alt me-1"></i> {{ $cabang->nama_cabang }}
                            </span>
                            <h3 class="fw-bold text-dark mb-0 fs-2">Inventaris <span class="text-primary">Management System</span></h3>
                            <p class="text-muted fs--2 mb-0 mt-1">Dashboard pusat panduan operasional, cara penggunaan, dan prosedur lengkap pengelolaan aset.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end border-start-lg ps-lg-4">
                        <span class="text-muted fs--2 d-block mb-2 fw-semibold text-uppercase tracking-wider">Supported By :</span>
                        <div class="d-flex align-items-center justify-content-lg-end gap-2">
                            <div class="bg-light p-2 rounded-3 border">
                                <img src="{{ asset('vendor/pramita.png') }}" alt="Pramita" width="85" class="img-fluid" />
                            </div>
                            <div class="bg-light p-2 rounded-3 border">
                                <img src="{{ asset('vendor/sima.jpeg') }}" alt="Sima" width="75" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dashboard Grid Card (Menu Utama) -->
<div class="row g-3 mb-4">

    <!-- Card 1: Peminjaman Barang -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-3 transition-hover cursor-pointer bg-white" data-bs-toggle="modal" data-bs-target="#modalPeminjaman">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="bg-primary-subtle text-primary rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 75px; height: 75px;">
                    <i class="fas fa-box-open fs-2"></i>
                </div>
                <span class="badge bg-primary bg-opacity-10 text-white fw-bold fs--2 mb-2 px-2 py-1">Modul Utama</span>
                <h5 class="fw-bold text-dark fs-2 mb-2">Peminjaman Barang</h5>
                <p class="text-muted fs--2 mb-3">Kelola siklus peminjaman, penerimaan cabang lain, & pengembalian.</p>
                <span class="btn btn-outline-primary btn-sm rounded-pill px-3 fs--2 fw-bold mt-auto">
                    <i class="fas fa-eye me-1"></i> Cara Penggunaan
                </span>
            </div>
        </div>
    </div>

    <!-- Card 2: Mutasi Antar Cabang -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-3 transition-hover cursor-pointer bg-white" data-bs-toggle="modal" data-bs-target="#modalMutasi">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="bg-info-subtle text-info rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 75px; height: 75px;">
                    <i class="fas fa-exchange-alt fs-2"></i>
                </div>
                <span class="badge bg-info bg-opacity-10 text-white fw-bold fs--2 mb-2 px-2 py-1">Modul Logistik</span>
                <h5 class="fw-bold text-dark fs-2 mb-2">Mutasi Antar Cabang</h5>
                <p class="text-muted fs--2 mb-3">Prosedur pengiriman, perpindahan, & validasi aset antar unit.</p>
                <span class="btn btn-outline-info btn-sm rounded-pill px-3 fs--2 fw-bold mt-auto">
                    <i class="fas fa-eye me-1"></i> Cara Penggunaan
                </span>
            </div>
        </div>
    </div>

    <!-- Card 3: Stock Opname -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-3 transition-hover cursor-pointer bg-white" data-bs-toggle="modal" data-bs-target="#modalOpname">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="bg-warning-subtle text-warning rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 75px; height: 75px;">
                    <i class="fas fa-clipboard-check fs-2"></i>
                </div>
                <span class="badge bg-warning bg-opacity-10 text-white text-dark fw-bold fs--2 mb-2 px-2 py-1">Modul SO</span>
                <h5 class="fw-bold text-dark fs-2 mb-2">Stock Opname</h5>
                <p class="text-muted fs--2 mb-3">Ketentuan audit fisik berkala untuk menjaga keakuratan aset.</p>
                <span class="btn btn-outline-warning text-dark btn-sm rounded-pill px-3 fs--2 fw-bold mt-auto">
                    <i class="fas fa-eye me-1"></i> Cara Penggunaan
                </span>
            </div>
        </div>
    </div>

    <!-- Card 4: Pemusnahan Barang -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-3 transition-hover cursor-pointer bg-white" data-bs-toggle="modal" data-bs-target="#modalPemusnahan">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <div class="bg-danger-subtle text-danger rounded-circle p-4 mb-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 75px; height: 75px;">
                    <i class="fas fa-trash-alt fs-2"></i>
                </div>
                <span class="badge bg-danger bg-opacity-10 text-white fw-bold fs--2 mb-2 px-2 py-1">Modul Penghapusan</span>
                <h5 class="fw-bold text-dark fs-2 mb-2">Pemusnahan Barang</h5>
                <p class="text-muted fs--2 mb-3">Prosedur resmi penghapusan aset rusak atau *expired*.</p>
                <span class="btn btn-outline-danger btn-sm rounded-pill px-3 fs--2 fw-bold mt-auto">
                    <i class="fas fa-eye me-1"></i> Cara Penggunaan
                </span>
            </div>
        </div>
    </div>

</div>


<!-- ========================================== -->
<!-- MODAL POPUP PENJELASAN & CARA PENGGUNAAN -->
<!-- ========================================== -->

<!-- 1. Modal Peminjaman Barang -->
<div class="modal fade" id="modalPeminjaman" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header bg-primary text-white p-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white text-primary rounded-circle p-2 me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">
                        <i class="fas fa-box-open fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 text-white fs-2">Cara Penggunaan Menu Peminjaman Barang</h5>
                        <p class="mb-0 text-white-50 fs--2">Panduan lengkap transaksi peminjaman hingga pengembalian aset.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light fs--2">
                <div class="bg-white p-3 rounded-3 shadow-sm mb-3">
                    <p class="fw-bold text-dark mb-2"><span class="badge bg-primary me-1 fs--2">A</span> Tambah Data Peminjaman :</p>
                    <ol class="ps-3 text-secondary mb-0" style="line-height: 1.8;">
                        <li>Pastikan semua form inputan data diisi dengan benar dan lengkap.</li>
                        <li>Setelah Nomor Peminjaman berhasil dibuat, lanjutkan dengan melengkapi daftar barang yang dipinjam.</li>
                        <li>Pilih opsi <strong>User Mengetahui</strong> untuk pihak penanggung jawab/atasan.</li>
                        <li>Klik tombol <button class="btn btn-primary btn-sm px-1 py-0 fw-bold fs--2" disabled>Verifikasi</button> untuk mengirim kode verifikasi ke penanggung jawab.</li>
                        <li>Masukkan kode verifikasi yang diterima ke dalam sistem untuk memvalidasi peminjaman.</li>
                    </ol>
                </div>
                <div class="bg-white p-3 rounded-3 shadow-sm mb-3">
                    <p class="fw-bold text-dark mb-2"><span class="badge bg-info text-dark me-1 fs--2">B</span> Terima Pinjaman Cabang Lain :</p>
                    <ol class="ps-3 text-secondary mb-0" style="line-height: 1.8;">
                        <li>Buka menu data order peminjaman untuk melihat daftar list order masuk.</li>
                        <li>Terima order tersebut dan lengkapi detail data penerimaan.</li>
                        <li>Pastikan user penerima telah dipilih sebelum konfirmasi terima barang.</li>
                    </ol>
                </div>
                <div class="bg-white p-3 rounded-3 shadow-sm">
                    <p class="fw-bold text-dark mb-2"><span class="badge bg-success me-1 fs--2">C</span> Proses Pengembalian Barang :</p>
                    <ol class="ps-3 text-secondary mb-0" style="line-height: 1.8;">
                        <li>Buka data order peminjaman aktif yang akan dikembalikan.</li>
                        <li>Lakukan pengecekan fisik barang dan lengkapi formulir pengembalian.</li>
                        <li>Pilih user penerima pengembalian dan selesaikan transaksi.</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer bg-white border-top-0 px-4 pb-4">
                <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4 fs--2" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- 2. Modal Mutasi Antar Cabang -->
<div class="modal fade" id="modalMutasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header bg-info text-white p-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white text-info rounded-circle p-2 me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">
                        <i class="fas fa-exchange-alt fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 text-white fs-2">Cara Penggunaan Menu Mutasi Antar Cabang</h5>
                        <p class="mb-0 text-white-50 fs--2">Panduan pengiriman dan validasi mutasi aset.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light fs--2">
                <div class="bg-white p-3 rounded-3 shadow-sm">
                    <p class="fw-bold text-dark mb-2"><span class="badge bg-info text-dark me-1 fs--2">A</span> Tambah Data Mutasi :</p>
                    <ol class="ps-3 text-secondary mb-0" style="line-height: 1.8;">
                        <li>Pastikan semua field inputan mutasi diisi dengan data yang benar.</li>
                        <li>Setelah Nomor Mutasi dibuat, tambahkan detail item barang yang akan dimutasikan.</li>
                        <li>Tentukan user penanggung jawab/mengetahui untuk validasi pengiriman.</li>
                        <li>Klik tombol <button class="btn btn-info btn-sm px-1 py-0 fw-bold fs--2 text-white" disabled>Verifikasi</button> untuk mengirim kode otorisasi.</li>
                        <li>Masukkan kode verifikasi yang diterima untuk meresmikan dokumen mutasi inventaris.</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer bg-white border-top-0 px-4 pb-4">
                <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4 fs--2" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- 3. Modal Stock Opname -->
<div class="modal fade" id="modalOpname" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header bg-warning text-dark p-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white text-warning rounded-circle p-2 me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">
                        <i class="fas fa-clipboard-check fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 fs-2">Cara Penggunaan Menu Stock Opname</h5>
                        <p class="mb-0 text-muted fs--2">Panduan lengkap audit fisik berkala aset inventaris cabang.</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light fs--2">
                <div class="bg-white p-3 rounded-3 shadow-sm">
                    <p class="fw-bold text-dark mb-2"><span class="badge bg-warning text-dark me-1 fs--2">Langkah-Langkah</span></p>
                    <ol class="ps-3 text-secondary mb-0" style="line-height: 1.8;">
                        <li>Membuat jadwal stock opname dari awal sampai akhir tanggal.</li>
                        <li>Ketika sudah dibuat, lakukan klik proses pada stock opname yang sudah dibuat.</li>
                        <li>Pilih salah satu metode cara untuk melakukan stock opname: ada scanner barcode, kamera, dan checklist manual.</li>
                        <li>Pastikan semua status ruangan sudah dilakukan verifikasi.</li>
                        <li>Jika semua ruangan sudah dilakukan checklist di bagian button, pastikan muncul penyelesaian pada data detail hasil stock opname.</li>
                        <li>Ketika sudah klik penyelesaian, akan muncul Berita Acara dan hasil verifikasinya.</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer bg-white border-top-0 px-4 pb-4">
                <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4 fs--2" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- 4. Modal Pemusnahan Barang -->
<div class="modal fade" id="modalPemusnahan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header bg-danger text-white p-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white text-danger rounded-circle p-2 me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">
                        <i class="fas fa-trash-alt fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 text-white fs-2">Cara Penggunaan Menu Pemusnahan Barang</h5>
                        <p class="mb-0 text-white-50 fs--2">Prosedur resmi penghapusan aset rusak atau expired.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light fs--2">
                <div class="bg-white p-3 rounded-3 shadow-sm">
                    <p class="fw-bold text-dark mb-2"><span class="badge bg-danger me-1 fs--2">A</span> Tambah Data Pemusnahan :</p>
                    <ol class="ps-3 text-secondary mb-0" style="line-height: 1.8;">
                        <li>Pastikan data barang rusak/expired yang akan dimusnahkan telah diinput dengan benar.</li>
                        <li>Lengkapi dokumen pendukung atau Berita Acara Pemeriksaan (BAP) barang terkait.</li>
                        <li>Pilih pejabat atau user yang mengetahui proses pemusnahan aset.</li>
                        <li>Klik tombol <button class="btn btn-danger btn-sm px-1 py-0 fw-bold fs--2" disabled>Verifikasi</button> untuk pengiriman kode persetujuan.</li>
                        <li>Masukkan kode verifikasi sah dari pihak berwenang untuk mengeksekusi penghapusan data inventaris dari sistem.</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer bg-white border-top-0 px-4 pb-4">
                <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4 fs--2" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Tambahan Style CSS Pendukung Efek Hover & Cursor -->
<style>
    .transition-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>
@endsection
