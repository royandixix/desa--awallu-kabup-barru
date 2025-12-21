<?php $__env->startSection('title', 'Struktur Pemerintahan Desa'); ?>


<?php $__env->startSection('header_struktur'); ?>
    <?php echo $__env->make('user.partials.header_struktur', ['halaman' => 'pemerintahan_desa'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section id="pemerintahan-desa-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">
            Berikut adalah struktural pemerintahan desa
        </h2>

        
        <?php if($bagan && $bagan->foto && file_exists(public_path($bagan->foto))): ?>
            <img src="<?php echo e(asset($bagan->foto)); ?>"
                 alt="Struktur Pemerintahan Desa"
                 class="w-full h-auto mb-14 rounded shadow">
        <?php else: ?>
            <p class="text-center text-gray-500 mb-14">
                Belum ada gambar struktur diupload.
            </p>
        <?php endif; ?>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

            <?php $__empty_1 = true; $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">

                    
                    <?php if($p->foto && file_exists(public_path($p->foto))): ?>
                        <img src="<?php echo e(asset($p->foto)); ?>"
                             alt="<?php echo e($p->nama); ?>"
                             class="w-full h-80 object-cover">
                    <?php else: ?>
                        <div class="w-full h-80 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Tidak ada foto</span>
                        </div>
                    <?php endif; ?>

                    
                    <div class="bg-teal-500 text-white p-4 text-center">
                        <h3 class="font-bold text-lg"><?php echo e($p->nama); ?></h3>
                        <p class="text-sm"><?php echo e($p->jabatan); ?></p>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center col-span-4 text-gray-500">
                    Belum ada data perangkat desa.
                </p>
            <?php endif; ?>

        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/struktur/pemerintahan_desa.blade.php ENDPATH**/ ?>