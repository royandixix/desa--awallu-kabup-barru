<?php $__env->startSection('title', 'Struktur Desa Lawallu'); ?>

<?php $__env->startSection('header_struktur'); ?>
    <?php echo $__env->make('user.partials.header_struktur', ['halaman' => $halaman], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($halaman === 'pemerintahan_desa'): ?>
        <?php echo $__env->make('user.page.struktur.pemerintahan_desa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'bpd'): ?>
        <?php echo $__env->make('user.page.struktur.bpd', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'pkk'): ?>
        <?php echo $__env->make('user.page.struktur.pkk', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'lpm'): ?>
        <?php echo $__env->make('user.page.struktur.lpm', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'karang_taruna'): ?>
        <?php echo $__env->make('user.page.struktur.karang_taruna', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($halaman === 'posyandu'): ?>
        <?php echo $__env->make('user.page.struktur.posyandu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('user.page.struktur.pemerintahan_desa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.struktur.bpd', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.struktur.pkk', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.struktur.lpm', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.struktur.karang_taruna', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('user.page.struktur.posyandu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/struktur/struktur.blade.php ENDPATH**/ ?>