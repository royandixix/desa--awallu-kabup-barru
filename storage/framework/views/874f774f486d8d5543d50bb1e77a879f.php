<?php $__env->startSection('title', 'Detail Gambar - ' . $galeri->judul); ?>


<?php $__env->startSection('header_detail_gambar'); ?>
    <?php echo $__env->make('user.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('user.partials.header_detail_gambar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="bg-gray-50 pt-16">
        <div class="container mx-auto px-6 md:px-10 lg:px-16">
            <div class="w-full overflow-hidden">
                <img src="<?php echo e(asset('uploads/galeri/' . $galeri->file)); ?>" alt="<?php echo e($galeri->judul); ?>"
                    class="w-full h-[680px] md:h-[720px] lg:h-[800px] object-cover object-center">
            </div>
            <div class="text-center mt-6">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-700"><?php echo e($galeri->judul); ?></h1>
                <p class="mt-2 text-gray-600 text-lg md:text-xl"><?php echo e($galeri->desc ?? '-'); ?></p>
            </div>
        </div>
    </section>

    
    <section class="bg-gray-50">
        <div class="container mx-auto px-6 md:px-10 lg:px-16 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12 text-gray-800 leading-relaxed">

            <!-- Kolom Kiri -->
            <div class="lg:col-span-2 space-y-8">
                <h2 class="text-3xl font-bold text-green-700 mb-4">Detail Kegiatan</h2>
                <p><?php echo e($galeri->desc ?? 'Tidak ada deskripsi.'); ?></p>
                <p>Lokasi: <?php echo e($galeri->lokasi ?? '-'); ?></p>
            
            </div>

            <!-- Sidebar Kanan -->
            <aside class="space-y-6 text-sm text-gray-700">
                <h3 class="text-xl font-bold text-green-700 mb-2">Informasi Gambar</h3>
                <ul class="space-y-1">
                    <li><strong>Lokasi:</strong> <?php echo e($galeri->lokasi ?? '-'); ?></li>
                    <li><strong>Kategori:</strong> <?php echo e($galeri->kategori ?? '-'); ?></li>
                    <li><strong>Tanggal:</strong> <?php echo e($galeri->tanggal?->format('Y-m-d H:i:s') ?? '-'); ?></li>
                </ul>
            </aside>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/galeri/detail_gambar.blade.php ENDPATH**/ ?>