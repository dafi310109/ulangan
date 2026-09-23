<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section (Editorial Culinary Atmosphere) -->
<div class="relative bg-gradient-to-br from-white via-surface-50 to-primary-50/30 rounded-3xl border border-secondary-200/70 p-6 sm:p-10 lg:p-12 mb-8 shadow-soft overflow-hidden">
    <!-- Subtle Ambient Background Glows -->
    <div class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-secondary-100/70 blur-3xl pointer-events-none"></div>
    <div class="absolute left-1/4 -bottom-24 w-80 h-80 rounded-full bg-primary-100/50 blur-2xl pointer-events-none"></div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8 lg:gap-12">
        <!-- Hero Left Column: Editorial Copy & CTAs -->
        <div class="max-w-2xl">
            <!-- Royal Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gradient-to-r from-primary-900/10 via-secondary-500/15 to-primary-900/10 border border-secondary-300/80 text-primary-900 text-xs font-bold mb-4 shadow-sm backdrop-blur-sm">
                <i class="fa-solid fa-crown text-[11px] text-secondary-600"></i>
                <span>Warisan Kuliner Gastronomi Sumatera Selatan</span>
            </div>

            <!-- Main Heading with Warm Culinary Gradient -->
            <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-[1.16]">
                Kelezatan Autentik <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-800 via-rose-700 to-amber-700 font-serif italic">Pindang Patin</span> Sriwijaya
            </h1>

            <!-- Descriptive Paragraph -->
            <p class="mt-4 text-slate-600 text-sm sm:text-base leading-relaxed">
                Nikmati harmoni kuah asam pedas nanas madu segar, keharuman kemangi, gurihnya tempoyak fermentasi durian, dan kelembutan daging ikan patin sungai berlemak lembut khas Bumi Sriwijaya.
            </p>

            <!-- Key Culinary Quality Highlights -->
            <div class="flex flex-wrap items-center gap-2.5 mt-5 text-xs font-semibold text-slate-700">
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/90 border border-surface-200 shadow-2xs hover:border-emerald-300 transition-colors">
                    <i class="fa-solid fa-fish text-emerald-600 text-[11px]"></i> Patin Segar Sungai Musi
                </span>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/90 border border-surface-200 shadow-2xs hover:border-amber-300 transition-colors">
                    <i class="fa-solid fa-lemon text-amber-500 text-[11px]"></i> Kuah Asam Pedas Nanas
                </span>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white/90 border border-surface-200 shadow-2xs hover:border-rose-300 transition-colors">
                    <i class="fa-solid fa-seedling text-rose-500 text-[11px]"></i> Kemangi & Tempoyak Autentik
                </span>
            </div>

            <!-- Quick Action Links -->
            <div class="flex flex-wrap items-center gap-3.5 mt-7">
                <a href="<?= base_url('pindang-patin/create') ?>" class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-xl bg-primary-800 hover:bg-primary-900 text-white font-bold text-sm shadow-md shadow-primary-900/20 hover:shadow-lg transition-all active:scale-95">
                    <i class="fa-solid fa-plus text-xs text-secondary-300"></i>
                    <span>Tambah Menu Pindang</span>
                </a>
                <a href="#katalog" class="inline-flex items-center gap-2 px-5 py-3.5 rounded-xl bg-white hover:bg-surface-100 border border-surface-200 text-slate-800 font-bold text-sm shadow-2xs hover:shadow-sm transition-all">
                    <i class="fa-solid fa-utensils text-primary-800 text-xs"></i>
                    <span>Jelajahi <?= count($makanan) ?> Menu Pindang</span>
                </a>
            </div>
        </div>

        <!-- Hero Right Column: Food Showcase + 4 Stat Badges (Harmonious & Clean) -->
        <div class="lg:w-96 flex-shrink-0 space-y-3.5">
            <!-- Featured Food Showcase Header Card -->
            <a href="<?= base_url('pindang-patin/1') ?>" class="group block relative h-40 rounded-2xl overflow-hidden bg-slate-900 border border-surface-200 shadow-sm hover:shadow-md transition-all">
                <img src="<?= base_url('uploads/pindang/pindang_patin_pegagan.png') ?>" alt="Pindang Patin Pegagan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent"></div>
                <div class="absolute top-2.5 left-2.5 right-2.5 flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-primary-900/90 text-secondary-300 border border-secondary-400/40 backdrop-blur-md">
                        <i class="fa-solid fa-crown text-[8px] text-secondary-400"></i> Menu Andalan Sumsel
                    </span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-black/60 text-white border border-white/20 backdrop-blur-md flex items-center gap-1">
                        <i class="fa-solid fa-star text-secondary-400 text-[9px]"></i> 4.9
                    </span>
                </div>
                <div class="absolute bottom-2.5 left-3 right-3 text-white flex items-end justify-between">
                    <div>
                        <span class="text-[9px] uppercase font-bold tracking-wider text-secondary-300 block">Tradisional • Ogan Ilir</span>
                        <h4 class="font-serif text-sm font-bold text-white group-hover:text-secondary-200 transition-colors line-clamp-1">Pindang Patin Pegagan</h4>
                    </div>
                    <span class="text-xs font-black text-white bg-primary-800/90 px-2 py-1 rounded-lg backdrop-blur-sm border border-white/20 whitespace-nowrap">Rp 45.000</span>
                </div>
            </a>

            <!-- 4 Stat Badges (Clean & Proper) -->
            <div class="grid grid-cols-2 gap-3 sm:gap-3.5">
                <!-- Box 1: Total Variasi -->
                <div class="bg-white border border-surface-200 rounded-2xl p-3 sm:p-3.5 shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="w-7 h-7 rounded-lg bg-primary-50 text-primary-800 flex items-center justify-center text-xs">
                            <i class="fa-solid fa-bowl-food"></i>
                        </div>
                        <span class="text-[9px] font-bold text-primary-700 bg-primary-50 px-1.5 py-0.5 rounded-full">Menu</span>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-none"><?= count($makanan) ?></div>
                        <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1">Total Variasi</div>
                    </div>
                </div>

                <!-- Box 2: Siap Saji -->
                <div class="bg-white border border-surface-200 rounded-2xl p-3 sm:p-3.5 shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xs">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <span class="text-[9px] font-bold text-emerald-700 bg-emerald-50 px-1.5 py-0.5 rounded-full">Stok</span>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-emerald-700 tracking-tight leading-none">
                            <?= count(array_filter($makanan, fn($m) => ($m['status'] ?? 'Tersedia') === 'Tersedia')) ?>
                        </div>
                        <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1">Siap Saji</div>
                    </div>
                </div>

                <!-- Box 3: Kategori Rasa -->
                <div class="bg-white border border-surface-200 rounded-2xl p-3 sm:p-3.5 shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center text-xs">
                            <i class="fa-solid fa-pepper-hot"></i>
                        </div>
                        <span class="text-[9px] font-bold text-amber-700 bg-amber-50 px-1.5 py-0.5 rounded-full">Rasa</span>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-amber-700 tracking-tight leading-none">
                            <?= count(array_unique(array_column($makanan, 'kategori'))) ?>
                        </div>
                        <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1">Kategori Rasa</div>
                    </div>
                </div>

                <!-- Box 4: Asal Daerah -->
                <div class="bg-white border border-surface-200 rounded-2xl p-3 sm:p-3.5 shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="w-7 h-7 rounded-lg bg-secondary-50 text-secondary-800 flex items-center justify-center text-xs">
                            <i class="fa-solid fa-landmark"></i>
                        </div>
                        <span class="text-[9px] font-bold text-secondary-800 bg-secondary-50 px-1.5 py-0.5 rounded-full">Sumsel</span>
                    </div>
                    <div>
                        <div class="text-lg sm:text-xl font-black text-slate-900 tracking-tight leading-none">Sumsel</div>
                        <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1">Bumi Sriwijaya</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Unified Search & Category Filter Console (FITUR PENCARIAN & FILTER KATEGORI) -->
