<?php $__env->startSection('title', 'Upload Bagan Pemerintahan Desa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <h3 class="mb-2">Upload Bagan Pemerintahan Desa</h3>
    <p class="text-muted mb-4">Unggah gambar bagan struktur terbaru.</p>

    <form action="<?php echo e(route('admin.struktur.pemerintahan_desa.struktural.store')); ?>" 
          method="POST" 
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <div class="mb-3">
            <label class="form-label">Pilih Gambar Bagan (Max 4MB)</label>
            <input type="file" 
                   name="foto" 
                   id="fotoInput"
                   class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                   accept=".jpg,.jpeg,.png,.webp" required>

            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            
            <img id="previewFoto" class="rounded mt-2 shadow-sm" style="width: 200px; display:none;">
        </div>

        
        <button type="submit" class="btn btn-primary">Upload Bagan</button>
        <a href="<?php echo e(route('admin.struktur.pemerintahan_desa.struktural.index')); ?>" class="btn btn-secondary">Batal</a>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Preview gambar sebelum upload
    const fotoInput = document.getElementById('fotoInput');
    const preview = document.getElementById('previewFoto');

    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) {
            preview.style.display = 'none';
            return;
        }
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    });

    // SweetAlert success
    <?php if(session('success')): ?>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?php echo e(session('success')); ?>',
            icon: 'success',
            timer: 1600,
            showConfirmButton: false
        });
    <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/pemerintahan_desa/struktural/create.blade.php ENDPATH**/ ?>