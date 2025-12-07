@extends('user.layouts.app')
@section('title', 'Pengaduan Masyarakat')

@section('header_berita')
    @include('user.partials.header_pengaduan')
@endsection

@section('content')
<!-- SweetAlert2 & Animate.css CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="min-h-screen py-20 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
  <div class="max-w-5xl mx-auto px-6">

    <!-- Header Section -->
    <div class="text-center mb-12">
      
      <h1 class="text-5xl font-bold mb-4 bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
        Sampaikan Pengaduan Anda
      </h1>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Gunakan form ini untuk melaporkan keluhan, saran, atau masukan terkait pelayanan dan kegiatan di Desa Lawallu
      </p>
    </div>

    {{-- ALERT SUKSES --}}
    @if(session('success'))
      <script>
        Swal.fire({
          html: `
            <div style="text-align: center; padding: 1rem;">
              <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <svg style="width: 60px; height: 60px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              </div>
              <h2 style="font-size: 1.75rem; font-weight: 700; color: #047857; margin-bottom: 0.75rem;">Pengaduan Terkirim!</h2>
              <p style="font-size: 1.1rem; color: #6b7280; line-height: 1.6;">{{ session('success') }}</p>
            </div>
          `,
          confirmButtonText: 'Mengerti',
          confirmButtonColor: '#10b981',
          timer: 5000,
          timerProgressBar: true,
          showClass: {
            popup: 'animate__animated animate__fadeInDown animate__faster'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp animate__faster'
          },
          customClass: {
            popup: 'swal-modern-popup',
            confirmButton: 'swal-modern-button'
          }
        });
      </script>
    @endif

    {{-- ALERT ERROR --}}
    @if($errors->any())
      <script>
        Swal.fire({
          html: `
            <div style="text-align: center; padding: 1rem;">
              <div style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <svg style="width: 60px; height: 60px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
              </div>
              <h2 style="font-size: 1.75rem; font-weight: 700; color: #dc2626; margin-bottom: 1rem;">Ada Kesalahan</h2>
              <div style="background: #fef2f2; padding: 1.25rem; border-radius: 1rem; margin-top: 1rem; border-left: 4px solid #ef4444; text-align: left;">
                <p style="color: #991b1b; font-weight: 600; margin-bottom: 0.75rem; font-size: 1rem;">Mohon periksa kembali:</p>
                <ul style="list-style: none; padding-left: 0; color: #7f1d1d;">
                  @foreach($errors->all() as $error)
                    <li style="padding: 0.5rem 0; display: flex; align-items: start; font-size: 0.95rem;">
                      <span style="color: #ef4444; margin-right: 0.5rem; font-weight: bold; font-size: 1.1rem;">•</span>
                      <span>{{ $error }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          `,
          confirmButtonText: 'Perbaiki',
          confirmButtonColor: '#ef4444',
          showClass: {
            popup: 'animate__animated animate__headShake'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOut animate__faster'
          },
          customClass: {
            popup: 'swal-modern-popup',
            confirmButton: 'swal-modern-button'
          }
        });
      </script>
    @endif

    <!-- Form Card -->
    <div>
      <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-white">Form Pengaduan</h2>
            <p class="text-blue-100 text-sm">Lengkapi data di bawah ini</p>
          </div>
        </div>
      </div>

      <form id="pengaduanForm" action="{{ route('user.pengaduan.store') }}" method="POST" class="p-8 space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          {{-- NAMA --}}
          <div class="form-group">
            <label class="form-label">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
              Nama Lengkap
            </label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap Anda" class="form-input"/>
          </div>

          {{-- NOMOR HP --}}
          <div class="form-group">
            <label class="form-label">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
              </svg>
              Nomor HP
            </label>
            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="Contoh: 08123456789" class="form-input"/>
          </div>
        </div>

        {{-- KATEGORI --}}
        <div class="form-group">
          <label class="form-label">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Kategori Pengaduan
          </label>
          <select name="kategori" id="kategori" class="form-input">
            <option value="">-- Pilih Kategori --</option>
            <option value="Pelayanan" {{ old('kategori') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
            <option value="Kependudukan" {{ old('kategori') == 'Kependudukan' ? 'selected' : '' }}>Kependudukan</option>
            <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
            <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
            <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
          </select>
        </div>

        {{-- FOTO BUKTI --}}
        <div class="form-group">
          <label class="form-label">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Foto Bukti (Opsional)
          </label>
          <div class="relative">
            <input type="file" name="foto" id="foto" class="form-input-file" accept="image/*">
            <div class="mt-4 hidden" id="previewContainer">
              <div class="relative inline-block">
                <img id="previewFoto" class="w-full max-w-md h-64 object-cover rounded-2xl border-4 border-gray-200 shadow-lg" alt="Preview Foto">
                <button type="button" id="removePreview" class="absolute -top-3 -right-3 w-10 h-10 bg-red-500 hover:bg-red-600 text-white rounded-full shadow-lg transition-all hover:scale-110 flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        {{-- PESAN --}}
        <div class="form-group">
          <label class="form-label">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Isi Pengaduan
          </label>
          <textarea name="pesan" id="pesan" rows="5" placeholder="Jelaskan pengaduan Anda secara detail..." class="form-input resize-none">{{ old('pesan') }}</textarea>
          <p class="text-sm text-gray-500 mt-2">Minimal 20 karakter</p>
        </div>

        {{-- BUTTONS --}}
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
          <button type="button" id="btnReset" class="btn-secondary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Reset Form
          </button>

          <button type="submit" class="btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
            </svg>
            Kirim Pengaduan
          </button>
        </div>
      </form>
    </div>

    <!-- Info Box -->
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6">
      <div class="flex gap-4">
        <div class="flex-shrink-0">
          <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
        </div>
        <div>
          <h3 class="font-semibold text-gray-800 mb-2">Informasi Penting</h3>
          <ul class="text-sm text-gray-600 space-y-1">
            <li>• Pengaduan akan diproses maksimal 3x24 jam</li>
            <li>• Pastikan nomor HP yang dimasukkan aktif untuk konfirmasi</li>
            <li>• Foto bukti akan membantu mempercepat proses verifikasi</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- JAVASCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const fotoInput = document.getElementById('foto');
  const previewFoto = document.getElementById('previewFoto');
  const previewContainer = document.getElementById('previewContainer');
  const removePreview = document.getElementById('removePreview');
  const btnReset = document.getElementById('btnReset');

  // Preview Foto
  fotoInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      if (file.size > 5000000) { // 5MB
        Swal.fire({
          html: `
            <div style="text-align: center; padding: 1rem;">
              <div style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <svg style="width: 60px; height: 60px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
              </div>
              <h2 style="font-size: 1.75rem; font-weight: 700; color: #d97706; margin-bottom: 0.75rem;">Ukuran File Terlalu Besar</h2>
              <p style="font-size: 1rem; color: #6b7280;">Maksimal ukuran file adalah 5MB</p>
            </div>
          `,
          confirmButtonText: 'Mengerti',
          confirmButtonColor: '#f59e0b',
          customClass: {
            popup: 'swal-modern-popup',
            confirmButton: 'swal-modern-button'
          }
        });
        this.value = '';
        return;
      }

      const reader = new FileReader();
      reader.onload = e => {
        previewFoto.src = e.target.result;
        previewContainer.classList.remove('hidden');
      }
      reader.readAsDataURL(file);
    }
  });

  // Remove Preview
  removePreview.addEventListener('click', function() {
    fotoInput.value = '';
    previewFoto.src = '';
    previewContainer.classList.add('hidden');
  });

  // Reset Button
  btnReset.addEventListener('click', function() {
    Swal.fire({
      html: `
        <div style="text-align: center; padding: 1rem;">
          <div style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
            <svg style="width: 60px; height: 60px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
          </div>
          <h2 style="font-size: 1.75rem; font-weight: 700; color: #1f2937; margin-bottom: 0.75rem;">Reset Form?</h2>
          <p style="font-size: 1rem; color: #6b7280; line-height: 1.6;">Semua data yang sudah diisi akan dihapus dan tidak dapat dikembalikan</p>
        </div>
      `,
      showCancelButton: true,
      confirmButtonText: 'Ya, Reset',
      cancelButtonText: 'Batal',
      confirmButtonColor: '#ef4444',
      cancelButtonColor: '#6b7280',
      reverseButtons: true,
      showClass: {
        popup: 'animate__animated animate__zoomIn animate__faster'
      },
      customClass: {
        popup: 'swal-modern-popup',
        confirmButton: 'swal-modern-button',
        cancelButton: 'swal-modern-button-cancel'
      }
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('nama').value = '';
        document.getElementById('no_hp').value = '';
        document.getElementById('foto').value = '';
        document.getElementById('kategori').value = '';
        document.getElementById('pesan').value = '';
        previewFoto.src = '';
        previewContainer.classList.add('hidden');
        
        Swal.fire({
          html: `
            <div style="text-align: center; padding: 1rem;">
              <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                <svg style="width: 45px; height: 45px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              </div>
              <h2 style="font-size: 1.5rem; font-weight: 700; color: #047857; margin-bottom: 0.5rem;">Form Berhasil Direset</h2>
              <p style="font-size: 0.95rem; color: #6b7280;">Anda dapat mengisi ulang dari awal</p>
            </div>
          `,
          confirmButtonText: 'OK',
          confirmButtonColor: '#10b981',
          timer: 2000,
          timerProgressBar: true,
          showClass: {
            popup: 'animate__animated animate__fadeIn animate__faster'
          },
          customClass: {
            popup: 'swal-modern-popup-small',
            confirmButton: 'swal-modern-button'
          }
        });
      }
    });
  });
});
</script>