<section id="katalog" class="bg-white rounded-3xl border border-surface-200 p-5 sm:p-6 mb-8 shadow-soft space-y-4">
    <!-- Row 1: Search Form with Inputs, Selects, and Buttons -->
    <form action="<?= base_url('pindang-patin') ?>" method="GET" class="space-y-4">
        <input type="hidden" name="view" value="<?= esc($viewType) ?>">
        <input type="hidden" name="kategori" value="<?= esc($selectedKat) ?>">

        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 sm:gap-4 items-center">
            <!-- Search Bar Input -->
            <div class="md:col-span-5 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Cari menu pindang, bumbu rempah, daerah..." class="w-full pl-10 pr-4 py-2.5 bg-surface-50 border border-surface-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium">
            </div>

            <!-- Filter Tingkat Pedas -->
            <div class="md:col-span-3">
                <select name="pedas" onchange="this.form.submit()" class="w-full px-3.5 py-2.5 bg-surface-50 border border-surface-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-semibold text-slate-700">
                    <option value="Semua" <?= $selectedPedas === 'Semua' ? 'selected' : '' ?>>Semua Tingkat Pedas</option>
                    <?php foreach ($pedasList as $pds): ?>
                        <option value="<?= $pds ?>" <?= $selectedPedas === $pds ? 'selected' : '' ?>><?= $pds ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Sorting Dropdown -->
            <div class="md:col-span-2">
                <select name="sort" onchange="this.form.submit()" class="w-full px-3.5 py-2.5 bg-surface-50 border border-surface-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-semibold text-slate-700">
                    <option value="terbaru" <?= $selectedSort === 'terbaru' ? 'selected' : '' ?>>Urut: Terbaru</option>
                    <option value="harga_asc" <?= $selectedSort === 'harga_asc' ? 'selected' : '' ?>>Harga: Termurah</option>
                    <option value="harga_desc" <?= $selectedSort === 'harga_desc' ? 'selected' : '' ?>>Harga: Termahal</option>
                    <option value="nama_asc" <?= $selectedSort === 'nama_asc' ? 'selected' : '' ?>>Nama (A-Z)</option>
                </select>
            </div>

            <!-- Submit Button & Reset -->
            <div class="md:col-span-2 flex items-center gap-2">
                <button type="submit" class="flex-grow py-2.5 px-4 bg-primary-800 hover:bg-primary-900 text-white rounded-xl text-xs sm:text-sm font-bold shadow-sm transition-all flex items-center justify-center gap-1.5 active:scale-95">
                    <i class="fa-solid fa-filter text-[11px] text-secondary-400"></i>
                    <span>Terapkan</span>
                </button>
                <?php if (!empty($search) || $selectedKat !== 'Semua' || $selectedPedas !== 'Semua' || $selectedSort !== 'terbaru'): ?>
                    <a href="<?= base_url('pindang-patin?view=' . esc($viewType)) ?>" class="px-3 py-2.5 bg-surface-100 hover:bg-surface-200 text-slate-600 rounded-xl text-xs font-bold transition-colors" title="Reset Semua Filter">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <!-- Divider Line -->
    <div class="border-t border-surface-200 pt-3">
        <!-- Row 2: Category Pills Filter -->
        <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none">
            <span class="text-slate-400 font-bold uppercase text-[10px] tracking-wider whitespace-nowrap mr-1 flex items-center gap-1.5">
                <i class="fa-solid fa-tags text-primary-800"></i> Kategori:
            </span>
            <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['kategori' => 'Semua']))) ?>" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all whitespace-nowrap <?= $selectedKat === 'Semua' ? 'bg-primary-800 text-white shadow-sm shadow-primary-900/20' : 'bg-surface-100 hover:bg-surface-200 text-slate-700' ?>">
                Semua (<?= $total ?>)
            </a>
            <?php foreach ($kategoriList as $kat): ?>
                <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['kategori' => $kat]))) ?>" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all whitespace-nowrap <?= $selectedKat === $kat ? 'bg-primary-800 text-white shadow-sm shadow-primary-900/20' : 'bg-surface-100 hover:bg-surface-200 text-slate-700' ?>">
                    <?= $kat ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Section Subheader: Counter & View Mode Toggles -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
    <div>
        <h2 class="font-serif text-2xl font-bold text-slate-900">
            Daftar Hidangan Pindang Patin
        </h2>
        <p class="text-xs text-slate-500 mt-0.5">
            Ditemukan <span class="font-bold text-slate-900"><?= count($makanan) ?> menu</span>
            <?php if (!empty($search)): ?> untuk pencarian "<span class="font-bold text-primary-800"><?= esc($search) ?></span>"<?php endif; ?>
        </p>
    </div>

    <!-- Toggle View Mode: Grid (Foto AI) vs Tabel CRUD -->
    <div class="flex items-center p-1 bg-white border border-surface-200 rounded-xl shadow-sm text-xs font-semibold">
        <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['view' => 'grid']))) ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg transition-colors <?= $viewType === 'grid' ? 'bg-primary-800 text-white shadow-sm' : 'text-slate-600 hover:text-slate-900' ?>">
            <i class="fa-solid fa-grid-2 text-xs"></i>
            <span>Kartu Visual AI</span>
        </a>
        <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['view' => 'table']))) ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg transition-colors <?= $viewType === 'table' ? 'bg-primary-800 text-white shadow-sm' : 'text-slate-600 hover:text-slate-900' ?>">
            <i class="fa-solid fa-table-list text-xs"></i>
            <span>Tabel CRUD</span>
        </a>
    </div>
