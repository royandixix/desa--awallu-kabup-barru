<?php $__env->startSection('title', 'Galeri Desa Lawallu'); ?>


<?php $__env->startSection('header_galeri'); ?>
    <?php echo $__env->make('user.partials.header_galeri', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.page.galeri.gambar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/galeri/galeri.blade.php ENDPATH**/ ?>