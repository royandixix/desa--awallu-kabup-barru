<?php $__env->startSection('title', 'Transparansi Laporan Kegiatan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);">
                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-clipboard-list me-2" style="color: #ffd700;"></i>
                        Data Laporan Kegiatan
                    </h2>
                    <p class="text-white-50 mb-1 small">Kelola laporan kegiatan dengan mudah</p>
                    <p class="text-white-50 mb-0 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        <?php echo e(\Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm hover-shadow">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Laporan</p>
                    <h2 class="fw-bold"><?php echo e($laporan->total()); ?></h2>
                </div>
            </div>
        </div>
    </div>

    
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-folder-open"></i> Daftar Laporan Kegiatan
        </h4>
        <a href="<?php echo e(route('admin.transparansi.laporan.create')); ?>" class="btn btn-dark shadow-sm">
            <i class="fas fa-plus-circle"></i> Tambah Laporan
        </a>
    </div>

    
    <div class="card shadow-sm hover-shadow">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="laporanTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Anggaran</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>File</th>
                            <th class="text-center" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($row->judul); ?></td>
                            <td><?php echo e(Str::limit($row->deskripsi, 50, '...')); ?></td>
                            <td><?php echo e($row->lokasi); ?></td>
                            <td>Rp <?php echo e(number_format($row->anggaran ?? 0,0,',','.')); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($row->tanggal)->format('d-m-Y')); ?></td>

                            
                            <td>
                                <?php if($row->foto && file_exists(public_path('uploads/laporan/foto/' . $row->foto))): ?>
                                    <a href="<?php echo e(asset('uploads/laporan/foto/' . $row->foto)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('uploads/laporan/foto/' . $row->foto)); ?>" width="60" class="rounded">
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada</span>
                                <?php endif; ?>
                            </td>

                            
                            <td>
                                <?php if($row->file_path && file_exists(public_path('uploads/laporan/file/' . $row->file_path))): ?>
                                    <a href="<?php echo e(asset('uploads/laporan/file/' . $row->file_path)); ?>" target="_blank">
                                        <i class="fas fa-file-pdf text-danger"></i> Lihat
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada</span>
                                <?php endif; ?>
                            </td>

                            
                            <td class="text-center">
                                <a href="<?php echo e(route('admin.transparansi.laporan.edit', $row->id)); ?>" class="btn btn-dark btn-sm me-1 btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('admin.transparansi.laporan.destroy', $row->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data laporan</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="mt-3">
                    <?php echo e($laporan->links()); ?>

                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session('success')): ?>
<script>
Swal.fire({
    title: "Berhasil!",
    text: "<?php echo e(session('success')); ?>",
    icon: "success",
    timer: 1600,
    showConfirmButton: false
});
</script>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // DATATABLE
    $('#laporanTable').DataTable({
        responsive: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        pageLength: 10,
        lengthChange: false,
        language: { emptyTable: "Belum ada laporan kegiatan" }
    });

    // EDIT SWEETALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;
            Swal.fire({
                title: 'Edit Laporan?',
                text: 'Kamu akan diarahkan ke halaman edit!',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Lanjut Edit',
                cancelButtonText: 'Batal'
            }).then(result => {
                if(result.isConfirmed) window.location.href = url;
            });
        });
    });

    // DELETE SWEETALERT
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Laporan?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(result => {
                if(result.isConfirmed) form.submit();
            });
        });
    });

});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/transparansi/laporan/index.blade.php ENDPATH**/ ?>