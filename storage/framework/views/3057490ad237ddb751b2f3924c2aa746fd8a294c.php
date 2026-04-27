
<?php $__env->startSection('base.css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="<?php echo e(asset('vendors/choices/choices.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="<?php echo e(asset('img/icon/wa.png')); ?>" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 pt-2">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div>
                        <img class="ms-n4 d-none d-lg-block "
                            src="<?php echo e(asset('asset/img/illustrations/crm-line-chart.png')); ?>" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Verifikasi WA</span>
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
                    <h5 class="mb-0">Master No Whatsapp</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                        data-bs-target="#modal-whatsapp-lg" id="button-add-no-whhatsapp">
                        <span class="far fa-user fs--2 me-1"></span>Tambah No Whatsapp</a>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-3">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Nama Whatsapp</th>
                        <th>No Whatsapp</th>
                        <th>Akses Whatsapp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($datas->wa_number_name); ?></td>
                            <td><?php echo e($datas->wa_number_no); ?></td>
                            <td><?php echo e($datas->wa_number_akses); ?></td>
                            <td>
                                <button class="btn btn-falcon-warning btn-sm" id="button-edit-data-verifikasi" data-code="<?php echo e($datas->wa_number_code); ?>" data-bs-toggle="modal" data-bs-target="#modal-whatsapp-lg"><span class="fas fa-edit"></span> Edit</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('base.js'); ?>
    <div class="modal fade" id="modal-whatsapp-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-whatsapp-lg"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="<?php echo e(asset('vendors/choices/choices.min.js')); ?>"></script>
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-add-no-whhatsapp", function(e) {
            e.preventDefault();
            $('#menu-whatsapp-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('master_no_whatsapp_add')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-whatsapp-lg').html(data);
            }).fail(function() {
                $('#menu-whatsapp-lg').html('eror');
            });
        });
        $(document).on("click", "#button-edit-data-verifikasi", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-whatsapp-lg').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('master_no_whatsapp_update')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-whatsapp-lg').html(data);
            }).fail(function() {
                $('#menu-whatsapp-lg').html('eror');
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\inventaris_app\resources\views/application/master-data/master-no-whatsapp.blade.php ENDPATH**/ ?>