</div>

<?php if (empty($makanan)): ?>
    <!-- Empty State -->
    <div class="bg-white rounded-3xl border border-surface-200 p-12 text-center shadow-soft">
        <div class="w-16 h-16 rounded-2xl bg-surface-100 text-slate-400 flex items-center justify-center mx-auto text-2xl mb-4 shadow-inner">
            <i class="fa-solid fa-bowl-food"></i>
        </div>
        <h3 class="text-base font-bold text-slate-900">Menu yang dicari tidak ditemukan</h3>
        <p class="text-xs text-slate-500 max-w-sm mx-auto mt-1">Coba gunakan kata kunci pencarian yang lain atau reset filter untuk kembali menampilkan seluruh varian menu.</p>
        <div class="mt-6 flex justify-center gap-2.5">
            <a href="<?= base_url('pindang-patin?view=' . esc($viewType)) ?>" class="px-5 py-2.5 bg-surface-100 hover:bg-surface-200 text-slate-700 font-bold rounded-xl text-xs transition-colors">
                Reset Filter
            </a>
            <a href="<?= base_url('pindang-patin/create') ?>" class="px-5 py-2.5 bg-primary-800 hover:bg-primary-900 text-white font-bold rounded-xl text-xs shadow-sm transition-colors">
                Tambah Menu Baru
            </a>
        </div>
    </div>
