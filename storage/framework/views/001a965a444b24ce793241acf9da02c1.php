<?php $__env->startSection('title', 'Bagan Pemerintahan Desa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4"
                     style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-sitemap me-2" style="color:#ffd700;"></i>
                        Bagan Pemerintahan Desa
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola struktur organisasi desa</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        <?php echo e(\Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-sitemap"></i> Struktur Saat Ini
        </h4>
        <a href="<?php echo e(route('admin.struktur.pemerintahan_desa.struktural.create')); ?>"
           class="btn btn-dark">
            <i class="fas fa-plus-circle"></i> Upload Bagan Baru
        </a>
    </div>

    
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">

            <?php if($bagan && $bagan->foto && file_exists(public_path($bagan->foto))): ?>
                <img src="<?php echo e(asset($bagan->foto)); ?>"
                     alt="Bagan Pemerintahan Desa"
                     class="img-fluid rounded shadow mb-3"
                     style="max-width: 650px;">

                <p class="text-muted small">
                    Bagan terakhir di-upload:
                    <?php echo e($bagan->created_at->format('d/m/Y H:i')); ?>

                </p>
            <?php else: ?>
                <p class="text-muted">
                    Belum ada bagan struktur di-upload.
                </p>
            <?php endif; ?>

        </div>
    </div>

    
    <?php if($bagan): ?>
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Preview</th>
                        <th>Tanggal Upload</th>
                        <th class="text-center" width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php if($bagan->foto && file_exists(public_path($bagan->foto))): ?>
                                <img src="<?php echo e(asset($bagan->foto)); ?>"
                                     class="img-fluid rounded shadow"
                                     style="max-width: 220px;">
                            <?php else: ?>
                                <span class="text-muted small">File tidak ditemukan</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($bagan->created_at->format('d/m/Y H:i')); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('admin.struktur.pemerintahan_desa.struktural.edit', $bagan->id)); ?>"
                               class="btn btn-dark btn-sm me-1 btn-edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="<?php echo e(route('admin.struktur.pemerintahan_desa.struktural.destroy', $bagan->id)); ?>"
                                  method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button"
                                        class="btn btn-warning btn-sm btn-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session('success')): ?>
<script>
Swal.fire({
    title: 'Berhasil!',
    text: '<?php echo e(session('success')); ?>',
    icon: 'success',
    timer: 1600,
    showConfirmButton: false
});
</script>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            Swal.fire({
                title: 'Edit Bagan?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Lanjut',
                cancelButtonText: 'Batal'
            }).then(res => {
                if (res.isConfirmed) window.location.href = url;
            });
        });
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Bagan?',
                text: 'Data tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(res => {
                if (res.isConfirmed) form.submit();
            });
        });
    });

});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/pemerintahan_desa/struktural/index.blade.php ENDPATH**/ ?>