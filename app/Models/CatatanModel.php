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
        $builder->where('user_id', $userId);
        $result = $builder->get()->getResultArray();

        return $result;
    }

    public function getAlCatatanForVerificator()
    {
        $builder = $this->db->table('catatan');
        $builder->select('catatan.id as catatanId, user_id, waktu_catatan, catatan.status as status_catatan, name, photo');
        $builder->join('users', 'users.id = catatan.user_id');
        $result = $builder->get()->getResultArray();

        return $result;
    }
}
