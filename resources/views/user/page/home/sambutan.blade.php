<div class="w-full min-h-screen bg-white flex flex-col items-center justify-center px-6 lg:px-16 py-16 relative overflow-hidden">

    <!-- Background circle blur -->
    <div class="absolute top-[-10%] left-1/2 w-[600px] h-[600px] bg-green-200/20 rounded-full blur-3xl -translate-x-1/2"></div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-8 items-start w-full max-w-7xl relative z-10">

        <!-- Container teks (Judul + Isi) -->
        <div class="flex flex-col justify-start space-y-6 lg:pr-6 order-1 lg:order-1">
            <!-- Judul dengan efek typing loop + garis kursor -->
            <h1 class="text-5xl lg:text-6xl mb-2">
                <span id="typing-title"></span><span class="cursor">|</span>
            </h1>

            <!-- Mobile: gambar muncul setelah judul -->
            <div class="flex justify-center items-start w-full lg:hidden">
                <img src="{{ asset('img/DESA_LAWALLU/FOTO KEPALA DESA DAN IBU KEPALA DESA/foto kepala desa dan ibu kepala desa.jpg') }}" 
                     alt="Foto Sambutan"
                     class="w-full max-w-sm rounded-xl shadow-2xl ring-1 ring-gray-200 object-cover transform transition-transform duration-500 hover:scale-105 hover:shadow-3xl hover:ring-green-200" />
            </div>

            <!-- Isi teks sambutan -->
            <p class="text-lg text-gray-800 leading-relaxed fade-up">
                Assalamu'alaikum Warahmatullahi Wabarakatuh<br>
                Selamat datang di Website Resmi Desa Lawallu. Website ini kami hadirkan sebagai sarana informasi dan komunikasi antara pemerintah desa dan masyarakat. Harapan kami, website ini dapat menjadi media transparansi, pelayanan publik, dan promosi potensi desa. Kami mengajak seluruh warga untuk bersama-sama membangun Desa Lawallu agar semakin maju, mandiri, dan sejahtera.
            </p>
            <p class="text-lg text-gray-800 leading-relaxed font-medium fade-up">Berikut ini adalah beberapa fitur yang ada di website kami:</p>

            <ul class="list-disc list-inside space-y-1 fade-up">
                <li><span class="text-green-600 font-semibold">Galeri:</span> Menampilkan foto-foto kegiatan</li>
                <li><span class="text-green-600 font-semibold">Transparansi:</span> Menampilkan laporan</li>
                <li><span class="text-green-600 font-semibold">Berita:</span> Menampilkan berita terbaru</li>
                <li><span class="text-green-600 font-semibold">Pengaduan:</span> Fitur untuk mengajukan pengaduan</li>
            </ul>
        </div>

        <!-- Gambar untuk desktop (lg+) -->
        <div class="hidden lg:flex justify-center items-start fade-right order-2 lg:order-2">
            <img src="{{ asset('img/DESA_LAWALLU/FOTO KEPALA DESA DAN IBU KEPALA DESA/foto kepala desa dan ibu kepala desa.jpg') }}" 
                 alt="Foto Sambutan"
                 class="w-full max-w-xl rounded-xl shadow-2xl ring-1 ring-gray-200 object-cover transform transition-transform duration-500 hover:scale-105 hover:shadow-3xl hover:ring-green-200" />
        </div>

    </div>
</div>

<!-- Animasi Tailwind + Scroll + Typing -->
<style>
    /* Animasi scroll */
    @keyframes fadeUp {0%{opacity:0;transform:translateY(40px);}100%{opacity:1;transform:translateY(0);}}
    @keyframes fadeLeft {0%{opacity:0;transform:translateX(-60px);}100%{opacity:1;transform:translateX(0);}}
    @keyframes fadeRight {0%{opacity:0;transform:translateX(60px);}100%{opacity:1;transform:translateX(0);}}

    .fade-up, .fade-left, .fade-right {opacity:0; transition: all 1s ease-out;}
    .show.fade-up {animation:fadeUp 1s ease-out forwards;}
    .show.fade-left {animation:fadeLeft 1s ease-out forwards;}
    .show.fade-right {animation:fadeRight 1s ease-out forwards;}

    /* Cursor blink */
    .cursor {
        display: inline-block;
        width: 1ch;
        animation: blink 0.7s step-end infinite;
        color: #16a34a;
    }
    @keyframes blink {
        0%, 50%, 100% {opacity:1;}
        25%, 75% {opacity:0;}
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", ()=>{
    // Scroll animation
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add("show");
                observer.unobserve(entry.target);
            }
        });
    }, {threshold: 0.2});

    document.querySelectorAll('.fade-up, .fade-left, .fade-right').forEach(el => observer.observe(el));

    // Typing loop dengan cursor
    const title = "Sambutan Kepala Desa";
    const el = document.getElementById("typing-title");
    let index = 0;
    let forward = true; // arah typing
    const speed = 80; // lebih cepat

    function typeLoop(){
        el.textContent = title.slice(0, index);

        if(forward){
            index++;
            if(index > title.length){
                forward = false;
                setTimeout(typeLoop, 1000); // pause sebelum hapus
            } else {
                setTimeout(typeLoop, speed);
            }
        } else {
            index--;
            if(index < 0){
                forward = true;
                setTimeout(typeLoop, 500); // pause sebelum mulai lagi
            } else {
                setTimeout(typeLoop, speed);
            }
        }
    }

    typeLoop();
});
</script>
