<?php $__env->startSection('title', 'Struktur POSYANDU'); ?>


<?php $__env->startSection('header_struktur'); ?>
    <?php echo $__env->make('user.partials.header_struktur', ['halaman' => 'posyandu'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Tambahkan ID agar tombol scroll bisa target -->
<section id="posyandu-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktur POSYANDU Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah gambar-gambar Posyandu yang tersedia.
        </p>

        <!-- GAMBAR POSYANDU BESAR UTUH -->
        <?php
            $firstPosyandu = $posyandus->first();
            $firstPath = $firstPosyandu ? public_path('uploads/posyandu/'.$firstPosyandu->gambar) : null;
        ?>

        <?php if($firstPosyandu && $firstPosyandu->gambar && file_exists($firstPath)): ?>
            <img 
                src="<?php echo e(asset('uploads/posyandu/'.$firstPosyandu->gambar)); ?>" 
                alt="Foto POSYANDU"
                class="w-full h-auto mb-14 rounded shadow"
            />
        <?php else: ?>
            <p class="text-center text-gray-500 mb-14">Belum ada foto Posyandu.</p>
        <?php endif; ?>

        <!-- GRID GAMBAR POSYANDU LAINNYA (opsional) -->
        <?php if($posyandus->count() > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $posyandus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if($loop->first): ?> <?php continue; ?> <?php endif; ?>

                    <?php
                        $path = public_path('uploads/posyandu/'.$item->gambar);
                    ?>

                    <div class="bg-white rounded shadow p-3 hover:shadow-lg transition">
                        <?php if($item->gambar && file_exists($path)): ?>
                            <a href="<?php echo e(asset('uploads/posyandu/'.$item->gambar)); ?>" target="_blank">
                                <img src="<?php echo e(asset('uploads/posyandu/'.$item->gambar)); ?>" alt="Foto Posyandu"
                                     class="w-full h-64 object-cover rounded mb-2">
                            </a>
                        <?php else: ?>
                            <div class="h-64 flex items-center justify-center bg-gray-100 text-gray-400 rounded">
                                Tidak ada foto
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-center mt-10">
                <?php echo e($posyandus->links('vendor.pagination.tailwind')); ?>

            </div>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/struktur/posyandu.blade.php ENDPATH**/ ?>