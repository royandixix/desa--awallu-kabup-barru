<?php $__env->startSection('content'); ?>
<h3>Edit Foto Warga</h3>

<form action="<?php echo e(route('admin.home.foto_warga.update', $fotoWarga->id)); ?>" 
      method="POST" 
      enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label>Foto Baru</label>
        <input type="file" name="file" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
    </div>

    <div class="mb-3">
        <label>Foto Saat Ini</label><br>
        <img src="<?php echo e(asset($fotoWarga->gambar)); ?>" width="150" 
             style="object-fit:cover; border-radius:4px;">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/home/foto_warga/edit.blade.php ENDPATH**/ ?>