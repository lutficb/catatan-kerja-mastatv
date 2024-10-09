<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CatatanModel;


class Verificator extends BaseController
{
    protected $catatanModel;

    public function __construct()
    {
        $this->catatanModel = new CatatanModel();
    }

    public function index()
    {
        // Get data catatan from table
        $catatan = $this->catatanModel->getAllCatatanForVerificator();

        // Give color to badge in status and Change status name
        $status = [
            'badge' => [
                'unchecked' => 'badge-warning',
                'checked' => 'badge-success'
            ],
            'pekerjaan' => [
                'unchecked' => 'Belum Diperiksa',
                'checked' => 'Diperiksa'
            ],
        ];

        // prepare data for default Anggota's page
        $data = [
            'title' => 'Catatan Kerja Anggota',
            'leftsubtitle' => 'Statistik',
            'subtitle2' => 'Catatan Kerja Anggota',
            'catatan' => $catatan,
            'status' => $status,
        ];

        return view('verificator/index', $data);
    }
}
