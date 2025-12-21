<?php $__env->startSection('title', 'Upload Posyandu'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <div class="mb-4">
        <h3 class="fw-bold">Upload Gambar Posyandu</h3>
        <p class="text-muted">Tambahkan foto Posyandu baru.</p>
    </div>

    <form id="formUploadPosyandu" action="<?php echo e(route('admin.struktur.posyandu.store')); ?>" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm rounded-3">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Pilih Foto</label>
            <input type="file" id="gambar" name="gambar" class="form-control <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required accept=".jpg,.jpeg,.png,.webp">
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

        <!-- Preview Gambar -->
        <div class="mb-3 d-none" id="previewContainer">
            <label class="form-label fw-semibold">Preview Gambar</label>
            <div>
                <img id="previewImage" src="#" alt="Preview Gambar" class="img-fluid rounded" style="max-height: 250px;">
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnUploadPosyandu" class="btn btn-primary"><i class="fas fa-upload me-1"></i> Upload Foto</button>
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

    // Live preview gambar
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

    // Konfirmasi sebelum upload
    document.getElementById('btnUploadPosyandu').addEventListener('click', function() {
        if (!inputGambar.files.length) {
            Swal.fire({
                icon: 'warning',
                title: 'Pilih foto terlebih dahulu!',
                timer: 1500,
                showConfirmButton: false
            });
            return;
        }

        Swal.fire({
            title: 'Upload Foto?',
            text: "Pastikan file yang dipilih sudah benar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Upload!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('formUploadPosyandu').submit();
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/posyandu/create.blade.php ENDPATH**/ ?>