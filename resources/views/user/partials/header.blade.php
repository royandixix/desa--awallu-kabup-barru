<header>
  @include('user.partials.navbar')

  <!-- Hero Section -->
  <section class="hero d-flex align-items-center position-relative">

    <!-- Background Overlay -->
    <div class="hero-bg position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <div class="container position-relative z-3 text-center">

      <!-- Badge Welcome -->
      <div class="hero-badge animate-fade-in mb-4">
        <span class="badge-pill">
          <i class="bi bi-geo-alt-fill me-2"></i>
          Selamat Datang di Desa Batupute
        </span>
      </div>

      <!-- Main Title -->
      <h1 class="hero-title animate-slide-up mb-3">
        <span class="title-primary">Smart</span>
        <span class="title-highlight">Digital Platform</span>
      </h1>

      <!-- Subtitle -->
      <p class="hero-subtitle animate-slide-up mb-3">
        Media Informasi & Komunikasi Warga
      </p>

      <!-- Description -->
      <p class="hero-description animate-slide-up mb-5 mx-auto">
        Platform digital desa yang menyediakan layanan informasi terkini, transparansi kegiatan pemerintahan, dan berbagai layanan publik untuk masyarakat Desa Batupute, Kecamatan Soppeng Riaja, Kabupaten Barru.
      </p>

      <!-- CTA Buttons -->
      <div class="hero-buttons animate-slide-up mb-5">
        <a href="#" class="btn btn-hero btn-primary me-2 mb-2">
          <span>Lihat Galeri</span>
          <i class="bi bi-arrow-right ms-2"></i>
        </a>
        <a href="#" class="btn btn-hero btn-secondary mb-2">
          <span>Layanan Publik</span>
        </a>
      </div>

    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4">
      <div class="scroll-mouse">
        <div class="scroll-wheel"></div>
      </div>
    </div>

  </section>
</header>

<style>
/* Hero Base */
.hero { min-height:100vh; position:relative; overflow:hidden; padding:140px 0 100px; }
.hero-bg { background: url('{{ asset("img/user/kantor-bupati-barru_169.jpeg") }}') center/cover no-repeat fixed; z-index:1; }
.hero-overlay { background: rgba(0,0,0,0.65); z-index:2; }
.z-3 { z-index:3; }

/* Badge */
.hero-badge { display:inline-block; }
.badge-pill { display:inline-flex; align-items:center; background: rgba(0, 0, 0, 0.65); border:1px solid rgba(255,255,255,0.3); color:#fff; padding:0.5rem 1.2rem; border-radius:50px; font-size:0.9rem; font-weight:500; }

/* Hero Title */
.hero-title { font-size:clamp(3rem,6vw,4rem); font-weight:900; line-height:1.2; margin-bottom:1rem; color:#fff; }
.title-primary { display:block; }
.title-highlight { display:block; background: linear-gradient(135deg,#10b981 0%,#22c55e 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }

/* Subtitle & Description */
.hero-subtitle { font-size:1.5rem; font-weight:500; color:#e2e8f0; }
.hero-description { font-size:1.15rem; line-height:1.8; color:#cbd5e1; max-width:650px; margin:auto; }

/* Buttons */
.btn-hero { padding:1rem 2.5rem; font-size:1.05rem; font-weight:600; border-radius:12px; transition: all 0.3s ease; display:inline-flex; align-items:center; text-decoration:none; border:none; }
.btn-primary { background:linear-gradient(135deg,#10b981 0%,#22c55e 100%); color:#fff; box-shadow:0 12px 35px rgba(16,185,129,0.4); }
.btn-primary:hover { transform:translateY(-2px); box-shadow:0 18px 50px rgba(16,185,129,0.45); background:linear-gradient(135deg,#059669 0%,#10b981 100%); }
.btn-secondary { background:transparent; color:#e2e8f0; border:2px solid rgba(226,232,240,0.3); }
.btn-secondary:hover { background: rgba(226,232,240,0.15); border-color: rgba(226,232,240,0.5); transform:translateY(-2px); color:#fff; }

/* Animations */
.animate-fade-in { opacity:0; animation: fadeIn 0.8s forwards; animation-delay:0.2s; }
.animate-slide-up { opacity:0; transform:translateY(30px); animation: slideUp 0.8s forwards; }
@keyframes fadeIn{ to{opacity:1;} }
@keyframes slideUp{ to{opacity:1; transform:translateY(0);} }

/* Scroll Indicator */
.scroll-indicator { z-index:3; }
.scroll-mouse { width:30px;height:50px;border:2px solid rgba(226,232,240,0.6);border-radius:20px;display:flex;justify-content:center;padding-top:8px;animation: scrollBounce 2s infinite; }
.scroll-wheel { width:4px;height:8px;background:#60a5fa;border-radius:2px;animation: scrollWheel 2s infinite; }
@keyframes scrollBounce{0%,100%{transform:translateY(0);}50%{transform:translateY(10px);} }
@keyframes scrollWheel{0%,100%{opacity:1;transform:translateY(0);}50%{opacity:0;transform:translateY(10px);} }

/* Responsive */
@media (max-width:768px){
  .hero-title{font-size:2.5rem;}
  .hero-subtitle{font-size:1.3rem;}
  .hero-description{font-size:1rem;}
  .btn-hero{width:100%; justify-content:center; margin-bottom:0.5rem;}
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const slideElements = document.querySelectorAll('.animate-slide-up');
  slideElements.forEach((el,index) => el.style.animationDelay = `${0.2 + (0.15*index)}s`);

  const scrollIndicator = document.querySelector('.scroll-indicator');
  if(scrollIndicator){
    scrollIndicator.addEventListener('click',()=> window.scrollTo({top:window.innerHeight, behavior:'smooth'}));
  }
});
</script>
