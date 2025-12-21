<?php $__env->startSection('title', 'Struktural BPD'); ?>


<?php $__env->startSection('header_struktur'); ?>
    <?php echo $__env->make('user.partials.header_struktur', ['halaman' => 'bpd'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Tambahkan ID agar tombol scroll bisa target -->
<section id="bpd-section" class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- TITLE -->
        <h2 class="text-3xl text-gray-800 mb-2 text-center font-extrabold">Struktural BPD Desa</h2>
        <p class="text-gray-500 mb-10 text-center">
            Berikut adalah foto anggota BPD Desa.
        </p>

        <!-- GAMBAR BPD BESAR UTUH -->
        <?php
            $firstBpd = $bpds->first();
        ?>

        <?php if($firstBpd && $firstBpd->foto && file_exists(public_path($firstBpd->foto))): ?>
            <img 
                src="<?php echo e(asset($firstBpd->foto)); ?>" 
                alt="Foto BPD"
                class="w-full h-auto mb-14 rounded-none shadow"
            />
        <?php else: ?>
            <p class="text-center text-gray-500 mb-14">Belum ada foto anggota BPD.</p>
        <?php endif; ?>

        <!-- GRID ANGGOTA BPD -->
        

        <!-- PAGINATION DINAMIS -->
        <div class="flex justify-center mt-10">
            <?php echo e($bpds->links()); ?> <!-- Laravel 12 otomatis menggunakan Tailwind -->
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/struktur/bpd.blade.php ENDPATH**/ ?>