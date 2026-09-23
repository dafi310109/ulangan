<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-6xl mx-auto space-y-8">
    <!-- Breadcrumb & Nav -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500">
            <a href="<?= base_url('pindang-patin') ?>" class="hover:text-primary-800 transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Katalog Pindang Patin</span>
            </a>
            <span>/</span>
            <span class="text-primary-800 font-bold"><?= esc($item['kategori']) ?></span>
            <span>/</span>
            <span class="text-slate-400 truncate max-w-xs"><?= esc($item['nama']) ?></span>
        </nav>

        <div class="flex items-center gap-2">
            <!-- Share / Print -->
            <button onclick="window.print()" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 text-slate-600 rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5">
                <i class="fa-solid fa-print text-primary-700"></i>
                <span>Cetak Resep</span>
            </button>

            <!-- Edit Button -->
            <a href="<?= base_url('pindang-patin/edit/' . $item['id']) ?>" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Edit Data</span>
            </a>

            <!-- Delete Button -->
            <button type="button" onclick="confirmDelete(<?= $item['id'] ?>, '<?= esc(addslashes($item['nama'])) ?>')" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5">
                <i class="fa-solid fa-trash-can"></i>
                <span>Hapus</span>
            </button>
        </div>
    </div>

    <!-- Main Detail Presentation Card -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
            <!-- Left Column: Hero AI Food Image Showcase -->
            <div class="lg:col-span-6 relative bg-gradient-to-br from-primary-950 via-primary-900 to-slate-900 min-h-[360px] lg:min-h-full flex items-center justify-center overflow-hidden group">
                <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                    <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" alt="<?= esc($item['nama']) ?>" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                <?php else: ?>
                    <div class="text-center p-12 text-slate-400">
                        <i class="fa-solid fa-bowl-food text-6xl text-secondary-400/50 mb-4"></i>
                        <p class="text-sm font-semibold">Foto Sajian Belum Tersedia</p>
                    </div>
                <?php endif; ?>

                <!-- Badges Overlay -->
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-primary-900/85 text-secondary-300 border border-secondary-400/40 backdrop-blur-md shadow-md">
                        <i class="fa-solid fa-crown text-[10px]"></i> <?= esc($item['kategori']) ?>
                    </span>
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-black/60 text-white backdrop-blur-md border border-white/20">
                        <i class="fa-solid fa-location-dot text-rose-400"></i> <?= esc($item['asal_daerah']) ?>
                    </span>
                </div>

                <!-- AI Watermark Badge -->
                <div class="absolute bottom-4 right-4 bg-slate-900/80 backdrop-blur-md text-slate-200 text-[10px] font-semibold px-2.5 py-1 rounded-lg border border-white/10 flex items-center gap-1.5">
                    <i class="fa-solid fa-wand-magic-sparkles text-secondary-400"></i>
                    <span>Visual AI Generated</span>
                </div>
            </div>

            <!-- Right Column: Key Details & Pricing -->
            <div class="lg:col-span-6 p-6 sm:p-8 flex flex-col justify-between space-y-6">
                <div>
                    <!-- Status and Spicy badge -->
                    <div class="flex items-center justify-between gap-2 mb-3">
                        <div class="flex items-center gap-2">
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
                                    <i class="fa-solid fa-leaf text-emerald-600"></i> Sedang (Gurih Asam)
                                </span>
                            <?php endif; ?>

                            <?php if (($item['status'] ?? 'Tersedia') === 'Tersedia'): ?>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Siap Saji
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 border border-slate-200">
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
                        <?= nl2br(esc($item['deskripsi'] ?: 'Pindang Patin khas Sumatera Selatan dengan perpaduan rempah segar, asam jawa/nanas alami, dan kelembutan daging ikan patin sungai berlemak gurih.')) ?>
                    </p>
                </div>

                <!-- 4 Highlights Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-amber-50/40 p-4 rounded-2xl border border-secondary-200/50">
                    <div>
                        <div class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Harga</div>
                        <div class="text-base font-extrabold text-primary-900 mt-0.5">Rp <?= number_format($item['harga'], 0, ',', '.') ?></div>
                    </div>
                    <div>
                        <div class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Porsi</div>
                        <div class="text-sm font-bold text-slate-800 mt-0.5"><?= esc($item['porsi'] ?: '2-3 Porsi') ?></div>
                    </div>
                    <div>
                        <div class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Waktu Masak</div>
                        <div class="text-sm font-bold text-slate-800 mt-0.5"><?= esc($item['estimasi_waktu'] ?: '40 Menit') ?></div>
                    </div>
                    <div>
                        <div class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Asal</div>
                        <div class="text-sm font-bold text-slate-800 mt-0.5 truncate"><?= esc($item['asal_daerah']) ?></div>
                    </div>
                </div>

                <!-- Footer Student Tag -->
                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-user-graduate text-primary-700"></i>
                        <span>Peserta: <strong>Dafi Al Fajar</strong> (No. 07)</span>
                    </div>
                    <span>Sumatera Selatan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipe Breakdown: Bahan & Cara Memasak -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Bahan-bahan Utama (Interactive Checklist) -->
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/80">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-primary-100 text-primary-800 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-mortar-pestle"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-lg">Bahan & Bumbu Rempah</h2>
                        <p class="text-xs text-slate-400">Centang bahan saat persiapan memasak</p>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <?php 
                    $bahanList = preg_split('/\r\n|\r|\n/', (string)$item['bahan']);
                    $bahanList = array_filter(array_map('trim', $bahanList));
                ?>
                <?php if (empty($bahanList)): ?>
                    <p class="text-xs text-slate-500 italic">Bahan belum dicatat secara spesifik.</p>
                <?php else: ?>
                    <?php foreach ($bahanList as $idx => $bahan): ?>
                        <label class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-200 cursor-pointer transition-colors group">
                            <input type="checkbox" class="mt-1 rounded text-primary-700 focus:ring-primary-500 h-4 w-4 border-slate-300">
                            <span class="text-xs sm:text-sm text-slate-700 group-hover:text-slate-900 leading-relaxed select-none">
                                <?= esc($bahan) ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Cooking Tip Box -->
            <div class="mt-6 p-4 rounded-2xl bg-amber-50/70 border border-amber-200/70 text-xs text-amber-900 space-y-1.5">
                <div class="font-bold flex items-center gap-1.5 text-amber-950">
                    <i class="fa-solid fa-lightbulb text-secondary-600"></i>
                    <span>Tips Mengolah Ikan Patin:</span>
                </div>
                <p class="text-amber-900/90 leading-relaxed">
                    Lumuri ikan patin dengan perasan jeruk nipis dan sedikit garam selama 10-15 menit sebelum dimasak, lalu bilas air mengalir. Ini efektif menghilangkan aroma lumpur dan menjaga tekstur ikan tetap kenyal lembut.
                </p>
            </div>
        </div>

        <!-- Langkah & Cara Memasak -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/80">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-secondary-100 text-secondary-800 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-kitchen-set"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-lg">Langkah Memasak</h2>
                        <p class="text-xs text-slate-400">Petunjuk langkah demi langkah memasak Pindang</p>
                    </div>
                </div>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-600">
                    <i class="fa-solid fa-clock mr-1 text-slate-400"></i> <?= esc($item['estimasi_waktu'] ?: '40 Menit') ?>
                </span>
            </div>

            <div class="space-y-4">
                <?php 
                    $langkahList = preg_split('/\r\n|\r|\n/', (string)$item['cara_membuat']);
                    $langkahList = array_filter(array_map('trim', $langkahList));
                ?>
                <?php if (empty($langkahList)): ?>
                    <p class="text-xs text-slate-500 italic">Petunjuk memasak belum dicatat.</p>
                <?php else: ?>
                    <?php $step = 1; foreach ($langkahList as $langkah): ?>
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50/60 border border-slate-100 hover:border-primary-100 transition-colors">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-primary-800 to-primary-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 shadow-sm">
                                <?= $step++ ?>
                            </div>
                            <div class="text-xs sm:text-sm text-slate-700 leading-relaxed pt-1">
                                <?= esc(preg_replace('/^\d+\.\s*/', '', $langkah)) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Related Dishes / Rekomendasi Lainnya -->
    <?php if (!empty($rekomendasi)): ?>
        <div class="pt-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="font-serif text-2xl font-bold text-slate-900">Varian Pindang Patin Lainnya</h3>
                    <p class="text-xs text-slate-500 mt-1">Eksplorasi cita rasa lain dari Sumatera Selatan</p>
                </div>
                <a href="<?= base_url('pindang-patin') ?>" class="text-xs font-bold text-primary-800 hover:text-primary-900 transition-colors flex items-center gap-1">
                    <span>Lihat Semua</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($rekomendasi as $rek): ?>
                    <a href="<?= base_url('pindang-patin/' . $rek['id']) ?>" class="group bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-royal hover:border-primary-200 transition-all duration-300 flex flex-col">
                        <div class="relative h-44 rounded-xl overflow-hidden mb-3 bg-slate-100">
                            <?php if (!empty($rek['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $rek['gambar'])): ?>
                                <img src="<?= base_url('uploads/pindang/' . esc($rek['gambar'])) ?>" alt="<?= esc($rek['nama']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-bowl-food text-3xl"></i>
                                </div>
                            <?php endif; ?>
                            <span class="absolute top-2.5 left-2.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-primary-900/80 text-secondary-300 backdrop-blur-md">
                                <?= esc($rek['kategori']) ?>
                            </span>
                        </div>
                        <h4 class="font-bold text-slate-900 group-hover:text-primary-800 text-sm leading-snug line-clamp-1">
                            <?= esc($rek['nama']) ?>
                        </h4>
                        <p class="text-xs text-slate-500 line-clamp-2 mt-1 flex-grow">
                            <?= esc($rek['deskripsi'] ?: 'Varian pindang patin lezat berkuah rempah.') ?>
                        </p>
                        <div class="flex items-center justify-between mt-3 pt-3 border-t border-slate-100">
                            <span class="font-extrabold text-xs text-primary-900">Rp <?= number_format($rek['harga'], 0, ',', '.') ?></span>
                            <span class="text-[11px] font-semibold text-secondary-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                Detail <i class="fa-solid fa-chevron-right text-[9px]"></i>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border border-slate-200">
        <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto text-xl mb-4">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <h3 class="text-lg font-bold text-center text-slate-800">Konfirmasi Hapus Data</h3>
        <p class="text-xs text-center text-slate-500 mt-2">
            Apakah Anda yakin ingin menghapus masakan <span id="deleteItemName" class="font-bold text-slate-800"></span>?
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
