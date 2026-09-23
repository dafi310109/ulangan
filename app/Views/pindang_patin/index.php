<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section (Clean & Proper) -->
<div class="bg-white rounded-2xl border border-slate-200/80 p-6 sm:p-8 mb-6 shadow-[0_1px_3px_rgba(0,0,0,0.04)]">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div class="max-w-2xl">
            <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-md bg-amber-50 border border-amber-200/70 text-amber-800 text-[11px] font-semibold mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-secondary-500"></span>
                <span>Warisan Kuliner Sumatera Selatan</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Katalog Menu <span class="text-primary-800">Pindang Patin</span>
            </h1>
            <p class="mt-2 text-slate-600 text-xs sm:text-sm leading-relaxed">
                Kelola ragam resep dan varian hidangan Pindang Patin autentik berkuah asam-pedas gurih khas Sumatera Selatan. Dilengkapi resep, takaran bumbu, estimasi waktu memasak, dan harga sajian.
            </p>
        </div>

        <!-- Compact Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-slate-50/80 p-3 sm:p-4 rounded-xl border border-slate-200/70">
            <div class="text-center px-2">
                <div class="text-lg font-bold text-primary-800"><?= count($makanan) ?></div>
                <div class="text-[10px] text-slate-500 uppercase font-semibold">Total Menu</div>
            </div>
            <div class="text-center px-2 border-l border-slate-200/60">
                <div class="text-lg font-bold text-emerald-700">
                    <?= count(array_filter($makanan, fn($m) => ($m['status'] ?? 'Tersedia') === 'Tersedia')) ?>
                </div>
                <div class="text-[10px] text-slate-500 uppercase font-semibold">Tersedia</div>
            </div>
            <div class="text-center px-2 border-l border-slate-200/60">
                <div class="text-lg font-bold text-amber-700">
                    <?= count(array_unique(array_column($makanan, 'kategori'))) ?>
                </div>
                <div class="text-[10px] text-slate-500 uppercase font-semibold">Kategori</div>
            </div>
            <div class="text-center px-2 border-l border-slate-200/60">
                <div class="text-lg font-bold text-slate-700">Sumsel</div>
                <div class="text-[10px] text-slate-500 uppercase font-semibold">Asal Daerah</div>
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter Controls (FITUR PENCARIAN & FILTER) -->
<section class="bg-white rounded-2xl border border-slate-200/80 p-4 sm:p-5 mb-6 shadow-[0_1px_3px_rgba(0,0,0,0.04)] space-y-4">
    <!-- Category Quick Pills -->
    <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-xs">
        <span class="text-slate-400 font-semibold uppercase text-[10px] tracking-wider whitespace-nowrap mr-1">Kategori:</span>
        <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['kategori' => 'Semua']))) ?>" class="px-3 py-1.5 rounded-lg font-medium transition-colors whitespace-nowrap <?= $selectedKat === 'Semua' ? 'bg-primary-800 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            Semua (<?= $total ?>)
        </a>
        <?php foreach ($kategoriList as $kat): ?>
            <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['kategori' => $kat]))) ?>" class="px-3 py-1.5 rounded-lg font-medium transition-colors whitespace-nowrap <?= $selectedKat === $kat ? 'bg-primary-800 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
                <?= $kat ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Search & Filter Form -->
    <form action="<?= base_url('pindang-patin') ?>" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-3 pt-2 border-t border-slate-100">
        <input type="hidden" name="view" value="<?= esc($viewType) ?>">

        <!-- Search Bar -->
        <div class="md:col-span-5 relative">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </div>
            <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Cari menu, bumbu rempah, daerah..." class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
        </div>

        <!-- Filter Pedas -->
        <div class="md:col-span-3">
            <select name="pedas" onchange="this.form.submit()" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                <option value="Semua" <?= $selectedPedas === 'Semua' ? 'selected' : '' ?>>Semua Tingkat Pedas</option>
                <?php foreach ($pedasList as $pds): ?>
                    <option value="<?= $pds ?>" <?= $selectedPedas === $pds ? 'selected' : '' ?>><?= $pds ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Sorting -->
        <div class="md:col-span-2">
            <select name="sort" onchange="this.form.submit()" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                <option value="terbaru" <?= $selectedSort === 'terbaru' ? 'selected' : '' ?>>Terbaru</option>
                <option value="harga_asc" <?= $selectedSort === 'harga_asc' ? 'selected' : '' ?>>Termurah</option>
                <option value="harga_desc" <?= $selectedSort === 'harga_desc' ? 'selected' : '' ?>>Termahal</option>
                <option value="nama_asc" <?= $selectedSort === 'nama_asc' ? 'selected' : '' ?>>Nama (A-Z)</option>
            </select>
        </div>

        <!-- Button Terapkan / Reset -->
        <div class="md:col-span-2 flex items-center gap-2">
            <button type="submit" class="flex-grow py-2 px-3 bg-primary-800 hover:bg-primary-900 text-white rounded-xl text-xs font-semibold shadow-sm transition-colors flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-filter text-[10px] text-secondary-400"></i>
                <span>Terapkan</span>
            </button>
            <?php if (!empty($search) || $selectedKat !== 'Semua' || $selectedPedas !== 'Semua' || $selectedSort !== 'terbaru'): ?>
                <a href="<?= base_url('pindang-patin?view=' . esc($viewType)) ?>" class="px-2.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-semibold transition-colors" title="Reset Filter">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
            <?php endif; ?>
        </div>
    </form>
