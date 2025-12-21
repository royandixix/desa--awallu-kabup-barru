<?php $__env->startSection('title', 'Tambah Gambar LPM'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Gambar LPM</h3>
        <p class="text-muted">Unggah gambar LPM baru untuk ditampilkan di sistem.</p>
    </div>

    
    <form id="formTambahLPM" action="<?php echo e(route('admin.struktur.lpm.store')); ?>" method="POST" enctype="multipart/form-data"
          class="card shadow-sm p-4 rounded-3 border-0">
        <?php echo csrf_field(); ?>

        
        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Pilih Gambar</label>
            <input type="file" id="gambar" name="gambar"
                   class="form-control <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   accept=".jpg,.jpeg,.png,.webp" required>
            <small class="text-muted d-block">Format: JPG/PNG/WEBP • Max: 10MB</small>
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

        
        <div class="mb-3 text-center">
            <img id="previewImage" src="#" alt="Preview" class="img-fluid rounded shadow-sm d-none" style="max-width: 250px;">
        </div>

        
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnSimpanLPM" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan Gambar
            </button>
            <a href="<?php echo e(route('admin.struktur.lpm.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-times me-1"></i> Batal
            </a>
        </div>

    </form>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
document.getElementById('gambar').addEventListener('change', function(event) {
    let reader = new FileReader();
    reader.onload = function() {
        let preview = document.getElementById('previewImage');
        preview.src = reader.result;
        preview.classList.remove('d-none');
    };
    reader.readAsDataURL(event.target.files[0]);
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


<script>
document.getElementById('btnSimpanLPM').addEventListener('click', function () {
    Swal.fire({
        title: 'Simpan Gambar?',
        text: "Pastikan gambar sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formTambahLPM').submit();
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/lpm/create.blade.php ENDPATH**/ ?>