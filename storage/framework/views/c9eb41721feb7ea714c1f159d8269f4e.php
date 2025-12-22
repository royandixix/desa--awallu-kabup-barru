<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Desa Lawallu, Kabupaten Barru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }

        .blob-1 { position: absolute; top: -10%; right: -5%; width: 500px; height: 500px; background: #10b981; border-radius: 50%; filter: blur(100px); opacity: 0.3; }
        .blob-2 { position: absolute; bottom: -15%; left: -10%; width: 600px; height: 600px; background: #10b981; border-radius: 50%; filter: blur(120px); opacity: 0.2; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

<div class="min-h-screen flex">
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-16 relative overflow-hidden">
        <div class="blob-1"></div>
        <div class="blob-2"></div>

        <div class="w-full max-w-md relative z-10">
            <!-- Logo & Brand -->
            <div class="mb-10 flex items-center space-x-3 mb-2">
                <svg class="w-12 h-12" viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 10 L180 40 L180 120 Q180 180 100 230 Q20 180 20 120 L20 40 Z" fill="#16a34a" stroke="#ca8a04" stroke-width="4"/>
                    <circle cx="100" cy="100" r="35" fill="#5b21b6"/>
                    <path d="M85 105 L95 85 L100 90 L105 85 L115 105 Z" fill="white"/>
                    <path d="M60 160 L140 160 L145 170 L140 180 L60 180 L55 170 Z" fill="#5b21b6"/>
                    <text x="100" y="175" text-anchor="middle" fill="white" font-size="18" font-weight="bold">BARRU</text>
                </svg>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Desa Lawallu</h1>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Kabupaten Barru</p>
                </div>
            </div>

            <!-- Welcome Text -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Daftar Akun Baru</h2>
                <p class="text-gray-600 leading-relaxed">
                    Buat akun untuk mengakses layanan administrasi desa secara online.
                </p>
            </div>

            <!-- Error Alert -->
            <?php if($errors->any()): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <ul class="text-sm text-red-800 list-disc list-inside">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Register Form -->
            <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-green-500 outline-none bg-transparent placeholder-gray-400">
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-yellow-600 mb-2">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>" required
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-yellow-500 outline-none bg-transparent placeholder-gray-400">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email (Opsional)</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-green-500 outline-none bg-transparent placeholder-gray-400">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-green-500 outline-none bg-transparent placeholder-gray-400">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-green-500 outline-none bg-transparent placeholder-gray-400">
                </div>

                <!-- Dropdown Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Daftar Sebagai</label>
                    <select id="role" name="role" required
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:border-green-500 outline-none bg-transparent text-gray-900 placeholder-gray-400">
                        <option value="" disabled selected>Pilih role...</option>
                        <option value="admin">Admin</option>
                        <option value="posyandu">Posyandu</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg">
                    Daftar
                </button>
            </form>

            <div class="mt-6 text-sm text-gray-500">
                Sudah punya akun? <a href="<?php echo e(route('login')); ?>" class="text-green-600 hover:underline">Masuk di sini</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/auth/register.blade.php ENDPATH**/ ?>