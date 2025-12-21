<?php $__env->startSection('title', 'Data Dokumen Transparansi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Data Dokumen Transparansi</h3>
            <p class="text-muted mb-0">Daftar seluruh dokumen transparansi desa.</p>
        </div>

        <a href="<?php echo e(route('admin.transparansi.dokumen.create')); ?>" class="btn btn-primary">
            + Tambah Dokumen
        </a>
    </div>

    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Dokumen</p>
                    <h2 class="fw-bold"><?php echo e($dokumens->total()); ?></h2> 
                </div>
            </div>
        </div>
    </div>

    
    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">
            Tabel Dokumen Transparansi
        </div>
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Tahun</th>
                            <th>Tanggal</th>
                            <th>File</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $dokumens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="text-center">
                            <td><?php echo e($loop->iteration + ($dokumens->currentPage() - 1) * $dokumens->perPage()); ?></td>
                            <td class="text-start"><?php echo e($item->judul); ?></td>
                            <td>
                                <span class="badge bg-info"><?php echo e($item->jenis); ?></span>
                            </td>
                            <td><?php echo e($item->tahun); ?></td>
                            <td>
                                <?php echo e($item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') : '-'); ?>

                            </td>
                            <td>
                                <?php if($item->file): ?>
                                    <a href="<?php echo e(asset('uploads/dokumen/' . $item->file)); ?>" 
                                       class="btn btn-sm btn-success" 
                                       target="_blank">
                                        Lihat
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada file</span>
                                <?php endif; ?>
                            </td>
                            <td>

                                
                                <a href="<?php echo e(route('admin.transparansi.dokumen.edit', $item->id)); ?>" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                
                                <form action="<?php echo e(route('admin.transparansi.dokumen.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm btnHapus">Hapus</button>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">
                                Belum ada dokumen.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <?php echo e($dokumens->links()); ?>

        </div>
    </div>

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
    timer: 2000,
    showConfirmButton: false
})
</script>
<?php endif; ?>

<script>
    // Konfirmasi Hapus dengan SweetAlert
    document.querySelectorAll('.btnHapus').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault(); // hentikan submit form default
            let form = this.closest('form'); // ambil form terdekat

            Swal.fire({
                title: 'Hapus Dokumen?',
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit form jika dikonfirmasi
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/transparansi/dokumen/index.blade.php ENDPATH**/ ?>