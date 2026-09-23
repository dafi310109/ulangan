# 🐟 Aplikasi Katalog & Manajemen Kuliner: Pindang Patin (Sumatera Selatan)

Aplikasi web modern berbasis **CodeIgniter 4** dan **Tailwind CSS** untuk katalog, manajemen (CRUD), eksplorasi resep autentik, dan visualisasi hidangan khas **Pindang Patin** dari **Sumatera Selatan**.

---

## 📌 Identitas Peserta Ujian

| Data | Keterangan |
| :--- | :--- |
| **Nomor Urut** | `07` |
| **Nama Siswa** | **Dafi Al Fajar** |
| **Provinsi / Daerah** | **Sumatera Selatan** |
| **Makanan Khas** | **Pindang Patin** |
| **Warna Utama (Primer)** | `#9F1239` (Burgundy / Marun Khas Kain Songket) |
| **Warna Aksen (Sekunder)** | `#D4AF37` (Metallic Gold / Emas Elegan Sriwijaya) |
| **Fitur Khusus Ditugaskan** | **Pencarian (Search)** & **Filter (Kategori & Pedas)** |

---

## ✨ Fitur-Fitur Utama

### 1. CRUD Lengkap (Create, Read, Update, Delete)
- **Create**: Formulir penambahan menu varian Pindang Patin dengan validasi data dan upload gambar.
- **Read**: Menampilkan seluruh katalog menu baik dalam format Kartu Visual AI maupun Tabel Data Terstruktur.
- **Update**: Pembaruan informasi resep, bumbu rempah, harga, takaran porsi, dan ketersediaan stok.
- **Delete**: Penghapusan data dengan modal konfirmasi keamanan dan pembersihan otomatis file gambar fisik.

### 2. Halaman Detail & Resep Interaktif
- **Hero Image Showcase**: Menampilkan foto kuliner AI beresolusi tinggi dengan badge kategori dan daerah.
- **Checklist Bahan Interaktif**: Daftar bahan dan bumbu rempah yang dapat dicentang saat persiapan memasak.
- **Petunjuk Memasak Step-by-Step**: Langkah memasak bernomor yang jelas dan terstruktur.
- **Tips Tradisional**: Tips mengolah ikan patin agar bebas aroma lumpur dan tekstur daging tetap lembut kenyal.
- **Fitur Cetak Resep**: Tombol cetak (`Print`) untuk menyimpan atau mencetak panduan resep.
- **Rekomendasi Varian Lain**: Menampilkan 3 rekomendasi menu pindang patin lainnya di bagian bawah halaman.

### 3. Fitur Pencarian (Search)
- Kolom pencarian responsif yang mencari secara cerdas pada nama masakan, bahan-bahan rempah, asal daerah, kategori, maupun deskripsi rasa.

### 4. Fitur Filter & Pengurutan (Sorting)
- **Filter Kategori**: Menyaring menu berdasarkan *Tradisional*, *Tempoyak*, *Kuah Bening*, *Kuah Pedas*, dan *Spesial*. Dilengkapi *Quick-Pills button*.
- **Filter Tingkat Kepedasan**: *Sedang*, *Pedas*, dan *Sangat Pedas*.
- **Filter Status Ketersediaan**: *Tersedia* dan *Habis*.
- **Pengurutan (Sort)**: Berdasarkan *Terbaru*, *Harga Termurah*, *Harga Termahal*, dan *Nama (A-Z)*.

### 5. Mode Tampilan Ganda (Dual View)
- **Mode Kartu Visual AI (Grid)**: Mengedepankan estetika fotografi sajian makanan dengan tombol aksi cepat.
- **Mode Tabel Data (Table)**: Tata letak data tabular yang ringkas dan padat untuk manajemen data cepat.

### 6. Aset Gambar AI Generated
- Dilengkapi foto kuliner AI beresolusi tinggi yang menggambarkan kelezatan autentik Pindang Patin berkuah asam-pedas nanas dan tempoyak khas Palembang.