</section>

<!-- Subheader: Count & View Toggle (Grid / Table) -->
<div class="flex items-center justify-between gap-4 mb-4">
    <div class="text-xs text-slate-500">
        Menampilkan <span class="font-bold text-slate-800"><?= count($makanan) ?></span> varian menu
        <?php if (!empty($search)): ?> untuk pencarian "<span class="font-bold text-primary-800"><?= esc($search) ?></span>"<?php endif; ?>
    </div>

    <!-- Toggle View Mode: Grid (Foto) vs Tabel CRUD -->
    <div class="flex items-center p-0.5 bg-slate-100 border border-slate-200/80 rounded-xl text-xs font-medium">
        <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['view' => 'grid']))) ?>" class="flex items-center gap-1.5 px-3 py-1 rounded-lg transition-colors <?= $viewType === 'grid' ? 'bg-white text-slate-900 shadow-sm font-semibold' : 'text-slate-600 hover:text-slate-900' ?>">
            <i class="fa-solid fa-grid-2 text-[11px]"></i>
            <span>Kartu Visual</span>
        </a>
        <a href="<?= base_url('pindang-patin?' . http_build_query(array_merge($_GET, ['view' => 'table']))) ?>" class="flex items-center gap-1.5 px-3 py-1 rounded-lg transition-colors <?= $viewType === 'table' ? 'bg-white text-slate-900 shadow-sm font-semibold' : 'text-slate-600 hover:text-slate-900' ?>">
            <i class="fa-solid fa-table-list text-[11px]"></i>
            <span>Tabel CRUD</span>
        </a>
    </div>
</div>

<?php if (empty($makanan)): ?>
    <!-- Empty State -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-12 text-center shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto text-xl mb-3">
            <i class="fa-solid fa-utensils"></i>
        </div>
        <h3 class="text-sm font-bold text-slate-800">Tidak ada menu yang sesuai</h3>
        <p class="text-xs text-slate-500 max-w-sm mx-auto mt-1">Sesuaikan kata kunci atau reset filter untuk menampilkan semua varian.</p>
        <div class="mt-4 flex justify-center gap-2">
            <a href="<?= base_url('pindang-patin?view=' . esc($viewType)) ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-semibold transition-colors">
                Reset Filter
            </a>
            <a href="<?= base_url('pindang-patin/create') ?>" class="px-4 py-2 bg-primary-800 hover:bg-primary-900 text-white rounded-xl text-xs font-semibold transition-colors">
                Tambah Menu Baru
            </a>
        </div>
    </div>
