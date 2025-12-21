<?php $__env->startSection('title', 'Edit Bagan Pemerintahan Desa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <h3 class="mb-2">Edit Bagan Pemerintahan Desa</h3>
    <p class="text-muted mb-4">Ubah gambar bagan pemerintahan desa.</p>

    <form action="<?php echo e(route('admin.struktur.pemerintahan_desa.struktural.update', $bagan->id)); ?>"
          method="POST"
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="mb-3">
            <label class="form-label">Upload Gambar Baru (Max 4MB)</label>
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
                   accept=".jpg,.jpeg,.png,.webp">

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

            
            <div class="mt-3">
                <p class="fw-bold mb-1">Preview Foto</p>
                <img id="previewFoto" class="rounded mt-2 shadow-sm"
                     style="width: 200px;"
                     src="<?php echo e($bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? asset('uploads/struktur/' . $bagan->foto) : ''); ?>"
                     <?php echo e($bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? '' : 'style=display:none;'); ?>>
            </div>
        </div>

        
        <button type="submit" class="btn btn-primary">Update Bagan</button>
        <a href="<?php echo e(route('admin.struktur.pemerintahan_desa.struktural.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const fotoInput = document.getElementById('fotoInput');
    const preview = document.getElementById('previewFoto');

    // Preview gambar baru sebelum update
    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) {
            // Jika tidak ada file baru, tampilkan gambar lama atau sembunyikan
            preview.style.display = "<?php echo e($bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? 'block' : 'none'); ?>";
            preview.src = "<?php echo e($bagan->foto && file_exists(public_path('uploads/struktur/' . $bagan->foto)) ? asset('uploads/struktur/' . $bagan->foto) : ''); ?>";
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/pemerintahan_desa/struktural/edit.blade.php ENDPATH**/ ?>