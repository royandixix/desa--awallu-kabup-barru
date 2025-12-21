<?php $__env->startSection('title', 'Edit Anggota Pemerintahan Desa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <h3 class="mb-1">Edit Anggota Pemerintahan Desa</h3>
    <p class="text-muted mb-4">Perbarui data anggota pemerintahan desa.</p>

    <form id="formEditAnggota" action="<?php echo e(route('admin.struktur.pemerintahan_desa.anggota.update', $item->id)); ?>"
          method="POST" enctype="multipart/form-data">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="mb-3">
            <label class="form-label">Nama Anggota</label>
            <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('nama', $item->nama)); ?>" required>
            <?php $__errorArgs = ['nama'];
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

        
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('jabatan', $item->jabatan)); ?>" required>
            <?php $__errorArgs = ['jabatan'];
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

        
        <div class="mb-3">
            <label class="form-label">Foto Anggota (Max 2MB)</label>
            <input type="file" name="foto" class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fotoInput"
                   accept=".jpg,.jpeg,.png,.webp">

            <small class="text-muted d-block">
                Format: JPG, JPEG, PNG, WEBP • Max 2MB
            </small>

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
                <img id="previewFoto" class="rounded shadow-sm"
                     style="width: 120px;"
                     src="<?php echo e($item->foto ? asset('uploads/struktur/' . $item->foto) : ''); ?>"
                     <?php echo e($item->foto ? '' : 'style=display:none;'); ?>>
            </div>
        </div>

        
        <div class="mt-3">
            <button type="button" id="btnUpdate" class="btn btn-primary">Update Data</button>
            <a href="<?php echo e(route('admin.struktur.pemerintahan_desa.anggota.index')); ?>" class="btn btn-secondary">Batal</a>
        </div>

    </form>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const fotoInput = document.getElementById('fotoInput');
const preview = document.getElementById('previewFoto');

// Preview foto baru sebelum update
fotoInput.addEventListener('change', function() {
    const file = this.files[0];
    if (!file) {
        preview.style.display = "<?php echo e($item->foto ? 'block' : 'none'); ?>";
        preview.src = "<?php echo e($item->foto ? asset('uploads/struktur/' . $item->foto) : ''); ?>";
        return;
    }
    const reader = new FileReader();
    reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
    }
    reader.readAsDataURL(file);
});

// Konfirmasi update
document.getElementById('btnUpdate').addEventListener('click', function() {
    Swal.fire({
        title: 'Update Data?',
        text: "Perubahan akan disimpan.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('formEditAnggota').submit();
        }
    });
});

// SweetAlert success
<?php if(session('success')): ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '<?php echo e(session("success")); ?>',
    });
<?php endif; ?>
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/pemerintahan_desa/anggota/edit.blade.php ENDPATH**/ ?>