<?php else: ?>

    <?php if ($viewType === 'grid'): ?>
        <!-- ================= MODE 1: GRID VIEW (KARTU VISUAL GOURMET) ================= -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($makanan as $item): ?>
                <div class="bg-white rounded-3xl border border-surface-200 shadow-soft hover:shadow-hover hover:border-primary-200 transition-all duration-300 flex flex-col overflow-hidden group">
                    <!-- Image Showcase -->
                    <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="relative h-56 bg-slate-900 overflow-hidden block">
                        <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                            <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        <?php else: ?>
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 bg-slate-800">
                                <i class="fa-solid fa-fish text-3xl mb-1 text-slate-500"></i>
                                <span class="text-xs">Foto Sajian</span>
                            </div>
                        <?php endif; ?>

                        <!-- Top Floating Badges -->
                        <div class="absolute top-3.5 left-3.5 right-3.5 flex items-center justify-between">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-extrabold bg-primary-900/90 text-secondary-300 border border-secondary-400/40 backdrop-blur-md shadow-sm">
                                <i class="fa-solid fa-crown text-[8px] text-secondary-400"></i>
                                <?= esc($item['kategori']) ?>
                            </span>

                            <?php if ($item['tingkat_pedas'] === 'Sangat Pedas'): ?>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-600/95 text-white backdrop-blur-md shadow-sm">
                                    <i class="fa-solid fa-fire text-yellow-300 text-[9px]"></i> Sangat Pedas
                                </span>
                            <?php elseif ($item['tingkat_pedas'] === 'Pedas'): ?>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-600/95 text-white backdrop-blur-md shadow-sm">
                                    <i class="fa-solid fa-pepper-hot text-yellow-200 text-[9px]"></i> Pedas
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-600/95 text-white backdrop-blur-md shadow-sm">
                                    <i class="fa-solid fa-leaf text-yellow-200 text-[9px]"></i> Sedang
                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- Bottom Image Info Bar -->
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-white text-[11px] font-semibold">
                            <span class="px-2.5 py-1 rounded-lg bg-black/60 backdrop-blur-md border border-white/20">
                                <i class="fa-solid fa-clock mr-1 text-secondary-300"></i> <?= esc($item['estimasi_waktu'] ?: '40 Menit') ?>
                            </span>
                            <span class="px-2.5 py-1 rounded-lg bg-black/60 backdrop-blur-md border border-white/20">
                                <i class="fa-solid fa-users mr-1 text-secondary-300"></i> <?= esc($item['porsi'] ?: '2-3 Porsi') ?>
                            </span>
                        </div>
                    </a>

                    <!-- Card Body -->
                    <div class="p-5 flex flex-col flex-grow justify-between space-y-4">
                        <div>
                            <!-- Origin Location -->
                            <div class="flex items-center gap-1.5 text-xs text-slate-500 font-medium mb-1.5">
                                <i class="fa-solid fa-location-dot text-rose-500 text-[11px]"></i>
                                <span class="truncate"><?= esc($item['asal_daerah']) ?></span>
                            </div>

                            <!-- Title -->
                            <h3 class="font-serif font-bold text-lg text-slate-900 group-hover:text-primary-800 transition-colors leading-snug line-clamp-1">
                                <a href="<?= base_url('pindang-patin/' . $item['id']) ?>">
                                    <?= esc($item['nama']) ?>
                                </a>
                            </h3>

                            <!-- Snippet -->
                            <p class="text-xs text-slate-600 line-clamp-2 mt-2 leading-relaxed">
                                <?= esc($item['deskripsi'] ?: 'Pindang Patin khas Sumatera Selatan dengan kuah rempah aromatik nanas dan tempoyak autentik.') ?>
                            </p>
                        </div>

                        <!-- Card Footer -->
                        <div class="pt-3.5 border-t border-surface-200 flex items-center justify-between gap-2">
                            <!-- Price Tag -->
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-semibold block">Harga Porsi</span>
                                <span class="text-base font-extrabold text-primary-900 font-sans">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </span>
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-center gap-1.5">
                                <!-- Detail Button (HALAMAN DETAIL) -->
                                <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="px-3.5 py-2 bg-primary-50 hover:bg-primary-800 text-primary-800 hover:text-white rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5">
                                    <span>Resep</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>

                                <!-- Edit Button -->
                                <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="p-2 rounded-xl bg-surface-100 hover:bg-surface-200 text-slate-700 hover:text-amber-800 border border-surface-200 transition-colors" title="Edit Data">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>

                                <!-- Delete Button -->
                                <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="p-2 rounded-xl bg-surface-100 hover:bg-rose-50 text-slate-700 hover:text-rose-600 border border-surface-200 hover:border-rose-200 transition-colors" title="Hapus Data">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>

        <!-- ================= MODE 2: TABEL CRUD (LENGKAP & PROPER) ================= -->
        <div class="bg-white rounded-3xl border border-surface-200 overflow-hidden shadow-soft">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b border-surface-200 bg-surface-100 text-[11px] font-bold text-slate-600 uppercase tracking-wider">
                            <th class="py-4 px-4 text-center w-12">No</th>
                            <th class="py-4 px-4">Menu Pindang Patin</th>
                            <th class="py-4 px-4">Kategori</th>
                            <th class="py-4 px-4">Asal Daerah</th>
                            <th class="py-4 px-4">Pedas</th>
                            <th class="py-4 px-4">Harga / Porsi</th>
                            <th class="py-4 px-4 text-center">Status</th>
                            <th class="py-4 px-4 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-200/80">
                        <?php $no = 1; foreach ($makanan as $item): ?>
                            <tr class="hover:bg-surface-50 transition-colors group">
                                <td class="py-4 px-4 text-center font-bold text-slate-400 group-hover:text-primary-800">
                                    <?= $no++ ?>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-surface-100 border border-surface-200 overflow-hidden flex-shrink-0 shadow-sm">
                                            <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                                                <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                                    <i class="fa-solid fa-fish"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="font-bold text-slate-900 group-hover:text-primary-800 transition-colors block text-sm leading-snug">
                                                <?= esc($item['nama']) ?>
                                            </a>
                                            <span class="text-[11px] text-slate-400"><?= esc($item['porsi'] ?: '2-3 Porsi') ?> • <?= esc($item['estimasi_waktu'] ?: '40 Menit') ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-primary-50 text-primary-800 border border-primary-200">
                                        <?= esc($item['kategori']) ?>
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-slate-600 text-xs font-medium">
                                    <?= esc($item['asal_daerah']) ?>
                                </td>
                                <td class="py-4 px-4">
                                    <?php if ($item['tingkat_pedas'] === 'Sangat Pedas'): ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                            <i class="fa-solid fa-fire text-[10px]"></i> Sangat Pedas
                                        </span>
                                    <?php elseif ($item['tingkat_pedas'] === 'Pedas'): ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                            <i class="fa-solid fa-pepper-hot text-[10px]"></i> Pedas
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <i class="fa-solid fa-leaf text-[10px]"></i> Sedang
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-4 font-black text-slate-800">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <?php if (($item['status'] ?? 'Tersedia') === 'Tersedia'): ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                            Habis
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="p-2 rounded-xl bg-surface-100 hover:bg-primary-50 text-slate-700 hover:text-primary-800 border border-surface-200 transition-colors" title="Lihat Detail Resep">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </a>
                                        <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="p-2 rounded-xl bg-surface-100 hover:bg-amber-50 text-slate-700 hover:text-amber-700 border border-surface-200 transition-colors" title="Edit Data">
                                            <i class="fa-solid fa-pen text-xs"></i>
                                        </a>
                                        <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="p-2 rounded-xl bg-surface-100 hover:bg-rose-50 text-slate-700 hover:text-rose-600 border border-surface-200 transition-colors" title="Hapus Data">
                                            <i class="fa-solid fa-trash text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<!-- Section: Tentang Kuliner Pindang Patin (Edukasi & Gastronomi Sumsel) -->
