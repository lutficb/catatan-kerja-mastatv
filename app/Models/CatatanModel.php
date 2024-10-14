<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanModel extends Model
{
    protected $table            = 'catatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_id', 'waktu_catatan', 'deskripsi_catatan', 'deskripsi_permasalahan', 'deskripsi_solusi', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllCatatan($userId)
    {
        $builder = $this->db->table('catatan');
        $builder->where('user_id', $userId);
        $result = $builder->get()->getResultArray();

        return $result;
    }

    public function getUserJobdes($userId)
    {
        $builder = $this->db->table('users');
        $builder->select('users.id as userid, users.name as username, jobdes.id as jobdesid, jobdes.name as jobname');
        $builder->join('users_jobdes', 'users_jobdes.user_id = users.id');
        $builder->join('jobdes', 'jobdes.id = users_jobdes.job_id');
        $builder->where('users.id', $userId);
        $result = $builder->get()->getRowArray();

        return $result;
    }

    public function getTotalCatatan($userId, $status = null)
    {
        $builder = $this->db->table('catatan');
        $builder->select('COUNT(*) as total');
        $builder->where('user_id', $userId);
        if ($status) {
            $builder->where('status', $status);
        }
        $result = $builder->get()->getRowArray();

        return $result;
    }

    public function getAllCatatanForVerificator($id = null)
    {
        $builder = $this->db->table('catatan');
        $builder->select('catatan.id as catatanId
        , waktu_catatan, deskripsi_catatan, deskripsi_permasalahan, deskripsi_solusi, catatan.status as status_catatan, users.name as userName, photo, jobdes.name as jobdes');
        $builder->join('users', 'users.id = catatan.user_id');
        $builder->join('users_jobdes', 'users_jobdes.user_id = users.id');
        $builder->join('jobdes', 'jobdes.id = users_jobdes.job_id');

        if (!$id) {
            $result = $builder->get()->getResultArray();
        } else {
            $builder->where('catatan.id', $id);
            $result = $builder->get()->getRowArray();
        }

        return $result;
    }
}
