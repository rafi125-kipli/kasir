

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Edit Pemesanan</h2>

    <form action="<?php echo e(route('pemesanan.update', $pemesanan->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="barang_id" class="btn btn-primary mb-3">Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-select">
                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($barang->id); ?>" <?php echo e($pemesanan->barang_id == $barang->id ? 'selected' : ''); ?>>
                        <?php echo e($barang->nama); ?> - Rp <?php echo e(number_format($barang->harga)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['barang_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?php echo e(old('jumlah', $pemesanan->jumlah)); ?>" min="1">
            <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pending" <?php echo e($pemesanan->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="selesai" <?php echo e($pemesanan->status == 'selesai' ? 'selected' : ''); ?>>Selesai</option>
                <option value="batal" <?php echo e($pemesanan->status == 'batal' ? 'selected' : ''); ?>>Batal</option>
            </select>
            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Update</button>
        <a href="<?php echo e(route('pemesanan.index')); ?>" class="btn btn-primary mb-3">Batal</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kasirhp\resources\views/pemesanan/edit.blade.php ENDPATH**/ ?>