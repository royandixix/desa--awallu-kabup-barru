<?php $__env->startSection('title','Edit UMKM'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h3 class="mb-4">Edit UMKM</h3>

    <form id="formEditUMKM" action="<?php echo e(route('admin.home.umkm.update', $umkm->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="mb-3">
            <label for="nama_pengusaha">Nama Pengusaha</label>
            <input type="text" id="nama_pengusaha" name="nama_pengusaha" 
                class="form-control <?php $__errorArgs = ['nama_pengusaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                value="<?php echo e(old('nama_pengusaha', $umkm->nama_pengusaha)); ?>" required>
            <?php $__errorArgs = ['nama_pengusaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3">
            <label for="foto_pengusaha">Foto Pengusaha</label>
            <input type="file" id="foto_pengusaha" name="foto_pengusaha" class="form-control" accept="image/*">
            <div class="mt-2">
                <img id="previewPengusaha" src="<?php echo e($umkm->foto_pengusaha ? asset($umkm->foto_pengusaha) : '#'); ?>" 
                    style="<?php echo e($umkm->foto_pengusaha ? '' : 'display:none;'); ?>; width:150px; height:100px; object-fit:cover;" 
                    class="img-thumbnail">
            </div>
        </div>

        
        <div class="mb-3">
            <label for="nama_usaha">Nama Usaha</label>
            <input type="text" id="nama_usaha" name="nama_usaha" 
                class="form-control <?php $__errorArgs = ['nama_usaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                value="<?php echo e(old('nama_usaha', $umkm->nama_usaha)); ?>" required>
            <?php $__errorArgs = ['nama_usaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3">
            <label for="jenis_usaha">Jenis Usaha</label>
            <input type="text" id="jenis_usaha" name="jenis_usaha" 
                class="form-control <?php $__errorArgs = ['jenis_usaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                value="<?php echo e(old('jenis_usaha', $umkm->jenis_usaha)); ?>" required>
            <?php $__errorArgs = ['jenis_usaha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" 
                class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"><?php echo e(old('deskripsi', $umkm->deskripsi)); ?></textarea>
            <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" 
                class="form-control <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="2"><?php echo e(old('alamat', $umkm->alamat)); ?></textarea>
            <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3">
            <label for="kontak">Kontak</label>
            <input type="text" id="kontak" name="kontak" 
                class="form-control <?php $__errorArgs = ['kontak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                value="<?php echo e(old('kontak', $umkm->kontak)); ?>">
            <?php $__errorArgs = ['kontak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3">
            <label for="harga">Harga</label>
            <input type="text" id="harga" name="harga" 
                class="form-control <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                value="<?php echo e(old('harga', $umkm->harga ? 'Rp '.number_format($umkm->harga,0,',','.') : '')); ?>" placeholder="Rp 0">
            <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3">
            <label for="foto_umkm">Foto UMKM</label>
            <input type="file" id="foto_umkm" name="foto_umkm" class="form-control" accept="image/*">
            <div class="mt-2">
                <img id="previewUMKM" src="<?php echo e($umkm->foto_umkm ? asset($umkm->foto_umkm) : '#'); ?>" 
                    style="<?php echo e($umkm->foto_umkm ? '' : 'display:none;'); ?>; width:150px; height:100px; object-fit:cover;" 
                    class="img-thumbnail">
            </div>
        </div>

        
        <div class="mb-3">
            <label for="kode_umkm">Kode UMKM</label>
            <input type="text" id="kode_umkm" name="kode_umkm" 
                class="form-control <?php $__errorArgs = ['kode_umkm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                value="<?php echo e(old('kode_umkm', $umkm->kode_umkm)); ?>">
            <?php $__errorArgs = ['kode_umkm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div id="produkContainer" class="mb-3">
            <h5>Produk UMKM</h5>
            <?php $__currentLoopData = old('produk', $umkm->produk->toArray()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="produk-item mb-3 border p-3 rounded bg-light">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold">Produk</span>
                    <button type="button" class="btn btn-danger btn-sm remove-produk">Hapus</button>
                </div>
                <label>Nama Produk</label>
                <input type="text" name="produk[nama][]" class="form-control mb-1" value="<?php echo e($produk['nama'] ?? ''); ?>">
                <label>Harga</label>
                <input type="text" name="produk[harga][]" class="form-control mb-1" value="<?php echo e(isset($produk['harga']) ? 'Rp '.number_format($produk['harga'],0,',','.') : ''); ?>">
                <label>Deskripsi</label>
                <textarea name="produk[deskripsi][]" class="form-control mb-1"><?php echo e($produk['deskripsi'] ?? ''); ?></textarea>
                <label>Foto Produk</label>
                <input type="file" name="produk[foto][]" class="form-control">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button type="button" id="tambahProduk" class="btn btn-primary btn-sm mb-3">Tambah Produk</button>

        
        <div class="d-flex gap-2">
            <button type="button" id="btnSimpan" class="btn btn-success flex-grow-1">Simpan UMKM</button>
            <a href="<?php echo e(route('admin.home.umkm.index')); ?>" class="btn btn-secondary flex-grow-1">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi simpan
    document.getElementById('btnSimpan').addEventListener('click', function(){
        Swal.fire({
            title: 'Simpan UMKM?',
            text: 'Pastikan semua data sudah benar.',
            icon: 'warning',
            showCancelButton:true,
            confirmButtonText:'Ya, Simpan!',
            cancelButtonText:'Batal'
        }).then(result => {
            if(result.isConfirmed){
                document.getElementById('formEditUMKM').submit();
            }
        });
    });

    // Preview gambar UMKM
    const fotoUMKM = document.getElementById('foto_umkm');
    const previewUMKM = document.getElementById('previewUMKM');
    fotoUMKM.addEventListener('change', function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = e => { previewUMKM.src = e.target.result; previewUMKM.style.display = 'block'; }
            reader.readAsDataURL(file);
        } else { previewUMKM.src='#'; previewUMKM.style.display='none'; }
    });

    // Preview gambar Pengusaha
    const fotoPengusaha = document.getElementById('foto_pengusaha');
    const previewPengusaha = document.getElementById('previewPengusaha');
    fotoPengusaha.addEventListener('change', function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = e => { previewPengusaha.src = e.target.result; previewPengusaha.style.display = 'block'; }
            reader.readAsDataURL(file);
        } else { previewPengusaha.src='#'; previewPengusaha.style.display='none'; }
    });

    // Tambah produk dinamis
    document.getElementById('tambahProduk').addEventListener('click', function(){
        const container = document.getElementById('produkContainer');
        const firstItem = container.querySelector('.produk-item');
        const clone = firstItem.cloneNode(true);
        clone.querySelectorAll('input, textarea').forEach(i => i.value='');
        container.appendChild(clone);

        clone.querySelector('.remove-produk').addEventListener('click', function(){ clone.remove(); });
    });

    // Remove produk
    document.getElementById('produkContainer').addEventListener('click', function(e){
        if(e.target && e.target.classList.contains('remove-produk')){
            e.target.closest('.produk-item').remove();
        }
    });

    // Format harga Rupiah
    function formatRupiah(input){
        let value = input.value.replace(/\D/g,'');
        input.value = value ? 'Rp '+parseInt(value).toLocaleString('id-ID') : '';
    }

    document.getElementById('harga').addEventListener('input', function(){ formatRupiah(this); });
    document.querySelectorAll('input[name="produk[harga][]"]').forEach(input=>{
        input.addEventListener('input', function(){ formatRupiah(this); });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/home/umkm/edit.blade.php ENDPATH**/ ?>