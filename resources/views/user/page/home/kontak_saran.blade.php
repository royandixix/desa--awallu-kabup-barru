<!-- KONTAK & SARAN -->
<div class="mx-auto max-w-7xl px-6 lg:px-8">
  
  <!-- === JUDUL === -->
  <div class="text-center mb-12 mt-20">
    <h2 class="text-3xl text-gray-800 sm:text-4xl  tracking-tight">Kontak & Saran</h2>
    <div class="mx-auto mt-3 mb-6 h-1 w-24 bg-green-600 rounded-full"></div>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
      Hubungi kami untuk pertanyaan, saran, atau informasi lebih lanjut tentang Desa Lawallu.
    </p>
  </div>

  <!-- === KONTEN: MAP + FORM === -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-20">

    <!-- 🗺️ PETA INTERAKTIF -->
    <div class="relative rounded-2xl overflow-hidden border-4 border-green-700 shadow-lg group">
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

    <!-- 💬 FORM KONTAK INTERAKTIF -->
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100 transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
      <form action="#" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap"
              class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required>
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" placeholder="Masukkan Email"
              class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required>
          </div>
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-2">Subjek</label>
          <input type="text" name="subjek" placeholder="Subjek Pesan"
            class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required>
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-2">Pesan</label>
          <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda..."
            class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 p-3" required></textarea>
        </div>

        <div class="text-right">
          <button type="submit"
            class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95">
            Kirim
          </button>
        </div>
      </form>
    </div>

  </div>
</div>
