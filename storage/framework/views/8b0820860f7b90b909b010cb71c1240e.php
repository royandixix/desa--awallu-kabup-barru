<?php $__env->startSection('title', $umkm->nama_usaha); ?>


<?php $__env->startSection('header_layanan'); ?>
    <?php echo $__env->make('user.partials.header_umkm', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="bg-gray-50 py-16">
    <div class="container mx-auto px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[500px]">

            <!-- Left Side: Foto UMKM -->
            <div class="flex justify-center lg:justify-start" data-aos="fade-right">
                <div class="relative w-80 h-96 bg-white rounded-2xl shadow-2xl overflow-hidden hover:scale-105 transition-transform duration-300">
                    <img src="<?php echo e($umkm->foto ? asset($umkm->foto) : asset('images/default.png')); ?>"
                        alt="<?php echo e($umkm->nama_usaha); ?>" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Right Side: Content -->
            <div data-aos="fade-left">
                <h1 class="text-4xl font-bold text-gray-900 mb-4"><?php echo e($umkm->nama_usaha); ?></h1>
                <p class="text-gray-600 mb-6 text-lg leading-relaxed"><?php echo e($umkm->deskripsi); ?></p>

                <div class="space-y-3 text-gray-800 mb-6">
                    <p><span class="font-semibold">Nama Pengusaha:</span> <?php echo e($umkm->nama_pengusaha); ?></p>
                    <p><span class="font-semibold">Jenis Usaha:</span> <?php echo e($umkm->jenis_usaha); ?></p>
                    <p><span class="font-semibold">Alamat:</span> <?php echo e($umkm->alamat); ?></p>
                    <p><span class="font-semibold">Kontak:</span> <?php echo e($umkm->kontak); ?></p>
                    <p><span class="font-semibold">Kode UMKM:</span> <?php echo e($umkm->kode_umkm); ?></p>
                </div>

                <!-- Tombol WhatsApp -->
                <a href="https://wa.me/<?php echo e($umkm->kontak); ?>" target="_blank"
                   class="inline-flex items-center px-6 py-3 mb-4 rounded-full bg-green-500 hover:bg-green-600 text-white font-semibold shadow-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.04 2C6.48 2 2 6.48 2 12.04c0 2.13.63 4.10 1.71 5.74L2 22l4.44-1.69c1.58 1.05 3.53 1.69 5.60 1.69C17.60 22 22 17.52 22 12.04S17.60 2 12.04 2zm6.57 15.60c-.28.77-1.65 1.44-2.27 1.52-.60.08-1.34.11-2.48-.22-3.02-.83-4.96-3.66-5.12-3.85-.16-.18-1.30-1.66-1.30-3.17 0-1.50.78-2.24 1.05-2.55.28-.31.60-.38.80-.38.20 0 .38 0 .55.01.18.01.40-.07.63.48.23.54.78 1.86.85 1.99.07.13.12.29.02.46-.10.17-.15.28-.30.44-.15.15-.32.34-.46.45-.15.12-.30.27-.12.53.18.27.80 1.33 1.72 2.15 1.18 1.13 2.16 1.50 2.47 1.67.31.17.49.14.67-.09.18-.23.77-.90.97-1.21.20-.31.40-.26.66-.16.26.10 1.63.77 1.91.91.28.14.46.21.53.33.08.12.08.68-.20 1.45z"/>
                    </svg>
                    Hubungi via WhatsApp
                </a>

                <!-- Tombol kembali -->
                <button onclick="window.history.back()"
                    class="px-6 py-3 rounded-full bg-gray-500 hover:bg-gray-600 text-white font-semibold shadow-lg transition duration-300">
                    Kembali
                </button>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/home/umkm/detail_umkm.blade.php ENDPATH**/ ?>