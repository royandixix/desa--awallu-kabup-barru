@extends('user.layouts.app')
@section('title', 'Berita Desa Lawallu')

@section('header_berita')
    @include('user.partials.navbar')
    @include('user.partials.header_berita')
@endsection

@section('content')
<section class="min-h-screen bg-gray-50 py-20">
  <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-10">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Form Pengaduan</h1>
    <p class="text-gray-600 text-center mb-8">
      Silakan isi form di bawah ini untuk menyampaikan saran, masukan, atau pengaduan Anda.
    </p>

    {{-- Alert sukses (dummy, hanya muncul saat klik tombol kirim) --}}
    <div id="alertSuccess" class="hidden mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-center">
      Pesan Anda berhasil dikirim (dummy mode, belum tersambung ke backend)
    </div>

    <form id="pengaduanForm" action="#" method="POST" class="space-y-6">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-lime-500 focus:border-lime-500" placeholder="Masukkan nama Anda">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-lime-500 focus:border-lime-500" placeholder="Masukkan email Anda">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Pesan</label>
        <textarea name="pesan" id="pesan" rows="4" class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-lime-500 focus:border-lime-500" placeholder="Tulis pesan Anda..."></textarea>
      </div>

      <div class="text-center">
        <button type="submit" class="px-8 py-3 bg-lime-600 text-white rounded-lg font-semibold hover:bg-lime-700 transition">
          Kirim Pengaduan
        </button>
      </div>
    </form>
  </div>
</section>

{{-- Script supaya tombol kirim muncul alert dummy --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('pengaduanForm');
  const alertBox = document.getElementById('alertSuccess');

  form.addEventListener('submit', (e) => {
    e.preventDefault(); // stop form refresh

    // validasi sederhana
    const nama = document.getElementById('nama').value.trim();
    const email = document.getElementById('email').value.trim();
    const pesan = document.getElementById('pesan').value.trim();

    if (!nama || !email || !pesan) {
      alert('Semua field wajib diisi!');
      return;
    }

    // tampilkan alert sukses dummy
    alertBox.classList.remove('hidden');

    // reset form
    form.reset();

    // hilangkan alert setelah 3 detik
    setTimeout(() => {
      alertBox.classList.add('hidden');
    }, 3000);
  });
});
</script>
@endsection
