<?php $__env->startSection('title', 'Struktur PKK'); ?>


<?php $__env->startSection('header_struktur'); ?>
    <?php echo $__env->make('user.partials.header_struktur', ['halaman' => 'pkk'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section id="pkk-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktur PKK Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah struktur organisasi Tim Penggerak PKK Desa Lawallu.
        </p>

        <!-- FOTO BESAR FULL-WIDTH -->
        <?php $__empty_1 = true; $__currentLoopData = \App\Models\Pkk::orderBy('id', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mb-14">
                <img 
                    src="<?php echo e(asset('pkk/' . $pkk->gambar)); ?>" 
                    alt="Struktur PKK Desa"
                    class="w-full h-auto rounded-none shadow-lg"
                />
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-gray-500">Belum ada gambar PKK.</p>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/struktur/pkk.blade.php ENDPATH**/ ?>