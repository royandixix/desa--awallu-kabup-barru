<?php $__env->startSection('title', 'Transparansi BUMDes'); ?>

<?php $__env->startSection('header_transparansi'); ?>
    <?php echo $__env->make('user.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('user.partials.header_transparansi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 py-16 text-[18px]">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- PENJELASAN HALAMAN -->
        <div class="mb-12 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-3xl text-gray-800 mb-2">Transparansi Dokumen BUMDes</h2>
            <p class="text-gray-500">
                Di halaman ini, Anda dapat melihat dokumen resmi BUMDes dan KOPDes. Setiap dokumen dapat dibuka atau diunduh untuk referensi publik.
            </p>
        </div>

        <!-- DAFTAR DOKUMEN BUMDes -->
        <section class="mb-20" data-aos="fade-up" data-aos-delay="200">
            <div class="space-y-6">
                <?php $__empty_1 = true; $__currentLoopData = $bumdes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border-l-4 border-teal-500 bg-white p-6 rounded-lg hover:bg-teal-50 transition-all duration-300 flex flex-col md:flex-row md:items-center md:justify-between shadow-sm">

                        
                        <div>
                            <h3 class="text-xl text-gray-900"><?php echo e($data->judul); ?> - <?php echo e($data->kategori); ?></h3>
                            <p class="text-gray-500 text-sm mt-1 flex items-center gap-2">
                                <i class="bi bi-calendar3 text-teal-600"></i>
                                <?php echo e($data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->isoFormat('dddd, DD/MM/YYYY') : '-'); ?>

                            </p>
                        </div>

                        
                        <div class="flex gap-3 mt-4 md:mt-0">
                            <?php if($data->file): ?>
                                <?php
                                    $ext = strtolower(pathinfo($data->file, PATHINFO_EXTENSION));
                                    $filePath = asset('uploads/bumdes/'.$data->file);
                                ?>

                                
                                <a href="<?php echo e($filePath); ?>" target="_blank"
                                   class="px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    <?php if($ext === 'pdf'): ?>
                                        <i class="bi bi-file-earmark-pdf-fill text-lg"></i>
                                    <?php elseif(in_array($ext, ['xls','xlsx'])): ?>
                                        <i class="bi bi-file-earmark-excel-fill text-lg"></i>
                                    <?php elseif(in_array($ext, ['jpg','jpeg','png','webp'])): ?>
                                        <i class="bi bi-image-fill text-lg"></i>
                                    <?php else: ?>
                                        <i class="bi bi-file-text-fill text-lg"></i>
                                    <?php endif; ?>
                                    <span>Lihat</span>
                                </a>

                                
                                <a href="<?php echo e($filePath); ?>" download
                                   class="px-4 py-2 border border-green-600 text-green-600 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
                                    <i class="bi bi-download text-lg"></i>
                                    <span>Download</span>
                                </a>
                            <?php else: ?>
                                <span class="text-gray-400">Tidak ada file</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center text-gray-500">Belum ada dokumen BUMDes atau KOPDes yang tersedia.</p>
                <?php endif; ?>
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-center mt-8 space-x-2">
                <?php echo e($bumdes->links('pagination::tailwind')); ?>

            </div>
        </section>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/transparansi/bumdes.blade.php ENDPATH**/ ?>