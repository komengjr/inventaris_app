
<?php $__env->startSection('base.css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="<?php echo e(asset('vendors/choices/choices.min.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('vendors/lottie/lottie.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/typed.js/typed.js')); ?>"></script>
    <style>
        #button-pick-request {
            cursor: pointer;
        }

        #button-pick-request:hover {
            background: rgb(223, 217, 25);
        }
        #button-terima-order-barang-peminjaman:hover {
            background: rgb(223, 217, 25);
            cursor: pointer;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="<?php echo e(asset('img/peminjaman.png')); ?>" alt="" width="60" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="<?php echo e(asset('asset/img/illustrations/crm-line-chart.png')); ?>" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Peminjaman <span
                                class="text-info fw-medium">Cabang</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Informasi Peminjaman</h5>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-falcon-primary" id="btnGroupVerticalDrop2" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Menu
                            Peminjaman</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman-xl"
                                id="button-add-peminjaman"><span class="fas fa-folder-plus"></span>
                                Tambah Peminjaman</button>
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-peminjaman"
                                id="button-add-request-peminjaman"><span class="far fa-share-square"></span>
                                Request Peminjaman Cabang</button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                data-bs-target="#modal-peminjaman" id="button-data-order-peminjaman"><span
                                    class="far fa-bell"></span>
                                Data Order Peminjaman</button>
                            <button class="dropdown-item text-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-peminjaman" id="button-data-rekap-peminjaman"><span
                                    class="far fa-file-alt"></span>
                                Data Rekap Peminjaman</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-light border-top pb-0">
            <div class="row">
                
                <?php if($req->isEmpty() && $order->isEmpty()): ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Halo <?php echo e(Auth::user()->name); ?> !</strong> You should check in on some of those fields
                            below.
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class=" col-md-4">
                        <div class="alert alert-success border-2 d-flex align-items-center" id="button-terima-order-barang-peminjaman"
                            data-bs-toggle="modal" data-bs-target="#modal-peminjaman-xl"
                            data-code="<?php echo e($orders->id_pinjam); ?>" role="alert">
                            <div class="bg-dark me-3 icon-item">
                                <span class="fas fa-mail-bulk text-white fs-1"></span>
                            </div>
                            <p class="mb-0 flex-1 fs--1">Ada Kiriman Barang dengan Tiket : <?php echo e($orders->tiket_peminjaman); ?>

                                dari Cabang <?php echo e($orders->nama_cabang); ?>

                            </p>
                            
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class=" col-md-4">
                        <div class="alert alert-primary border-2 d-flex align-items-center" id="button-pick-request"
                            data-bs-toggle="modal" data-bs-target="#modal-peminjaman-xl" data-code="<?php echo e($reqs->tiket_req); ?>"
                            role="alert">
                            <div class="bg-dark me-3 icon-item">
                                <span class="fas fa-mail-bulk text-white fs-1"></span>
                            </div>
                            <p class="mb-0 flex-1 fs--1">Ada Request dengan Tiket : <?php echo e($reqs->tiket_req); ?>

                                dari Cabang : <?php echo e($reqs->nama_cabang); ?>

                            </p>
                            
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="card-footer border-top text-end">
            <button class="btn btn-falcon-info btn-sm" href="#!"data-bs-toggle="modal"
                data-bs-target="#modal-peminjaman" id="button-data-rekap-peminjaman"><span class="fas fa-credit-card"></span> Rekap
                Peminjaman Cabang</button>
        </div>
    </div>
    <div class="row mb-3 g-3">
        <div class="col-xl-12">
            
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 text-white fw-bold">Data Peminjaman</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-2">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700 fs--2">
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Kebutuhan</th>
                                <th>Penanggung Jawab</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Status Peminjaman</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="fs--2">
                            <?php
                                $no = 1;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td>
                                        <?php echo e($datas->tiket_peminjaman); ?><br>
                                        <?php if($datas->kd_cabang == $datas->tujuan_cabang): ?>
                                            <span class="badge bg-primary">Antar Divisi</span> <br>
                                        <?php else: ?>
                                            <span class="badge bg-warning">Antar Cabang</span> <br>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($datas->nama_kegiatan); ?></td>
                                    <td>
                                        <?php
                                            $staff = DB::table('tbl_staff')
                                                ->where('id_staff', '=', $datas->pj_pinjam)
                                                ->first();
                                        ?>
                                        <?php if($staff): ?>
                                            <?php echo e($staff->nama_staff); ?>

                                        <?php else: ?>
                                            <span class="badge bg-danger">Staff Tidak diTemukan</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($datas->tgl_pinjam); ?> <br> Sampai <br> <?php echo e($datas->batas_tgl_pinjam); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php if($datas->status_pinjam == 0): ?>
                                            <span class="badge bg-danger m-2">Not Verifed</span>
                                        <?php elseif($datas->status_pinjam == 1): ?>
                                            <span class="badge bg-warning m-2">Verifikasi</span>
                                        <?php elseif($datas->status_pinjam == 2): ?>
                                            <?php if($datas->kd_cabang == $datas->tujuan_cabang): ?>
                                                <span class="badge bg-info m-2">Proses Peminjaman</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning m-2">Menunggu Cabang Menerima</span>
                                            <?php endif; ?>
                                        <?php elseif($datas->status_pinjam == 3): ?>
                                            <span class="badge bg-primary m-2">Menunngu Kembali</span>
                                        <?php elseif($datas->status_pinjam == 4): ?>
                                            <span class="badge bg-success m-2">Done</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-primary dropdown-toggle"
                                                id="btnGroupVerticalDrop2" type="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-align-left me-1"
                                                    data-fa-transform="shrink-3"></span>Option</button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                                <?php if($datas->status_pinjam == 0): ?>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-proses-peminjaman-cabang"
                                                        data-code="<?php echo e($datas->tiket_peminjaman); ?>"><span
                                                            class="far fa-edit"></span>
                                                        Lengkapi Data Peminjaman</button>
                                                <?php elseif($datas->status_pinjam == 1): ?>
                                                    <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-verifikasi-peminjaman-cabang"
                                                        data-code="<?php echo e($datas->tiket_peminjaman); ?>"><span
                                                            class="fas fa-file-signature"></span>
                                                        Verifikasi Data Peminjaman</button>
                                                <?php elseif($datas->status_pinjam == 2): ?>
                                                    
                                                <?php elseif($datas->status_pinjam == 3): ?>
                                                    <button class="dropdown-item text-info" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-proses-verifikasi-peminjaman-cabang"
                                                        data-code="<?php echo e($datas->tiket_peminjaman); ?>"><span
                                                            class="fas fa-file-signature"></span>
                                                        Proses Data Peminjaman</button>
                                                <?php elseif($datas->status_pinjam == 4): ?>
                                                    <button class="dropdown-item text-success" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman-xl"
                                                        id="button-report-data-peminjaman-barang"
                                                        data-code="<?php echo e($datas->tiket_peminjaman); ?>"><span
                                                            class="fas fa-print"></span>
                                                        Print Form Peminjaman</button>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('base.js'); ?>
    <div class="modal fade" id="modal-peminjaman" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 95%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-peminjaman"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-peminjaman-xl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-peminjaman-xl"></div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="<?php echo e(asset('vendors/echarts/echarts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/choices/choices.min.js')); ?>"></script>

    
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-add-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_add')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman-xl').html(data);
            }).fail(function() {
                $('#menu-peminjaman-xl').html('eror');
            });
        });
        $(document).on("click", "#button-add-request-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_request_peminjaman_cabang')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-pilih-data-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var no = $(this).data("no");
            $('#table-fix-req-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_request_pilih_data_cabang_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                    "no": no,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian-barang-cabang').html('');
                $('#table-fix-req-peminjaman').html(data);
            }).fail(function() {
                $('#table-fix-req-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-remove-barang-req-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var no = $(this).data("no");
            $('#table-fix-req-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_request_remove_barang_cabang_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                    "no": no,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian-barang-cabang').html('');
                $('#table-fix-req-peminjaman').html(data);
            }).fail(function() {
                $('#table-fix-req-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-data-order-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_data_order')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-data-rekap-peminjaman", function(e) {
            e.preventDefault();
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_data_rekap')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-terima-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-terima-order-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_terima_data_order')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-terima-order-peminjaman').html(data);
            }).fail(function() {
                $('#menu-terima-order-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-terima-order-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_terima_data_order_cabang')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman-xl').html(data);
            }).fail(function() {
                $('#menu-peminjaman-xl').html('eror');
            });
        });
        $(document).on("click", "#button-cetak-rekap-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-print-rekap-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('print_report_data_peminjaman_show')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-print-rekap-peminjaman').html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#menu-print-rekap-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-terima-barang-satuan-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-table-pilih-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_terima_data_barang')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#mmenu-table-pilih-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-verifikasi-penerimaan-barang-pinjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var penerima = document.getElementById("penerima").value;
            var deskripsi = document.getElementById("deskripsi").value;
            if (penerima == '') {
                alert('penerima wajib diisi');
            } else {
                $('#menu-verifikasi-data-peminjaman').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "<?php echo e(route('verifikasi_peminjaman_terima_data_barang')); ?>",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "code": code,
                        "penerima": penerima,
                        "deskripsi": deskripsi,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    if (data == 0) {
                        alert('Barang ada yang belum di terima');
                        location.reload();
                    } else {
                        location.reload();
                    }
                }).fail(function() {
                    $('#menu-verifikasi-data-peminjaman').html('eror');
                });
            }
        });
        $(document).on("click", "#button-proses-peminjaman-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_proses')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-verifikasi-peminjaman-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_data_verifikasi')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-proses-verifikasi-data-user", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var token = document.getElementById("token").value;
            $('#menu-verifikasi-data-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_data_verifikasi_user')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                    "token": token,
                },
                dataType: 'html',
            }).done(function(data) {
                if (data == 0) {
                    alert('kode verifikasi Salah')
                    location.reload();
                } else {
                    location.reload();
                }
            }).fail(function() {
                $('#menu-verifikasi-data-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-proses-verifikasi-peminjaman-cabang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_proses_verifikasi')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman').html(data);
            }).fail(function() {
                $('#menu-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-pilih-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#menu-table-pilih-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_pilih_data')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian-barang').html("");
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#menu-table-pilih-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-batal-data-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#menu-table-pilih-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_batal_pilih_data')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#menu-table-pilih-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-verifikasi-data-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var mengetahui = document.getElementById("mengetahui").value;
            if (mengetahui == '') {
                alert('Mohon di Pilih Yang mengetahui')
            } else {
                $('#menu-verifikasi-data-peminjaman').html(
                    '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "<?php echo e(route('verifikasi_data_peminjaman')); ?>",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "code": code,
                        "mengetahui": mengetahui,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    if (data == 1) {
                        location.reload();
                    } else {
                        alert('Data Barang Peminjaman Masih Kosong');
                        location.reload();
                    }
                }).fail(function() {
                    $('#menu-verifikasi-data-peminjaman').html('eror');
                });
            }
        });
        $(document).on("click", "#button-proses-check-barang-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-check-barang-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            console.log(code);

            $.ajax({
                url: "<?php echo e(route('proses_check_data_barang_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-check-barang-peminjaman').html(data);
            }).fail(function() {
                $('#menu-check-barang-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-proses-verifikasi-data-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-verifikasi-data-peminjaman').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('proses_verifikasi_data_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                if (data == '1') {
                    location.reload();
                } else {
                    alert('Pastikasn Semua Barang Sudah Kembali');
                    location.reload();
                }
            }).fail(function() {
                $('#menu-verifikasi-data-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-proses-save-verifikasi-data-peminjaman", function(e) {
            e.preventDefault();
            var data = $("#form-check-data-peminjaman").serialize();
            $('#menu-check-barang-peminjaman').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('proses_save_check_data_barang_peminjaman')); ?>",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                cache: false,
                data: data,
                dataType: 'html',
            }).done(function(data) {
                $('#menu-check-barang-peminjaman').html('');
                $('#menu-table-pilih-peminjaman').html(data);
            }).fail(function() {
                $('#menu-check-barang-peminjaman').html('eror');
            });

        });
        $(document).on("click", "#button-report-data-peminjaman-barang", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('print_report_data_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman-xl').html(data);
            }).fail(function() {
                $('#menu-peminjaman-xl').html('eror');
            });

        });
    </script>
    <script>
        $(document).on("click", "#button-pick-request", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-peminjaman-xl').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_request_take_request_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-peminjaman-xl').html(data);
            }).fail(function() {
                $('#menu-peminjaman-xl').html('eror');
            });
        });
        $(document).on("click", "#button-reject-request-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-verifikasi-request-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_request_reject_request_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-verifikasi-request-peminjaman').html(data);
                location.reload();
            }).fail(function() {
                $('#menu-verifikasi-request-peminjaman').html('eror');
            });
        });
        $(document).on("click", "#button-accept-request-peminjaman", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var user = document.getElementById("penanggung_jawab").value;
            var deskripsi = document.getElementById("keterangan_peminjaman").value;
            var mengetahui = document.getElementById("mengetahui").value;
            $('#menu-verifikasi-request-peminjaman').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('peminjaman_request_accept_request_peminjaman')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                    "user": user,
                    "deskripsi": deskripsi,
                    "mengetahui": mengetahui,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-verifikasi-request-peminjaman').html(data);
                location.reload();
            }).fail(function() {
                $('#menu-verifikasi-request-peminjaman').html('eror');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\inventaris_app\resources\views/application/peminjaman/menupeminjaman.blade.php ENDPATH**/ ?>