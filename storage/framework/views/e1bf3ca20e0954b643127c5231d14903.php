<?php $__env->startSection('title', 'Edit Posyandu'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <div class="mb-4">
        <h3 class="fw-bold">Edit Foto Posyandu</h3>
        <p class="text-muted">Perbarui foto Posyandu sesuai kebutuhan.</p>
    </div>

    <form id="formEditPosyandu" action="<?php echo e(route('admin.struktur.posyandu.update', $posyandu->id)); ?>" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm rounded-3">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Foto Lama -->
        <div class="mb-3">
            <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
            <?php
                $oldPath = public_path('uploads/posyandu/'.$posyandu->gambar);
            ?>
            <?php if($posyandu->gambar && file_exists($oldPath)): ?>
                <img id="oldImage" src="<?php echo e(asset('uploads/posyandu/'.$posyandu->gambar)); ?>" alt="Foto Posyandu" class="img-fluid rounded mb-2" style="max-height: 250px;">
            <?php else: ?>
                <p class="text-muted">Tidak ada foto.</p>
            <?php endif; ?>
        </div>

        <!-- Ganti Foto -->
        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Ganti Foto (Opsional)</label>
            <input type="file" id="gambar" name="gambar" class="form-control <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".jpg,.jpeg,.png,.webp">
            <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Preview Gambar Baru -->
        <div class="mb-3 d-none" id="previewContainer">
            <label class="form-label fw-semibold">Preview Gambar Baru</label>
            <div>
                <img id="previewImage" src="#" alt="Preview Gambar" class="img-fluid rounded" style="max-height: 250px;">
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUpdatePosyandu" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update Foto</button>
            <a href="<?php echo e(route('admin.struktur.posyandu.index')); ?>" class="btn btn-secondary"><i class="fas fa-times me-1"></i> Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputGambar = document.getElementById('gambar');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    // Preview Gambar Baru
    inputGambar.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('d-none');
            previewImage.src = '#';
        }
    });

    // Konfirmasi Update
    document.getElementById('btnUpdatePosyandu').addEventListener('click', function() {
        Swal.fire({
            title: 'Update Foto?',
            text: "Pastikan semua data sudah benar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Update!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('formEditPosyandu').submit();
        });
    });
});
</script>

<?php if(session('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '<?php echo e(session("success")); ?>',
    timer: 1500,
    showConfirmButton: false
});
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/posyandu/edit.blade.php ENDPATH**/ ?>