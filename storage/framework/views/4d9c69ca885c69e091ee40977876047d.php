<?php $__env->startSection('title', 'Data UMKM'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h3 class="mb-4">Daftar UMKM</h3>

    
    <div class="mb-3">
        <a href="<?php echo e(route('admin.home.umkm.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah UMKM Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pengusaha</th>
                    <th>Foto Pengusaha</th>
                    <th>Nama Usaha</th>
                    <th>Jenis Usaha</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Harga</th>
                    <th>Foto UMKM</th>
                    <th>Kode UMKM</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $umkms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($umkms->firstItem() + $index); ?></td>
                        <td><?php echo e($item->nama_pengusaha ?? '-'); ?></td>
                        <td>
                            <?php if($item->foto_pengusaha): ?>
                                <img src="<?php echo e(asset($item->foto_pengusaha)); ?>" class="img-thumbnail" style="width:60px; height:60px; object-fit:cover;">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($item->nama_usaha ?? '-'); ?></td>
                        <td><?php echo e($item->jenis_usaha ?? '-'); ?></td>
                        <td class="text-start"><?php echo e($item->deskripsi ?? '-'); ?></td>
                        <td class="text-start"><?php echo e($item->alamat ?? '-'); ?></td>
                        <td><?php echo e($item->kontak ?? '-'); ?></td>
                        <td>
                            <?php if($item->harga): ?>
                                Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?>

                            <?php else: ?>
                                <span class="text-muted">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($item->foto): ?>
                                <img src="<?php echo e(asset($item->foto)); ?>" class="img-thumbnail" style="width:60px; height:40px; object-fit:cover;">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($item->kode_umkm ?? '-'); ?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?php echo e(route('admin.home.umkm.edit', $item)); ?>" class="btn btn-dark btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('admin.home.umkm.destroy', $item)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus UMKM ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="12" class="text-center text-muted">Belum ada data UMKM</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="mt-3">
        <?php echo e($umkms->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Notifikasi sukses
    <?php if(session('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?php echo e(session("success")); ?>',
        });
    <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/home/umkm/index.blade.php ENDPATH**/ ?>