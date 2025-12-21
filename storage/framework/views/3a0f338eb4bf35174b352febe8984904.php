<!-- 🌿 KONTAK & SARAN SECTION -->
<!-- ======================== -->
<div class="mx-auto max-w-7xl px-6 lg:px-8">
  
  <!-- === JUDUL === -->
  <div class="text-center mb-12 mt-20">
    <h2 class="text-3xl text-gray-800 sm:text-4xl tracking-tight font-bold">
      Kontak & Saran
    </h2>
    <div class="mx-auto mt-3 mb-6 h-1 w-24 bg-green-600 rounded-full"></div>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
      Hubungi kami untuk pertanyaan, saran, atau informasi lebih lanjut tentang Desa Lawallu.
    </p>
  </div>

  <!-- === KONTEN: MAP + FORM === -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-20">

    <!-- 🗺️ PETA INTERAKTIF -->
    <div class="relative overflow-hidden group rounded-2xl shadow-lg">
      <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-4">
        <a href="https://goo.gl/maps/qdm9Y9emAJmG7zvQ8" target="_blank"
           class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-full shadow-md transition-all duration-300">
          🗺️ Buka di Google Maps
        </a>
      </div>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.9833782971821!2d119.64912476948616!3d-4.444431902680951!2m3!1f40!2f0!3f10!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbbc74d2b4b7a8f%3A0xe6f7b3e2721dbd8b!2sDesa%20Lawallu%2C%20Barru!5e0!3m2!1sid!2sid!4v1698235555555"
        class="w-full h-[500px] grayscale-[20%] group-hover:grayscale-0 group-hover:scale-105 transition-transform duration-500 ease-out"
        style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

    <!-- 💬 FORM KONTAK -->
    <form action="<?php echo e(route('user.kontak.store')); ?>" method="POST" class="space-y-6" id="contactForm">
      <?php echo csrf_field(); ?>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
          <input type="text" name="nama" value="<?php echo e(old('nama')); ?>" placeholder="Masukkan Nama Lengkap"
            class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required>
          <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-2">Email</label>
          <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Masukkan Email"
            class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required>
          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-2">Subjek</label>
        <input type="text" name="subjek" value="<?php echo e(old('subjek')); ?>" placeholder="Subjek Pesan"
          class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required>
        <?php $__errorArgs = ['subjek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-2">Pesan</label>
        <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda..."
          class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required><?php echo e(old('pesan')); ?></textarea>
        <?php $__errorArgs = ['pesan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="text-right">
        <button type="submit"
          class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95">
          Kirim
        </button>
      </div>
    </form>

  </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Success Message -->
<?php if(session('success')): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '<?php echo e(session('success')); ?>',
    showConfirmButton: false,
    timer: 2500,
    timerProgressBar: true,
    toast: true,
    position: 'top-end',
    background: '#d4edda',
    iconColor: '#28a745',
    customClass: {
      popup: 'colored-toast'
    }
  });
</script>
<?php endif; ?>

<!-- SweetAlert Error Message -->
<?php if(session('error')): ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: '<?php echo e(session('error')); ?>',
    showConfirmButton: true,
    confirmButtonColor: '#dc3545'
  });
</script>
<?php endif; ?>

<!-- Style untuk SweetAlert Toast -->
<style>
  .colored-toast.swal2-icon-success {
    background-color: #d4edda !important;
  }
</style<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/home/kontak_saran.blade.php ENDPATH**/ ?>