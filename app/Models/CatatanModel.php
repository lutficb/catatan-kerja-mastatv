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
