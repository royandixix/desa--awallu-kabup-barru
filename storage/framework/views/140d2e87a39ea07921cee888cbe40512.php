<?php $__env->startSection('title', 'Detail Kontak / Saran'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-envelope-open-text me-2" style="color: #ffd700;"></i>
                        Detail Kontak / Saran
                    </h2>
                    <p class="text-white-50 mb-1 small">Informasi lengkap pesan dari masyarakat</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        <?php echo e(\Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm hover-shadow border-0 mb-4">
                <div class="card-header bg-light fw-bold">
                    <i class="fas fa-user me-2"></i>Informasi Pengirim
                </div>

                <div class="card-body p-4">

                    <div class="mb-3">
                        <label class="fw-semibold text-muted">Nama Pengirim</label>
                        <div class="fs-5 fw-bold"><?php echo e($item->nama); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold text-muted">Email Pengirim</label>
                        <div class="fs-6"><?php echo e($item->email); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold text-muted">Pesan</label>
                        <div class="p-3 rounded bg-light border"><?php echo e($item->pesan); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold text-muted">Dikirim Pada</label>
                        <div class="text-secondary"><?php echo e($item->created_at->format('d-m-Y H:i')); ?></div>
                    </div>

                </div>
            </div>

            <div class="text-center">
                <a href="<?php echo e(route('admin.kontak-saran.index')); ?>" class="btn btn-dark shadow-sm px-4">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/kontak_saran/show.blade.php ENDPATH**/ ?>