<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary-950 via-primary-900 to-primary-800 text-white p-6 sm:p-10 shadow-royal mb-8 border border-secondary-500/20">
    <div class="absolute -right-10 -bottom-10 w-72 h-72 rounded-full bg-secondary-500/10 blur-3xl pointer-events-none"></div>
    <div class="absolute right-20 top-0 w-48 h-48 rounded-full bg-primary-600/20 blur-2xl pointer-events-none"></div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
        <div class="max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-500/20 border border-secondary-400/40 text-secondary-300 text-xs font-semibold uppercase tracking-wider mb-3">
                <i class="fa-solid fa-crown text-secondary-400"></i> Warisan Kuliner Khas Sumatera Selatan
            </div>
            <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                Pindang Patin <span class="text-secondary-400 font-sans italic font-normal">Nusantara</span>
            </h1>
            <p class="mt-3 text-slate-200 text-sm sm:text-base leading-relaxed">
                Kelola ragam resep dan varian hidangan Pindang Patin autentik berkuah asam-pedas gurih khas Bumi Sriwijaya. Lengkap dengan takaran bumbu, estimasi waktu, dan harga sajian.
            </p>

            <div class="flex flex-wrap gap-4 mt-6">
                <a href="<?= base_url('pindang-patin/create') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-secondary-500 to-secondary-600 hover:from-secondary-400 hover:to-secondary-500 text-slate-900 font-bold text-sm shadow-lg shadow-secondary-900/30 hover:shadow-xl transition-all duration-200">
                    <i class="fa-solid fa-plus-circle"></i>
                    <span>Tambah Data Pindang</span>
                </a>
                <a href="#daftar-menu" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-sm transition-all duration-200 backdrop-blur-sm">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Lihat <?= count($makanan) ?> Menu Tersedia</span>
                </a>
            </div>
        </div>

        <!-- Quick Stats Cards -->
        <div class="grid grid-cols-2 gap-3 sm:gap-4 lg:w-80">
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <div class="text-secondary-400 text-2xl font-black"><?= count($makanan) ?></div>
                <div class="text-[11px] text-slate-300 font-medium uppercase tracking-wider mt-1">Total Variasi</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <div class="text-emerald-400 text-2xl font-black">
                    <?= count(array_filter($makanan, fn($m) => ($m['status'] ?? 'Tersedia') === 'Tersedia')) ?>
                </div>
                <div class="text-[11px] text-slate-300 font-medium uppercase tracking-wider mt-1">Siap Saji</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <div class="text-amber-300 text-2xl font-black">
                    <?= count(array_unique(array_column($makanan, 'kategori'))) ?>
                </div>
                <div class="text-[11px] text-slate-300 font-medium uppercase tracking-wider mt-1">Kategori</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <div class="text-rose-300 text-2xl font-black">Sumsel</div>
                <div class="text-[11px] text-slate-300 font-medium uppercase tracking-wider mt-1">Asal Daerah</div>
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter Controls -->
<section id="daftar-menu" class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-slate-200/80 mb-6">
    <form action="<?= base_url('pindang-patin') ?>" method="GET" class="space-y-4">
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Search Bar -->
            <div class="flex-grow relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </div>
                <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Cari varian pindang patin, bahan, atau deskripsi..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
            </div>

            <!-- Filter Kategori -->
            <div class="w-full md:w-52">
                <select name="kategori" onchange="this.form.submit()" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    <option value="Semua" <?= $selectedKat === 'Semua' ? 'selected' : '' ?>>Semua Kategori</option>
                    <?php foreach ($kategoriList as $kat): ?>
                        <option value="<?= $kat ?>" <?= $selectedKat === $kat ? 'selected' : '' ?>><?= $kat ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Filter Pedas -->
            <div class="w-full md:w-48">
                <select name="pedas" onchange="this.form.submit()" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    <option value="Semua" <?= $selectedPedas === 'Semua' ? 'selected' : '' ?>>Semua Tingkat Pedas</option>
                    <?php foreach ($pedasList as $pds): ?>
                        <option value="<?= $pds ?>" <?= $selectedPedas === $pds ? 'selected' : '' ?>><?= $pds ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Submit Button & Reset -->
            <div class="flex items-center gap-2">
                <button type="submit" class="px-5 py-2.5 bg-primary-800 hover:bg-primary-900 text-white rounded-xl text-sm font-semibold shadow-sm transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-filter text-xs text-secondary-400"></i>
                    <span>Terapkan</span>
                </button>
                <?php if (!empty($search) || $selectedKat !== 'Semua' || $selectedPedas !== 'Semua'): ?>
                    <a href="<?= base_url('pindang-patin') ?>" class="px-3.5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-sm font-semibold transition-colors" title="Reset Filter">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </form>
</section>

