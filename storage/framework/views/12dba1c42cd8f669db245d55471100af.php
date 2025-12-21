<?php $__env->startSection('title', 'Galeri Desa Lawallu'); ?>

<?php $__env->startSection('content'); ?>
<section id="galeri" class="bg-white py-16">
    <div class="max-w-[1500px] mx-auto px-3 md:px-6 lg:px-8">

        <?php if($paginated->count() > 0): ?>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

                <?php $__currentLoopData = $paginated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group">

                        <a href="<?php echo e(route('user.galeri.detail', ['filename' => $item['file']])); ?>" class="block">

                            
                            <div class="relative w-full h-96 overflow-hidden">
                                <img src="<?php echo e(asset('uploads/galeri/' . $item['file'])); ?>"
                                     alt="<?php echo e($item['title']); ?>"
                                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                            </div>

                            
                            <div class="mt-3">
                                <h3 class="text-lg font-semibold text-gray-900 group-hover:text-emerald-600 transition-colors">
                                    <?php echo e($item['title']); ?>

                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed mt-1">
                                    <?php echo e(Str::limit($item['desc'], 85, '...')); ?>

                                </p>
                            </div>

                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            
            <div class="flex justify-center items-center mt-14 space-x-2">
                <?php if($page > 1): ?>
                    <a href="<?php echo e(url()->current()); ?>?page=<?php echo e($page - 1); ?>"
                       class="px-3 py-2 bg-gray-100 border border-gray-300 text-gray-700 hover:bg-gray-200">
                        &laquo;
                    </a>
                <?php endif; ?>

                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="<?php echo e(url()->current()); ?>?page=<?php echo e($i); ?>"
                       class="px-4 py-2 border transition-all duration-300
                       <?php echo e($i == $page ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-gray-100 text-emerald-700 hover:bg-gray-200 border-emerald-400'); ?>">
                        <?php echo e($i); ?>

                    </a>
                <?php endfor; ?>

                <?php if($page < $totalPages): ?>
                    <a href="<?php echo e(url()->current()); ?>?page=<?php echo e($page + 1); ?>"
                       class="px-3 py-2 bg-gray-100 border border-gray-300 text-gray-700 hover:bg-gray-200">
                        &raquo;
                    </a>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <p class="text-center text-gray-500 mt-10 text-lg">Belum ada foto di galeri.</p>
        <?php endif; ?>

    </div>
</section>

<script>
function scrollToGallery() {
    const galeriSection = document.getElementById('galeri');
    galeriSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/galeri/gambar.blade.php ENDPATH**/ ?>