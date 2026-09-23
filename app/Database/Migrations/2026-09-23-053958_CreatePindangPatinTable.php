<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePindangPatinTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Tradisional',
            ],
            'asal_daerah' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Sumatera Selatan',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bahan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'cara_membuat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tingkat_pedas' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Sedang',
            ],
            'porsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '2-3 Porsi',
            ],
            'estimasi_waktu' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '45 Menit',
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 35000,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Tersedia',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pindang_patin');
    }

    public function down()
    {
        $this->forge->dropTable('pindang_patin', true);
    }
}
