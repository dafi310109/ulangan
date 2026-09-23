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
            Form Tambah Data Pindang Patin
        </div>
    </div>

    <!-- Main Card Form -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-200/80 overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-primary-950 via-primary-900 to-primary-800 text-white p-6 sm:p-8 relative">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-secondary-500/20 border border-secondary-400/30 text-secondary-400 flex items-center justify-center text-2xl shadow-inner">
                    <i class="fa-solid fa-bowl-food"></i>
                </div>
                <div>
                    <h1 class="font-serif text-2xl sm:text-3xl font-bold text-white">Tambah Varian Pindang Patin</h1>
                    <p class="text-xs sm:text-sm text-slate-300 mt-1">Lengkapi rincian resep, bumbu rempah, dan informasi sajian khas Sumatera Selatan.</p>
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <form action="<?= base_url('pindang-patin/store') ?>" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
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
                        <input type="text" name="nama" value="<?= old('nama') ?>" placeholder="Contoh: Pindang Patin Tempoyak Palembang" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Kategori Masakan <span class="text-rose-500">*</span>
                        </label>
                        <select name="kategori" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <option value="Tradisional" <?= old('kategori') === 'Tradisional' ? 'selected' : '' ?>>Tradisional</option>
                            <option value="Tempoyak" <?= old('kategori') === 'Tempoyak' ? 'selected' : '' ?>>Tempoyak</option>
                            <option value="Kuah Bening" <?= old('kategori') === 'Kuah Bening' ? 'selected' : '' ?>>Kuah Bening</option>
                            <option value="Kuah Pedas" <?= old('kategori') === 'Kuah Pedas' ? 'selected' : '' ?>>Kuah Pedas</option>
                            <option value="Spesial" <?= old('kategori') === 'Spesial' ? 'selected' : '' ?>>Spesial</option>
                        </select>
                    </div>

                    <!-- Asal Daerah -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Asal Daerah / Kota <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="asal_daerah" value="<?= old('asal_daerah', 'Sumatera Selatan') ?>" placeholder="Contoh: Palembang, Ogan Ilir, Musi Banyuasin" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Estimasi Harga (Rp) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-xs font-bold text-slate-400">Rp</span>
                            <input type="number" name="harga" value="<?= old('harga', 35000) ?>" min="0" step="1000" required class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Tingkat Pedas -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Tingkat Kepedasan
                        </label>
                        <select name="tingkat_pedas" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <option value="Sedang" <?= old('tingkat_pedas') === 'Sedang' ? 'selected' : '' ?>>Sedang (Rasa Asam Gurih Seimbang)</option>
                            <option value="Pedas" <?= old('tingkat_pedas') === 'Pedas' ? 'selected' : '' ?>>Pedas (Rempah Cabai Keriting)</option>
                            <option value="Sangat Pedas" <?= old('tingkat_pedas') === 'Sangat Pedas' ? 'selected' : '' ?>>Sangat Pedas (Limpahan Rawit)</option>
                        </select>
                    </div>

                    <!-- Porsi -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Takaran Porsi
                        </label>
                        <input type="text" name="porsi" value="<?= old('porsi', '2-3 Porsi') ?>" placeholder="Contoh: 2-3 Porsi" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Estimasi Waktu Masak -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Estimasi Waktu Memasak
                        </label>
                        <input type="text" name="estimasi_waktu" value="<?= old('estimasi_waktu', '40 Menit') ?>" placeholder="Contoh: 40 Menit" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Status Ketersediaan
                        </label>
                        <select name="status" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <option value="Tersedia" <?= old('status') === 'Tersedia' ? 'selected' : '' ?>>Tersedia (Ready Siap Saji)</option>
                            <option value="Habis" <?= old('status') === 'Habis' ? 'selected' : '' ?>>Habis</option>
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
                        <textarea name="deskripsi" rows="3" placeholder="Tuliskan cerita singkat atau profil kelezatan varian ini..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"><?= old('deskripsi') ?></textarea>
                    </div>

                    <!-- Bahan-bahan -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Bahan-Bahan Utama & Bumbu Rempah
                        </label>
                        <textarea name="bahan" rows="4" placeholder="Contoh: 1 ekor ikan patin, 5 siung bawang merah, serai geprek, asam jawa, nanas..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all font-mono text-xs"><?= old('bahan') ?></textarea>
                    </div>

                    <!-- Cara Membuat -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Langkah & Cara Memasak
                        </label>
                        <textarea name="cara_membuat" rows="4" placeholder="Contoh: 1. Didihkan air bumbu halus... 2. Masukkan ikan patin dan nanas..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all font-mono text-xs"><?= old('cara_membuat') ?></textarea>
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
                        <i class="fa-solid fa-camera text-2xl"></i>
                    </div>
                    <div class="flex-grow w-full">
                        <input type="file" name="gambar" id="gambarInput" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-800 hover:file:bg-primary-100 transition-all cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Mendukung format JPG, PNG, atau WebP (Maksimal 4MB). Gambar juga dapat dihasilkan otomatis melalui AI pada tahap berikutnya.</p>
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
