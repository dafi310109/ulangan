<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-5">
    <!-- Back Navigation -->
    <a href="<?= base_url('pindang-patin') ?>" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-primary-800 transition-colors">
        <i class="fa-solid fa-arrow-left text-[11px]"></i>
        <span>Kembali ke Katalog Pindang</span>
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.04)] overflow-hidden">
        <!-- Clean Header -->
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h1 class="text-lg font-bold text-slate-900">Tambah Varian Pindang Patin</h1>
                <p class="text-xs text-slate-500 mt-0.5">Lengkapi formulir untuk menambahkan menu kuliner baru.</p>
            </div>
            <span class="w-8 h-8 rounded-lg bg-primary-50 text-primary-800 flex items-center justify-center text-sm font-bold">
                <i class="fa-solid fa-plus"></i>
            </span>
        </div>

        <!-- Form Body -->
        <form action="<?= base_url('pindang-patin/store') ?>" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            <?= csrf_field() ?>

            <!-- Informasi Utama -->
            <div>
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Informasi Menu</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Nama Masakan / Varian <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="nama" value="<?= old('nama') ?>" placeholder="Contoh: Pindang Patin Tempoyak Palembang" required class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Kategori Masakan <span class="text-rose-500">*</span>
                        </label>
                        <select name="kategori" required class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                            <option value="Tradisional" <?= old('kategori') === 'Tradisional' ? 'selected' : '' ?>>Tradisional</option>
                            <option value="Tempoyak" <?= old('kategori') === 'Tempoyak' ? 'selected' : '' ?>>Tempoyak</option>
                            <option value="Kuah Bening" <?= old('kategori') === 'Kuah Bening' ? 'selected' : '' ?>>Kuah Bening</option>
                            <option value="Kuah Pedas" <?= old('kategori') === 'Kuah Pedas' ? 'selected' : '' ?>>Kuah Pedas</option>
                            <option value="Spesial" <?= old('kategori') === 'Spesial' ? 'selected' : '' ?>>Spesial</option>
                        </select>
                    </div>

                    <!-- Asal Daerah -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Asal Daerah / Kota <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="asal_daerah" value="<?= old('asal_daerah', 'Sumatera Selatan') ?>" placeholder="Contoh: Palembang, Ogan Ilir" required class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            Estimasi Harga (Rp) <span class="text-rose-500">*</span>
                        </label>
                        <input type="number" name="harga" value="<?= old('harga', 35000) ?>" min="0" step="1000" required class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                    </div>

                    <!-- Tingkat Pedas -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tingkat Kepedasan</label>
                        <select name="tingkat_pedas" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                            <option value="Sedang" <?= old('tingkat_pedas') === 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                            <option value="Pedas" <?= old('tingkat_pedas') === 'Pedas' ? 'selected' : '' ?>>Pedas</option>
                            <option value="Sangat Pedas" <?= old('tingkat_pedas') === 'Sangat Pedas' ? 'selected' : '' ?>>Sangat Pedas</option>
                        </select>
                    </div>

                    <!-- Porsi -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Porsi</label>
                        <input type="text" name="porsi" value="<?= old('porsi', '2-3 Porsi') ?>" placeholder="Contoh: 2-3 Porsi" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                    </div>

                    <!-- Waktu Masak -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Estimasi Waktu Memasak</label>
                        <input type="text" name="estimasi_waktu" value="<?= old('estimasi_waktu', '40 Menit') ?>" placeholder="Contoh: 40 Menit" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Status Ketersediaan</label>
                        <select name="status" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all">
                            <option value="Tersedia" <?= old('status') === 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                            <option value="Habis" <?= old('status') === 'Habis' ? 'selected' : '' ?>>Habis</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Resep & Cara Membuat -->
            <div class="pt-4 border-t border-slate-100">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Resep & Cara Memasak</h3>
                <div class="space-y-3.5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi Singkat Cita Rasa</label>
                        <textarea name="deskripsi" rows="2" placeholder="Ceritakan singkat cita rasa khas varian ini..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all"><?= old('deskripsi') ?></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Bahan-Bahan Utama & Rempah (Tiap baris 1 bahan)</label>
                        <textarea name="bahan" rows="3" placeholder="Contoh: 1 ekor ikan patin segar, 5 siung bawang merah..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all font-mono text-xs"><?= old('bahan') ?></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Langkah / Cara Memasak</label>
                        <textarea name="cara_membuat" rows="3" placeholder="Contoh: 1. Didihkan air bumbu halus... 2. Masukkan ikan patin..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-700 focus:border-primary-700 transition-all font-mono text-xs"><?= old('cara_membuat') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Foto -->
            <div class="pt-4 border-t border-slate-100">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Foto Sajian</h3>
                <div class="flex items-center gap-3">
                    <div class="w-16 h-16 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400 overflow-hidden flex-shrink-0" id="previewContainer">
                        <i class="fa-solid fa-camera text-base"></i>
                    </div>
                    <div class="flex-grow">
                        <input type="file" name="gambar" id="gambarInput" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, atau WebP (Maks 4MB).</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-2.5">
                <a href="<?= base_url('pindang-patin') ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2 bg-primary-800 hover:bg-primary-900 text-white font-semibold text-xs rounded-xl shadow-sm transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-check text-[11px]"></i>
                    <span>Simpan Menu</span>
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
