<?php $__env->startSection('title', 'Edit Laporan Kegiatan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="mb-4">
        <h3 class="fw-bold">Edit Laporan Kegiatan</h3>
        <p class="text-muted">Perbarui data laporan beserta foto atau berkas jika diperlukan.</p>
    </div>

    
    <form id="formEditLaporan" action="<?php echo e(route('admin.transparansi.laporan.update', $laporan->id)); ?>" method="POST" enctype="multipart/form-data"
        class="card shadow-sm p-4 rounded-3 border-0">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="mb-3">
            <label for="judul" class="form-label fw-semibold">Judul Laporan</label>
            <input type="text" id="judul" name="judul"
                class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('judul', $laporan->judul)); ?>" required>
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
            <label for="deskripsi" class="form-label fw-semibold">Deskripsi Laporan</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('deskripsi', $laporan->deskripsi)); ?></textarea>
            <small class="text-muted d-block">Tuliskan keterangan lengkap terkait laporan kegiatan.</small>
            <?php $__errorArgs = ['deskripsi'];
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
            <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi"
                class="form-control <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('lokasi', $laporan->lokasi)); ?>" required>
            <?php $__errorArgs = ['lokasi'];
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
            <label for="anggaran" class="form-label fw-semibold">Anggaran</label>
            <input type="text" id="anggaran" name="anggaran"
                class="form-control <?php $__errorArgs = ['anggaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('anggaran', $laporan->anggaran)); ?>">
            <small class="text-muted d-block">Masukkan jumlah, otomatis format Rupiah.</small>
            <?php $__errorArgs = ['anggaran'];
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
                value="<?php echo e(old('tanggal', $laporan->tanggal)); ?>" required>
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
            <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
            <?php if($laporan->foto): ?>
                <a href="<?php echo e(asset('uploads/laporan/foto/' . $laporan->foto)); ?>" target="_blank">
                    <img src="<?php echo e(asset('uploads/laporan/foto/' . $laporan->foto)); ?>" width="100" class="rounded mb-2">
                </a>
            <?php else: ?>
                <p class="text-muted">Tidak ada foto.</p>
            <?php endif; ?>
        </div>

        
        <div class="mb-3">
            <label for="foto" class="form-label fw-semibold">Ganti Foto (Opsional)</label>
            <input type="file" id="foto" name="foto" class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
            <small class="text-muted d-block">Abaikan jika tidak ingin mengganti foto.</small>
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
        </div>

        
        <div class="mb-3">
            <label class="form-label fw-semibold d-block">Berkas Saat Ini</label>
            <?php if($laporan->file_path): ?>
                <?php
                    $ext = strtolower(pathinfo($laporan->file_path, PATHINFO_EXTENSION));
                    $fileLabel = match($ext) {
                        'pdf' => 'Lihat PDF',
                        default => 'Lihat Berkas',
                    };
                ?>
                <a href="<?php echo e(asset('uploads/laporan/file/' . $laporan->file_path)); ?>" target="_blank" class="btn btn-outline-primary btn-sm"><?php echo e($fileLabel); ?></a>
            <?php else: ?>
                <p class="text-muted">Tidak ada berkas.</p>
            <?php endif; ?>
        </div>

        
        <div class="mb-3">
            <label for="file_path" class="form-label fw-semibold">Ganti Berkas (Opsional)</label>
            <input type="file" id="file_path" name="file_path" class="form-control <?php $__errorArgs = ['file_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".pdf,.doc,.docx">
            <small class="text-muted d-block">Abaikan jika tidak ingin mengganti berkas. Format: PDF/DOC • Max: 10MB</small>
            <?php $__errorArgs = ['file_path'];
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
            <button type="button" id="btnUpdateLaporan" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update Laporan
            </button>
            <a href="<?php echo e(route('admin.transparansi.laporan.index')); ?>" class="btn btn-secondary">
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
document.getElementById('btnUpdateLaporan').addEventListener('click', function() {
    Swal.fire({
        title: 'Update Laporan?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEditLaporan').submit();
        }
    });
});

// Format Rupiah realtime
const anggaranInput = document.getElementById('anggaran');
anggaranInput.addEventListener('input', function(e) {
    let value = this.value.replace(/\D/g,''); // hapus non-digit
    if(value) {
        value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(value);
    }
    this.value = value;
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/transparansi/laporan/edit.blade.php ENDPATH**/ ?>