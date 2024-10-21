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

    public function getUserDetail($userid)
    {
        $builder = $this->db->table('users_detail');
        $builder->select('*')->where('user_id', $userid);
        $result = $builder->get()->getRowArray();

        return $result;
    }

    public function addUserDetail($data)
    {
        $builder = $this->db->table('users_detail');
        $builder->insert($data);

        if ($this->db->affectedRows() < 1) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    public function updateUserDetail($id, $data)
    {
        $builder = $this->db->table('users_detail');
        $builder->where('id', $id);
        $builder->update($data);

        if ($this->db->affectedRows() < 1) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