---

## 🗄️ Struktur Database (`pindang_patin`)

| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | `INT(11)` | Primary Key, Auto Increment |
| `nama` | `VARCHAR(255)` | Nama varian hidangan Pindang Patin |
| `kategori` | `VARCHAR(100)` | Kategori masakan (Tradisional, Tempoyak, dll) |
| `asal_daerah` | `VARCHAR(100)` | Asal daerah (default: Sumatera Selatan) |
| `deskripsi` | `TEXT` | Deskripsi cita rasa & cerita kuliner |
| `bahan` | `TEXT` | Rincian bahan dan bumbu halus |
| `cara_membuat` | `TEXT` | Langkah-langkah pembuatan |
| `tingkat_pedas` | `VARCHAR(50)` | Sedang / Pedas / Sangat Pedas |
| `porsi` | `VARCHAR(50)` | Estimasi porsi saji (cth: 2-3 Porsi) |
| `estimasi_waktu` | `VARCHAR(50)` | Waktu memasak (cth: 40 Menit) |
| `harga` | `INT(11)` | Estimasi harga per porsi (Rupiah) |
| `status` | `VARCHAR(50)` | Tersedia / Habis |
| `gambar` | `VARCHAR(255)` | Nama file gambar sajian |
| `created_at` | `DATETIME` | Waktu data dibuat |
| `updated_at` | `DATETIME` | Waktu data diperbarui |

---

## 🚀 Panduan Instalasi & Penggunaan

### 1. Prasyarat Sistem
- **PHP**: Versi 8.1 atau lebih baru (dengan ekstensi `intl`, `mbstring`, `mysqli`)
- **Web Server**: Apache (XAMPP)
- **Database**: MySQL / MariaDB (Port 3306)

### 2. Konfigurasi Database
1. Buka XAMPP Control Panel dan pastikan layanan **Apache** dan **MySQL** aktif.
2. Buat database baru bernama `ulangan` di phpMyAdmin (`http://localhost/phpmyadmin/`).
3. Konfigurasi koneksi sudah diatur di file `.env` dan `app/Config/Database.php`:
   ```env
   database.default.hostname = localhost
   database.default.database = ulangan
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

### 3. Menjalankan Migration & Seeder
Buka terminal PowerShell pada direktori proyek (`c:\xampp\htdocs\ulangan`), jalankan:
```bash
# Menjalankan migrasi pembuatan tabel
php spark migrate

# Menjalankan seeder data autentik Pindang Patin
php spark db:seed PindangPatinSeeder
```

### 4. Mengakses Aplikasi Web
Buka peramban (browser) dan akses:
```
http://localhost/ulangan/public/
```

---

## 📋 Riwayat Tahapan Commit Proyek

Sesuai ketentuan ujian pengerjaan 4 tahap:

1. **Tahap A**: `"Setup database & migration Pindang Patin"`
   - Konfigurasi database `.env`, pembuatan migration tabel `pindang_patin`, model `PindangPatinModel`, dan seeder `PindangPatinSeeder`.
2. **Tahap B**: `"CRUD dasar + tampilan Tailwind Pindang Patin"`
   - Implementasi controller `PindangPatin`, perutean routes, form tambah & edit, tabel CRUD, dan styling Tailwind CSS dengan palet `#9F1239` & `#D4AF37`.
3. **Tahap C**: `"Halaman detail + fitur tambahan + gambar AI Pindang Patin"`
   - Halaman detail resep lengkap, fitur pencarian, filter kategori & tingkat pedas, mode tampilan ganda, dan aset visual kuliner AI Generated.
4. **Tahap D**: `"Finalisasi Pindang Patin"`
   - Penyempurnaan dokumentasi, verifikasi akhir seluruh fitur, dan sinkronisasi ke repositori GitHub.

---

© 2026 **Dafi Al Fajar** (Absen 07) — Ujian Pemrograman Web CI4 & Tailwind CSS.
