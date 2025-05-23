

<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <h1>Daftar Pemesanan</h1>

    <a href="<?php echo e(route('barang.index')); ?>" class="btn btn-danger mb-3">Kembali ke Barang</a>

    <table class="table table-striped table-bordered table-success">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Detail</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pemesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($p->id); ?></td>
                    <td><?php echo e($p->tanggal->format('d-m-Y H:i')); ?></td>
                    <td>Rp <?php echo e(number_format($p->total,0,',','.')); ?></td>
                    <td>
                        <ul class="mb-0">
                            <?php $__currentLoopData = $p->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($d->barang->nama); ?> (x<?php echo e($d->qty); ?>) 
                                    – Rp<?php echo e(number_format($d->subtotal,0,',','.')); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                    <td>
                        <a href="<?php echo e(route('pemesanan.show', $p)); ?>" class="btn btn-danger btn-sm">
                            Cetak Nota
                        </a>
                        <form action="<?php echo e(route('pemesanan.destroy', $p)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus pemesanan #<?php echo e($p->id); ?>?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada pemesanan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kasirhp\resources\views/pemesanan/index.blade.php ENDPATH**/ ?>