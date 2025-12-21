<?php $__env->startSection('title', 'Semua UMKM Desa'); ?>


<?php $__env->startSection('header_layanan'); ?>
    <?php echo $__env->make('user.partials.header_umkm_selengkapnyh', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Semua UMKM Desa
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Jelajahi semua produk UMKM yang tersedia di Desa Lawallu. Pilih produk favoritmu dan dukung ekonomi lokal!
        </p>
        
        <!-- Tombol Kembali -->
        <button onclick="window.history.back()" 
            class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 hover:shadow-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </button>
    </div>

    <!-- Grid UMKM -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $umkms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $umkm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('user.umkm.detail', ['id' => $umkm->id])); ?>"
               class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-gray-300">
                
                <!-- Image Container -->
                <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                    <img src="<?php echo e($umkm->foto ? asset($umkm->foto) : asset('images/default.png')); ?>" 
                         alt="<?php echo e($umkm->nama_usaha ?? 'UMKM Desa'); ?>"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                    
                    <?php if($umkm->foto_pengusaha): ?>
                        <div class="absolute top-2 right-2">
                            <img src="<?php echo e(asset($umkm->foto_pengusaha)); ?>"
                                 alt="<?php echo e($umkm->nama_pengusaha); ?>"
                                 class="w-10 h-10 rounded-full border-2 border-white object-cover shadow-md">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Content Container -->
                <div class="p-5">
                    <!-- Nama Usaha -->
                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-green-600 transition-colors duration-200">
                        <?php echo e($umkm->nama_usaha ?? '-'); ?>

                    </h3>

                    <!-- Harga -->
                    <?php if(!empty($umkm->harga)): ?>
                        <p class="text-lg font-semibold text-gray-800 mb-3">
                            Rp<?php echo e(number_format($umkm->harga, 0, ',', '.')); ?>

                        </p>
                    <?php endif; ?>

                    <!-- Badge -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            UMKM Desa
                        </span>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Empty State -->
            <div class="col-span-full text-center py-20">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada UMKM tersedia</h3>
                <p class="text-gray-500">Produk UMKM akan ditampilkan di sini</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/home/umkm/umkm_selengkap_nyh.blade.php ENDPATH**/ ?>