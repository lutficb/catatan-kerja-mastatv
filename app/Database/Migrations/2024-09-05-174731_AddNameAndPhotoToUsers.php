<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\Forge;

class AddNameAndPhotoToUsers extends Migration
{
    /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }

    public function up()
    {
        $fields = [
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'photo' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
    }

    public function down()
    {
        $fields = [
            'name',
            'photo',
        ];
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}
