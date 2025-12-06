@extends('user.layouts.app')
@section('title', 'Pengaduan Masyarakat')

@section('header_berita')
    @include('user.partials.header_pengaduan')
@endsection

@section('content')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="min-h-screen py-20 bg-gray-50">
  <div class="max-w-4xl mx-auto px-6">

    <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">Sampaikan Pengaduan Anda</h1>
    <p class="text-lg text-center mb-8 text-gray-600">
      Gunakan form ini untuk melaporkan keluhan, saran, atau masukan terkait pelayanan dan kegiatan di Desa Lawallu. Pastikan semua kolom diisi dengan lengkap.
    </p>

    {{-- ALERT SUKSES --}}
    @if(session('success'))
      <script>
        Swal.fire({
          icon: 'success',
          title: '<strong style="color: #15803d;">Berhasil Terkirim! 🎉</strong>',
          html: '<p style="font-size: 1.1rem; color: #374151; margin-top: 0.5rem;">{{ session('success') }}</p>',
          confirmButtonText: '✓ Oke, Mengerti',
          confirmButtonColor: '#84cc16',
          timer: 6000,
          timerProgressBar: true,
          showClass: {
            popup: 'animate__animated animate__bounceIn animate__faster'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOut animate__faster'
          },
          backdrop: `
            rgba(0,0,0,0.4)
            url("https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExbTlyeWJmZXc3YndrYWt6MWw2NW1nbnVoNzNxZ3V6N3JqZTFhaDh4diZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/Mab1lyzb70X0YiNLUj/giphy.gif")
            left top
            no-repeat
          `,
          customClass: {
            popup: 'swal-custom-popup',
            title: 'swal-custom-title',
            confirmButton: 'swal-custom-button'
          }
        });
      </script>
    @endif

    {{-- ALERT ERROR --}}
    @if($errors->any())
      <script>
        Swal.fire({
          icon: 'error',
          title: '<strong style="color: #dc2626;">⚠️ Oops! Ada Kesalahan</strong>',
          html: `
            <div style="background: #fef2f2; padding: 1rem; border-radius: 0.75rem; margin-top: 1rem; border-left: 4px solid #ef4444;">
              <p style="color: #991b1b; font-weight: 600; margin-bottom: 0.75rem; font-size: 0.95rem;">Mohon periksa kembali:</p>
              <ul style="text-align: left; list-style: none; padding-left: 0; color: #7f1d1d;">
                @foreach($errors->all() as $error)
                  <li style="padding: 0.4rem 0; display: flex; align-items: start;">
                    <span style="color: #ef4444; margin-right: 0.5rem; font-weight: bold;">✗</span>
                    <span>{{ $error }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          `,
          confirmButtonText: '✓ Perbaiki Sekarang',
          confirmButtonColor: '#ef4444',
          showClass: {
            popup: 'animate__animated animate__shakeX'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOut animate__faster'
          },
          backdrop: `
            rgba(0,0,0,0.5)
          `,
          customClass: {
            popup: 'swal-custom-popup',
            title: 'swal-custom-title',
            confirmButton: 'swal-custom-button'
          }
        });
      </script>
    @endif

    <form id="pengaduanForm" action="{{ route('user.pengaduan.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
      @csrf

      {{-- NAMA --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Anda"
          class="w-full mt-1 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-400 text-gray-900 shadow-sm transition"/>
      </div>

      {{-- NOMOR HP --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="Masukkan Nomor HP Anda"
          class="w-full mt-1 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-400 text-gray-900 shadow-sm transition"/>
      </div>

      {{-- FOTO BUKTI --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Foto Bukti</label>
        <input type="file" name="foto" id="foto" class="w-full mt-1 px-4 py-3 rounded-xl text-gray-900" accept="image/*">
        <img id="previewFoto" class="mt-2 w-32 h-32 object-cover rounded-xl hidden border" alt="Preview Foto">
      </div>

      {{-- KATEGORI --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="kategori" id="kategori"
          class="w-full mt-1 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-400 text-gray-900 shadow-sm transition">
          <option value="">- Pilih Kategori -</option>
          <option value="Pelayanan" {{ old('kategori') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
          <option value="Kependudukan" {{ old('kategori') == 'Kependudukan' ? 'selected' : '' }}>Kependudukan</option>
          <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
          <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
          <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
        </select>
      </div>

      {{-- PESAN --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Isi Pengaduan</label>
        <textarea name="pesan" id="pesan" rows="4" placeholder="Tulis pengaduan Anda..."
          class="w-full mt-1 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-400 text-gray-900 shadow-sm transition">{{ old('pesan') }}</textarea>
      </div>

      {{-- BUTTON LARAVEL STYLE --}}
      <div class="flex flex-col sm:flex-row justify-between gap-4 pt-4">
        <button type="reset" class="laravel-btn-secondary">
          Reset
        </button>

        <button type="submit" class="laravel-btn-primary">
          Kirim Pengaduan
        </button>
      </div>
    </form>
  </div>
</section>

{{-- SCRIPT PREVIEW FOTO & ALERT --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const fotoInput = document.getElementById('foto');
  const previewFoto = document.getElementById('previewFoto');

  fotoInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        previewFoto.src = e.target.result;
        previewFoto.classList.remove('hidden');
      }
      reader.readAsDataURL(file);
    } else {
      previewFoto.src = '';
      previewFoto.classList.add('hidden');
    }
  });
});
</script>

<style>
@keyframes slide-down { 0%{transform:translateY(-20px);opacity:0} 100%{transform:translateY(0);opacity:1} }
.animate-slide-down { animation: slide-down 0.5s ease forwards; }

/* LARAVEL BUTTON STYLES */
.laravel-btn-primary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.875rem 2rem;
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.5;
  text-align: center;
  color: #ffffff;
  background-color: #1f2937;
  border: 1px solid transparent;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.laravel-btn-primary:hover {
  background-color: #111827;
  transform: translateY(-1px);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.laravel-btn-primary:active {
  transform: translateY(0);
}

.laravel-btn-secondary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.875rem 2rem;
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.5;
  text-align: center;
  color: #1f2937;
  background-color: transparent;
  border: 1.5px solid #d1d5db;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.laravel-btn-secondary:hover {
  background-color: #f9fafb;
  border-color: #9ca3af;
  transform: translateY(-1px);
}

.laravel-btn-secondary:active {
  transform: translateY(0);
}
</style>
@endsection