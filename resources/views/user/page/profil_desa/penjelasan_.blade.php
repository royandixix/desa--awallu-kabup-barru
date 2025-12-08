<section class="bg-gray-50 ">
  <div class="container mx-auto px-6 md:px-10 lg:px-16 py-16 
              grid grid-cols-1 lg:grid-cols-3 gap-12 
              text-gray-800 leading-relaxed">

    <!-- Kolom Kiri -->
    <div class="lg:col-span-2 space-y-8">

      <!-- Sejarah Desa -->
      <h2 class="text-3xl font-bold text-green-700 mb-4">2.1.1 Sejarah Desa</h2>
      <div class="space-y-4">
        {!! nl2br(e($profilDesa->sejarah ?? 'Sejarah desa belum tersedia.')) !!}
      </div>

      <!-- Wilayah Administratif -->
      <h2 class="text-3xl font-bold text-green-700 mt-12 mb-4">2.1.2 Wilayah Administratif</h2>
      <p>
        {!! nl2br(e($profilDesa->wilayah_administratif ?? 'Data wilayah administratif belum tersedia.')) !!}
      </p>

      <!-- Batas Wilayah List -->
      <ul class="list-disc list-inside mb-6 space-y-1">
        <li><strong>Utara:</strong> {{ $profilDesa->batas_utara ?? '-' }}</li>
        <li><strong>Selatan:</strong> {{ $profilDesa->batas_selatan ?? '-' }}</li>
        <li><strong>Timur:</strong> {{ $profilDesa->batas_timur ?? '-' }}</li>
        <li><strong>Barat:</strong> {{ $profilDesa->batas_barat ?? '-' }}</li>
      </ul>

      @if($profilDesa->koordinat)
      @else($kordinat->time)
      <p>
        Secara geografis desa berada pada koordinat:
        <strong>{{ $profilDesa->koordinat }}</strong>
      </p>
      @endif

    </div>

    <!-- Kolom Kanan (Sidebar) -->
    <aside class="space-y-8">

      <!-- Informasi Desa -->
      <div>
        <h3 class="text-xl font-bold text-green-700 mb-2">Informasi Desa</h3>
        <ul class="space-y-1 text-gray-700 text-sm">
          <li><strong>Nama Desa:</strong> {{ $profilDesa->nama_desa ?? '-' }}</li>
          <li><strong>Kecamatan:</strong> {{ $profilDesa->kecamatan ?? '-' }}</li>
          <li><strong>Kabupaten:</strong> {{ $profilDesa->kabupaten ?? '-' }}</li>
        </ul>
      </div>

      <!-- Batas Wilayah Sidebar -->
      <div>
        <h3 class="text-xl font-bold text-green-700 mb-2">Batas Wilayah</h3>
        <ul class="space-y-1 text-gray-700 text-sm">
          <li><strong>Utara:</strong> {{ $profilDesa->batas_utara ?? '-' }}</li>
          <li><strong>Selatan:</strong> {{ $profilDesa->batas_selatan ?? '-' }}</li>
          <li><strong>Timur:</strong> {{ $profilDesa->batas_timur ?? '-' }}</li>
          <li><strong>Barat:</strong> {{ $profilDesa->batas_barat ?? '-' }}</li>
        </ul>
      </div>

      <!-- Map -->
      <div>
        <h3 class="text-xl font-bold text-green-700 mb-2">Lokasi Desa</h3>

        @if($profilDesa->koordinat)
        <iframe
          src="https://www.google.com/maps/embed?pb={{ $profilDesa->koordinat }}"
          width="100%"
          height="240"
          class="rounded-lg"
          style="border:0;"
          allowfullscreen
          loading="lazy">
        </iframe>
        @else
        <p class="text-gray-500 text-sm">Koordinat belum tersedia</p>
        @endif
      </div>

    </aside>

  </div>
</section>