<?php else: ?>

    <?php if ($viewType === 'grid'): ?>
        <!-- ================= MODE 1: GRID VIEW (PROPER, CLEAN, ELEGANT) ================= -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ($makanan as $item): ?>
                <div class="bg-white rounded-2xl border border-slate-200/80 hover:border-slate-300 shadow-[0_1px_3px_rgba(0,0,0,0.04)] hover:shadow-md transition-all duration-200 flex flex-col overflow-hidden group">
                    <!-- Image Showcase -->
                    <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="relative h-48 bg-slate-100 overflow-hidden block">
                        <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                            <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <?php else: ?>
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                <i class="fa-solid fa-fish text-3xl mb-1 text-slate-300"></i>
                                <span class="text-[10px]">Foto Belum Tersedia</span>
                            </div>
                        <?php endif; ?>

                        <!-- Badges overlay -->
                        <div class="absolute top-2.5 left-2.5 right-2.5 flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-md text-[10px] font-semibold bg-primary-900/85 text-white backdrop-blur-sm shadow-sm">
                                <?= esc($item['kategori']) ?>
                            </span>

                            <?php if ($item['tingkat_pedas'] === 'Sangat Pedas'): ?>
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-rose-600 text-white shadow-sm">
                                    <i class="fa-solid fa-fire text-[9px] mr-0.5"></i> Sangat Pedas
                                </span>
                            <?php elseif ($item['tingkat_pedas'] === 'Pedas'): ?>
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-amber-600 text-white shadow-sm">
                                    <i class="fa-solid fa-pepper-hot text-[9px] mr-0.5"></i> Pedas
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-emerald-600 text-white shadow-sm">
                                    <i class="fa-solid fa-leaf text-[9px] mr-0.5"></i> Sedang
                                </span>
                            <?php endif; ?>
                        </div>
                    </a>

                    <!-- Card Body -->
                    <div class="p-4 flex flex-col flex-grow justify-between space-y-3">
                        <div>
                            <div class="flex items-center gap-1.5 text-[11px] text-slate-400 mb-1">
                                <i class="fa-solid fa-location-dot text-rose-500 text-[10px]"></i>
                                <span class="truncate"><?= esc($item['asal_daerah']) ?></span>
                                <span>•</span>
                                <span><?= esc($item['porsi'] ?: '2-3 Porsi') ?></span>
                            </div>

                            <h3 class="font-bold text-slate-900 group-hover:text-primary-800 transition-colors text-sm sm:text-base leading-snug line-clamp-1">
                                <a href="<?= base_url('pindang-patin/' . $item['id']) ?>">
                                    <?= esc($item['nama']) ?>
                                </a>
                            </h3>

                            <p class="text-xs text-slate-500 line-clamp-2 mt-1.5 leading-relaxed">
                                <?= esc($item['deskripsi'] ?: 'Pindang Patin khas Sumatera Selatan dengan kuah rempah aromatik.') ?>
                            </p>
                        </div>

                        <!-- Price & Action -->
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-semibold block">Harga</span>
                                <span class="text-sm font-extrabold text-primary-800">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </span>
                            </div>

                            <div class="flex items-center gap-1.5">
                                <!-- Detail Button -->
                                <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="px-3 py-1.5 bg-primary-50 hover:bg-primary-800 text-primary-800 hover:text-white rounded-lg text-xs font-semibold transition-colors flex items-center gap-1">
                                    <span>Detail</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>

                                <!-- Edit Button -->
                                <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="p-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-600 hover:text-amber-700 border border-slate-200 transition-colors" title="Edit Data">
                                    <i class="fa-solid fa-pen text-xs"></i>
                                </a>

                                <!-- Delete Button -->
                                <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="p-1.5 rounded-lg bg-slate-50 hover:bg-rose-50 text-slate-600 hover:text-rose-600 border border-slate-200 hover:border-rose-200 transition-colors" title="Hapus Data">
                                    <i class="fa-solid fa-trash text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>

        <!-- ================= MODE 2: TABEL CRUD (CLEAN & PROPER) ================= -->
        <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-[0_1px_3px_rgba(0,0,0,0.04)]">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50 text-[11px] font-bold text-slate-600 uppercase tracking-wider">
                            <th class="py-3 px-3 text-center w-12">No</th>
                            <th class="py-3 px-4">Menu Pindang Patin</th>
                            <th class="py-3 px-3">Kategori</th>
                            <th class="py-3 px-3">Asal Daerah</th>
                            <th class="py-3 px-3">Pedas</th>
                            <th class="py-3 px-3">Harga</th>
                            <th class="py-3 px-3 text-center">Status</th>
                            <th class="py-3 px-4 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $no = 1; foreach ($makanan as $item): ?>
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-3 px-3 text-center font-semibold text-slate-400">
                                    <?= $no++ ?>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0">
                                            <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                                                <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs">
                                                    <i class="fa-solid fa-fish"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="font-bold text-slate-900 hover:text-primary-800 transition-colors block leading-tight">
                                                <?= esc($item['nama']) ?>
                                            </a>
                                            <span class="text-[11px] text-slate-400"><?= esc($item['porsi'] ?: '2-3 Porsi') ?> • <?= esc($item['estimasi_waktu'] ?: '40 Menit') ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-3">
                                    <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-semibold bg-rose-50 text-primary-800 border border-rose-200">
                                        <?= esc($item['kategori']) ?>
                                    </span>
                                </td>
                                <td class="py-3 px-3 text-slate-600 text-xs">
                                    <?= esc($item['asal_daerah']) ?>
                                </td>
                                <td class="py-3 px-3">
                                    <?php if ($item['tingkat_pedas'] === 'Sangat Pedas'): ?>
                                        <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-semibold bg-red-50 text-red-700 border border-red-200">Sangat Pedas</span>
                                    <?php elseif ($item['tingkat_pedas'] === 'Pedas'): ?>
                                        <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">Pedas</span>
                                    <?php else: ?>
                                        <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Sedang</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-3 font-bold text-slate-800">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </td>
                                <td class="py-3 px-3 text-center">
                                    <?php if (($item['status'] ?? 'Tersedia') === 'Tersedia'): ?>
                                        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Tersedia</span>
                                    <?php else: ?>
                                        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-100 text-slate-600 border border-slate-200">Habis</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <a href="<?= base_url('pindang-patin/' . $item['id']) ?>" class="p-1.5 rounded-lg bg-slate-50 hover:bg-primary-50 text-slate-600 hover:text-primary-800 border border-slate-200 transition-colors" title="Lihat Detail">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </a>
                                        <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="p-1.5 rounded-lg bg-slate-50 hover:bg-amber-50 text-slate-600 hover:text-amber-700 border border-slate-200 transition-colors" title="Edit Data">
                                            <i class="fa-solid fa-pen text-xs"></i>
                                        </a>
                                        <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="p-1.5 rounded-lg bg-slate-50 hover:bg-rose-50 text-slate-600 hover:text-rose-600 border border-slate-200 transition-colors" title="Hapus Data">
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

<!-- Modal Konfirmasi Hapus (Clean & Minimalist) -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border border-slate-200">
        <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mx-auto text-lg mb-3">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        <h3 class="text-base font-bold text-center text-slate-900">Hapus Data Masakan?</h3>
        <p class="text-xs text-center text-slate-500 mt-1">
            Menu <span id="deleteItemName" class="font-bold text-slate-800"></span> akan dihapus permanen dari sistem.
        </p>
        <div class="flex gap-2.5 mt-5">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 py-2 px-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition-colors">
                Batal
            </button>
            <a id="deleteConfirmBtn" href="#" class="flex-1 py-2 px-3 bg-rose-600 hover:bg-rose-700 text-white font-semibold text-xs rounded-xl text-center transition-colors">
                Hapus
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
