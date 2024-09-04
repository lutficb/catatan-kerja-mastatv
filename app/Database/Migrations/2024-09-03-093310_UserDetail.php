<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDetail extends Migration
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
            'nama' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'tempat_lahir' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'tanggal_lahir' => [
                'type'              => 'DATETIME'
            ],
            'alamat' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'no_hp' => [
                'type'              => 'VARCHAR',
                'constraint'        => 20,
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'deleted_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('user_detail');
    }

    public function down()
    {
        $this->forge->dropTable('user_detail');
    }
}
