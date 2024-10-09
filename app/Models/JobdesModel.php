<?php

namespace App\Models;

use CodeIgniter\Model;

class JobdesModel extends Model
{
    protected $table            = 'jobdes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'name', 'deskripsi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getUserJobdes($id)
    {
        $builder = $this->db->table('users');
        $builder->select('users.id as userId, users.name as userName, jobdes.id as jobdesId, jobdes.name as jobdes');
        $builder->join('users_jobdes', 'users_jobdes.user_id = users.id');
        $builder->join('jobdes', 'jobdes.id = users_jobdes.job_id');
        $builder->where('users.id', $id);
        $result = $builder->get()->getRowArray();

        return $result;
    }

    public function getFromUserJobdes($id)
    {
        $builder = $this->db->table('users_jobdes');
        $builder->where('user_id', $id);
        $result = $builder->get()->getRowArray();

        return $result;
    }

    public function addJobdesToUser($dataToInsert)
    {
        $builder = $this->db->table('users_jobdes');
        $builder->insert($dataToInsert);
        $result = $this->db->affectedRows();

        return $result;
    }

    public function updateUserJobdes($userId, $data)
    {
        $builder = $this->db->table('users_jobdes');
        $builder->set('job_id', $data);
        $builder->where('user_id', $userId);
        $builder->update();
        $result = $this->db->affectedRows();

        return $result;
    }
}