<section id="tentang" class="mt-14 bg-gradient-to-br from-primary-950 via-primary-900 to-primary-950 text-white rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden border border-secondary-500/20">
    <div class="absolute right-0 bottom-0 w-96 h-96 rounded-full bg-secondary-500/10 blur-3xl pointer-events-none"></div>
    <div class="absolute -left-20 -top-20 w-80 h-80 rounded-full bg-primary-800/20 blur-3xl pointer-events-none"></div>

    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
        <!-- Left: Story & Pillars -->
        <div class="lg:col-span-7 space-y-5">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-500/20 border border-secondary-400/40 text-secondary-300 text-xs font-bold uppercase tracking-wider">
                <i class="fa-solid fa-award text-secondary-400"></i> Cerita Kuliner Nusantara
            </div>
            <h2 class="font-serif text-2xl sm:text-3xl lg:text-4xl font-black text-white leading-tight">
                Mengenal Tradisi Memasak <br>
                <span class="text-secondary-400 italic font-serif">Pindang Patin</span> Sumatera Selatan
            </h2>
            <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                Ikan Patin (*Pangasius*) adalah primadona sungai-sungai besar di Sumatera Selatan, terutama Sungai Musi dan Sungai Ogan. Masyarakat Melayu Palembang mengolahnya menjadi hidangan pindang dengan perpaduan rempah segar, kunyit bakar, asam jawa, dan potongan nanas manis untuk menyeimbangkan lemak alami ikan.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 pt-4 border-t border-white/10 text-xs">
                <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 space-y-1 hover:bg-white/10 transition-colors">
                    <span class="text-secondary-400 font-bold block text-xs">Kuah Asam Pedas</span>
                    <p class="text-slate-300 text-[11px] leading-relaxed">Asam segar alami tanpa santan yang ringan, menyegarkan, dan menyehatkan.</p>
                </div>
                <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 space-y-1 hover:bg-white/10 transition-colors">
                    <span class="text-secondary-400 font-bold block text-xs">Tempoyak Durian</span>
                    <p class="text-slate-300 text-[11px] leading-relaxed">Fermentasi durian autentik pemberi rasa gurih legit pekat khas Melayu.</p>
                </div>
                <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 space-y-1 hover:bg-white/10 transition-colors">
                    <span class="text-secondary-400 font-bold block text-xs">Aroma Kemangi</span>
                    <p class="text-slate-300 text-[11px] leading-relaxed">Wangi khas daun kemangi dan serai wangi yang menetralkan aroma amis ikan.</p>
                </div>
            </div>
        </div>

        <!-- Right: Authentic Gastronomic Feature Showcase -->
        <div class="lg:col-span-5">
            <div class="relative bg-gradient-to-br from-white/10 to-white/5 border border-secondary-400/30 rounded-3xl p-4 shadow-xl backdrop-blur-md">
                <div class="relative h-60 rounded-2xl overflow-hidden mb-4 bg-slate-900 shadow-inner group">
                    <img src="<?= base_url('uploads/pindang/pindang_patin_pegagan.png') ?>" alt="Warisan Kuliner Pindang Patin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-[10px] font-bold bg-primary-900/90 text-secondary-300 border border-secondary-400/30 backdrop-blur-md">
                        <i class="fa-solid fa-crown text-[9px] text-secondary-400 mr-1"></i> Gastronomi Sriwijaya
                    </span>
                    <div class="absolute bottom-3 left-3 right-3 text-white">
                        <div class="text-[11px] font-bold text-secondary-300">Cita Rasa Warisan Leluhur</div>
                        <div class="font-serif text-sm font-bold">Keharmonisan Asam, Manis, Gurih & Pedas</div>
                    </div>
                </div>

                <div class="space-y-2 text-xs text-slate-300">
                    <div class="flex items-center justify-between text-secondary-300 font-bold text-[11px]">
                        <span>Filosofi Masakan:</span>
                        <span>100% Rempah Nusantara</span>
                    </div>
                    <p class="text-[11px] leading-relaxed text-slate-300 italic">
                        "Setiap tetes kuah pindang mencerminkan kekayaan perairan Sungai Musi dan kearifan masyarakat Sumatera Selatan dalam mengolah hasil alam."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Konfirmasi Hapus (Clean & Proper) -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-surface-200">
        <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center mx-auto text-xl mb-3 shadow-inner">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        <h3 class="text-base font-bold text-center text-slate-900">Hapus Data Masakan?</h3>
        <p class="text-xs text-center text-slate-500 mt-1 leading-relaxed">
            Varian masakan <span id="deleteItemName" class="font-bold text-slate-800"></span> akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="flex gap-2.5 mt-6">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 py-2.5 px-3 bg-surface-100 hover:bg-surface-200 text-slate-700 font-bold text-xs rounded-xl transition-colors">
                Batal
            </button>
            <a id="deleteConfirmBtn" href="#" class="flex-1 py-2.5 px-3 bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs rounded-xl text-center shadow-md shadow-rose-600/20 transition-colors">
                Ya, Hapus
            </a>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        document.getElementById('deleteItemName').innerText = '"' + name + '"';
        document.getElementById('deleteConfirmBtn').href = '<?= base_url('pindang-patin/delete/') ?>/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<?= $this->endSection() ?>