<style>
/* Form Styles */
.form-group {
  position: relative;
}

.form-label {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.95rem;
  font-weight: 600;
  color: #374151;
  margin-bottom: 0.5rem;
}

.form-input {
  width: 100%;
  padding: 0.875rem 1rem;
  font-size: 1rem;
  color: #1f2937;
  background-color: #f9fafb;
  border: 2px solid #e5e7eb;
  border-radius: 1rem;
  transition: all 0.2s ease;
  outline: none;
}

.form-input:focus {
  background-color: #ffffff;
  border-color: #3b82f6;
  box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.form-input:hover {
  border-color: #d1d5db;
}

.form-input-file {
  width: 100%;
  padding: 0.875rem 1rem;
  font-size: 0.95rem;
  color: #6b7280;
  background-color: #f9fafb;
  border: 2px dashed #d1d5db;
  border-radius: 1rem;
  cursor: pointer;
  transition: all 0.2s ease;
}

.form-input-file:hover {
  border-color: #3b82f6;
  background-color: #eff6ff;
}

/* Button Styles */
.btn-primary {
  flex: 1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  font-size: 1rem;
  font-weight: 600;
  color: #ffffff;
  background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
  border: none;
  border-radius: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3), 0 2px 4px -1px rgba(59, 130, 246, 0.2);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4), 0 4px 6px -2px rgba(59, 130, 246, 0.3);
  background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
}

