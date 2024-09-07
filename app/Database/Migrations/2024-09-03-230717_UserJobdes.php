<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserJobdes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true
            ],
            'job_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true
            ],
        ]);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('job_id', 'jobdes', 'id', '', 'CASCADE');
        $this->forge->createTable('users_jobdes');
    }

    public function down()
    {
        $this->forge->dropForeignKey('users_jobdes', 'users_jobdes_user_id_foreign');
        $this->forge->dropForeignKey('users_jobdes', 'users_jobdes_job_id_foreign');
        $this->forge->dropTable('users_jobdes');
    }
}
