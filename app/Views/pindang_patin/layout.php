<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Pindang Patin - Kuliner Khas Sumatera Selatan') ?></title>
    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
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
                            400: '#e1c370',
                            500: '#D4AF37',
                            600: '#c29d27',
                            700: '#9f7f1a',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#fafafb] text-slate-800 flex flex-col min-h-screen font-sans selection:bg-rose-100 selection:text-rose-900 antialiased">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand / Logo -->
                <a href="<?= base_url('pindang-patin') ?>" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-primary-800 text-secondary-400 flex items-center justify-center text-lg shadow-sm group-hover:scale-105 transition-transform duration-200">
                        <i class="fa-solid fa-fish"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-lg text-slate-900 tracking-tight">Pindang<span class="text-primary-800 font-extrabold ml-1">Patin</span></span>
                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-amber-50 text-amber-800 border border-amber-200/80">Sumsel</span>
                        </div>
                        <p class="text-[11px] text-slate-500 font-medium">Katalog Kuliner Tradisional</p>
                    </div>
                </a>

                <!-- Right Side: Student Badge & Action -->
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2.5 px-3 py-1.5 bg-slate-50 border border-slate-200/80 rounded-xl text-xs">
                        <span class="w-6 h-6 rounded-md bg-primary-800 text-white font-bold text-[11px] flex items-center justify-center">07</span>
                        <div class="text-slate-700 font-semibold leading-tight">
                            Dafi Al Fajar
                            <span class="text-[10px] text-slate-400 font-normal block">Sumatera Selatan</span>
                        </div>
                    </div>

                    <a href="<?= base_url('pindang-patin/create') ?>" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-primary-800 hover:bg-primary-900 text-white text-xs font-semibold shadow-sm transition-all duration-150 active:scale-95">
                        <i class="fa-solid fa-plus text-[10px] text-secondary-300"></i>
                        <span>Tambah Menu</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Message Success / Error -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flex items-center justify-between p-3.5 rounded-xl bg-emerald-50/90 border border-emerald-200 text-emerald-800 shadow-sm mb-4">
                <div class="flex items-center gap-2.5">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                    <p class="text-xs sm:text-sm font-semibold"><?= session()->getFlashdata('success') ?></p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 text-xs">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="p-4 rounded-xl bg-rose-50/90 border border-rose-200 text-rose-800 shadow-sm mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-triangle-exclamation text-rose-600 text-sm"></i>
                    <p class="text-xs sm:text-sm font-bold">Terjadi Kesalahan Pengisian Form:</p>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 pl-4 text-rose-700">
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
    <footer class="mt-auto bg-white border-t border-slate-200/80 py-5 text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-primary-800"></span>
                <span class="w-2 h-2 rounded-full bg-secondary-500"></span>
                <span class="font-medium text-slate-700">Katalog Pindang Patin • Sumatera Selatan</span>
            </div>
            <p>© 2026 Dafi Al Fajar (No. 07). CodeIgniter 4 & Tailwind CSS.</p>
        </div>
    </footer>

</body>
</html>
