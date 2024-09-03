<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Catatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'waktu_catatan' => [
                'type'              => 'datetime',
            ],
            'deskripsi_catatan' => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'deskripsi_permasalahan' => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'deskripsi_solusi' => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('catatan');
    }

    public function down()
    {
        $this->forge->dropTable('catatan');
    }
}
