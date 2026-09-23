<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto space-y-6">
    <!-- Top Bar: Back & Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <a href="<?= base_url('pindang-patin') ?>" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-primary-800 transition-colors">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            <span>Kembali ke Katalog Pindang</span>
        </a>

        <div class="flex items-center gap-2">
            <button onclick="window.print()" class="px-3 py-1.5 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 rounded-xl text-xs font-semibold transition-all shadow-sm flex items-center gap-1.5">
                <i class="fa-solid fa-print text-primary-800"></i>
                <span>Cetak Resep</span>
            </button>
            <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="px-3 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-200 rounded-xl text-xs font-semibold transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-pen text-[10px]"></i>
                <span>Edit</span>
            </a>
            <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 rounded-xl text-xs font-semibold transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-trash text-[10px]"></i>
                <span>Hapus</span>
            </button>
        </div>
    </div>

    <!-- Main Detail Card (Proper & Clean) -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.04)] overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-0">
            <!-- Left: AI Image Showcase -->
            <div class="md:col-span-5 bg-slate-900 relative min-h-[280px] md:min-h-full overflow-hidden">
                <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                    <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 p-8">
                        <i class="fa-solid fa-fish text-4xl mb-2 text-slate-500"></i>
                        <span class="text-xs">Foto Sajian Belum Tersedia</span>
                    </div>
                <?php endif; ?>

                <div class="absolute top-3 left-3 flex items-center gap-2">
                    <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-primary-900/90 text-white backdrop-blur-sm shadow">
                        <?= esc($item['kategori']) ?>
                    </span>
                    <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-black/60 text-white backdrop-blur-sm">
                        <?= esc($item['asal_daerah']) ?>
                    </span>
                </div>
            </div>

            <!-- Right: Content Information -->
            <div class="md:col-span-7 p-6 sm:p-7 flex flex-col justify-between space-y-4">
                <div>
                    <!-- Badges -->
                    <div class="flex items-center justify-between gap-2 mb-2">
                        <div class="flex items-center gap-2">
                            <?php if ($item['tingkat_pedas'] === 'Sangat Pedas'): ?>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                    Sangat Pedas
                                </span>
                            <?php elseif ($item['tingkat_pedas'] === 'Pedas'): ?>
                                <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                    Pedas
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Sedang
                                </span>
                            <?php endif; ?>

                            <?php if (($item['status'] ?? 'Tersedia') === 'Tersedia'): ?>
                                <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Tersedia
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                    Habis
                                </span>
                            <?php endif; ?>
                        </div>

                        <span class="text-xs text-slate-400 font-mono">Menu #<?= $item['id'] ?></span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-900 leading-tight">
                        <?= esc($item['nama']) ?>
                    </h1>

                    <!-- Description -->
                    <p class="text-xs sm:text-sm text-slate-600 mt-2.5 leading-relaxed">
                        <?= nl2br(esc($item['deskripsi'] ?: 'Pindang Patin khas Sumatera Selatan dengan perpaduan rempah segar, asam alami, dan kelembutan daging ikan patin sungai berlemak gurih.')) ?>
                    </p>
                </div>

                <!-- Info Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-slate-50 p-3.5 rounded-xl border border-slate-200/70">
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Harga</div>
                        <div class="text-sm font-extrabold text-primary-800 mt-0.5">Rp <?= number_format($item['harga'], 0, ',', '.') ?></div>
                    </div>
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Porsi</div>
                        <div class="text-xs font-semibold text-slate-800 mt-0.5"><?= esc($item['porsi'] ?: '2-3 Porsi') ?></div>
                    </div>
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Waktu</div>
                        <div class="text-xs font-semibold text-slate-800 mt-0.5"><?= esc($item['estimasi_waktu'] ?: '40 Menit') ?></div>
                    </div>
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Asal</div>
                        <div class="text-xs font-semibold text-slate-800 mt-0.5 truncate"><?= esc($item['asal_daerah']) ?></div>
                    </div>
                </div>

                <!-- Sub-info -->
                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                    <span>Peserta: <strong>Dafi Al Fajar</strong> (Absen 07)</span>
                    <span>Sumatera Selatan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipe Breakdown: Bahan & Langkah Memasak -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <!-- Bahan-Bahan -->
        <div class="md:col-span-5 bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-[0_1px_3px_rgba(0,0,0,0.04)]">
            <h2 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-1 flex items-center gap-2">
                <i class="fa-solid fa-mortar-pestle text-primary-800"></i>
                <span>Bahan & Bumbu Rempah</span>
            </h2>
            <p class="text-[11px] text-slate-400 mb-4">Centang bahan saat persiapan memasak</p>

            <div class="space-y-2">
                <?php 
                    $bahanList = preg_split('/\r\n|\r|\n/', (string)$item['bahan']);
                    $bahanList = array_filter(array_map('trim', $bahanList));
                ?>
                <?php if (empty($bahanList)): ?>
                    <p class="text-xs text-slate-500 italic">Bahan belum dicatat.</p>
                <?php else: ?>
                    <?php foreach ($bahanList as $bahan): ?>
                        <label class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                            <input type="checkbox" class="mt-0.5 rounded text-primary-800 focus:ring-primary-700 h-4 w-4 border-slate-300">
                            <span class="text-xs text-slate-700 group-hover:text-slate-900 select-none leading-relaxed">
                                <?= esc($bahan) ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Simple Proper Tip Box -->
            <div class="mt-5 p-3 rounded-xl bg-amber-50/70 border border-amber-200/60 text-xs text-amber-900 leading-relaxed">
                <span class="font-bold text-amber-950 block mb-0.5">Tips Mengolah Ikan Patin:</span>
                Lumuri ikan patin dengan air jeruk nipis dan sedikit garam selama 10-15 menit sebelum dimasak untuk menghilangkan aroma lumpur dan menjaga kesegaran daging.
            </div>
        </div>

        <!-- Langkah Memasak -->
        <div class="md:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-[0_1px_3px_rgba(0,0,0,0.04)]">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="font-bold text-slate-900 text-sm uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-kitchen-set text-secondary-600"></i>
                        <span>Petunjuk Langkah Memasak</span>
                    </h2>
                    <p class="text-[11px] text-slate-400 mt-0.5">Instruksi memasak hingga matang meresap</p>
                </div>
                <span class="text-[11px] font-semibold px-2.5 py-1 bg-slate-100 rounded-lg text-slate-600">
                    <?= esc($item['estimasi_waktu'] ?: '40 Menit') ?>
                </span>
            </div>

            <div class="space-y-3">
                <?php 
                    $langkahList = preg_split('/\r\n|\r|\n/', (string)$item['cara_membuat']);
                    $langkahList = array_filter(array_map('trim', $langkahList));
                ?>
                <?php if (empty($langkahList)): ?>
                    <p class="text-xs text-slate-500 italic">Petunjuk memasak belum dicatat.</p>
                <?php else: ?>
                    <?php $step = 1; foreach ($langkahList as $langkah): ?>
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50/60 border border-slate-100">
                            <span class="w-6 h-6 rounded-lg bg-primary-800 text-white font-bold text-xs flex items-center justify-center flex-shrink-0">
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

    <!-- Related Dishes -->
    <?php if (!empty($rekomendasi)): ?>
        <div class="pt-4">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-900 text-base">Menu Rekomendasi Lainnya</h3>
                <a href="<?= base_url('pindang-patin') ?>" class="text-xs font-semibold text-primary-800 hover:underline">Lihat Semua</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <?php foreach ($rekomendasi as $rek): ?>
                    <a href="<?= base_url('pindang-patin/' . $rek['id']) ?>" class="group bg-white rounded-xl p-3 border border-slate-200/80 hover:border-slate-300 shadow-sm transition-all flex flex-col">
                        <div class="h-32 rounded-lg bg-slate-100 overflow-hidden mb-2.5">
                            <?php if (!empty($rek['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $rek['gambar'])): ?>
                                <img src="<?= base_url('uploads/pindang/' . esc($rek['gambar'])) ?>" alt="<?= esc($rek['nama']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-slate-300 text-2xl">
                                    <i class="fa-solid fa-fish"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h4 class="font-semibold text-slate-900 group-hover:text-primary-800 text-xs sm:text-sm line-clamp-1">
                            <?= esc($rek['nama']) ?>
                        </h4>
                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-slate-100 text-xs">
                            <span class="font-bold text-primary-800">Rp <?= number_format($rek['harga'], 0, ',', '.') ?></span>
                            <span class="text-slate-400 text-[11px] group-hover:text-primary-800 font-medium">Detail →</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border border-slate-200">
        <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mx-auto text-lg mb-3">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        <h3 class="text-base font-bold text-center text-slate-900">Hapus Data Masakan?</h3>
        <p class="text-xs text-center text-slate-500 mt-1">
            Menu <span id="deleteItemName" class="font-bold text-slate-800"></span> akan dihapus permanen.
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
