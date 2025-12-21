<?php $__env->startSection('title', 'Struktur LPM'); ?>


<?php $__env->startSection('header_struktur'); ?>
    <?php echo $__env->make('user.partials.header_struktur', ['halaman' => 'lpm'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section id="lpm-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktur LPM Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah struktur organisasi LPM (Lembaga Pemberdayaan Masyarakat) Desa Lawallu.
        </p>

        <!-- FOTO BESAR FULL-WIDTH -->
        <?php $__empty_1 = true; $__currentLoopData = $lpms ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mb-14">
                <img 
                    src="<?php echo e(asset($item->gambar ?? 'uploads/lpm/default.png')); ?>" 
                    alt="Struktur LPM"
                    class="w-full h-auto rounded-none shadow-lg"
                />
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-gray-500">Belum ada foto LPM.</p>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/struktur/lpm.blade.php ENDPATH**/ ?>