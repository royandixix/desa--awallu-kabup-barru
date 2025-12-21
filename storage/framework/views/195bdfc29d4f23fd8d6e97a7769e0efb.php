<?php $__env->startSection('title', 'Struktur Karang Taruna'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-3 py-md-4">

    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4"
                     style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">

                    <h2 class="text-white fw-bold mb-1">
                        <i class="fas fa-users me-2" style="color: #ffd700;"></i>
                        Struktur Karang Taruna
                    </h2>

                    <p class="text-white-50 mb-1 small">Kelola foto struktur Karang Taruna</p>

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
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="text-muted small mb-1">Jumlah Foto</p>
                    <h2 class="fw-bold"><?php echo e($karangTarunas->count()); ?></h2>
                </div>
            </div>
        </div>
    </div>

    
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">
            <i class="fas fa-images"></i> Daftar Foto Karang Taruna
        </h4>

        <a href="<?php echo e(route('admin.struktur.karang_taruna.create')); ?>" class="btn btn-dark">
            <i class="fas fa-upload"></i> Upload Foto
        </a>
    </div>

    
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="karangTarunaTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Tanggal Upload</th>
                            <th class="text-center" style="width: 130px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $karangTarunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>

                            <td>
                                <img src="<?php echo e(asset('karang_taruna/' . $item->gambar)); ?>"
                                     class="rounded"
                                     style="width: 80px; height: 80px; object-fit: cover;"
                                     alt="Karang Taruna"
                                     onerror="this.src='<?php echo e(asset('images/no-image.png')); ?>'">
                            </td>

                            <td>
                                <?php echo e($item->created_at ? $item->created_at->format('d/m/Y') : '-'); ?>

                            </td>

                            <td class="text-center">

                                <a href="<?php echo e(route('admin.struktur.karang_taruna.edit', $item->id)); ?>"
                                   class="btn btn-dark btn-sm me-1 btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="<?php echo e(route('admin.struktur.karang_taruna.destroy', $item->id)); ?>"
                                      method="POST"
                                      class="d-inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>

                                    <button type="button"
                                            class="btn btn-warning btn-sm btn-delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-center">-</td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


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
    $('#karangTarunaTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthChange: false,
        language: {
            emptyTable: "Belum ada foto Karang Taruna"
        }
    });

    // EDIT ALERT
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;

            Swal.fire({
                title: 'Edit Foto?',
                text: 'Kamu akan diarahkan ke halaman edit!',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Lanjut Edit',
                cancelButtonText: 'Batal'
            }).then(res => {
                if (res.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });

    // DELETE ALERT
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('form');

            Swal.fire({
                title: 'Hapus Foto?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(res => {
                if (res.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Documents/desaweb/resources/views/admin/page/struktur/karang_taruna/index.blade.php ENDPATH**/ ?>