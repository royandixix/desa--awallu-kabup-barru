<section class="bg-gray-50">
  <div class="container mx-auto px-6 md:px-10 lg:px-16 py-16 
              grid grid-cols-1 lg:grid-cols-3 gap-12 
              text-gray-800 leading-relaxed">

    <!-- Kolom Kiri -->
    <div class="lg:col-span-2 space-y-8">

      <!-- Sejarah Desa -->
      <h2 class="text-3xl font-bold text-green-700 mb-4">2.1.1 Sejarah Desa</h2>
      <div class="space-y-4">
        <?php echo nl2br(e($profilDesa?->sejarah ?? 'Sejarah desa belum tersedia.')); ?>

      </div>

      <!-- Wilayah Administratif -->
      <h2 class="text-3xl font-bold text-green-700 mt-12 mb-4">2.1.2 Wilayah Administratif</h2>
      <p>
        <?php echo nl2br(e($profilDesa?->wilayah_administratif ?? 'Data wilayah administratif belum tersedia.')); ?>

      </p>

      <!-- Batas Wilayah List -->
      <ul class="list-disc list-inside mb-6 space-y-1">
        <li><strong>Utara:</strong> <?php echo e($profilDesa?->batas_utara ?? '-'); ?></li>
        <li><strong>Selatan:</strong> <?php echo e($profilDesa?->batas_selatan ?? '-'); ?></li>
        <li><strong>Timur:</strong> <?php echo e($profilDesa?->batas_timur ?? '-'); ?></li>
        <li><strong>Barat:</strong> <?php echo e($profilDesa?->batas_barat ?? '-'); ?></li>
      </ul>

      <!-- Koordinat -->
      <?php if(!empty($profilDesa?->koordinat)): ?>
        <p>
          Secara geografis desa berada pada koordinat:
          <strong><?php echo e($profilDesa->koordinat); ?></strong>
        </p>
      <?php else: ?>
        <p class="text-gray-500">Koordinat belum tersedia.</p>
      <?php endif; ?>

    </div>

    <!-- Kolom Kanan (Sidebar) -->
    <aside class="space-y-8">

      <!-- Informasi Desa -->
      <div>
        <h3 class="text-xl font-bold text-green-700 mb-2">Informasi Desa</h3>
        <ul class="space-y-1 text-gray-700 text-sm">
          <li><strong>Nama Desa:</strong> <?php echo e($profilDesa?->nama_desa ?? '-'); ?></li>
          <li><strong>Kecamatan:</strong> <?php echo e($profilDesa?->kecamatan ?? '-'); ?></li>
          <li><strong>Kabupaten:</strong> <?php echo e($profilDesa?->kabupaten ?? '-'); ?></li>
        </ul>
      </div>

      <!-- Batas Wilayah Sidebar -->
      <div>
        <h3 class="text-xl font-bold text-green-700 mb-2">Batas Wilayah</h3>
        <ul class="space-y-1 text-gray-700 text-sm">
          <li><strong>Utara:</strong> <?php echo e($profilDesa?->batas_utara ?? '-'); ?></li>
          <li><strong>Selatan:</strong> <?php echo e($profilDesa?->batas_selatan ?? '-'); ?></li>
          <li><strong>Timur:</strong> <?php echo e($profilDesa?->batas_timur ?? '-'); ?></li>
          <li><strong>Barat:</strong> <?php echo e($profilDesa?->batas_barat ?? '-'); ?></li>
        </ul>
      </div>

      <!-- Map -->
      <div>
        <h3 class="text-xl font-bold text-green-700 mb-2">Lokasi Desa</h3>

        <?php if(!empty($profilDesa?->koordinat)): ?>
          <iframe
            src="https://www.google.com/maps/embed?pb=<?php echo e($profilDesa->koordinat); ?>"
            width="100%"
            height="240"
            class="rounded-lg"
            style="border:0;"
            allowfullscreen
            loading="lazy">
          </iframe>
        <?php else: ?>
          <p class="text-gray-500 text-sm">Koordinat belum tersedia</p>
        <?php endif; ?>
      </div>

    </aside>

  </div>
</section>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/page/profil_desa/penjelasan_.blade.php ENDPATH**/ ?>