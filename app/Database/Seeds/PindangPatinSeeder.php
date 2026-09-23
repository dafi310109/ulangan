<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PindangPatinSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'           => 'Pindang Patin Pegagan Asam Pedas',
                'kategori'       => 'Tradisional',
                'asal_daerah'    => 'Ogan Ilir, Sumatera Selatan',
                'deskripsi'      => 'Kuliner khas suku Pegagan dengan kuah merah segar asam pedas tanpa terasi, menggunakan irisan nanas madu dan daun kemangi wangi.',
                'bahan'          => "1 ekor ikan patin segar (700g)\n1/2 buah nanas madu manis potong kipas\n1 ikat daun kemangi segar\n2 batang serai memarkan\n2 lembar daun salam\nAir asam jawa secukupnya\nBumbu Halus: 8 cabai merah keriting, 5 cabai rawit, 6 bawang merah, 3 siung bawang putih, 2 cm kunyit bakar, garam & gula merah secukupnya.",
                'cara_membuat'   => "1. Bersihkan ikan patin, potong menjadi 4-5 bagian lalu lumuri perasan jeruk nipis dan bilas bersih.\n2. Didihkan 1 liter air di panci, masukkan bumbu halus, serai geprek, dan daun salam hingga mendidih wangi.\n3. Masukkan potongan ikan patin, potongan nanas, air asam jawa, garam, dan gula.\n4. Masak menggunakan api sedang hingga ikan matang dan bumbu meresap.\n5. Masukkan daun kemangi sesaat sebelum api dimatikan, sajikan hangat.",
                'tingkat_pedas'  => 'Pedas',
                'porsi'          => '3-4 Porsi',
                'estimasi_waktu' => '40 Menit',
                'harga'          => 45000,
                'status'         => 'Tersedia',
                'gambar'         => 'pindang_patin_pegagan.png',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nama'           => 'Pindang Patin Tempoyak Khas Palembang',
                'kategori'       => 'Tempoyak',
                'asal_daerah'    => 'Palembang, Sumatera Selatan',
                'deskripsi'      => 'Pindang patin istimewa dengan bumbu fermentasi durian (tempoyak) asli Sumatera Selatan yang menghasilkan kuah kental, gurih, legit, dan pedas mantap.',
                'bahan'          => "1 ekor ikan patin segar\n3 sdm penuh tempoyak durian fermentasi\n10 buah cabai rawit merah (ulek kasar)\n6 siung bawang merah\n2 cm kunyit hidup\n1 batang serai\n1 ikat daun kemangi\nGula pasir dan garam secukupnya.",
                'cara_membuat'   => "1. Haluskan bawang merah, cabai rawit, dan kunyit.\n2. Rebus air, masukkan bumbu halus dan tempoyak durian, aduk rata hingga larut dan mendidih.\n3. Masukkan serai dan potongan ikan patin.\n4. Bumbui dengan garam dan gula hingga rasa asam-gurih-manis seimbang.\n5. Masak hingga kuah mengental dan harum tempoyak merebak, angkat dan sajikan.",
                'tingkat_pedas'  => 'Sangat Pedas',
                'porsi'          => '2-3 Porsi',
                'estimasi_waktu' => '45 Menit',
                'harga'          => 50000,
                'status'         => 'Tersedia',
                'gambar'         => 'pindang_patin_tempoyak.png',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nama'           => 'Pindang Patin Meranjat Kuah Bening',
                'kategori'       => 'Kuah Bening',
                'asal_daerah'    => 'Meranjat, Sumatera Selatan',
                'deskripsi'      => 'Varian pindang dari daerah Meranjat dengan kuah bening segar beraroma rempah asam segar alami buah belimbing wuluh dan buah rimbang.',
                'bahan'          => "1 ekor ikan patin (potong sedang)\n5 buah belimbing wuluh (belah dua)\n10 butir buah rimbang/terung pipit\n5 siung bawang merah iris tipis\n2 siung bawang putih iris tipis\n5 buah cabai merah iris serong\n2 cm lengkuas geprek\n1 sdt kecap manis\nGaram dan kaldu secukupnya.",
                'cara_membuat'   => "1. Rebus air bersama irisan bawang merah, bawang putih, lengkuas, dan cabai iris hingga mendidih harum.\n2. Masukkan ikan patin dan buah belimbing wuluh.\n3. Tambahkan sedikit kecap manis untuk memberi warna keemasan dan kedalaman rasa.\n4. Masukkan rimbang dan masak hingga ikan lembut.\n5. Angkat dan sajikan selagi panas.",
                'tingkat_pedas'  => 'Sedang',
                'porsi'          => '3 Porsi',
                'estimasi_waktu' => '35 Menit',
                'harga'          => 42000,
                'status'         => 'Tersedia',
                'gambar'         => 'pindang_patin_meranjat.png',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nama'           => 'Pindang Patin Nanas Rempah Kuning',
                'kategori'       => 'Spesial',
                'asal_daerah'    => 'Sumatera Selatan',
                'deskripsi'      => 'Perpaduan ikan patin berlemak gurih dengan keasaman segar buah nanas matang dalam kuah kaldu rempah kuning kaya khasiat.',
                'bahan'          => "1 ekor ikan patin segar (600g)\n1/2 buah nanas matang potong segitiga\n5 siung bawang merah\n3 siung bawang putih\n3 cm kunyit bakar\n2 batang serai\n3 lembar daun jeruk purut\n1 ikat daun kemangi segar\nGaram dan gula secukupnya.",
                'cara_membuat'   => "1. Haluskan bumbu kuning (kunyit, bawang merah, bawang putih).\n2. Masukkan bumbu ke dalam air mendidih bersama serai dan daun jeruk.\n3. Masukkan potongan ikan patin dan nanas.\n4. Beri garam, sedikit gula, lalu masak hingga mendidih sempurna.\n5. Taburi kemangi segar dan sajikan bersama nasi hangat.",
                'tingkat_pedas'  => 'Sedang',
                'porsi'          => '2-3 Porsi',
                'estimasi_waktu' => '30 Menit',
                'harga'          => 38000,
                'status'         => 'Tersedia',
                'gambar'         => 'pindang_patin_nanas.png',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nama'           => 'Pindang Patin Kuah Rawit Merah Super Pedas',
                'kategori'       => 'Kuah Pedas',
                'asal_daerah'    => 'Musi Banyuasin, Sumatera Selatan',
                'deskripsi'      => 'Varian pindang patin bagi pecinta sensasi pedas menyengat dengan taburan cabai rawit burung utuh dan bumbu rempah merah merona.',
                'bahan'          => "1 ekor ikan patin segar\n20 buah cabai rawit merah utuh\n10 cabai merah giling\n7 bawang merah\n3 siung bawang putih\n2 batang serai memarkan\n2 keping asam kandis\nDaun kemangi melimpah\nGaram dan kaldu bubuk.",
                'cara_membuat'   => "1. Tumis sejenak cabai giling dan bumbu halus hingga wangi lalu tuang air kaldu.\n2. Masukkan serai, asam kandis, dan seluruh cabai rawit merah utuh.\n3. Masukkan potongan ikan patin, masak dengan api sedang hingga kuah meresap ke serat daging patin.\n4. Tambahkan kemangi sebelum diangkat.\n5. Nikmati kuah pedas asam yang segar berkeringat.",
                'tingkat_pedas'  => 'Sangat Pedas',
                'porsi'          => '3-4 Porsi',
                'estimasi_waktu' => '40 Menit',
                'harga'          => 48000,
                'status'         => 'Tersedia',
                'gambar'         => 'pindang_patin_pedas.png',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nama'           => 'Pindang Kepala Patin Sungai Musi',
                'kategori'       => 'Spesial',
                'asal_daerah'    => 'Palembang, Sumatera Selatan',
                'deskripsi'      => 'Bagian kepala patin sungai berukuran besar dengan tekstur lembut kenyal berlemak khas Sungai Musi, disajikan dalam kuah pindang racikan istimewa.',
                'bahan'          => "2 kepala ikan patin sungai segar belah dua\n1 buah nanas madu iris tebal\n8 buah cabai merah\n6 butir bawang merah\n1 batang serai\n1 ruas terasi bakar Palembang\n2 lembar daun salam\nDaun kemangi dan tomat ceri\nGaram, gula aren secukupnya.",
                'cara_membuat'   => "1. Cuci bersih kepala ikan patin, lumuri jeruk nipis selama 10 menit.\n2. Masak air dengan bumbu halus dan terasi bakar hingga mendidih harum.\n3. Masukkan kepala ikan patin, tutup panci dan masak dengan api kecil agar lemak kepala ikan menyatu gurih dengan kuah.\n4. Masukkan potongan nanas, tomat ceri, dan kemangi.\n5. Sajikan di mangkuk besar khas hidangan pesta Palembang.",
                'tingkat_pedas'  => 'Pedas',
                'porsi'          => '2 Porsi',
                'estimasi_waktu' => '50 Menit',
                'harga'          => 55000,
                'status'         => 'Tersedia',
                'gambar'         => 'pindang_patin_kepala.png',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('pindang_patin')->insertBatch($data);
    }
}
