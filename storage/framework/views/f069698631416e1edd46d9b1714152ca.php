

<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    
    <div class="text-center mb-4">
        <h2 class="fw-bold">TOKO DURO</h2>
    </div>

    
    <?php if(session('success')): ?>
      <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
      <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <h1>Daftar Barang</h1>

    <div class="mb-3">
        <a href="<?php echo e(route('barang.create')); ?>" class="btn btn-danger">Tambah Barang</a>
        <a href="<?php echo e(route('pemesanan.create')); ?>" class="btn btn-danger ms-2">Beli</a>
        <a href="<?php echo e(route('pemesanan.index')); ?>" class="btn btn-danger ms-2">Riwayat</a>
    </div>

    <table class="table table-striped table-bordered table-success">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Diskon (%)</th>
                <th>Harga Setelah Diskon</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($barang->nama); ?></td>
                <td>Rp <?php echo e(number_format($barang->harga, 0, ',', '.')); ?></td>
                <td><?php echo e($barang->diskon ?? 0); ?>%</td>
                <td>
                    <?php
                        $hargaDiskon = $barang->harga - ($barang->harga * ($barang->diskon ?? 0) / 100);
                    ?>
                    Rp <?php echo e(number_format($hargaDiskon, 0, ',', '.')); ?>

                </td>
                <td><?php echo e($barang->stok); ?></td>
                <td>
                    <a href="<?php echo e(route('barang.edit', $barang)); ?>" class="btn btn-danger btn-sm">Edit</a>
                    <form action="<?php echo e(route('barang.destroy', $barang)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Hapus <?php echo e(addslashes($barang->nama)); ?>?')"
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada data barang</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kasirhp\resources\views/barang/index.blade.php ENDPATH**/ ?>