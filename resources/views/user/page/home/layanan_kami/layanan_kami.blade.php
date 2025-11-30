<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Layanan Kami - Desa Lawall</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* ========== Animasi ========== */
        @keyframes smoothFadeUp {
            0% { opacity: 0; transform: translateY(50px) scale(0.95); filter: blur(6px); }
            100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
        }
        .reveal { opacity: 0; transform: translateY(50px); transition: all 1s ease; }
        .reveal.active { animation: smoothFadeUp 1s cubic-bezier(0.25,1,0.5,1) forwards; }
        .reveal:nth-child(1) { animation-delay: 0.1s; }
        .reveal:nth-child(2) { animation-delay: 0.2s; }
        .reveal:nth-child(3) { animation-delay: 0.3s; }
        .reveal:nth-child(4) { animation-delay: 0.4s; }
        .reveal:nth-child(5) { animation-delay: 0.5s; }
        .reveal:nth-child(6) { animation-delay: 0.6s; }

        /* Card Style */
        .card { position: relative; overflow: hidden; border-radius: 0.25rem; background: #fff; box-shadow: 0 8px 24px rgba(0,0,0,0.08); padding: 2rem; border-left: 4px solid #16a34a; cursor: default; }
        .card-icon { color: #16a34a; font-size: 2.5rem; }
        .card h3 { color: #111827; font-weight: 700; }
        .card p { color: #4b5563; line-height: 1.8; }
        .card a { color: #16a34a; font-weight: 500; transition: .3s ease; }
        .card a:hover { color: #065f46; text-decoration: underline; }
        body { font-family: 'Inter', sans-serif; background: #f4f5f7; }
    </style>
</head>

<body class="selection:bg-green-200 selection:text-green-900">

<?php
$cards = [
    [
        'icon' => 'building',
        'title' => 'Bagian Pemerintahan',
        'desc' => 'KTP, KK, KIA, akta kelahiran, akta kematian, surat pindah, dan pertanahan.',
        'link' => '/layanan/pemerintahan',
    ],
    [
        'icon' => 'users',
        'title' => 'Bagian Pelayanan',
        'desc' => 'SKTM, Pengantar Nikah, Izin Keramaian, Pengantar BBM, dll.',
        'link' => '/layanan/pelayanan',
    ],
    [
        'icon' => 'heart-handshake',
        'title' => 'Bagian Kesra',
        'desc' => 'Pengelolaan kegiatan sosial, keagamaan, dan kemasyarakatan di desa.',
        'link' => '/layanan/kesra',
    ],
    [
        'icon' => 'hand-heart',
        'title' => 'Informasi & Bantuan Sosial',
        'desc' => 'Pengajuan bantuan seperti BLT & PKH.',
        'link' => '/layanan/informasi-bantuan',
    ],
    [
        'icon' => 'stethoscope',
        'title' => 'Pelayanan Kesehatan & Posyandu',
        'desc' => 'Layanan pemeriksaan kesehatan gratis dan jadwal posyandu rutin.',
        'link' => '/layanan/kesehatan-posyandu',
    ],
    [
        'icon' => 'megaphone',
        'title' => 'Layanan Aspirasi & Pengaduan',
        'desc' => 'Sampaikan aspirasi, saran, atau keluhan secara mudah ke pemerintah desa.',
        'link' => '/layanan/aspirasi-pengaduan',
    ],
];
?>

<main class="max-w-7xl mx-auto px-6 py-24">
    <!-- Heading -->
    <div class="text-center mb-20 reveal">
        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
            Layanan Kami
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Layanan utama di <span class="text-green-700 font-semibold">Desa Lawall</span> untuk mempermudah
            masyarakat mengurus administrasi & layanan publik.
        </p>
        <div class="mt-5 mx-auto w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 rounded-full"></div>
    </div>

    <!-- Card Loop -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        <?php foreach($cards as $card): ?>
            <div class="reveal card">
                <div class="flex items-center mb-5">
                    <i data-lucide="<?= $card['icon'] ?>" class="card-icon w-10 h-10 mr-3"></i>
                    <h3 class="text-2xl font-semibold"><?= $card['title'] ?></h3>
                </div>
                <p><?= $card['desc'] ?></p>
                <a href="<?= $card['link'] ?>" class="block mt-5">Read more →</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
    const reveals = document.querySelectorAll('.reveal');
    function revealOnScroll() {
        const windowHeight = window.innerHeight;
        reveals.forEach(el => {
            const top = el.getBoundingClientRect().top;
            if (top < windowHeight - 100) el.classList.add('active');
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', () => {
        lucide.createIcons();
        revealOnScroll();
    });
</script>

</body>
</html>
