<?php $__env->startSection('title', 'Berita Desa Lawallu'); ?>

<?php $__env->startSection('header_berita'); ?>
    <?php echo $__env->make('user.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('user.partials.header_berita', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-8 max-w-7xl">

        <!-- GRID BERITA -->
        <section class="mb-20" data-aos="fade-up" data-aos-delay="200">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white overflow-hidden border border-gray-200 hover:border-teal-500 transition-all duration-500 group cursor-pointer">
                        <!-- GAMBAR -->
                        <div class="relative overflow-hidden h-80">
                            <img src="<?php echo e($item->image_url); ?>" alt="<?php echo e($item->judul); ?>"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                            <!-- OVERLAY -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex flex-col justify-end p-8 opacity-90 group-hover:opacity-100 transition-all duration-500">
                                <span class="inline-block mb-3 px-4 py-1 bg-teal-500/80 text-white text-sm uppercase tracking-widest group-hover:bg-teal-600 transition-all">
                                    <?php echo e($item->kategori ?? 'Umum'); ?>

                                </span>

                                <a href="<?php echo e(route('user.berita.detail', ['slug' => $item->slug])); ?>"
                                    class="text-white text-3xl font-semibold leading-snug line-clamp-2 transition-colors duration-300 group-hover:text-teal-400">
                                    <?php echo e($item->judul); ?>

                                </a>
                            </div>
                        </div>

                        <!-- INFO -->
                        <div class="p-8 border-t border-gray-200">
                            <div class="flex items-center justify-between text-gray-700">
                                <div class="flex items-center gap-4">
                                    <i class="bi bi-person-circle text-teal-600 text-4xl"></i>
                                    <div class="leading-tight">
                                        <p class="font-semibold text-xl text-gray-900">
                                            <?php echo e($item->author ?? 'Administrator'); ?>

                                        </p>
                                        <p class="text-base text-gray-500">Admin Desa</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 text-gray-600">
                                    <i class="bi bi-calendar3 text-teal-600 text-2xl"></i>
                                    <span class="text-lg font-medium">
                                        <?php echo e($item->created_at->translatedFormat('d F Y')); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center text-gray-500 col-span-3">Belum ada berita.</p>
                <?php endif; ?>
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-center mt-12">
                <?php echo e($beritas->links()); ?>

            </div>
        </section>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/berita/berita.blade.php ENDPATH**/ ?>