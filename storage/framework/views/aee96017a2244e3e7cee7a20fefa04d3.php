<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Header -->
    <div class="text-left mb-16 opacity-0 translate-y-6" id="header-section">
        <h1 class=" mb-3 text-5xl  text-gray-900 mb-4">
            Berikut Halaman Produk UMKM Desa Lawallu
        </h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl px-4">
            Temukan berbagai produk unik dan berkualitas dari UMKM Desa Lawallu, mulai dari kerajinan tangan, kuliner
            khas, hingga produk kreatif lain
        </p>
    </div>

    <!-- Grid Produk dengan Style Testimoni -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <?php $__empty_1 = true; $__currentLoopData = $umkms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $umkm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('user.umkm.detail', ['id' => $umkm->id])); ?>"
                class="umkm-card group block opacity-0 translate-y-8" style="animation-delay: <?php echo e($index * 100); ?>ms">

                <div
                    class="h-full rounded-2xl overflow-hidden transition-all duration-500 
                    <?php echo e($index % 3 == 0 ? 'bg-gradient-to-br from-gray-900 to-gray-800 text-white' : 'bg-white border border-gray-200'); ?>

                    hover:shadow-2xl hover:-translate-y-2">

                    <!-- Image Section -->
                    <div class="relative overflow-hidden">
                        <img src="<?php echo e($umkm->foto ? asset($umkm->foto) : asset('images/default.png')); ?>"
                            alt="<?php echo e($umkm->nama_usaha); ?>"
                            class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-110">

                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-6 relative">
                        <!-- Quote/Description -->
                        <div class="mb-6">
                            <?php if($umkm->deskripsi): ?>
                                <p
                                    class="<?php echo e($index % 3 == 0 ? 'text-gray-200' : 'text-gray-700'); ?> text-base leading-relaxed line-clamp-3">
                                    "<?php echo e(Str::limit($umkm->deskripsi, 150)); ?>"
                                </p>
                            <?php else: ?>
                                <p
                                    class="<?php echo e($index % 3 == 0 ? 'text-gray-200' : 'text-gray-700'); ?> text-base leading-relaxed">
                                    "Produk berkualitas dari UMKM lokal yang mendukung perekonomian desa."
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Business Name & Price -->
                        <div class="mb-4">
                            <h3 class="<?php echo e($index % 3 == 0 ? 'text-white' : 'text-gray-900'); ?> text-xl  mb-2">
                                <?php echo e($umkm->nama_usaha); ?>

                            </h3>
                            <?php if(!empty($umkm->harga)): ?>
                                <p
                                    class="<?php echo e($index % 3 == 0 ? 'text-green-400' : 'text-green-600'); ?> text-lg font-semibold">
                                    Rp<?php echo e(number_format($umkm->harga, 0, ',', '.')); ?>

                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Owner Info -->
                        <div
                            class="flex items-center justify-between pt-4 border-t <?php echo e($index % 3 == 0 ? 'border-gray-700' : 'border-gray-200'); ?>">
                            <div class="flex items-center gap-3">
                                <?php if($umkm->foto_pengusaha): ?>
                                    <img src="<?php echo e(asset($umkm->foto_pengusaha)); ?>" alt="<?php echo e($umkm->nama_pengusaha); ?>"
                                        class="w-12 h-12 rounded-full object-cover border-2 <?php echo e($index % 3 == 0 ? 'border-gray-600' : 'border-gray-300'); ?> shadow-md">
                                <?php else: ?>
                                    <div
                                        class="w-12 h-12 rounded-full <?php echo e($index % 3 == 0 ? 'bg-gray-700' : 'bg-gray-200'); ?> flex items-center justify-center">
                                        <svg class="w-6 h-6 <?php echo e($index % 3 == 0 ? 'text-gray-400' : 'text-gray-500'); ?>"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                <?php endif; ?>

                                <div>
                                    <p
                                        class="<?php echo e($index % 3 == 0 ? 'text-white' : 'text-gray-900'); ?> font-semibold text-sm">
                                        <?php echo e($umkm->nama_pengusaha ?? 'Pengusaha Lokal'); ?>

                                    </p>
                                    <p class="<?php echo e($index % 3 == 0 ? 'text-gray-400' : 'text-gray-500'); ?> text-xs">
                                        Pemilik, <?php echo e($umkm->nama_usaha); ?>

                                    </p>
                                </div>
                            </div>

                            <!-- Badge -->
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                <?php echo e($index % 3 == 0 ? 'bg-green-500/20 text-green-300' : 'bg-green-100 text-green-800'); ?>">
                                UMKM
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada UMKM</h3>
                <p class="text-gray-500">Saat ini belum ada produk UMKM yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- CTA Button -->
    <div class="text-center mt-12">
        <a href="<?php echo e(route('user.umkm.umkm_selengkap_nyh')); ?>"
            class="inline-flex items-center gap-2 px-8 py-4 rounded-full 
            bg-gray-900 hover:bg-gray-800 text-white font-semibold 
            shadow-xl hover:shadow-2xl transition-all duration-300 
            hover:-translate-y-1 group">
            <span>Lihat Selengkapnya</span>
            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>

</div>

<!-- STYLES -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .umkm-card {
        opacity: 0;
        transform: translateY(30px);
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    /* Smooth line clamp */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<!-- SCRIPTS -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Animate header
        const header = document.getElementById('header-section');
        if (header) observer.observe(header);

        // Animate cards with stagger effect
        const umkmCards = document.querySelectorAll('.umkm-card');
        umkmCards.forEach((card, index) => {
            setTimeout(() => observer.observe(card), index * 50);
        });
    });
</script>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/home/umkm/umkm.blade.php ENDPATH**/ ?>