.btn-primary:active {
  transform: translateY(0);
}

.btn-secondary {
  flex: 1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  font-size: 1rem;
  font-weight: 600;
  color: #4b5563;
  background-color: #ffffff;
  border: 2px solid #e5e7eb;
  border-radius: 1rem;
  cursor: pointer;
  transition: all 0.2s ease;
}

.btn-secondary:hover {
  background-color: #f9fafb;
  border-color: #d1d5db;
  transform: translateY(-1px);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.btn-secondary:active {
  transform: translateY(0);
}

/* SweetAlert Custom Styles */
.swal-modern-popup {
  border-radius: 1.5rem !important;
  padding: 2.5rem !important;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
  border: 1px solid rgba(0, 0, 0, 0.05) !important;
}

.swal-modern-popup-small {
  border-radius: 1.25rem !important;
  padding: 2rem !important;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15) !important;
}

.swal-modern-button {
  padding: 0.875rem 2.5rem !important;
  font-size: 1rem !important;
  font-weight: 600 !important;
  border-radius: 1rem !important;
  border: none !important;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
  transition: all 0.2s ease !important;
}

.swal-modern-button:hover {
  transform: translateY(-2px) !important;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15) !important;
}

.swal-modern-button-cancel {
  padding: 0.875rem 2.5rem !important;
  font-size: 1rem !important;
  font-weight: 600 !important;
  border-radius: 1rem !important;
  border: none !important;
  transition: all 0.2s ease !important;
}

.swal-modern-button-cancel:hover {
  transform: translateY(-2px) !important;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
}

/* Animations */
@keyframes fadeInScale {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.form-group {
  animation: slideUp 0.5s ease forwards;
}

.form-group:nth-child(1) { animation-delay: 0.1s; opacity: 0; }
.form-group:nth-child(2) { animation-delay: 0.2s; opacity: 0; }
.form-group:nth-child(3) { animation-delay: 0.3s; opacity: 0; }
.form-group:nth-child(4) { animation-delay: 0.4s; opacity: 0; }
.form-group:nth-child(5) { animation-delay: 0.5s; opacity: 0; }

/* Responsive */
@media (max-width: 640px) {
  .btn-primary, .btn-secondary {
    padding: 0.875rem 1.5rem;
    font-size: 0.95rem;
  }
  
  .form-label {
    font-size: 0.875rem;
  }
  
  .form-input {
    padding: 0.75rem 0.875rem;
    font-size: 0.95rem;
  }
}
</style>
@endsection