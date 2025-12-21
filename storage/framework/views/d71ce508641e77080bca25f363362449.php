<?php $__env->startSection('title', 'Struktural Karang Taruna'); ?>


<?php $__env->startSection('header_struktur'); ?>
    <?php echo $__env->make('user.partials.header_struktur', ['halaman' => 'karang_taruna'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Tambahkan ID agar tombol scroll bisa target -->
<section id="karang-taruna-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktural Karang Taruna Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah struktur organisasi Karang Taruna Desa Lawallu.
        </p>

        <!-- FOTO BESAR FULL-WIDTH -->
        <?php $__empty_1 = true; $__currentLoopData = $karangTarunas ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mb-14">
                <img 
                    src="<?php echo e(asset('karang_taruna/' . ($item->gambar ?? 'default.png'))); ?>" 
                    alt="Foto Karang Taruna"
                    class="w-full h-auto rounded-none shadow-lg"
                />
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-gray-500">Belum ada foto Karang Taruna.</p>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/struktur/karang_taruna.blade.php ENDPATH**/ ?>