<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Katalog Kuliner Pindang Patin - Sumatera Selatan') ?></title>
    
    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6.5.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
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
                        },
                        surface: {
                            50: '#fdfbf9',
                            100: '#f9f6f0',
                            200: '#f0ece2',
                            300: '#e3ddd1',
                        },
                        warm: {
                            50: '#fdfbf9',
                            100: '#f9f6f0',
                            200: '#f0ece2',
                            300: '#e3ddd1',
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(28, 25, 23, 0.05), 0 2px 6px -1px rgba(28, 25, 23, 0.03)',
                        'card': '0 4px 20px -2px rgba(28, 25, 23, 0.05), 0 2px 6px -1px rgba(28, 25, 23, 0.03)',
                        'hover': '0 20px 30px -10px rgba(159, 18, 57, 0.12), 0 10px 15px -5px rgba(212, 175, 55, 0.08)',
                        'gold': '0 4px 20px rgba(212, 175, 55, 0.25)',
                    }
                }
            }
        }
    </script>
    <style>
        /* Smooth subtle transitions */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }
        ::-webkit-scrollbar-track {
            background: #F9F6F0;
        }
        ::-webkit-scrollbar-thumb {
            background: #D4AF37;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #9F1239;
        }
    </style>
</head>
<body class="bg-surface-50 text-slate-800 flex flex-col min-h-screen font-sans selection:bg-primary-100 selection:text-primary-900">

    <!-- Top Decorative Line (Maroon & Gold Harmony) -->
    <div class="h-1.5 w-full bg-gradient-to-r from-primary-950 via-primary-800 to-secondary-500"></div>

    <!-- Sticky Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-surface-200 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand / Logo -->
                <a href="<?= base_url('pindang-patin') ?>" class="flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-primary-900 via-primary-800 to-secondary-600 text-white flex items-center justify-center text-xl shadow-md shadow-primary-900/15 group-hover:scale-105 transition-transform duration-300">
                        <i class="fa-solid fa-fish text-secondary-300"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-serif text-2xl font-black text-slate-900 tracking-tight">
                                Pindang<span class="text-primary-800 font-sans font-extrabold ml-1">Patin</span>
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-100/80 text-secondary-800 border border-secondary-300 text-[10px] font-bold uppercase tracking-wider">
                                <i class="fa-solid fa-crown text-[9px] text-secondary-600"></i> Sumsel
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 font-medium">Katalog & Manajemen Kuliner Tradisional</p>
                    </div>
                </a>

                <!-- Middle Navigation Links -->
                <nav class="hidden lg:flex items-center gap-6 text-sm font-semibold text-slate-600">
                    <a href="<?= base_url('pindang-patin') ?>" class="hover:text-primary-800 transition-colors flex items-center gap-1.5 py-1">
                        <i class="fa-solid fa-house text-xs text-slate-400"></i>
                        <span>Beranda</span>
                    </a>
                    <a href="<?= base_url('pindang-patin#katalog') ?>" class="hover:text-primary-800 transition-colors flex items-center gap-1.5 py-1">
                        <i class="fa-solid fa-book-open text-xs text-slate-400"></i>
                        <span>Daftar Menu</span>
                    </a>
                    <a href="<?= base_url('pindang-patin#tentang') ?>" class="hover:text-primary-800 transition-colors flex items-center gap-1.5 py-1">
                        <i class="fa-solid fa-circle-info text-xs text-slate-400"></i>
                        <span>Tentang Kuliner</span>
                    </a>
                </nav>

                <!-- Right Side: Student Badge & CTA Button -->
                <div class="flex items-center gap-3 sm:gap-4">
                    <!-- Student Identity Pill -->
                    <div class="hidden sm:flex items-center gap-3 px-3.5 py-2 bg-surface-100 border border-surface-200 rounded-2xl shadow-sm">
                        <div class="w-8 h-8 rounded-xl bg-primary-800 text-white font-black text-xs flex items-center justify-center shadow-inner">
                            07
                        </div>
                        <div class="text-left">
                            <div class="text-xs font-bold text-slate-900 leading-tight">Dafi Al Fajar</div>
                            <div class="text-[11px] text-slate-500 font-medium">Sumatera Selatan</div>
                        </div>
                    </div>

                    <!-- Add Menu CTA Button -->
                    <a href="<?= base_url('pindang-patin/create') ?>" class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-xl bg-gradient-to-r from-primary-800 to-primary-700 hover:from-primary-900 hover:to-primary-800 text-white text-xs sm:text-sm font-bold shadow-md shadow-primary-900/20 hover:shadow-lg transition-all duration-200 active:scale-95">
                        <i class="fa-solid fa-plus text-xs text-secondary-300"></i>
                        <span>Tambah Menu</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Message Notification -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flex items-center justify-between p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm mb-4 animate-fade-in">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-sm shadow">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold">Aksi Berhasil Disimpan!</p>
                        <p class="text-xs text-emerald-700"><?= session()->getFlashdata('success') ?></p>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 p-1">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 shadow-sm mb-4">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-xl bg-rose-600 text-white flex items-center justify-center text-sm shadow">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold">Perhatian Form:</p>
                        <p class="text-xs text-rose-600">Silakan perbaiki kesalahan berikut sebelum menyimpan:</p>
                    </div>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 pl-12 text-rose-700 font-medium">
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <li><?= esc($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content Container -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-6 sm:py-10">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="mt-auto bg-white border-t border-surface-200 py-10 text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-8">
                <!-- Col 1: Brand & Desc -->
                <div class="md:col-span-6 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-primary-800 text-white flex items-center justify-center text-base shadow-sm">
                            <i class="fa-solid fa-fish text-secondary-300"></i>
                        </div>
                        <span class="font-serif text-xl font-bold text-slate-900">
                            Pindang<span class="text-primary-800 font-sans font-extrabold ml-1">Patin</span>
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 max-w-md leading-relaxed">
                        Aplikasi katalog dan manajemen kuliner autentik Pindang Patin khas Sumatera Selatan. Dibuat dengan arsitektur MVC CodeIgniter 4, MySQL, dan Tailwind CSS.
                    </p>
                </div>

                <!-- Col 2: Student Meta -->
                <div class="md:col-span-6 flex flex-col md:items-end justify-center text-xs space-y-1.5">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-surface-100 border border-surface-200 text-slate-700 font-bold">
                        <span class="w-2 h-2 rounded-full bg-primary-800"></span>
                        <span>Peserta Ujian: <strong>Dafi Al Fajar</strong> (No. 07)</span>
                    </div>
                    <p class="text-slate-400">Provinsi: <strong>Sumatera Selatan</strong> • Makanan: <strong>Pindang Patin</strong></p>
                    <p class="text-slate-400">Warna Identitas: <strong>#9F1239</strong> (Marun) & <strong>#D4AF37</strong> (Emas)</p>
                </div>
            </div>

            <div class="pt-6 border-t border-surface-200/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
                <p>© 2026 Dafi Al Fajar. Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-4">
                    <a href="<?= base_url('pindang-patin') ?>" class="hover:text-primary-800 transition-colors">Beranda</a>
                    <span>•</span>
                    <a href="<?= base_url('pindang-patin/create') ?>" class="hover:text-primary-800 transition-colors">Tambah Menu</a>
                    <span>•</span>
                    <a href="https://github.com/dafi310109/ulangan" target="_blank" class="hover:text-primary-800 transition-colors">Repository GitHub</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
