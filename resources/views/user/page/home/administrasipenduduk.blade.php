<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrasi Penduduk - Desa Lawallu</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet" />

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: "Inter", sans-serif;
            scroll-behavior: smooth;
            background-color: white;
        }

        .gradient-title {
            background: linear-gradient(90deg, #2563eb, #16a34a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .floating {
            animation: floating 4s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>

<body class="pt-20">
    <section class="w-full py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col items-center text-center">
            <h1 data-aos="fade-up" class="text-5xl sm:text-6xl tracking-tight gradient-title mb-4">
                Administrasi Penduduk
            </h1>

            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-700 mb-14 max-w-2xl text-lg">
                Data administrasi penduduk Desa Lawallu yang selalu diperbarui untuk transparansi dan kemajuan desa.
            </p>

            <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12 w-full">
                <!-- Logo -->
                <div data-aos="zoom-in" class="w-full lg:w-1/3 flex flex-col justify-center items-center">
                    <img src="{{ asset('img/user/logo/barru.webp') }}" alt="Logo Kabupaten Barru"
                        class="w-48 lg:w-56 floating" />
                    <p class="mt-4 text-center text-gray-700">Ini adalah Logo Kabupaten Barru</p>
                </div>

                <!-- Grafik -->
                <div data-aos="fade-left" class="w-full lg:w-2/3 flex flex-col justify-center items-center">
                    <div class="w-full h-96 lg:h-[450px]">
                        <canvas id="populationChart" class="w-full h-full"></canvas>
                    </div>
                    <p class="text-sm text-gray-500 mt-4 text-center">
                        Grafik Statistik Penduduk Desa Lawallu
                    </p>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="600" class="mt-14">
                <a href="#" class="text-blue-700 font-semibold hover:underline hover:text-blue-800 transition">
                    Lihat Selengkapnya →
                </a>
            </div>
        </div>
    </section>

    <!-- AOS & Chart Script -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 900,
            once: true,
            easing: "ease-out-cubic"
        });

        // Ambil data dari server (dikirim dari controller)
        const labels = @json($data->pluck('kategori'));
        const values = @json($data->pluck('jumlah'));

        const data = {
            labels: labels,
            datasets: [{
                label: "Jumlah",
                data: values,
                backgroundColor: [
                    "rgba(34, 197, 94, 0.85)",
                    "rgba(59, 130, 246, 0.85)",
                    "rgba(236, 72, 153, 0.85)",
                    "rgba(250, 204, 21, 0.85)",
                ],
                borderRadius: 14,
                borderWidth: 0,
            }]
        };

        const options = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: "rgba(15, 23, 42, 0.95)",
                    titleColor: "#fff",
                    bodyColor: "#fff",
                    titleFont: { size: 15, weight: 'bold' },
                    bodyFont: { size: 14 },
                    padding: 14,
                    cornerRadius: 10,
                    displayColors: false,
                    callbacks: {
                        label: ctx => ctx.parsed.y.toLocaleString('id-ID') + ' orang'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: "rgba(229, 231, 235, 0.5)", lineWidth: 1 },
                    ticks: {
                        color: "#4b5563",
                        font: { size: 13, weight: '500' },
                        padding: 8,
                        callback: value => value.toLocaleString('id-ID')
                    }
                },
                x: {
                    grid: { display: false },
                    ticks: {
                        color: "#1f2937",
                        font: { size: 14, weight: '600' },
                        padding: 8
                    }
                }
            }
        };

        const ctx = document.getElementById("populationChart").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data,
            options
        });
    </script>
</body>

</html>
