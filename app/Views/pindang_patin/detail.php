<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto space-y-8">
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500">
            <a href="<?= base_url('pindang-patin') ?>" class="hover:text-primary-800 transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Katalog Pindang Patin</span>
            </a>
            <span class="text-warm-300">/</span>
            <span class="text-primary-800 font-bold"><?= esc($item['kategori']) ?></span>
            <span class="text-warm-300">/</span>
            <span class="text-slate-400 truncate max-w-xs"><?= esc($item['nama']) ?></span>
        </nav>

        <!-- Actions -->
        <div class="flex items-center gap-2">
            <button onclick="window.print()" class="px-4 py-2 bg-white hover:bg-warm-100 border border-warm-200 text-slate-700 rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5">
                <i class="fa-solid fa-print text-primary-800"></i>
                <span>Cetak Resep</span>
            </button>
            <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="px-4 py-2 bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-200 rounded-xl text-xs font-bold transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-pen-to-square text-xs"></i>
                <span>Edit</span>
            </a>
            <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 rounded-xl text-xs font-bold transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-trash-can text-xs"></i>
                <span>Hapus</span>
            </button>
        </div>
    </div>

    <!-- Main Detail Presentation Card (Editorial Magazine Aesthetic) -->
    <div class="bg-white rounded-3xl border border-warm-200/90 shadow-card overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
            <!-- Left: Prominent AI Food Image -->
            <div class="lg:col-span-5 relative bg-slate-900 min-h-[320px] lg:min-h-full overflow-hidden group">
                <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                    <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                <?php else: ?>
                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 p-8">
                        <i class="fa-solid fa-fish text-5xl mb-2 text-slate-600"></i>
                        <span class="text-xs">Foto Sajian Belum Tersedia</span>
                    </div>
                <?php endif; ?>

                <!-- Badges on Image -->
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold bg-primary-900/90 text-secondary-300 border border-secondary-400/40 backdrop-blur-md shadow-sm">
                        <i class="fa-solid fa-crown text-[9px] text-secondary-400"></i> <?= esc($item['kategori']) ?>
                    </span>
                    <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-black/60 text-white backdrop-blur-md border border-white/20">
                        <?= esc($item['asal_daerah']) ?>
                    </span>
                </div>
            </div>

            <!-- Right: Culinary Profile & Info -->
            <div class="lg:col-span-7 p-6 sm:p-8 flex flex-col justify-between space-y-6">
                <div>
                    <!-- Badges Row -->
                    <div class="flex items-center justify-between gap-2 mb-3">
                        <div class="flex items-center gap-2">
                            <?php if ($item['tingkat_pedas'] === 'Sangat Pedas'): ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                    <i class="fa-solid fa-fire text-rose-600"></i> Sangat Pedas
                                </span>
                            <?php elseif ($item['tingkat_pedas'] === 'Pedas'): ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                    <i class="fa-solid fa-pepper-hot text-amber-600"></i> Pedas
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <i class="fa-solid fa-leaf text-emerald-600"></i> Sedang (Gurih Asam)
                                </span>
                            <?php endif; ?>

                            <?php if (($item['status'] ?? 'Tersedia') === 'Tersedia'): ?>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Siap Saji
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                    Habis
                                </span>
                            <?php endif; ?>
                        </div>

                        <span class="text-xs text-slate-400 font-mono">ID: #<?= str_pad($item['id'], 3, '0', STR_PAD_LEFT) ?></span>
                    </div>

                    <!-- Title -->
                    <h1 class="font-serif text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                        <?= esc($item['nama']) ?>
                    </h1>

                    <!-- Description -->
                    <p class="text-sm text-slate-600 mt-3 leading-relaxed">
                        <?= nl2br(esc($item['deskripsi'] ?: 'Pindang Patin khas Sumatera Selatan dengan perpaduan rempah segar, asam alami buah nanas madu atau tempoyak, dan kelembutan daging ikan patin sungai berlemak gurih.')) ?>
                    </p>
                </div>

                <!-- 4 Metrics Highlight Grid (Icons & Clean Badges) -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-surface-50 p-4 rounded-2xl border border-surface-200">
                    <div class="space-y-1">
                        <div class="flex items-center gap-1.5 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                            <i class="fa-solid fa-tag text-primary-800 text-[10px]"></i>
                            <span>Harga Porsi</span>
                        </div>
                        <div class="text-base font-black text-primary-900 font-sans">Rp <?= number_format($item['harga'], 0, ',', '.') ?></div>
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center gap-1.5 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                            <i class="fa-solid fa-users text-emerald-600 text-[10px]"></i>
                            <span>Porsi Saji</span>
                        </div>
                        <div class="text-xs font-bold text-slate-800"><?= esc($item['porsi'] ?: '2-3 Porsi') ?></div>
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center gap-1.5 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                            <i class="fa-solid fa-clock text-amber-600 text-[10px]"></i>
                            <span>Waktu Masak</span>
                        </div>
                        <div class="text-xs font-bold text-slate-800"><?= esc($item['estimasi_waktu'] ?: '40 Menit') ?></div>
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center gap-1.5 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                            <i class="fa-solid fa-location-dot text-rose-500 text-[10px]"></i>
                            <span>Asal Daerah</span>
                        </div>
                        <div class="text-xs font-bold text-slate-800 truncate"><?= esc($item['asal_daerah']) ?></div>
                    </div>
                </div>

                <!-- Footer Tag -->
                <div class="pt-2 border-t border-surface-200 flex items-center justify-between text-xs text-slate-500">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-user-graduate text-primary-800"></i>
                        <span>Peserta: <strong>Dafi Al Fajar</strong> (No. 07)</span>
                    </span>
                    <span>Sumatera Selatan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipe Breakdown: Bahan & Cara Memasak (Side by Side) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8">
        <!-- Bahan-Bahan & Bumbu Rempah (Checklist Interaktif) -->
        <div class="lg:col-span-5 bg-white rounded-3xl border border-warm-200/90 p-6 sm:p-7 shadow-card">
            <div class="flex items-center gap-3 mb-4 pb-3 border-b border-warm-200">
                <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary-800 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-mortar-pestle"></i>
                </div>
                <div>
                    <h2 class="font-bold text-slate-900 text-base">Bahan & Bumbu Rempah</h2>
                    <p class="text-[11px] text-slate-400">Centang bahan saat persiapan memasak</p>
                </div>
            </div>

            <div class="space-y-2.5">
                <?php 
                    $bahanList = preg_split('/\r\n|\r|\n/', (string)$item['bahan']);
                    $bahanList = array_filter(array_map('trim', $bahanList));
                ?>
                <?php if (empty($bahanList)): ?>
                    <p class="text-xs text-slate-500 italic">Bahan belum dicatat secara spesifik.</p>
                <?php else: ?>
                    <?php foreach ($bahanList as $bahan): ?>
                        <label class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-warm-50 cursor-pointer transition-colors group">
                            <input type="checkbox" onchange="toggleStrike(this)" class="mt-0.5 rounded text-primary-800 focus:ring-primary-700 h-4 w-4 border-slate-300 transition-all">
                            <span class="ingredient-text text-xs sm:text-sm text-slate-700 group-hover:text-slate-900 select-none leading-relaxed">
                                <?= esc($bahan) ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Cooking Tip Box -->
            <div class="mt-6 p-4 rounded-2xl bg-amber-50/80 border border-amber-200/80 text-xs text-amber-950 space-y-1 leading-relaxed">
                <div class="font-bold flex items-center gap-1.5 text-amber-950">
                    <i class="fa-solid fa-lightbulb text-secondary-600"></i>
                    <span>Rahasia Mengolah Ikan Patin:</span>
                </div>
                <p class="text-amber-900">
                    Lumuri potongan ikan patin dengan perasan air jeruk nipis dan garam halus selama 10-15 menit, lalu bilas air bersih mengalir. Ini menjaga aroma kuah tetap segar dan menghilangkan aroma lumpur pada ikan patin.
                </p>
            </div>
        </div>

        <!-- Langkah-Langkah Memasak -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-warm-200/90 p-6 sm:p-7 shadow-card">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-warm-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-secondary-100 text-secondary-800 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-kitchen-set"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-base">Petunjuk Langkah Memasak</h2>
                        <p class="text-[11px] text-slate-400">Instruksi memasak hingga bumbu meresap sempurna</p>
                    </div>
                </div>
                <span class="text-xs font-bold px-3 py-1 bg-warm-100 rounded-full text-slate-700">
                    <i class="fa-solid fa-clock text-slate-400 mr-1"></i> <?= esc($item['estimasi_waktu'] ?: '40 Menit') ?>
                </span>
            </div>

            <div class="space-y-3.5">
                <?php 
                    $langkahList = preg_split('/\r\n|\r|\n/', (string)$item['cara_membuat']);
                    $langkahList = array_filter(array_map('trim', $langkahList));
                ?>
                <?php if (empty($langkahList)): ?>
                    <p class="text-xs text-slate-500 italic">Petunjuk memasak belum dicatat.</p>
                <?php else: ?>
                    <?php $step = 1; foreach ($langkahList as $langkah): ?>
                        <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-warm-50/70 border border-warm-200/60 hover:border-primary-200 transition-colors">
                            <span class="w-7 h-7 rounded-xl bg-primary-800 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 shadow-sm">
                                <?= $step++ ?>
                            </span>
                            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed pt-0.5">
                                <?= esc(preg_replace('/^\d+\.\s*/', '', $langkah)) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Related Dishes / Rekomendasi Menu Lainnya -->
    <?php if (!empty($rekomendasi)): ?>
        <section class="pt-8 mt-4 border-t border-surface-200">
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-50 border border-primary-200/80 text-primary-800 text-[11px] font-bold mb-2 shadow-sm">
                        <i class="fa-solid fa-utensils text-secondary-600 text-[10px]"></i>
                        <span>Rekomendasi Menu Pilihan</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-slate-900 tracking-tight">
                        Varian Pindang Patin Lainnya
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">
                        Eksplorasi keanekaragaman cita rasa rempah autentik khas Bumi Sriwijaya.
                    </p>
                </div>
                <a href="<?= base_url('pindang-patin') ?>" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white hover:bg-surface-100 border border-surface-200 text-slate-700 hover:text-primary-800 text-xs font-bold transition-all shadow-sm hover:shadow active:scale-95 whitespace-nowrap">
                    <span>Lihat Semua Menu</span>
                    <i class="fa-solid fa-arrow-right text-[10px] text-primary-800"></i>
                </a>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <?php foreach ($rekomendasi as $rek): ?>
                    <a href="<?= base_url('pindang-patin/' . $rek['id']) ?>" class="group bg-white rounded-3xl border border-surface-200 shadow-soft hover:shadow-hover hover:-translate-y-1.5 hover:border-primary-200 transition-all duration-300 flex flex-col overflow-hidden">
                        <!-- Image Container with Overlay and Badges -->
                        <div class="relative h-44 bg-slate-900 overflow-hidden">
                            <?php if (!empty($rek['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $rek['gambar'])): ?>
                                <img src="<?= base_url('uploads/pindang/' . esc($rek['gambar'])) ?>" alt="<?= esc($rek['nama']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-800">
                                    <i class="fa-solid fa-fish text-3xl"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Subtle gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                            <!-- Floating Badges Top -->
                            <div class="absolute top-3 left-3 right-3 flex items-center justify-between">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-primary-900/90 text-secondary-300 border border-secondary-400/30 backdrop-blur-md shadow-sm">
                                    <i class="fa-solid fa-crown text-[8px] text-secondary-400"></i>
                                    <?= esc($rek['kategori']) ?>
                                </span>

                                <?php if (($rek['tingkat_pedas'] ?? '') === 'Sangat Pedas'): ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-600/95 text-white backdrop-blur-md shadow-sm">
                                        <i class="fa-solid fa-fire text-yellow-300 text-[8px]"></i> Sangat Pedas
                                    </span>
                                <?php elseif (($rek['tingkat_pedas'] ?? '') === 'Pedas'): ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-600/95 text-white backdrop-blur-md shadow-sm">
                                        <i class="fa-solid fa-pepper-hot text-yellow-200 text-[8px]"></i> Pedas
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-600/95 text-white backdrop-blur-md shadow-sm">
                                        <i class="fa-solid fa-leaf text-yellow-200 text-[8px]"></i> Sedang
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Bottom Image Bar -->
                            <div class="absolute bottom-2.5 left-3 right-3 flex items-center justify-between text-white text-[10px] font-semibold">
                                <span class="flex items-center gap-1 text-slate-200">
                                    <i class="fa-solid fa-location-dot text-rose-400"></i>
                                    <?= esc($rek['asal_daerah']) ?>
                                </span>
                                <span class="px-2 py-0.5 rounded-md bg-black/60 backdrop-blur-md border border-white/20">
                                    <i class="fa-solid fa-clock text-secondary-300 mr-1"></i><?= esc($rek['estimasi_waktu'] ?: '40m') ?>
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-4 sm:p-5 flex flex-col flex-grow justify-between space-y-3">
                            <div>
                                <h4 class="font-serif font-bold text-slate-900 group-hover:text-primary-800 transition-colors text-base leading-snug line-clamp-1">
                                    <?= esc($rek['nama']) ?>
                                </h4>
                                <p class="text-xs text-slate-500 line-clamp-2 mt-1.5 leading-relaxed">
                                    <?= esc($rek['deskripsi'] ?: 'Pindang Patin khas Sumatera Selatan dengan kuah rempah aromatik nanas dan bumbu autentik.') ?>
                                </p>
                            </div>

                            <!-- Card Footer -->
                            <div class="pt-3 border-t border-surface-200 flex items-center justify-between gap-2">
                                <div>
                                    <span class="text-[10px] text-slate-400 font-semibold uppercase block">Harga</span>
                                    <span class="font-black text-primary-900 text-sm sm:text-base font-sans">
                                        Rp <?= number_format($rek['harga'], 0, ',', '.') ?>
                                    </span>
                                </div>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-primary-50 group-hover:bg-primary-800 text-primary-800 group-hover:text-white text-xs font-bold transition-all shadow-sm">
                                    <span>Resep</span>
                                    <i class="fa-solid fa-arrow-right text-[9px]"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-warm-200">
        <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center mx-auto text-xl mb-3 shadow-inner">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        <h3 class="text-base font-bold text-center text-slate-900">Hapus Data Masakan?</h3>
        <p class="text-xs text-center text-slate-500 mt-1 leading-relaxed">
            Menu <span id="deleteItemName" class="font-bold text-slate-800"></span> akan dihapus permanen.
        </p>
        <div class="flex gap-2.5 mt-6">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 py-2.5 px-3 bg-warm-100 hover:bg-warm-200 text-slate-700 font-bold text-xs rounded-xl transition-colors">
                Batal
            </button>
            <a id="deleteConfirmBtn" href="#" class="flex-1 py-2.5 px-3 bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs rounded-xl text-center shadow-md shadow-rose-600/20 transition-colors">
                Ya, Hapus
            </a>
        </div>
    </div>
</div>

<script>
    function toggleStrike(checkbox) {
        const textSpan = checkbox.nextElementSibling;
        if (checkbox.checked) {
            textSpan.classList.add('line-through', 'text-slate-400');
        } else {
            textSpan.classList.remove('line-through', 'text-slate-400');
        }
    }

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
