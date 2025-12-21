<?php $__env->startSection('title', 'Tambah UMKM'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h3 class="mb-4">Tambah UMKM Baru</h3>
    <p class="text-muted mb-3">Masukkan informasi UMKM desa.</p>

    <form id="formTambahUMKM" action="<?php echo e(route('admin.home.umkm.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <div class="mb-3">
            <label for="nama_pengusaha" class="form-label">Nama Pengusaha</label>
            <input type="text" id="nama_pengusaha" name="nama_pengusaha"
                class="form-control <?php $__errorArgs = ['nama_pengusaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('nama_pengusaha')); ?>" placeholder="Budi Santoso" required>
            <?php $__errorArgs = ['nama_pengusaha'];
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
            <label for="nama_usaha" class="form-label">Nama Usaha</label>
            <input type="text" id="nama_usaha" name="nama_usaha"
                class="form-control <?php $__errorArgs = ['nama_usaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('nama_usaha')); ?>" placeholder="Keripik Singkong Mak Budi" required>
            <?php $__errorArgs = ['nama_usaha'];
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
            <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
            <input type="text" id="jenis_usaha" name="jenis_usaha"
                class="form-control <?php $__errorArgs = ['jenis_usaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('jenis_usaha')); ?>" placeholder="Kuliner / Makanan Ringan" required>
            <?php $__errorArgs = ['jenis_usaha'];
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
            <label for="deskripsi" class="form-label">Deskripsi UMKM</label>
            <textarea id="deskripsi" name="deskripsi"
                class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                rows="4" placeholder="Usaha pembuatan keripik singkong renyah dengan bahan alami"><?php echo e(old('deskripsi')); ?></textarea>
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
            <label for="alamat" class="form-label">Alamat</label>
            <textarea id="alamat" name="alamat"
                class="form-control <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                rows="2" placeholder="Jl. Raya Desa No.12, Kecamatan X, Kabupaten Y"><?php echo e(old('alamat')); ?></textarea>
            <?php $__errorArgs = ['alamat'];
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
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" id="kontak" name="kontak"
                class="form-control <?php $__errorArgs = ['kontak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('kontak')); ?>" placeholder="081234567890 / email@example.com">
            <?php $__errorArgs = ['kontak'];
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
            <label for="harga" class="form-label">Harga</label>
            <input type="text" id="harga" name="harga"
                class="form-control <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('harga')); ?>" placeholder="Rp 0">
            <?php $__errorArgs = ['harga'];
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
            <label for="foto_umkm" class="form-label">Foto UMKM</label>
            <input type="file" id="foto_umkm" name="foto_umkm" class="form-control" accept="image/*">
            <div class="mt-2">
                <img id="preview_umkm" class="img-thumbnail" style="display:none; width:150px; height:100px; object-fit:cover;">
            </div>
        </div>

        
        <div class="mb-3">
            <label for="foto_pengusaha" class="form-label">Foto Pengusaha</label>
            <input type="file" id="foto_pengusaha" name="foto_pengusaha" class="form-control" accept="image/*">
            <div class="mt-2">
                <img id="preview_pengusaha" class="img-thumbnail" style="display:none; width:150px; height:100px; object-fit:cover;">
            </div>
        </div>

        
        <div class="mb-3">
            <label for="kode_umkm" class="form-label">Kode UMKM</label>
            <input type="text" id="kode_umkm" name="kode_umkm"
                class="form-control <?php $__errorArgs = ['kode_umkm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('kode_umkm')); ?>" placeholder="UMKM001" required>
            <?php $__errorArgs = ['kode_umkm'];
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

        
        <button type="button" id="btnSimpan" class="btn btn-primary">Simpan UMKM</button>
        <a href="<?php echo e(route('admin.home.umkm.index')); ?>" class="btn btn-secondary">Batal</a>
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
});
</script>
<?php endif; ?>

<script>
// Konfirmasi Simpan
document.getElementById('btnSimpan').addEventListener('click', function() {
    Swal.fire({
        title: 'Simpan UMKM?',
        text: "Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if(result.isConfirmed){
            document.getElementById('formTambahUMKM').submit();
        }
    });
});

// Format Rupiah
const hargaInput = document.getElementById('harga');
hargaInput.addEventListener('input', function() {
    let value = this.value.replace(/\D/g,'');
    this.value = value ? 'Rp ' + parseInt(value).toLocaleString('id-ID') : '';
});

// Preview Foto UMKM
const fotoUMKM = document.getElementById('foto_umkm');
const previewUMKM = document.getElementById('preview_umkm');
fotoUMKM.addEventListener('change', function() {
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => {
            previewUMKM.src = e.target.result;
            previewUMKM.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        previewUMKM.style.display = 'none';
    }
});

// Preview Foto Pengusaha
const fotoPengusaha = document.getElementById('foto_pengusaha');
const previewPengusaha = document.getElementById('preview_pengusaha');
fotoPengusaha.addEventListener('change', function() {
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => {
            previewPengusaha.src = e.target.result;
            previewPengusaha.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        previewPengusaha.style.display = 'none';
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/home/umkm/create.blade.php ENDPATH**/ ?>