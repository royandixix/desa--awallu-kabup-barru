<?php $__env->startSection('title', 'Daftar Foto Warga'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <a href="<?php echo e(route('admin.home.foto_warga.create')); ?>" class="btn btn-primary mb-3">
        Tambah Foto
    </a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td>
                    <img src="<?php echo e(asset($foto->gambar)); ?>" 
                         width="120" 
                         style="object-fit:cover; border-radius:4px;">
                </td>
                <td>
                    <a href="<?php echo e(route('admin.home.foto_warga.edit', $foto->id)); ?>" 
                       class="btn btn-warning btn-sm">
                       Edit
                    </a>

                    <form action="<?php echo e(route('admin.home.foto_warga.destroy', $foto->id)); ?>" 
                          method="POST" style="display:inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm" 
                                onclick="return confirm('Hapus foto ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="text-center text-muted">Belum ada foto</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/home/foto_warga/index.blade.php ENDPATH**/ ?>