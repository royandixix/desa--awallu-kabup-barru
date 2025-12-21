<?php $__env->startSection('title', isset($dokumen) ? 'Edit Dokumen' : 'Tambah Dokumen'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="mb-4">
        <h3 class="fw-bold"><?php echo e(isset($dokumen) ? 'Edit Dokumen Transparansi' : 'Tambah Dokumen Transparansi'); ?></h3>
        <p class="text-muted">
            <?php echo e(isset($dokumen) ? 'Perbarui data dokumen desa. Bisa mengganti file jika diperlukan.' : 'Masukkan data dokumen desa.'); ?>

        </p>
    </div>

    
    <form id="formDokumen" 
          action="<?php echo e(isset($dokumen) ? route('admin.transparansi.dokumen.update', $dokumen->id) : route('admin.transparansi.dokumen.store')); ?>" 
          method="POST" 
          enctype="multipart/form-data">

        <?php echo csrf_field(); ?>
        <?php if(isset($dokumen)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Dokumen</label>
            <input type="text" id="judul" name="judul"
                class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('judul', $dokumen->judul ?? '')); ?>" required>

            <?php $__errorArgs = ['judul'];
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
            <label for="jenis" class="form-label">Jenis Dokumen</label>
            <select id="jenis" name="jenis"
                class="form-select <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                <option value="">-- pilih jenis --</option>
                <option value="POKOK" <?php echo e(old('jenis', $dokumen->jenis ?? '') == 'POKOK' ? 'selected' : ''); ?>>POKOK</option>
                <option value="PERUBAHAN" <?php echo e(old('jenis', $dokumen->jenis ?? '') == 'PERUBAHAN' ? 'selected' : ''); ?>>PERUBAHAN</option>
            </select>

            <?php $__errorArgs = ['jenis'];
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
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" id="tahun" name="tahun"
                class="form-control <?php $__errorArgs = ['tahun'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('tahun', $dokumen->tahun ?? '')); ?>" placeholder="YYYY">

            <?php $__errorArgs = ['tahun'];
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
            <label for="tanggal" class="form-label">Tanggal Dokumen</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('tanggal', $dokumen->tanggal ?? '')); ?>">

            <?php $__errorArgs = ['tanggal'];
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

        
        <?php if(isset($dokumen)): ?>
        <div class="mb-3">
            <label class="form-label d-block">File Saat Ini</label>
            <?php if($dokumen->file): ?>
                <?php
                    $ext = strtolower(pathinfo($dokumen->file, PATHINFO_EXTENSION));
                    $label = $ext == 'pdf' ? 'Lihat PDF' : 'Lihat File';
                ?>
                <a href="<?php echo e(asset('uploads/dokumen/' . $dokumen->file)); ?>" target="_blank" class="btn btn-outline-primary btn-sm"><?php echo e($label); ?></a>
            <?php else: ?>
                <p class="text-muted">Tidak ada file.</p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        
        <div class="mb-3">
            <label for="file" class="form-label"><?php echo e(isset($dokumen) ? 'Ganti File (Opsional)' : 'Upload File'); ?></label>
            <input type="file" id="file" name="file"
                class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                accept=".pdf,.jpg,.jpeg,.png,.webp" <?php echo e(isset($dokumen) ? '' : 'required'); ?>>
            <small class="text-muted d-block">
                Format: PDF, JPG, PNG, WEBP • Max 20MB
                <?php echo e(isset($dokumen) ? '• Abaikan jika tidak ingin mengganti file.' : ''); ?>

            </small>

            <?php $__errorArgs = ['file'];
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

        
        <div class="mt-4 d-flex gap-2">
            <button type="button" id="btnSubmit" class="btn btn-primary">
                <?php echo e(isset($dokumen) ? 'Update Dokumen' : 'Simpan Dokumen'); ?>

            </button>
            <a href="<?php echo e(route('admin.transparansi.dokumen.index')); ?>" class="btn btn-secondary">Batal</a>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
document.getElementById('btnSubmit').addEventListener('click', function () {
    Swal.fire({
        title: '<?php echo e(isset($dokumen) ? "Update Dokumen?" : "Simpan Dokumen?"); ?>',
        text: "Pastikan semua data sudah sesuai.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<?php echo e(isset($dokumen) ? "Ya, Update!" : "Ya, Simpan!"); ?>',
        cancelButtonText: 'Batal'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('formDokumen').submit();
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/transparansi/dokumen/create.blade.php ENDPATH**/ ?>