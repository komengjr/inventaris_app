<div class="modal-body p-0">
    <div class="bg-300 rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="menu-data-barang-lokasi">
        <div class="card mb-3 border border-primary ">
            <div class="card-body py-2">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center">
                        <img class="ms-1 mx-3" src="<?php echo e(asset('img/brg.png')); ?>" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Data Barang</h6>
                            <h4 class="text-primary fw-bold mb-1"><?php echo e($lokasi->master_lokasi_name); ?> <span
                                    class="text-info fw-medium">No.<?php echo e($lokasi->nomor_ruangan); ?> </span></h4>
                        </div>
                        
                    </div>
                    <div class="col-xl-auto px-3 py-0">
                        <div class="row gx-2 align-items-center">
                            <div class="col-auto">
                                <form class="row gx-2 float-end" action="#">
                                    <div class="col-auto"><small class="text-primary">Print by: </small></div>
                                    <div class="col-auto">
                                        <select class="form-select form-select-sm text-primary" name="page"
                                            id="page" aria-label="Bulk actions">
                                            <option value="-">Pilih Option Prints</option>
                                            <?php
                                                $cetak = $data->count();
                                            ?>
                                            <?php for($i = 1; $i < 10; $i++): ?>
                                                <?php if($cetak < 0): ?>
                                                <?php else: ?>
                                                    <option value="<?php echo e($i); ?>">Page <?php echo e($i); ?>

                                                    </option>
                                                <?php endif; ?>
                                                <?php
                                                    $cetak = $cetak - 50;
                                                ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-falcon-primary btn-sm float-end"
                                            id="button-print-barcode-page" data-id="<?php echo e($id); ?>"><span
                                                class="fas fa-qrcode"></span> Print barcode</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-data-lokasi-barang">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%" border="1">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>ID Inventaris</th>
                        <th>Nomor Inventaris</th>
                        <th>Tanggal Pembelian</th>
                        <th>Merek / Type</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px;">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($datas->inventaris_data_file == ''): ?>
                                    <div class="avatar avatar-3xl">
                                        <img class="rounded-soft" src="<?php echo e(asset('no_pict.png')); ?>" alt="" />
                                    </div>
                                <?php else: ?>
                                    <div class="avatar avatar-3xl">
                                        <img class="rounded-soft" src="<?php echo e(asset($datas->inventaris_data_file)); ?>"
                                            alt="" />
                                    </div>
                                    
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($datas->inventaris_data_name); ?></td>
                            <td><?php echo e($datas->inventaris_data_code); ?></td>
                            <td><?php echo e($datas->inventaris_data_number); ?></td>
                            <td><?php echo e(date('d-m-Y', strtotime($datas->inventaris_data_tgl_beli))); ?></td>

                            <td>
                                <?php echo e($datas->inventaris_data_merk); ?> / <?php echo e($datas->inventaris_data_type); ?>

                            </td>

                            <td>Rp. <?php echo number_format($datas->inventaris_data_harga,0,',','.'); ?></td>
                            <td class="text-center">

                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                        <button class="dropdown-item" id="button-update-data-barang-lokasi"
                                            data-code="<?php echo e($datas->inventaris_data_code); ?>">
                                            <span class="far fa-address-card"></span> Detail & Edit
                                        </button>
                                        <button class="dropdown-item"
                                            onclick="window.open('<?php echo e(route('dashboard_data_lokasi_detail_barcode', ['id' => $datas->inventaris_data_code])); ?>', 'formpopup', 'width=400,height=400,resizeable,scrollbars'); this.target = 'formpopup';">
                                            <span class="fas fa-qrcode"></span> Print Barcode
                                        </button>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
<script src="<?php echo e(asset('vendors/glightbox/glightbox.min.js')); ?>"></script>
<?php /**PATH C:\laravel\inventaris_app\resources\views/application/dashboard/data/data-lokasi.blade.php ENDPATH**/ ?>