<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb & Back -->
    <div class="flex items-center justify-between mb-6">
        <a href="<?= base_url('pindang-patin') ?>" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-primary-800 transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Menu</span>
        </a>
        <div class="text-xs text-slate-400">
            Form Edit Data Pindang Patin #<?= $item['id'] ?>
        </div>
    </div>

    <!-- Main Card Form -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-200/80 overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-primary-950 via-primary-900 to-primary-800 text-white p-6 sm:p-8 relative">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-secondary-500/20 border border-secondary-400/30 text-secondary-400 flex items-center justify-center text-2xl shadow-inner">
                    <i class="fa-solid fa-pen-nib"></i>
                </div>
                <div>
                    <h1 class="font-serif text-2xl sm:text-3xl font-bold text-white">Edit Varian Pindang Patin</h1>
                    <p class="text-xs sm:text-sm text-slate-300 mt-1">Perbarui rincian resep, harga, bahan, dan status ketersediaan masakan.</p>
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <form action="<?= base_url('pindang-patin/update/' . $item['id']) ?>" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            <?= csrf_field() ?>

            <!-- Section 1: Informasi Pokok -->
            <div>
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-primary-700"></span> Informasi Utama
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <!-- Nama Menu -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Nama Masakan / Varian <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="nama" value="<?= old('nama', $item['nama']) ?>" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Kategori Masakan <span class="text-rose-500">*</span>
                        </label>
                        <select name="kategori" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <?php foreach (['Tradisional', 'Tempoyak', 'Kuah Bening', 'Kuah Pedas', 'Spesial'] as $kat): ?>
                                <option value="<?= $kat ?>" <?= old('kategori', $item['kategori']) === $kat ? 'selected' : '' ?>><?= $kat ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Asal Daerah -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Asal Daerah / Kota <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="asal_daerah" value="<?= old('asal_daerah', $item['asal_daerah']) ?>" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Estimasi Harga (Rp) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-xs font-bold text-slate-400">Rp</span>
                            <input type="number" name="harga" value="<?= old('harga', $item['harga']) ?>" min="0" step="1000" required class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Tingkat Pedas -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Tingkat Kepedasan
                        </label>
                        <select name="tingkat_pedas" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <?php foreach (['Sedang', 'Pedas', 'Sangat Pedas'] as $pds): ?>
                                <option value="<?= $pds ?>" <?= old('tingkat_pedas', $item['tingkat_pedas']) === $pds ? 'selected' : '' ?>><?= $pds ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Porsi -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Takaran Porsi
                        </label>
                        <input type="text" name="porsi" value="<?= old('porsi', $item['porsi']) ?>" placeholder="Contoh: 2-3 Porsi" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Estimasi Waktu Masak -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Estimasi Waktu Memasak
                        </label>
                        <input type="text" name="estimasi_waktu" value="<?= old('estimasi_waktu', $item['estimasi_waktu']) ?>" placeholder="Contoh: 40 Menit" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Status Ketersediaan
                        </label>
                        <select name="status" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <option value="Tersedia" <?= old('status', $item['status']) === 'Tersedia' ? 'selected' : '' ?>>Tersedia (Ready Siap Saji)</option>
                            <option value="Habis" <?= old('status', $item['status']) === 'Habis' ? 'selected' : '' ?>>Habis</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            <!-- Section 2: Deskripsi & Resep -->
            <div>
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary-500"></span> Deskripsi & Resep Masakan
                </h3>
                <div class="space-y-4">
                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Deskripsi Singkat / Keunikan Cita Rasa
                        </label>
                        <textarea name="deskripsi" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"><?= old('deskripsi', $item['deskripsi']) ?></textarea>
                    </div>

                    <!-- Bahan-bahan -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Bahan-Bahan Utama & Bumbu Rempah
                        </label>
                        <textarea name="bahan" rows="4" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all font-mono text-xs"><?= old('bahan', $item['bahan']) ?></textarea>
                    </div>

                    <!-- Cara Membuat -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Langkah & Cara Memasak
                        </label>
                        <textarea name="cara_membuat" rows="4" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all font-mono text-xs"><?= old('cara_membuat', $item['cara_membuat']) ?></textarea>
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            <!-- Section 3: Gambar -->
            <div>
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-slate-400"></span> Foto / Gambar Sajian
                </h3>
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <div class="w-24 h-24 rounded-2xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center text-slate-400 overflow-hidden flex-shrink-0" id="previewContainer">
                        <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])): ?>
                            <img src="<?= base_url('uploads/pindang/' . esc($item['gambar'])) ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <i class="fa-solid fa-camera text-2xl"></i>
                        <?php endif; ?>
                    </div>
                    <div class="flex-grow w-full">
                        <input type="file" name="gambar" id="gambarInput" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-800 hover:file:bg-primary-100 transition-all cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="pt-4 flex items-center justify-end gap-3">
                <a href="<?= base_url('pindang-patin') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-primary-800 to-primary-700 hover:from-primary-900 hover:to-primary-800 text-white font-bold text-xs rounded-xl shadow-md shadow-primary-900/20 hover:shadow-lg transition-all active:scale-95 flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk text-secondary-300"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('gambarInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                document.getElementById('previewContainer').innerHTML = '<img src="' + evt.target.result + '" class="w-full h-full object-cover">';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<?= $this->endSection() ?>
