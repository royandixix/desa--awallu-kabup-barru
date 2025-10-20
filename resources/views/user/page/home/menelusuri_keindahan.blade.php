<section class="video-hero d-flex align-items-center position-relative overflow-hidden">

  <!-- 🔹 Background YouTube Fullscreen -->
  <div class="video-bg-wrapper">
    <iframe
      class="video-bg"
      src="https://www.youtube.com/embed/b8itw7A3dMI?autoplay=1&mute=1&loop=1&playlist=b8itw7A3dMI&controls=0&showinfo=0&modestbranding=1"
      title="Video Desa Batupute"
      frameborder="0"
      allow="autoplay; fullscreen"
      allowfullscreen>
    </iframe>
  </div>

  <!-- 🔹 Overlay -->
  <div class="video-overlay position-absolute top-0 start-0 w-100 h-100"></div>

  <!-- 🔹 Konten -->
  <div class="container position-relative z-3 text-center text-white px-3">
    <h2 class="video-title scroll-animate" data-animation="fade-in" data-delay="0.5s">
      Menelusuri Keindahan Tersembunyi Desa Batupute
    </h2>
    <p class="video-subtitle scroll-animate" data-animation="slide-up" data-delay="0.8s">
      Desa Batupute menyimpan keindahan yang tak banyak orang tahu — semuanya terekam dalam video berikut.
    </p>

    <div class="video-buttons mt-4 scroll-animate" data-animation="fade-in" data-delay="1.1s">
      <a href="#" class="btn-video-play" id="playVideo">
        <span class="play-circle">
          <svg width="70" height="70" viewBox="0 0 64 64">
            <circle cx="32" cy="32" r="30" fill="rgba(255,255,255,0.7)" />
            <polygon points="26,20 26,44 46,32" fill="#10b981"/>
          </svg>
        </span>
      </a>
    </div>
  </div>
</section>

<!-- 🔹 Popup Video Modal -->
<div class="popup-video" id="popupVideo">
  <div class="popup-inner">
    <button class="close-btn" id="closeVideo">&times;</button>
    <iframe
      id="youtubeFrame"
      src=""
      allow="autoplay; encrypted-media"
      allowfullscreen>
    </iframe>
  </div>
</div>

<style>
/* ========= SECTION VIDEO ========= */
.video-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.video-bg-wrapper {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 120%;
  height: 120%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  z-index: 1;
  transition: transform 2.5s ease;
}

.video-bg-wrapper:hover {
  transform: translate(-50%, -50%) scale(1.02);
}

.video-bg {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100vw;
  height: 56.25vw;
  min-height: 100vh;
  min-width: 177.77vh;
  transform: translate(-50%, -50%);
  pointer-events: none;
  transition: transform 2.5s ease;
}

.video-overlay {
  background: rgba(0,0,0,0.35);
  z-index: 2;
  transition: background 2s ease;
}

.z-3 { z-index: 3; }

/* ========= TEXT ========= */
.video-title {
  font-size: clamp(2.2rem, 5vw, 3.5rem);

  color: #fff;
  margin-bottom: 1rem;
  line-height: 1.3;
  transform: translateY(40px) scale(0.95);
  opacity: 0;
  transition: all 1.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.video-subtitle {
  font-size: 1.2rem;
  max-width: 650px;
  margin: 0 auto;
  color: #e2e8f0;
  transform: translateY(40px) scale(0.95);
  opacity: 0;
  transition: all 1.5s cubic-bezier(0.23, 1, 0.32, 1);
}

/* ========= BUTTON ========= */
.btn-video-play {
  display: inline-block;
  cursor: pointer;
  animation: pulse 3s infinite;
  transition: transform 0.5s ease;
}
.btn-video-play:hover { transform: scale(1.2); }

@keyframes pulse {
  0% { transform: scale(1); opacity: 0.9; }
  50% { transform: scale(1.12); opacity: 1; }
  100% { transform: scale(1); opacity: 0.9; }
}

/* ========= POPUP VIDEO MODAL ========= */
.popup-video {
  display: none;
  align-items: center;
  justify-content: center;
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.95);
  z-index: 9999;
  opacity: 0;
  transition: opacity 0.5s ease;
}
.popup-video.show { display: flex; opacity: 1; }

.popup-inner {
  position: relative;
  width: 80%;
  max-width: 900px;
  aspect-ratio: 16 / 9;
  background: #000;
  border-radius: 12px;
  overflow: hidden;
  transform: scale(0.85);
  opacity: 0;
  transition: all 0.7s ease;
}
.popup-video.show .popup-inner {
  transform: scale(1);
  opacity: 1;
}

.popup-inner iframe {
  width: 100%;
  height: 100%;
  border: none;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 15px;
  z-index: 2;
  background: rgba(255,255,255,0.8);
  color: #000;
  border: none;
  padding: 6px 12px;
  font-size: 1.3rem;
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.3s ease;
}
.close-btn:hover { background: #fff; }

/* ========= SCROLL ANIMATIONS ========= */
.scroll-animate {
  opacity: 0;
  transform: translateY(40px) scale(0.95);
  transition: all 1.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.scroll-animate.in-view {
  opacity: 1;
  transform: translateY(0) scale(1);
}

/* ========= RESPONSIVE ========= */
@media (max-width:768px) {
  .video-title { font-size: 2rem; }
  .video-subtitle { font-size: 1rem; }
  .popup-inner { width: 95%; aspect-ratio: 16 / 9; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const playBtn = document.getElementById("playVideo");
  const popup = document.getElementById("popupVideo");
  const closeBtn = document.getElementById("closeVideo");
  const iframe = document.getElementById("youtubeFrame");

  // Tombol play buka modal
  playBtn.addEventListener("click", (e) => {
    e.preventDefault();
    popup.classList.add("show");
    iframe.src = "https://www.youtube.com/embed/b8itw7A3dMI?autoplay=1";
  });

  // Close modal
  closeBtn.addEventListener("click", () => {
    popup.classList.remove("show");
    iframe.src = "";
  });

  // Klik luar modal untuk close
  popup.addEventListener("click", (e) => {
    if(e.target === popup){
      popup.classList.remove("show");
      iframe.src = "";
    }
  });

  // ===== Scroll animations =====
  const scrollElements = document.querySelectorAll('.scroll-animate');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        setTimeout(() => {
          entry.target.classList.add('in-view');
        }, parseFloat(entry.target.dataset.delay) * 1000);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  scrollElements.forEach(el => observer.observe(el));
});
</script>
