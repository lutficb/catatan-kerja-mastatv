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
    }

    public function down()
    {
        //
    }
}
