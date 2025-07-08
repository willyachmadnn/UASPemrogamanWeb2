<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerangkat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 191,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            'mac_address' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'model_router' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
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

        $this->forge->addForeignKey('category_id', 'jenis_router', 'id', 'SET NULL', 'CASCADE');

        $this->forge->createTable('perangkat');
    }

    public function down()
    {
        $this->forge->dropTable('perangkat');
    }
}