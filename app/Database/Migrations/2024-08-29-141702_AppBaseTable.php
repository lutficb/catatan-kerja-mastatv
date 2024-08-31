<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AppBaseTable extends Migration
{
    public function up()
    {
        // Table Catatan Kerja
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'waktu_catatan' => ['type' => 'datetime'],
            'deskripsi' => ['type ' => 'varchar', 'constraint' => 65535],
            'permasalahan' => ['type ' => 'varchar', 'constratint' => 65535],
            'solusi' => ['type' => 'varchar', 'constratint' => 65535],
            'created_at' => ['type' => 'datetime'],
            'updated_at' => ['type' => 'datetime'],
            'deleted_at' => ['type' => 'datetime'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('catatan');

        // Table Detail User
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'job_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'nama' => ['type' => 'varchar', 'constraint' => 255],
            'tempat_lahir' => ['type' => 'varchar', 'constraint' => 255],
            'tanggal_lahir' => ['type' => 'datetime'],
            'alamat' => ['type' => 'varchar', 'constraint' => 255],
            'no_hp' => ['type' => 'int', 'constraint' => 20],
            'email' => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime'],
            'updated_at' => ['type' => 'datetime'],
            'deleted_at' => ['type' => 'datetime'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('job_id', 'jobdes', 'id', '', 'CASCADE');
        $this->forge->createTable('user_detail');

        // Table Jobdes
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'jobdes' => ['type' => 'varchar', 'constraint' => 255],
            'deskripsi' => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime'],
            'updated_at' => ['type' => 'datetime'],
            'deleted_at' => ['type' => 'datetime'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('jobdes');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('catatan');
        $this->forge->dropTable('user_detail');
        $this->forge->dropTable('jobdes');

        $this->db->enableForeignKeyChecks();
    }
}
