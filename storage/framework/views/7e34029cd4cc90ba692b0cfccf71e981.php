

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Event Diskon</h1>

    <a href="<?php echo e(route('event.create')); ?>" class="btn btn-primary mb-3">Tambah Event Diskon</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Event</th>
                <th>Barang</th>
                <th>Diskon (%)</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($event->nama_event); ?></td>
                    <td><?php echo e($event->barang->nama); ?></td>
                    <td><?php echo e($event->diskon); ?></td>
                    <td><?php echo e($event->tanggal_mulai); ?></td>
                    <td><?php echo e($event->tanggal_selesai); ?></td>
                    <td>
                        <a href="<?php echo e(route('event.edit', $event->id)); ?>" class="btn btn-warning btn-sm">Edit</a>

                        <form action="<?php echo e(route('event.destroy', $event->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button onclick="return confirm('Yakin hapus event ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" class="text-center">Belum ada event diskon</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($events->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kasirhp\resources\views/event/index.blade.php ENDPATH**/ ?>