<?php $__env->startSection('title', 'Laporan Kegiatan'); ?>

<?php $__env->startSection('header_transparansi'); ?>
    <?php echo $__env->make('user.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('user.partials.header_transparansi', ['halaman' => 'laporan'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Header Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Laporan Kegiatan</h1>
            <div class="w-20 h-1 bg-teal-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Halaman ini menyajikan informasi lengkap mengenai laporan kegiatan yang ada di Desa Lawallu.
            </p>
        </div>
    </section>

    <!-- Laporan Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <?php if(isset($laporanKegiatan) && $laporanKegiatan->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php $__currentLoopData = $laporanKegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="overflow-hidden rounded-md shadow-md bg-white">
                            <!-- Image -->
                            <div class="relative h-64">
                                <?php if($laporan->foto): ?>
                                    <img src="<?php echo e(asset('uploads/laporan/foto/' . $laporan->foto)); ?>" 
                                        alt="<?php echo e($laporan->judul); ?>"
                                        class="w-full h-full object-cover rounded-t-md">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center bg-gray-200 rounded-t-md">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Content -->
                            <div class="p-4 text-left text-gray-800">
                                <h3 class="text-xl font-bold mb-2"><?php echo e($laporan->judul); ?></h3>

                                <div class="space-y-1 text-sm text-gray-700">
                                    <!-- Lokasi -->
                                    <p class="flex items-center">
                                        <svg class="w-5 h-5 text-teal-600 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Lokasi: <?php echo e($laporan->lokasi); ?></span>
                                    </p>

                                    <!-- Anggaran -->
                                    <?php if($laporan->anggaran): ?>
                                        <p class="flex items-center">
                                            <svg class="w-5 h-5 text-teal-600 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Anggaran: Rp. <?php echo e(number_format($laporan->anggaran, 0, ',', '.')); ?></span>
                                        </p>
                                    <?php endif; ?>

                                    <!-- Tanggal -->
                                    <p class="flex items-center">
                                        <svg class="w-5 h-5 text-teal-600 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Tanggal: <?php echo e(\Carbon\Carbon::parse($laporan->tanggal)->format('Y-m-d')); ?></span>
                                    </p>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2 mt-3">
                                    <!-- Lihat Detail -->
                                    <a href="<?php echo e(route('user.laporan.detail', $laporan->id)); ?>"
                                        class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 transition-colors duration-200">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h10M7 11h10M7 15h7m-4 4h4a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Lihat Lanjut
                                    </a>

                                    <!-- Download File -->
                                    <?php if($laporan->file_path): ?>
                                        <a href="<?php echo e(asset('uploads/laporan/file/' . $laporan->file_path)); ?>" download
                                            class="flex items-center gap-2 px-4 py-2 bg-teal-600 text-white font-semibold rounded hover:bg-teal-700 transition-colors duration-200">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                            </svg>
                                            Download
                                        </a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    <?php echo e($laporanKegiatan->links()); ?>

                </div>
            <?php else: ?>
                <!-- Empty State -->
                <div class="text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Laporan</h3>
                    <p class="text-gray-500">Laporan kegiatan akan ditampilkan di sini</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Visitor Counter -->
    <?php if(isset($kunjunganHariIni)): ?>
        <div class="fixed bottom-6 left-6 bg-teal-600 text-white px-6 py-3 rounded-full shadow-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            <span class="font-semibold">Kunjungan Hari Ini: <?php echo e($kunjunganHariIni); ?></span>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/transparansi/laporan.blade.php ENDPATH**/ ?>