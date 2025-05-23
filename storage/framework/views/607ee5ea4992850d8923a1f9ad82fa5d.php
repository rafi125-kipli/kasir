

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Nota Pemesanan #<?php echo e($pemesanan->id); ?></h2>
    <p>Tanggal: <?php echo e($pemesanan->tanggal->format('d-m-Y H:i')); ?></p>

    <table class="table table-bordered table-success">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pemesanan->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($detail->barang->nama); ?></td>
                <td><?php echo e($detail->qty); ?></td>
                <td>Rp <?php echo e(number_format($detail->harga, 0, ',', '.')); ?></td>
                <td>Rp <?php echo e(number_format($detail->subtotal, 0, ',', '.')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <h4>Total: Rp <?php echo e(number_format($pemesanan->total, 0, ',', '.')); ?></h4>

    <a href="<?php echo e(route('pemesanan.index')); ?>" class="btn btn-danger">Kembali</a>
    <button onclick="window.print()" class="btn btn-danger">Cetak</button>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kasirhp\resources\views/pemesanan/show.blade.php ENDPATH**/ ?>