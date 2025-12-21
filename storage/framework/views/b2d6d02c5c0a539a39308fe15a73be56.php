<div id="struktur-organisasi" class="max-w-7xl mx-auto px-6 py-12">

    <!-- Judul -->
    <div class="mb-12 text-center">
        <h2 class="text-4xl text-teal-600 font-bold mb-2">SOTK</h2>
        <p class="text-gray-700 text-lg">
            Struktur Organisasi dan Tata Kerja Desa Lawallu
        </p>
    </div>

    <?php
        $anggotaFiltered = $anggota
            ->where('kategori', 'pemerintahan_desa')
            ->take(8)
            ->values();
    ?>

    <!-- Grid Anggota (MAX 8) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <?php $__currentLoopData = $anggotaFiltered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="anggota-card bg-white rounded-lg shadow-md overflow-hidden transition hover:shadow-xl cursor-pointer"
                data-index="<?php echo e($index); ?>"
                data-nama="<?php echo e($d->nama); ?>"
                data-jabatan="<?php echo e($d->jabatan); ?>"
                data-foto="<?php echo e($d->foto ? asset($d->foto) : asset('img/default-user.png')); ?>"
                onclick="openModal(this)"
            >
                <img src="<?php echo e($d->foto ? asset($d->foto) : asset('img/default-user.png')); ?>"
                     alt="<?php echo e($d->nama); ?>"
                     class="w-full h-80 object-cover">

                <div class="bg-teal-500 text-white p-4 text-center">
                    <h3 class="font-bold text-lg"><?php echo e($d->nama); ?></h3>
                    <p class="text-sm"><?php echo e($d->jabatan); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <a href="<?php echo e(route('user.struktur.pemerintahan_desa')); ?>"
       class="mt-3 px-4 py-2 bg-white text-teal-600 font-semibold rounded-full hover:bg-gray-100 transition inline-block">
        Lihat Selengkapnya
    </a>
</div>

<!-- MODAL -->
<div id="modal" class="hidden fixed inset-0 z-50 items-center justify-center p-4 opacity-0 transition-opacity duration-300">
    <div class="fixed inset-0 bg-black/70" onclick="closeModal()"></div>

    <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-md w-full z-50 relative">
        <button class="absolute top-2 right-2 text-gray-500 hover:text-gray-700" onclick="closeModal()">✕</button>
        <img id="modal-foto" src="" alt="" class="w-full h-80 object-cover">
        <div class="p-4 text-center">
            <h3 id="modal-nama" class="font-bold text-xl mb-2"></h3>
            <p id="modal-jabatan" class="text-gray-700"></p>
        </div>
    </div>
</div>

<!-- SCRIPT MODAL -->
<script>
function openModal(el) {
    const modal = document.getElementById('modal');
    document.getElementById('modal-foto').src = el.dataset.foto;
    document.getElementById('modal-nama').textContent = el.dataset.nama;
    document.getElementById('modal-jabatan').textContent = el.dataset.jabatan;

    modal.classList.remove('hidden', 'opacity-0');
    modal.classList.add('flex', 'opacity-100');
}



function closeModal() {
    const modal = document.getElementById('modal');
    modal.classList.remove('flex', 'opacity-100');
    modal.classList.add('hidden', 'opacity-0');
}
</script>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/home/struktur_organisasi.blade.php ENDPATH**/ ?>