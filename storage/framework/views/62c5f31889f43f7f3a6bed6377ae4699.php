<?php $__env->startSection('title', 'Transparansi Desa Lawallu'); ?>

<?php $__env->startSection('header_transparansi'); ?>
    <?php echo $__env->make('user.partials.header_transparansi', ['halaman' => $halaman ?? 'default'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($halaman === 'anggaran'): ?>
        
        <?php echo $__env->make('user.page.transparansi.anggaran', ['anggarans' => $anggarans], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'bumdes'): ?>
        <?php echo $__env->make('user.page.transparansi.bumdes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'dokumen'): ?>
        <?php echo $__env->make('user.page.transparansi.dokumen', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'laporan'): ?>
        <?php echo $__env->make('user.page.transparansi.laporan', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php else: ?>
        
        <?php echo $__env->make('user.page.transparansi.anggaran', ['anggarans' => $anggarans], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.transparansi.bumdes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.transparansi.dokumen', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.transparansi.laporan', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/transparansi/transparansi.blade.php ENDPATH**/ ?>