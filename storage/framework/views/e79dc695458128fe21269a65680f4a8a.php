


<?php echo $__env->make('user.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- 🌅 Hero Section: Struktur Desa -->
<section
    class="relative min-h-[60vh] flex flex-col justify-center items-center text-white overflow-hidden font-sans 
           bg-gradient-to-r from-teal-900 via-emerald-800 to-emerald-700">

    
    <div class="absolute inset-0 bg-[url('/img/bg-struktur.jpg')] bg-cover bg-center opacity-25"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-teal-900/60 via-emerald-800/50 to-emerald-700/70 backdrop-blur-sm"></div>

    
    <div class="relative z-10 text-center px-6 sm:px-10 max-w-3xl" data-aos="fade-up" data-aos-duration="1200">
        
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-4">
            <?php switch($halaman):
                case ('pemerintahan_desa'): ?> Struktur Kepergurusan Pemerintah Desa <?php break; ?>
                <?php case ('bpd'): ?> Badan Permusyawaratan Desa (BPD) <?php break; ?>
                <?php case ('pkk'): ?> PKK Desa <?php break; ?>
                <?php case ('lpm'): ?> LPM Desa <?php break; ?>
                <?php case ('karang_taruna'): ?> Karang Taruna <?php break; ?>
                <?php case ('posyandu'): ?> Posyandu Desa <?php break; ?>
                <?php default: ?> Struktur Desa Lawallu
            <?php endswitch; ?>
        </h1>

        
        <p class="text-emerald-100/80 text-base md:text-lg leading-relaxed mb-6">
            <?php switch($halaman):
                case ('pemerintahan_desa'): ?> Menampilkan susunan Pemerintah Desa beserta jabatan dan tugas masing-masing. <?php break; ?>
                <?php case ('bpd'): ?> Badan Permusyawaratan Desa (BPD) yang berfungsi sebagai lembaga perwakilan masyarakat. <?php break; ?>
                <?php case ('pkk'): ?> Tim PKK Desa Lawallu yang mengelola kegiatan pemberdayaan keluarga. <?php break; ?>
                <?php case ('lpm'): ?> Lembaga Pemberdayaan Masyarakat (LPM) yang memfasilitasi program pembangunan desa. <?php break; ?>
                <?php case ('karang_taruna'): ?> Organisasi Karang Taruna untuk kegiatan sosial dan kepemudaan di desa. <?php break; ?>
                <?php case ('posyandu'): ?> Posyandu Desa sebagai pusat pelayanan kesehatan ibu dan anak. <?php break; ?>
                <?php default: ?> Menyajikan data struktur organisasi desa secara lengkap dan transparan.
            <?php endswitch; ?>
        </p>

        
        <div class="flex justify-center gap-3 mt-4">
            <?php if($halaman == 'pemerintahan_desa'): ?>
                <a href="#pemerintahan-desa-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            <?php elseif($halaman == 'bpd'): ?>
                <a href="#bpd-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            <?php elseif($halaman == 'pkk'): ?>
                <a href="#pkk-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            <?php elseif($halaman == 'lpm'): ?>
                <a href="#lpm-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            <?php elseif($halaman == 'karang_taruna'): ?>
                <a href="#karang-taruna-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            <?php elseif($halaman == 'posyandu'): ?>
                <a href="#posyandu-section" class="btn-scroll inline-block px-8 py-3 bg-lime-500 hover:bg-lime-400 text-white font-semibold rounded-full shadow-xl transition-all duration-300" data-aos="zoom-in">Lihat Data</a>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="relative mt-6 z-10 w-full" data-aos="fade-in" data-aos-delay="400">
        <div class="container mx-auto px-4 text-sm flex flex-wrap gap-2 items-center text-emerald-100/80">
            <a href="<?php echo e(url('/')); ?>" class="hover:text-emerald-300 transition font-medium">Home</a>
            <span class="text-emerald-300">/</span>
            <span class="font-light text-emerald-200">Struktur Desa</span>
        </div>
    </div>
</section>

<!-- 🎨 Styles & Smooth Scroll Script -->
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<script>
    // Smooth scroll untuk semua tombol dengan class btn-scroll
    document.querySelectorAll('.btn-scroll').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            if(target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
</script>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/partials/header_struktur.blade.php ENDPATH**/ ?>