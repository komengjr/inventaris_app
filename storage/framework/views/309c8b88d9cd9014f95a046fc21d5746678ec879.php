
<?php $__env->startSection('base.css'); ?>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <script src="<?php echo e(asset('vendors/lottie/lottie.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/typed.js/typed.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="<?php echo e(asset('img/icon/icon.png')); ?>" alt="" width="50" />
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
                        <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Messages</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 g-3">
        <div class="col-xl-12">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 text-primary fw-bold">Data Menu</h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                                data-bs-target="#modal-menu" id="button-add-menu">
                                <span class="fas fa-book fs--2 me-1"></span>Add Menu</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-3">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700 fs--2">
                            <tr>
                                <th>No</th>
                                <th>Info Pesan</th>
                                
                                <th>Status Pesan</th>

                            </tr>
                        </thead>
                        <tbody class="fs--2">
                            <?php
                                $no = 1;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($datas->token_code); ?> <br>
                                        <?php if($datas->status == 0): ?>
                                            <span class="badge bg-danger">Belum Terkirim</span>
                                        <?php else: ?>
                                            <span class="badge bg-primary">Terkirim</span>
                                        <?php endif; ?>
                                        <br><?php echo e($datas->number); ?> <br> <?php echo e($datas->time); ?>

                                        <br>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-primary dropdown-toggle"
                                                id="btnGroupVerticalDrop2" type="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">Option<span
                                                    class="fas fa-align-left me-1"
                                                    data-fa-transform="shrink-3"></span></button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modal-master" id="button-replay-pesan"
                                                    data-code="<?php echo e($datas->token_code); ?>" data-id="<?php echo e($datas->id); ?>"><i class="fas fa-download"></i></span> Replay Pesan</button>
                                                
                                            </div>
                                        </div>
                                    </td>

                                    <td style="text-align: justify">
                                        <?php
                                            echo $datas->pesan;
                                        ?>
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
    <div class="modal fade" id="modal-menu" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-menu"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-master" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-master"></div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="<?php echo e(asset('vendors/echarts/echarts.min.js')); ?>"></script>


    
    <script>
        new DataTable('#example', {
            responsive: false
        });
    </script>
    <script>

        $(document).on("click", "#button-replay-pesan", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#menu-master').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "<?php echo e(route('masteradmin_messages_replay')); ?>",
                type: "POST",
                cache: false,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                location.reload();
            }).fail(function() {
                $('#menu-master').html('eror');
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\inventaris_app\resources\views/application/admin/mastermessage.blade.php ENDPATH**/ ?>