<?= $this->extend('pindang_patin/layout') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-6">
    <!-- Back Navigation -->
    <a href="<?= base_url('pindang-patin') ?>" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-primary-800 transition-colors">
        <i class="fa-solid fa-arrow-left text-[11px]"></i>
        <span>Kembali ke Katalog Pindang</span>
    </a>

    <!-- Form Presentation Card -->
    <div class="bg-white rounded-3xl border border-warm-200/90 shadow-card overflow-hidden">
        <!-- Header -->
        <div class="p-6 sm:p-8 border-b border-warm-200 bg-gradient-to-r from-warm-50 to-white flex items-center justify-between">
            <div>
                <span class="text-[10px] font-bold uppercase tracking-wider text-primary-800 mb-1 block">Formulir Menu</span>
                <h1 class="font-serif text-2xl font-bold text-slate-900">Tambah Varian Pindang Patin</h1>
                <p class="text-xs text-slate-500 mt-1">Lengkapi data resep, harga, dan informasi sajian khas Sumatera Selatan.</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-primary-50 text-primary-800 flex items-center justify-center text-xl shadow-sm">
                <i class="fa-solid fa-bowl-food"></i>
            </div>
        </div>

        <!-- Form Body -->
        <form action="<?= base_url('pindang-patin/store') ?>" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            <?= csrf_field() ?>

            <!-- Bagian 1: Data Pokok -->
            <div>
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-primary-800"></span> Informasi Utama Masakan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                    <!-- Nama Menu -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Nama Masakan / Varian <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="nama" value="<?= old('nama') ?>" placeholder="Contoh: Pindang Patin Tempoyak Palembang" required class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Kategori Masakan <span class="text-rose-500">*</span>
                        </label>
                        <select name="kategori" required class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium text-slate-700">
                            <option value="Tradisional" <?= old('kategori') === 'Tradisional' ? 'selected' : '' ?>>Tradisional</option>
                            <option value="Tempoyak" <?= old('kategori') === 'Tempoyak' ? 'selected' : '' ?>>Tempoyak</option>
                            <option value="Kuah Bening" <?= old('kategori') === 'Kuah Bening' ? 'selected' : '' ?>>Kuah Bening</option>
                            <option value="Kuah Pedas" <?= old('kategori') === 'Kuah Pedas' ? 'selected' : '' ?>>Kuah Pedas</option>
                            <option value="Spesial" <?= old('kategori') === 'Spesial' ? 'selected' : '' ?>>Spesial</option>
                        </select>
                    </div>

                    <!-- Asal Daerah -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Asal Daerah / Kota <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="asal_daerah" value="<?= old('asal_daerah', 'Sumatera Selatan') ?>" placeholder="Contoh: Palembang, Ogan Ilir" required class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium">
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Estimasi Harga (Rp) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-xs font-bold text-slate-400">Rp</span>
                            <input type="number" name="harga" value="<?= old('harga', 35000) ?>" min="0" step="1000" required class="w-full pl-10 pr-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-bold text-slate-800">
                        </div>
                    </div>

                    <!-- Tingkat Pedas -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Tingkat Kepedasan</label>
                        <select name="tingkat_pedas" class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium text-slate-700">
                            <option value="Sedang" <?= old('tingkat_pedas') === 'Sedang' ? 'selected' : '' ?>>Sedang (Gurih Asam Segar)</option>
                            <option value="Pedas" <?= old('tingkat_pedas') === 'Pedas' ? 'selected' : '' ?>>Pedas (Rempah Cabai Keriting)</option>
                            <option value="Sangat Pedas" <?= old('tingkat_pedas') === 'Sangat Pedas' ? 'selected' : '' ?>>Sangat Pedas (Rawit Melimpah)</option>
                        </select>
                    </div>

                    <!-- Porsi -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Takaran Porsi</label>
                        <input type="text" name="porsi" value="<?= old('porsi', '2-3 Porsi') ?>" placeholder="Contoh: 2-3 Porsi" class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium">
                    </div>

                    <!-- Waktu Masak -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Estimasi Waktu Memasak</label>
                        <input type="text" name="estimasi_waktu" value="<?= old('estimasi_waktu', '40 Menit') ?>" placeholder="Contoh: 40 Menit" class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Status Ketersediaan</label>
                        <select name="status" class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-medium text-slate-700">
                            <option value="Tersedia" <?= old('status') === 'Tersedia' ? 'selected' : '' ?>>Tersedia (Ready Siap Saji)</option>
                            <option value="Habis" <?= old('status') === 'Habis' ? 'selected' : '' ?>>Habis</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Bagian 2: Resep & Cara Membuat -->
            <div class="pt-5 border-t border-warm-200">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary-600"></span> Resep & Petunjuk Memasak
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Deskripsi Singkat Cita Rasa</label>
                        <textarea name="deskripsi" rows="2" placeholder="Ceritakan profil cita rasa khas hidangan ini..." class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all leading-relaxed font-medium"><?= old('deskripsi') ?></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Bahan-Bahan Utama & Bumbu Rempah (1 baris tiap bahan)</label>
                        <textarea name="bahan" rows="3" placeholder="Contoh: 1 ekor ikan patin segar&#10;5 siung bawang merah&#10;1/2 buah nanas madu manis..." class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-mono leading-relaxed"><?= old('bahan') ?></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Langkah & Cara Memasak</label>
                        <textarea name="cara_membuat" rows="3" placeholder="Contoh: 1. Didihkan air kaldu bumbu halus...&#10;2. Masukkan potongan ikan patin dan nanas..." class="w-full px-4 py-2.5 bg-warm-50/60 border border-warm-200 rounded-xl text-xs focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-700/20 focus:border-primary-700 transition-all font-mono leading-relaxed"><?= old('cara_membuat') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Bagian 3: Foto Sajian -->
            <div class="pt-5 border-t border-warm-200">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-slate-400"></span> Foto Kuliner Masakan
                </h3>
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 rounded-2xl bg-warm-100 border border-warm-200 flex items-center justify-center text-slate-400 overflow-hidden flex-shrink-0 shadow-inner" id="previewContainer">
                        <i class="fa-solid fa-camera text-xl"></i>
                    </div>
                    <div class="flex-grow">
                        <input type="file" name="gambar" id="gambarInput" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-800 hover:file:bg-primary-100 transition-all cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1.5">Mendukung format JPG, PNG, atau WebP (Maksimal 4MB).</p>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="pt-6 border-t border-warm-200 flex items-center justify-end gap-3">
                <a href="<?= base_url('pindang-patin') ?>" class="px-5 py-2.5 bg-warm-100 hover:bg-warm-200 text-slate-700 font-bold text-xs rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-primary-800 to-primary-700 hover:from-primary-900 hover:to-primary-800 text-white font-bold text-xs rounded-xl shadow-md shadow-primary-900/20 hover:shadow-lg transition-all active:scale-95 flex items-center gap-2">
                    <i class="fa-solid fa-check text-secondary-300"></i>
                    <span>Simpan Menu Pindang</span>
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
