

<?php $__env->startSection('content'); ?>


<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<h1>Tambah Pemesanan</h1>

<form action="<?php echo e(route('pemesanan.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div id="barang-container">
        <?php
            $oldItemIds = old('item_id', [null]);
            $oldQtys = old('qty', [1]);
        ?>

        <?php $__currentLoopData = $oldItemIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $itemId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row mb-3 barang-row">
            <input type="hidden" name="tipe[]" value="barang">

            <div class="col-md-6">
                <select name="item_id[]" class="form-select <?php $__errorArgs = ["item_id.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="">Pilih Barang</option>
                    <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($barang->id); ?>" <?php echo e($itemId == $barang->id ? 'selected' : ''); ?>>
                            <?php echo e($barang->nama); ?> – Rp<?php echo e(number_format($barang->harga)); ?>

                            <?php if($barang->diskon): ?> (Diskon <?php echo e($barang->diskon); ?>%) <?php endif; ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ["item_id.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-3">
                <input type="number" name="qty[]" min="1"
                       value="<?php echo e($oldQtys[$i] ?? 1); ?>"
                       class="form-control <?php $__errorArgs = ["qty.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="Qty" required>
                <?php $__errorArgs = ["qty.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-3">
                <button type="button" class="btn btn-danger remove-row">Hapus</button>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <button type="button" id="add-barang" class="btn btn-danger mb-3">Tambah Barang</button><br>
    <button type="submit" class="btn btn-danger">Simpan Pemesanan</button>
    <a href="<?php echo e(route('barang.index')); ?>" class="btn btn-danger ms-2">Kembali</a>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.getElementById('add-barang').addEventListener('click', function () {
        const container = document.getElementById('barang-container');
        const rows = container.querySelectorAll('.barang-row');
        const lastIndex = rows.length;

        const first = container.querySelector('.barang-row');
        const clone = first.cloneNode(true);

        clone.querySelectorAll('select, input').forEach(el => {
            if (el.name.includes('item_id')) {
                el.name = 'item_id[]';
                el.selectedIndex = 0;
            } else if (el.name.includes('qty')) {
                el.name = 'qty[]';
                el.value = 1;
            }
            el.classList.remove('is-invalid');
        });

        container.appendChild(clone);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            const rows = document.querySelectorAll('.barang-row');
            if (rows.length > 1) {
                e.target.closest('.barang-row').remove();
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kasirhp\resources\views/pemesanan/create.blade.php ENDPATH**/ ?>