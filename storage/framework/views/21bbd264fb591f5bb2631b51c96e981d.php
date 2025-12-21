<?php $__env->startSection('title', 'Edit Dokumen BUMDes & KOPDes'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="mb-4">
        <h3 class="fw-bold">Edit Dokumen BUMDes & KOPDes</h3>
        <p class="text-muted">Perbarui data dokumen transparansi beserta file-nya jika diperlukan.</p>
    </div>

    
    <form id="formEditBumdes" action="<?php echo e(route('admin.transparansi.bumdes.update', $bumde->id)); ?>" method="POST"
        enctype="multipart/form-data" class="card shadow-sm p-4 rounded-3 border-0">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="mb-3">
            <label for="judul" class="form-label fw-semibold">Judul Dokumen</label>
            <input type="text" id="judul" name="judul"
                class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('judul', $bumde->judul)); ?>" required>
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
            <label for="kategori" class="form-label fw-semibold">Kategori</label>
            <select id="kategori" name="kategori"
                class="form-select <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="BUMDes" <?php if(($bumde->kategori ?? old('kategori')) == 'BUMDes'): ?> selected <?php endif; ?>>BUMDes</option>
                <option value="KOPDes" <?php if(($bumde->kategori ?? old('kategori')) == 'KOPDes'): ?> selected <?php endif; ?>>KOPDes</option>
            </select>
            <?php $__errorArgs = ['kategori'];
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
            <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('tanggal', $bumde->tanggal)); ?>" required>
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

        
        <div class="mb-3">
            <label class="form-label fw-semibold d-block">File Saat Ini</label>
            <?php if($bumde->file): ?>
                <?php
                    $ext = strtolower(pathinfo($bumde->file, PATHINFO_EXTENSION));
                    $fileLabel = match($ext) {
                        'pdf' => 'Lihat PDF',
                        'jpg','jpeg','png','webp' => 'Lihat Gambar',
                        'xls','xlsx' => 'Lihat Excel',
                        default => 'Lihat File',
                    };
                    $fileUrl = ($ext == 'xls' || $ext == 'xlsx')
                        ? 'https://view.officeapps.live.com/op/embed.aspx?src='.urlencode(asset('uploads/bumdes/' . $bumde->file))
                        : asset('uploads/bumdes/' . $bumde->file);
                ?>
                <a href="<?php echo e($fileUrl); ?>" target="_blank" class="btn btn-outline-primary btn-sm"><?php echo e($fileLabel); ?></a>
            <?php else: ?>
                <p class="text-muted">Tidak ada file.</p>
            <?php endif; ?>
        </div>

        
        <div class="mb-3">
            <label for="file" class="form-label fw-semibold">Ganti File Dokumen (Opsional)</label>
            <input type="file" id="file" name="file"
                class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                accept=".pdf,.jpg,.jpeg,.png,.webp,.xls,.xlsx">
            <small class="text-muted d-block">
                Abaikan jika tidak ingin mengganti file. Format: PDF/Gambar/Excel • Max: 10MB
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
            <button type="button" id="btnUpdateBumdes" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update Dokumen
            </button>
            <a href="<?php echo e(route('admin.transparansi.bumdes.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-times me-1"></i> Batal
            </a>
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
    text: '<?php echo e(session('success')); ?>',
    timer: 1500,
    showConfirmButton: false
});
</script>
<?php endif; ?>

<script>
// Konfirmasi Update
document.getElementById('btnUpdateBumdes').addEventListener('click', function() {
    Swal.fire({
        title: 'Update Dokumen?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEditBumdes').submit();
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/transparansi/bumdes/edit.blade.php ENDPATH**/ ?>