<!-- Data Table / CRUD Table View -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 bg-slate-50/50">
        <div>
            <h2 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-primary-700"></span>
                Daftar Masakan Pindang Patin
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">Menampilkan <?= count($makanan) ?> data masakan terdaftar</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-primary-50 text-primary-800 border border-primary-200">
                <i class="fa-solid fa-database mr-1 text-primary-600"></i> MySQL Connected
            </span>
        </div>
    </div>

    <?php if (empty($makanan)): ?>
        <div class="py-16 px-4 text-center">
            <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center mx-auto text-2xl mb-3 shadow-inner">
                <i class="fa-solid fa-bowl-food"></i>
            </div>
            <h3 class="text-base font-bold text-slate-800">Tidak ada data Pindang Patin yang cocok</h3>
            <p class="text-xs text-slate-500 max-w-sm mx-auto mt-1">Silakan sesuaikan kata kunci pencarian atau reset filter untuk menampilkan seluruh data.</p>
            <a href="<?= base_url('pindang-patin') ?>" class="inline-flex items-center gap-1.5 mt-4 px-4 py-2 bg-primary-800 text-white rounded-xl text-xs font-semibold shadow hover:bg-primary-900 transition-colors">
                <i class="fa-solid fa-arrow-rotate-left"></i> Reset Filter
            </a>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-100/70 text-[11px] font-bold text-slate-600 uppercase tracking-wider">
                        <th class="py-3.5 px-4 w-12 text-center">No</th>
                        <th class="py-3.5 px-4">Menu Pindang Patin</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Asal Daerah</th>
                        <th class="py-3.5 px-4">Tingkat Pedas</th>
                        <th class="py-3.5 px-4">Harga / Porsi</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4 text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    <?php $no = 1; foreach ($makanan as $item): ?>
                        <tr class="hover:bg-amber-50/30 transition-colors duration-150 group">
                            <!-- No -->
                            <td class="py-4 px-4 text-center font-semibold text-slate-400 group-hover:text-primary-800">
                                <?= $no++ ?>
                            </td>

                            <!-- Menu & Deskripsi -->
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-100 to-secondary-100 border border-primary-200 flex-shrink-0 flex items-center justify-center overflow-hidden shadow-sm">
                                        <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                                            <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <i class="fa-solid fa-bowl-rice text-primary-700 text-lg"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 group-hover:text-primary-800 transition-colors">
                                            <?= esc($item['nama']) ?>
                                        </div>
                                        <div class="text-xs text-slate-500 line-clamp-1 max-w-xs mt-0.5">
                                            <?= esc($item['deskripsi'] ?: 'Kuliner khas ikan patin dengan rempah aromatik.') ?>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Kategori -->
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-primary-800 border border-primary-200">
                                    <?= esc($item['kategori']) ?>
                                </span>
                            </td>

                            <!-- Asal Daerah -->
                            <td class="py-4 px-4 text-xs font-medium text-slate-600">
                                <i class="fa-solid fa-location-dot text-rose-500 mr-1"></i>
                                <?= esc($item['asal_daerah']) ?>
                            </td>

                            <!-- Tingkat Pedas -->
                            <td class="py-4 px-4">
                                <?php if ($item['tingkat_pedas'] === 'Sangat Pedas'): ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-300">
                                        <i class="fa-solid fa-fire text-red-600"></i> Sangat Pedas
                                    </span>
                                <?php elseif ($item['tingkat_pedas'] === 'Pedas'): ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-orange-100 text-orange-800 border border-orange-300">
                                        <i class="fa-solid fa-pepper-hot text-orange-600"></i> Pedas
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-300">
                                        <i class="fa-solid fa-leaf text-emerald-600"></i> Sedang
                                    </span>
                                <?php endif; ?>
                            </td>

                            <!-- Harga -->
                            <td class="py-4 px-4 font-bold text-slate-800">
                                <div class="text-primary-800">Rp <?= number_format($item['harga'], 0, ',', '.') ?></div>
                                <div class="text-[11px] text-slate-400 font-normal"><?= esc($item['porsi'] ?: '1 Porsi') ?></div>
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-4 text-center">
                                <?php if (($item['status'] ?? 'Tersedia') === 'Tersedia'): ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Habis
                                    </span>
                                <?php endif; ?>
                            </td>

                            <!-- Tombol Aksi CRUD (Edit, Delete) -->
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <!-- Edit Button -->
                                    <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="p-2 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-700 hover:text-amber-800 border border-amber-200 transition-colors shadow-sm" title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="p-2 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 hover:text-rose-800 border border-rose-200 transition-colors shadow-sm" title="Hapus Data">
                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border border-slate-200 transform transition-all">
        <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto text-xl mb-4">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <h3 class="text-lg font-bold text-center text-slate-800">Konfirmasi Hapus Data</h3>
        <p class="text-xs text-center text-slate-500 mt-2">
            Apakah Anda yakin ingin menghapus masakan <span id="deleteItemName" class="font-bold text-slate-800"></span>? Data yang dihapus tidak dapat dipulihkan kembali.
        </p>
        <div class="flex gap-3 mt-6">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 py-2.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition-colors">
                Batal
            </button>
            <a id="deleteConfirmBtn" href="#" class="flex-1 py-2.5 px-4 bg-rose-600 hover:bg-rose-700 text-white font-semibold text-xs rounded-xl text-center shadow-md shadow-rose-600/20 transition-colors">
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
