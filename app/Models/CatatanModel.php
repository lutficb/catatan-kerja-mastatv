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
    protected $allowedFields    = ['id', 'user_id', 'waktu_catatan', 'deskripsi_catatan', 'deskripsi_permasalahan', 'deskripsi_solusi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllCatatan($userId)
    {
        $builder = $this->db->table('catatan');
        $builder->getWhere(['user_id' => $userId]);
        $result = $builder->get()->getResultArray();

        return $result;
    }
}
