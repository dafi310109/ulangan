<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Pindang Patin - Kuliner Khas Sumatera Selatan') ?></title>
    <!-- Google Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    },
                    colors: {
                        primary: {
                            DEFAULT: '#9F1239',
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            200: '#fecdd3',
                            300: '#fda4af',
                            400: '#fb7185',
                            500: '#f43f5e',
                            600: '#e11d48',
                            700: '#be123c',
                            800: '#9F1239',
                            900: '#881337',
                            950: '#4c0519',
                        },
                        secondary: {
                            DEFAULT: '#D4AF37',
                            50: '#fdfbf7',
                            100: '#faf6eb',
                            200: '#f4e9cb',
                            300: '#eedcad',
                            400: '#e1c370',
                            500: '#D4AF37',
                            600: '#c29d27',
                            700: '#9f7f1a',
                            800: '#7d6317',
                            900: '#644e15',
                        }
                    },
                    boxShadow: {
                        'royal': '0 10px 25px -5px rgba(159, 18, 57, 0.2), 0 8px 10px -6px rgba(212, 175, 55, 0.15)',
                    }
                }
            }
        }
    </script>
    <style>
        .bg-pattern {
            background-color: #fbf9f6;
            background-image: radial-gradient(rgba(159, 18, 57, 0.05) 1px, transparent 1px), radial-gradient(rgba(212, 175, 55, 0.05) 1px, #fbf9f6 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }
    </style>
</head>
<body class="bg-pattern min-h-screen text-slate-800 flex flex-col font-sans selection:bg-primary-100 selection:text-primary-800">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-primary-100/60 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand / Logo -->
                <a href="<?= base_url('pindang-patin') ?>" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-primary-800 via-primary-700 to-secondary-500 p-0.5 shadow-md shadow-primary-900/20 group-hover:scale-105 transition-transform duration-300 flex items-center justify-center">
                        <div class="w-full h-full bg-primary-900 rounded-[14px] flex items-center justify-center text-secondary-400">
                            <i class="fa-solid fa-fish text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-serif font-bold text-2xl tracking-tight text-primary-900">Pindang<span class="text-secondary-600 font-sans ml-1">Patin</span></span>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-secondary-100 text-secondary-800 border border-secondary-300">Sumsel</span>
                        </div>
                        <p class="text-xs text-slate-500 font-medium">Katalog & Manajemen Kuliner Tradisional</p>
                    </div>
                </a>

                <!-- Student Badge & Quick Action -->
                <div class="flex items-center gap-4">
                    <div class="hidden md:flex items-center gap-3 px-3.5 py-1.5 bg-gradient-to-r from-primary-50 to-secondary-50 rounded-xl border border-primary-100 text-xs">
                        <div class="w-8 h-8 rounded-lg bg-primary-800 text-white flex items-center justify-center font-bold text-xs shadow-inner">
                            07
                        </div>
                        <div>
                            <div class="font-bold text-slate-800">Dafi Al Fajar</div>
                            <div class="text-[11px] text-slate-500">Sumatera Selatan</div>
                        </div>
                    </div>

                    <a href="<?= base_url('pindang-patin/create') ?>" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-primary-800 to-primary-700 hover:from-primary-900 hover:to-primary-800 text-white text-sm font-semibold shadow-md shadow-primary-900/20 hover:shadow-lg transition-all duration-200 active:scale-95">
                        <i class="fa-solid fa-plus text-xs text-secondary-300"></i>
                        <span>Tambah Menu</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Message Success / Error -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flex items-center justify-between p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm animate-fade-in mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500 text-white flex items-center justify-center text-sm shadow">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold"><?= session()->getFlashdata('success') ?></p>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 shadow-sm mb-4">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 rounded-lg bg-rose-600 text-white flex items-center justify-center text-sm shadow">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <p class="text-sm font-bold">Terjadi Kesalahan Pengisian Form:</p>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 pl-10 text-rose-700">
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <li><?= esc($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-6">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="mt-auto bg-white border-t border-slate-200/70 py-6 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <div class="w-2.5 h-2.5 rounded-full bg-primary-700"></div>
                <div class="w-2.5 h-2.5 rounded-full bg-secondary-500"></div>
                <span class="font-medium text-slate-700">Aplikasi Kuliner Pindang Patin • Sumatera Selatan</span>
            </div>
            <p>© 2026 Dafi Al Fajar (Absen 07). Dibuat dengan CodeIgniter 4 & Tailwind CSS.</p>
        </div>
    </footer>

</body>
</html>
