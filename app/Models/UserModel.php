<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'name',
            'photo'
        ];
    }

    public function getAllUser()
    {
        $builder = new ShieldUserModel();
        $builder->select('users.id as userId, name, group, active');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $result = $builder->get()->getResultArray();

        return $result;
    }

    public function getAllJobdes()
    {
        $builder = $this->db->table('jobdes');
        $result = $builder->get()->getResultArray();

        return $result;
    }
}
