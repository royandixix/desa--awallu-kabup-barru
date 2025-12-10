<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Desa Lawallu, Kabupaten Barru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .blob-1 {
            position: absolute;
            top: -10%;
            right: -5%;
            width: 500px;
            height: 500px;
            background: #10b981;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.3;
        }

        .blob-2 {
            position: absolute;
            bottom: -15%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: #10b981;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.2;
        }

        .hero-image {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.9), rgba(139, 92, 246, 0.9)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><rect fill="%234f46e5" width="1200" height="800"/></svg>');
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 768px) {

            .blob-1,
            .blob-2 {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <div class="min-h-screen flex">
        <!-- Left Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-16 relative overflow-hidden">
            <div class="blob-1"></div>
            <div class="blob-2"></div>

            <div class="w-full max-w-md relative z-10">
                <!-- Logo & Brand -->
                <div class="mb-10 flex items-center space-x-3 mb-2">
                    <svg class="w-12 h-12" viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 10 L180 40 L180 120 Q180 180 100 230 Q20 180 20 120 L20 40 Z" fill="#16a34a"
                            stroke="#ca8a04" stroke-width="4" />
                        <circle cx="100" cy="100" r="35" fill="#5b21b6" />
                        <path d="M85 105 L95 85 L100 90 L105 85 L115 105 Z" fill="white" />
                        <path d="M60 160 L140 160 L145 170 L140 180 L60 180 L55 170 Z" fill="#5b21b6" />
                        <text x="100" y="175" text-anchor="middle" fill="white" font-size="18"
                            font-weight="bold">BARRU</text>
                    </svg>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Desa Lawallu</h1>
                        <p class="text-sm text-gray-500 uppercase tracking-wide">Kabupaten Barru</p>
                    </div>
                </div>

                <!-- Welcome Text -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-3">Selamat Datang</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Sistem Informasi Desa Lawallu menghubungkan Anda dengan semua layanan administrasi desa,
                        memungkinkan masyarakat untuk mengakses layanan dan mengoptimalkan pertumbuhan desa secara
                        online.
                    </p>
                </div>

                <!-- Alert -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-sm text-red-800">{{ $errors->first('username') }}</p>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Username Input -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-yellow-600 mb-2">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-yellow-500 outline-none transition-colors bg-transparent text-gray-900 placeholder-gray-400"
                            required autofocus>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-yellow-500 outline-none transition-colors bg-transparent text-gray-900 placeholder-gray-400"
                            required>
                    </div>

                    <!-- Checkbox -->
                    <div class="flex items-center">
                        <input type="checkbox" id="team-member" name="team_member"
                            class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="team-member" class="ml-2 text-sm text-gray-600">
                            Centang untuk Masuk sebagai Anggota Tim <span class="text-gray-400">(?)</span>
                        </label>
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 shadow-lg shadow-green-500/30">
                        Masuk
                    </button>
                    <!-- Link ke Register -->
                    <div class="mt-4 text-sm text-gray-500">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-green-600 hover:underline">Daftar di sini</a>
                    </div>
                </form>

                <!-- Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap gap-4 text-xs text-gray-500">
                        <span>Hak Cipta © Desa Lawallu, Kabupaten Barru</span>
                        <a href="#" class="hover:text-gray-700">Bantuan</a>
                        <a href="#" class="hover:text-gray-700">Kontak</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Hero Image -->
        <div class="hidden lg:flex lg:w-1/2 hero-image items-center justify-center relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-green-400 rounded-full opacity-20 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-400 rounded-full opacity-20 blur-3xl"></div>

            <div class="relative z-10 text-center px-12">
                <div
                    class="w-64 h-64 mx-auto mb-8 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center">
                    <svg class="w-32 h-32 text-white opacity-80" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h3 class="text-white text-3xl font-bold mb-4">Kelola Desa Anda</h3>
                <p class="text-white/80 text-lg">Permudah administrasi dan berdayakan masyarakat Anda</p>
            </div>
        </div>
    </div>

</body>

</html>
