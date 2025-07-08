<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisRouter extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'jenis_router' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true, 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_router');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_router');
    }
}