<!-- Swiper CSS -->
<link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="bg-gray-50 ">
  <div class="container mx-auto px-6 md:px-10 lg:px-16 py-16">
    
    <!-- Slider Gambar -->
    @if(isset($profilDesa) && $profilDesa->gambar_header)
    <div class="w-full mb-12">
      <div class="swiper mySwiper w-full overflow-hidden ">
        
        <div class="swiper-wrapper">
          @foreach(json_decode($profilDesa->gambar_header) as $img)
          <div class="swiper-slide">
            <img src="{{ asset('uploads/profil_desa/' . $img) }}"
                 class="w-full h-[360px] md:h-[420px] lg:h-[520px] 
                        object-cover object-center"
                 alt="{{ $profilDesa->judul ?? 'Profil Desa' }}">
          </div>
          @endforeach
        </div>

        <!-- Navigasi -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Bullet Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
    @else
    <div class="text-center py-16">
      <p class="text-gray-500">Belum ada gambar untuk Profil Desa</p>
    </div>
    @endif

    <!-- Judul & Deskripsi -->
    <div class="text-center">
      <h1 class="text-3xl md:text-4xl font-extrabold text-green-700 mb-6">
        {{ $profilDesa->judul ?? 'Judul belum tersedia' }}
      </h1>

     <p class="text-left text-gray-600 text-base md:text-lg leading-relaxed">
  {{ $profilDesa->deskripsi_singkat ?? 'Deskripsi singkat belum tersedia' }}
</p>

    </div>

  </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 3200,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    speed: 650,
  });
</script>